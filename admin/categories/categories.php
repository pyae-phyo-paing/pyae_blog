<?php

    session_start();
    if($_SESSION['user_id']){
    include "../layouts/navbar_side.php";
    include "../../dbconnect.php";

    $sql = "SELECT * FROM categories";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $categories = $stmt->fetchAll();
    // var_dump($categories);

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_POST['id'];

        $sql = "DELETE FROM categories WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();

        $sql = "DELETE FROM posts WHERE category_id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        header("location:categories.php");
    }
?>

    <div class="container my-5">
        <div class="mb-5">
            <h3 class="d-inline">Categories List</h3>
            <a href="create_category.php" class="btn btn-primary float-end">Create Category</a>
        </div>
        <div class="card ">
            <div class="card-body">
                <table class="table table-bordered w-75 mx-auto">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $j = 1;
                            foreach($categories  as $category){
                        ?>
                            <tr>
                                <td class="text-center"><?= $j++ ?></td>
                                <td><?= $category['name'] ?></td>
                                <td class="text-center">
                                    <a href="edit_category.php?category_id=<?= $category['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <button class="btn btn-sm btn-danger delete" data-id="<?= $category['id'] ?>">Delete</button>
                                    <a href="../../associate_post.php?category_id=<?= $category['id'] ?>" class="btn btn-sm btn-primary" target="_blank">Associate Posts</a>
                                </td>

                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Delete</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4>Are you sure delete?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <form action="" method="post">
            <input type="hidden" name="id" id="delete_id">
            <button type="submit" class="btn btn-danger">Yes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
    include "../layouts/footer.php";
                        }else{
                            header("location:../login.php");
                        }
?>