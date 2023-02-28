<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<?php
$sql_pitch = "SELECT * FROM san";
$query_pitch = mysqli_query($mysqli, $sql_pitch);
$num_pitch = mysqli_num_rows($query_pitch);

$sql_blog = "SELECT * FROM blog";
$query_blog = mysqli_query($mysqli, $sql_blog);
$num_blog = mysqli_num_rows($query_blog);

$sql_contest = "SELECT * FROM cuocthi";
$query_contest = mysqli_query($mysqli, $sql_contest);
$num_contest = mysqli_num_rows($query_contest);

date_default_timezone_set('Asia/Ho_Chi_Minh');

$year_now = isset($_GET['year']) ? $_GET['year'] : date('Y');
$sql_price_year = "SELECT YEAR(thoigiandatsan) AS NAM, giathue FROM san, lichsudatsan 
WHERE san.masan = lichsudatsan.masan
AND YEAR(thoigiandatsan) = $year_now";
$query_price_year = mysqli_query($mysqli, $sql_price_year);
$price_year = 0;
while ($row_year = mysqli_fetch_array($query_price_year)) {
    $price_year = $price_year + $row_year['giathue'];
}

$month_now = isset($_GET['month']) ? $_GET['month'] : date('m');
$sql_price_month = "SELECT MONTH(thoigiandatsan) AS NAM, giathue FROM san, lichsudatsan 
WHERE san.masan = lichsudatsan.masan
AND MONTH(thoigiandatsan) = $month_now
AND YEAR(thoigiandatsan) = $year_now";
$query_price_month_now = mysqli_query($mysqli, $sql_price_month);
$price_month_now = 0;
while ($row_month_now = mysqli_fetch_array($query_price_month_now)) {
    $price_month_now = $price_month_now + $row_month_now['giathue'];
}

$year = date('Y');

$month = ($year_now < $year) ? 12 : date('m');


$sql_price_m1 = "SELECT MONTH(thoigiandatsan) AS NAM, giathue FROM san, lichsudatsan 
WHERE san.masan = lichsudatsan.masan
AND MONTH(thoigiandatsan) = '01'
AND YEAR(thoigiandatsan) = $year_now";
$query_price_m1 = mysqli_query($mysqli, $sql_price_m1);
$price_m1 = 0;
while ($row_m1 = mysqli_fetch_array($query_price_m1)) {
    $price_m1 = $price_m1 + $row_m1['giathue'];
}

$sql_price_m2 = "SELECT MONTH(thoigiandatsan) AS NAM, giathue FROM san, lichsudatsan 
WHERE san.masan = lichsudatsan.masan
AND MONTH(thoigiandatsan) = '02'
AND YEAR(thoigiandatsan) = $year_now";
$query_price_m2 = mysqli_query($mysqli, $sql_price_m2);
$price_m2 = 0;
while ($row_m2 = mysqli_fetch_array($query_price_m2)) {
    $price_m2 = $price_m2 + $row_m2['giathue'];
}

$sql_price_m3 = "SELECT MONTH(thoigiandatsan) AS NAM, giathue FROM san, lichsudatsan 
WHERE san.masan = lichsudatsan.masan
AND MONTH(thoigiandatsan) = '03'
AND YEAR(thoigiandatsan) = $year_now";
$query_price_m3 = mysqli_query($mysqli, $sql_price_m3);
$price_m3 = 0;
while ($row_m3 = mysqli_fetch_array($query_price_m3)) {
    $price_m3 = $price_m3 + $row_m3['giathue'];
}

$sql_price_m4 = "SELECT MONTH(thoigiandatsan) AS NAM, giathue FROM san, lichsudatsan 
WHERE san.masan = lichsudatsan.masan
AND MONTH(thoigiandatsan) = '04'
AND YEAR(thoigiandatsan) = $year_now";
$query_price_m4 = mysqli_query($mysqli, $sql_price_m4);
$price_m4 = 0;
while ($row_m4 = mysqli_fetch_array($query_price_m4)) {
    $price_m4 = $price_m4 + $row_m4['giathue'];
}

