<?php
require '../../config/db.php';
$error = '';

// If user is already logged in, redirect them away from the login page
if (isset($_SESSION['user_id'])) {
    header("Location: home.php"); // Or search.php
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Fetch user by email
    $stmt = $pdo->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // password_verify() safely compares the plain text input against the hashed DB entry
    if ($user && password_verify($password, $user['password'])) {
        // Login Success! Set session variables.
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $email;
        
        header("Location: home.php"); // Redirect to a protected page
        exit;
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Welcome Back</title>
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
                        <h2 class="fw-bold">Welcome Back</h2>
                        <p class="text-muted">Please sign in to your account</p>
                    </div>

                    <!-- Alert for Error -->
                    <?php if($error): ?>
                        <div class="alert alert-danger rounded-3" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="name@example.com" required>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 btn-lg mb-4">Login</button>
                    </form>

                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <a href="register.php" class="text-decoration-none text-muted small">Need an account? <span class="fw-bold text-dark">Register</span></a>
                        <a href="forgot_password.php" class="text-decoration-none text-muted small">Forgot Password?</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
?>

