<?php
include 'imports.php';
include 'db_config.php';
$q='select * from product';
$p=$pd->query($q);
?>
<html>
<head>
  <title>inventory</title>
</head>
<body class="">
<div class="w3-padding w3-margin-right">
<table class="w3-table w3-blue w3-border w3-margin w3-padding w3-bordered">
<tr class="w3-large">
  <th>Product ID</th>
  <th>MRP</th>
  <th>Product name</th>
  <th>Quantity</th>
  <th>Cost price</th>
</tr>
<?php
while($row=$p->fetch())
{
  echo '
  <tr>
  <td>'.$row[0].'</td>
  <td>'.$row[1].'</td>
  <td>'.$row[2].'</td>
  <td>'.$row[3].'</td>
  <td>'.$row[4].'</td>
  </tr>';
}
?>
</table>
<div class=" w3-tooltip" style="width: 300px;">
<button class="w3-button w3-margin w3-circle w3-red w3-hover-black w3-xxlarge">+</button><span class="w3-text w3-tag w3-small">Click to add new items to inventory</span></div>
</div>
</body>
</html>