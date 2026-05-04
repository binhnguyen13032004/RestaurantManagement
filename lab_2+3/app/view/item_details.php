<?php

$id = $_GET['id'];

$items = [
1 => [
"name" => "Pho",
"image" => "../../public/images/item1.jpg",
"description" => "Traditional Vietnamese noodle soup.",
"price" => "$12",
"category" => "Noodle Soup"
],

2 => [
"name" => "Bun Bo Hue",
"image" => "../../public/images/item2.jpg",
"description" => "Spicy beef noodle soup from Hue.",
"price" => "$13",
"category" => "Noodle Soup"
],

3 => [
"name" => "Spring Rolls",
"image" => "../../public/images/item3.jpg",
"description" => "Fresh shrimp and herb rolls.",
"price" => "$8",
"category" => "Appetizer"
],

4 => [
"name" => "Banh Mi",
"image" => "../../public/images/item4.jpg",
"description" => "Vietnamese sandwich with pork.",
"price" => "$7",
"category" => "Sandwich"
],

5 => [
"name" => "Fried Rice",
"image" => "../../public/images/item5.jpg",
"description" => "Rice stir fried with vegetables.",
"price" => "$9",
"category" => "Rice"
],

6 => [
"name" => "Vietnamese Coffee",
"image" => "../../public/images/item6.jpg",
"description" => "Strong coffee with condensed milk.",
"price" => "$4",
"category" => "Drink"
]
];



$item = $items[$id];




?>



<!DOCTYPE html>
<html>
<head>
<title>Item Details</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/styles.css">

</head>

<body>

<div class="container mt-5 mb-5 item-details-container">
    <div class="row align-items-center bg-white p-4 rounded-4 shadow-sm">
        
        <!-- Image Section -->
        <div class="col-md-6 text-center mb-4 mb-md-0">
            <img src="<?php echo $item['image']; ?>" class="img-fluid rounded-3 detail-image" alt="<?php echo $item['name']; ?>">
        </div>

        <!-- Details Section -->
        <div class="col-md-6 pl-md-5">
            <span class="badge bg-secondary mb-2"><?php echo $item['category']; ?></span>
            <h1 class="fw-bold mb-3"><?php echo $item['name']; ?></h1>
            <h3 class="price-tag mb-4"><?php echo $item['price']; ?></h3>
            <p class="lead text-muted mb-4"><?php echo $item['description']; ?></p>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <button class="btn btn-success btn-lg px-4 me-md-2" onclick="alert('Item added to cart!')">Add to Cart</button>
                <a href="home.php" class="btn btn-outline-secondary btn-lg px-4">Back to Menu</a>
            </div>
        </div>

    </div>
</div>
</body>
</html>