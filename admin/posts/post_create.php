<?php
    include "../layouts/navbar_side.php";
?>

    <div class="container">
        <div class="mt-3 mx-2">
            <h2 class="d-inline">Posts</h2>
            <button class="btn btn-lg btn-danger float-end">Cancel</button>
            <p><a href="">Dashboard</a> / <a href="">Posts</a> / Posts</p>
        </div>
        <div class="card">
            <div class="card-header">
                Create Posts
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="post_title" class="form-label">Title</label>
                    <input type="email" class="form-control" id="post_title">
                </div>
                <div class="mb-3">
                    <label for="choose" class="form-label">Categories</label>
                    <select name="" id="choose" class="form-select">
                        <option selected>Choose.......</option>
                        <option value="1">Web Development</option>
                        <option value="2">AI</option>
                        <option value="3">English Speaking</option>
                        <option value="4">Degital Marketing</option>
                        <option value="5">Personal Development</option>
                        <option value="6">Professional Development</option>
                        <option value="7">Business And Management</option>
                        <option value="8">Accounting</option>
                        <option value="9">HR Management</option>
                        <option value="10">Personal Ethics and Professional Ethics
                        </option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image_file" class="form-label">Image</label>
                    <input type="file" name="" id="image_file" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <a href="" class="btn btn-primary w-100">Create</a>
                </div>
            </div>
        </div>
    </div>

<?php
    include "../layouts/footer.php";
?>