<?php include "includes/header.php";
// Create DB Object
$db = new Database();

if (isset($_POST['submit'])) {
   $title = mysqli_real_escape_string($db->link, $_POST['title']);
   $body = mysqli_real_escape_string($db->link, $_POST['body']);
   $category = mysqli_real_escape_string($db->link, $_POST['category']);
   $author = mysqli_real_escape_string($db->link, $_POST['author']);
   $tags = mysqli_real_escape_string($db->link, $_POST['tags']);
   //Simple Validation 
   if ($title == '' || $body == '' || $category == '' || $author == '') {
       // set error 
       $error = 'Please fill out all required fields';
   } else {
        $query = "INSERT INTO posts (title, body, category, author, tags )  
                 VALUES ( '$title', '$body', $category, '$author', '$tags') " ;
        $insert_row = $db->insert($query);
   }
    
    

}




//Create Query 
$query = "SELECT * FROM categories";
//Run Query
$categories = $db->select($query); ?>
<form method="post" action="add_post.php">
    <div class="form-group">
        <label>Post Title</label>
        <input type="text" class="form-control" name="title" placeholder="Enter Title">
    </div>
    <div class="form-group">
        <label>Post Body</label>
        <textarea name="body" class="form-control" placeholder="Enter Post Body"></textarea>
    </div>
    <div class="form-group">
        <label>Category</label>

        <select name="category" class="form-control">
            <?php while ($row = $categories->fetch_assoc()) : ?>
                <?php if ($row['id'] == $post['category']) {
                    $selected = 'selected';
                } else {
                    $selected = '';
                }
                ?>
                <option <?= $selected ?> value="<?= $row['id']; ?>"><?= $row['name'] ?></option>
            <?php endwhile ?>

        </select>
    </div>
    <div class="form-group">
        <label>Author</label>
        <input type="text" class="form-control" name="author" placeholder="Enter author name">
    </div>
    <div class="form-group">
        <label>Tags</label>
        <input type="text" class="form-control" name="tags" placeholder="Enter tags">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-default" name="submit">Submit</button>
        <a href="index.php" class="btn btn-default">Cancel</a>
    </div>
</form>
<?php include "includes/footer.php"; ?>