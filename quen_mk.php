<?php
session_start();

function checkemail($tendangnhap,$email){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vuthibacdk12cntt2";

    //B1: Tạo kết nối
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    //Kiểm tra kết nối
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM taikhoan WHERE tendangnhap='" . $tendangnhap . "' and email='" . $email . "'";
    $result = mysqli_query($conn, $sql);
    $sp = mysqli_fetch_assoc($result);

    // Đóng kết nối
    mysqli_close($conn);

    return $sp;
}

if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
    $email = $_POST['email'];
    $tendangnhap = $_POST['tendangnhap'];
    $checkemail = checkemail($tendangnhap,$email);
    if (is_array($checkemail)) {
        $_SESSION['thongbao'] = "Mật khẩu của bạn là: " . $checkemail['matkhau'];
    } else {
        $_SESSION['thongbao'] = "Email này không tồn tại";
    }
    header('Location: quen_mk.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        * {
        box-sizing: border-box;
        font-size: 62.5%;
        font-family: 'Roboto', sans-serif;
        line-height: 1.6rem;
        margin: 0 auto;
        }
        body {
         
            background-image: url('upload/anh9.jpg') ;
            
        }
      

        .relog-form__btn-link {
            width: 100%;
            border: none;
            cursor: pointer;
        }

        /* relog */

        .relog {
            display: flex;
            padding: 140px 0 50px 0;
        }

        .relog-form {
            margin: auto;
            text-align: center;
            padding: 50px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 25px 50px -12px;
            position: relative;
        }

        .relog-form__heading {
            color: #000;
            font-size: 3.0rem;
            font-weight: 300;
            text-transform: uppercase;
            margin: 0;
        }

        .relog-form__title {
            font-size: 1.3rem;
            color: #979890;
            margin: 18px 0;
        }

        .relog-form__link {
            font-size: 1.3rem;
            text-decoration: none;
            color: #1c5b41;
        }

        .relog-form__gr {
            display: flex;
            margin: 16px 0;
        }

        .relog-form__gr-input {
            flex: 1;
            padding: 16px 20px;
            min-width: 320px;
            font-size: 1.3rem;
            border-radius: 10px;
            border: none;
            background-color: #ebebeb;
        }

        .relog-form__btn-link {
            display: block;
            padding: 12px 0;
            text-decoration: none;
            color: #fff;
            font-size: 1.3rem;
            border-radius: 10px;
            background-color: #1c5b41;
            transition: background-color ease-in .2s;
        }

        .relog-form__btn-link:hover {
            background-color: orange;
        }

        .relog-form__select-text {
            margin-top: 20px;
            color: var(--black-color);
            font-size: 1.3rem;
        }

        .relog-form__social {
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .relog-form__social-fb,
        .relog-form__social-gg {
            text-decoration: none;
            color: #fff;
            margin: 12px auto;
            padding: 12px 0;
            width: 130px;
            border-radius: 2px;
            display: flex;
            position: relative;
        }

        .relog-form__social-text::before {
            content: "";
            display: block;
            position: absolute;
            right: 88px;
            top: 50%;
            transform: translateY(-50%);
            border-right: 1px solid #3a3a3a;
            height: 36px;
        }

        .relog-form__social-text {
            text-align: start;
            font-size: 1.2rem;
            margin: 0;
        }

        .relog-form__checkbox {
            font-size: 1.5rem;
            font-weight: 500;
            color: #1c5b41;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .relog-form__checkbox-miss {
            margin-right: 8px;
            
        }

        .relog-form__btn-forget {
            display: block;
            text-decoration: none;
            color: #1c5b41;
            font-weight: 500;
            font-size: 1.5rem;
            margin-top: 20px;
            transition: color ease-in .2s;
        }

        .relog-form__btn-forget:hover {
            color: orange;
        }
        .relog-form__back-icon {
            color: #1c5b41;
            font-size: 3.6rem;
            position: absolute;
            top: 13px;
            right: 14px;
        }
    </style>
</head>
<body>
    <form action="quen_mk.php" method="post" class="relog">
        <div class="relog-form">
            <h2 class="relog-form__heading">Quên mật khẩu</h2>
            <div class="relog-form__info">
            <div class="relog-form__gr">
                    <input type="text"  class="relog-form__gr-input" placeholder="Tên Đăng Nhập" name="tendangnhap">
                </div>
                <div class="relog-form__gr">
                    <input type="text"  class="relog-form__gr-input" placeholder="Email" name="email">
                </div>
                <div class="relog-form__btn">
                    <input class="relog-form__btn-link" type="submit" value="Gửi" name='guiemail'>
                </div>
            </div>
            <a title="Đăng nhập" href="login.php" class="relog-form__back">
                <i class="relog-form__back-icon fa-regular fa-circle-xmark"></i>
            </a>
        </div>
</form>
<?php
if (isset($_SESSION['thongbao'])) {
    echo "<script>alert('" . $_SESSION['thongbao'] . "')</script>";
    unset($_SESSION['thongbao']);
}
?>
</body>
</html>
  