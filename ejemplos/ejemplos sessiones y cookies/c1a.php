<?php
setcookie("contador", "", time() - 3600);
header("Location: c1.php");

?>