<?php include "includes/header.php";
//Create DB Object
$db = new Database();

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($db->link, $_POST['name']);
   
    //Simple Validation 
    if ($name == '') {
        // set error 
        $error = 'Please fill out all required fields';
    } else {
         $query = "INSERT INTO categories (name)  
                  VALUES ('$name') " ;
         $update_row = $db->update($query);
    }
 }
 
    
    
    ?>

<form method="post" action="add_category.php">
    <div class="form-group">
        <label>Category Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter Category">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default" name="submit">Submit</button>
        <a href="index.php" class="btn btn-default">Cancel</a>
    </div>
</form> 

<?php include "includes/footer.php"; ?>