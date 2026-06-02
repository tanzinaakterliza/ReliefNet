<?php
$pageTitle = 'Dashboard';
include 'header.php';
?>

<main class="dashboard-page">
    <div class="dashboard-header">
        <h1>Welcome to user !</h1>
        <p>Manage all relief operations from one place</p>
    </div>

    <!-- Small Beautiful Cards Grid -->
    <div class="cards-grid">
        <!-- Card 1 -->
        <div class="dash-card">
            <div class="card-icon">Users</div>
            <h3>Manage Users</h3>
            <p class="count">47</p>
            <small>Total Registered Users</small>
        </div>

        <!-- Card 2 -->
        <div class="dash-card pending">
            <div class="card-icon">Help</div>
            <h3>Help Requests</h3>
            <p class="count">12</p>
            <small>Pending Requests</small>
        </div>

        <!-- Card 3 -->
        <div class="dash-card success">
            <div class="card-icon">Donations</div>
            <h3>Donations</h3>
            <p class="count">৳85,420</p>
            <small>Total Collected</small>
        </div>

        <!-- Card 4 -->
        <div class="dash-card warning">
            <div class="card-icon">Updates</div>
            <h3>Post Updates</h3>
            <p class="count">Live</p>
            <small>Send real-time alerts</small>
        </div>

        <!-- Card 5 -->
        <div class="dash-card info">
            <div class="card-icon">Volunteers</div>
            <h3>Active Volunteers</h3>
            <p class="count">320+</p>
            <small>Ready for deployment</small>
        </div>

        <!-- Card 6 -->
        <div class="dash-card danger">
            <div class="card-icon">Alerts</div>
            <h3>Active Alerts</h3>
            <p class="count">3</p>
            <small>Ongoing disasters</small>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>