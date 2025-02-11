<?php
include("Database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $db = new Database();

    if ($db->delete("employee",  $id)) {
        echo "success";
    } else {
        echo "failed";
    }
}
?>
