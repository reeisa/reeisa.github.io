<?php
session_start();
session_destroy();
header('Location: ../user-dashboard/index.php');
exit;
?>
