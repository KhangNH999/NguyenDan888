<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>myHINADA</title>
    <link rel="stylesheet" href="css/style-admin.css">
    <link rel="stylesheet" href="css/box-chat.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya:wght@500&display=swap" rel="stylesheet">
    <!-- Scroll -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/a818068831.js" crossorigin="anonymous"></script>
</head>

<body>
    <h3 class="title-admin">myHINADA</h3>
    <div class="wrapper">
        <?php
        session_start();
        include('../config/config.php');
        $id_user = (isset($_GET['id_user'])) ? $_GET['id_user'] : '';
        $sql_admin = "SELECT * FROM taikhoan WHERE mataikhoan = $id_user AND tinhtrangtk = '1' LIMIT 1";
        $query_admin = mysqli_query($mysqli, $sql_admin);
        while ($row = mysqli_fetch_array($query_admin)) {
            $result_admin = $row['maloaitaikhoan'];
        }
        if ($result_admin != '1' && $result_admin != '16') {
            header('Location: error/404-error.php');
        }
        include('modules/header.php');
        ?>
        <div class="main-content">
            <?php
            include('modules/menu.php');
            include('modules/main.php');
            ?>
        </div>
        <?php
        include('modules/footer.php');
        ?>
    </div>
    <!-- Scroll Library -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
</body>

</html>