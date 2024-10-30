<?php
    include "layouts/navbar.php";
    include "dbconnect.php";

    if(isset($_GET['category_id'])){ //category id သာ null ဖြစ်မနေခဲ့ဘူးဆိုရင် ဒီကောင်ကို run
        $category_id = $_GET['category_id'];
        $sql = "SELECT * FROM posts WHERE posts.category_id = :categoryID ORDER BY id DESC";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':categoryID',$category_id);
        $stmt->execute();
        $posts = $stmt->fetchAll();
    }else{ //category id သာ null ဖြစ်တယ်ဆိုရင် ဒီကောင်ကို run

    // 18446744073709551615 သည် MySQL ၏ အကြီးဆုံး value
    $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 18446744073709551615 OFFSET 1"; 
    // $stmt = $conn->query($sql);
    $stmt = $conn->prepare($sql); //stmt = statement, $conn ထဲက နေ sql ထဲက dataတွေကို ပြန်ခွဲထုတ်တာ
    $stmt->execute(); 
    $posts = $stmt->fetchAll();
    // echo $posts[0]["title"];
    // echo "<br>";
    // var_dump($posts);

    $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 1"; 
    // $stmt = $conn->query($sql);
    $stmt = $conn->prepare($sql); //stmt = statement, $conn ထဲက နေ sql ထဲက dataတွေကို ပြန်ခွဲထုတ်တာ
    $stmt->execute(); 
    $latest_post = $stmt->fetch();

    }
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
                        if(isset($_GET['category_id'])){ //category id သာ null ဖြစ်မနေခဲ့ဘူးဆိုရင် ဒီကောင်ကို run

                        }else{ //category id သာ null ဖြစ်နေတယ်ဆိုရင် ဒီကောင်ကို run
                    ?>
                        <!-- Featured blog post-->
                        <div class="card mb-4">
                            <a href="#!"><img class="card-img-top" src="<?= $latest_post['image']?>" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted"><?= date('F d, Y',strtotime($latest_post['created_at']))?></div>
                                <h2 class="card-title"><?= $latest_post['title']?></h2>
                                <p><?= substr(strip_tags($latest_post['description']),0,130)?>......</p>
                                <a class="btn btn-primary" href="detail.php?id=<?= $latest_post['id']?>">Read more →</a> 
                                <!-- ? က detail.php ကို မှာ ပြန်ခေါ်တဲ့ အခါ $_GET နဲ့ ပြန်ခေါ်လို့ ရအောင် ထည့်တာ GET Method နဲ့ ပြန်ခေါ်ချင်တယ် ဆိုရင် ? ကို ထည့်ပေးရပါတယ်  -->
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">

                        <?php 
                            foreach($posts as $post) {
                        ?>

                        <div class="col-lg-6">
                            <!-- Blog post-->
                             <!-- substr(string,start,numbrt) -->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="<?= $post['image']?>" alt="..." /></a>
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
                </div>

<?php 
    include "layouts/footer.php";
?>