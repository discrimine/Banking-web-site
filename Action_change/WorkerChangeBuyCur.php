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
    if (isset($data['change_buy'])) {
    $ChangeBuyRub = $data['buy_rub'];
    $ChangedBuyRub = mysqli_query($connection, "UPDATE `info` SET `buy_rub`='$ChangeBuyRub' WHERE id_bank='$id_log_user'");
    mysqli_query($connection, $ChangedBuyRub);
    
    $ChangeBuyDoll = $data['buy_doll'];
    $ChangedBuyDoll = mysqli_query($connection, "UPDATE `info` SET `buy_doll`='$ChangeBuyDoll' WHERE id_bank='$id_log_user'");
    mysqli_query($connection, $ChangedBuyDoll);
    $ChangeBuyEuro = $data['buy_euro'];
    $ChangedBuyEuro = mysqli_query($connection, "UPDATE `info` SET `buy_euro`='$ChangeBuyEuro' WHERE id_bank='$id_log_user'");
    mysqli_query($connection, $ChangedBuyEuro);
    }
    ?>
</body>
</html>