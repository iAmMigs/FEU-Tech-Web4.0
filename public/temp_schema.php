<?php

use App\Kernel;
use Symfony\Component\Dotenv\Dotenv;
use Doctrine\ORM\Tools\SchemaTool;

// 1. Setup autoloader
require dirname(__DIR__).'/vendor/autoload.php';

// 2. Load env
if (file_exists(dirname(__DIR__).'/.env')) {
    (new Dotenv())->bootEnv(dirname(__DIR__).'/.env');
}

$env = $_SERVER['APP_ENV'] ?? 'dev';
$debug = (bool) ($_SERVER['APP_DEBUG'] ?? ('prod' !== $env));

try {
    // 3. Boot Symfony Kernel
    $kernel = new Kernel($env, $debug);
    $kernel->boot();
    $container = $kernel->getContainer();

    echo "<h3>1. Copying Payment Image Assets...</h3>";
    $srcDir = dirname(__DIR__) . '/public/images/Payments/';
    $destDir = dirname(__DIR__) . '/public/uploads/payments/';
    if (!is_dir($destDir)) {
        mkdir($destDir, 0777, true);
    }

    $files = [
        'BDO.jpg', 'BPI.jpg', 'RobinsonsBank.jpg',
        'Gcash1.png', 'Gcash2.png', 'Gcash3.png', 'Gcash4.png', 'Gcash5.png', 'Gcash6.png',
        'Landbank1.png', 'Landbank2.png', 'Landbank3.png', 'Landbank5.png', 'Landbank6.png',
        'Landbank7.png', 'Landbank8-1.png', 'Landbank8-2.png'
    ];

    $copiedCount = 0;
    foreach ($files as $file) {
        if (file_exists($srcDir . $file)) {
            copy($srcDir . $file, $destDir . $file);
            $copiedCount++;
        }
    }
    echo "Copied {$copiedCount} images.<br>";

    // Get Entity Manager safely from doctrine service registry
    $doctrine = $container->has('doctrine') ? $container->get('doctrine') : null;
    if (!$doctrine) {
        $entityManager = $container->get('doctrine.orm.entity_manager');
    } else {
        $entityManager = $doctrine->getManager();
    }

    echo "<h3>2. Cleaning up existing Payment tables...</h3>";
    $conn = $entityManager->getConnection();
    $conn->executeStatement('SET FOREIGN_KEY_CHECKS = 0');
    $conn->executeStatement('DROP TABLE IF EXISTS payment_step');
    $conn->executeStatement('DROP TABLE IF EXISTS payment_option');
    $conn->executeStatement('SET FOREIGN_KEY_CHECKS = 1');
    echo "Tables dropped.<br>";

    echo "<h3>3. Rebuilding Database Schema...</h3>";
    $metadata = $entityManager->getMetadataFactory()->getAllMetadata();

    if (!empty($metadata)) {
        $schemaTool = new SchemaTool($entityManager);
        $schemaTool->updateSchema($metadata, true);
        echo "Database schema updated successfully.<br>";
    } else {
        echo "No metadata found.<br>";
    }

    echo "<h3>4. Seeding Default Pages & Content...</h3>";
    // Run InitPagesCommand programmatically
    $application = new \Symfony\Bundle\FrameworkBundle\Console\Application($kernel);
    $application->setAutoExit(false);

    $input = new \Symfony\Component\Console\Input\ArrayInput([
        'command' => 'app:init-pages'
    ]);
    $output = new \Symfony\Component\Console\Output\BufferedOutput();
    $exitCode = $application->run($input, $output);

    echo "Exit Code: " . $exitCode . "<br>";
    echo "<pre>" . htmlspecialchars($output->fetch()) . "</pre>";
    echo "<br><strong>Setup fully completed! Please delete public/temp_schema.php.</strong>";

} catch (\Throwable $e) {
    echo "<h3>Error:</h3>";
    echo "<pre>" . $e->getMessage() . "\n" . $e->getTraceAsString() . "</pre>";
}
