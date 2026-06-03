<?php
require_once 'db.php';
$page_title = 'Home';

// Fetch all locations for quick access
$locations = $pdo->query("SELECT * FROM locations ORDER BY id")->fetchAll();
require_once 'includes/header.php';
?>

<!-- Hero Section -->
<section class="hero hu-hero">

    <!-- Animated background elements -->
    <div class="hu-bg-shapes">
        <div class="hu-shape hu-shape-1"></div>
        <div class="hu-shape hu-shape-2"></div>
        <div class="hu-shape hu-shape-3"></div>
        <div class="hu-shape hu-shape-4"></div>
    </div>

    <div class="container hu-hero-inner">

        <!-- LEFT: Text Content -->
        <div class="hero-content">
            <div class="hu-top-badge">
                <span class="hu-dot"></span>
                Est. 1952 &nbsp;·&nbsp; Haramaya, Ethiopia &nbsp;·&nbsp; Building the Basis for Development
            </div>

            <h1>
                <span class="hu-title-small">Haramaya University</span>
                <span class="hu-title-main">Campus Navigator</span>
            </h1>

            <p>Your official interactive guide to exploring Haramaya University — find colleges, get walking directions, and discover every campus facility.</p>

            <div class="hero-buttons">
                <a href="/cns/map.php"       class="btn hu-btn-gold"><i class="fas fa-map"></i> Explore Map</a>
                <a href="/cns/locations.php" class="btn hu-btn-outline"><i class="fas fa-th-large"></i> View Locations</a>
            </div>

            <div class="hu-gate-gallery">
                <div class="hu-gate-card">
                    <img src="/cns/image1/HrU-Main-Gate.png" alt="Haramaya University Main Gate">
                    <p>Main Gate</p>
                </div>
                <div class="hu-gate-card">
                    <img src="/cns/image1/Haramaya University CVM Gatee.jpg" alt="Haramaya University Veterinary Campus Gate">
                    <p>Veterinary Campus Gate</p>
                </div>
            </div>

            <div class="hu-stats-row">
                <div class="hu-stat">
                    <span><?= count($locations) ?></span>
                    <small>Locations</small>
                </div>
                <div class="hu-stat-divider"></div>
                <div class="hu-stat">
                    <span>1952</span>
                    <small>Founded</small>
                </div>
                <div class="hu-stat-divider"></div>
                <div class="hu-stat">
                    <span>24/7</span>
                    <small>Available</small>
                </div>
            </div>
        </div>

        <!-- RIGHT: HU Logo SVG -->
        <div class="hu-logo-side">
            <div class="hu-logo-ring hu-ring-outer"></div>
            <div class="hu-logo-ring hu-ring-middle"></div>

            <div class="hu-logo-wrap">
                <!-- Haramaya University SVG Emblem -->
                <svg viewBox="0 0 260 260" xmlns="http://www.w3.org/2000/svg" class="hu-svg-logo">
                    <!-- Outer circle border -->
                    <circle cx="130" cy="130" r="122" fill="#1a5c2a" stroke="#d4a017" stroke-width="6"/>
                    <!-- Inner white band -->
                    <circle cx="130" cy="130" r="108" fill="none" stroke="rgba(255,255,255,0.15)" stroke-width="1"/>

                    <!-- Open book (representing education) -->
                    <g transform="translate(130,90)">
                        <!-- Left page -->
                        <path d="M-38,0 Q-20,-18 0,-14 L0,34 Q-20,30 -38,18 Z" fill="#d4a017" opacity="0.95"/>
                        <!-- Right page -->
                        <path d="M38,0 Q20,-18 0,-14 L0,34 Q20,30 38,18 Z" fill="#f0c040" opacity="0.95"/>
                        <!-- Spine -->
                        <rect x="-3" y="-14" width="6" height="48" rx="3" fill="#fff" opacity="0.9"/>
                        <!-- Page lines left -->
                        <line x1="-28" y1="2"  x2="-8"  y2="-2" stroke="rgba(255,255,255,0.5)" stroke-width="1.5"/>
                        <line x1="-28" y1="9"  x2="-8"  y2="5"  stroke="rgba(255,255,255,0.5)" stroke-width="1.5"/>
                        <line x1="-28" y1="16" x2="-8"  y2="12" stroke="rgba(255,255,255,0.5)" stroke-width="1.5"/>
                        <!-- Page lines right -->
                        <line x1="28"  y1="2"  x2="8"   y2="-2" stroke="rgba(255,255,255,0.5)" stroke-width="1.5"/>
                        <line x1="28"  y1="9"  x2="8"   y2="5"  stroke="rgba(255,255,255,0.5)" stroke-width="1.5"/>
                        <line x1="28"  y1="16" x2="8"   y2="12" stroke="rgba(255,255,255,0.5)" stroke-width="1.5"/>
                    </g>

                    <!-- Wheat/Seedling stalks (Agriculture) -->
                    <g transform="translate(130,148)" stroke="#d4a017" stroke-width="2" fill="none">
                        <line x1="0"   y1="0" x2="0"   y2="28"/>
                        <line x1="-22" y1="4" x2="-22" y2="28"/>
                        <line x1="22"  y1="4" x2="22"  y2="28"/>
                        <!-- Left wheat head -->
                        <ellipse cx="-22" cy="2"  rx="7" ry="10" fill="#d4a017" stroke="none" transform="rotate(-15,-22,2)"/>
                        <!-- Right wheat head -->
                        <ellipse cx="22"  cy="2"  rx="7" ry="10" fill="#d4a017" stroke="none" transform="rotate(15,22,2)"/>
                        <!-- Centre wheat head -->
                        <ellipse cx="0"   cy="-2" rx="7" ry="10" fill="#f0c040" stroke="none"/>
                        <!-- Base bar -->
                        <line x1="-22" y1="28" x2="22" y2="28" stroke="#d4a017" stroke-width="2.5"/>
                    </g>

                    <!-- University Name arc (top) -->
                    <path id="arcTop" d="M 28,130 A 102,102 0 0,1 232,130" fill="none"/>
                    <text font-size="12.5" font-weight="700" fill="#f0c040" font-family="Georgia,serif" letter-spacing="2">
                        <textPath href="#arcTop" startOffset="5%">HARAMAYA UNIVERSITY</textPath>
                    </text>

                    <!-- Bottom arc text -->
                    <path id="arcBot" d="M 35,145 A 102,102 0 0,0 225,145" fill="none"/>
                    <text font-size="10" font-weight="600" fill="rgba(255,255,255,0.85)" font-family="Georgia,serif" letter-spacing="1.5">
                        <textPath href="#arcBot" startOffset="12%">EST. 1952 · ETHIOPIA</textPath>
                    </text>

                    <!-- 5-point star top center -->
                    <polygon points="130,14 133,24 143,24 135,30 138,40 130,34 122,40 125,30 117,24 127,24"
                             fill="#d4a017" stroke="#f0c040" stroke-width="0.5"/>
                </svg>
            </div>

            <!-- Floating badges -->
            <div class="hu-float-badge hu-fb-1"><i class="fas fa-seedling"></i> Agriculture</div>
            <div class="hu-float-badge hu-fb-2"><i class="fas fa-flask"></i> Research</div>
            <div class="hu-float-badge hu-fb-3"><i class="fas fa-graduation-cap"></i> Education</div>
            <div class="hu-float-badge hu-fb-4"><i class="fas fa-globe-africa"></i> Ethiopia</div>
        </div>

    </div>
