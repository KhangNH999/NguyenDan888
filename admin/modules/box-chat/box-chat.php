<?php
//----------------------------------------A
if (isset($_GET['userID'])) {
    $mataikhoangui = $_GET['userID'];
} else {
    $mataikhoangui = '';
}
//----------------------------------------A
?>
<div class="box-chat">
    <div class="box-menu-user">
        <ul class="box-list-user">
            <?php
            //----------------------------------------C
            $list_user =
                "SELECT mataikhoangui FROM tuvankhachhang 
            WHERE mataikhoangui != '1'
            AND tinhtrangtuvan = '2'
            ORDER BY matuvan DESC";
            $query_list_user = mysqli_query($mysqli, $list_user);
            while ($row_list_user = mysqli_fetch_array($query_list_user)) {
                //----------------------------------------D
                $user_comment =
                    "SELECT * FROM tuvankhachhang, taikhoan
                WHERE tuvankhachhang.mataikhoangui = taikhoan.mataikhoan
                AND tuvankhachhang.mataikhoangui = $row_list_user[mataikhoangui]
                ORDER BY matuvan DESC LIMIT 1";
                $query_user_comment = mysqli_query($mysqli, $user_comment);
                while ($row_user_comment = mysqli_fetch_array($query_user_comment)) {
            ?>
            <a href="index.php?action=quanlytuvankhachhang&query=main&userID=<?php echo $row_user_comment['mataikhoangui'] ?>&id_user=<?php echo $_GET['id_user'] ?>"
                class="box-data-user <?php echo ($mataikhoangui == $row_user_comment['mataikhoangui']) ? 'box-selected' : ''; ?>">
                <?php
                        //----------------------------------------G
                        if (isset($_GET['userID']) && $_GET['userID'] == $row_user_comment['mataikhoangui']) {
                            $update_new_notify =
                                "UPDATE tuvankhachhang SET tinhtrangtinnhan = '0' 
                                WHERE mataikhoangui = '$_GET[userID]'";
                            mysqli_query($mysqli, $update_new_notify);
                        }
                        //----------------------------------------G
                        ?>
                <div class="box-img-user">
                    <img src="modules/account/uploads-ac/<?php echo $row_user_comment['hinhanh'] ?>"
                        alt="<?php echo $row_user_comment['hinhanh'] ?>">
                    <div class="status-user <?php echo ($row_user_comment['tinhtrangtk'] == 1) ? 'login' : ''; ?>">
                    </div>
                </div>
                <div class="box-detail">
                    <div class="user-date">
                        <span class="user-name"><?php echo $row_user_comment['ten'] ?></span>
                        <span class="user-time">
                            <?php
                                    //----------------------------------------F
                                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                                    $datenow = date("Y-m-d H:i:s");
                                    $timenow = strtotime($datenow);
                                    $dateto = $row_user_comment['thoigiantuvan'];
                                    $timeto = strtotime($dateto);
                                    $time = $timenow - $timeto;
                                    $min = (int)(($timenow - $timeto) / 60);
                                    $hour = (int)(($timenow - $timeto) / (60 * 60));
                                    $day = (int)(($timenow - $timeto) / (60 * 60 * 24));
                                    if ($day >= 7) {
                                        echo date('d/m', strtotime($row_user_comment['thoigiantuvan']));
                                    } else if ($hour >= 24) {
                                        echo $day . ' ngày';
                                    } else if ($min >= 60) {
                                        echo $hour . ' giờ';
                                    } else {
                                        echo $min . ' phút';
                                    }
                                    //----------------------------------------F
                                    ?>
                        </span>
                    </div>
                    <div class="content-notify">
                        <?php
                                //----------------------------------------E
                                $get_comment_user =
                                    "SELECT noidungtuvan, tinhtrangtinnhan FROM tuvankhachhang 
                            WHERE mataikhoangui = '$row_user_comment[mataikhoangui]'
                            ORDER BY matuvan DESC LIMIT 1";
                                $query_get_comment_user = mysqli_query($mysqli, $get_comment_user);
                                while ($row_get_comment_user = mysqli_fetch_array($query_get_comment_user)) {
                                ?>
                        <span class="user-content"><?php echo $row_get_comment_user['noidungtuvan'] ?></span>
                        <?php echo ($row_get_comment_user['tinhtrangtinnhan'] == '1') ? '<span class="user-notify">N</span>' : ''; ?>
                        <?php
                                }
                                //----------------------------------------E
                                ?>

                    </div>
                </div>
            </a>
            <?php
                }
                //----------------------------------------D
            }
            //----------------------------------------C
            ?>
        </ul>
    </div>
    <div class="box-chat-user">
        <div id="content-chat-slide">
            <?php
            //----------------------------------------H
            $get_content_chat =
                "SELECT * FROM tuvankhachhang
            WHERE mataikhoangui = '$mataikhoangui' OR mataikhoannhan = '$mataikhoangui'
            ORDER BY thoigiantuvan ASC";
            $query_get_content_chat = mysqli_query($mysqli, $get_content_chat);
            //Lấy ảnh User
            $get_img_user =
                "SELECT hinhanh FROM taikhoan WHERE mataikhoan = '$mataikhoangui' LIMIT 1";
            $query_get_img_user = mysqli_query($mysqli, $get_img_user);
            $row_img_user = mysqli_fetch_row($query_get_img_user);
            //Lấy ảnh Admin
            $get_img_admin =
                "SELECT hinhanh FROM taikhoan WHERE mataikhoan = '58' LIMIT 1";
            $query_get_img_admin = mysqli_query($mysqli, $get_img_admin);
            $row_img_admin = mysqli_fetch_row($query_get_img_admin);
            while ($row_get_content_chat = mysqli_fetch_array($query_get_content_chat)) {
            ?>
            <?php
                //----------------------------------------I
                if ($row_get_content_chat['mataikhoangui'] == $mataikhoangui) {
                ?>
            <div class="container">
                <img src="modules/account/uploads-ac/<?php echo implode($row_img_user); ?>"
                    alt="<?php echo implode($row_img_user); ?>" style="width:100%;">
                <p class="content-chat-box"><?php echo $row_get_content_chat['noidungtuvan'] ?></p>
                <span class="time-right"><?php echo $row_get_content_chat['thoigiantuvan'] ?></span>
            </div>
            <?php
                } else if ($row_get_content_chat['mataikhoannhan'] == $mataikhoangui) {
                ?>
            <div class="container darker">
                <img src="modules/account/uploads-ac/<?php echo implode($row_img_admin); ?>"
                    alt="<?php echo implode($row_img_admin); ?>" class="right" style="width:100%;">
                <p class="content-chat-box"><?php echo $row_get_content_chat['noidungtuvan'] ?></p>
                <span class="time-left"><?php echo $row_get_content_chat['thoigiantuvan'] ?></span>
            </div>
            <?php
                }
                //----------------------------------------I
                ?>
            <?php
            }
            //----------------------------------------H
            ?>
        </div>
        <?php
        if (isset($_GET['userID'])) {
        ?>
        <div id="comment-chat-slide">
            <form action="modules/box-chat/handle.php?id_user=<?php echo $_GET['id_user'] ?>" method="post"
                class="form-chat">
                <input type="text" name="userID" style="display: none;" value="<?php echo $mataikhoangui ?>">
                <div class="input-comment">
                    <textarea name="noidungchat" id="noidungchat" cols="30" rows="10" onkeyup="ktNhap();"
                        placeholder="Nhập nội dung tại đây ..."></textarea>
                </div>
                <div class="submit-comment">
                    <button type="submit" name="guibinhluantuvan" id="guibinhluantuvan" disabled>Gửi</button>
                </div>
            </form>
        </div>
        <?php
        } else {
        ?>
        <div id="comment-chat-slide">
        </div>
        <?php
        }
        ?>
    </div>
</div>
<script>
var elem = document.getElementById('content-chat-slide');
elem.scrollTop = elem.scrollHeight;

function ktNhap() {
    if (document.getElementById("noidungchat").value === "") {
        document.getElementById('guibinhluantuvan').disabled = true;
    } else {
        document.getElementById('guibinhluantuvan').disabled = false;
    }
}
</script>