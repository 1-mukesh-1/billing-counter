<?php
include "imports.php";
include "db_config.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>createaccount</title>
</head>
<body>
<div style="width: 100%">
<div class="w3-display-topmiddle w3-card-1 w3-margin w3-half">
<h2 class="w3-black w3-container w3-padding w3-center">Create a new account here !!!</h2><br>
<form id="myform" action="createaccount.php" method="POST">
<h4>AdminID :</h4><input type="number" placeholder="Enter a new admin ID" class="w3-input w3-border" name="id">
<h4>Username :</h4><input class="w3-input w3-border" placeholder="Enter username" type="text" name="user">
<h4>Pin :</h4><input type="password" placeholder="Enter a 4-digit PIN" pattern="[0-9]{4}" class="w3-input w3-border" name="pin">
<div class="w3-center">
<button type="submit" name="sub" class="w3-button w3-green w3-round-xxlarge w3-margin">Register</button>
<button type="reset" class="w3-button w3-black w3-round-xxlarge w3-margin" onclick="clear()">Clear</button>
<a href="#" class="w3-button w3-red w3-round-xxlarge w3-margin">Exit</a>
<a href="index.php" class="w3-button w3-blue w3-round-xxlarge w3-margin">Already have an account ,login</a>
</div>
</form>
</div>
</div>
<?php
if(isset($_POST['sub']))
{
	$id=$_POST['id'];
	$user=$_POST['user'];
	$pin=(int)$_POST['pin'];
	$p=$pd->prepare('insert into admin values(?,?,?)');
	$p->bindparam(1,$id);
	$p->bindparam(2,$user);
	$p->bindparam(3,$pin);
	$p->execute();
}
?>
</body>
</html>
<script type="text/javascript">
	function clear()
	{
		document.getElementById('myform').reset();
	}
</script>