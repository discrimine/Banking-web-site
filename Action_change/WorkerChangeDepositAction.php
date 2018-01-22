<?php
require "../db.php";
require "../libs/bandle.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="refresh" content="0; URL=../WorkerEnter.php">
    </head>
    <body>
    </header>
    <?php
    $data=$_POST;
    $id_log_user = $_SESSION['logged_user']['id'];
    $result = mysqli_query($connection, "SELECT * FROM `info` WHERE `id_bank` = '$id_log_user'");
    $info = mysqli_fetch_assoc($result);
    if (isset($data['change_deposit'])) {
    $ChangeDeposit3 = $data['deposit3'];
    $ChangedDeposit3 = mysqli_query($connection, "UPDATE `info` SET `deposit3`='$ChangeDeposit3' WHERE id_bank='$id_log_user'");
    mysqli_query($connection, $ChangedDeposit3);
    
    $ChangeDeposit6 = $data['deposit6'];
    $ChangedDeposit6 = mysqli_query($connection, "UPDATE `info` SET `Deposit6`='$ChangeDeposit6' WHERE id_bank='$id_log_user'");
    mysqli_query($connection, $ChangedDeposit6);
    $ChangeDeposit12 = $data['deposit12'];
    $ChangedDeposit12 = mysqli_query($connection, "UPDATE `info` SET `Deposit12`='$ChangeDeposit12' WHERE id_bank='$id_log_user'");
    mysqli_query($connection, $ChangedDeposit12);
    }
    ?>
</body>
</html>