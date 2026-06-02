<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReliefNet - <?php echo $pageTitle ?? 'Home'; ?></title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="css/donate.css">

</head>
<body>
    <div class="top-border"></div>

    <nav class="navbar">
        <div class="container">
            <div class="logo">ReliefNet</div>
            <ul class="nav-menu">
                <li><a href="index.php" class="<?php echo ($pageTitle=='Home') ? 'active' : ''; ?>">Home</a></li>
                <li><a href="about.php" class="<?php echo ($pageTitle=='About') ? 'active' : ''; ?>">About</a></li>
                <li><a href="resources.php" class="<?php echo ($pageTitle=='Resources') ? 'active' : ''; ?>">Resources</a></li>
                <li><a href="contact.php" class="<?php echo ($pageTitle=='Contact') ? 'active' : ''; ?>">Contact</a></li>

                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
                    <li>Welcome, <?php echo ucfirst($_SESSION['role']); ?>!</li>
                    <?php if ($_SESSION['role'] == 'admin'): ?>
                        <li><a href="admin.php">Admin Panel</a></li>
                    <?php else: ?>
                        <li><a href="dashboard.php">Dashboard</a></li>
                    <?php endif; ?>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    
                    <li><a href="signup.php">Sign Up</a></li>
                <?php endif; ?>

                <li><button id="theme-toggle" class="theme-btn">Dark Mode</button></li>
            </ul>
        </div>
    </nav>