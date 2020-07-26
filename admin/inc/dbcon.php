<?php
$host   = 'locahost';;
$user   = 'root';
$pass   = '';
$dbname = 'db_shop'; 
$con= new mysqli("localhost", "root", "", "db_shop");

$sql1 = "SELECT * FROM `tbl_order` ";
$orders = count($con->query($sql1));

$sql2 = "SELECT * FROM `tbl_customer` ";
$customers = count($con->query($sql2));
