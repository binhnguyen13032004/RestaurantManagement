<?php

include '../../config/database.php'; 

$sql = "SELECT * FROM items";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Inventory Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">  
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../public/css/styles.css">
</head>

	<body class="bg-light">

<div class="container mt-5 mb-5">
    
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold m-0">Product Inventory</h2>
        <a href="home.php" class="btn btn-outline-secondary px-4">Back to Menu</a>
    </div>

    <!-- Inventory Table Card -->
    <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0 custom-table">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category ID</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $row) { ?>
                        <tr>
                            <td><strong>#<?php echo $row['id']; ?></strong></td>
                            <td class="fw-semibold"><?php echo $row['name']; ?></td>
                            <td><span class="badge bg-secondary">Cat: <?php echo $row['category_id']; ?></span></td>
                            <td class="text-success fw-bold">$<?php echo $row['price']; ?></td>
                            <td class="text-muted"><?php echo $row['description']; ?></td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary">Edit</button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

</body>
</html>