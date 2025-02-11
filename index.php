<?php
include("inc/header.php");
include("inc/navbar.php");
include("Database.php");
?>

<div class="container">
 

    <?php

        if (isset($_GET['add'])) {
            include("design/add-employee.php");
            
        }elseif(isset($_GET["action"]) && $_GET["action"] === "edit") {
           
            include("design/edit-employee.php");
        }else {
            include("design/all-employees.php");
        }


    ?>



</div>













<?php
include("inc/footer.php");

?>