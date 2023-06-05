<?php include '../condb/condb.php';
if (isset($_POST['username'])) {
    //Lấy dữ liệu nhập vào
    $username = $_POST['username'];
    $password = $_POST['passwd'];
    $username = strip_tags($username);
    $username = addslashes($username);
    $password = strip_tags($password);
    $password = addslashes($password);
    if ($username == "" || $password == "") {

        echo '<script type="text/javascript">

        window.onload = function () { alert("username hoặc password bạn không được để trống!"); }

        </script>';
    } else {
        $sql = "select a.*, b.CV_MA from nhanvien a, chucvu b where a.CV_MA=b.CV_MA AND NV_MA= '$username' and NV_PASSWD = '$password' ";
        $query = mysqli_query($conn, $sql);
        $row=mysqli_fetch_array($query);
        $num_rows = mysqli_num_rows($query);
        if ($num_rows == 0) {
            echo '<script type="text/javascript">

        window.onload = function () { alert("Tên đăng nhập hoặc mật khẩu không đúng!"); }

        </script>';
        } else {
            if ($row['CV_MA'] == 'QL01') {
                $_SESSION['username'] = $username;
                // Thực thi hành động sau khi lưu thông tin vào session
                // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
                header('Location: ../QuanLy/trangchu.php');
            } else {
                //tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
                $_SESSION['username'] = $username;
                // Thực thi hành động sau khi lưu thông tin vào session
                // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
                header('Location: hoso.php');
            }
        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Đăng nhập</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../image/logo.jpg">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="/khachhang/css/main.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <header style="height:100px">
        <nav class="w3-black sidebar w3-container border-bottom" style="padding:5px; ">
            <a href="admin_dashboard.php" class=" w3-xlarge w3-text-white">OANHCOFFEE</a>
        </nav>

    </header>
    <main>
        <section class="vh-80 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <div class="mb-md-5 mt-md-4 pb-5">
                                    <h5 class="text-uppercase">ĐĂNG NHẬP</h5>
                                    <form action="dangnhap.php?dn=login" id="form" name="form" method="post" onsubmit="return validateForm()">
                                        <div class="form-outline form-white mb-4">
                                            <input type="text" id="username" class="form-control form-control-lg" placeholder="Nhập username" name="username" />
                                        </div>
                                        <div class="form-outline form-white mb-4">
                                            <input type="password" id="passwd" class="form-control form-control-lg" placeholder="Nhập mật khẩu" name="passwd" />
                                        </div>
                           

                                        <button class="btn btn-outline-light btn-lg px-5" type="submit" class="submit">Đăng Nhập</button>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        function validateForm() {
            var u = document.getElementById("username").value;
            var p = document.getElementById("password").value;

            if (u == "") {
                alert("Hãy nhập username");
                return false;
            }
            if (p == "") {
                alert("Hãy nhập mật khẩu");
                return false;
            }


            return true;
        }
    </script>

</body>

</html>