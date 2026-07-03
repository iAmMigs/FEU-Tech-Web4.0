<?php
header('Content-Type: text/plain');
 
$admissions_images = [
    'FEU-TECHBLD.jpg',
    'Admission_Sample.png'
];
 
$payments_images = [
    'BPI.jpg',
    'BDO.jpg',
    'RobinsonsBank.jpg',
    'Gcash1.png',
    'Gcash2.png',
    'Gcash3.png',
    'Gcash4.png',
    'Gcash5.png',
    'Gcash6.png',
    'Landbank1.png',
    'Landbank2.png',
    'Landbank3.png',
    'Landbank5.png',
    'Landbank6.png',
    'Landbank7.png',
    'Landbank8-1.png',
    'Landbank8-2.png'
];
 
@mkdir(__DIR__ . '/uploads/admissions', 0777, true);
@mkdir(__DIR__ . '/uploads/payments', 0777, true);
 
$success = 0;
$fail = 0;
 
foreach ($admissions_images as $img) {
    $src = __DIR__ . '/images/' . $img;
    $dst = __DIR__ . '/uploads/admissions/' . $img;
    if (file_exists($src)) {
        if (copy($src, $dst)) {
            $success++;
        } else {
            $fail++;
        }
    } else {
        echo "Admissions source missing: $src\n";
        $fail++;
    }
}
 
foreach ($payments_images as $img) {
    $src = __DIR__ . '/images/Payments/' . $img;
    $dst = __DIR__ . '/uploads/payments/' . $img;
    if (file_exists($src)) {
        if (copy($src, $dst)) {
            $success++;
        } else {
            $fail++;
        }
    } else {
        echo "Payments source missing: $src\n";
        $fail++;
    }
}
 
echo "Finished! Success: $success, Failures: $fail";
