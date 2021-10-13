<?php
    $pricef=false;
    $sizef=false;
    $typef=false;
    include "_ses/_dbconn.php";
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $pricef=true;
        $price=$_POST["price"];
        $size=$_POST["size"];
        $type=$_POST["type"];
        if($price!=''){
            $pricef=true;
            $sizef=false;
            $typef= false;
        }elseif($size!=""){
            $pricef=false;
            $sizef=true;
            $typef= false;
        }elseif($type!=''){
            $pricef=false;
            $sizef=false;
            $typef= true;
        }else{
            $pricef=false;
            $sizef=false;
            $typef=false;
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">

        <title>Cycle Shopee</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Cycle Shopee</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="shop.php">Shop</a>
                        </li>
                      
                    </ul>
                    <?php
                        if(isset($_SESSION['loggedin'])){
                            echo '<div class-"nav-item d-flex">Hello, '.$_SESSION["name"].'</div>';
                        }
                    ?>
                    <div class="nav-item dropdown">                  
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                            <img src="img/user.png" alt="">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php if (isset($_SESSION['loggedin'])) {
                                echo'
                                <li><a class="dropdown-item" href="orderht.php">Your orders</a></li>
                                <li><a class="dropdown-item" href="wishlistt.php">Your wishlist</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="_ses/logout.php">LogOut</a></li>';
                                }else echo'<li><a class="dropdown-item" href="_ses/login.php">Login</a></li>';
                            ?>
                        </ul>
                    </div>
                    <a href="cartt.php"><img src="img/shopping-cart.png" alt="" class="d-flex"></a>
                </div>
            </div>
        </nav>
        <div class="container border">
            <form action="shop.php" method="post">
                <div class="row">
                    <div class="col">

                        <input type="text" name="price" placeholder="Enter Price"  id="price" class="m-1 form-control " name="price">
                        <button type="submit" class="btn btn-primary w-100 m-1">Filter by price</button>
                        </div><div class="col">
                        <input type="text" name="size" placeholder="Enter size"  id="size" class="m-1 form-control " name="size">
                        <button type="submit" class="btn btn-primary w-100 m-1">Filter by size</button>
                    </div><div class="col">
                        <input type="text" name="type" placeholder="Enter type"  id="type" class="m-1 form-control " name="type">
                        <button type="submit" class="btn btn-primary w-100 m-1">Filter by type</button>
                    </div>
                </div>
            </form>                             
        </div>
        <div class="container my-3">
        <div class="row">

            <?php
            if($pricef==true){
                $sql="SELECT * FROM products where price < $price";
            }elseif($sizef==true){
                $sql="SELECT * FROM products where size = '$size'";
            }elseif($typef==true){
                $sql="SELECT * FROM products where type = '$type'";
            }else{
                $sql="SELECT * FROM products";
            }
            $res=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($res)){
                echo '
                <div class="col-md-3 mb-3">
                <div class="card" style="width: 18rem;">
                <img src="'.$row['image'].'" class="card-img-top" width="286px" height="214px" alt="...">
                <div class="card-body">
                <h5 class="card-title">'.$row['title'].'</h5>
                <p class="card-text">Rs. '.$row['price'].'</p>
                <a href="#" class="btn btn-primary">Add to cart</a>
                </div>
                </div>
                </div>';
            }
            
            ?>
            </div>  
        </div>
            <!-- Optional JavaScript; choose one of the two! -->
            
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ"
        crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js" integrity="sha384-PsUw7Xwds7x08Ew3exXhqzbhuEYmA2xnwc8BuD6SEr+UmEHlX8/MCltYEodzWA4u" crossorigin="anonymous"></script>
        -->
    </body>
</html>