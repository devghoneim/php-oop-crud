





<?php
// Validate
$error ="";
$success ="";
$departments =array("it","dev","network","backend");
if (isset($_POST["submit"])) {
    $name = filter_var($_POST["name"] , FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"] , FILTER_SANITIZE_EMAIL);
    $department = filter_var($_POST["department"] , FILTER_SANITIZE_STRING);
    $password = filter_var($_POST["password"] , FILTER_SANITIZE_STRING);
    if (empty($name) || empty($department)|| empty($email)|| empty($password)) {
        $error ="Please Fill All Fieldes";
    }else {
        if (filter_var($_POST["email"] , FILTER_VALIDATE_EMAIL)) {
            $department = strtolower($department);
            if (in_array($department,$departments)) {

                if (strlen($password)> 6) {
                        $db = new Database();
                       $enc_password = $db->enc_password($password);
                       $sql="INSERT INTO `employee`( `name`, `email`, `department`, `password`) VALUES ('$name','$email','$department','$enc_password')" ;
                       
                        
                    $success =$db->insert($sql);
                }else {

                     $error ="Password Must be Greater Than 6 chars";
                    
                }

            }else {
            $error ="This Department Not Found";
                
            }
        }else {
            $error ="Enter Validate Email";
        }
    }
}


?>







<div class="container">
    <div class="row">
        <div class="col-sm-12">
        <h2 class="p-3 col text-center mt-5 text-white bg-primary">Add Employee</h2>
        </div>
        <div class="col">
            <?php if($error != ""):
            ?>
            <h5 class="alert alert-danger mt-5 text-center w-100"><?=".".$error?></h5>
        </div>
        <?php endif;?>
        
            <?php if($success != ""):
            ?>
            <h5 class="alert alert-success mt-5 text-center"><?=". ".$success?></h5>
        
        <?php endif;?>
    </div>

    <div class="row">
        <div class="col">
            <form  action="<?=$_SERVER["PHP_SELF"]?>?add" method="post">
                    
                        <input type="text" name="name" class="form-control mb-3" id="name" placeholder="Enter Name">
                    

                    
                        <input type="text" name="department" class="form-control mb-3" id="department" placeholder="Enter Department">

                    
                        <input type="text" name="email" class="form-control mb-3" id="email" placeholder="Enter Email">

                    
                        <input type="text" name="password" class="form-control mb-3" id="password" placeholder="Enter Password">
                        <div class="d-flex justify-content-center ">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>

            </form>
        </div>
    </div>
</div>












