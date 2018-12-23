<?php 
global $request_array;
$request = $_SERVER['REQUEST_URI'];
$request_array = explode("/",$request);

array_shift($request_array);
array_shift($request_array);

switch ($request_array[0])
{
    case NULL:
    case "login":
        include 'controler/login.php';
        break;  
    
    case "index":
        include 'controler/login.php';
        break;  
    
     case "gc-team":
        include 'controler/admin/gc-team.php';
        break;  
    
    case "admin-dashboard":
        include 'controler/admin/admin-dashboard.php';
        break;
    
    case "admin-add-projects":
        include 'controler/admin/admin-add-projects.php';
        break;
    
     case "admin-add-clients":
        include 'controler/admin/admin-add-clients.php';
        break;
    
    case "admin-add-members":
        include 'controler/admin/admin-add-members.php';
        break;
    
    case "admin-project-add-project-question":
        include 'controler/admin/admin-project-add-project-question.php';
        break;
    
    case "admin-project-progress":
        include 'controler/admin/admin-project-progress.php';
        break;
    
    case "admin-project-types":
        include 'controler/admin/admin-project-types.php';
        break;
    
    case "admin-setup-client-account":
        include 'controler/admin/admin-setup-client-account.php';
        break;
    
    
    case "admin-show-client-project-status":
        include 'controler/admin/admin-show-client-project-status.php';
        break;
    
    
    case "admin-project-reports":
        include 'controler/admin/admin-project-reports.php';
        break;
            
     case "admin-to-clients":
        include 'controler/admin/admin-to-clients.php';
        break;
    
    case "admin-companies-details":
        include 'controler/admin/admin-companies-details.php';
        break;
    
    case "admin-add-question-categories":
        include 'controler/admin/admin-add-question-categories.php';
        break;
    
    
    
    
    
    // clients pages
    
     case "client-dashboard":
        include 'controler/clients/client-dashboard.php';
        break;
    
    case "client-project-phases":
        include 'controler/clients/client-project-phases.php';
        break;
     
    case "client-edit-profiles":
        include 'controler/clients/client-edit-profiles.php';
        break;
        
    
    //
    case "logout":
        include 'controler/logout.php';
        break;
    
     case "lock-out":
        include 'controler/lock-out.php';
        break;
    
    //team 
    case "team-dashboard":
        include 'controler/team/team-dashboard.php';
        break;
    
    
    default:
        include 'controler/404.php';
        break;
    
}

