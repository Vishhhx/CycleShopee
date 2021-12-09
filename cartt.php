<?php
    session_start();
    include "_ses/_dbconn.php";
?>
<?php
    if(isset($_GET['cancel'])){
        $tblnm = $_SESSION['username'];
        $prno=$_GET['cancel'];
        $delcrt = "DELETE FROM `cycleshopee`.`$tblnm` WHERE prNo=$prno";
        $exct=mysqli_query($conn,$delcrt);
    }
    if(isset($_GET['order'])){
        $tblnm = $_SESSION['username'];
        $prno=$_GET['order'];
        // $delcrt = "DELETE FROM `cycleshopee`.`$tblnm` WHERE prNo=$prno";
        $plord = "UPDATE `$tblnm` SET `Target`='o' WHERE prNo = $prno";
        $exct=mysqli_query($conn,$plord);
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
    <link rel="stylesheet" type="text/css" href="style/style.css" media=”screen” />
    <link rel="icon" type="image/x-icon" href="img/web_ico.jpg">
    <title>Cycle Shopee</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Cycle Shopee</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shop.php">Shop</a>
                    </li>
                </ul>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="img/user.png" alt="">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php 
                            if (isset($_SESSION['loggedin'])) {
                                echo'
                                <li><a class="dropdown-item" href="orderht.php">Your orders</a></li>
                                <li><a class="dropdown-item" href="wishlistt.php">Your wishlist</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="_ses/logout.php">LogOut</a></li>';
                            }else{ 
                                echo'<li><a class="dropdown-item" href="_ses/login.php">Login</a></li>';
                            }
                        ?>
                    </ul>
                </div>
                <a href="cartt.php">
                    <img src="img/shopping-cart.png" alt="" class="d-flex active">
                </a>
            </div>
        </div>
    </nav>
    <?php
        if(isset($_GET['cancel'])){
            echo '<div class="alert alert-danger mt-3 alert-dismissible fade show mt-3;" role="alert">
            One item removed from cart successfullty... 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        if(isset($_GET['order'])){
            echo '<div class="alert alert-danger mt-3 alert-dismissible fade show mt-3;" role="alert">
            Order Placed Successfully, you will get brand new cycle soon!!! 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    ?>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container padding-bottom-3x mb-0">
        <h2>Your Cart</h2>
        <div class="row">
            <div class="col-lg-3">
                <aside class="user-info-wrapper">
                    <div class="user-info">
                        <div class="user-avatar">
                            <a class="edit-avatar" href="#"></a><img src="img/user.png" class="m-3" alt="User">
                        </div>
                        <div class="user-data">
                            <?php
                                if(isset($_SESSION['loggedin'])){
                                    echo '<h4>Hello, '.$_SESSION["name"].'</h4>';
                                }
                            ?>
                        </div>
                    </div>
                </aside>
                <nav class="list-group mt-3">
                    <a class="list-group-item with-badge" href="orderht.php"><i class=" fa fa-th"></i>&nbsp;Orders<span class="badge badge-primary badge-pill">6</span></a>
                    <a class="list-group-item" href="#"><i class="fa fa-map"></i>&nbsp;Addresses</a>
                    <a class="list-group-item with-badge" href="wishlistt.php"><i class="fa fa-heart"></i>&nbsp;Wishlist<span class="badge badge-primary badge-pill">3</span></a>
                </nav>
            </div>

            <?php
                if (isset($_SESSION['loggedin'])) {
                    $tblacusr=$_SESSION["username"];
                    $getprno="SELECT * from `$tblacusr` where Target = 'c'";
                    $res=mysqli_query($conn,$getprno);
                    $num=mysqli_num_rows($res);
                    if($num==0){
                        echo'
                        <div class="col-md-1 text-center m-5 fs-1"></div>
                        <div class="col-md-3 text-center m-5 fs-3"><img src="img/empty-cart.png" width="150" class="mb-3"></br>Your Cart is Empty!!</br><div class="fs-6">Add items to it!</div></br><a href="shop.php" class="btn btn-primary mt-1 d-grid gap-2">Shop Now</a></div>';
                    }
                    while($row=mysqli_fetch_assoc($res)){
                        $sql="SELECT * FROM products where id=".$row['prNo']."";
                        $res1=mysqli_query($conn,$sql);
                        $row1=mysqli_fetch_assoc($res1);
                        echo '
                        <div class="col-md-3 mb-3">
                        <div class="card" style="width: 18rem;">
                        <img src="'.$row1['image'].'" class="card-img-top" width="286px" height="214px" alt="...">
                        <div class="card-body">
                        <h5 class="card-title">'.$row1['title'].'</h5>
                        <p class="card-text">Rs. '.$row1['price'].'</p>
                        <a href="cartt.php?cancel='.$row1['id'].'" class="btn btn-primary">Cancel Order</a>&nbsp;&nbsp;&nbsp;
                        <a href="cartt.php?order='.$row1['id'].'" class="btn btn-warning">Place Order</a>
                        </div>
                        </div>
                        </div>';
                    }
                }else{
                    echo'<div class="col-md-1 text-center m-5 fs-1"></div>
                    <div class="col-md-3 text-center m-5 fs-3">You are not logged in :(</br><a href="_ses/login.php" class="btn btn-primary mt-1 d-grid gap-2 mt-3">Login Now</a></div>                ';    
                }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
</body>
</html>