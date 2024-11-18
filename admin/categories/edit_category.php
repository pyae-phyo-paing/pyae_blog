<?php 

    session_start();
    if($_SESSION['user_id']){

        include "../layouts/navbar_side.php";
        include "../../dbconnect.php";

        $id = $_GET['category_id'];
        $sql = "SELECT * FROM categories WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $category = $stmt->fetch();

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $category_id = $_POST['category_id'];
            $category_name = $_POST['name'];

            $sql = "UPDATE categories SET name = :name WHERE id = :id";
            $stmt=$conn->prepare($sql);
            $stmt->bindParam(':id',$category_id);
            $stmt->bindParam(':name',$category_name);
            $stmt->execute();

            header("location:categories.php");
        }

?>


<div class="container">

<div class="mt-3 mx-2">
    <h2 class="d-inline">Edit Category</h2>
    <a href="categories.php"><button class="btn btn-lg btn-danger float-end">Cancel</button></a>
    <p><a href="">Dashboard</a> / <a href="categories.php">Categories</a></p>
</div>
<div class="card">
    <div class="card-header">
        Edit Category
    </div>
    <div class="card-body">
      <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="category_id" id="" value="<?= $category['id'] ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $category['name'] ?>">
            </div>

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