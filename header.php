<DOCTYPE html>
    <html lange="en">

    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    </head>
    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1);
        }
    </style>

    <body>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="container-fluid">
                <a href="home.php" class="navbar-brand">Bin Store</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navsup">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navsup">
                    <!--left-->
                    <div class="navbar-nav">
                        <a href="search.php" class="nav-link">Search</a>
                        <div class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Product</a>
                            <div class="dropdown-menu">
                                <a href="add_product.php" class="dropdown-item">Add Product</a>
                                <!-- <a href="management.php?cid=2" class="dropdown-item">Transformer</a> -->
                            </div>
                        </div>
                        <div class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Management</a>
                            <div class="dropdown-menu">
                                <a href="management.php?cid=1" class="dropdown-item">Gundam</a>
                                <a href="management.php?cid=2" class="dropdown-item">Transformer</a>
                                <a href="management.php?cid=3" class="dropdown-item">Power Ranger</a>
                            </div>
                        </div>
                    </div>
                    <!--right-->
                    <div class="navbar-nav ms-auto">
                        <?php
                        //session_start();
                        if (isset($_COOKIE['cc_uname'])) :
                        ?>
                            <a href="home.php" class="nav-item nav-link">Welcome, <?= $_COOKIE['cc_uname'] ?></a>
                            <a href="logout.php" class="nav-item nav-link">logout</a>
                        <?php
                        else :
                        ?>
                            <a href="login.php" class="nav-item nav-link">Login</a>
                            <!-- <a href="logout.php" class="nav-item nav-link">Logout</a> -->
                        <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <img src="./img/s3xtoy.jpg" alt="" class="mx-auto d-block" width="1000px" height="450px">
        </div>

        <div class="b-example-divider"></div>