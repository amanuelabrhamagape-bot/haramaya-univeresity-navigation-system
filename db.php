<?php
// ===== DATABASE CONNECTION =====
$host     = 'localhost';
$dbname   = 'campus_navigator';
$username = 'root';
$password = '';

try {
    // Step 1: Connect WITHOUT selecting a database first
    $pdo = new PDO("mysql:host=$host;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Step 2: Create database if it doesn't exist
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbname` CHARACTER SET utf8 COLLATE utf8_general_ci");

    // Step 3: Select the database
    $pdo->exec("USE `$dbname`");

    // Step 4: Auto-install tables if they don't exist yet
    $check = $pdo->query("SHOW TABLES LIKE 'locations'")->fetchColumn();
    if (!$check) {
        $sql = file_get_contents(__DIR__ . '/setup.sql');
        // Split by semicolon and run each statement
        $statements = array_filter(array_map('trim', explode(';', $sql)));
        foreach ($statements as $stmt) {
            if ($stmt) {
                $pdo->exec($stmt);
            }
        }
    }

} catch (PDOException $e) {
    // Return JSON error if called via AJAX, otherwise show HTML
    $msg = 'Database error: ' . $e->getMessage();
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
        header('Content-Type: application/json');
        die(json_encode(['error' => $msg]));
    }
    die("
    <!DOCTYPE html>
    <html><head><meta charset='UTF-8'>
    <style>
      body{font-family:sans-serif;background:#f3f4f6;display:flex;align-items:center;justify-content:center;min-height:100vh;margin:0}
      .box{background:#fff;padding:2.5rem;border-radius:14px;box-shadow:0 10px 25px rgba(0,0,0,.1);max-width:520px;text-align:center}
      h2{color:#ef4444;margin-bottom:1rem} p{color:#6b7280;font-size:.95rem;line-height:1.6}
      code{background:#fee2e2;color:#b91c1c;padding:3px 8px;border-radius:4px;font-size:.88rem}
      .steps{text-align:left;background:#f8fafc;border-radius:8px;padding:1rem 1.5rem;margin-top:1.2rem}
      .steps li{margin-bottom:.4rem;font-size:.9rem;color:#374151}
    </style></head><body>
    <div class='box'>
      <h2>⚠️ Database Connection Failed</h2>
      <p>Error: <code>" . htmlspecialchars($e->getMessage()) . "</code></p>
      <div class='steps'>
        <strong>To fix this:</strong>
        <ol>
          <li>Open <strong>XAMPP Control Panel</strong></li>
          <li>Click <strong>Start</strong> next to <strong>MySQL</strong></li>
          <li>Wait for it to show <strong>green / Running</strong></li>
          <li>Refresh this page</li>
        </ol>
      </div>
    </div></body></html>
    ");
}
?>
