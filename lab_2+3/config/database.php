<?php

$conn = new mysqli("localhost","root","","project_database1");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>