<?php 
    session_start();

    if($_SESSION['user_id']){
    include "../../dbconnect.php";
    include "../layouts/navbar_side.php";

    
    $id = $_GET['profile_userid'];
    $sql = "SELECT * FROM users WHERE id = :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id',$id);
    $stmt->execute();
    $user = $stmt->fetch();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST['name'];
        $email = $_POST['email'];

        $image_array = $_FILES['profile'];

        if(isset($image_array) && $image_array['size'] > 0){
            $dir = "../images/";
            $image_dir = $dir.$image_array['name']; //../images/eg.jpg ဖိုင်ထဲကို တကယ် သိမ်းမည့် နေရာ
            $image = "images/".$image_array['name']; // database ထဲမှာ သိမ့်မည့် ပတ်လမ်း
            // echo $image;
            $tmp_name = $image_array['tmp_name'];
            move_uploaded_file($tmp_name,$image_dir);
        }else{
            $image = $_POST['old_image'];
        }


        $sql = "UPDATE users SET name=:name, email=:email, profile=:image WHERE id =:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':name',$name);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':image',$image);
        $stmt->execute();

        header("location:profile.php");
    }

?>

<div class="container">

<div class="mt-3 mx-2">
    <h2 class="d-inline">Edit Personal Info</h2>
    <button class="btn btn-lg btn-danger float-end" onclick="return cancelAction()">Cancel</button>
    <!-- <p><a href="">Dashboard</a> / <a href="">Accounts</a> / Edit Accounts</p> -->
</div>
<div class="card my-3">
    <div class="card-header">
        Edit
    </div>
    <div class="card-body">
      <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="text" class="form-control" id="email" name="email" value="<?= $user['email'] ?>">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <input type="text" class="form-control" id="password" name="role" value="<?= $user['role'] ?>" readonly disabled>
            </div>
            
            <div class="mb-3">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="true">Image</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="new_image-tab" data-bs-toggle="tab" data-bs-target="#new_image-tab-pane" type="button" role="tab" aria-controls="new_image-tab-pane" aria-selected="false">New Image</button>
                    </li>
                </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <img src="../<?= $user['profile'] ?>" alt="" class="w-50 h-50 py-5">
                            <input type="hidden" name="old_image" id="" value="<?= $user['profile'] ?>">
                        </div>
                        <div class="tab-pane fade" id="new_image-tab-pane" role="tabpanel" aria-labelledby="new_image-tab" tabindex="0">
                        <input type="file" id="profile" class="form-control my-5" name="profile">
                        </div>
                    </div>
            </div>
            <!-- <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="3" name="description"><?= $post['description'] ?></textarea>
            </div> -->
            <div class="mb-3">
                <button type="submit" class="btn btn-primary w-100 ">Update</button>
            </div>
      </form>
    </div>
</div>

</div>

<?php 

    include "../layouts/footer.php";
        }else{
            header("location:../login.php");
        }
?>