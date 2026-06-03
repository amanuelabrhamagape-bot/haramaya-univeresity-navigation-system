<?php
require_once 'db.php';
$page_title = 'Campus Maps';
$location_param = $_GET['location'] ?? '';

$locations = $pdo->query("SELECT * FROM locations ORDER BY id")->fetchAll();
$locations_map = [];
foreach ($locations as $loc) {
    $locations_map[$loc['slug']] = $loc;
}

$selected = null;
if ($location_param && isset($locations_map[$location_param])) {
    $loc_id = $locations_map[$location_param]['id'];
    $selected = $locations_map[$location_param];
    $sel_features = $pdo->prepare("SELECT feature FROM location_features WHERE location_id=?");
    $sel_features->execute([$loc_id]);
    $sel_services = $pdo->prepare("SELECT service FROM location_services WHERE location_id=?");
    $sel_services->execute([$loc_id]);
    $sel_f = $sel_features->fetchAll();
    $sel_s = $sel_services->fetchAll();
}

require_once 'includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <div class="page-hero-content">
            <h1><i class="fas fa-map"></i> Campus Maps</h1>
            <p>Click on any building to view detailed information</p>
        </div>
    </div>
</section>

<section class="map-section">
    <div class="container">
        <div class="map-wrapper">

            <!-- Map Canvas -->
            <div class="map-canvas-wrap">
                <div class="map-toolbar">
                    <span><i class="fas fa-hand-pointer"></i> Click a building to explore</span>
                    <div class="zoom-controls">
                        <button id="zoomIn"    title="Zoom In"><i class="fas fa-plus"></i></button>
                        <button id="zoomReset" title="Reset"><i class="fas fa-undo"></i></button>
                        <button id="zoomOut"   title="Zoom Out"><i class="fas fa-minus"></i></button>
                    </div>
                </div>

                <div class="map-canvas" id="mapCanvas">
                    <svg id="campusSVG" viewBox="0 0 780 550" xmlns="http://www.w3.org/2000/svg">
                        <!-- Campus Ground -->
                        <rect width="780" height="550" fill="#e8f5e9" rx="12"/>
                        <!-- Green areas -->
                        <ellipse cx="380" cy="270" rx="110" ry="80" fill="#c8e6c9" opacity=".6"/>
                        <ellipse cx="380" cy="270" rx="70"  ry="50" fill="#a5d6a7" opacity=".5"/>
                        <!-- Roads -->
                        <line x1="0"   y1="270" x2="780" y2="270" stroke="#bdbdbd" stroke-width="22"/>
                        <line x1="380" y1="0"   x2="380" y2="550" stroke="#bdbdbd" stroke-width="22"/>
                        <!-- Road labels -->
                        <text x="190" y="262" text-anchor="middle" fill="#9e9e9e" font-size="11" font-family="Inter,sans-serif">Campus Drive West</text>
                        <text x="580" y="262" text-anchor="middle" fill="#9e9e9e" font-size="11" font-family="Inter,sans-serif">Campus Drive East</text>
                        <text x="388" y="140" fill="#9e9e9e" font-size="11" font-family="Inter,sans-serif" transform="rotate(90,388,140)">North–South Ave</text>

                        <?php foreach ($locations as $loc):
                            $x = $loc['map_x'];
                            $y = $loc['map_y'];
                            $w = $loc['map_width'];
                            $h = $loc['map_height'];
                            $cx = $x + $w/2;
                            $cy = $y + $h/2;
                            $isActive = ($location_param === $loc['slug']) ? 'active' : '';
                        ?>
                        <g class="building-marker <?= $isActive ?>" data-building="<?= $loc['slug'] ?>" data-name="<?= htmlspecialchars($loc['name']) ?>">
                            <!-- Shadow -->
                            <rect x="<?= $x+4 ?>" y="<?= $y+4 ?>" width="<?= $w ?>" height="<?= $h ?>" rx="10" fill="rgba(0,0,0,0.15)"/>
                            <!-- Building -->
                            <rect x="<?= $x ?>" y="<?= $y ?>" width="<?= $w ?>" height="<?= $h ?>" rx="10"
                                  fill="<?= htmlspecialchars($loc['color']) ?>"/>
                            <!-- Pulse ring -->
                            <circle cx="<?= $cx ?>" cy="<?= $cy ?>" r="<?= min($w,$h)/2 + 8 ?>"
                                    fill="none" stroke="<?= $loc['color'] ?>" stroke-width="2" opacity=".3" class="pulse-ring"/>
                            <!-- Icon bg -->
                            <circle cx="<?= $cx ?>" cy="<?= $cy-12 ?>" r="22" fill="rgba(255,255,255,0.25)"/>
                            <!-- Name -->
                            <?php
                                $words = explode(' ', $loc['name']);
                                if (count($words) > 1) {
                                    $half = ceil(count($words)/2);
                                    $line1 = implode(' ', array_slice($words, 0, $half));
                                    $line2 = implode(' ', array_slice($words, $half));
                                    echo "<text x=\"$cx\" y=\"".($cy+16)."\" text-anchor=\"middle\" fill=\"white\" font-size=\"12\" font-weight=\"700\" font-family=\"Inter,sans-serif\">$line1</text>";
                                    echo "<text x=\"$cx\" y=\"".($cy+30)."\" text-anchor=\"middle\" fill=\"white\" font-size=\"12\" font-weight=\"700\" font-family=\"Inter,sans-serif\">$line2</text>";
                                } else {
                                    echo "<text x=\"$cx\" y=\"".($cy+24)."\" text-anchor=\"middle\" fill=\"white\" font-size=\"13\" font-weight=\"700\" font-family=\"Inter,sans-serif\">{$loc['name']}</text>";
                                }
                            ?>
                        </g>
                        <?php endforeach; ?>
                    </svg>
                </div>

                <!-- Map Legend -->
                <div class="map-legend">
                    <?php foreach ($locations as $loc): ?>
                    <div class="legend-item" onclick="selectBuilding('<?= $loc['slug'] ?>')">
                        <span class="legend-dot" style="background:<?= $loc['color'] ?>"></span>
                        <span><?= htmlspecialchars($loc['name']) ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Info Panel -->
            <div class="info-panel" id="infoPanel">
                <?php if ($selected): ?>
                <div class="panel-loaded" id="panelContent">
                    <div class="panel-header" style="background: linear-gradient(135deg, <?= $selected['color'] ?>, <?= $selected['color'] ?>99)">
                        <i class="fas <?= htmlspecialchars($selected['icon']) ?>"></i>
                        <div>
                            <h2><?= htmlspecialchars($selected['name']) ?></h2>
                            <span><?= ucfirst($selected['category']) ?></span>
                        </div>
                        <button class="close-panel" onclick="closePanel()"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="panel-body">
                        <p><?= htmlspecialchars($selected['description']) ?></p>
                        <div class="detail-grid">
                            <div class="detail-item"><i class="fas fa-map-marker-alt"></i><div><strong>Location</strong><span><?= htmlspecialchars($selected['location_area']) ?></span></div></div>
                            <div class="detail-item"><i class="fas fa-clock"></i><div><strong>Hours</strong><span><?= nl2br(htmlspecialchars($selected['hours'])) ?></span></div></div>
                            <div class="detail-item"><i class="fas fa-phone"></i><div><strong>Phone</strong><span><?= htmlspecialchars($selected['phone']) ?></span></div></div>
                            <div class="detail-item"><i class="fas fa-envelope"></i><div><strong>Email</strong><span><?= htmlspecialchars($selected['email']) ?></span></div></div>
                        </div>
                        <h4><i class="fas fa-star"></i> Features</h4>
                        <ul class="panel-list">
                            <?php foreach ($sel_f as $f): ?>
                            <li><i class="fas fa-check-circle" style="color:<?= $selected['color'] ?>"></i> <?= htmlspecialchars($f['feature']) ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <h4><i class="fas fa-concierge-bell"></i> Services</h4>
                        <ul class="panel-list">
                            <?php foreach ($sel_s as $s): ?>
                            <li><i class="fas fa-arrow-right" style="color:<?= $selected['color'] ?>"></i> <?= htmlspecialchars($s['service']) ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="/cns/directions.php?to=<?= $selected['slug'] ?>" class="btn btn-primary btn-full">
                            <i class="fas fa-route"></i> Get Directions Here
                        </a>
                    </div>
                </div>
                <?php else: ?>
                <div class="panel-empty" id="panelContent">
                    <i class="fas fa-hand-pointer"></i>
                    <h3>Select a Building</h3>
                    <p>Click on any building on the map to view details, hours, features and services.</p>
                    <div class="quick-pick">
                        <?php foreach ($locations as $loc): ?>
                        <button onclick="selectBuilding('<?= $loc['slug'] ?>')" style="border-color:<?= $loc['color'] ?>; color:<?= $loc['color'] ?>">
                            <i class="fas <?= $loc['icon'] ?>"></i> <?= htmlspecialchars($loc['name']) ?>
                        </button>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>

        </div><!-- end map-wrapper -->
    </div>
