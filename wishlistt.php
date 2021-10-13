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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style/style.css" media=”screen” />
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
                    <?php if (isset($_SESSION['loggedin'])) {echo'
                            <li><a class="dropdown-item" href="orderht.php">Your orders</a></li>
                            <li><a class="dropdown-item" href="wishlistt.php">Your wishlist</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="_ses/logout.php">LogOut</a></li>';
                            }else echo'<li><a class="dropdown-item" href="_ses/login.php">Login</a></li>'
                        ;?>
                    </ul>
                </div>
                <a href="cartt.php">

                    <img src="img/shopping-cart.png" alt="" class="d-flex">
                </a>
            </div>

        </div>
    </nav>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container padding-bottom-3x mb-0">
        <h2>Your Wishlist <img src="img/wishlist-icon-19.png" alt=""></h2>
        <div class="row">
            <div class="col-lg-3">
                <aside class="user-info-wrapper">
                    <div class="user-info">
                        <div class="user-avatar">
                            <a class="edit-avatar" href="#"></a><img src="img/user.png" alt="User">
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
                <nav class="list-group">
                    <a class="list-group-item with-badge" href="#"><i class=" fa fa-th"></i>Orders<span class="badge badge-primary badge-pill">6</span></a>
                    <a class="list-group-item" href="#"><i class="fa fa-map"></i>Addresses</a>
                    <a class="list-group-item with-badge " href="#"><i class="fa fa-heart"></i>Wishlist<span class="badge badge-primary badge-pill">3</span></a>
                </nav>
            </div>
            <div class="col-lg-8">
                <div class="padding-top-2x mt-2 hidden-lg-up"></div>
                <!-- Wishlist Table-->
                <!--Section: Block Content-->
                <section>

                    <!-- Grid row -->
                    <div class="row">

                        <!-- Grid column -->
                        <div class="col-md-4 mb-5">

                            <!-- Card -->
                            <div class="">

                                <div class="view zoom overlay z-depth-2 rounded">

                                    <div class="mask">
                                        <img class="img-fluid w-100" src="img/mtb-bc.jpg">
                                        <div class="mask rgba-black-slight"></div>
                                    </div>
                                    </a>
                                </div>

                                <div class="text-center pt-4">

                                    <h5>BTM Bike</h5>
                                    <p class="mb-2 text-muted text-uppercase small">Gear bicycle</p>
                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

                                    <span class="fa fa-star checked" style="color:orange;"></span>
                                    <span class="fa fa-star checked" style=color:orange;"></span>
                                    <span class="fa fa-star checked" style=color:orange;"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <hr>
                                    <h6 class="mb-3">7,000/-</h6>
                                    <button type="button" class="btn btn-primary btn-sm mr-1 mb-2">Add to cart</button>
                                    <button type="button" class="btn btn-info btn-sm mr-1 mb-2">Details</button>
                                    <button type="button" class="btn btn-elegant btn-sm px-3 mb-2 material-tooltip-main" data-toggle="tooltip" data-placement="top" title="Remove from wishlist">Remove from wishlist</button>

                                </div>

                            </div>
                            <!-- Card -->

                        </div>
                        <!-- Grid column -->

                        <div class="col-md-4 mb-5">

                            <!-- Card -->
                            <div class="">

                                <div class="view zoom overlay z-depth-2 rounded">

                                    <div class="mask">
                                        <img class="img-fluid w-100" src="img/mtb-bc.jpg">
                                        <div class="mask rgba-black-slight"></div>
                                    </div>
                                    </a>
                                </div>

                                <div class="text-center pt-4">

                                    <h5>BTM Bike</h5>
                                    <p class="mb-2 text-muted text-uppercase small">Gear bicycle</p>
                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

                                    <span class="fa fa-star checked" style="color:orange;"></span>
                                    <span class="fa fa-star checked" style=color:orange;"></span>
                                    <span class="fa fa-star checked" style=color:orange;"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <hr>
                                    <h6 class="mb-3">7,000/-</h6>
                                    <button type="button" class="btn btn-primary btn-sm mr-1 mb-2">Add to cart</button>
                                    <button type="button" class="btn btn-info btn-sm mr-1 mb-2">Details</button>
                                    <button type="button" class="btn btn-elegant btn-sm px-3 mb-2 material-tooltip-main" data-toggle="tooltip" data-placement="top" title="Remove from wishlist">Remove from wishlist</button>

                                </div>

                            </div>
                            <!-- Card -->

                        </div>
                        <!-- Grid column -->

                        <div class="col-md-4 mb-5">

                            <!-- Card -->
                            <div class="">

                                <div class="view zoom overlay z-depth-2 rounded">

                                    <div class="mask">
                                        <img class="img-fluid w-100" src="img/mtb-bc.jpg">
                                        <div class="mask rgba-black-slight"></div>
                                    </div>
                                    </a>
                                </div>

                                <div class="text-center pt-4">

                                    <h5>BTM Bike</h5>
                                    <p class="mb-2 text-muted text-uppercase small">Gear bicycle</p>
                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

                                    <span class="fa fa-star checked" style="color:orange;"></span>
                                    <span class="fa fa-star checked" style=color:orange;"></span>
                                    <span class="fa fa-star checked" style=color:orange;"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <hr>
                                    <h6 class="mb-3">7,000/-</h6>
                                    <button type="button" class="btn btn-primary btn-sm mr-1 mb-2">Add to cart</button>
                                    <button type="button" class="btn btn-info btn-sm mr-1 mb-2">Details</button>
                                    <button type="button" class="btn btn-elegant btn-sm px-3 mb-2 material-tooltip-main" data-toggle="tooltip" data-placement="top" title="Remove from wishlist">Remove from wishlist</button>

                                </div>

                            </div>
                            <!-- Card -->

                        </div>
                        <!-- Grid column -->

                    </div>
                    <!-- Grid row -->

                </section>
                <!--Section: Block Content-->
                <!-- <hr class="mb-4">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="inform_me" checked="">
                    <label class="custom-control-label" for="inform_me">Inform me when item from my wishlist is
                        available</label> -->
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
</body>

</html>