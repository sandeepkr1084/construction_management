<?php  

    $conn = new mysqli("localhost:123", "root", "", "construction");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>