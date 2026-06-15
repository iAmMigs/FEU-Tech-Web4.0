<?php
$source = __DIR__ . '/public/images/Admission_Sample.png';
$dest = __DIR__ . '/public/uploads/admissions/Admission_Sample.png';

if (!file_exists(dirname($dest))) {
    mkdir(dirname($dest), 0777, true);
}

if (file_exists($source)) {
    copy($source, $dest);
    echo "Image copied successfully.\n";
} else {
    echo "Source image not found: $source\n";
}
