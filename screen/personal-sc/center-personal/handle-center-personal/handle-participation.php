<?php
include('../../../../config/config.php');
session_start();
$mathamgia = $_POST['mathamgia'];

$sql_check_end = "SELECT * FROM cuocthi, thamgiacuocthi WHERE cuocthi.macuocthi = thamgiacuocthi.macuocthi AND thamgiacuocthi.mathamgia = $mathamgia";
$query_check_end = mysqli_query($mysqli, $sql_check_end);
while ($row_check_end = mysqli_fetch_array($query_check_end)) {
    $tinhtrangcuocthi = $row_check_end['tinhtrangcuocthi'];
}

if (isset($_POST['huythamgia'])) {
    if ($tinhtrangcuocthi == 1) {
        $sql_delete = "DELETE FROM thamgiacuocthi WHERE mathamgia = '" . $mathamgia . "'";
        mysqli_query($mysqli, $sql_delete);
        $_SESSION['notify'] = 1;
        header('Location: ../../../../index.php?quanly=lichsuthamgia');
    } else {
        $_SESSION['notify'] = 0;
        header('Location: ../../../../index.php?quanly=lichsuthamgia');
    }
}