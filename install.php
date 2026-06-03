<?php
// ===== ONE-CLICK DATABASE INSTALLER =====
$host = 'localhost'; $dbname = 'campus_navigator';
$username = 'root'; $password = '';

try {
    // Connect without selecting a database
    $pdo = new PDO("mysql:host=$host;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create and select the database
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbname` CHARACTER SET utf8 COLLATE utf8_general_ci");
    $pdo->exec("USE `$dbname`");

    // Drop existing tables so install is repeatable
    $pdo->exec("SET FOREIGN_KEY_CHECKS=0");
    foreach (['route_steps','routes','location_services','location_features','contact_messages','locations'] as $t) {
        $pdo->exec("DROP TABLE IF EXISTS `$t`");
    }
    $pdo->exec("SET FOREIGN_KEY_CHECKS=1");

    // Read and run setup.sql
    $sql = file_get_contents(__DIR__ . '/setup.sql');
    $statements = array_filter(array_map('trim', explode(';', $sql)));
    $count = 0;
    foreach ($statements as $stmt) {
        if ($stmt && !str_starts_with(ltrim($stmt), '--')) {
            $pdo->exec($stmt);
            $count++;
        }
    }

    echo '<!DOCTYPE html><html><head><meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
      *{margin:0;padding:0;box-sizing:border-box}
      body{font-family:Inter,sans-serif;background:linear-gradient(135deg,#1e3a8a,#7c3aed);min-height:100vh;display:flex;align-items:center;justify-content:center;}
      .box{background:#fff;padding:3rem;border-radius:20px;box-shadow:0 20px 50px rgba(0,0,0,.2);text-align:center;max-width:480px;width:90%}
      .icon{font-size:4rem;margin-bottom:1rem}
      h2{color:#10b981;font-size:1.8rem;font-weight:800;margin-bottom:.5rem}
      p{color:#6b7280;margin-bottom:1.5rem;line-height:1.6}
      .badge{display:inline-block;background:#d1fae5;color:#065f46;padding:6px 16px;border-radius:20px;font-size:.85rem;font-weight:600;margin-bottom:1.5rem}
      a{display:inline-block;background:linear-gradient(135deg,#2563eb,#7c3aed);color:#fff;padding:13px 32px;border-radius:10px;text-decoration:none;font-weight:700;font-size:1rem;transition:.2s}
      a:hover{opacity:.9;transform:translateY(-2px)}
    </style></head>
    <body><div class="box">
      <div class="icon">✅</div>
      <h2>Database Installed!</h2>
      <div class="badge">' . $count . ' SQL statements executed</div>
      <p>The <strong>campus_navigator</strong> database has been created and filled with all locations, routes, and sample data.</p>
      <a href="/cns/index.php">🚀 Launch Campus Navigator</a>
    </div></body></html>';

} catch (PDOException $e) {
    echo '<!DOCTYPE html><html><head><meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
      *{margin:0;padding:0;box-sizing:border-box}
      body{font-family:Inter,sans-serif;background:#f3f4f6;display:flex;align-items:center;justify-content:center;min-height:100vh;}
      .box{background:#fff;padding:3rem;border-radius:20px;box-shadow:0 10px 30px rgba(0,0,0,.1);text-align:center;max-width:500px;width:90%}
      h2{color:#ef4444;font-size:1.6rem;font-weight:800;margin-bottom:.8rem}
      code{background:#fee2e2;color:#b91c1c;padding:3px 10px;border-radius:6px;font-size:.88rem;word-break:break-all}
      .steps{text-align:left;background:#f8fafc;border:1px solid #e5e7eb;border-radius:10px;padding:1.2rem 1.5rem;margin-top:1.2rem}
      .steps li{margin-bottom:.5rem;font-size:.9rem;color:#374151}
      strong{color:#1f2937}
    </style></head>
    <body><div class="box">
      <div style="font-size:3.5rem;margin-bottom:1rem">❌</div>
      <h2>Installation Failed</h2>
      <p style="color:#6b7280;margin-bottom:1rem">Error: <code>' . htmlspecialchars($e->getMessage()) . '</code></p>
      <div class="steps"><strong>Fix steps:</strong><ol style="padding-left:1.2rem;margin-top:.5rem">
        <li>Open <strong>XAMPP Control Panel</strong></li>
        <li>Make sure <strong>MySQL is Running</strong> (green)</li>
        <li>Make sure MySQL port is <strong>3306</strong></li>
        <li>Refresh this page to try again</li>
      </ol></div>
    </div></body></html>';
}
?>
