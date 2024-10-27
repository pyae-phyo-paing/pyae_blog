<?php
    include "../layouts/navbar_side.php";
    include "../../dbconnect.php";

    $sql = "SELECT * FROM categories";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $categories = $stmt->fetchAll();
    // var_dump($categories);
?>

    <div class="container my-5">
        <div class="mb-5">
            <h3 class="d-inline">Cagegories Lists</h3>
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
                                    <a href="../../detail.php?id=<?= $category['id']?>" class="btn btn-sm btn-primary" target="_blank">Detail</a>
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

<?php
    include "../layouts/footer.php";
?>