<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $success = bookAppointment($_POST);
    
    header('Content-Type: application/json');
    echo json_encode($success);
}
?>