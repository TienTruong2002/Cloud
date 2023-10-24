<?php
require_once('header.php');
include_once('connect.php');
$c = new Connect();
$blink = $c->ConnectToMySQL();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['pid'];
    $product_name = $_POST['pname'];
    $price = $_POST['pprice'];
    $quantity = $_POST['pquan'];
    $des = $_POST['pdesc'];
    $img = $_POST['pimage'];
    $date = $_POST['pdate'];
    $catID = $_POST['catid'];

    $sql = " UPDATE `product` SET
     `pid`=' $product_id',
     `pname`=' $product_name',
     `pprice`='$price',
     `pquan`=' $quantity',
     `pdesc`='$des',
     `pimg`='$img',
     `pdate`='$date',
     `catid`='$catID' 
     WHERE pid = $product_id";

    if ($blink->query($sql) === true) {
        echo "Update Successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $blink->error;
    }
}

$product_id = $_GET['id'];
$sql = "SELECT * FROM product WHERE pid = '$product_id'";
$result = $blink->query($sql);
$row = $result->fetch_assoc();

?>

<div class="container">
    <form class="form form-vertical" method="POST" action="#" enctype="multipart/form-data">
    <div class="row mx-auto">
            <div>
                <label for="product_id">Product ID</label>
                <input id="pid" type="text" name="pid" class="form-control" value="<?= $row['pid'] ?>" required>
            </div>
        </div>
        <div class="row mb-3">

            <label for="product_name">Product Name:</label>
            <div class="col-sm-10">
                <input id="pname" type="text" name="pname" class="form-control" value="<?= $row['pname'] ?>" required>
            </div>

        </div>
        <div class="row mb-3">

            <label for="description">Description:</label>
            <div class="col-sm-10">
                <input id="pdesc" type="text" name="pdesc" class="form-control" value="<?= $row['pdesc'] ?>" required>
            </div>

        </div>
        <div class="row mb-3">

            <label for="price">Price:</label>
            <div class="col-sm-10">
                <input id="pprice" type="text" name="pprice" class="form-control" value="<?= $row['pprice'] ?>" required>
            </div>

        </div>
        <div class="row mb-3">

            <label for="stock_quantity">Quantity:</label>
            <div class="col-sm-10">
                <input id="pquan" type="text" name="pquan" class="form-control" value="<?= $row['pquan'] ?>" required>
            </div>

        </div>
        <div class="row mb-3">
            <!-- <div class="row mb-3"> -->

            <label for="image_url">Catid:</label>
            <div class="col-sm-10">
                <input id="catid" type="text" name="catid" class="form-control" value="<?= $row['catid'] ?>" required>
            </div>

        </div>
        <div class="row mb-3">
            <!-- <div class="row mb-3"> -->

            <label for="image_url">Date:</label>
            <div class="col-sm-10">
                <input id="pdate" type="text" name="pdate" class="form-control" value="<?= $row['pdate'] ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <!-- <div class="row mb-3"> -->

            <label for="image_url">Image:</label>
            <div class="col-sm-10">
                <input id="pimg" type="text" name="pimg" class="form-control" value="<?= $row['pimg'] ?>" required>
            </div>
        </div>
        <br>
        <div class="row mb-3">
            <div class="col-2 mx-auto">
                <input type="submit" name="btnAddProduct" value="Submit" class="btn btn-primary">
            </div>
        </div>
        <hr class="my-4">

        <div class="pt-5">
             <h6 class="mb-0"><a href="index.php" class="text-body">
                <i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a>
            </h6>
        </div>
    </form>
</div>

<?php
require_once('footer.php');
?>