<?php require "../config.php";
       
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>AJAX | Part 1</title>
</head>
<body>
    <form class="container p-5">
        <div class="row mb-3">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="name" autocomplete="on">
            </div>
        </div>
        <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label" >Email</label>
            <div class="col-sm-10">
            <input type="email" class="form-control" id="email" autocomplete="on">
            </div>
        </div>
        <div class="row mb-3">
            <label for="password" class="col-sm-2 col-form-label checkPass">Password</label>
            <div class="col-sm-10">
            <input type="password" class="form-control" id="password">
            </div>
        </div>
        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
            <div class="col-sm-10">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="Male" checked>
                <label class="form-check-label" for="gridRadios1">
                Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="Female">
                <label class="form-check-label" for="gridRadios2">
                Female
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="Not specified">
                <label class="form-check-label" for="gridRadios3">
                Not specified
                </label>
            </div>
            </div>
        </fieldset>
        <button type="submit" class="btn btn-primary" id="upload">Upload the Data</button>
        </form>
        
        <!-- Table to show the details -->
        <table class="table table-hover container">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th></th>
                <th></th>
                
            </thead>
            <tbody>
              <?php
               $sql="SELECT * FROM users ";
               $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($result)) {
                    echo "<tr><td id='row_id'>" . $row['id'] . "</td>";
                    echo "<td id='row_name'>" . $row['name'] . "</td>";
                    echo "<td id='row_email'>" . $row['email'] . "</td>";
                    echo "<td id='row_gender'>" . $row['gender'] . "</td>";
                    echo "<td><button class='btn btn-success edit-btn' data-id='" . $row['id'] . "'>Edit</button></td>";
                    echo "<td><button class='btn btn-danger delete-btn' data-id='" . $row['id'] . "'>Delete</button></td>";
                    echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
     <!-- The Modal -->
            <div class="modal" id="editModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Updated Bootstrap-styled form -->
                            <form method="POST" id="edit-form" action="edit.php">
                                <input type="text" name="id" id="idEdit" >
                                <div class="mb-3">
                                    <label for="name" class="form-label">New Name</label>
                                    <input type="text" class="form-control" id="nameEdit" name="name" placeholder="New Name">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">New Email</label>
                                    <input type="email" class="form-control" id="emailEdit" name="email" placeholder="New Email">
                                </div>
                                <div class="mb-3">
                                    <label for="gender" class="form-label">New Gender</label>
                                    <input type="text" class="form-control" id="genderEdit" name="gender" placeholder="New Gender">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">New Password</label>
                                    <input type="password" class="form-control checkPass" id="passwordEdit" name="password" placeholder="New Password">
                                    <input type="checkbox" onclick="passVisibal()">Show Password
                                </div>
                                <button type="submit" class="btn btn-primary" name="submitedit" id="edit-data">Update User</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


    <script>
        function passVisibal(){
           var password = document.getElementById("passwordEdit");
           if (password.type === "password") {
            password.type = "text";
            } else {
                password.type = "password";
            }
        }
        $(document).ready(function(){
            $("#edit-form").hide();
           
            $(".edit-btn").click(function() {
                //getting the data from table
                var id = $(this).closest("tr").find("#row_id").text();
                var name = $(this).closest("tr").find("#row_name").text();
                var email = $(this).closest("tr").find("#row_email").text();
                var gender =$(this).closest("tr").find("#row_gender").text();

                //storing into form
                $("#idEdit").val(id);
                $("#nameEdit").val(name);
                $("#genderEdit").val(gender);
                $("#emailEdit").val(email);
                
                //Showing the model to edit
                $('#editModal').modal('show');
                $("#edit-form").show();
               
                $("#edit-data").click(function() {
                    var id = $(this).closest("tr").find("#row_id").text();
                    $.ajax({
                        url: "edit.php",
                        method: 'POST',
                        data: { id: id,name:name,email:email,gender:gender },
                        success: function(data) {
                            alert(data);
                            location.reload();
                        }
                    });
                });
                
            });
            $(".close").click(function() {
                    $('#editModal').modal('hide');
            });

            $("#upload").click(function(){
                
                var name = $("#name").val();
                var email = $("#email").val();
                var password = $("#password").val();
                var gender = $(".form-check-input:checked").val();
                $.ajax({
                    url:'insert.php',
                    method:'POST',
                    data:{
                        name:name,
                        email:email,
                        password:password,
                        gender:gender
                    },
                    success:function(data){
                        alert(data);
                        location.reload();
                    }
                })
            });
            
            $(document).ready(function() {
               

                $(".delete-btn").click(function() {
                    var id = $(this).closest("tr").find("#row_id").text();
                    $.ajax({
                        url: "delete.php",
                        method: 'GET',
                        data: { id_1: id },
                        success: function(data) {
                            console.log(data);
                            location.reload();
                        }
                    });
                });
            });


        });
    </script>
</body>
</html>