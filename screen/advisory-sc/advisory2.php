<?php
if (isset($_SESSION['id_khachhang'])) {
    $userActive = $_SESSION['id_khachhang'];
} else {
    $userActive = '';
}
date_default_timezone_set('Asia/Ho_Chi_Minh');
$mataikhoannhan = $userActive;
?>
<div id="notify-box-chat" style="display: none;">
    <div class="text-container">
        <ul class="dynamic-text">
            <li class="item">Xin chào!</li>
            <li class="item">Nếu có thắc mắc.</li>
            <li class="item">Tôi có thể giúp bạn.</li>
            <li class="item">Thân ái!</li>
        </ul>
        <button class="static-text" onclick="closeNotify();"><i class="fa-solid fa-xmark"></i></button>
    </div>
</div>
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
    <div class="option-box-chat">
        <button class="option-select" id="op-bot" onclick="showBot();">
            <img src="assets/images/icons/robot-unscreen.gif" alt="Ảnh">
        </button>
        <button class="option-select" id="op-advise" onclick="showAdvise();"
            <?php echo ($userActive == '' || $mataikhoannhan == '58') ? 'disabled' : ''; ?>>
            <img src="assets/images/icons/speech-bubble-unscreen.gif" alt="Ảnh">
        </button>
    </div>
    <div id="content-box-chat">
        <div id="data-chat-bot">
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
                                <p class="help-btn" id="mess-d" onclick="showMessD();">Hướng dẫn đặt sân.</p>
                            </li>
                            <li class="help-nav">
                                <p class="help-btn" id="mess-d" onclick="showMessE();">Hướng dẫn tham gia sự kiện.</p>
                            </li>
                            <li class="help-nav">
                                <p class="help-btn" id="mess-a" onclick="showMessA();">Hướng dẫn tạo sân.</p>
                            </li>
                            <li class="help-nav">
                                <p class="help-btn" id="mess-b" onclick="showMessB();">Hướng dẫn tạo blog.</p>
                            </li>
                            <li class="help-nav">
                                <p class="help-btn" id="mess-c" onclick="showMessC();">Hướng dẫn tạo sự kiện.</p>
                            </li>
                            <li class="help-nav">
                                <p class="help-btn" id="mess-d" onclick="showMessF();">Hướng dẫn đánh giá.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Hướng dẫn tạo sân -->
            <?php include('bot/create-pitch.php');  ?>
            <!-- Hướng dẫn tạo blog -->
            <?php include('bot/create-blog.php');  ?>
            <!-- Hướng dẫn tạo sự kiện -->
            <?php include('bot/create-contest.php');  ?>
            <!-- Hướng dẫn đặt sân -->
            <?php include('bot/set-the-pitch.php');  ?>
            <!-- Hướng dẫn tham gia sự kiện -->
            <?php include('bot/participation-contest.php');  ?>
            <!-- Hướng dẫn đánh giá -->
            <?php include('bot/rating.php');  ?>
        </div>

        <div id="data-chat-advise">
            <?php
            //----------------------------------------H
            $get_content_chat =
                "SELECT * FROM tuvankhachhang
        WHERE mataikhoangui = '$userActive' OR mataikhoannhan = '$userActive'
        ORDER BY thoigiantuvan ASC";
            $query_get_content_chat = mysqli_query($mysqli, $get_content_chat);
            $count_get_content_chat = mysqli_num_rows($query_get_content_chat);
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
                "SELECT ten, hinhanh FROM taikhoan WHERE mataikhoan = '58' LIMIT 1";
            $query_get_admin = mysqli_query($mysqli, $get_admin);
            while ($row_admin = mysqli_fetch_array($query_get_admin)) {
                $name_admin = $row_admin['ten'];
                $img_admin = $row_admin['hinhanh'];
            }
            if ($mataikhoannhan == '58') {
            ?>
            <div style="font-size: 13px; color: #ddd;text-align: center;padding: 10px 0;">Chưa có dữ liệu chat.</div>
            <?php
            } else if ($count_get_content_chat > 0) {
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
                        <?php echo date('d-m H:i', strtotime($row_get_content_chat['thoigiantuvan'])) ?>
                    </div>
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
            } else {
                //----------------------------------------H
                ?>
            <div style="font-size: 13px; color: #ddd;text-align: center;padding: 10px 0;">Chưa có dữ liệu chat.</div>
            <?php
            }
            ?>
        </div>
    </div>
    <?php if ($mataikhoannhan == '58') {
    ?>
    <div class="comment-box-chat" id="comment-field">
        <textarea name="content-comment-chat" id="content-comment-chat" cols="30" rows="10"
            placeholder="Không thể gửi tin!" disabled></textarea>
        <button type="submit">!</button>
    </div>
    <?php
    } else if ($userActive != '') { ?>
    <div class="comment-box-chat hidden-comment" id="comment-field">
        <form action="screen/advisory-sc/handle-chat.php" method="post" class="comment-box-chat">
            <input type="text" name="userID" style="display: none;" value="<?php echo $userActive ?>">
            <input type="text" name="maurl" style="display: none;" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
            <textarea name="content-comment-chat" id="content-comment-chat" cols="30" rows="10"
                placeholder="Chat tại đây ..." onkeyup="ktNhap();"></textarea>
            <button type="submit" name="guichat" id="guichat" disabled>GỬI</button>
        </form>
    </div>
    <?php } else { ?>
    <div class="comment-box-chat" id="comment-field">
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
function autoScrollBot() {
    var elem = document.getElementById('data-chat-bot');
    elem.scrollTop = elem.scrollHeight;
}

function autoScrollAdvise() {
    var elem = document.getElementById('data-chat-advise');
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
//Đóng thông báo nổi
function closeNotify() {
    document.getElementById('notify-box-chat').style.display = "none";
    localStorage.setItem('close-notify', 'true');
}

//Đóng\Mở Box Chat kể cả khi Refresh trang
function showBoxChat() {
    document.getElementById('box-chat-container').classList.add('show-chat-container');
    localStorage.setItem('show', 'true');
    autoScrollBot();
    autoScrollAdvise();
}

function closeBoxChat() {
    document.getElementById('box-chat-container').classList.remove('show-chat-container');
    localStorage.removeItem('show');
    resetLocalStorage();
}

function showBot() {
    document.getElementById('data-chat-bot').style.display = "block";
    document.getElementById('data-chat-advise').style.display = "none";
    document.getElementById('op-bot').style.backgroundColor = "#fff";
    document.getElementById('op-advise').style.backgroundColor = "#f3f7fc";
    document.getElementById('comment-field').classList.add('hidden-comment');
    localStorage.removeItem('advise');
    autoScrollBot();
}

function showAdvise() {
    document.getElementById('data-chat-bot').style.display = "none";
    document.getElementById('data-chat-advise').style.display = "block";
    document.getElementById('op-bot').style.backgroundColor = "#f3f7fc";
    document.getElementById('op-advise').style.backgroundColor = "#fff";
    document.getElementById('comment-field').classList.remove('hidden-comment');
    localStorage.setItem('advise', 'true');
    autoScrollAdvise();
}
//Reset
function resetBotChat() {
    document.getElementById('mess-a-1').style.display = "none";
    document.getElementById('mess-b-1').style.display = "none";
    document.getElementById('mess-c-1').style.display = "none";
    document.getElementById('mess-d-1').style.display = "none";
    document.getElementById('mess-e-1').style.display = "none";
    document.getElementById('mess-f-1').style.display = "none";
}

function resetLocalStorage() {
    localStorage.removeItem('chatA');
    localStorage.removeItem('chatB');
    localStorage.removeItem('chatC');
    localStorage.removeItem('chatD');
    localStorage.removeItem('chatE');
    localStorage.removeItem('chatF');
}

//Auto-BOT
function showMessA() {
    resetBotChat();
    resetLocalStorage();
    document.getElementById('mess-a-1').style.display = "flex";
    localStorage.setItem('chatA', 'true');
    autoScrollBot();
}

function showMessB() {
    resetBotChat();
    resetLocalStorage();
    document.getElementById('mess-b-1').style.display = "flex";
    localStorage.setItem('chatB', 'true');
    autoScrollBot();
}

function showMessC() {
    resetBotChat();
    resetLocalStorage();
    document.getElementById('mess-c-1').style.display = "flex";
    localStorage.setItem('chatC', 'true');
    autoScrollBot();
}

function showMessD() {
    resetBotChat();
    resetLocalStorage();
    document.getElementById('mess-d-1').style.display = "flex";
    localStorage.setItem('chatD', 'true');
    autoScrollBot();
}

function showMessE() {
    resetBotChat();
    resetLocalStorage();
    document.getElementById('mess-e-1').style.display = "flex";
    localStorage.setItem('chatE', 'true');
    autoScrollBot();
}

function showMessF() {
    resetBotChat();
    resetLocalStorage();
    document.getElementById('mess-f-1').style.display = "flex";
    localStorage.setItem('chatF', 'true');
    autoScrollBot();
}



window.onload = function() {
    document.getElementById('notify-box-chat').style.display = "block";
    var show = localStorage.getItem('show');
    var advise = localStorage.getItem('advise');
    var closeNotify = localStorage.getItem('close-notify');
    var chatA = localStorage.getItem('chatA');
    var chatB = localStorage.getItem('chatB');
    var chatC = localStorage.getItem('chatC');
    var chatD = localStorage.getItem('chatD');
    var chatE = localStorage.getItem('chatE');
    var chatF = localStorage.getItem('chatF');
    if (show === 'true') {
        showBoxChat();
    }
    if (advise === 'true') {
        showAdvise();
    }
    if (closeNotify === 'true') {
        document.getElementById('notify-box-chat').style.display = "none";
    }
    if (chatA === 'true') {
        showMessA();
    }
    if (chatB === 'true') {
        showMessB();
    }
    if (chatC === 'true') {
        showMessC();
    }
    if (chatD === 'true') {
        showMessD();
    }
    if (chatE === 'true') {
        showMessE();
    }
    if (chatF === 'true') {
        showMessF();
    }
}
</script>