</section>

<!-- Features Section -->
<section class="features-section">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">What We Offer</span>
            <h2>Everything You Need to <br><span class="gradient-text">Navigate Campus</span></h2>
            <p class="section-sub">Haramaya University Navigator gives you all the tools to explore, find and get around campus quickly and easily.</p>
        </div>

        <div class="feat-cards-grid">

            <!-- Card 1 — Campus Maps -->
            <div class="feat-img-card animate-on-scroll">
                <div class="feat-img-wrap">
                    <img src="https://images.unsplash.com/photo-1524661135-423995f22d0b?w=600&q=80"
                         alt="Interactive campus map"
                         onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                    <div class="feat-img-fallback" style="background:linear-gradient(135deg,#2563eb,#7c3aed)">
                        <i class="fas fa-map"></i>
                    </div>
                    <div class="feat-img-overlay">
                        <span class="feat-tag" style="background:#2563eb"><i class="fas fa-map-marker-alt"></i> Map</span>
                    </div>
                </div>
                <div class="feat-card-body">
                    <div class="feat-icon-sm" style="background:linear-gradient(135deg,#2563eb,#7c3aed)">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3>Campus Maps</h3>
                    <p>Click on any building on our live SVG campus map to instantly view details, opening hours, phone numbers and services.</p>
                    <a href="/cns/map.php" class="feat-link">Open Map <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <!-- Card 2 — Smart Search -->
            <div class="feat-img-card animate-on-scroll">
                <div class="feat-img-wrap">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600&q=80"
                         alt="Student searching on campus"
                         onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                    <div class="feat-img-fallback" style="background:linear-gradient(135deg,#f59e0b,#ef4444)">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="feat-img-overlay">
                        <span class="feat-tag" style="background:#f59e0b"><i class="fas fa-search"></i> Search</span>
                    </div>
                </div>
                <div class="feat-card-body">
                    <div class="feat-icon-sm" style="background:linear-gradient(135deg,#f59e0b,#ef4444)">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3>Smart Search</h3>
                    <p>Find any college, building or facility in seconds. Filter by Academic, Services or Facilities with live instant results.</p>
                    <a href="/cns/locations.php" class="feat-link">Search Now <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <!-- Card 3 — Directions -->
            <div class="feat-img-card animate-on-scroll">
                <div class="feat-img-wrap">
                    <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=600&q=80"
                         alt="Students walking on university campus path"
                         onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                    <div class="feat-img-fallback" style="background:linear-gradient(135deg,#10b981,#2563eb)">
                        <i class="fas fa-route"></i>
                    </div>
                    <div class="feat-img-overlay">
                        <span class="feat-tag" style="background:#10b981"><i class="fas fa-route"></i> Directions</span>
                    </div>
                </div>
                <div class="feat-card-body">
                    <div class="feat-icon-sm" style="background:linear-gradient(135deg,#10b981,#2563eb)">
                        <i class="fas fa-route"></i>
                    </div>
                    <h3>Turn-by-Turn Directions</h3>
                    <p>Get step-by-step walking directions between any two buildings on campus — with exact distances and time estimates.</p>
                    <a href="/cns/directions.php" class="feat-link">Get Directions <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <!-- Card 4 — Mobile Friendly -->
            <div class="feat-img-card animate-on-scroll">
                <div class="feat-img-wrap">
                    <img src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=600&q=80"
                         alt="Student using mobile phone on campus"
                         onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                    <div class="feat-img-fallback" style="background:linear-gradient(135deg,#7c3aed,#c62828)">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <div class="feat-img-overlay">
                        <span class="feat-tag" style="background:#7c3aed"><i class="fas fa-mobile-alt"></i> Mobile</span>
                    </div>
                </div>
                <div class="feat-card-body">
                    <div class="feat-icon-sm" style="background:linear-gradient(135deg,#7c3aed,#c62828)">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3>Mobile Friendly</h3>
                    <p>Fully responsive on every device — phone, tablet or desktop. Access Haramaya University Navigator anywhere, anytime.</p>
                    <a href="/cns/locations.php" class="feat-link">Explore Now <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

        </div><!-- end feat-cards-grid -->
    </div>
