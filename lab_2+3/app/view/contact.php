<?php
// contact.php

$name = "Nguyen Thanh Binh";
$email = "binh.nguyen13032004@hcmut.edu.vn";
$phone = "+84 123 456 789";
$address = "Ho Chi Minh City, Vietnam";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Info</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">  
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../public/css/styles.css">
</head>
<body class="bg-light d-flex align-items-center" style="min-height: 100vh;">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold">Contact Information</h2>
                    </div>

                    <div class="mb-4">
                        <div class="mb-3">
                            <span class="text-muted small text-uppercase fw-semibold">Name</span>
                            <p class="fs-5 mb-0"><?php echo $name; ?></p>
                        </div>
                        
                        <div class="mb-3">
                            <span class="text-muted small text-uppercase fw-semibold">Email</span>
                            <p class="fs-5 mb-0"><a href="mailto:<?php echo $email; ?>" class="text-decoration-none"><?php echo $email; ?></a></p>
                        </div>
                        
                        <div class="mb-3">
                            <span class="text-muted small text-uppercase fw-semibold">Phone</span>
                            <p class="fs-5 mb-0"><?php echo $phone; ?></p>
                        </div>
                        
                        <div>
                            <span class="text-muted small text-uppercase fw-semibold">Address</span>
                            <p class="fs-5 mb-0"><?php echo $address; ?></p>
                        </div>
                    </div>

                    <!-- Back to Menu Button -->
                    <a href="home.php" class="btn btn-primary btn-lg w-100">Back to Menu</a>
                    
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>