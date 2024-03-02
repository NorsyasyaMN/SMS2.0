<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sms";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function mq($sql){
    global $conn;
    return mysqli_query($conn, $sql);
}

function mnr($a){
    return mysqli_num_rows($a);
}

function mfa($a){
    return mysqli_fetch_assoc($a);
}
?>