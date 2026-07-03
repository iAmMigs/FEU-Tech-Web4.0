<?php
header('Content-Type: text/plain');
$commits = [];
exec('git config --global --add safe.directory * 2>&1');
exec('git log --format="%H" -n 10 2>&1', $commits);
$allFiles = [];
foreach ($commits as $commit) {
    $output = [];
    exec("git ls-tree -r --name-only $commit 2>&1", $output);
    foreach ($output as $file) {
        if (stripos($file, 'Payments') !== false) {
            $allFiles[$file] = true;
        }
    }
}
ksort($allFiles);
echo "All historical files containing 'Payments':\n";
foreach (array_keys($allFiles) as $file) {
    echo $file . "\n";
}
