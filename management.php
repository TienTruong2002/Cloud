<?php
require_once('header.php');
include_once('connect.php');
?>
<div class="container">
    <div class="row">
        <?php
        $c = new Connect();
        $dbLink = $c->connectToPDO();

        if (isset($_GET['cid'])) {
            $cid = $_GET['cid'];
        } else {
            $cid = "";
        }

        $sql = 'SELECT * FROM `product` WHERE catid=?';
        $re = $dbLink->prepare($sql);
        $valueArray = [$cid];
        $re->execute($valueArray);
        $row = $re->fetchAll(PDO::FETCH_BOTH);
        foreach ($row as $r) :
        ?>
            <div class="card mb-3 col-3 my-3 mx-auto" style="width: 18rem;">
                <img src="img/<?= $r['pimage'] ?>" class="card-img-top " alt="...">
                <div class="card-body">
                    <a href="detail.php?id=<?= $r['pid'] ?>" class="text-decoration-none">
                        <h6 class="text-center" style="font-size: 15px; color: black;"><?= $r['pname'] ?></h6>
                    </a>
                    <p class="card-cost text-center my-3" style="font-weight: bold; font-size: 30px;">
                        <small class="text-muted"><?= $r['pprice'] ?></small>
                    </p>
                </div>
                <button type="submit" name="btnAddToCart" class="btn btn-warning my-3">
                    <a href="cart.php?id=<?= $r['pid'] ?>" class="text-decoration-none text-black">Add to cart<i class="fas fa-shopping-cart"></i></a>
                </button>
            </div>
        <?php
        endforeach;
        ?>
    </div>
</div>

<?php
require_once('footer.php');
?>