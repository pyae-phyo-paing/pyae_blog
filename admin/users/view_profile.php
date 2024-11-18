<?php 

session_start();
if($_SESSION['user_id']){
    
include "../layouts/navbar_side.php";
include "../../dbconnect.php";

$id = $_GET['userid'];
$sql = "SELECT * FROM users WHERE id = :userid";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':userid',$id);
$stmt->execute();
$user = $stmt->fetch();

?>

<div class="container my-5">

<div class="card mx-auto w-50">
    <div class="card-header text-center">
        <img
            src="../<?= $user['profile'] ?>"
            class="rounded-circle w-50 h-50" 
        >
        <div class="card-body text-center">
            <h3 class="card-title"><?= $user['name'] ?></h3>
            <p class="card-text text-muted"><?= $user['role'] ?></p>
            <p class="card-text"><strong>Email:</strong> <?= $user['email'] ?></p>
            <a href="users.php" class="btn btn-secondary">Done</a>
        </div>
    </div>
</div>
</div>

<?php 

    include "../layouts/footer.php";
}else{
    header('location:../login.php');
}

?>