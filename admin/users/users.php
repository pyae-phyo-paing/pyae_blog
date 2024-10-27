<?php
    include "../layouts/navbar_side.php";
    include "../../dbconnect.php";

    $sql = "SELECT * FROM users";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $users = $stmt->fetchAll();
?>

    <div class="container my-5">
        <div class="mb-5">
            <h3 class="d-inline">Users List</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Profile</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $j = 1;
                            foreach($users as $user){
                        ?>
                        <tr>
                            <td><?= $j++ ?></td>
                            <td><?= $user['name'] ?></td>
                            <td><?= $user['email']?></td>
                            <td><?= $user['role'] ?></td>
                            <td>
                                <a href="<?= $user['profile'] ?>" class="btn btn-primary btn-sm" target="_blank">View Profile</a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Profile</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

<?php
    include "../layouts/footer.php";
?>