
<DOCTYPE html>
    <html lange="en">
        <head>
            <title></title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
        </head>

<?php
require_once('connect.php');
if(isset ($_POST ['btnLogin'])){
    if(isset ($_POST['password']) &&isset ($_POST['username'])){
        $password = $_POST ['password'];
        $username = $_POST ['username'];
        $c = new Connect();
        $dblink = $c->connectToPDO();
        $sql = "SELECT * FROM user WHERE uname = ? and upass = ?";
            $stmt = $dblink->prepare($sql);
            $sre = $stmt->execute(array("$username", "$password"));
            $numrow = $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_BOTH);
        if($numrow==1){
            echo "Login successfully";
            setcookie("cc_uname",$row['uname'], time()+3600);
            //setcookie("cc_id", $row['id'], time()+3600);
            header("Location: index.php");
        }
        else{
            echo "Something wrong with your info<br>";
        }
    }
    else{
        echo "please enter your info";
    }
}
?>
<style>
    h2{
        text-align: center;
        margin: 20px;
        color: #fff;
        font-size: 50px;
    }
    body{
        background-image: url(https://wallpapercave.com/dwp1x/wp2593531.jpg);
        background-repeat: no-repeat;
        background-size: cover;
    }
    .container{
        padding: 0;
        margin-top: 200px;
    }
</style>
<body>
    <div class="container">
        <h2>Login</h2>
        <form id="formreg" class="formreg" name="formreg" role="form" method="POST">
            <div class="row mb-3 my-auto">
                <div class="d-grid col-4 mx-auto">
                    <input id="username" type="text" name="username" class="form-control" value="" placeholder="Username">
                </div>
            </div>

            <div class="row mb-3">
                <div class="d-grid col-4 mx-auto">
                    <input id="password" type="password" name="password" class="form-control" value="" placeholder="Password">
                </div>
            </div>

            <!-- <div class="d-grid col-4 mx-auto">
                <div class="form-check d-inline-flex mx-auto">
                    <input id="checkrmb" type="checkbox" name="grpcheckrmb" value="1" class="form-check-input me-3">
                    <label id="check" for="checkrmb" class="form-check-label text-white">Remember me</label>
                </div>
            </div> -->

            <!-- <div class="row mb-3">
                <div class="col-3 mx-auto row">
                    <div 
                        class="col-6 d-grid mx-auto"><input type="submit" name="btnLogin" value="Login" class="btn btn-primary">
                    </div>

                    <button type="submit" name="btnRegister" class="col-6 d-grid mx-auto">
                        <a href="register.php" class="nav-item nav-link btn btn-primary">Register</a>
                    </button>
                </div>
            </div> -->
            <div class="row col-4 mb-3 mx-auto">
                <div class="col-6 d-grid mx-auto">
                    <button type="submit" name="btnLogin" class="btn btn-primary btn-rounded-pill">
                   Login
                    </button>
                </div>

                <div class="col-6 d-grid mx-auto">
                    <button type="button" name="btnRegister" class="btn btn-primary btn-rounded-pill" onclick="location.href='register.php';">
                        Register
                    </button>

                    <!-- <input type="button" name="btnRegister" value="Register" class="btn btn-primary" onclick="location.href='register.php';"> -->
                </div>
            </div>

        </form>
</body>
</html>

