<?php
session_start();
$pageTitle = 'Admin Panel';
if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit;
}
include 'header.php';
?>

<main class="admin-panel">
    <div class="container">
        <h1 class="page-title">Admin Panel – <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
        <p class="page-subtitle">Full control over ReliefNet platform</p>

        <div class="features-grid">
            <div class="feature-box" onclick="addUser()">
                <i class="fas fa-users-cog fa-3x icon-admin"></i>
                <h3>Manage Users</h3>
                <p>Total Users: <strong id="user-count">47</strong></p>
            </div>

            <div class="feature-box" onclick="approveRequest()">
                <i class="fas fa-clipboard-check fa-3x icon-admin"></i>
                <h3>Help Requests</h3>
                <p>Pending: <strong id="pending-count">12</strong></p>
            </div>

            <div class="feature-box" onclick="verifyDonation()">
                <i class="fas fa-hand-holding-heart fa-3x icon-admin"></i>
                <h3>Donations</h3>
                <p>Total: ৳<strong id="total-donation">850,000</strong></p>
            </div>

            <div class="feature-box" onclick="postUpdate()">
                <i class="fas fa-bullhorn fa-3x icon-admin"></i>
                <h3>Post Updates</h3>
                <p>Send real-time disaster alerts</p>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>