<?php
session_start();
if(!isset($_SESSION['username'])) exit;

require_once "db.php";

if(isset($_POST['message'])){
    $msg = trim($_POST['message']);
    if($msg !== ""){
        $stmt = $db->prepare("INSERT INTO messages (sender, message, private_to) VALUES (:sender, :msg, NULL)");
        $stmt->execute([':sender' => $_SESSION['username'], ':msg' => $msg]);
    }
}
