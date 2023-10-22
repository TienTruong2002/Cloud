<?php
require_once('header.php');
require_once('connect.php');
if(isset($_POST['btnRegister'])){
    $c = new Connect();
    $dbLink = $c->connectToPDO();
    $uname =$_POST['username'];
    $upass =$_POST['password'];
    $uphone =$_POST['txtPhone'];
    $uemail =$_POST['txtEmail'];
    $ugender =$_POST['grgender'];
    $uhometown =$_POST['hometown'];
    $ubirthday = date('y-m-d',strtotime($_POST['txtBirth']));

    $sql = "INSERT INTO `user`(`uname`, `upass`, `ugender`, `uphone`, `uhometown`, `uemail`, `ubirthday`) VALUES (?,?,?,?,?,?,?)";

    $re = $dbLink->prepare($sql);
    $valueArray = [
        "$uname","$upass","$ugender","$uphone","$uhometown","$uemail","$ubirthday"
    ];
    $stmt = $re->execute($valueArray);
    if($stmt){
        echo "Congrats";
    }else{
        echo "Failed";
    }
}
?>

<div class="container">
                <h2>Member Registration</h2>
                <form id="formreg" class="formreg" name="formreg" role="form" method="POST">
                    <div class="row mb-3">
                        <label for="username" class="col-sm-2">Username:</label>
                        <div class="col-sm-10">
                                <input id="username" type="text" name="username" class="form-control" value="">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-sm-2">Password:</label>
                        <div class="col-sm-10">
                                <input id="password" type="password" name="password" class="form-control" value="">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for ="pwd2" class="col-sm-2">Confirm Password:</label>
                        <div class="col-sm-10">
                            <input id="pwd2" type="password" name="pwd2" class="form-control" value="">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="gender" class="col-sm-2">Gender:</label>
                        <div class="col-sm-10 my-auto">
                            <div class="form-check d-inline-flex pe-3">
                                <input id="rdMale" type="radio" name="grgender" value="0" class="form-check-input">  
                                <label class="form-check-inline" for="rdMale">Male</label>
                            </div> 
                            
                            <div class="form-check d-inline-flex pe-3">
                                <input id="rdFemale" type="radio" name="grgender" value="1" class="form-check-input">  
                                <label class="form-check-inline" for="rdFemale">Female</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="txtPhone" class="col-sm-2">Phone:</label>
                        <div class="col-sm-10">
                            <input id="txtPhone" type="text" name="txtPhone" class="form-control" value="">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <lable for="txtEmail" class="col-sm-2">Email:</lable>
                        <div class="col-sm-10">
                            <input id="txtEmail" type="email" name="txtEmail" class="form-control" value="">
                        </div>
                    </div>

                    <!--Birthday-->
                    <div class="row mb-3">
                        <label for="txtBirth" class="col-sm-2">Birthday: </label>
                        <div class="col-sm-10">
                            <input type="date" id="txtBirth" name="txtBirth" class="form-control" value="">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="city" class="col-sm-2">Hometown:</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="city" name="hometown">
                                <option selected value="Unknow">Choose your hometown</option>
        
                                <option value="ct">Can Tho</option>
                                <option value="cm">Ca Mau</option>
                                <option value="hg">Hau Giang</option>
                                <option value="st">Soc Trang</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <!--<div class="col-sm-10 ms-auto"-->
                        <div class="d-grid col-2 mx-auto">
                            <input type="submit" name="btnRegister" value="Register" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
<?php
require_once('footer.php');
?>