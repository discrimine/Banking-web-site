<?php
require "db.php";
require "libs/bandle.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <header>
            <?php
            require "header.php";
            ?>
        </header>
        <main>
            <?php if ($_SESSION['logged_user'])
            {
            $id_log_user = $_SESSION['logged_user']['id'];
            $result = mysqli_query($connection, "SELECT * FROM `info` WHERE `id_bank` = '$id_log_user'");
            $info = mysqli_fetch_assoc($result);
            ?>
            <h2> Управління банком користувача <?php echo $_SESSION['logged_user']['login']; ?> </h2>
            <hr>
            <!--Credit -->
            <div class="col-md-4">
                <div class="worker-credit">
                    <br>
                    <h2> Налаштування кредитних ставок </h2>
                    <br> <br>
                    <div class="change-deposit">
                        
                        <form action="Action_change/WorkerChangeCreditAction.php" method="POST">
                            <p>
                                <div class="form-group">
                                    <label for="credit1">Кредит на 1 місяць</label>
                                    <input class="form-control" name="credit1" value="<?php echo $info['credit1']; ?> %" id="credit1" type="text">
                                </div>
                            </p>
                            <p>
                                <div class="form-group">
                                    <label for="credit12">Кредит на 12 місяців</label>
                                    <input class="form-control" name="credit12" value="<?php echo $info['credit12']; ?> %"  type="text" id="credit12">
                                </div>
                            </p>
                            <p>
                                <div class="form-group">
                                    <label for="credit24">Кредит на 24 місяця</label>
                                    <input class="form-control" name="credit24" value="<?php echo $info['credit24']; ?> %" type="text" id="credit24">
                                </div>
                            </p>
                            <p>
                                <input type="submit" class="btn btn-info" name="change_credit" value="Зберегти">
                            </p>
                        </form>
                    </div>
                </div>
            </div>
            <!--Deposit -->
            <div class="col-md-4">
                <div class="worker-deposit">
                    <br>
                    <h2> Налаштування депозитних ставок </h2>
                    <br> <br>
                    <div class="change-deposit">
                        
                        <form action="Action_change/WorkerChangeDepositAction.php" method="POST">
                            <p>
                                <div class="form-group">
                                    <label for="deposit3">Ставка на 3 місяці</label>
                                    <input class="form-control" name="deposit3" value="<?php echo $info['deposit3']; ?> %" id="deposit3" type="text">
                                </div>
                            </p>
                            <p>
                                <div class="form-group">
                                    <label for="deposit6">Ставка на 6 місяців</label>
                                    <input class="form-control" name="deposit6" value="<?php echo $info['deposit6']; ?> %"  type="text" id="deposit6">
                                </div>
                            </p>
                            <p>
                                <div class="form-group">
                                    <label for="deposit12">Ставка на 12 місяців</label>
                                    <input class="form-control" name="deposit12" value="<?php echo $info['deposit12']; ?> %" type="text" id="deposit12">
                                </div>
                            </p>
                            <p>
                                <input type="submit" class="btn btn-info" name="change_deposit" value="Зберегти">
                            </p>
                        </form>
                    </div>
                </div>
            </div>
            <!--Curr -->
            <div class="col-md-4">
                <div class="worker-currencies">
                    <br>
                    <h2> Налаштування курсу валют </h2>
                    <div class="tab">
                        <button class="tablinks" onclick="openCity(event, 'London')">Купівля</button>
                        <button class="tablinks" onclick="openCity(event, 'Paris')">Продаж</button>
                    </div>
                    <div id="London" class="tabcontent">
                        <div class="change-deposit">
                            <form action="Action_change/WorkerChangeBuyCur.php" method="POST">
                                <p>
                                    <div class="form-group">
                                        Купівля
                                        <br>
                                        <label for="buy_rub">Рубль</label>
                                        <input class="form-control" name="buy_rub" value="<?php echo $info['buy_rub']; ?> грн."  type="text" id="buy_rub">
                                    </div>
                                </p>
                                <p>
                                    <div class="form-group">
                                        <label for="buy_doll">Долар</label>
                                        <input class="form-control" name="buy_doll" value="<?php echo $info['buy_doll']; ?> грн." id="buy_doll3" type="text">
                                    </div>
                                </p>
                                <p>
                                    
                                    <div class="form-group">
                                        <label for="buy_euro">Євро</label>
                                        <input class="form-control" name="buy_euro" value="<?php echo $info['buy_euro']; ?> грн." type="text" id="buy_euro">
                                    </div>
                                </p>
                                <p>
                                    <input type="submit" class="btn btn-info" name="change_buy" value="Зберегти">
                                </p>
                            </form>
                        </div>
                    </div>
                    <div id="Paris" class="tabcontent">
                        <div class="change-deposit">
                            <form action="Action_change/WorkerChangeSellCur.php" method="POST">
                                <p>
                                    <div class="form-group">
                                        Продаж
                                        <br>
                                        <label for="sell_rub">Рубль</label>
                                        <input class="form-control" name="sell_rub" value="<?php echo $info['sell_rub']; ?> грн." id="sell_rub" type="text">
                                    </div>
                                </p>
                                <p>
                                    <div class="form-group">
                                        <label for="sell_doll">Долар</label>
                                        <input class="form-control" name="sell_doll" value="<?php echo $info['sell_doll']; ?> грн."  type="text" id="sell_doll">
                                    </div>
                                </p>
                                <p>
                                    <div class="form-group">
                                        <label for="sell_euro">Євро</label>
                                        <input class="form-control" name="sell_euro" value="<?php echo $info['sell_euro']; ?> грн." type="text" id="sell_euro">
                                    </div>
                                </p>
                                <p>
                                    <input type="submit" class="btn btn-info" name="change_sell" value="Зберегти">
                                </p>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <form action="logout.php" method="POST">
                <style>
                .but-exit{
                margin-right: 20px;
                }
                </style>
                <p class="but-exit" align="right">
                    <input type="submit" class="btn btn-danger" value="Вихід" >
                </p>
            </form>
            
            <?php
            }
            else    /*  Авторизація */     {
            ?>
            <div class="auth">
                <h2> Авторизація </h2>
                <hr>
                <form action="WorkerEnter.php" method="POST">
                    <div class="inputs">
                        <p>
                            <p><strong>Логін</strong></p>
                            <input class="form-control" type="text" size="10" name="login" value="<?php echo @$data['login']; ?>">
                        </p>
                        <p>
                            <p><strong>Пароль</strong></p>
                            <input class="form-control" type="password" name="password" value="<?php echo @$data['password']; ?>">
                        </p>
                    </div>
                    <p class="btns">
                        <button class="btn btn-primary" type="submit" name="do_login">Вхід</button>
                        <form action="WorkerReg.php" method="POST">
                            <a class="btn btn-primary" href="WorkerReg.php" role="button">Реєстрація</a>
                        </form>
                    </p>
                </form>
            </div>
            <?php
            $data = $_POST;
            if (isset($data['do_login'])) {
            $login = $data['login'];
            $result = mysqli_query($connection, "SELECT * FROM `banks` WHERE `login` = '$login'");
            $user = mysqli_fetch_assoc($result);
            if ($user) {
            if (md5($data['password']) == ($user['password'])) {
            $_SESSION['logged_user'] = $user;
            ?>
            <div class="auth-validate">
                <div class="alert alert-success">
                    <strong> Авторизація успішна</strong> ви можете перейти до <a href="WorkerEnter.php">управління</a> банком.
                </div>
            </div>
            <?php
            } else {
            ?>
            <div class="auth-validate">
                <div class="alert alert-danger">
                    Пароль введено не вірно.
                </div>
                <?php
                }
                } else {
                ?>
                <div class="auth-validate">
                    <div class="alert alert-danger">
                        Користувача не знайдено
                    </div>
                </div>
                <?php
                }
                }
                }
                ?>
                <script src="/libs/js/tab_controll.js"></script>
            </main>
            <footer>
                <?php
                require "footer.php";
                ?>
            </footer>
        </body>
    </html>