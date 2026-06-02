<?php
$pageTitle = 'Contact';
include 'header.php';

// PHP Form Handling
$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (empty($name)) $errors[] = 'Full Name is required.';
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Valid Email is required.';
    if (empty($message)) $errors[] = 'Your message is required.';

    if (empty($errors)) {
        // Save to text file
        $data = "Name: $name\nEmail: $email\nPhone: $phone\nMessage: $message\nDate: " . date('Y-m-d H:i:s') . "\n\n---\n\n";
        file_put_contents('messages.txt', $data, FILE_APPEND);
        $success = true;
    }
}
?>

<main class="contact-page">
    <!-- Hero Section -->
    <section class="contact-hero">
        <div class="overlay"></div>
        <div class="hero-content">
            <h1>Contact Us</h1>
            <p class="tagline">Get in Touch for Help or Support</p>
        </div>
    </section>

    <!-- Contact Form + Info -->
    <section class="contact-main">
        <div class="container">
            <div class="contact-wrapper">
                <!-- Contact Info Box -->
                <div class="contact-info">
                    <h2 class="contact-title">Why Contact Us?</h2>
                    <p class="contact-desc">
                        We are here to help affected people, volunteers, donors, and admins for any issues related to ReliefNet. Your feedback is valuable and helps us improve the platform.
                    </p>

                    <h3 class="sub-title">Support Hours</h3>
                    <p class="support-hours">
                        24 hours a day, 7 days a week
                        
                    </p>

                    <h3 class="sub-title">Contact Info</h3>
                    <p class="contact-details">
                        Email: support@reliefnet.org<br>
                        Phone: +880 1976543009
                    </p>
                </div>

                <!-- Contact Form -->
                <div class="contact-form-box">
                    <h2 class="form-title">Send Message</h2>

                    <?php if ($success): ?>
                        <p class="success-msg">Thank you! Your message has been sent successfully.</p>
                    <?php endif; ?>

                    <?php if (!empty($errors)): ?>
                        <div class="error-msg">
                            <?php foreach ($errors as $error): ?>
                                <p><?php echo $error; ?></p>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST" class="contact-form">
                        <input type="text" name="name" placeholder="Full Name" value="<?php echo htmlspecialchars($name ?? ''); ?>" required>
                        <input type="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
                        <input type="text" name="phone" placeholder="Phone (optional)" value="<?php echo htmlspecialchars($phone ?? ''); ?>">
                        <textarea name="message" placeholder="Your message" rows="6" required><?php echo htmlspecialchars($message ?? ''); ?></textarea>
                        <button type="submit" class="send-btn">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>