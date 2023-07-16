<?php

// !server
$server = "localhost";
$dbuser = "itbpress_errorsans";
$dbpass = "";
$dbname = "itbpress_eazypublish";

// !local
// $server = "localhost";
// $dbuser = "root";
// $dbpass = "";
// $dbname = "itbpress_errorsans";

//konek ke database
$conn = mysqli_connect($server, $dbuser, $dbpass, $dbname);

?>