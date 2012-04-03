<?php


?>
<html>
<?php
$items = []


$transactionId =  mysqli_real_escape_string($db, trim($_POST[transactionId]));


$query = "SELECT DISTINCT p.name, s.quantity, p.price, (s.quantity * p.price) as TotalFROM products p JOIN sales s ON p.productId = s.productId WHERE s.quantity > 0;"
$result = mysqli_query($db, $query);
echo $result




?>


</html>