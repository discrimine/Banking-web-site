<?php
$connection = mysqli_connect('localhost', 'root', '', 'banks');
if ($connection == false) {
echo 'can`t connect to db<br>';
echo mysqli_connect_error();
exit();
}
session_start();
?>