$sql_price_m5 = "SELECT MONTH(thoigiandatsan) AS NAM, giathue FROM san, lichsudatsan 
WHERE san.masan = lichsudatsan.masan
AND MONTH(thoigiandatsan) = '05'
AND YEAR(thoigiandatsan) = $year_now";
$query_price_m5 = mysqli_query($mysqli, $sql_price_m5);
$price_m5 = 0;
while ($row_m5 = mysqli_fetch_array($query_price_m5)) {
    $price_m5 = $price_m5 + $row_m5['giathue'];
}

$sql_price_m6 = "SELECT MONTH(thoigiandatsan) AS NAM, giathue FROM san, lichsudatsan 
WHERE san.masan = lichsudatsan.masan
AND MONTH(thoigiandatsan) = '06'
AND YEAR(thoigiandatsan) = $year_now";
$query_price_m6 = mysqli_query($mysqli, $sql_price_m6);
$price_m6 = 0;
while ($row_m6 = mysqli_fetch_array($query_price_m6)) {
    $price_m6 = $price_m6 + $row_m6['giathue'];
}

$sql_price_m7 = "SELECT MONTH(thoigiandatsan) AS NAM, giathue FROM san, lichsudatsan 
WHERE san.masan = lichsudatsan.masan
AND MONTH(thoigiandatsan) = '07'
AND YEAR(thoigiandatsan) = $year_now";
$query_price_m7 = mysqli_query($mysqli, $sql_price_m7);
$price_m7 = 0;
while ($row_m7 = mysqli_fetch_array($query_price_m7)) {
    $price_m7 = $price_m7 + $row_m7['giathue'];
}

$sql_price_m8 = "SELECT MONTH(thoigiandatsan) AS NAM, giathue FROM san, lichsudatsan 
WHERE san.masan = lichsudatsan.masan
AND MONTH(thoigiandatsan) = '08'
AND YEAR(thoigiandatsan) = $year_now";
$query_price_m8 = mysqli_query($mysqli, $sql_price_m8);
$price_m8 = 0;
while ($row_m8 = mysqli_fetch_array($query_price_m8)) {
    $price_m8 = $price_m8 + $row_m8['giathue'];
}

$sql_price_m9 = "SELECT MONTH(thoigiandatsan) AS NAM, giathue FROM san, lichsudatsan 
WHERE san.masan = lichsudatsan.masan
AND MONTH(thoigiandatsan) = '09'
AND YEAR(thoigiandatsan) = $year_now";
$query_price_m9 = mysqli_query($mysqli, $sql_price_m9);
$price_m9 = 0;
while ($row_m9 = mysqli_fetch_array($query_price_m9)) {
    $price_m9 = $price_m9 + $row_m9['giathue'];
}

$sql_price_m10 = "SELECT MONTH(thoigiandatsan) AS NAM, giathue FROM san, lichsudatsan 
WHERE san.masan = lichsudatsan.masan
AND MONTH(thoigiandatsan) = '10'
AND YEAR(thoigiandatsan) = $year_now";
$query_price_m10 = mysqli_query($mysqli, $sql_price_m10);
$price_m10 = 0;
while ($row_m10 = mysqli_fetch_array($query_price_m10)) {
    $price_m10 = $price_m10 + $row_m10['giathue'];
}

$sql_price_m11 = "SELECT MONTH(thoigiandatsan) AS NAM, giathue FROM san, lichsudatsan 
WHERE san.masan = lichsudatsan.masan
AND MONTH(thoigiandatsan) = '11'
AND YEAR(thoigiandatsan) = $year_now";
$query_price_m11 = mysqli_query($mysqli, $sql_price_m11);
$price_m11 = 0;
while ($row_m11 = mysqli_fetch_array($query_price_m11)) {
    $price_m11 = $price_m11 + $row_m11['giathue'];
}

