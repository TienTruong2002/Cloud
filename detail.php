<?php
include_once('header.php');
include_once('connect.php');
$c = new Connect();
$dbLink = $c->connectToMySQL();
?>
<div class="container px-4 py-5">
    <?php
    if (isset($_COOKIE["cc_uname"])) {
        $username = $_COOKIE['cc_uname'];
    } else {
        header("Location:login.php");
    }
    if (isset($_GET['delete_id'])) {
        $deleteId = $_GET['delete_id'];
        // Perform the deletion by running a DELETE SQL query
        $deleteSql = "DELETE FROM product WHERE pid = ?";
        $deleteStmt = $dbLink->prepare($deleteSql);
        $deleteStmt->bind_param("i", $deleteId);

        if ($deleteStmt->execute()) {
            // Product deleted successfully
            echo "Product has been deleted successfully!";
        } else {
            // Deletion failed
            echo "Failed to delete the product.";
        }
    }
    if (isset($_GET['id'])) :
        $pid = $_GET['id'];
        require_once 'connect.php';
        $conn = new Connect();
        $db_link = $conn->connectToPDO();
        $sql = "SELECT * FROM product WHERE pid=?";
        $stmt = $db_link->prepare($sql);
        $stmt->execute(array($pid));
        $re = $stmt->fetch(PDO::FETCH_BOTH);
    ?>
        <div class="card mb-3 col-3 mx-auto my-3" style="width: 18rem;">
            <img src="img/<?= $re['pimage'] ?>" class="card-img-top my-3 mx-auto" alt="..." style="max-width: 90%; height: auto; border: 1px solid black; border-radius: 6px;">
            <div class="card-body">
                <h2 class="text-center" style="color: black;"><?= $re['pname'] ?></h2>

                Price: <?= $re['pprice'] ?>
                <br>
                Quantity: <?= $re['pquan'] ?>
                <br>
                Description: <?= $re['pdesc'] ?>
            </div>
            <button type="submit" name="btnAdddelete" class="btn btn-dange mx-3">
                <!-- <a href="cart.php?id=<?=$row['pid']?>" class="text-decoration-none text-black">Add to cart</a><i class="fas fa-shopping-cart"></i> -->
                <a href="update.php?id=<?=$re['pid']?>" class="btn btn-success">Update
                <i class="fa-solid fa-pen-to-square"></i></a>
            </button> 
            <button type="submit" name="btnAdddelete" class="btn btn-dange mx-3">
                <!-- <a href="cart.php?id=<?=$row['pid']?>" class="text-decoration-none text-black">Add to cart</a><i class="fas fa-shopping-cart"></i> -->
                <a href="?delete_id=<?= $re['pid']?>" class="btn btn-danger">Delete
                <i class="fa-solid fa-xmark"></i></a>
            </button>        
        </div>

    <?php
    else :
    ?>
        <h2>Nothing to show</h2>
    <?php
    endif;
    ?>
</div>

<hr class="my-4">

<div class="pt-5">
    <h6 class="mb-0"><a href="index.php" class="text-body">
            <i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a>
    </h6>
</div>
<?php
include_once('footer.php');
?>