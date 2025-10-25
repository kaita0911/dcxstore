<?php
include_once('../#include/config.php');

$district_ID = $_POST['district_ID'] ?? '';

if ($district_ID != '') {
    $query = "SELECT * FROM {$GLOBALS['db_sp']}.phuongxa WHERE maqh = ?";
    $districts = $GLOBALS['sp']->getAll($query, [$district_ID]);

    echo '<option value="">Phường/Xã</option>';
    foreach ($districts as $q) {
        echo '<option value="' . $q['xaid'] . '">' . $q['name'] . '</option>';
    }
}