$sql_price_m12 = "SELECT MONTH(thoigiandatsan) AS NAM, giathue FROM san, lichsudatsan 
WHERE san.masan = lichsudatsan.masan
AND MONTH(thoigiandatsan) = '12'
AND YEAR(thoigiandatsan) = $year_now";
$query_price_m12 = mysqli_query($mysqli, $sql_price_m12);
$price_m12 = 0;
while ($row_m12 = mysqli_fetch_array($query_price_m12)) {
    $price_m12 = $price_m12 + $row_m12['giathue'];
}
?>
<div class="chart-number">
    <div class="dashboard">
        <div class="dashboard-detail">
            <div class="dashboard-title pitch-title">Tổng số sân hiện có:</div>
            <div class="dashboard-number pitch-number"><?php echo $num_pitch ?></div>
        </div>
        <div class="dashboard-detail">
            <div class="dashboard-title blog-title">Tổng số blog hiện có:</div>
            <div class="dashboard-number blog-number"><?php echo $num_blog ?></div>
        </div>
        <div class="dashboard-detail">
            <div class="dashboard-title contest-title">Tổng số sự kiện hiện có:</div>
            <div class="dashboard-number contest-number"><?php echo $num_contest ?></div>
        </div>
    </div>
    <canvas id="myChartNumber"
        style="width:100%; max-width:600px; max-height: 300px; padding: 10px; border: 1px solid #ddd;"></canvas>
</div>
<div class="chart-price">
    <div class="dashboard">
        <div class="dashboard-detail">
            <div class="dashboard-group">
                <div class="dashboard-title price-month-title">Tổng tiền giao dịch</div>
                <form
                    action="modules/dashboard/handle.php?id_user=<?php echo $_GET['id_user'] ?>&month=<?php echo (isset($_GET['month'])) ? $_GET['month'] : $month_now  ?>&year=<?php echo (isset($_GET['year'])) ? $_GET['year'] : $year_now  ?>"
                    method="post" class="form-select">
                    <select name="month_select" id="month_select" style="border: 1px solid #fd7e14;">
                        <?php $month_selected = isset($_GET['month']) ? $_GET['month'] : $month_now; ?>
                        <option value="1" <?php echo ($month_selected == 1) ? 'selected' : ''; ?>>Tháng 1</option>
                        <option value="2" <?php echo ($month_selected == 2) ? 'selected' : ''; ?>>Tháng 2</option>
                        <option value="3" <?php echo ($month_selected == 3) ? 'selected' : ''; ?>>Tháng 3</option>
                        <option value="4" <?php echo ($month_selected == 4) ? 'selected' : ''; ?>>Tháng 4</option>
                        <option value="5" <?php echo ($month_selected == 5) ? 'selected' : ''; ?>>Tháng 5</option>
                        <option value="6" <?php echo ($month_selected == 6) ? 'selected' : ''; ?>>Tháng 6</option>
                        <option value="7" <?php echo ($month_selected == 7) ? 'selected' : ''; ?>>Tháng 7</option>
                        <option value="8" <?php echo ($month_selected == 8) ? 'selected' : ''; ?>>Tháng 8</option>
                        <option value="9" <?php echo ($month_selected == 9) ? 'selected' : ''; ?>>Tháng 9</option>
                        <option value="10" <?php echo ($month_selected == 10) ? 'selected' : ''; ?>>Tháng 10</option>
                        <option value="11" <?php echo ($month_selected == 11) ? 'selected' : ''; ?>>Tháng 11</option>
                        <option value="12" <?php echo ($month_selected == 12) ? 'selected' : ''; ?>>Tháng 12</option>
                    </select>
                    <button type="submit" name="month_submit" style="background-color: #fd7e14;">Chọn</button>
                </form>
            </div>
            <div class="dashboard-number price-month-number"><?php echo number_format($price_month_now, 0, ',', '.') ?>
            </div>
        </div>
        <div class="dashboard-detail">
            <div class="dashboard-group">
                <div class="dashboard-title price-year-title">Tổng tiền giao dịch</div>
                <form
                    action="modules/dashboard/handle.php?id_user=<?php echo $_GET['id_user'] ?>&month=<?php echo (isset($_GET['month'])) ? $_GET['month'] : $month_now  ?>&year=<?php echo (isset($_GET['year'])) ? $_GET['year'] : $year_now  ?>"
                    method="post" class="form-select">
                    <select name="year_select" id="year_select" style="border: 1px solid #198754;">
                        <?php $year_selected = isset($_GET['year']) ? $_GET['year'] : $year_now; ?>
                        <option value="2021" <?php echo ($year_selected == 2021) ? 'selected' : ''; ?>>Năm 2021</option>
                        <option value="2022" <?php echo ($year_selected == 2022) ? 'selected' : ''; ?>>Năm 2022</option>
                        <option value="2023" <?php echo ($year_selected == 2023) ? 'selected' : ''; ?>>Năm 2023</option>
                        <option value="2024" <?php echo ($year_selected == 2024) ? 'selected' : ''; ?>>Năm 2024</option>
                        <option value="2025" <?php echo ($year_selected == 2025) ? 'selected' : ''; ?>>Năm 2025</option>
                        <option value="2026" <?php echo ($year_selected == 2026) ? 'selected' : ''; ?>>Năm 2026</option>
                    </select>
                    <button type="submit" name="year_submit" style="background-color: #198754;">Chọn</button>
                </form>
            </div>
            <div class="dashboard-number price-year-number"><?php echo number_format($price_year, 0, ',', '.') ?>
            </div>
        </div>
    </div>
    <canvas id="myChartPrice"
        style="width:100%; max-width:600px; max-height: 300px; padding: 10px; border: 1px solid #ddd;"></canvas>
