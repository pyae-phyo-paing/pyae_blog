<?php 

    session_start();
    if($_SESSION['user_id']){
    include "../../dbconnect.php";
    include "../layouts/navbar_side.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $category_name = $_POST['category_name'];

        $sql = "INSERT INTO categories(name) VALUE(:name)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name',$category_name);
        $stmt->execute();
        header("location:categories.php");
    }

?>

<div class="container">

<div class="mt-3 mx-2">
    <h2 class="d-inline">Category</h2>
    <button class="btn btn-lg btn-danger float-end" onclick="return cancelAction()">Cancel</button>
    <p><a href="">Dashboard</a> / <a href="categories.php">Category</a></p>
</div>
<div class="card">
    <div class="card-header">
        Create Posts
    </div>
    <div class="card-body">
      <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="category_name" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="category_name" name="category_name">
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
}else{
    header("location:../login.php");
}

?>