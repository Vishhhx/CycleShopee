<?php
    $login=false;
    $crerr=false;
    $usererr=false;
    $username = "";
    include "_dbconn.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username=$_POST["username"];
        $password=$_POST["password"];

        $sql="SELECT * FROM userdata where username='$username'";
        $nameq="SELECT * from userdata where username='$username'";
        
        $res=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($res);
        if($num==1){
            $res=mysqli_query($conn,$nameq);
            $row=mysqli_fetch_assoc($res);
            if(password_verify($password,$row['password'])){
                $login=true;
            
                $name=$row['name'];
                
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['name'] = $name;
                $_SESSION['username'] = $username;
                header("location: /cycleshopee/index.php");
            }else{
                $crerr = true;
            }
            
        }else{
            $usererr=true;            
            $username=$_POST["username"];
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
        <title>CycleShopee - Login</title>
        </head>
    <body class="bg-primary bg-gradient p-5 bg-opacity-50">
    <div class="m-5 fs-1 text-center">Login to <b>Cycle Shopee</b></div>
    <form class="container w-50 align-middle position-absolute top-50 start-50 translate-middle border p-5 bg-white" method="post" action="login.php">
        <div class="mb-3">
            <label for="username" class="form-label">Email address</label>
            <?php echo '<input type="email" class="form-control" id="username" aria-describedby="emailHelp" name="username" value = "'.$username.'">'; ?>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <?php 
            echo"<div class='mb-3' style='color:red'>";
            if($usererr) echo "No account registered with this username... Please <a href='signup.php'> SignUp Here</a>";
            if($crerr) echo "Incorrect Password... please enter correct password and try again";
            echo "</div>";
        ?>
        <button type="submit" class="btn btn-primary w-100 mt-3">Login</button>
        <div class="text-center mt-3">
            New User? <a href="signup.php"> SignUp Here</a>
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