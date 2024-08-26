<?php
require_once 'function.php';

$err = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (checkRequiredField('name')) {
       
        if (matchPattern($_POST['name'],"/^[A-Za-z\s'-]+$/")){
            $name = $_POST['name'];
        }
        else{
            $err['name'] = 'Enter Valid Name';    
        }
        
    } else {
        $err['name'] = 'Enter Name';
    }
    if (checkRequiredField('address')) {
       
        if (matchPattern($_POST['address'],"/^[A-Za-z\s'-]+$/")){
            $address = $_POST['address'];
        }
        else{
            $err['address'] = 'Enter Valid address';    
        }
        
    } else {
        $err['address'] = 'Enter address';
    }

    $course = $_POST['course'];
    $status = $_POST['status'];
    
    if (checkRequiredField('fee')) {
        if (is_numeric($_POST['fee'])){
            $fee = $_POST['fee'];
        }
        else{
            $err['fee'] = 'Enter Valid Fee';    
        }
    } else {
        $err['fee'] = 'Enter fee';
    }

    if (checkRequiredField('rollno')) {
        if (is_numeric($_POST['rollno'])){
            $rollno= $_POST['rollno'];
        }
        else{
            $err['rollno'] = 'Enter Valid rollno';    
        }
    } else {
        $err['rollno'] = 'Enter rollno';
    }
    
    if (checkRequiredField('dob')) {
            $dob = $_POST['dob'];
    } else {
        $err['dob'] = 'Enter dob';
    }


    if(count($err) == 0){
        if (addStudents($name,$course,$fee,$rollno,$address,$dob,$status)) {
           $err['success'] =  'Student detail add success';
      } else {
           $err['failed'] = 'Student detail add Failed';
      }
        
    }   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
   <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <!-- <script src="js/main.js">
        echo getRadioButtonData();
    </script> -->
</head>
<body>
    <?php  echo displayErrorMessage($err,'failed')?>
    <?php  echo displaySuccessMessage($err,'success')?>
    <div class="container">
        
        <h1>Student Details</h1> 
           <h3>
               <a href="display_students.php" class="link">Student list</a>
           </h3>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
               <div class="form-group">
                   <label for="name">Name</label>
                   <input type="text" name="name" class="form-control">
                   <?php  echo displayErrorMessage($err,'name')?>
               </div>
               
               
               <div class="form-group" class="course">
                   <label for="course">course</label>
                   <input type="radio" name="course" value="BCA" class="form-control" checked> BCA
                   <input type="radio" name="course" value="BBA" class="form-control"> BBA
                   <input type="radio" name="course" value="CSIT" class="form-control"> CSIT
                   
               </div>
               
               <div class="form-group">
                   <label for="fee">Fee</label>
                   <input type="number" name="fee" id="fee" min="0" step=".00">
                   <?php  echo displayErrorMessage($err,'fee')?>
               </div>
       
               <div class="form-group">
                   <label for="rollno">rollno</label>
                   <input type="number" name="rollno" id="rollno" min="0">
                   <?php  echo displayErrorMessage($err,'rollno')?>
               </div>
       
               <div class="form-group">
                   <label for="address">address</label>
                   <input type="text" name="address" class="form-control">
                   <?php  echo displayErrorMessage($err,'address')?>
               </div>
       
               <div class="form-group">
                   <label for="dob">dob</label>
                   <input type="date" name="dob" class="form-control" max="<?php echo date('Y-m-d', time())?>">
                   <?php  echo displayErrorMessage($err,'dob')?>
               </div>
       
               <div class="form-group" class="status">
                   <label for="status">status</label>
                   <input type="radio" name="status" value="0" class="form-control" checked> Yes
                   <input type="radio" name="status" value="1" class="form-control"> No
               </div>
               
       
               
               <div class="form-group">
                   <input type="submit" name="login" value="submit" class="form-control">
               </div>
           </fieldset>
        </form>
    </div>
</body>
</html>