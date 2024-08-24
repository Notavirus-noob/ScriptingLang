<?php
require_once 'function.php';
$err = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
     
    if(count($err) == 0){
        if (addCategory($title,$rank,$status)) {
           echo $err['success'] =  'Category add success';
      } else {
           echo $err['failed'] = 'Category add Failed';
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
    <style>
        .form-group{
            border-bottom: 1px solid green;
            padding:10px;
        }

        .form-group label{
            display:inline-block;
            width:100px;
        }

        .form-group input{
            width: 60%;
        }
        .form-group input[type='radio']{
            width: 5%;
        }

        .form-group input[type=submit]{
            width: 75px;
            height:25px;
            border:none;
            background:#3366aa;
            color:white;
        }
        .error{
            color:red;
            border-bottom: 1px red dashed;
        }


        .success{
            color:green;
            border-bottom: 1px green dashed;
        }
    </style>
</head>
<body>
 <h1>Book Category</h1>   
 <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Genre</legend>
        <div class="form-group">
            <label for="title">title</label>
            <input type="text" name="title" class="form-control">
            <?php  echo displayErrorMessage($err,'title')?>
          
        </div>
        <div class="form-group">
            <label for="rank">rank</label>
            <input type="number" name="rank" class="form-control">
            <?php  echo displayErrorMessage($err,'rank')?>
        </div>
        <div class="form-group" class="status">
            <label for="status">status</label>
            <input type="radio" name="status" value="1" class="form-control"> Yes
            <input type="radio" name="status" value="0" class="form-control" checked> No
            
        </div>
        <div class="form-group">
            <input type="submit" name="login" value="submit" class="form-control">
        </div>
    </fieldset>
 </form>
</body>
</html>