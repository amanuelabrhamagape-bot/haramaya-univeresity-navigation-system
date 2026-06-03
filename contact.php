<?php
require_once 'db.php';
$page_title = 'Contact';
$success = false;
$errors  = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name']    ?? '');
    $email   = trim($_POST['email']   ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (strlen($name) < 2)              $errors[] = 'Name must be at least 2 characters.';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Please enter a valid email address.';
    if (strlen($message) < 10)          $errors[] = 'Message must be at least 10 characters.';
    if (strlen($message) > 1000)        $errors[] = 'Message must not exceed 1000 characters.';

    if (empty($errors)) {
        $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (?,?,?,?)");
        $stmt->execute([$name, $email, $subject, $message]);
        $success = true;
    }
}

require_once 'includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <div class="page-hero-content">
            <h1><i class="fas fa-envelope"></i> Contact Us</h1>
            <p>We're here to help you navigate Haramaya University</p>
        </div>
    </div>
</section>

<section class="contact-section">
    <div class="container">
        <div class="contact-grid">

            <!-- Form -->
            <div class="contact-form-card animate-on-scroll">
                <h2>Send Us a Message</h2>

                <?php if ($success): ?>
                <div class="success-box">
                    <i class="fas fa-check-circle"></i>
                    <h3>Message Sent!</h3>
                    <p>Thank you! We'll get back to you within 24 hours.</p>
                    <a href="/cns/contact.php" class="btn btn-primary">Send Another</a>
                </div>
                <?php else: ?>

                <?php if ($errors): ?>
                <div class="error-box">
                    <?php foreach ($errors as $err): ?>
                    <p><i class="fas fa-exclamation-circle"></i> <?= htmlspecialchars($err) ?></p>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <form method="POST" id="contactForm" novalidate>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name"><i class="fas fa-user"></i> Full Name *</label>
                            <input type="text" id="name" name="name" required
                                   value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"
                                   placeholder="Your full name">
                            <span class="field-error" id="nameErr"></span>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="fas fa-envelope"></i> Email Address *</label>
                            <input type="email" id="email" name="email" required
                                   value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                                   placeholder="your@email.com">
                            <span class="field-error" id="emailErr"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subject"><i class="fas fa-tag"></i> Subject</label>
                        <input type="text" id="subject" name="subject"
                               value="<?= htmlspecialchars($_POST['subject'] ?? '') ?>"
                               placeholder="What is this about?">
                    </div>
                    <div class="form-group">
                        <label for="message"><i class="fas fa-comment"></i> Message *</label>
                        <textarea id="message" name="message" rows="6" required
                                  placeholder="Type your message here..."><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
                        <div class="char-counter"><span id="charCount">0</span> / 1000</div>
                        <span class="field-error" id="msgErr"></span>
                    </div>
                    <button type="submit" class="btn btn-primary btn-full btn-lg" id="submitBtn">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                </form>
                <?php endif; ?>
            </div>

            <!-- Contact Info -->
            <div class="contact-info-col animate-on-scroll">
                <h2>Get in Touch</h2>
                <p>Have questions about campus navigation? We're here to help you find your way!</p>

                <div class="info-cards-list">
                    <div class="info-card-item">
                        <div class="info-card-icon" style="background:linear-gradient(135deg,#2563eb,#7c3aed)">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h4>Visit Us</h4>
                            <p>Administration Building<br>Haramaya University, Haramaya, Oromia, Ethiopia</p>
                        </div>
                    </div>
                    <div class="info-card-item">
                        <div class="info-card-icon" style="background:linear-gradient(135deg,#10b981,#2563eb)">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div>
                            <h4>Call Us</h4>
                            <p>Main: +251 25 553 0091<br>Support: +251 25 553 0092</p>
                        </div>
                    </div>
                    <div class="info-card-item">
                        <div class="info-card-icon" style="background:linear-gradient(135deg,#f59e0b,#ef4444)">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h4>Email Us</h4>
                            <p>info@haramaya.edu.et<br>support@haramaya.edu.et</p>
                        </div>
                    </div>
                    <div class="info-card-item">
                        <div class="info-card-icon" style="background:linear-gradient(135deg,#7c3aed,#c62828)">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div>
                            <h4>Office Hours</h4>
                            <p>Mon–Fri: 8:30 AM – 5:30 PM<br>Sat: 9:00 AM – 1:00 PM</p>
                        </div>
                    </div>
                </div>

                <!-- FAQ -->
                <div class="mini-faq">
                    <h3>Quick FAQ</h3>
                    <div class="faq-item-mini">
                        <strong><i class="fas fa-question-circle"></i> How do I use the map?</strong>
                        <p>Click on any building to see details, hours, and services.</p>
                    </div>
                    <div class="faq-item-mini">
                        <strong><i class="fas fa-question-circle"></i> Is this mobile friendly?</strong>
                        <p>Yes! Campus Navigator works perfectly on all devices.</p>
                    </div>
                    <div class="faq-item-mini">
                        <strong><i class="fas fa-question-circle"></i> How accurate are directions?</strong>
                        <p>Directions are based on real walking paths between buildings.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
// Character counter
const msg  = document.getElementById('message');
const cnt  = document.getElementById('charCount');
if (msg && cnt) {
    msg.addEventListener('input', () => {
        const len = msg.value.length;
        cnt.textContent = len;
        cnt.style.color = len > 900 ? '#ef4444' : len > 700 ? '#f59e0b' : '#6b7280';
    });
}

// Live validation
function validate(id, errId, rule, msg) {
    const el = document.getElementById(id);
    const er = document.getElementById(errId);
    if (!el || !er) return;
    el.addEventListener('blur', () => {
        if (!rule(el.value)) { er.textContent = msg; el.classList.add('invalid'); }
        else                 { er.textContent = '';  el.classList.remove('invalid'); }
    });
    el.addEventListener('input', () => { er.textContent = ''; el.classList.remove('invalid'); });
}

validate('name',    'nameErr',  v => v.trim().length >= 2, 'Name must be at least 2 characters.');
validate('email',   'emailErr', v => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v), 'Enter a valid email address.');
validate('message', 'msgErr',   v => v.trim().length >= 10 && v.length <= 1000, 'Message must be 10–1000 characters.');
</script>

<?php require_once 'includes/footer.php'; ?>
