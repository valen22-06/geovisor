<?php

$host = "localhost";
$port = "5433";
$dbname = "geovisor";
$user = "postgres";
$password = "Juan123";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

pg_close($conn);
?>