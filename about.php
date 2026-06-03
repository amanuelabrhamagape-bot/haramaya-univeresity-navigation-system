<?php
require_once 'db.php';
$page_title = 'About';
$loc_count = $pdo->query("SELECT COUNT(*) FROM locations")->fetchColumn();
$msg_count = $pdo->query("SELECT COUNT(*) FROM contact_messages")->fetchColumn();
require_once 'includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <div class="page-hero-content">
            <h1><i class="fas fa-info-circle"></i> About Haramaya University Navigator</h1>
            <p>Serving Haramaya University since 1952</p>
        </div>
    </div>
</section>

<section class="about-section">
    <div class="container">

        <!-- Mission -->
        <div class="about-grid animate-on-scroll">
            <div class="about-text">
                <span class="section-tag">Our Mission</span>
                <h2>Helping Everyone Navigate <span class="gradient-text">Haramaya University</span></h2>
                <p>Haramaya University Navigator is designed to help students, faculty, and visitors easily navigate our historic campus. Founded in 1952 in the Eastern Highlands of Ethiopia, Haramaya University is renowned for its excellence in agriculture, research, and community development. We provide an interactive, user-friendly platform that makes finding colleges, buildings, and services simple and efficient.</p>
                <p>Built with modern web technologies, Haramaya University Navigator delivers a fast, reliable, and beautiful experience on every device.</p>
                <ul class="check-list">
                    <li><i class="fas fa-check-circle"></i> Interactive campus map with clickable buildings</li>
                    <li><i class="fas fa-check-circle"></i> Detailed info for each location from a live database</li>
                    <li><i class="fas fa-check-circle"></i> Smart search & category filtering</li>
                    <li><i class="fas fa-check-circle"></i> Turn-by-turn walking directions</li>
                    <li><i class="fas fa-check-circle"></i> Fully responsive on mobile, tablet & desktop</li>
                    <li><i class="fas fa-check-circle"></i> Contact form with server-side validation</li>
                    <li><i class="fas fa-check-circle"></i> Covers 8 Haramaya University buildings & colleges</li>
                </ul>
            </div>
            <div class="stats-box">
                <div class="stat-card-big">
                    <h3><?= $loc_count ?>+</h3>
                    <p>Campus Locations</p>
                </div>
                <div class="stat-card-big">
                    <h3>100%</h3>
                    <p>Mobile Friendly</p>
                </div>
                <div class="stat-card-big">
                    <h3>24/7</h3>
                    <p>Always Available</p>
                </div>
                <div class="stat-card-big">
                    <h3><?= $msg_count ?></h3>
                    <p>Messages Received</p>
                </div>
            </div>
        </div>

        <!-- Tech Stack -->
        <div class="tech-section animate-on-scroll">
            <div class="section-header">
                <span class="section-tag">Built With</span>
                <h2>Technologies <span class="gradient-text">Used</span></h2>
            </div>
            <div class="tech-grid">
                <div class="tech-card">
                    <i class="fab fa-html5" style="color:#e34f26"></i>
                    <h3>HTML5</h3>
                    <p>Semantic markup & structure</p>
                </div>
                <div class="tech-card">
                    <i class="fab fa-css3-alt" style="color:#1572b6"></i>
                    <h3>CSS3</h3>
                    <p>Styling, Grid, Flexbox, animations</p>
                </div>
                <div class="tech-card">
                    <i class="fab fa-js" style="color:#f7df1e"></i>
                    <h3>JavaScript</h3>
                    <p>Interactive map & live validation</p>
                </div>
                <div class="tech-card">
                    <i class="fab fa-php" style="color:#777bb4"></i>
                    <h3>PHP</h3>
                    <p>Server-side logic & routing</p>
                </div>
                <div class="tech-card">
                    <i class="fas fa-database" style="color:#4479a1"></i>
                    <h3>MySQL</h3>
                    <p>Dynamic data storage & retrieval</p>
                </div>
                <div class="tech-card">
                    <i class="fas fa-vector-square" style="color:#ff6b35"></i>
                    <h3>SVG Map</h3>
                    <p>Scalable interactive campus map</p>
                </div>
            </div>
        </div>

    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
