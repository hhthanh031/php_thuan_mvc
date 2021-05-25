<?php
    include '../classes/adminlogin.php';
?>

<?php
    $class = new adminlogin();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $adminUser = $_POST['adminUser'];
        $adminPass = md5($_POST['adminPass']);

        $login_check = $class->login_admin($adminUser, $adminPass);
    }
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Trang Quản Trị</title>

    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <!-- CSS Stylesheet -->
    <link rel="stylesheet" href="./login/css/style.css" type="text/css" media="all" />

</head>

<body>
    <div class="signinform">
        <h1>Trang Quản Trị</h1>
        <!-- container -->
        <div class="container">
            <!-- main content -->
            <div class="w3l-form-info">
                <div class="w3_info">
                    <h2>Đăng nhập</h2>
                    <span>
                        
                    </span>
                    <form action="login.php" method="post">

                        <div class="input-group">
                            <span><i class="fas fa-user" aria-hidden="true"></i></span>
                            <input type="text" name="adminUser" placeholder="Tài khoản" required="" autofocus="">
                        </div>

                        <div class="input-group">
                            <span><i class="fas fa-key" aria-hidden="true"></i></span>
                            <input type="Password" name="adminPass" placeholder="Mật khẩu" required="">
                        </div>

                        <div class="form-row bottom">
                            <span style="color: #ea4335;">
                            <?php
                            if(isset($login_check)){
                            echo $login_check;
                            }
                        ?>
                        </span>
                        </div>

                        
                        <div>
                            <input class="btn btn-primary btn-block" type="submit" value="Đăng Nhập" />
                        </div>
                        
                    </form>
                    
                </div>
            </div>
            <!-- //main content -->
        </div>
        
        </div>

        <!-- fontawesome v5-->
        <script src="./login/js/fontawesome.js"></script>

    </body>

    </html>