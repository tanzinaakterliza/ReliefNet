<?php
$pageTitle = 'Donate';
include 'header.php';

define('DONATION_FILE', __DIR__ . '/donations.txt');

session_start();

// CSRF Token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$errors = [];
$success = false;

// Default values
$name = $email = $amount = $method = $message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    /* ---------- CSRF Check ---------- */
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $errors[] = 'Invalid form submission. Please try again.';
    }

    /* ---------- Sanitize Inputs ---------- */
    $name    = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS));
    $email   = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $amount  = trim(filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
    $method  = trim(filter_input(INPUT_POST, 'method', FILTER_SANITIZE_SPECIAL_CHARS));
    $message = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS));

    /* ---------- Validation ---------- */
    if ($name === '') {
        $errors[] = 'Full Name is required.';
    }

    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'A valid email address is required.';
    }

    if ($amount === '' || !is_numeric($amount) || $amount < 100) {
        $errors[] = 'Donation amount must be at least ৳100.';
    }

    if ($method === '') {
        $errors[] = 'Please select a payment method.';
    }

    /* ---------- Save Donation ---------- */
    if (empty($errors)) {

        $record = [
            'date'    => date('Y-m-d H:i:s'),
            'name'    => $name,
            'email'   => $email,
            'amount'  => $amount,
            'method'  => $method,
            'message' => $message
        ];

        $data = json_encode($record, JSON_UNESCAPED_UNICODE) . PHP_EOL;

        file_put_contents(DONATION_FILE, $data, FILE_APPEND | LOCK_EX);

        $_SESSION['donation_success'] = true;

        // Prevent resubmission
        header('Location: donate.php');
        exit;
    }
}

/* ---------- Success Message ---------- */
if (!empty($_SESSION['donation_success'])) {
    $success = true;
    unset($_SESSION['donation_success']);
}
?>

<main class="donate-page">

    <!-- Hero Section -->
    <section class="donate-hero">
        <div class="hero-content">
            <h1>Donate Now</h1>
            <p class="tagline">Your Support Can Change Lives</p>
        </div>
    </section>

    <!-- Donation Form -->
    <section class="donate-form-section">
        <div class="container">
            <div class="donate-box">

                <h2>Make a Donation</h2>
                <p class="donate-desc">
                    Your contribution helps us deliver timely aid to communities affected by disasters across Bangladesh.
                </p>

                <?php if ($success): ?>
                    <div class="success-msg">
                        <h3>Thank You!</h3>
                        <p>Your donation has been successfully recorded. We truly appreciate your support.</p>
                    </div>
                <?php endif; ?>

                <?php if (!empty($errors)): ?>
                    <div class="error-msg">
                        <h3>Please correct the following:</h3>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form method="post" class="donate-form" novalidate>

                    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">

                    <div class="form-group">
                        <label for="name">Full Name *</label>
                        <input type="text" id="name" name="name" value="<?= htmlspecialchars($name); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" value="<?= htmlspecialchars($email); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="amount">Donation Amount (BDT) *</label>
                        <input type="number" id="amount" name="amount" min="100" step="50"
                               value="<?= htmlspecialchars($amount); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="method">Payment Method *</label>
                        <select id="method" name="method" required>
                            <option value="">-- Select Method --</option>
                            <?php
                            $methods = ['bKash', 'Nagad', 'Rocket', 'Bank Transfer', 'Credit/Debit Card'];
                            foreach ($methods as $m):
                            ?>
                                <option value="<?= $m ?>" <?= ($method === $m) ? 'selected' : '' ?>>
                                    <?= $m ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">Message (Optional)</label>
                        <textarea id="message" name="message"><?= htmlspecialchars($message); ?></textarea>
                    </div>

                    <button type="submit" class="donate-btn">
                        Complete Donation
                    </button>

                </form>
            </div>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>
