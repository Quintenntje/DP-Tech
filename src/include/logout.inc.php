<?php
SESSION_START();
session_unset();
SESSION_DESTROY();
header("Location: ../index.php");
exit();
?>