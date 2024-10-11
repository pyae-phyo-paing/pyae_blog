<!-- Side widgets-->
 <?php
 
 include "dbconnect.php";
 
 $sql = "SELECT * FROM categories"; 
 // $stmt = $conn->query($sql);
 $stmt = $conn->prepare($sql); //stmt = statement, $conn ထဲက နေ sql ထဲက dataတွေကို ပြန်ခွဲထုတ်တာ
 $stmt->execute(); 
 $category_tags = $stmt->fetchAll();
 
 ?>
<div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                            </div>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            
                            <?php
                            foreach ( $category_tags as $category_tag) {
                            ?>

                            <div class="row">
                                <div class="col">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="detail.php?id=<?= $category_tag['id']?>"><?= $category_tag['name']?></a></li>
                                    </ul>
                                </div>
                            </div>

                            <?php
                                }
                            ?>

                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
