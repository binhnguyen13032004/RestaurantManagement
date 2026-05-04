<!DOCTYPE html> 
<html> 

	<head> 
		<title>Item Catalog Website</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">  
    <link rel="stylesheet" href="../../public/css/styles.css">
	</head> 

	<body>



<header class="d-flex justify-content-center align-items-center p-3">
    <img src="../../public/images/logo.png" alt="Restaurant Logo" >
</header>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark"> 
    <div class="container"> 
      <a class="navbar-brand">My Website</a> 
      <ul class="navbar-nav"> 
        <li class="nav-item"><a class="nav-link">Home</a></li> 
        <li class="nav-item"><a class="nav-link" href="search_items.php">Items</a></li> 
        <li class="nav-item"><a class="nav-link" href="search.php">Search</a></li> 
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li> 
      </ul> 
    </div> 
  </nav>

	
	<div class="row">

    <!-- Item 1 -->
    <div class="col-md-4">
      <div class="card">
        <img src="../../public/images/item1.jpg" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">Pho</h5>
          <p class="card-text">Traditional Vietnamese noodle soup.</p>
          <a href="item_details.php?id=1" class="btn btn-primary">View Details</a>
        </div>
      </div>
    </div>

    <!-- Item 2-->
    <div class="col-md-4">
      <div class="card">
        <img src="../../public/images/item2.jpg" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">Bun Bo Hue</h5>
          <p class="card-text">Spicy beef noodle soup from Hue.</p>
          <a href="item_details.php?id=2" class="btn btn-primary">View Details</a>
        </div>
      </div>
    </div>

    <!-- Item 3-->
    <div class="col-md-4">
      <div class="card">
        <img src="../../public/images/item3.jpg" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">Spring Rolls</h5>
          <p class="card-text">Fresh rolls with shrimp and herbs.</p>
          <a href="item_details.php?id=3" class="btn btn-primary">View Details</a>
        </div>
      </div>
    </div>

    <!-- Item 4-->
    <div class="col-md-4">
      <div class="card">
        <img src="../../public/images/item4.jpg" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">Banh Mi</h5>
          <p class="card-text">Vietnamese sandwich with pork.</p>
          <a href="item_details.php?id=4" class="btn btn-primary">View Details</a>
        </div>
      </div>
    </div>

    <!-- Item 5-->
    <div class="col-md-4">
      <div class="card">
        <img src="../../public/images/item5.jpg" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">Fried Rice</h5>
          <p class="card-text">Rice stir fried with vegetables and egg.</p>
          <a href="item_details.php?id=5" class="btn btn-primary">View Details</a>
        </div>
      </div>
    </div>


    <!-- Item 6-->
    <div class="col-md-4">
      <div class="card">
        <img src="../../public/images/item6.jpg" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">Vietnamese Iced Coffee</h5>
          <p class="card-text">Strong coffee with condensed milk.</p>
          <a href="item_details.php?id=6" class="btn btn-primary">View Details</a>
      </div>
    </div>
  </div>

    <div class="d-flex justify-content-center align-items-center p-3">
        <script src="../../public/js/script.js"></script>
        <button class="btn btn-success px-4" onclick="showMessage()">
        Add to Cart
        </button>
    </div>

    <div class="d-flex justify-content-center align-items-center p-3">
        <a href="create_item.php" class="btn btn-success px-4">
            Create Item
        </a>
    </div>

     <div class="d-flex justify-content-center align-items-center p-3">
        <a href="../controller/logout.php" class="btn btn-danger px-4">
            Logout
        </a>
    </div>

    </body>

</html> 