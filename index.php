<?php
session_start();
include "imports.php";
include 'db_config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
</head>
<body>
<div class="w3-card-1 w3-margin w3-padding w3-half w3-display-topmiddle" style="float: center">
<h2 class="w3-center w3-container w3-black w3-padding">Login your profile from here !!!</h2><br>
<form action="index.php" method="POST" class="">
	<div>
<h4 class="">You are :</h4><select name="type" class="cls w3-select w3-center w3-border">
	<option value="a" class="w3-black">Admin</option>
	<option value="s" class="w3-black">Spervisor</option>
	<option value="o" class="w3-black">operator</option>
</select></div>
<div>
<h4>Username :</h4><input class="cls w3-input w3-border" type="number" name="user" placeholder="Enter your Id">
<h4>Pin :</h4><input class="cls w3-input w3-border" type="password" pattern="[0-9]{4}" name="pass" placeholder="Enter your password"><br>
</div>
<div class="w3-center">
<button type="submit" class="w3-button w3-green w3-margin w3-round-xxlarge" name="login">Login</button>
<button type="reset" class="w3-button w3-black w3-margin w3-round-xxlarge" onclick="clear()">Clear</button>
<a class="w3-button w3-red w3-margin w3-round-xxlarge" href="#">Exit</a>
<a class="w3-button w3-blue w3-margin w3-round-xxlarge" href="createaccount.php">Create new account</a>
</div>
</form>
</div>
</body>
</html>
<script type="text/javascript">
	function clear()
	{
		dlocation.reload();
	}
function close() {
  if (confirm("Close Window?")) {
    close();
  }
}
</script>
<?php
if(isset($_POST['login']))
{
	$type=$_POST['type'];
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	if ($type=="a") {
		$q='select * from admin';
		$p=$pd->query($q);
		while($row=$p->fetch())
		{
			if($row[0]==$user)
			{
				if($row[2]==$pass)
				{
					$_SESSION['user']=(int)$user;
					$_SESSION['pass']=$pass;
					$URL="admin.php";
					echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
					echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
				}
			}
		}
	}
	elseif ($type=="s") {
		
	}
	elseif($type=="o"){
		$q='select * from operator';
		$p=$pd->query($q);
		while($row=$p->fetch())
		{
			if($row[0]==$user)
			{
				if($row[2]==$pass)
				{
					$_SESSION['user']=(int)$user;
					$_SESSION['pass']=$pass;
					$URL="operator.php";
					echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
					echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
				}
			}
		}
	}
	else{

	}
}

if(isset($_POST['exit']))
{
	session_destroy();
}
?>