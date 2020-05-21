<?php
session_start();
include "imports.php";
include 'db_config.php';
?>

<html>
<head>
	<title>operator</title>
</head>
<body>
<?php
if(!isset($_SESSION['user']) || !isset($_SESSION['pass']))
{
	$URL="index.php";
	echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
	echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}
?>
<?php
$q='select * from operator';
$p=$pd->query($q);
while($row=$p->fetch())
{
	if($row[0]==$_SESSION['user'])
	{
		echo '
		<div class="w3-margin w3-container w3-black w3-padding">
		<h1><b><u>Oparator details</u> :-</b></h1><br>
		<h2>Operator-ID : '.$row[0].'</h2>
		<h2>Logged in as '.$row[1].'</h2><br>
		';
	}
}
?>
<form action="operator.php" method="POST">
<input name="id" type="number" id="id" class="w3-half w3-input" style="color:black;display: none;" pattern="[0-9]{4}" placeholder="Enter new ID">
<button onclick="disp('id')" type="button" class="w3-button w3-blue">Update-ID</button>
<?php
if(isset($_POST['sub1']))
{
echo '';
}
?>
</form>
<form action="operator.php" method="POST">
<input name="user" type="text" id="user" class="w3-input w3-half" style="color:black;display: none;" placeholder="Enter new Username">
<button onclick="disp('user')" type="button" class="w3-button w3-blue">Update username</button>	

<?php
if(isset($_POST['sub2']))
{
echo '';
}
?>
</form>
<form action="operator.php" method="POST">
<input name="pin" type="password" id="pin" class="w3-input w3-half" style="color:black;display: none;" pattern="[0-9]{4}" placeholder="Enter new Pin">
<button onclick="disp('pin')" type="button" class="w3-button w3-blue">Update Pin</button>	

<?php
if(isset($_POST['sub3']))
{
echo '';
}
?>
</form>
</div>
<form method="POST" action="index.php">
	<button type="submit" name="exit" class="w3-button w3-red w3-round-xxlarge w3-margin">Exit</button>
</form>
<a href="billing.php" class="w3-button w3-black">Billing</a>
</body>
</html>
<script type="text/javascript">
	function disp(x)
	{
		document.getElementById(x).style.display='block';
	}
</script>