<?php
include('../config/database.php');
session_destroy();
header("Location: ../template/login.php");
exit;
?>