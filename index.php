<?php
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
			<br>
			<div class="index-banks">
				<table>
					<tr>
						<td width="200px" height="200px" align="center"> <a href="http://privatbank.ua/"> <img src="libs/pics/privat.jpg"> </a> </td>
						<td width="200px" height="200px" align="center"> <a href="https://ru.ukrsotsbank.com/"> <img src="libs/pics/soc.jpg"> </a> </td>
						<td width="200px" height="200px" align="center"> <a href="https://www.ukrgasbank.com/"> <img src="libs/pics/gaz.jpg"> </a> </td>
					</tr>
					<tr>
						<td width="200px" height="200px" align="center"> <a href="https://alfabank.ua/ru"> <img src="libs/pics/alfa.jpg"> </a> </td>
						<td width="200px" height="200px" align="center"> <a href="https://www.eximb.com/ukr/personal/"> <img src="libs/pics/eksim.jpg"> </a> </td>
						<td width="200px" height="200px" align="center"> <a href="https://www.oschadbank.ua/ua/"> <img src="libs/pics/oshchad.jpg"> </a> </td>
					</tr>
					<tr>
						<td width="200px" height="200px" align="center"> <a href="http://aval.ua/ru/e-services/ib/"> <img src="libs/pics/aval.jpg"> </a> </td>
						<td width="200px" height="200px" align="center"> <a href="https://ru.otpbank.com.ua/"> <img src="libs/pics/otp.jpg"> </a> </td>
						<td width="200px" height="200px" align="center"> <a href="https://pumb.ua/"> <img src="libs/pics/pumb.jpg"> </a> </td>
					</tr>
				</table>
			</div>
			<div class="arrow">
				<a href="client.php">	<img height="250" width="250" src="libs/pics/arrow_forward.png"> </a>
			</div>
		</main>
		<footer>
			<?php
			require "footer.php";
			?>
		</footer>
	</body>
</html>