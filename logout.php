<?php
session_start();
session_reset();

echo header('Location:login.php');
