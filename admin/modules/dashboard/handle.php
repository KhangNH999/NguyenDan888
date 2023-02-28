<?php
include('../../../config/config.php');

$id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';

$month_now = (isset($_GET['month'])) ? $_GET['month'] : '';
$year_now = (isset($_GET['year'])) ? $_GET['year'] : '';

$month_select = (isset($_POST['month_select'])) ? $_POST['month_select'] : $month_now;
$year_select = (isset($_POST['year_select'])) ? $_POST['year_select'] : $year_now;

if ((isset($_POST['month_submit'])) || (isset($_POST['year_submit']))) {
    header('Location: ../../index.php?id_user=' . $_GET['id_user'] . '&month=' . $month_select . '&year=' . $year_select);
}