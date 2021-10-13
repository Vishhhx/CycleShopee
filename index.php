<?php
    session_start();
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
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop.php">Shop</a>
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
                        <?php if (isset($_SESSION['loggedin'])) {echo'
                            <li><a class="dropdown-item" href="orderht.php">Your orders</a></li>
                            <li><a class="dropdown-item" href="wishlistt.php">Your wishlist</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="_ses/logout.php">LogOut</a></li>';
                            }else echo'<li><a class="dropdown-item" href="_ses/login.php">Login</a></li>'
                        ;?>
                        </ul>
                    </div>
                    <a href="cartt.php"><img src="img/shopping-cart.png" alt="" class="d-flex"></a>
                </div>
            </div>
        </nav>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://source.unsplash.com/eOsY4sO0bD8/1600x700" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>MTB bicycle</h5>
                        <p>A mountain bike (MTB) or mountain bicycle is a bicycle designed for off-road cycling. ... Mountain bikes are generally specialized for use on mountain trails, single track, fire roads, and other unpaved surfaces..</p>
                    </div>
                </div>
                <div class="carousel-item">
                <img src="https://source.unsplash.com/4cLclTFUDhg/1600x700" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Hybrid Bicycle</h5>
                        <p>Their large, padded seats and upright handlebars provide a comfortable riding position, and are best for casual riding around the neighborhood or bike paths, short-distance commuting, and errands around town. They can be ridden on paved roads, but are not as lightweight or efficient as road bikes..</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://source.unsplash.com/vtBOcxkNZpI/1600x700" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>BMX Bicycles</h5>
                        <p>One of the most popular children's bike categories is BMX, which stand for Bicycle Moto Cross</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
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