</section>

<script>
const locationsData = <?= json_encode(array_values($locations_map)) ?>;
let currentScale = 1;
const svg = document.getElementById('campusSVG');

// Click on building
document.querySelectorAll('.building-marker').forEach(el => {
    el.addEventListener('click', function() {
        selectBuilding(this.dataset.building);
    });
    el.addEventListener('mouseenter', function() {
        this.style.filter = 'brightness(1.15) drop-shadow(0 6px 12px rgba(0,0,0,0.3))';
        this.style.cursor = 'pointer';
    });
    el.addEventListener('mouseleave', function() {
        if (!this.classList.contains('active')) this.style.filter = '';
    });
});

function selectBuilding(slug) {
    window.location.href = '/cns/map.php?location=' + slug;
}

function closePanel() {
    window.location.href = '/cns/map.php';
}

// Zoom
document.getElementById('zoomIn').addEventListener('click', () => {
    if (currentScale < 2) { currentScale += 0.15; applyZoom(); }
});
document.getElementById('zoomOut').addEventListener('click', () => {
    if (currentScale > 0.6) { currentScale -= 0.15; applyZoom(); }
});
document.getElementById('zoomReset').addEventListener('click', () => {
    currentScale = 1; applyZoom();
});
function applyZoom() {
    svg.style.transform = `scale(${currentScale})`;
    svg.style.transformOrigin = 'center center';
    svg.style.transition = 'transform 0.3s ease';
}

// Auto-highlight active building
document.querySelectorAll('.building-marker.active').forEach(el => {
    el.style.filter = 'brightness(1.2) drop-shadow(0 6px 14px rgba(0,0,0,0.35))';
});
</script>

<?php require_once 'includes/footer.php'; ?>
