<?php include "includes/header.php"; ?>

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
            <option>News</option>
            <option>Events</option>
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

</body>

</html>


<?php include "includes/footer.php"; ?>