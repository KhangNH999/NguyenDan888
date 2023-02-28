<?php
//Nếu thời gian lịch sử trừ thời gian hiện tại <= 0 thì sân được mở khóa và cập nhật lại lịch sử 
date_default_timezone_set('Asia/Ho_Chi_Minh');
$sql_his = "SELECT * FROM lichsudatsan, khunggio WHERE lichsudatsan.makhunggio = khunggio.makhunggio AND tinhtranglichsu = '1'";
$query_his = mysqli_query($mysqli, $sql_his);
while ($row_his = mysqli_fetch_array($query_his)) {
    $datenow = date("Y-m-d H:i:s");
    $timenow = strtotime($datenow);
    $dateto = $row_his['ngaydat'] . " " . $row_his['gioketthuc'];
    $timeto = strtotime($dateto);
    $time = $timeto - $timenow;
    if ($time < 0) {
        $sql_update = "UPDATE lichsudatsan SET tinhtranglichsu = 0 WHERE malichsu = '" . $row_his['malichsu'] . "'";
        mysqli_query($mysqli, $sql_update);
    }
}