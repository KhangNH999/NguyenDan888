<?php
if (isset($_SESSION['id_khachhang'])) {
    $userActive = $_SESSION['id_khachhang'];
} else {
    $userActive = '';
}
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
<div id="customer-box-chat" onclick="showBoxChat();">
    <img src="assets/images/icons/chat.gif" alt="Ảnh" class="icon-animation"></img>
    <span class="box-chat-text">TƯ VẤN</span>
</div>
<div id="box-chat-container">
    <div class="header-box-chat">
        <div class="title-box-chat">
            <i class="fa-sharp fa-solid fa-comments"></i>
            <span>TƯ VẤN KHÁCH HÀNG</span>
        </div>
        <div id="close-box-chat" onclick="closeBoxChat();"></div>
    </div>
    <div id="content-box-chat">
        <?php
        if ($userActive != '') {
        ?>
        <div id="bot-auto" onclick="showBOT();"><img src="assets/images/icons/bot-hinada.jpg" alt="Ảnh"></div>
        <div id="data-box-chat">
            <?php
                //----------------------------------------H
                $get_content_chat =
                    "SELECT * FROM tuvankhachhang
        WHERE mataikhoangui = '$userActive' OR mataikhoannhan = '$userActive'
        ORDER BY thoigiantuvan ASC";
                $query_get_content_chat = mysqli_query($mysqli, $get_content_chat);
                //Lấy ảnh và tên User
                $get_user =
                    "SELECT ten, hinhanh FROM taikhoan WHERE mataikhoan = '$userActive' LIMIT 1";
                $query_get_user = mysqli_query($mysqli, $get_user);
                while ($row_user = mysqli_fetch_array($query_get_user)) {
                    $name_user = $row_user['ten'];
                    $img_user = $row_user['hinhanh'];
                }
                //Lấy ảnh và tên Admin
                $get_admin =
                    "SELECT ten, hinhanh FROM taikhoan WHERE mataikhoan = '1' LIMIT 1";
                $query_get_admin = mysqli_query($mysqli, $get_admin);
                while ($row_admin = mysqli_fetch_array($query_get_admin)) {
                    $name_admin = $row_admin['ten'];
                    $img_admin = $row_admin['hinhanh'];
                }
                while ($row_get_content_chat = mysqli_fetch_array($query_get_content_chat)) {
                ?>
            <?php
                    //----------------------------------------I
                    if ($row_get_content_chat['mataikhoannhan'] == $userActive) {
                    ?>
            <div class="data-chat-left">
                <div class="data-pic-chat">
                    <img src="admin/modules/account/uploads-ac/<?php echo $img_admin; ?>"
                        alt="<?php echo $img_admin; ?>">
                </div>
                <div class="data-user-chat">
                    <div class="data-user-name"><?php echo $name_admin; ?></div>
                    <div class="data-user-content">
                        <p class="para-bot"><?php echo $row_get_content_chat['noidungtuvan'] ?></p>
                    </div>
                    <div class="data-time">
                        <?php echo date('d-m H:i', strtotime($row_get_content_chat['thoigiantuvan'])) ?></div>
                </div>
            </div>
            <?php
                    } else if ($row_get_content_chat['mataikhoangui'] == $userActive) {
                    ?>
            <div class="data-chat-right">
                <div class="data-user-chat">
                    <div class="data-user-name name-right"><?php echo $name_user; ?></div>
                    <div class="data-user-content content-right">
                        <p class="para-comment"><?php echo $row_get_content_chat['noidungtuvan'] ?></p>
                    </div>
                    <div class="data-time-right">
                        <?php echo date('d-m H:i', strtotime($row_get_content_chat['thoigiantuvan'])) ?></div>
                </div>
                <div class="data-pic-chat">
                    <img src="admin/modules/account/uploads-ac/<?php echo $img_user; ?>" alt="<?php echo $img_user; ?>">
                </div>
            </div>
            <?php
                    }
                    //----------------------------------------I
                    ?>
            <?php
                }
                //----------------------------------------H
                ?>
            <div class="data-chat-left" id="menu-help-bot" style="display:none;">
                <div class="data-pic-chat">
                    <img src="assets/images/icons/bot-hinada.jpg" alt="Ảnh">
                </div>
                <div class="data-user-chat">
                    <div class="data-user-name">BOT</div>
                    <div class="data-user-content">
                        <p class="para-bot">Hãy chọn mục bạn cần trợ giúp!</p>
                        <ul class="menu-help">
                            <li class="help-nav">
                                <p class="help-btn" id="mess-a" onclick="showBotA();">Cách đặt sân</p>
                            </li>
                            <li class="help-nav">
                                <p class="help-btn" id="mess-b" onclick="showBotB();">Cách viết Blog</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="data-chat-left" id="mess-bot-a">
                <div class="data-pic-chat">
                    <img src="assets/images/icons/bot-hinada.jpg" alt="Ảnh">
                </div>
                <div class="data-user-chat">
                    <div class="data-user-name">BOT</div>
                    <div class="data-user-content">
                        <p class="para-bot">
                            Đăng nhập<span class="arrow">></span>
                            Đặt sân<span class="arrow">></span>
                            (Chọn sân)<span class="arrow">></span>
                            Chọn đặt<span class="arrow">></span>
                            (Nhập thông tin)<span class="arrow">></span>
                            Đặt lịch<span class="arrow">></span>
                            Xác nhận<span class="arrow">></span>
                            Thanh toán.
                        </p>
                    </div>
                </div>
            </div>
            <div class="data-chat-left" id="mess-bot-b">
                <div class="data-pic-chat">
                    <img src="assets/images/icons/bot-hinada.jpg" alt="Ảnh">
                </div>
                <div class="data-user-chat">
                    <div class="data-user-name">BOT</div>
                    <div class="data-user-content">
                        <p class="para-bot">
                            Đăng nhập<span class="arrow">></span>
                            (Di chuột vào Avatar)<span class="arrow">></span>
                            Trang của tôi<span class="arrow">></span>
                            Đăng Blog<span class="arrow">></span>
                            (Nhập nội dung)<span class="arrow">></span>
                            Hoàn tất.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php
        } else {
        ?>
        <div id="data-box-chat">
            <div class="data-chat-left">
                <div class="data-pic-chat">
                    <img src="assets/images/icons/bot-hinada.jpg" alt="Ảnh">
                </div>
                <div class="data-user-chat">
                    <div class="data-user-name">BOT</div>
                    <div class="data-user-content">
                        <p class="para-bot">Hãy chọn mục bạn cần trợ giúp!</p>
                        <ul class="menu-help">
                            <li class="help-nav">
                                <p class="help-btn" id="mess-a" onclick="showMessA();">Cách đặt sân</p>
                            </li>
                            <li class="help-nav">
                                <p class="help-btn" id="mess-b" onclick="showMessB();">Cách viết Blog</p>
                            </li>
                            <li class="help-nav">
                                <p class="help-btn" id="mess-c" onclick="showMessC();">Nhắn tin trực tiếp</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="data-chat-left" id="mess-a-1">
                <div class="data-pic-chat">
                    <img src="assets/images/icons/bot-hinada.jpg" alt="Ảnh">
                </div>
                <div class="data-user-chat">
                    <div class="data-user-name">BOT</div>
                    <div class="data-user-content">
                        <p class="para-bot">
                            Đăng nhập<span class="arrow">></span>
                            Đặt sân<span class="arrow">></span>
                            (Chọn sân)<span class="arrow">></span>
                            Chọn đặt<span class="arrow">></span>
                            (Nhập thông tin)<span class="arrow">></span>
                            Đặt lịch<span class="arrow">></span>
                            Xác nhận<span class="arrow">></span>
                            Thanh toán.
                        </p>
                    </div>
                </div>
            </div>
            <div class="data-chat-left" id="mess-b-1">
                <div class="data-pic-chat">
                    <img src="assets/images/icons/bot-hinada.jpg" alt="Ảnh">
                </div>
                <div class="data-user-chat">
                    <div class="data-user-name">BOT</div>
                    <div class="data-user-content">
                        <p class="para-bot">
                            Đăng nhập<span class="arrow">></span>
                            (Di chuột vào Avatar)<span class="arrow">></span>
                            Trang của tôi<span class="arrow">></span>
                            Đăng Blog<span class="arrow">></span>
                            (Nhập nội dung)<span class="arrow">></span>
                            Hoàn tất.
                        </p>
                    </div>
                </div>
            </div>
            <div class="data-chat-left" id="mess-c-1">
                <div class="data-pic-chat">
                    <img src="assets/images/icons/bot-hinada.jpg" alt="Ảnh">
                </div>
                <div class="data-user-chat">
                    <div class="data-user-name">BOT</div>
                    <div class="data-user-content">
                        <p class="para-bot">Vui lòng đăng nhập để có thể trò chuyện trực tiếp với Admin!</p>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
    <?php if ($userActive != '') { ?>
    <div class="comment-box-chat">
        <form action="screen/advisory-sc/handle-chat.php" method="post" class="comment-box-chat">
            <input type="text" name="userID" style="display: none;" value="<?php echo $userActive ?>">
            <input type="text" name="maurl" style="display: none;" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
            <textarea name="content-comment-chat" id="content-comment-chat" cols="30" rows="10"
                placeholder="Chat tại đây ..." onkeyup="ktNhap();"></textarea>
            <button type="submit" name="guichat" id="guichat" disabled>GỬI</button>
        </form>
    </div>
    <?php } else { ?>
    <div class="comment-box-chat">
        <textarea name="content-comment-chat" id="content-comment-chat" cols="30" rows="10"
            placeholder="Đăng nhập để chat ..." disabled></textarea>
        <button type="submit">!</button>
    </div>
    <?php
    }
    ?>
</div>
<script>
//Auto scroll 
function autoScroll() {
    var elem = document.getElementById('data-box-chat');
    elem.scrollTop = elem.scrollHeight;
}

//Kiểm tra nhập
function ktNhap() {
    if (document.getElementById("content-comment-chat").value === "") {
        document.getElementById('guichat').disabled = true;
    } else {
        document.getElementById('guichat').disabled = false;
    }
}

//Đóng mở Box Chat kể cả khi Refresh trang
function showBoxChat() {
    document.getElementById('box-chat-container').style.display = "block";
    localStorage.setItem('show', 'true');
    autoScroll();
}

function closeBoxChat() {
    document.getElementById('box-chat-container').style.display = "none";
    localStorage.removeItem('show');
    localStorage.removeItem('showBOT');

}

window.onload = function() {
    var show = localStorage.getItem('show');
    var chatA = localStorage.getItem('chatA');
    var chatB = localStorage.getItem('chatB');
    var chatC = localStorage.getItem('chatC');

    var showBOT = localStorage.getItem('showBOT');
    var chatBotA = localStorage.getItem('chatBotA');
    var chatBotB = localStorage.getItem('chatBotB');
    if (show === 'true') {
        document.getElementById('box-chat-container').style.display = "block";
        autoScroll();
    }

    if (chatA === 'true') {
        document.getElementById('mess-a-1').style.display = "flex";
        document.getElementById('mess-b-1').style.display = "none";
        document.getElementById('mess-c-1').style.display = "none";
        autoScroll();
    }
    if (chatB === 'true') {
        document.getElementById('mess-b-1').style.display = "flex";
        document.getElementById('mess-a-1').style.display = "none";
        document.getElementById('mess-c-1').style.display = "none";
        autoScroll();
    }
    if (chatC === 'true') {
        document.getElementById('mess-c-1').style.display = "flex";
        document.getElementById('mess-a-1').style.display = "none";
        document.getElementById('mess-b-1').style.display = "none";
        autoScroll();
    }

    if (showBOT === 'true') {
        document.getElementById('menu-help-bot').style.display = "flex";
        autoScroll();
    }

    if (chatBotA === 'true') {
        document.getElementById('mess-bot-a').style.display = "flex";
        document.getElementById('mess-bot-b').style.display = "none";
        autoScroll();
    }

    if (chatBotB === 'true') {
        document.getElementById('mess-bot-b').style.display = "flex";
        document.getElementById('mess-bot-a').style.display = "none";
        autoScroll();
    }
}

//Auto-BOT
function showMessA() {
    document.getElementById('mess-a-1').style.display = "flex";
    document.getElementById('mess-b-1').style.display = "none";
    document.getElementById('mess-c-1').style.display = "none";
    localStorage.setItem('chatA', 'true');
    localStorage.removeItem('chatB');
    localStorage.removeItem('chatC');
}

function showMessB() {
    document.getElementById('mess-b-1').style.display = "flex";
    document.getElementById('mess-a-1').style.display = "none";
    document.getElementById('mess-c-1').style.display = "none";
    localStorage.setItem('chatB', 'true');
    localStorage.removeItem('chatA');
    localStorage.removeItem('chatC');
}

function showMessC() {
    document.getElementById('mess-c-1').style.display = "flex";
    document.getElementById('mess-a-1').style.display = "none";
    document.getElementById('mess-b-1').style.display = "none";
    localStorage.setItem('chatC', 'true');
    localStorage.removeItem('chatB');
    localStorage.removeItem('chatA');
}
//Ẩn hiện BOT chat
function showBOT() {
    if (document.getElementById('menu-help-bot').style.display == "none") {
        document.getElementById('menu-help-bot').style.display = "flex";
        localStorage.setItem('showBOT', 'true');
        autoScroll();
    } else {
        document.getElementById('menu-help-bot').style.display = "none";
        document.getElementById('mess-bot-a').style.display = "none";
        document.getElementById('mess-bot-b').style.display = "none";
        localStorage.removeItem('showBOT');
        localStorage.removeItem('chatBotA');
        localStorage.removeItem('chatBotB');
        autoScroll();
    }
}

function showBotA() {
    document.getElementById('mess-bot-a').style.display = "flex";
    document.getElementById('mess-bot-b').style.display = "none";
    localStorage.setItem('chatBotA', 'true');
    localStorage.removeItem('chatBotB');
}

function showBotB() {
    document.getElementById('mess-bot-b').style.display = "flex";
    document.getElementById('mess-bot-a').style.display = "none";
    localStorage.setItem('chatBotB', 'true');
    localStorage.removeItem('chatBotA');
}
</script>