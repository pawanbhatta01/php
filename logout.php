<?php
session_start();

unset($_SESSION['email']);
unset($_SESSION['name']);
unset($_SESSION['id']);

echo header('Location:login.php');
