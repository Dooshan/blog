<?php include "includes/header.php";
$id = $_GET['id'];

// Create DB Object
$db = new Database();

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($db->link, $_POST['name']);
   
    //Simple Validation 
    if ($name == '') {
        // set error 
        $error = 'Please fill out all required fields';
    } else {
         $query = "UPDATE categories SET name = '$name' WHERE id = '$id' ";
         $update_row = $db->update($query);
    }
 }

 if (isset($_POST['delete'])) {
    $query = "DELETE FROM categories WHERE id='$id' ";
    $delete_row = $db->delete($query);
}



//Create Query 
$query = "SELECT * FROM categories WHERE id='$id' ";
//Run Query
$category = $db->select($query)->fetch_assoc();
//Create Query 
$query = "SELECT * FROM categories";
//Run Query
$categories = $db->select($query); ?>
<form method="post" action="edit_category.php?id=<?=$id?>">
    <div class="form-group">
        <label>Category Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter Category" value="<?= $category['name']?> ">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default" name="submit">Submit</button>
        <a href="index.php" class="btn btn-default">Cancel</a>
        <button type="submit" class="btn btn-danger" name="delete">Delete</a>
    </div>
</form>

<?php include "includes/footer.php"; ?>