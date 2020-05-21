<?php
session_start();
include "imports.php";
include 'db_config.php';
if(!isset($_SESSION['user']) || !isset($_SESSION['pass']))
{
	$URL="index.php";
	echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
	echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}
?>
<html>
<head>
	<title></title>
</head>
<body>
<div id="main" class="w3-threequarter w3-card-1 w3-display-topmiddle">
<div class="w3-half">
<form class="w3-padding">
	<fieldset>
	<h2>Personal</h2>	
	<div class="w3-black w3-half">
		<button type="button" class="w3-button w3-black w3-bar" onclick="disp(1)">update pin</button><br>
		<button type="button" class="w3-button w3-black w3-bar" onclick="disp(2)">update username</button><br>
		<button type="button" class="w3-button w3-black w3-bar" onclick="disp(3)">Admin ID</button><br>
	</div>
	</fieldset>
</form>
<form class="w3-padding ">
	<fieldset>
	<h2>Item</h2>	
	<div class="w3-black w3-half">
		<button type="button" class="w3-button w3-black w3-bar" onclick="disp(4)">Item data</button><br>
	</div>
	</fieldset>
</form>
</div>
<div>
<form class=" w3-padding">
	<fieldset>
	<h2>Staff</h2>	
	<div class="w3-black w3-half">
		<button type="button" class="w3-button w3-black w3-bar" onclick="disp(5)">Show supervisor details</button><br>
		<button type="button" class="w3-button w3-black w3-bar" onclick="disp(6)">show operator datails</button><br>
		<button type="button" class="w3-button w3-black w3-bar" onclick="disp(7)">Block supervisor</button><br>
		<button type="button" class="w3-button w3-black w3-bar" onclick="disp(8)">Block operator</button><br>
		<button type="button" class="w3-button w3-black w3-bar" onclick="disp(9)">Unblock Supervisor</button><br>
		<button type="button" class="w3-button w3-black w3-bar" onclick="disp(10)">Unblock operator</button><br>
		<button type="button" class="w3-button w3-black w3-bar" onclick="disp(11)">Remove Supervisor</button><br>
		<button type="button" class="w3-button w3-black w3-bar" onclick="disp(12)">Remove operator</button>
	</div>
	</fieldset>
</form>
<form method="POST" action="index.php">
	<button type="submit" name="exit" class="w3-button w3-red w3-round-xxlarge w3-margin">Exit / Signout</button>
</form>

</div>
</div>
<div class="w3-red w3-padding w3-round-large w3-center" style="position: absolute;top: 200px;left: 1200px;">
	<h4 style="color: black">ALERT :</h4>
	<h4 style="color: black">colgate stock depleting</h4>
</div>

<div id="upin" class="w3-half w3-card-1 w3-display-topmiddle" style="display: none;">
<form action="admin.php" method="POST">
	<br>
	<h4>Enter new pin : </h4><input type="password" class="w3-input" placeholder="Enter new 4-digit pin" pattern="[0-9]{4}" name="newpin"><br>
	<button class="w3-button w3-black w3-center" name="update">Update</button>
</form>
<?php
if(isset($_POST['update']))
{
	$new=(int)$_POST['newpin'];
	$id=$_SESSION['user'];
	$p=$pd->prepare('update admin set pin=? where id=?');
	$p->bindparam(1,$new);
	$p->bindparam(2,$id);
	$p->execute();
}
?>
</div>
<div id="uuser" style="display: none;"></div>
<div id="aid" style="display: none;"></div>

<div id="idata" style="display: none;"></div>

<div id="shows" style="display: none;"></div>
<div id="showo" style="display: none;"></div>
<div id="blocks" style="display: none;"></div>
<div id="blocko" style="display: none;"></div>
<div id="unblocks" style="display: none;"></div>
<div id="unblocko" style="display: none;"></div>
<div id="removes" style="display: none;"></div>
<div id="removeo" style="display: none;"></div>
</body>
</html>
<script type="text/javascript">
	function disp(x)
	{
		document.getElementById('main').style.display='none';
		if(x==1)
		{
			document.getElementById('upin').style.display='block';
		}
		else if(x==2)
		{
			document.getElementById('uuser').style.display='block';
		}
		else if(x==3)
		{
			document.getElementById('aid').style.display='block';
		}
		else if(x==4)
		{
			document.getElementById('idata').style.display='block';
			window.location.href='inventory.php';
		}
		else if(x==5)
		{
			document.getElementById('shows').style.display='block';
		}
		else if(x==6)
		{
			document.getElementById('showo').style.display='block';
		}
		else if(x==7)
		{
			document.getElementById('blocks').style.display='block';
		}
		else if(x==8)
		{
			document.getElementById('blocko').style.display='block';
		}
		else if(x==9)
		{
			document.getElementById('unblocks').style.display='block';
		}
		else if(x==10)
		{
			document.getElementById('unblocko').style.display='block';
		}
		else if(x==11)
		{
			document.getElementById('removes').style.display='block';
		}
		else if(x==12)
		{
			document.getElementById('removeo').style.display='block';
		}
		else
		{
		}
	}
</script>