<?php


$unity = ["b" => 1, "kb" => 10 ** 3, "mb" => 10 ** 6, "gb" => 10 ** 9, "o" => 8, "ko" => 8 * 10 ** 3, "mo" => 8 * 10 ** 6, "go" => 8 * 10 ** 9];

$ratio1 = $unity[$_POST["val1"]];
$ratio2 = $unity[$_POST["val2"]];

echo $_POST["bit"] * $ratio1 / $ratio2;
