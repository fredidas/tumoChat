<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("../models/db.php");
$hash = $_GET["h"];
$user_id = $_GET["uid"];

$sql = "SELECT * FROM RESET_PWD WHERE reset_pwd_hash = '$hash' AND reset_pwd_user_id = $user_id ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) != 1) {
    header('Location: ../views/logIn.php?id=4');
    exit();
}


?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>TUYU | connexion </title>
    <link rel="icon" type="image/png" href="../assets/images/logo_tuyu-sm.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body style='display:flex; align-items: center; background-image: url("../assets/images/themes/3.jpg");'>
    <div class="wrap">
        <div class="row pb-5">
            <div class="col text-center welcome">
                <a href="index.php"><img src="../assets/images/logo_tuyu.png" class="logo" alt="TUYU"></a>
            </div>
        </div>
        <div class="card centered-card">
            <div class="card-body">
                <form action="../controllers/resetpwd.php" method="post">
                    <div class="mb-2">
                        <label for="exampleInputPassword1" class="form-label ">Password</label>
                        <div class="fake-input responsive-input">
                        <input type="password" class="form-control responsive-input" name="reset_pass" id="exampleInputPassword1" required>
                        <img id="PassEye" width="25px" src="../assets/images/closed.png" alt="" onclick="changePassType()" class="eye" >
                        </div>  
                    </div>
                    <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                        <div class="fake-input responsive-input">
                            <input type="hidden" value="<?php echo $user_id ?>"name="user_id">
                            <input type="password" class="form-control" name="confirm_pass" id="exampleInputPassword2" required>
                            <img id="PassEye2" width="25px" src="../assets/images/closed.png" alt="" onclick="changePassType2()" class="eye" >
                        </div>
                    </div>

                          
                            
                            </div> 
                        
                        
                               <button type="submit" id="exampleInputSubmit" class="submit-btn mb-3" style="margin:0 auto;">Reset</button>
                        
                    </form>
                </div>
            </div>
        </div>
    <script>
            var new_p = document.getElementById("new-pass").value;
            var confirm_p = document.getElementById("confirm-pass").value;
            var error_m = document.getElementById("errormessage");
    
            if (new_p == confirm_p) {
                error_m.innerHTML = "Password is not the same!";
            }

        function changePassType(){
            let x = document.getElementById("exampleInputPassword1");
            let img = document.getElementById("PassEye");
            if (x.type === "password") {
                x.type = "text";
                img.src = "../assets/images/open.png";
            } else {
                x.type = "password";
                img.src = "../assets/images/closed.png";
            }
        }
        function changePassType2(){
            let x = document.getElementById("exampleInputPassword2");
            let img = document.getElementById("PassEye2");
            if (x.type === "password") {
                x.type = "text";
                img.src = "../assets/images/open.png";
            } else {
                x.type = "password";
                img.src = "../assets/images/closed.png";
            }
        }
    </script>
</body>

</html>