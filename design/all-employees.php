
<?php
$db = new Database();
$result =$db->select_all("employee");

?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
        <h2 class="p-3 col text-center mt-5 text-white bg-primary">All Employee</h2>
        </div>
<div class="col">

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Department</th>
      <th scope="col">Created_at</th>
      <th scope="col">controll</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($row = $result->fetch_assoc()) {
        ?>

        
    <tr>
      <th scope="row"><?=$row['id']?></th>
      <td><?=$row['name']?></td>
      <td><?=$row['email']?></td>
      <td><?=$row['department']?></td>
      <td><?=$row['created at']?></td>
      <td>
        <a href="?action=edit&&id=<?=$row['id']?>" class="btn btn-info">Edit</a>
        <button data-id="<?= $row['id'] ?>" class="delete-btn btn btn-danger">Delete</button>


      </td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>


        </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $(".delete-btn").click(function() {
        let employeeId = $(this).data("id");
        let btn = $(this); 

        if (confirm("Are you sure you want to delete this employee?")) {
            $.ajax({
                url: "delete_employee.php",
                type: "POST",
                data: { id: employeeId },
                success: function(res) {
                    if (res.trim() === "success") {
                        btn.closest("tr").fadeOut(500, function() { 
                            $(this).remove(); 
                        });
                    } else {
                        alert("Error: " + res);
                    }
                },
                error: function() {
                    alert("Error deleting employee.");
                }
            });
        }
    });
});

</script>

