<?php
require '../php/session.php';
sec_session_start();

require '../autoloader.php';
            
  $project_file = new ProjectFiles();

    try {

        // Undefined | Multiple Files | $_FILES Corruption Attack
        // If this request falls under any of them, treat it invalid.
        if ( !isset($_FILES['file']['error']) || is_array($_FILES['file']['error']) )  {
            
            throw new RuntimeException('Invalid parameters.');
        }

        // Check $_FILES['file']['error'] value.
        switch ($_FILES['file']['error']) {
            
            case UPLOAD_ERR_OK:
                break;
            
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('No file sent.');
                
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('Exceeded filesize limit.');
                
            default:
                throw new RuntimeException('Unknown errors.');
        }
        
            
        // Cheking file size. 
        if ($_FILES['file']['size'] > 2.5e+7 ) { // 25 MB
            
            throw new RuntimeException('Exceeded filesize limit.');
        }

            
        // Check MIME Type  
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        
        if ( false === $ext = array_search(
             $finfo->file($_FILES['file']['tmp_name']),
            array(            
                 // images
                'png' => 'image/png',
                'jpe' => 'image/jpeg',
                'jpeg' => 'image/jpeg',
                'jpg' => 'image/jpeg',
                'gif' => 'image/gif',
                'bmp' => 'image/bmp',
                'ico' => 'image/vnd.microsoft.icon',
                'tiff' => 'image/tiff',
                'tif' => 'image/tiff',
                'svg' => 'image/svg+xml',
                'svgz' => 'image/svg+xml',

                  // ms office
                'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'doc' =>  'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'xls' =>  'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'txt' =>  'text/plain',

                // adobe
                'pdf' => 'application/pdf',
                'psd' => 'image/vnd.adobe.photoshop',
                'ai' => 'application/postscript',
                'eps' => 'application/postscript',
                'ps' => 'application/postscript',

                 // archives
                'zip' => 'application/zip',
                'rar' => 'application/x-rar-compressed',      
            ),
            true
        )) {
            throw new RuntimeException('Invalid file format.');
        }

        // Cheking user types and movinig files        
        if( intval($_POST['client_id']) !== '0' ) { 
            
            $user = new ClientsInfo();
            $user_info = $user->get_key_contanct( intval($_POST['client_id']) );
            $user_directory_name = $user_info['client_key_fname'] . "_ID_".$user_info['client_id'];
            
            if ( !file_exists("../project-files/$user_directory_name") ) {
                
               mkdir("../project-files/$user_directory_name", 0777, true);
            
            }
            
            //making uniq   name
            $file_destination = sprintf("../project-files/$user_directory_name/%s.%s",
                  sha1_file($_FILES['file']['tmp_name']),
                  $ext
            );
            
        }
        
        // if admin
        elseif( intval($_POST['admin_id']) !== '0' ) { 
            
            $user = new ADminInfo();
            $user_info = $user->get_admin_name( intval($_POST['admin_id']) );
            $user_directory_name = $user_info['admin_fname'] . "_ID_".$user_info['admin_user_id'];
            
            if ( !file_exists("../project-files/$user_directory_name") ) {
                
               mkdir("../project-files/$user_directory_name", 0777, true);
            
            }
            
            //making uniq   name
            $file_destination = sprintf("../project-files/$user_directory_name/%s.%s",
                  sha1_file($_FILES['file']['tmp_name']),
                  $ext
            );
            
        }
        
        
        // if team
        elseif( intval($_POST['team_id']) !== '0' ) { 
            
            $user = new TeamMembers();
            $user_info = $user->get_member_name( intval($_POST['team_id']) );
            $user_directory_name = $user_info['member_fname'] . "_ID_".$user_info['member_user_id'];
            
            if ( !file_exists("../project-files/$user_directory_name") ) {
                
               mkdir("../project-files/$user_directory_name", 0777, true);
            
            }
            
            //making uniq   name
            $file_destination = sprintf("../project-files/$user_directory_name/%s.%s",
                  sha1_file($_FILES['file']['tmp_name']),
                  $ext
            );
            
        }
        
            
            
            //Moving file
            if ( !move_uploaded_file(
            
                    $_FILES['file']['tmp_name'],$file_destination
            
             )) 
  
    {
        throw new RuntimeException('Failed to move uploaded file.');
    }
     
     // Send file information to database 
     $data = [
         //file data
         'name' => $_FILES['file']['name'],
         'type' => $_FILES['file']['type'],
         'size' => $_FILES['file']['size'],
         'file_loc' => $file_destination,
         
         //sender data
         'admin_id'  => $_POST['admin_id'],
         'team_id'   => $_POST['team_id'],
         'client_id' => intval($_POST['client_id']),
         
         //projet data
          'project_id'  => $_POST['project_id'],
          'question_id'  => $_POST['question_id'],
          'phase_id'    => $_POST['phase_id']
     ];
     
     
    if(  $project_file->show_files( $data['question_id'], $data['project_id'] ) ) {
            
        $files = $project_file->show_files( $data['question_id'], $data['project_id'] );
        
        foreach ( $files as $file_name ) {
            
            if( $file_name['file_name'] ===  $data['name'] ) {
                throw new RuntimeException('The file '. $data['name']. ' is already uploaded');
            }
        }
    }
    
            
            
    $set_files = $project_file->setFileProperty($data);
    
    $is_save = $project_file->save();
               
          echo 'File is uploaded  successfully.';
            

    } catch (RuntimeException $e) {

        echo $e->getMessage();

    }
