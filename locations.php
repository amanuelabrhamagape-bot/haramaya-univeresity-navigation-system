<?php
require_once 'db.php';
$page_title = 'Locations';

$search   = trim($_GET['q'] ?? '');
$category = trim($_GET['cat'] ?? '');

$sql    = "SELECT * FROM locations WHERE 1=1";
$params = [];

if ($search !== '') {
    $sql    .= " AND (name LIKE ? OR description LIKE ? OR location_area LIKE ?)";
    $like    = "%$search%";
    $params  = array_merge($params, [$like, $like, $like]);
}
if ($category !== '') {
    $sql    .= " AND category = ?";
    $params[] = $category;
}
$sql .= " ORDER BY name ASC";

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$locations = $stmt->fetchAll();

require_once 'includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <div class="page-hero-content">
            <h1><i class="fas fa-map-marker-alt"></i> Haramaya University Locations</h1>
            <p>Explore all colleges, buildings and facilities</p>
        </div>
    </div>
</section>

<!-- Search & Filter -->
<section class="search-section">
    <div class="container">
        <form method="GET" class="search-filter-bar" id="searchForm">
            <div class="search-input-wrap">
                <i class="fas fa-search"></i>
                <input type="text" name="q" id="searchInput" value="<?= htmlspecialchars($search) ?>" placeholder="Search locations, services, features...">
                <?php if ($search): ?><button type="button" class="clear-btn" onclick="clearSearch()"><i class="fas fa-times"></i></button><?php endif; ?>
            </div>
            <div class="filter-buttons">
                <a href="/cns/locations.php" class="filter-btn <?= $category==='' ? 'active':'' ?>"><i class="fas fa-th"></i> All</a>
                <a href="/cns/locations.php?cat=academic<?= $search ? '&q='.urlencode($search) : '' ?>" class="filter-btn <?= $category==='academic' ? 'active':'' ?>"><i class="fas fa-graduation-cap"></i> Academic</a>
                <a href="/cns/locations.php?cat=services<?= $search ? '&q='.urlencode($search) : '' ?>" class="filter-btn <?= $category==='services' ? 'active':'' ?>"><i class="fas fa-concierge-bell"></i> Services</a>
                <a href="/cns/locations.php?cat=facilities<?= $search ? '&q='.urlencode($search) : '' ?>" class="filter-btn <?= $category==='facilities' ? 'active':'' ?>"><i class="fas fa-building"></i> Facilities</a>
            </div>
        </form>
        <?php if ($search || $category): ?>
        <div class="search-results-info">
            <i class="fas fa-info-circle"></i>
            Found <strong><?= count($locations) ?></strong> result(s)
            <?= $search ? " for \"<strong>".htmlspecialchars($search)."</strong>\"" : '' ?>
            <?= $category ? " in <strong>".ucfirst($category)."</strong>" : '' ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- Locations Grid -->
<section class="locations-section">
    <div class="container">
        <?php if (empty($locations)): ?>
        <div class="no-results">
            <i class="fas fa-search"></i>
            <h3>No locations found</h3>
            <p>Try adjusting your search or <a href="/cns/locations.php">view all locations</a>.</p>
        </div>
        <?php else: ?>
        <div class="locations-detail-grid">
            <?php foreach ($locations as $loc):
                $features = $pdo->prepare("SELECT feature FROM location_features WHERE location_id=? LIMIT 4");
                $features->execute([$loc['id']]);
                $featuresList = $features->fetchAll();
            ?>
            <div class="location-detail-card animate-on-scroll">
                <div class="card-top-banner" style="background: linear-gradient(135deg, <?= $loc['color'] ?>, <?= $loc['color'] ?>99)">
                    <i class="fas <?= htmlspecialchars($loc['icon']) ?>"></i>
                    <span class="category-badge"><?= ucfirst($loc['category']) ?></span>
                </div>
                <div class="card-content">
                    <h3><?= htmlspecialchars($loc['name']) ?></h3>
                    <p class="card-desc"><?= htmlspecialchars($loc['description']) ?></p>
                    <div class="card-info-grid">
                        <div class="info-item">
                            <i class="fas fa-map-marker-alt" style="color:<?= $loc['color'] ?>"></i>
                            <span><?= htmlspecialchars($loc['location_area']) ?></span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-clock" style="color:<?= $loc['color'] ?>"></i>
                            <span><?= strip_tags(explode('<br>', $loc['hours'])[0]) ?></span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-phone" style="color:<?= $loc['color'] ?>"></i>
                            <span><?= htmlspecialchars($loc['phone']) ?></span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-envelope" style="color:<?= $loc['color'] ?>"></i>
                            <span><?= htmlspecialchars($loc['email']) ?></span>
                        </div>
                    </div>
                    <?php if ($featuresList): ?>
                    <div class="features-tags">
                        <?php foreach ($featuresList as $f): ?>
                        <span class="feature-tag" style="border-color:<?= $loc['color'] ?>; color:<?= $loc['color'] ?>">
                            <i class="fas fa-check"></i> <?= htmlspecialchars($f['feature']) ?>
                        </span>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                    <div class="card-footer-actions">
                        <a href="/cns/map.php?location=<?= $loc['slug'] ?>" class="btn btn-primary btn-sm">
                            <i class="fas fa-map"></i> View on Map
                        </a>
                        <a href="/cns/directions.php?to=<?= $loc['slug'] ?>" class="btn btn-outline btn-sm">
                            <i class="fas fa-route"></i> Get Directions
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<script>
function clearSearch() {
    document.getElementById('searchInput').value = '';
    window.location.href = '/cns/locations.php<?= $category ? "?cat=$category" : "" ?>';
}
document.getElementById('searchInput').addEventListener('keyup', function(e) {
    if (e.key === 'Escape') clearSearch();
});
</script>

<?php require_once 'includes/footer.php'; ?>
