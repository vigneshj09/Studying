
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>



<?php
include "../config.php";
if(isset($_POST["submitedit"])){


$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$password = $_POST['password'];

$qry = "UPDATE `users` SET `name`='$name', `email`='$email', `gender`='$gender', `password`='$password' WHERE `id`=$id";
$sql = mysqli_query($conn, $qry);

}

?>


