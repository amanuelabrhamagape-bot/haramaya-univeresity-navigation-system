<?php
require_once 'db.php';
$page_title = 'Directions';

$locations = $pdo->query("SELECT slug, name FROM locations ORDER BY name")->fetchAll();

$from = $_GET['from'] ?? '';
$to   = $_GET['to']   ?? '';
$route = null;
$steps = [];

if ($from && $to && $from !== $to) {
    $stmt = $pdo->prepare("SELECT * FROM routes WHERE from_slug=? AND to_slug=?");
    $stmt->execute([$from, $to]);
    $route = $stmt->fetch();

    if (!$route) {
        // Generic fallback
        $slugs = [$from, $to];
        $fromName = ''; $toName = '';
        foreach ($locations as $l) {
            if ($l['slug'] === $from) $fromName = $l['name'];
            if ($l['slug'] === $to)   $toName   = $l['name'];
        }
        $route = ['from_slug'=>$from,'to_slug'=>$to,'distance'=>'~400 meters','duration'=>'~5–6 minutes','id'=>null];
        $steps = [
            ['instruction'=>"Exit the $fromName", 'detail'=>'Head towards the main campus road', 'distance'=>null],
            ['instruction'=>'Follow the main pathway', 'detail'=>'Look for directional signs', 'distance'=>'200m'],
            ['instruction'=>"Head towards the $toName", 'detail'=>'The building will be visible ahead', 'distance'=>'150m'],
            ['instruction'=>"Enter the $toName", 'detail'=>'Use the main entrance', 'distance'=>'50m'],
        ];
    } else {
        $stmt2 = $pdo->prepare("SELECT * FROM route_steps WHERE route_id=? ORDER BY step_order");
        $stmt2->execute([$route['id']]);
        $steps = $stmt2->fetchAll();
    }
}

// Popular routes for quick cards
$popularRoutes = [
    ['from'=>'dorms',   'to'=>'library',     'label'=>'Dorms → Library',            'time'=>'~8 min'],
    ['from'=>'library', 'to'=>'agriculture', 'label'=>'Library → College of Agriculture','time'=>'~5 min'],
    ['from'=>'admin',   'to'=>'computing',   'label'=>'Admin → Computing',           'time'=>'~4 min'],
    ['from'=>'dorms',   'to'=>'cafeteria',   'label'=>'Dorms → College of Agriculture','time'=>'~5 min'],
];

require_once 'includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <div class="page-hero-content">
            <h1><i class="fas fa-route"></i> Get Directions</h1>
            <p>Find the best walking route between Haramaya University buildings</p>
        </div>
    </div>
</section>

