<?php
include_once "db.php";
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
      <div class="auth">
        <h2> Реєстрація </h2>
        <hr>
        <form action="WorkerReg.php" method="POST">
          <p>
            <label for="login"> Ваш логін </label>
            <input id="login" class="form-control" type="text" name="login"
            value="<?php echo @$data['login']; ?>">
          </p>
          <p>
            <label for="name"> Назва Вашого банку </label>
            <input id="name" class="form-control" type="text" name="name"
            value="<?php echo @$data['name']; ?>">
          </p>
          <p>
            <label for="password">Ваш пароль</label>
            <input id="password" class="form-control" type="password" name="password"
            value="<?php echo @$data['password']; ?>">
          </p>
          <p>
            <label for="password_2">Підтвердіть пароль</label>
            <input id="password_2" class="form-control" type="password" name="password_2"
            value="<?php echo @$data['password_2']; ?>">
          </p>
          <p>
            <div class="btns">
              <button class="btn" type="submit" name="do_signup">Зареєструватися</button>
            </div>
          </p>
        </form>
      </div>
      <br>
      <br>
      <?php
      $data = $_POST;
      if (isset($data['do_signup'])) {
      $login = $_POST['login'];
      $email = $_POST['email'];
      $result = mysqli_query($connection, "SELECT `login` FROM `banks` WHERE `login` = '$login'");
      $userdata = mysqli_fetch_assoc($result);
      $errors = array();
      if (trim($data['login']) == '') {
      $errors[] = '<div class="alert alert-danger"> Введіть логін </div> ';
      }
      if (trim($data['name']) == '') {
      $errors[] = '<div class="alert alert-danger"> Введіть назву банку </div> ';
      }
      if ($data['password'] == '') {
      $errors[] = '<div class="alert alert-danger"> Введіть пароль </div> ';
      }
      if ($data['password_2'] != $data['password']) {
      $errors[] = '<div class="alert alert-danger"> Паролі не співпадають </div> ';
      }
      if ($userdata != null) {
      $errors[] = '<div class="alert alert-danger"> Логін вже зайнятий </div>';
      }
      if (empty($errors)) {
      $addlog = $_POST['login'];
      $addname = $_POST['name'];
      $addpass = md5($_POST['password']);
      $adduser = mysqli_query($connection, "INSERT INTO `banks` (login,name,password) values ('$addlog','$addname','$addpass')");
      $bankInfoQuery = mysqli_query($connection, "SELECT * FROM `banks` WHERE `login`='$login'");
      $bankInfo = mysqli_fetch_assoc($bankInfoQuery);
      $bankId = $bankInfo['id'];
      $addinfo = mysqli_query($connection, "INSERT INTO `Info` (id_bank,credit1,credit12,credit24,deposit3,deposit6,deposit12,buy_rub,buy_doll,buy_euro,sell_rub,sell_doll,sell_euro) values ($bankId,0,0,0,0,0,0,0,0,0,0,0,0)");
      mysqli_query($connection, $addinfo);
      ?>
      <div class="reg-validate">
        <div class="alert alert-success">
          Реєстрація успішна <br> ви можете перейти до <a href="WorkerEnter.php">управління</a> банком
        </div>
      </div>
      <?php
      }
      else {
      echo '<div class="reg-validate">' . array_shift($errors) . '</div>';
      }
      }
      ?>
    </main>
    <footer>
      <?php
      require "footer.php";
      ?>
    </footer>
  </body>
</html>