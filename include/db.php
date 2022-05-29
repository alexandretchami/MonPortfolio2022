<?php
session_start();
error_reporting(0);
$db = mysqli_connect('localhost', 'root', '', 'alexandreportfolio') or die("database not connected !");
