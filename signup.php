<?php
session_start();
$pageTitle = 'Sign Up';
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'];
    $role     = $_POST['role'];

    if (empty($username) || empty($email) || empty($password) || empty($role)) {
        $error = "All fields are required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format!";
    } else {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['email']    = $email;
        $_SESSION['role']     = $role;

        if ($role == 'admin') {
            header('Location: admin.php');
        } else {
            header('Location: dashboard.php');
        }
        exit;
    }
}
?>

<div class="signup-wrapper">
    <!-- "Create Account" লেখাটা এখন Full Name-এর উপরে বড় করে দেখাবে -->
    <div class="signup-title">
        <h1>Create Account</h1>
        <p>Join ReliefNet and be a part of life-saving missions</p>
    </div>

    <!-- বোর্ডটা এখুব সুন্দর ও ছোট সাইজে -->
    <div class="signup-card">
        <?php if (isset($error)): ?>
            <div class="error-msg"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST" class="signup-form">
            <div class="form-group">
                <input type="text" name="username" placeholder="Full Name" required>
            </div>

            <div class="form-group">
                <input type="email" name="email" placeholder="Email Address" required>
            </div>

            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <div class="form-group">
                <label class="role-label">I want to register as:</label>
                <div class="role-buttons">
                    <label class="role-btn">
                        <input type="radio" name="role" value="user" required>
                        <span>User</span>
                    </label>
                    <label class="role-btn">
                        <input type="radio" name="role" value="admin">
                        <span>Admin</span>
                    </label>
                </div>
            </div>

            <button type="submit" class="create-btn">Create Account</button>
        </form>

        <p class="login-link">
            Already have an account? <a href="login.php">Log in</a>
        </p>
    </div>
</div>

<?php include 'footer.php'; ?>