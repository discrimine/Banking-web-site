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
      <?php
      $bankId=$_GET['id'];
      $result1 = mysqli_query($connection, "SELECT * FROM `banks` WHERE `id`='$bankId'");
      $bank = mysqli_fetch_assoc($result1);
      $result2 = mysqli_query($connection, "SELECT * FROM `info` WHERE `id_bank`='$bankId'");
      $info = mysqli_fetch_assoc($result2); ?>
      <h1><?php echo $bank['name']; ?> </h1>
      <br>
      <div class="web">
        <p align="right"> <a href="<?php echo $info['web_site']; ?>"> Перейти на веб - сайт банку </a> </p>
      </div>
      <!--   CREDIT      -->
      <div class="col-md-4">
        <div class="worker-currencies">
          <br>
          <h1> Кредит </h1>
          <br>
          <table class="CreditTable">
            <tr>
              <td>Термін <br> </td> <td> <select id="SelectCredit">
              <option value="1">1 місяць</option>
              <option value="12">12 місяців</option>
              <option value="24">24 місяця</option>
            </select> <br>
            <style>
            select {
            width: 150px;
            }
          </style> </td>
        </tr>
        <tr>
          <td> <br> На суму, грн </td> <td> <br> <input class="form-control"  id="CreditSum" value="0"  type="text"> </td> <td> <br></td>
        </tr>
        <tr>
          <td colspan="3"> <br> <div align="center"> <button type="button" class="btn btn-info" align="center" onclick="CalcCredit()">Порахувати</button> </div> <br> </td>
        </tr>
        <tr>
          <td>Щомісячний платіж, грн</td> <td>  <input class="form-control"  id="CreditOver" value="0"  type="text"> </td> <td></td>
        </tr>
        <tr>
          <td><br>Переплата, грн</td> <td> <br> <input class="form-control"  id="CreditOverPercent" value="0"  type="text"> </td> <td><br></td>
        </tr>
      </table>
      <br>
      <table class="table">
        <style type="text/css">
        .table td{
        text-align: center;
        }
        </style>
        <p align="center"> <strong> Поточна кредитна ставка <?php echo $bank['name']; ?> </strong> </p>
        <thead>
          <tr>
            <th><label for="buy_rub">1 місяць</label></th>
            <th><label for="buy_doll">12 місяців</label></th>
            <th><label for="buy_euro">24 місяця</label></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><label> <?php echo $info['credit1']; ?>%</label></td>
            <td><label> <?php echo $info['credit12']; ?>%</label></td>
            <td><label> <?php echo $info['credit24']; ?>%</label></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <script type="text/javascript">
  function CalcCredit() {
  var r=document.getElementById('SelectCredit').value
  var sum=document.getElementById('CreditSum').value
  if (r == 1){
  var percent='<?=$info['credit1']; ?>';
  }
  if (r == 12){
  var percent='<?=$info['credit12']; ?>';
  }
  if (r == 24){
  var percent='<?=$info['credit24']; ?>';
  }
  var over=(sum/r)+(sum/100*percent/r);
  over=over.toFixed(2);
  var percentage=sum-(over*r);
  document.getElementById('CreditOver').value=over;
  document.getElementById('CreditOverPercent').value=percentage.toFixed(2);
  }
  </script>
  <!--   END  CREDIT      -->
  <!--   DEPOSIT      -->
  <div class="col-md-4">
    <div class="worker-currencies">
      <br>
      <h1> Депозит </h1>
      <br>
      <table class="CreditTable">
        <tr>
          <td>Термін <br> </td> <td> <select id="SelectDeposit">
          <option value="3">3 місяць</option>
          <option value="6">6 місяців</option>
          <option value="12">12 місяця</option>
        </select> <br> </td>
      </tr>
      <tr>
        <td> <br>На суму, грн  </td> <td> <br> <input class="form-control"  id="DepositSum" value="0"  type="text">  </td> <td> <br></td>
      </tr>
      <tr>
        <td colspan="3"> <br> <div align="center"> <input type="button" class="btn btn-info" value="Порахувати" onclick="CalcDeposit()"/> <br> </td>
      </tr>
      <tr>
        <td>  <br> Нарощена сума, грн</td> <td>  <br> <input class="form-control"  id="DepositOver" value="0"  type="text"> </td> <td> <br></td>
      </tr>
      <tr>
        <td> <br>Прибуток,&nbsp; грн </td> <td>  <br> <input class="form-control"  id="DepositOverPercent" value="0"  type="text">  </td> <td> <br></td>
      </tr>
    </table>
    
    <br>
    <table class="table">
      <style type="text/css">
      .table td{
      text-align: center;
      }
      </style>
      <p align="center"> <strong> Поточна депозитна ставка <?php echo $bank['name']; ?></strong> </p>
      <thead>
        <tr>
          <th><label for="buy_rub">3 місяця</label></th>
          <th><label for="buy_doll">6 місяців</label></th>
          <th><label for="buy_euro">12 місяців</label></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><label> <?php echo $info['deposit3']; ?>%</label></td>
          <td><label> <?php echo $info['deposit6']; ?>%</label></td>
          <td><label> <?php echo $info['deposit12']; ?>%</label></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<script type="text/javascript">
