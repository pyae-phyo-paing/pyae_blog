<?php 
    include "layouts/navbar.php";
    include "dbconnect.php";

    $post_id = $_GET['id'];
    // echo $post_id;
    $sql = "SELECT * FROM posts Where id = :postID";  //:postID နေရာမှာ ကြိုက်တာ ထားလိူ့ရတယ် ဒါပေမဲ့ : ထည့်ပေးရပါမယ်, database မှာ ပိုပြီး secure ဖြစ်‌အောင်မို့ ထည့်တာ
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':postID',$post_id); //သူက  $post_id နေရာမှာ :postID ဆိုတာကို အစားထိုး ထည့်လိုက်တာ 
    $stmt->execute();
    $post = $stmt->fetch();
    // var_dump($post);
?>
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1"><?= $post['title']?></h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Posted on <?= $post['created_at']?> by <?= $post['user_id']?></div>
                            <!-- Post categories-->
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!"><?= $post['category_id']?></a>
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" src="<?= $post['image']?>" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p> <?= $post['description']?></p>
                        </section>
                    </article>
                </div>
<?php 
    include "layouts/footer.php";
?>