</div>
<script>
//Biểu đồ số lượng
var xValues = ["Sân", "Blog", "Sự kiện"];
var yValues = [<?php echo $num_pitch ?>, <?php echo $num_blog ?>, <?php echo $num_contest ?>];
var barColors = [
    "#b91d47",
    "#00aba9",
    "#2b5797"
];

new Chart("myChartNumber", {
    type: "doughnut",
    data: {
        labels: xValues,
        datasets: [{
            backgroundColor: barColors,
            data: yValues
        }]
    },
    options: {
        title: {
            display: true,
            text: "Biểu đồ thống kê số lượng"
        }
    }
});
//Biều đồ giao dịch
var xValuesPrice = [0, 'T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8',
    'T9', 'T10', 'T11', 'T12'
];
var yValuesPrice = [
    0,
    <?php $m1 = 1;
        echo ($month >= $m1 && $year_now <= $year) ? $price_m1 : ""; ?>
    <?php $m2 = 2;
        echo ($month >= $m2 && $year_now <= $year) ? ',' . $price_m2 : ""; ?>
    <?php $m3 = 3;
        echo ($month >= $m3 && $year_now <= $year) ? ',' . $price_m3 : ""; ?>
    <?php $m4 = 4;
        echo ($month >= $m4 && $year_now <= $year) ? ',' . $price_m4 : ""; ?>
    <?php $m5 = 5;
        echo ($month >= $m5 && $year_now <= $year) ? ',' . $price_m5 : ""; ?>
    <?php $m6 = 6;
        echo ($month >= $m6 && $year_now <= $year) ? ',' . $price_m6 : ""; ?>
    <?php $m7 = 7;
        echo ($month >= $m7 && $year_now <= $year) ? ',' . $price_m7 : ""; ?>
    <?php $m8 = 8;
        echo ($month >= $m8 && $year_now <= $year) ? ',' . $price_m8 : ""; ?>
    <?php $m9 = 9;
        echo ($month >= $m9 && $year_now <= $year) ? ',' . $price_m9 : ""; ?>
    <?php $m10 = 10;
        echo ($month >= $m10 && $year_now <= $year) ? ',' . $price_m10 : ""; ?>
    <?php $m11 = 11;
        echo ($month >= $m11 && $year_now <= $year) ? ',' . $price_m11 : ""; ?>
    <?php $m12 = 12;
        echo ($month >= $m12 && $year_now <= $year) ? ',' . $price_m12 : ""; ?>
];

new Chart("myChartPrice", {
    type: "line",
    data: {
        labels: xValuesPrice,
        datasets: [{
            fill: false,
            lineTension: 0.2,
            backgroundColor: "rgba(0,0,255,1.0)",
            borderColor: "rgba(0,0,255,0.3)",
            data: yValuesPrice
        }]
    },
    options: {
        legend: {
            display: false
        },
        scales: {
            yAxes: [{
                ticks: {
                    min: 0,
                    max: 5000000,
                    stepSize: 1000000,
                }
            }],
        },
        title: {
            display: true,
            text: "Biểu đồ thống kê giao dịch năm <?php echo $year_now ?> (Tháng/VNĐ)"
        }
    }
});
</script>