<div class="main-ad" data-aos="fade-left">
    <?php
    if (isset($_GET['action']) && $_GET['query']) {
        $tam = $_GET['action'];
        $query = $_GET['query'];
    } else {
        $tam = '';
        $query = '';
    }
    if ($tam == 'quanlyloaitaikhoan' && $query == 'main') {
        include('modules/account-type/listed.php');
    } elseif ($tam == 'quanlyloaitaikhoan' && $query == 'add') {
        include('modules/account-type/add.php');
    } elseif ($tam == 'quanlyloaitaikhoan' && $query == 'edit') {
        include('modules/account-type/edit.php');
    } elseif ($tam == 'quanlytaikhoan' && $query == 'main') {
        include('modules/account/request.php');
        include('modules/account/listed.php');
    } elseif ($tam == 'quanlytaikhoan' && $query == 'add') {
        include('modules/account/add.php');
    } elseif ($tam == 'quanlytaikhoan' && $query == 'edit') {
        include('modules/account/edit.php');
    } elseif ($tam == 'quanlysan' && $query == 'main') {
        include('modules/pitch/request.php');
        include('modules/pitch/listed.php');
    } elseif ($tam == 'quanlysan' && $query == 'add') {
        include('modules/pitch/add.php');
    } elseif ($tam == 'quanlysan' && $query == 'edit') {
        include('modules/pitch/edit.php');
    } elseif ($tam == 'quanlyblog' && $query == 'main') {
        include('modules/blog/listed.php');
    } elseif ($tam == 'quanlyblog' && $query == 'add') {
        include('modules/blog/add.php');
    } elseif ($tam == 'quanlyblog' && $query == 'edit') {
        include('modules/blog/edit.php');
    } elseif ($tam == 'quanlylichsudatsan' && $query == 'main') {
        include('modules/setpitch-his/listed.php');
    } elseif ($tam == 'quanlylichsudatsan' && $query == 'add') {
        include('modules/setpitch-his/add.php');
    } elseif ($tam == 'quanlylichsudatsan' && $query == 'edit') {
        include('modules/setpitch-his/edit.php');
    } elseif ($tam == 'quanlybinhluansan' && $query == 'main') {
        include('modules/comment-pitch/listed.php');
    } elseif ($tam == 'quanlybinhluansan' && $query == 'add') {
        include('modules/comment-pitch/add.php');
    } elseif ($tam == 'quanlybinhluansan' && $query == 'edit') {
        include('modules/comment-pitch/edit.php');
    } elseif ($tam == 'quanlybinhluanblog' && $query == 'main') {
        include('modules/comment-blog/listed.php');
    } elseif ($tam == 'quanlybinhluanblog' && $query == 'add') {
        include('modules/comment-blog/add.php');
    } elseif ($tam == 'quanlybinhluanblog' && $query == 'edit') {
        include('modules/comment-blog/edit.php');
    } elseif ($tam == 'quanlytheodoi' && $query == 'main') {
        include('modules/follow/listed.php');
    } elseif ($tam == 'quanlytheodoi' && $query == 'add') {
        include('modules/follow/add.php');
    } elseif ($tam == 'quanlytheodoi' && $query == 'edit') {
        include('modules/follow/edit.php');
    } elseif ($tam == 'quanlyyeuthichsan' && $query == 'main') {
        include('modules/like-pitch/listed.php');
    } elseif ($tam == 'quanlyyeuthichsan' && $query == 'add') {
        include('modules/like-pitch/add.php');
    } elseif ($tam == 'quanlyyeuthichsan' && $query == 'edit') {
        include('modules/like-pitch/edit.php');
    } elseif ($tam == 'quanlyyeuthichblog' && $query == 'main') {
        include('modules/like-blog/listed.php');
    } elseif ($tam == 'quanlyyeuthichblog' && $query == 'add') {
        include('modules/like-blog/add.php');
    } elseif ($tam == 'quanlyyeuthichblog' && $query == 'edit') {
        include('modules/like-blog/edit.php');
    } elseif ($tam == 'quanlythongbao' && $query == 'main') {
        include('modules/notification/listed.php');
    } elseif ($tam == 'quanlythongbao' && $query == 'add') {
        include('modules/notification/add.php');
    } elseif ($tam == 'quanlythongbao' && $query == 'edit') {
        include('modules/notification/edit.php');
    } elseif ($tam == 'quanlydanhgia' && $query == 'main') {
        include('modules/rating/listed.php');
    } elseif ($tam == 'quanlydanhgia' && $query == 'add') {
        include('modules/rating/add.php');
    } elseif ($tam == 'quanlydanhgia' && $query == 'edit') {
        include('modules/rating/edit.php');
    } elseif ($tam == 'quanlybaocaoblog' && $query == 'main') {
        include('modules/report-blog/listed.php');
    } elseif ($tam == 'quanlybaocaoblog' && $query == 'add') {
        include('modules/report-blog/add.php');
    } elseif ($tam == 'quanlybaocaoblog' && $query == 'edit') {
        include('modules/report-blog/edit.php');
    } elseif ($tam == 'quanlybaocaosan' && $query == 'main') {
        include('modules/report-pitch/listed.php');
    } elseif ($tam == 'quanlybaocaosan' && $query == 'add') {
        include('modules/report-pitch/add.php');
    } elseif ($tam == 'quanlybaocaosan' && $query == 'edit') {
        include('modules/report-pitch/edit.php');
    } elseif ($tam == 'quanlybinhluansukien' && $query == 'main') {
        include('modules/comment-contest/listed.php');
    } elseif ($tam == 'quanlybinhluansukien' && $query == 'add') {
        include('modules/comment-contest/add.php');
    } elseif ($tam == 'quanlybinhluansukien' && $query == 'edit') {
        include('modules/comment-contest/edit.php');
    } elseif ($tam == 'quanlysukien' && $query == 'main') {
        include('modules/contest/listed.php');
    } elseif ($tam == 'quanlysukien' && $query == 'add') {
        include('modules/contest/add.php');
    } elseif ($tam == 'quanlysukien' && $query == 'edit') {
        include('modules/contest/edit.php');
    } elseif ($tam == 'quanlythamgiasukien' && $query == 'main') {
        include('modules/participation-contest/listed.php');
    } elseif ($tam == 'quanlythamgiasukien' && $query == 'add') {
        include('modules/participation-contest/add.php');
    } elseif ($tam == 'quanlythamgiasukien' && $query == 'edit') {
        include('modules/participation-contest/edit.php');
    } elseif ($tam == 'quanlytuvankhachhang' && $query == 'main') {
        include('modules/box-chat/box-chat.php');
    } else {
        include('modules/dashboard/dashboard.php');
    }
    ?>
</div>