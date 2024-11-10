<?php
    session_start();
    include "../layouts/navbar_side.php";
    include "../../dbconnect.php";


    $id = $_GET['user_id'];
    $sql = "SELECT * FROM users WHERE id = :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id',$id);
    $stmt->execute();
    $user = $stmt->fetch();

    $roles = ['Admin','Author'];

    $sql = "SELECT users.role FROM users INNER JOIN posts ON posts.user_id = users.id WHERE posts.user_id = :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id',$id);
    $stmt->execute();
    $user_permittion = $stmt->fetch();




?>


<div class="container">

<div class="mt-3 mx-2">
    <h2 class="d-inline">Edit Accounts</h2>
    <button class="btn btn-lg btn-danger float-end" onclick="return cancelAction()">Cancel</button>
    <p><a href="">Dashboard</a> / <a href="users.php">Accounts</a> / Edit Accounts</p>
</div>
<div class="card">
    <div class="card-header">
        Edit Accounts
    </div>
    <div class="card-body">
      <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">User Name</label>
                <input type="text" class="form-control" id="title" name="title" value="<?= $user['name'] ?>">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Email Address</label>
                <input type="text" class="form-control" id="title" name="title" value="<?= $user['email'] ?>">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Password</label>
                <input type="text" class="form-control" id="title" name="title" value="<?= $user['password'] ?>">
            </div>
            <div class="mb-3">
                        <label for="user_role" class="form-label">Roles</label>
                        <select id="user_role" class="form-select" name="user_role">
                        <!-- <option selected>Choose.......</option> -->
                            
                            <?php
                                foreach( $roles as $role ){
                            ?>
                            <option value="<?= $role?>"<?php if($user['role'] === $role){ echo 'selected';}?>><?= $role ?></option>
                            <?php }?>
                            
                            
                        </select>
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
                            <img src="../<?= $post['image'] ?>" alt="" class="w-50 h-50 py-5">
                            <input type="hidden" name="old_image" id="" value="<?= $post['image'] ?>">
                        </div>
                        <div class="tab-pane fade" id="new_image-tab-pane" role="tabpanel" aria-labelledby="new_image-tab" tabindex="0">
                        <input type="file" id="image" class="form-control my-5" name="image">
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
?>