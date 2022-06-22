<?php
session_start();
error_reporting(1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

$db = mysqli_connect('mysql-tchamidev.alwaysdata.net', 'tchamidev_test0', 'XXXXXXXXXXXX', 'tchamidev_alexandreportfolio') or die("database not connected !");
