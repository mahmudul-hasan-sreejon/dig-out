<?php

ob_start();

try {
    $conn = new PDO("mysql:dbname=dig_out;host=localhost", "root", "1");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch(PDOException $e) {
    echo "Connection failed: ". $e->getMessage();
}

?>
