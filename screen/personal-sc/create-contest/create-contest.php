<link rel="stylesheet" href="assets/css/personal/create-contest.css">
<?php
//Kiểm tra đường dẫn
$matk = (isset($_SESSION['id_khachhang'])) ? $_SESSION['id_khachhang'] : '';

$sql_type = "SELECT maloaitaikhoan FROM taikhoan WHERE mataikhoan = $matk";
$query_type = mysqli_query($mysqli, $sql_type);
while ($row_type = mysqli_fetch_array($query_type)) {
    $maloaitaikhoan = $row_type['maloaitaikhoan'];
}

if ($matk == '' || $maloaitaikhoan == 2) {
?>
<script>
window.location.href = "index.php?quanly=404error";
</script>
<?php
}
date_default_timezone_set('Asia/Ho_Chi_Minh');
$time = date('Y-m-d');
$next_date = date('Y-m-d', strtotime($time . ' +1 day'));
?>
<div class="create-contest">
    <div class="box-create">
        <div class="box-title">
            <div>
                <i class="fa-solid fa-pen-to-square"></i>
                <span>Tạo sự kiện</span>
            </div>
            <div>
                <i class="fa-solid fa-info"></i>
                <a href="">Điều khoản sử dụng</a>
            </div>
        </div>
        <form action="screen/personal-sc/create-contest/handle-create.php" method="post" class="form-detail">
            <input type="text" name="mataikhoan" style="display: none;"
                value="<?php echo (isset($_SESSION['id_khachhang'])) ? $_SESSION['id_khachhang'] : ''; ?>">
            <div class="box-detail-contest">
                <div class="box-data-contest">
                    <div class="data-title-contest">
                        <i class="fa-solid fa-paperclip"></i>
                        <span>Tiêu đề sự kiện:</span>
                    </div>
                    <div class="data-content-contest">
                        <div class="data-input-contest">
                            <input type="text" name="tieudesukien" id="tieudesukien"
                                placeholder="Nhập tiêu đề sự kiện ..." oninput="ktTieuDeSuKien();">
                        </div>
                        <div class="data-mess-contest mess-error" id="tb-tieudesukien">* Chưa nhập tiêu đề sự kiện</div>
                    </div>
                </div>
            </div>
            <div class="box-detail-contest">
                <div class="box-data-contest">
                    <div class="data-title-contest">
                        <i class="fa-solid fa-clock"></i>
                        <span>Thời gian hết hạn:</span>
                    </div>
                    <div class="data-content-contest">
                        <div class="data-input-contest">
                            <input type="datetime-local" name="thoigianhethan" id="thoigianhethan"
                                oninput="ktThoiGianHetHan();" min="<?php echo $next_date . "T00:00" ?>">
                        </div>
                        <div class="data-mess-contest mess-error" id="tb-thoigianhethan">* Chưa chọn thời gian hết hạn
                        </div>
                    </div>
                </div>
            </div>
            <div class=" box-detail-contest">
                <div class="box-data-contest">
                    <div class="data-title-contest">
                        <i class="fa-solid fa-arrows-up-down-left-right"></i>
                        <span>Địa điểm sự kiện:</span>
                    </div>
                    <div class="data-content-contest">
                        <div class="data-input-contest">
                            <input type="text" name="diadiemsukien" id="diadiemsukien"
                                placeholder="Nhập địa điểm sự kiện ..." oninput="ktDiaDiemSuKien();">
                        </div>
                        <div class="data-mess-contest mess-error" id="tb-diadiemsukien">* Chưa nhập địa điểm sự kiện
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-detail-contest">
                <div class="box-data-contest">
                    <div class="data-title-contest">
                        <i class="fa-solid fa-user-plus"></i>
                        <span>Tên đội 1:</span>
                    </div>
                    <div class="data-content-contest">
                        <div class="data-input-contest">
                            <input type="text" name="tendoimot" id="tendoimot" placeholder="Nhập tên đội 1 ..."
                                oninput="ktTenDoiMot();">
                        </div>
                        <div class="data-mess-contest mess-error" id="tb-tendoimot">* Chưa nhập tên đội 1</div>
                    </div>
                </div>
            </div>
            <div class="box-detail-contest">
                <div class="box-data-contest">
                    <div class="data-title-contest">
                        <i class="fa-solid fa-user-plus"></i>
                        <span>Tên đội 2:</span>
                    </div>
                    <div class="data-content-contest">
                        <div class="data-input-contest">
                            <input type="text" name="tendoihai" id="tendoihai" placeholder="Nhập tên đội 2 ..."
                                oninput="ktTenDoiHai();">
                        </div>
                        <div class="data-mess-contest mess-error" id="tb-tendoihai">* Chưa nhập tên đội 2</div>
                    </div>
                </div>
            </div>
            <div class="box-detail-contest">
                <div class="box-data-contest">
                    <div class="data-title-contest">
                        <i class="fa-solid fa-gift"></i>
                        <span>Phần thưởng:</span>
                    </div>
                    <div class="data-content-contest">
                        <div class="data-input-contest">
                            <input type="text" name="phanthuong" id="phanthuong" placeholder="Nhập phần thưởng ..."
                                oninput="ktPhanThuong();">
                        </div>
                        <div class="data-mess-contest mess-error" id="tb-phanthuong">* Chưa nhập phần thưởng</div>
                    </div>
                </div>
            </div>
            <div class="box-detail-contest">
                <div class="box-data-contest">
                    <div class="data-title-contest">
                        <i class="fa-solid fa-people-group"></i>
                        <span>Số lượng cầu thủ:</span>
                    </div>
                    <div class="data-content-contest">
                        <div class="data-input-contest">
                            <select name="soluongcauthu">
                                <option value="10">10 người</option>
                                <option value="12">12 người</option>
                                <option value="14">14 người</option>
                                <option value="16">16 người</option>
                                <option value="18">18 người</option>
                                <option value="20">20 người</option>
                                <option value="22">22 người</option>
                                <option value="24">24 người</option>
                                <option value="26">26 người</option>
                                <option value="28">28 người</option>
                                <option value="30">30 người</option>
                            </select>
                        </div>
                        <div class="data-mess-contest">* Chọn số lượng cầu thủ</div>
                    </div>
                </div>
            </div>
            <div class="box-detail-contest">
                <div class="box-data-contest">
                    <div class="data-title-contest">
                        <i class="fa-solid fa-people-group"></i>
                        <span>Số lượng dự bị:</span>
                    </div>
                    <div class="data-content-contest">
                        <div class="data-input-contest">
                            <select name="soluongdubi">
                                <option value="10">10 người</option>
                                <option value="12">12 người</option>
                                <option value="14">14 người</option>
                                <option value="16">16 người</option>
                                <option value="18">18 người</option>
                                <option value="20">20 người</option>
                            </select>
                        </div>
                        <div class="data-mess-contest">* Chọn số lượng dự bị</div>
                    </div>
                </div>
            </div>
            <div class="box-detail-contest btn-submit">
                <button type="submit" name="xulysukien" id="xulysukien" disabled>Hoàn tất</button>
            </div>
        </form>
    </div>
</div>
<script src="screen/personal-sc/create-contest/handle-validation.js"></script>