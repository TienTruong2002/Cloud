<?php
include_once("header.php");
include_once("connect.php");

$c = new Connect();
$dblink = $c->connectToPDO();
if(isset($_COOKIE['cc_uname'])){
    $user = $_COOKIE['cc_uname'];
    
    if(isset($_GET['id'])){
        $p_id = $_GET['id'];
        $sqlSelect1 = "SELECT pid FROM cart WHERE uname=? AND pid=?";
        $re = $dblink->prepare($sqlSelect1);
        $re->execute(array("$user","$p_id"));

        if($re->rowCount() == 0){
            $query = "INSERT INTO cart(uname, pid, pcount, date) VALUE(?,?,1,CURDATE())";
        }else{
            $query = "UPDATE cart SET pcount = pcount + 1 where uname=? and pid=?";
        }
        $stmt = $dblink->prepare($query);
        $stmt->execute(array("$user","$p_id"));

    }else if(isset($_GET['del_id'])){
        $cart_del = $_GET['del_id'];
        $query = "DELETE FROM cart WHERE cart_id=?";
        $stmt = $dblink->prepare($query);
        $stmt->execute(array($cart_del));
    }
    $sqlSelect = "SELECT * FROM cart c, product p WHERE c.pid = p.pid and uname=?";
    $stmt1 = $dblink->prepare($sqlSelect);
    $stmt1->execute(array($user));
    $rows = $stmt1->fetchAll(PDO::FETCH_BOTH);

}else{
    header("Location: login.php");
}
?>
<div class="container">
    <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
    <h6 class="mb-0 text-muted"><?=$stmt1->rowCount()?></h6>
    <table class="table">
        <tr>
            <th>Productname</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>

        </tr>
        <?php
            foreach($rows as $row){
            ?>
            <tr>
                <td><?=$row['pname']?>
            </td>
                <td><input id="form1" min="0" 
                name="quantity" value="<?=$row['pcount']?>" 
                type="number" class="form-control form-control-sm">
            </td>
                <td><h6 class="mb-0">
                    <span>&#8363;</span>
                     <?=$row['pcount']?> * <?=$row['pprice']?>
                    </h6>
                </td>
                <td><a href="cart.php?del_id=<?=$row['cart_id']?>"
                 class="text-muted text-decoration-none">x</td>
            </tr>
            <?php
            }
            ?>
    </table>
        <hr class="my-4">

        <div class="pt-5">
            <h6 class="mb-0"><a href="index.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
        </div>
</div>