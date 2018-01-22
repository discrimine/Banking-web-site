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
    if (isset($data['change_sell'])) {
    $ChangeSellRub = $data['sell_rub'];
    $ChangedSellRub = mysqli_query($connection, "UPDATE `info` SET `sell_rub`='$ChangeSellRub' WHERE id_bank='$id_log_user'");
    mysqli_query($connection, $ChangedSellRub);
    
    $ChangeSellDoll = $data['sell_doll'];
    $ChangedSellDoll = mysqli_query($connection, "UPDATE `info` SET `sell_doll`='$ChangeSellDoll' WHERE id_bank='$id_log_user'");
    mysqli_query($connection, $ChangedSellDoll);
    $ChangeSellEuro = $data['sell_euro'];
    $ChangedSellEuro = mysqli_query($connection, "UPDATE `info` SET `sell_euro`='$ChangeSellEuro' WHERE id_bank='$id_log_user'");
    mysqli_query($connection, $ChangedSellEuro);
    }
    ?>
</body>
</html>