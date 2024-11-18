<?php 


include "layouts/navbar.php";
include "dbconnect.php";

    
    if($_GET['category_id']){
        $category_id = $_GET['category_id'];
        $sql = "SELECT * FROM posts WHERE posts.category_id = :categoryID";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':categoryID',$category_id);
        $stmt->execute();
        $posts = $stmt->fetchAll();


?>

    
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Welcome to Pyae's Blog!</h1>
                    <p class="lead mb-0">I learn for me.I share for you.</p>
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    

                        <?php 
                            foreach($posts as $post) {
                        ?>

                        <div class="col-lg-6">
                            <!-- Blog post-->
                             <!-- substr(string,start,numbrt) -->
                            <div class="card mb-4">
                                <a href="#"><img class="card-img-top" src="admin/<?= $post['image']?>" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted"><?= date('F d, Y',strtotime($post['created_at']))?></div>
                                    <h2 class="card-title h4"><?= $post['title']?></h2>
                                    <p class="card-text"><?= substr(strip_tags($post['description']),0,150)?>.....</p>
                                    <a class="btn btn-primary" href="detail.php?id=<?= $post['id'] ?>">Read more →</a>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                            }
                        ?>

                </div>



<?php 

    include "layouts/footer.php";
                        }else{
                            header("location:admin/login.php");
                        }

?>