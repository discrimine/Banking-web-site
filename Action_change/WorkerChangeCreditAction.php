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
    if (isset($data['change_credit'])) {
    $ChangeCredit1 = $data['credit1'];
    $ChangedCredit1 = mysqli_query($connection, "UPDATE `info` SET `credit1`='$ChangeCredit1' WHERE id_bank='$id_log_user'");
    mysqli_query($connection, $ChangedCredit1);
    
    $ChangeCredit12 = $data['credit12'];
    $ChangedCredit12 = mysqli_query($connection, "UPDATE `info` SET `credit12`='$ChangeCredit12' WHERE id_bank='$id_log_user'");
    mysqli_query($connection, $ChangedCredit12);
    $ChangeCredit24 = $data['credit24'];
    $ChangedCredit24 = mysqli_query($connection, "UPDATE `info` SET `credit24`='$ChangeCredit24' WHERE id_bank='$id_log_user'");
    mysqli_query($connection, $ChangedCredit24);
    
    }
    ?>
</body>
</html>