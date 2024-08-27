<?php
require_once 'bookfunction.php';
$err = [];
$category_list = getAllBookCategoryForDropdown();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['edtid'];
    if (checkRequiredField('title')) {
        $title = $_POST['title'];
    } else {
        $err['title'] = 'Enter title';
    }
    if (checkRequiredField('book_category_id')) {
        $book_category_id = $_POST['book_category_id'];
    } else {
        $err['book_category_id'] = 'Select Book Category';
    }

    if (checkRequiredField('author')) {
        $author = $_POST['author'];
    } else {
        $err['author'] = 'Enter author';
    }

    if (checkRequiredField('publication')) {
        $publication = $_POST['publication'];
    } else {
        $err['publication'] = 'Enter publication';
    }
    if (checkRequiredField('edition')) {
        $edition = $_POST['edition'];
    } else {
        $err['edition'] = 'Enter edition';
    }
    if (checkRequiredField('isbn')) {
        $isbn = $_POST['isbn'];
    } else {
        $err['isbn'] = 'Enter isbn';
    }
    
    if (checkRequiredField('noofpage')) {
        $noofpage = $_POST['noofpage'];
    } else {
        $err['noofpage'] = 'Enter noofpage';
    }
 
    if (checkRequiredField('price')) {
        $price = $_POST['price'];
    } else {
        $err['price'] = 'Enter price';
    }

    $status = $_POST['status'];

    if (count($err) == 0) {
      if (updateBook($id,$title,$price,$author,$edition,$publication,$noofpage,$status,$isbn,$book_category_id)) {
            $err['success'] =  'book update success';
      } else {
            $err['failed'] = 'book updated Failed';
      }
    }
}

if (isset($_GET['edtid']) && is_numeric($_GET['edtid'])) {
    $record = getBookCategoryById($_GET['edtid']);
    if (!$record) {
        die('book not found');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <link rel="stylesheet" href="css/book.css">
</head>
<body>
 <h1>Edit Category</h1>   
 <?php  echo displayErrorMessage($err,'failed')?>
 <?php  echo displaySuccessMessage($err,'success')?>
 <form action="" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Edit Category Information</legend>
        <div class="form-group">
            <label for="title">Book Category</label>
            <select name="book_category_id" id="book_category_id">
                <option value="">Select Book Category</option>
                <?php  foreach ($category_list as $key => $value) { ?>
                    <option value="<?php echo $record['id']; ?>"><?php echo $value['title'] ?></option>
               <?php  }?>
            </select>
            <?php  echo displayErrorMessage($err,'book_category_id')?>
        </div>
        <div class="form-group">
            <label for="title">title</label>
            <input type="text" name="title" class="form-control" value="<?php echo $record['title'] ?>">
            <?php  echo displayErrorMessage($err,'title')?>
          
        </div>
        <div class="form-group">
            <label for="author">author</label>
            <input type="text" name="author" class="form-control" value="<?php echo $record['author'] ?>">
            <?php  echo displayErrorMessage($err,'author')?>
        </div>
        <div class="form-group">
            <label for="publication">publication</label>
            <input type="text" name="publication" class="form-control" value="<?php echo $record['publication'] ?>">
            <?php  echo displayErrorMessage($err,'publication')?>
        </div>
        <div class="form-group">
            <label for="edition">edition</label>
            <input type="text" name="edition" class="form-control" value="<?php echo $record['edition'] ?>">
            <?php  echo displayErrorMessage($err,'edition')?>
        </div>
        <div class="form-group">
            <label for="isbn">isbn</label>
            <input type="number" name="isbn" class="form-control" value="<?php echo $record['isbn'] ?>">
            <?php  echo displayErrorMessage($err,'isbn')?>
        </div>
        <div class="form-group">
            <label for="noofpage">no of pages</label>
            <input type="number" name="noofpage" class="form-control" value="<?php echo $record['noofpage'] ?>">
            <?php  echo displayErrorMessage($err,'noofpage')?>
        </div>
      
        <div class="form-group">
            <label for="price">price</label>
            <input type="number" name="price" class="form-control" value="<?php echo $record['price'] ?>">
            <?php  echo displayErrorMessage($err,'price')?>
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