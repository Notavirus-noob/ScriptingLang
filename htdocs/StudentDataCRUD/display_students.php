<?php
require_once 'function.php';
$err = [];
if (isset($_GET['delid']) && is_numeric($_GET['delid'])) {
    if (getStudentById($_GET['delid'])) {
        if(deleteStudent($_GET['delid'])){
            $err['success'] =  'Category deleted success';
        } else {
            $err['failed'] = 'Category delete Failed';
        }
    } else {
        $err['failed'] = 'Category not found';
    }
}
$records = getAllBookCategory();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <?php  echo displayErrorMessage($err,'failed')?>
    <?php  echo displaySuccessMessage($err,'success')?>
    <h1 align="center">List Book Category</h1>
    <center>
        <button class="btn btn-success m-2">
            <a href="student_det_form.php" class="text-light no-decor ">Add Student detail</a>
        </button>
    </center>
    <table width="100%" border="1" class=" table table-bordered">
        <tr>
            <th>Sn</th>
            <th>Name</th>
            <th>Course</th>
            <th>fee</th>
            <th>roll no</th>
            <th>address</th>
            <th>date of birth</th>
            <th>Status</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Action</th>
            
        </tr>
        <?php foreach ($records as $key => $record) { ?>
            <tr >
                <td><?php echo $key+1 ?></td>
                <td><?php echo $record['name']?></td>
                <td><?php echo $record['course']?></td>
                <td><?php echo $record['fee']?></td>
                <td><?php echo $record['rollno']?></td>
                <td><?php echo $record['address']?></td>
                <td><?php echo $record['dob']?></td>
                <td><?php echo printStatus($record['status'])?></td>
                <td><?php echo $record['created_at']?></td>
                <td><?php echo $record['updated_at']?></td>
                <td>
                    <a class="btn btn-primary" href="edit_students.php?edtid=<?php echo $record['id'] ?>">Edit</a>
                    <a class="btn btn-danger" href="display_students.php?delid=<?php echo $record['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>