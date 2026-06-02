<?php $pageTitle = 'Home'; include 'header.php'; ?>

<main class="home-page">
    <!-- Hero Section – তোর স্ক্রিনশটের মতো -->
    <section class="hero">
        <div class="overlay"></div>
        <div class="hero-content">
            <h1>ReliefNet</h1>
            <p class="tagline">Disaster Help Coordination Platform</p>
            <p class="description">
                Connecting affected people, volunteers, NGOs, and donors in one secure system.<br>
                Fast emergency support, real-time updates, and efficient relief operations.
            </p>
            <div class="hero-buttons">
                <a href="contact.php" class="btn-hero green">Join as Helper</a>
                <a href="donate.php" class="btn-hero red">Donate Now</a>
            </div>
        </div>
    </section>

    <!-- Features Section – নিচে সুন্দর কার্ড (যদি চাস যোগ করতে পারিস) -->
    <section class="features-section">
        <div class="container">
            <h2 class="section-title">Our Key Features</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <h3>Real-Time Disaster Updates</h3>
                    <p>Get live alerts and updates about ongoing disasters and emergency situations.</p>
                </div>
                <div class="feature-card">
                    <h3>Emergency Help Request</h3>
                    <p>Affected people can quickly send help requests with location and needs.</p>
                </div>
                <div class="feature-card">
                    <h3>Volunteer & NGO Coordination</h3>
                    <p>Volunteers and organizations can coordinate relief work efficiently.</p>
                </div>
                <div class="feature-card">
                    <h3>Donation & Resource Management</h3>
                    <p>Securely collect and track donations, food, medicine, and supplies.</p>
                </div>
                <div class="feature-card">
                    <h3>Admin Management System</h3>
                    <p>Admins can monitor, verify, and manage all relief activities from one dashboard.</p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>