<?php
include 'imports.php';
include 'db_config.php';
$q='select * from product';
$p=$pd->query($q);
?>
<html>
<head>
	<title>billing</title>
</head>
<body>
<div class="w3-card-1 w3-margin w3-padding w3-threequarter w3-display-topmiddle">
<h2 class="w3-center w3-container w3-black w3-padding">Billing</h2><br>
<form oninput="x.value=parseInt(a.value)*parseInt(b.value)">
<h4 class="w3-right w3-margin-right">Operator-id : <input type="number" class="w3-right" name="opid" class="w3-input w3-quarter"></h4><br><br><br><br><br>
<h4><input class="w3-input" placeholder="Enter customer name" type="text" name="cname"></h4>
<div class="w3-margin">
<h4><input list="items" name="pname" type="text" class="w3-input w3-half w3-left w3-margin-bottom w3-border w3-border-red" placeholder="Search for product here"></h4></div><br><br>
<datalist id="items">
<?php
while($row=$p->fetch())
{
echo '
<option value="'.$row[0].'">'.$row[2].'</option>
';	
}
?>
</datalist>
<div class="w3-left"><h4 class="w3-left w3-margin">Quantity : <input id="a" class="w3-input w3-border" type="number" name="quantity"></h4><h4 class="w3-left w3-margin">Rate : <input id="b" class="w3-input w3-border" type="number" name="rate"></h4><h4 class="w3-left w3-margin">Total : <output name="x" class="" for="a b"></output>
</h4>
</div>
<div class="w3-right w3-padding w3-border w3-border-green w3-margin">
	<h4 class=""><input type="checkbox" class="w3-check w3-margin-right" name="mem">Member</h4><br>
	<button type="submit" name="sub" class="w3-button w3-green">Buy goods</button>
</div>
<br><br><br><br><br><br>
<div class="w3-left w3-margin-top">
	<a href="operator.php" class="w3-button w3-blue w3-round-xxlarge w3-margin">Back</a>
	<button type="reset" class="w3-button w3-black w3-round-xxlarge w3-margin" onclick="clear()">Clear</button>
</div>
</form>
<form method="POST" action="index.php">
	<button type="submit" name="exit" class="w3-button w3-red w3-round-xxlarge w3-margin">Exit</button>
</form>
</div>
</body>
</html>