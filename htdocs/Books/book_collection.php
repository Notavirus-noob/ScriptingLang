<?php
require_once 'function.php';
$err = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (checkRequiredField('title')) {
        $title = $_POST['title'];
    } else {
        $err['title'] = 'Enter title';
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
    
    if (checkRequiredField('noofpages')) {
        $noofpages = $_POST['noofpages'];
    } else {
        $err['noofpages'] = 'Enter noofpages';
    }
    if (checkRequiredField('language')) {
        $language = $_POST['language'];
    } else {
        $err['language'] = 'Enter language';
    }
    if (checkRequiredField('price')) {
        $price = $_POST['price'];
    } else {
        $err['price'] = 'Enter price';
    }

    

    $status = $_POST['status'];
    if(count($err) == 0){
        try{
            $connection = mysqli_connect('localhost','root','','book_collection');
            //insert query
            $insertsql = "insert into book_category(title,rank,status) 
            values ('$title',$rank,$status)";
            mysqli_query($connection,$insertsql);
            
        }catch(Exception $ex){
            echo "Database Error: " . $ex->getMessage();
        }
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
 <h1>Book Collection</h1>   
 <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Genre</legend>
        <div class="form-group">
            <label for="title">title</label>
            <input type="text" name="title" class="form-control">
            <?php  echo displayErrorMessage($err,'title')?>
          
        </div>
        <div class="form-group">
            <label for="author">author</label>
            <input type="text" name="author" class="form-control">
            <?php  echo displayErrorMessage($err,'author')?>
        </div>
        <div class="form-group">
            <label for="publication">publication</label>
            <input type="text" name="publication" class="form-control">
            <?php  echo displayErrorMessage($err,'publication')?>
        </div>
        <div class="form-group">
            <label for="edition">edition</label>
            <input type="number" name="edition" class="form-control">
            <?php  echo displayErrorMessage($err,'edition')?>
        </div>
        <div class="form-group">
            <label for="isbn">isbn</label>
            <input type="number" name="isbn" class="form-control">
            <?php  echo displayErrorMessage($err,'isbn')?>
        </div>
        <div class="form-group">
            <label for="noofpages">no of pages</label>
            <input type="number" name="noofpages" class="form-control">
            <?php  echo displayErrorMessage($err,'noofpages')?>
        </div>
        <div class="form-group">
            <label for="language">Language</label>
            <input type="text" name="language" class="form-control">
            <?php  echo displayErrorMessage($err,'language')?>
        </div>
        <div class="form-group">
            <label for="price">price</label>
            <input type="number" name="price" class="form-control">
            <?php  echo displayErrorMessage($err,'price')?>
        </div>

        <div class="form-group" class="status">
            <label for="status">status</label>
            <input type="radio" name="status" value="1" class="form-control" checked> Yes
            <input type="radio" name="status" value="0" class="form-control" > No
            
        </div>
        <div class="form-group">
            <input type="submit" name="login" value="submit" class="form-control">
        </div>
    </fieldset>
 </form>
</body>
</html>