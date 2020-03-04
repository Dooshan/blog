<?php include "includes/header.php";
$id = $_GET['id'];

// Create DB Object
$db = new Database();
//Create Query 
$query = "SELECT * FROM posts WHERE id='$id' ";
//Run Query
$post = $db->select($query)->fetch_assoc();
//Create Query 
$query = "SELECT * FROM categories";
//Run Query
$categories = $db->select($query);



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
        $query = "UPDATE posts SET 
                    title = '$title',
                    body = '$body',
                    category = '$category',
                    author = '$author',
                    tags = '$tags'
                    WHERE id=$id; ";
        $update_row = $db->update($query);
    }
}

if (isset($_POST['delete'])) {
    $query = "DELETE FROM posts WHERE id='$id' ";
    $delete_row = $db->delete($query);
}
?>

<form method="post" action="edit_post.php?id=<?=$_GET['id'] ?>">
    <div class="form-group">
        <label>Post Title</label>
        <input type="text" class="form-control" name="title" placeholder="Enter Title" value="<?= $post['title'] ?>">
    </div>
    <div class="form-group">
        <label>Post Body</label>
        <textarea name="body" class="form-control" placeholder="Enter Post Body"> <?= $post['body']; ?></textarea>
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
                <option <?= $selected ?> value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
            <?php endwhile ?>
        </select>
    </div>
    <div class="form-group">
        <label>Author</label>
        <input type="text" class="form-control" name="author" placeholder="Enter author name" value="<?= $post['author']; ?>">
    </div>
    <div class="form-group">
        <label>Tags</label>
        <input type="text" class="form-control" name="tags" placeholder="Enter tags" value="<?= $post['tags']; ?>">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-default" name="submit">Submit</button>
        <a href="index.php" class="btn btn-default">Cancel</a>
        <button type="submit" class="btn btn-danger" name="delete">Delete</a>

    </div>
</form>
<?php include "includes/footer.php"; ?>