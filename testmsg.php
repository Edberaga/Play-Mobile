<?php
$msg = "The mail message was sent with following mail";
$head = "From: edbert@gmail.com";
mail("edbert@gmail.com", "Testinf", $msg, $head);
echo "Test message";
?>