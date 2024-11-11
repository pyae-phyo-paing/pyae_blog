<?php

    session_start();
    
    include "../../dbconnect.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        $image_array = $_FILES['profile'];

        if(isset($image_array) && $image_array['size'] > 0){
            $dir = "../images/";
            $image_dir = $dir.$image_array['name']; //../images/eg.jpg ဖိုင်ထဲကို တကယ် သိမ်းမည့် နေရာ
            $image = "images/".$image_array['name'];// database ထဲမှာ သိမ့်မည့် ပတ်လမ်း
            $tmp_name = $image_array['tmp_name'];
            move_uploaded_file($tmp_name,$image_dir);
        }

        $sql = "INSERT INTO users(name,email,password,profile,role) VALUE(:name,:email,:password,:profile,:role)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name',$name);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':password',$password);
        $stmt->bindParam(':profile',$image);
        $stmt->bindParam(':role',$role);
        $stmt->execute();
        
        header("location:../posts/posts.php");

    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sign-in-form {
            max-width: 600px;
            margin: auto;
            margin-top: 100px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .image-preview {
            margin-bottom: 10px;
            max-width: 100%;
            height: auto;
            display: none; /* Hide initially */}
    </style>
</head>
<body>

    <div class="container">
        <div class="sign-in-form">
                <h3 class="text-center mb-4">Sign In</h3>
           <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" enctype="multipart/form-data">
                <div class="form-group my-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name">
                </div>
                <div class="form-group my-3">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="form-group my-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                </div>
                <div class="form-group my-3">
                    <label for="profile">Choose Your Photo</label>
                    <img id="preview" class="image-preview" alt="Image Preview">
                    <input type="file" class="form-control" id="profile" name="profile" accept="image/*" onchange="showPreview(event)" >
                </div>
                <div class="form-group form-check my-3">
                    <div class="d-inline">
                        <a href="../login.php" style="text-decoration: none;">I had already Account!</a>
                    </div>
                    <a href="#" class="float-end">Forgot password?</a>
                </div>
                <div class="form-group">
                    <input type="hidden" name="role" value="Admin">
                </div>
                <div class="text-center my-3">
                   <button type="submit" class="btn btn-primary w-75">Sign In</button>
                </div>
                
            </form>
        </div>
        </div>
    </div>

    <script src="../../bootstrap/jquery-3.5.1.slim.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
    function showPreview(event) {
        const image = document.getElementById('preview');
        image.src = URL.createObjectURL(event.target.files[0]); // Create a URL for the file
        image.style.display = 'block'; // Show the image
    }
</script>
</body>
</html>

<?php 
    
 ?>