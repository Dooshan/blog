<?php include "includes/header.php"; ?>
<?php
//create db object
$db = new Database;
//create query
$query = "SELECT posts.*, categories.name FROM  posts INNER JOIN categories ON posts.category=categories.id ORDER BY posts.id DESC";
//run query 
$posts = $db->select($query);

//Create Query 
$query = "SELECT * FROM categories";
//Run Query
$categories = $db->select($query);


?>


<table class="table table-striped">
    <tr>
        <th>Post ID#</th>
        <th>Post Title</th>
        <th>Category</th>
        <th>Author</th>
        <th>Date</th>
    </tr>
    <?php while ($row = $posts->fetch_assoc()) :  ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><a href="edit_post.php?id=<?= $row['id'] ?>"><?= $row['title'] ?></a></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['author'] ?></td>
            <td><?= formatDate($row['date']) ?></td>
        </tr>
    <?php endwhile; ?>
</table>

<table class="table table-striped">
    <tr>
        <th>Category ID#</th>
        <th>Category Name</th>
    </tr>
    <?php while ($row = $categories->fetch_assoc()) : ?>
        <tr>
            <th><?= $row['id'] ?></th>
            <th><a href="edit_category.php?id=<?= $row['id'] ?>"><?= $row['name'] ?></a></th>
        </tr>
    <?php endwhile ?>
</table>

<?php include "includes/footer.php"; ?>