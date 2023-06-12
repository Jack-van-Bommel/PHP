<!-- Store Userdata -->

<?php
require_once "functions.php";

if (isset($_POST)) {
    echo "Data ontvangen";
    
    $data = $_POST;
    matchData($data);
}

?>