<section class="directions-section">
    <div class="container">

        <!-- Direction Form -->
        <?php if (!$route): ?>
        <div class="directions-form-card animate-on-scroll">
            <h2><i class="fas fa-map-signs"></i> Plan Your Route</h2>
            <form method="GET" id="directionsForm">
                <div class="dir-form-grid">
                    <div class="form-group">
                        <label for="from"><i class="fas fa-circle" style="color:#10b981"></i> From</label>
                        <select name="from" id="from" required>
                            <option value="">Select starting location...</option>
                            <?php foreach ($locations as $l): ?>
                            <option value="<?= $l['slug'] ?>" <?= ($from===$l['slug'])?'selected':'' ?>>
                                <?= htmlspecialchars($l['name']) ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="swap-btn-wrap">
                        <button type="button" id="swapBtn" class="swap-btn" title="Swap locations">
                            <i class="fas fa-exchange-alt"></i>
                        </button>
                    </div>
                    <div class="form-group">
                        <label for="to"><i class="fas fa-map-marker-alt" style="color:#ef4444"></i> To</label>
                        <select name="to" id="to" required>
                            <option value="">Select destination...</option>
                            <?php foreach ($locations as $l): ?>
                            <option value="<?= $l['slug'] ?>" <?= ($to===$l['slug'])?'selected':'' ?>>
                                <?= htmlspecialchars($l['name']) ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-full btn-lg">
                    <i class="fas fa-route"></i> Get Directions
                </button>
            </form>
        </div>
        <?php endif; ?>

        <!-- Directions Result -->
        <?php if ($route && !empty($steps)): ?>
        <?php
            $fromName = ''; $toName = '';
            foreach ($locations as $l) {
                if ($l['slug'] === $from) $fromName = $l['name'];
                if ($l['slug'] === $to)   $toName   = $l['name'];
            }
        ?>
        <div class="route-result animate-on-scroll">
            <div class="route-header">
                <div class="route-from-to">
                    <div class="route-point green"><i class="fas fa-circle"></i><span><?= htmlspecialchars($fromName) ?></span></div>
                    <div class="route-line"><span></span></div>
                    <div class="route-point red"><i class="fas fa-map-marker-alt"></i><span><?= htmlspecialchars($toName) ?></span></div>
                </div>
                <div class="route-meta-badges">
                    <span class="meta-badge"><i class="fas fa-ruler"></i> <?= htmlspecialchars($route['distance']) ?></span>
                    <span class="meta-badge"><i class="fas fa-clock"></i> <?= htmlspecialchars($route['duration']) ?></span>
                    <span class="meta-badge"><i class="fas fa-walking"></i> <?= count($steps) ?> steps</span>
                </div>
            </div>

            <div class="route-steps-list">
                <?php foreach ($steps as $i => $step): ?>
                <div class="route-step animate-step" style="animation-delay:<?= $i * 0.08 ?>s">
                    <div class="step-num"><?= $i + 1 ?></div>
                    <div class="step-body">
                        <strong><?= htmlspecialchars($step['instruction']) ?></strong>
                        <?php if ($step['detail']): ?>
                        <p><?= htmlspecialchars($step['detail']) ?></p>
                        <?php endif; ?>
                        <?php if ($step['distance']): ?>
                        <span class="step-dist"><i class="fas fa-ruler-horizontal"></i> <?= htmlspecialchars($step['distance']) ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
                <div class="route-step arrived animate-step" style="animation-delay:<?= count($steps) * 0.08 ?>s">
                    <div class="step-num arrived"><i class="fas fa-check"></i></div>
                    <div class="step-body"><strong>You have arrived at <?= htmlspecialchars($toName) ?>!</strong></div>
                </div>
            </div>

            <div class="route-footer-actions">
                <a href="/cns/directions.php" class="btn btn-outline"><i class="fas fa-arrow-left"></i> Plan New Route</a>
                <a href="/cns/map.php?location=<?= urlencode($to) ?>" class="btn btn-primary"><i class="fas fa-map"></i> View on Map</a>
            </div>
        </div>
        <?php endif; ?>

        <!-- Error -->
        <?php if (isset($_GET['from']) && isset($_GET['to']) && $from === $to): ?>
        <div class="alert alert-error"><i class="fas fa-exclamation-circle"></i> Start and destination cannot be the same. Please choose different locations.</div>
        <?php endif; ?>

        <!-- Popular Routes -->
        <div class="popular-routes">
            <h2><i class="fas fa-fire"></i> Popular Routes</h2>
            <div class="popular-routes-grid">
                <?php foreach ($popularRoutes as $pr):
                    $fromLoc = null; $toLoc = null;
                    foreach ($locations as $l) {
                        if ($l['slug'] === $pr['from']) $fromLoc = $l;
                        if ($l['slug'] === $pr['to'])   $toLoc   = $l;
                    }
                ?>
                <a href="/cns/directions.php?from=<?= $pr['from'] ?>&to=<?= $pr['to'] ?>" class="popular-route-card">
                    <div class="popular-icons">
                        <i class="fas fa-walking"></i>
                    </div>
                    <div class="popular-info">
                        <strong><?= htmlspecialchars($pr['label']) ?></strong>
                        <span><i class="fas fa-clock"></i> <?= $pr['time'] ?> walk</span>
                    </div>
                    <i class="fas fa-chevron-right"></i>
                </a>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</section>

<script>
document.getElementById('swapBtn')?.addEventListener('click', function() {
    const fromSel = document.getElementById('from');
    const toSel   = document.getElementById('to');
    const tmp = fromSel.value;
    fromSel.value = toSel.value;
    toSel.value   = tmp;
    this.style.transform = 'rotate(180deg)';
    setTimeout(() => this.style.transform = '', 400);
});
</script>

<?php require_once 'includes/footer.php'; ?>
