<?php
session_start();
if(!isset($_SESSION['username'])) exit;

require_once "db.php";

if(isset($_POST['message'], $_POST['to'])){
    $msg = trim($_POST['message']);
    $to = trim($_POST['to']);
    if($msg !== ""){
        $stmt = $db->prepare("INSERT INTO messages (sender, message, private_to) VALUES (:sender, :msg, :to)");
        $stmt->execute([':sender'=>$_SESSION['username'], ':msg'=>$msg, ':to'=>$to]);
    }
}
