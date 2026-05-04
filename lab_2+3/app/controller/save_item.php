<?php
include "../..config/database.php";

if(isset($_POST['submit'])){

$name = $_POST['name'];
$price = $_POST['price'];
$category_id = $_POST['category_id'];
$description = $_POST['description'];

$sql = "INSERT INTO items (name, price, category_id, description)
VALUES ('$name','$price','$category_id','$description')";

$conn->query($sql);

}
?>