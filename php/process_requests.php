<?php
session_start();
require '../autoloader.php';
$action = $_POST['action'];
if ($action == 'get_select_contacts') {
    $company_id = intval($_POST['company_id']);
    $clients = new ClientsInfo();
    $client_list = $clients->get_client_names($company_id);
    ?>
        <label> Select Key Contact </label>
        <select class="form-control" id="client-name" name="client-name" data-toggle="tooltip" data-placement="bottom" title="If key contact is not listed, you need to add it">
            <?php if ($client_list) { ?>

                <?php foreach ($client_list as $c_list) { ?>
                    <option value="<?= $c_list['client_id'] ?> "> <?= $c_list['client_key_fname'] ?>  <?= $c_list['client_key_lname'] ?> </option>

        <?php } ?>



    <?php } else { ?>    
                <option value="0"> No Key contact found! </option>
            <?php } ?>
        </select>
    <?PHP
}