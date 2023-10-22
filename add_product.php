<?php
require_once('header.php');
require_once('connect.php');

if (isset($_POST['btnAddProduct'])) {
    $c = new Connect();
    $dbLink = $c->connectToPDO();

    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pquan = $_POST['pquan'];
    $pdesc = $_POST['pdesc'];
    $pimage = str_replace(' ', '-', $_FILES['pimage']['name']);
    $imgdir = './img/';
    $flag = move_uploaded_file($_FILES['pimage']['tmp_name'], $imgdir . $pimage);
    $pdate = date('Y-m-d');  // Use the current date
    $catid = $_POST['catid'];


    if ($flag) {
        $sql = "INSERT INTO product (pname, pprice, pquan, pdesc, pimage, pdate, catid) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $re = $dbLink->prepare($sql);
        $re->execute([$pname, $pprice, $pquan, $pdesc, $pimage, $pdate, $catid]);

        echo "Product added successfully.";
    } else {
        echo "Failed to upload the product image.";
    }
}
if (isset($_COOKIE["cc_uname"])) {
    $username = $_COOKIE["cc_uname"];
} else {
    header("Location: login.php");
}

$c = new connect();
$dbLink = $c->connectToMySQL();
$sql = 'SELECT * FROM product';
$re = $dbLink->query($sql);
?>
<div class="container">
    <h2>Product Add</h2>
    <form class="form form-vertical" method="POST" action="#" enctype="multipart/form-data">
        <!-- Your product input fields here -->
        <div class="row mb-3">
            <!-- Product name, price, description, quantity, category, and image fields -->
            <div class="row mb-3">
                <label for="pname" class="col-sm-2">Product name:</label>
                <div class="col-sm-10">
                    <input id="pname" type="text" name="pname" class="form-control" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label for="pprice" class="col-sm-2">Price:</label>
                <div class="col-sm-10">
                    <input id="pprice" type="text" name="pprice" class="form-control" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label for="pquan" class="col-sm-2">Quantity:</label>
                <div class="col-sm-10">
                    <input id="pquan" type="text" name="pquan" class="form-control" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label for="pdesc" class="col-sm-2">Description:</label>
                <div class="col-sm-10">
                    <input id="pdesc" type="text" name="pdesc" class="form-control" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label for="pimage" class="col-sm-2">Image:</label>
                <div class="col-sm-10">
                    <input id="pimage" type="file" name="pimage" class="form-control" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label for="pdate" class="col-sm-2">Date: </label>
                <div class="col-sm-10">
                    <input type="date" id="pdate" name="pdate" class="form-control" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label for="catid" class="col-sm-2">Category:</label>
                <div class="col-sm-10">
                    <input id="catid" type="text" name="catid" class="form-control" value="">
                </div>
            </div>

        </div>
        <div class="row mb-3">
            <div class="col-2 mx-auto">
                <input type="submit" name="btnAddProduct" value="Add Product" class="btn btn-primary">
            </div>
        </div>
        <hr class="my-4">

        <div class="pt-5">
             <h6 class="mb-0"><a href="home.php" class="text-body">
                <i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a>
            </h6>
        </div>
    </form>
</div>

<?php
require_once('footer.php');
?>