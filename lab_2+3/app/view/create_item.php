<?php
include "../../config/database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Item</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">  
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../public/css/styles.css">
</head>

<body class="bg-light">

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            
            <!-- Form Card -->
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-white border-0 pt-4 pb-0 text-center">
                    <h3 class="fw-bold m-0">Add New Item</h3>
                    <p class="text-muted mt-1">Fill out the details below to add to the inventory.</p>
                </div>
                
                <div class="card-body p-4 p-md-5">
                    <form method="POST" action="save_item.php">
                        
                        <!-- Name Field -->
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Item Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="e.g., Spring Rolls" required>
                        </div>

                        <!-- Price & Category Row -->
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="price" class="form-label fw-semibold">Price</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white">$</span>
                                    <input type="text" class="form-control border-start-0" id="price" name="price" placeholder="5.99" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="category_id" class="form-label fw-semibold">Category ID</label>
                                <input type="number" class="form-control" id="category_id" name="category_id" placeholder="e.g., 1" required>
                            </div>
                        </div>

                        <!-- Description Field -->
                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Briefly describe the item..."></textarea>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-grid gap-2">
                            <button type="submit" name="submit" class="btn btn-success btn-lg">Save Item</button>
                            <a href="home.php" class="btn btn-outline-secondary">Cancel</a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>