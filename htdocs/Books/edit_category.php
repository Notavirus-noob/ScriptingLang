<?php
require_once 'function.php';
$err = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['edtid'];
    if (checkRequiredField('title')) {
        $title = $_POST['title'];
    } else {
        $err['title'] = 'Enter title';
    }

    if (checkRequiredField('rank')) {
        $rank = $_POST['rank'];
    } else {
        $err['rank'] = 'Enter rank';
    }

    $status = $_POST['status'];

    if (count($err) == 0) {
      if (updateCategory($id,$title,$rank,$status)) {
            $err['success'] =  'Category update success';
      } else {
            $err['failed'] = 'Category updated Failed';
      }
    }
}

if (isset($_GET['edtid']) && is_numeric($_GET['edtid'])) {
    $record = getBookCategoryById($_GET['edtid']);
    if (!$record) {
        die('Category not found');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
 <h1>Edit Category</h1>   
 <a href="display_category.php">Back To list</a>
 <?php  echo displayErrorMessage($err,'failed')?>
 <?php  echo displaySuccessMessage($err,'success')?>
 <form action="" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Edit Category Information</legend>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="<?php echo $record['title'] ?>">
            <?php  echo displayErrorMessage($err,'title')?>
        </div>
        <div class="form-group">
            <label for="rank">Rank</label>
            <input type="number" name="rank" class="form-control" value="<?php echo $record['rank'] ?>">
            <?php  echo displayErrorMessage($err,'rank')?>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <?php if ($record['status'] == 1) { ?>
                <input type="radio" name="status" value="1" class="form-control" checked>Active
                <input type="radio" name="status" value="0" class="form-control" >De-Active
            <?php } else { ?>
                <input type="radio" name="status" value="1" class="form-control">Active
                <input type="radio" name="status" value="0" class="form-control" checked>De-Active
            <?php } ?>
            <?php  echo displayErrorMessage($err,'status')?>
        </div>
        <div class="form-group">
            <input type="submit" name="save" value="Update Category" class="form-control">
        </div>
    </fieldset>
 </form>
</body>
</html>