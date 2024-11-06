<?php
    include "../layouts/navbar_side.php";

    include "../../dbconnect.php";
    $sql = "SELECT posts.*,categories.name as c_name,users.name as u_name FROM posts INNER JOIN categories ON posts.category_id = categories.id INNER JOIN users ON posts.user_id = users.id";
    //main table ထဲကနေ အကုန်ထုတ်ချင်တာ အဲ့ဒါကြောင့် posts.*လို့ ထုတ်တာ
    //from နောက်က table က main table ကို ဆိုလိုတာ
    //ဒီနေရာမှာ ဘာကြောင့် Where ထုတ်မစစ်တာလဲဆိုတော့ သူက username နဲ့ categories name တွေ ထုတ်စရာလိုလို့ 
    //bind က ဘယ်နေရာမှာစစ်တာလဲဆိုရင် URL Bar မှာ သယ်လာတဲ့ ကောင်ရှိမှ စစ်တာ
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $posts = $stmt->fetchAll();
    // var_dump($posts);

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_POST['id'];
        // echo $id;
        $sql = "DELETE FROM posts WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        header("location:posts.php");
    }
?>

    <div class="container my-5">
        <div class="mb-5">
            <h3 class="d-inline">Posts Lists</h3>
            <a href="post_create.php" class="btn btn-primary float-end">Create Posts</a>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Title</td>
                            <td>Category</td>
                            <td>Author</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $j = 1;
                            foreach($posts as $post){
                        ?>
                        <tr>
                            <td><?= $j++ ?></td>
                            <td><?= $post['title'] ?></td>
                            <td><?= $post['c_name'] ?></td>
                            <td><?= $post['u_name'] ?></td>
                            <td>
                                <a href="edit_post.php?id=<?= $post['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                <button class="btn btn-sm btn-danger delete" data-id="<?= $post['id'] ?>">Delete</button>
                                <a href="../../detail.php?id=<?= $post['id'] ?>" class="btn btn-sm btn-primary" target="_blank">Detail</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>#</td>
                            <td>Title</td>
                            <td>Category</td>
                            <td>Author</td>
                            <td>Action</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

<!-- Modal -->
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
?>