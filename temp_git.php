<?php
$commit = '98ef98213284eb22d9050608eed1be47c55a6bec';
$file = 'templates/user/Academics/program_detail.html.twig';
$output = shell_exec("git show {$commit}:{$file} 2>&1");
file_put_contents('temp_program_detail.html.twig', $output);
echo "Fetched program_detail.html.twig from {$commit}\n";

$output2 = shell_exec("git show {$commit}:templates/user/Academics/ccsma/bsit.html.twig 2>&1");
file_put_contents('temp_bsit.html.twig', $output2);
echo "Fetched bsit.html.twig from {$commit}\n";
