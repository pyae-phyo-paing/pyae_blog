<?php

session_start();
if(isset($_SESSION['user_id'])){
    header("location:posts/posts.php");
}else{
include "../dbconnect.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];
    // echo "$email <br> $password";

    $sql = "SELECT * FROM users WHERE email=:email AND password = :password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':password',$password);
    $stmt->execute();
    $user = $stmt->fetch();
    // var_dump($user);
    if($user){
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['user_profile'] = $user['profile'];

        if($_SESSION['user_id']){
            header('location:posts/posts.php');
        }else{
            echo "Incorrect email and Password";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="offset-md-4 col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                       <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                            <div class="mb-3">
                                <label for="email" class="label-control">Email</label>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="label-control">Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                                <a href="users/create_users.php" style="text-decoration: none;">Create Account!</a>
                            <div>
                                <button class="btn btn-primary float-end" type="submit">Login</button>
                            </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php } ?>