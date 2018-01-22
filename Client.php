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
      $result = mysqli_query($connection, "SELECT * FROM `banks`");
      ?>
    </header>
    <main>
      <br>
      <br>
      <br>
      <!--  Table with banks  -->
      <div class="table-client">
        <?php
        echo '<table class="table table-hover" >';
          ?>
          <thead>
            <tr>
              <th>
                Назва банку
              </th>
              <th>
                Кредит на 12 місяців
              </th>
              <th>
                Депозит на 1 місяць
              </th>
            </tr>
          </thead>
          <?php
          while ($myrow = mysqli_fetch_assoc($result)) {
          $bank_id=$myrow['id'];
          $resultInfo = mysqli_query($connection, "SELECT * FROM `info` WHERE id_bank = $bank_id ORDER BY deposit3");
          $info=mysqli_fetch_assoc($resultInfo);
          printf('<tr><td> <a href="ClientPanel.php?id=%s"> %s </a>  </td> <td>%s &#37;</td> <td>%s &#37;</td>',
          $bank_id, $myrow['name'],$info['credit12'], $info['deposit3'] );
        echo '</tr>';
        }
      echo '</tr></table>'
      ?>
    </div>
    <p align="right"><sub>Для більш детальної інформації клікніть по назві банку</sub> </p>
    <!--  END of table with banks  -->
  </main>
  <footer>
    
    <?php
    require "footer.php";
    ?>
  </footer>
</body>
</html>