<link rel="stylesheet" href="assets/css/personal/create-contest.css">
<div class="create-contest">
    <div class="box-create">
        <div class="box-title">
            <div>
                <i class="fa-solid fa-pen-to-square"></i>
                <span>Sửa sự kiện</span>
            </div>
            <div>
                <i class="fa-solid fa-info"></i>
                <a href="">Điều khoản sử dụng</a>
            </div>
        </div>
        <form action="screen/personal-sc/create-contest/handle-edit.php" method="post" class="form-detail">
            <input type="text" name="mataikhoan" style="display: none;"
                value="<?php echo (isset($_SESSION['id_khachhang'])) ? $_SESSION['id_khachhang'] : ''; ?>">
            <input type="text" name="masukien" style="display: none;"
                value="<?php echo (isset($_GET['id_contest'])) ? $_GET['id_contest'] : ''; ?>">
            <?php
            $masukien = (isset($_GET['id_contest'])) ? $_GET['id_contest'] : '';
            $sql = "SELECT * FROM sukien WHERE masukien = $masukien";
            $query = mysqli_query($mysqli, $sql);
            while ($row = mysqli_fetch_array($query)) {
            ?>
            <div class="box-detail-contest">
                <div class="box-data-contest">
                    <div class="data-title-contest">
                        <i class="fa-solid fa-paperclip"></i>
                        <span>Tiêu đề sự kiện:</span>
                    </div>
                    <div class="data-content-contest">
                        <div class="data-input-contest">
                            <input type="text" name="tieudesukien" id="tieudesukien"
                                placeholder="Nhập tiêu đề sự kiện ..." oninput="ktTieuDeSuKien();"
                                value="<?php echo $row['tieudesukien'] ?>">
                        </div>
                        <div class="data-mess-contest" id="tb-tieudesukien">* Đúng yêu cầu</div>
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
                                oninput="ktThoiGianHetHan();" value="<?php echo $row['ngayhethanthamgia'] ?>">
                        </div>
                        <div class="data-mess-contest" id="tb-thoigianhethan">* Đúng yêu cầu
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
                                placeholder="Nhập địa điểm sự kiện ..." oninput="ktDiaDiemSuKien();"
                                value="<?php echo $row['diadiemsukien'] ?>">
                        </div>
                        <div class="data-mess-contest" id="tb-diadiemsukien">* Đúng yêu cầu
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
                                oninput="ktTenDoiMot();" value="<?php echo $row['tendoimot'] ?>">
                        </div>
                        <div class="data-mess-contest" id="tb-tendoimot">* Đúng yêu cầu</div>
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
                                oninput="ktTenDoiHai();" value="<?php echo $row['tendoihai'] ?>">
                        </div>
                        <div class="data-mess-contest" id="tb-tendoihai">* Đúng yêu cầu</div>
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
                                oninput="ktPhanThuong();" value="<?php echo $row['phanthuong'] ?>">
                        </div>
                        <div class="data-mess-contest" id="tb-phanthuong">* Đúng yêu cầu</div>
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
                                <option value="10" <?php echo ($row['soluongcauthu'] == 10) ? 'selected' : ''; ?>>
                                    10 người</option>
                                <option value="12" <?php echo ($row['soluongcauthu'] == 12) ? 'selected' : ''; ?>>
                                    12 người</option>
                                <option value="14" <?php echo ($row['soluongcauthu'] == 14) ? 'selected' : ''; ?>>
                                    14 người</option>
                                <option value="16" <?php echo ($row['soluongcauthu'] == 16) ? 'selected' : ''; ?>>
                                    16 người</option>
                                <option value="18" <?php echo ($row['soluongcauthu'] == 18) ? 'selected' : ''; ?>>
                                    18 người</option>
                                <option value="20" <?php echo ($row['soluongcauthu'] == 20) ? 'selected' : ''; ?>>
                                    20 người</option>
                                <option value="22" <?php echo ($row['soluongcauthu'] == 22) ? 'selected' : ''; ?>>
                                    22 người</option>
                                <option value="24" <?php echo ($row['soluongcauthu'] == 24) ? 'selected' : ''; ?>>
                                    24 người</option>
                                <option value="26" <?php echo ($row['soluongcauthu'] == 26) ? 'selected' : ''; ?>>
                                    26 người</option>
                                <option value="28" <?php echo ($row['soluongcauthu'] == 28) ? 'selected' : ''; ?>>
                                    28 người</option>
                                <option value="30" <?php echo ($row['soluongcauthu'] == 30) ? 'selected' : ''; ?>>
                                    30 người</option>
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
                                <option value="10" <?php echo ($row['soluongcauthudubi'] == 10) ? 'selected' : ''; ?>>
                                    10 người</option>
                                <option value="12" <?php echo ($row['soluongcauthudubi'] == 12) ? 'selected' : ''; ?>>
                                    12 người</option>
                                <option value="14" <?php echo ($row['soluongcauthudubi'] == 14) ? 'selected' : ''; ?>>
                                    14 người</option>
                                <option value="16" <?php echo ($row['soluongcauthudubi'] == 16) ? 'selected' : ''; ?>>
                                    16 người</option>
                                <option value="18" <?php echo ($row['soluongcauthudubi'] == 18) ? 'selected' : ''; ?>>
                                    18 người</option>
                                <option value="20" <?php echo ($row['soluongcauthudubi'] == 20) ? 'selected' : ''; ?>>
                                    20 người</option>
                            </select>
                        </div>
                        <div class="data-mess-contest">* Chọn số lượng dự bị</div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
            <div class="box-detail-contest btn-submit">
                <button type="submit" name="xulysukien" id="xulysukien" disabled>Hoàn tất</button>
            </div>
        </form>
    </div>
</div>
<script src="screen/personal-sc/create-contest/handle-validation.js"></script>