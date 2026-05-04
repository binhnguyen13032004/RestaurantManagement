<?php
require '../../config/db.php';
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // 1. Input Validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } elseif (strlen($password) < 8) {
        $error = "Password must be at least 8 characters long.";
    } else {
        // 2. Check if email already exists
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $error = "Email is already registered.";
        } else {
            // 3. Hash Password (NEVER store plain text)
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // 4. Insert User
            $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
            if ($stmt->execute([$email, $hashed_password])) {
                $success = "Registration successful! You can now login.";
            } else {
                $error = "Something went wrong. Please try again.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Account Creation</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">  
    <!-- Custom CSS (Assuming this file is in your root folder) -->
    <link rel="stylesheet" href="../../public/css/styles.css">
</head>

<body class="bg-light d-flex align-items-center" style="min-height: 100vh;">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold">Create an Account</h2>
                        <p class="text-muted">Join us to manage your orders</p>
                    </div>

                    <!-- Alerts for Error/Success -->
                    <?php if($error): ?>
                        <div class="alert alert-danger rounded-3" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>

                    <?php if($success): ?>
                        <div class="alert alert-success rounded-3" role="alert">
                            <?php echo $success; ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="name@example.com" required>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Min. 8 characters" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 btn-lg mb-3">Register</button>
                    </form>

                    <div class="text-center mt-3">
                        <p class="text-muted mb-0">Already have an account? <a href="login.php" class="text-decoration-none fw-bold">Login here</a></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>