function CalcDeposit() {
var r=document.getElementById('SelectDeposit').value;
var sum=document.getElementById('DepositSum').value;
if (r == 3){
var percent='<?=$info['deposit3']; ?>';
}
if (r == 6){
var percent='<?=$info['deposit6']; ?>';
}
if (r == 12){
var percent='<?=$info['deposit12']; ?>';
}
var over=(+sum + +(sum/100*percent))*r;
over=over.toFixed(2);
var percentage=over-sum*r;
percentage=percentage.toFixed(2);
document.getElementById('DepositOver').value=over;
document.getElementById('DepositOverPercent').value=percentage;
}
</script>
<!--   END  DEPOSIT      -->
<!--   CURRENCIES      -->
<div class="col-md-4">
  <div class="worker-currencies">
    <br>
    <h1> Курс валют </h1>
    <div class="tab">
      <button class="tablinks" class="btn-info" onclick="openCity(event, 'buy-tab')">Купівля</button>
      <button class="tablinks" class="btn-info" onclick="openCity(event, 'sell')">Продаж</button>
    </div>
    <!--   BUY     -->
    <div id="buy-tab" class="tabcontent">
      <br>
      <table class="table currencies">
        <tr>
          <td>Я хочу купити </td> <td> <input width="10" class="form-control"  id="needBuy" value="0"  type="text">
          <style>
          select {
          width: 100px;
          }
        </style> </td> <td> <select id="curBuy">
        <option value="<?php echo $info['buy_rub']; ?>">Рубль</option>
        <option value="<?php echo $info['buy_doll']; ?>">Долар</option>
        <option value="<?php echo $info['buy_euro']; ?>">Євро</option>
      </select>  </td>
    </tr>
    <tr>
      <td colspan="3"> <div align="center"> <input type="button" class="btn btn-info" value="Порахувати" onclick="CalcBuy()"/> </div>  </td>
    </tr>
    <tr>
      <td>Сума, грн</td> <td>   <input class="form-control" id="itogBuy"  type="text"></td> <td></td>
    </tr>
  </table>
  <br>
  <table class="table course">
    <style type="text/css">
    .table td{
    text-align: center;
    }
    </style>
    <p align="center"> <strong> Курс купівля <?php echo $bank['name']; ?> </strong> </p>
    <thead>
      <tr>
        <th><label for="buy_rub">Рубль</label></th>
        <th><label for="buy_doll">Долар</label></th>
        <th><label for="buy_euro">Євро</label></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><label> <?php echo $info['buy_rub']; ?> грн. </label></td>
        <td><label> <?php echo $info['buy_doll']; ?> грн. </label></td>
        <td><label> <?php echo $info['buy_euro']; ?> грн. </label></td>
      </tr>
    </tbody>
  </table>
</div>
<!--   SELL     -->
<div id="sell" class="tabcontent">
  <br>
  <table class="table currencies">
    <tr>
      <td>Я хочу продати </td> <td> <input width="10" class="form-control"  id="needSell" value="0"  type="text">
      <style>
      select {
      width: 100px;
      }
    </style> </td> <td> <select id="curSell">
    <option value="<?php echo $info['sell_rub']; ?>">Рубль</option>
    <option value="<?php echo $info['sell_doll']; ?>">Долар</option>
    <option value="<?php echo $info['sell_euro']; ?>">Євро</option>
  </select>  </td>
</tr>
<tr>
  <td colspan="3"> <div align="center"> <input type="button" class="btn btn-info" value="Порахувати" onclick="CalcSell()"/> </div>  </td>
</tr>
<tr>
  <td>Сума, грн</td> <td>   <input class="form-control" id="itogSell"  type="text"></td> <td></td>
</tr>
</table>
<br>
<table class="table course">
<style type="text/css">
.table td{
text-align: center;
}
</style>
<p align="center"> <strong> Курс продаж <?php echo $bank['name']; ?> </strong> </p>
<thead>
  <tr>
    <th><label for="sell_rub">Рубль</label></th>
    <th><label for="sell_doll">Долар</label></th>
    <th><label for="sell_euro">Євро</label></th>
  </tr>
</thead>
<tbody>
  <tr>
    <td><label> <?php echo $info['sell_rub']; ?> грн. </label></td>
    <td><label> <?php echo $info['sell_doll']; ?> грн. </label></td>
    <td><label> <?php echo $info['sell_euro']; ?> грн. </label></td>
  </tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
<!--   END  CURRENCIES      -->
</main>
<footer>
<script src="/libs/js/tab_controll.js"></script>
<script type="text/javascript">
function CalcBuy() {
var t1=document.getElementById('curBuy').value
var s1=document.getElementById('needBuy').value
document.getElementById('itogBuy').value=t1*s1
}
</script>
<script type="text/javascript">
function CalcSell() {
var t2=document.getElementById('curSell').value
var s2=document.getElementById('needSell').value
document.getElementById('itogSell').value=t2*s2
}
</script>
<?php
require "footer.php";
?>
</footer>
</body>
</html>