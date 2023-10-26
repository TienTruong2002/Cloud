<?php
require_once('header.php'); //goi noi dung
include_once('connect.php'); //goi noi dung
$c = new Connect();
$dbLink = $c->connectToMySQL(); //truy van k dieu kien
$sql = 'SELECT * FROM product ORDER BY pdate DESC';
$re = $dbLink->query($sql);

if ($re->num_rows > 0) {
?>

    <div class="container">
        <div class="row mx-auto">
            <?php
            while ($row = $re->fetch_assoc()) {
            ?>

                <div class="card mb-3 col-3 mx-auto my-3" style="width: 18rem;">
                    <img src="img/<?= $row['pimage'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">

                        <a href="detail.php?id=<?= $row['pid'] ?>" class="text-decoration-none">
                            <h6 class="text-center" style="font-size: 15px; color: black;"><?= $row['pname'] ?></h6>
                        </a>
                        <p class="card-cost text-center my-3" style="font-weight: bold; font-size: 30px;"><small class="text-muted"><?= $row['pprice'] ?>&#8363;</small></p>


                    </div>


                </div>
        <?php
            } //while
        } //if
        ?>
        </div>
    </div>
    <?php
    require_once('footer.php');
    ?>