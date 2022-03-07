<?php 

session_start();
if (!isset($_SESSION["redtemp"])) {
	$_SESSION["redtemp"] = "";
}
if (!isset($_SESSION["blacktemp"])) {
	$_SESSION["blacktemp"] = "";
}


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Roulette thing</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
<div id="box1">
	
	<form method="get">
		<input type="number" name="red" placeholder="Red" value="<?php echo $_GET["red"] ?>">
		<input type="number" name="black" placeholder="Black" value="<?php echo $_GET["black"] ?>">
		<input type="submit" value="Svara">
		<input type="hidden" name="isclicked" value="clicked">
	</form>
<?php
if (!isset($_GET["isclicked"])) {
	$_GET["isclicked"] = "";
}

if ($_GET["isclicked"] == "clicked" && is_numeric($_GET["red"]) && is_numeric($_GET["black"])) {
	echo "<br><br>" . $_GET["red"] . " röd <br>" . $_GET["black"] . " svart <br><br><br>";
	$sum = $_GET["red"] + $_GET["black"];
	$resultred = $_GET["red"] / $sum;
	$resultblack = $_GET["black"] / $sum;
}

?>  
<div id="box2">	
	<?php
		$result1 = round($resultred, 2) * 100;
		$result2 = round($resultblack, 2) * 100;

		echo "röd ". $result1 . "% | ";
		echo "svart ". $result2 . "%<br>";
	?>
	<div class="pie animate no-round" style="--p:<?php echo $result1; ?>;--c:red;"> <?php echo $result1; ?>%</div>
	<div class="pie animate no-round" style="--p:<?php echo $result2; ?>;--c:gray;"> <?php echo $result2; ?>%</div>
	
</div>
</div>
<!-- <div id="latest">
	
	<div class="pie animate no-round" style="--p:<?phpecho $result2; ?>;--c:gray;"> <?phpecho $result2; ?>%</div>
	<div class="pie animate no-round" style="--p:<?phpecho $result1; ?>;--c:red;"> <?phpecho $result1; ?>%</div>

</div> -->
</body>
</html>