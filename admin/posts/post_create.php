<?php
    include "../layouts/navbar_side.php";
    include "../../dbconnect.php";

    $sql = "SELECT * FROM categories";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $categories = $stmt->fetchAll();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $title = $_POST['title'];
        $category_id = $_POST['category_id'];
        $description = $_POST['description'];
        $user_id = 1;


        $image_array = $_FILES['image'];
        // var_dump($image_array);
        // echo "$title <br> $category_id <br> $description";

        if(isset($image_array) && $image_array['size'] > 0){
            $dir = "../images";
            $image_dir = $dir.$image_array['name']; //../images/eg.jpg ဖိုင်ထဲကို တကယ် သိမ်းမည့် နေရာ
            $image = "admin/images".$image_array['name']; // database ထဲမှာ သိမ့်မည့် ပတ်လမ်း
            // echo $image;
            $tmp_name = $image_array['tmp_name'];
            move_uploaded_file($tmp_name,$image_dir);
        }

        $sql = "INSERT INTO posts(title,image,description,category_id,user_id) VALUES(:title,:image,:description,:category_id,:user_id)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':title',$title);
        $stmt->bindParam(':image',$image);
        $stmt->bindParam(':description',$description);
        $stmt->bindParam(':category_id',$category_id);
        $stmt->bindParam(':user_id',$user_id);
        $stmt->execute();

        header('location:posts.php');
    }
?>

    <div class="container">

        <div class="mt-3 mx-2">
            <h2 class="d-inline">Posts</h2>
            <button class="btn btn-lg btn-danger float-end">Cancel</button>
            <p><a href="">Dashboard</a> / <a href="">Posts</a> / Posts</p>
        </div>
        <div class="card">
            <div class="card-header">
                Create Posts
            </div>
            <div class="card-body">
              <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Categories</label>
                        <select id="category_id" class="form-select" name="category_id">
                            <option selected>Choose.......</option>

                            <?php 
                                foreach($categories as $category){
                            ?>
                            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>

                            <?php } ?>
                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" id="image" class="form-control" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary w-100 ">Create</button>
                    </div>
              </form>
            </div>
        </div>

    </div>

<?php
    include "../layouts/footer.php";
?>