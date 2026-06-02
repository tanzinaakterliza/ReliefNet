<?php
session_start();
$pageTitle = 'Login';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // চেক কর নতুন সাইন আপ করা ইউজার কি না
    if (isset($_SESSION['new_user']) && 
        $_SESSION['new_user']['username'] == $username && 
        $_SESSION['new_user']['password'] == $password) {
        
        $_SESSION['loggedin'] = true;
        $_SESSION['role'] = $_SESSION['new_user']['role'];
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit;
    }

    // ডিফল্ট টেস্ট অ্যাকাউন্ট
    if ($username == 'user' && $password == '123') {
        $_SESSION['loggedin'] = true;
        $_SESSION['role'] = 'user';
        $_SESSION['username'] = 'User';
        header('Location: index.php');
    } elseif ($username == 'admin' && $password == 'admin123') {
        $_SESSION['loggedin'] = true;
        $_SESSION['role'] = 'admin';
        $_SESSION['username'] = 'Admin';
        header('Location: index.php');
    } else {
        $error = "Invalid username or password!";
    }
}
include 'header.php';
?>

<main class="login-page">
    <div class="login-form">
        <h2>Login to ReliefNet</h2>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Login</button>
        </form>
        <p>New here? <a href="signup.php">Sign Up</a></p>
    </div>
</main>

<?php include 'footer.php'; ?>