<?php

require_once('../flaky.php');

$testnum = 5000000;
$ids = array();

for ($i = 0; $i < $testnum; ++$i) {
    $id = Flaky::id();
    if (array_key_exists($id, $ids)) {
        echo "Found duplicate key '" . $id . "' at i = " . $i . " - Original found at i = " . $ids[$id] . "\n";
        exit;
    } else {
        // echo $id . "\n";
        $ids[$id] = $i;
    }
}

echo "Finished with no collisions!\n";