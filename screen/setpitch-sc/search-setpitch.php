<form action="index.php?quanly=datsan" method="post">
    <div id="title">
        <div class="title">
            <img src="assets/images/icons/search.gif" alt="Ảnh" style="width: 30px; height: 30px;">
            <span style="margin-left: 4px;">TÌM KIẾM</span>
        </div>
    </div>
    <div id="total">
        <div class="in-table">
            <form>
                <?php
                //Lấy data từ submit timkiemdatsan để xác định hiển thị tương ứng với radio đã chọn
                if (isset($_POST['group_rd']) && $_POST['group_rd'] == 'All_love') {
                ?>
                <script>
                window.location.href = "index.php?quanly=datsan&&type=love";
                </script>
                <?php
                } elseif (isset($_POST['group_rd']) && $_POST['group_rd'] == 'All_follow') {
                ?>
                <script>
                window.location.href = "index.php?quanly=datsan&&type=follow";
                </script>
                <?php
                } elseif (isset($_POST['group_rd']) && $_POST['group_rd'] == 'All_comment') {
                ?>
                <script>
                window.location.href = "index.php?quanly=datsan&&type=comment";
                </script>
                <?php
                } elseif (isset($_POST['group_rd']) && $_POST['group_rd'] == 'All') {
                ?>
                <script>
                window.location.href = "index.php?quanly=datsan&&type=default";
                </script>
                <?php
                }
                ?>
                <div class="tr">
                    <div class="titl">
                        <input type="radio" name="group_rd" <?php if (isset($_GET['type']) && $_GET['type'] == 'default') {
                                                                echo "checked='checked'";
                                                            } else {
                                                                echo '';
                                                            } ?> value="All">Tất cả
                        &nbsp;
                        <input type="radio" name="group_rd" <?php if (isset($_GET['type']) && $_GET['type'] == 'love') {
                                                                echo "checked='checked'";
                                                            } else {
                                                                echo '';
                                                            } ?> value="All_love">Yêu thích
                        &nbsp;
                        <input type="radio" name="group_rd" <?php if (isset($_GET['type']) && $_GET['type'] == 'follow') {
                                                                echo "checked='checked'";
                                                            } else {
                                                                echo '';
                                                            } ?> value="All_follow">Theo dõi
                        &nbsp;
                        <input type="radio" name="group_rd" <?php if (isset($_GET['type']) && $_GET['type'] == 'comment') {
                                                                echo "checked='checked'";
                                                            } else {
                                                                echo '';
                                                            } ?> value="All_comment">Bình luận
                    </div>
                </div>
            </form>
        </div>
        <div class="btns">
            <input type="submit" class="btn" name="timkiemdatsan" value="Tìm kiếm">
        </div>
    </div>
</form>