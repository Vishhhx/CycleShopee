<?php
    $perr=false;
    $usert=false;
    include "_dbconn.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST["name"];
        $phn = $_POST["phn"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
        if($password==$cpassword){
            $hash=password_hash($password,PASSWORD_DEFAULT);
            $tbl="CREATE TABLE `$username` ( `prNo` INT NOT NULL , `Target` VARCHAR(1) NOT NULL , `ordername` INT NOT NULL , `ordertime` INT NOT NULL DEFAULT CURRENT_TIMESTAMP ) ENGINE = InnoDB;";
            $sql = "INSERT INTO userdata (name,phoneno,username,password) values ('$name','$phn','$username','$hash');";
            $res = mysqli_query($conn,$sql);
            mysqli_query($conn,$tbl);
            if($res){
                header("Location: login.php");
            }else{
                $usert=true;
            }
        }else{
            $perr=true;
        }
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
        <link rel="icon" type="image/x-icon" href="/cycleshopee/img/web_ico.jpg">
        <title>CycleShopee - SignUp</title>
        </head>
    <body class="bg-primary bg-gradient p-5 bg-opacity-50">
        <form class="container w-50 align-middle position-absolute top-50 start-50 translate-middle border p-5 bg-white" method="post" action="signup.php">
        <div class="mb-1 fs-1 text-center">SignUp to <b>Cycle Shopee</b></div>
        <div class="mb-3">
            <label for="name" class="form-label">Your Name</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <label for="basic-addon1 mb-3" class="form-label">Your Phone Number</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">+91</span>
            <input type="text" class="form-control" id="phn" name="phn" aria-describedby="basic-addon1">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Email address</label>
            <input type="email" class="form-control" id="username" name="username" aria-describedby="emailHelp">
        </div>
        <?php 
            if($usert){
                echo"<div class='mb-3' style='color:red'>Username already taken!! Try another.</div>";
            }
        ?>
        <div class="mb-3">
            <label for="password" class="form-label">Create Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="mb-3">
            <label for="cpassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="cpassword" name="cpassword">
        </div>
        <?php
            if($perr){
                echo"<div class='mb-3' style='color:red'>Password Doesn't Match!! Try again.</div>";
            }
        ?>
        <button type="submit" class="btn btn-primary w-100 mt-3">SignUp</button>
        <div class="text-center mt-3">
            Already have account? <a href="login.php">Login Here</a>
        </div>
    </form>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js" integrity="sha384-PsUw7Xwds7x08Ew3exXhqzbhuEYmA2xnwc8BuD6SEr+UmEHlX8/MCltYEodzWA4u" crossorigin="anonymous"></script>
        -->
    </body>
</html>