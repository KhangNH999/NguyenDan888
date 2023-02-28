<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
function chooseFile(fileInput) {
    if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#image-blog').attr('src', e.target.result);
        }
        reader.readAsDataURL(fileInput.files[0]);
    }
}
</script>
<link rel="stylesheet" href="assets/css/personal/create-blog.css">
<form action="screen/personal-sc/create-blog/handle-edit.php" method="post" enctype="multipart/form-data">
    <div id="create-blog">
        <h3>
            <i class="fa-solid fa-pen-to-square"></i>
            <span>Sửa Blog</span>
        </h3>
        <?php
        $mablog = (isset($_GET['id_blog'])) ? $_GET['id_blog'] : '';
        $sql = "SELECT * FROM blog WHERE mablog = $mablog";
        $query = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_array($query)) {
        ?>
        <input type="text" name="mablog" style="display: none;"
            value="<?php echo (isset($_GET['id_blog'])) ? $_GET['id_blog'] : ''; ?>">
        <div class="image-blog w15">
            <div>
                <span class="label">Hình ảnh</span>
                <input type="file" name="hinhanh" class="input-image-blog" onchange="chooseFile(this)"
                    accept="image/gif, image/jpeg, image/png">
                <img id="image-blog" width="150px"
                    src="admin/modules/blog/uploads-blog/<?php echo $row['hinhanhblog'] ?>">
            </div>
        </div>
        <div class="title-blog w15">
            <div>
                <span class="label">Tiêu đề
                    <span class="obligatory mess-success" id="mess-input-title">(Đúng yêu cầu)</span>
                </span>
            </div>
            <input type="text" id="input-title" name="title" placeholder="Tiêu đề trong vòng 100 ký tự" maxlength="100"
                oninput="ktTieuDeBlog();" value="<?php echo $row['tieudeblog'] ?>">
        </div>
        <div class="content-blog w15">
            <div>
                <span class="label">Nội dung
                    <span class="obligatory" id="mess-input-content">(Bắt buộc)</span>
                </span>
            </div>
            <textarea name="noidung" id="input-content" rows="15" maxlength="30000"
                oninput="ktNoiDungBlog();"><?php echo $row['noidungblog'] ?></textarea>
        </div>
        <?php
        }
        ?>
        <ul class="submit">
            <li>
                <button name="complete-blog" class="new-submit btn" id="taoblog" disabled>Hoàn tất</button>
            </li>
        </ul>
    </div>
</form>
<!-- tích hợp ckeditor cho văn bản -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('noidung');
</script>
<script src="screen/personal-sc/create-blog/handle-validation.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (isset($_SESSION['error_null']) && $_SESSION['error_null'] == 1) { ?>
<script>
Swal.fire({
    title: 'Lỗi nhập dữ liệu!',
    text: "Bạn không được để trống nội dung blog!",
    icon: 'error',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'Đã hiểu'
}).then((result) => {
    if (result.isConfirmed) {
        <?php unset($_SESSION['error_null']); ?>
    }
})
</script>
<?php } ?>