<?php
session_start();
session_destroy();

unset($_SESSION['name']);
unset($_SESSION['role']);
unset($_SESSION['auth']);

header("Location: ../");

?>