</section>

<!-- Quick Access Locations -->
<section class="quick-access">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Campus Buildings</span>
            <h2>Quick Access to <span class="gradient-text">All Locations</span></h2>
            <p class="section-sub">Click any building to view on the map or get walking directions</p>
        </div>

        <?php
        // EXACT Haramaya University local photos mapped to each location slug
        $loc_images = [
            'library'     => [
                'src' => '/cns/image1/Main-Libary.jpg',
                'alt' => 'Haramaya University Main Library',
                'extra' => '/cns/image1/Student Reading at HU Library.jpg'
            ],
            'agriculture' => [
                'src' => '/cns/image1/Haramaya University Old stedium or CAES Area Photo agri collage.jpg',
                'alt' => 'Haramaya University College of Agriculture',
            ],
            'humanities'  => [
                'src' => '/cns/image1/inner main Campus Road.jpg',
                'alt' => 'Haramaya University Humanities Campus',
            ],
            'computing'   => [
                'src' => '/cns/image1/Inorganic Chemistry Lab.jpg',
                'alt' => 'Haramaya University Computing & Informatics',
            ],
            'admin'       => [
                'src' => '/cns/image1/Haramaya University New Administration Building.jpg',
                'alt' => 'Haramaya University New Administration Building',
            ],
            'cafeteria'   => [
                'src' => '/cns/image1/inner main Campus Road.jpg',
                'alt' => 'Haramaya University College of Agriculture',
            ],
            'dorms'       => [
                'src' => '/cns/image1/Haramaya University Student Dormitory Area Photo.jpg',
                'alt' => 'Haramaya University Student Dormitory Area',
            ],
            'stadium'     => [
                'src' => '/cns/image1/Sport Acedamy Stadium.jpg',
                'alt' => 'Haramaya University Sport Academy Stadium',
            ],
            'labs'        => [
                'src' => '/cns/image1/Analytical Chemistry Lab.jpg',
                'alt' => 'Haramaya University Science Laboratory',
            ],
        ];
        $category_colors = [
            'academic'   => '#2563eb',
            'services'   => '#f59e0b',
            'facilities' => '#10b981',
        ];
        ?>

        <div class="loc-photo-grid">
            <?php foreach ($locations as $loc):
                $img_data  = $loc_images[$loc['slug']] ?? ['src'=>'', 'alt'=>$loc['name']];
                $img_src   = $img_data['src'];
                $img_alt   = $img_data['alt'];
                $cat_color = $category_colors[$loc['category']] ?? '#2563eb';
                $area      = htmlspecialchars(explode(',', $loc['location_area'])[0]);
            ?>
            <div class="loc-photo-card animate-on-scroll">

                <!-- Photo top -->
                <div class="loc-photo-top">
                    <img src="<?= $img_src ?>"
                         alt="<?= htmlspecialchars($img_alt) ?>"
                         loading="lazy"
                         onerror="this.onerror=null;this.parentElement.querySelector('.loc-photo-fallback').style.display='flex';this.style.display='none'">
                    <!-- Fallback if image fails -->
                    <div class="loc-photo-fallback" style="background:linear-gradient(135deg,<?= htmlspecialchars($loc['color']) ?>,<?= htmlspecialchars($loc['color']) ?>99)">
                        <i class="fas <?= htmlspecialchars($loc['icon']) ?>"></i>
                    </div>
                    <!-- Category badge -->
                    <span class="loc-photo-cat" style="background:<?= $cat_color ?>">
                        <?= ucfirst($loc['category']) ?>
                    </span>
                    <!-- Color overlay bar at bottom of image -->
                    <div class="loc-photo-bar" style="background:<?= htmlspecialchars($loc['color']) ?>"></div>
                </div>

                <!-- Card body -->
                <div class="loc-photo-body">
                    <div class="loc-photo-title-row">
                        <div class="loc-photo-icon" style="background:<?= htmlspecialchars($loc['color']) ?>">
                            <i class="fas <?= htmlspecialchars($loc['icon']) ?>"></i>
                        </div>
                        <h3><?= htmlspecialchars($loc['name']) ?></h3>
                    </div>
                    <p><?= htmlspecialchars(substr($loc['description'], 0, 95)) ?>...</p>
                    <div class="loc-photo-meta">
                        <span class="loc-open"><i class="fas fa-circle"></i> Open Now</span>
                        <span><i class="fas fa-map-marker-alt"></i> <?= $area ?></span>
                    </div>
                    <div class="loc-photo-actions">
                        <a href="/cns/map.php?location=<?= $loc['slug'] ?>" class="btn btn-sm btn-primary">
                            <i class="fas fa-map"></i> View on Map
                        </a>
                        <a href="/cns/directions.php?to=<?= $loc['slug'] ?>" class="btn btn-sm btn-outline">
                            <i class="fas fa-route"></i> Directions
                        </a>
                    </div>
                </div>

            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-box">
            <div class="cta-content">
                <h2>Ready to Explore Campus?</h2>
                <p>Open the Campus Maps and start discovering all buildings and facilities.</p>
            </div>
            <div class="cta-buttons">
                <a href="/cns/map.php" class="btn btn-white"><i class="fas fa-map"></i> Open Map</a>
                <a href="/cns/contact.php" class="btn btn-outline-white"><i class="fas fa-envelope"></i> Contact Us</a>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
