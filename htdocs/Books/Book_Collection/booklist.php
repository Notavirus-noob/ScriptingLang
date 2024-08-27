<?php
require_once 'bookfunction.php';
$err = [];
if (isset($_GET['delid']) && is_numeric($_GET['delid'])) {
    if (getBookCategoryById($_GET['delid'])) {
        if(deleteCategory($_GET['delid'])){
            $err['success'] =  'Category deleted success';
        } else {
            $err['failed'] = 'Category delete Failed';
        }
    } else {
        $err['failed'] = 'Category not found';
    }
}
$records = getAllBookCategory();
print_r ($category_list = getAllBookCategoryForDropdown());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category List</title>
    <style>
        .error{
            color:red;
            border-bottom: 1px red dashed;
        }
        .success{
            color:green;
            border-bottom: 1px green dashed;
        }
    </style>
    </style>
</head>
<body>
    <h1 align="center">List Book Category</h1>
    <?php  echo displayErrorMessage($err,'failed')?>
    <?php  echo displaySuccessMessage($err,'success')?>
    <table width="100%" border="1">
        <tr>
        <th>Id</th>
        <th>Book Category </th>
            <th>Title</th>
            <th>Author</th>
            <th>publication</th>
            <th>Edition</th>
            <th>Isbn</th>
            <th>No of Page</th>
            <th>Price</th>
            <th>Status</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Action</th>
        </tr>
        <?php foreach ($records as $key => $record) { ?>
            <tr>
            <td><?php echo $key+1 ?></td>
            <td><?php echo $record['book_category_id']?></td>
                <td><?php echo $record['title']?></td>
                <td><?php echo $record['author']?></td>
                <td><?php echo $record['publication']?></td>
                <td><?php echo $record['edition']?></td>
                <td><?php echo $record['isbn']?></td>
                <td><?php echo $record['noofpage']?></td>
                <td><?php echo $record['price']?></td>
                <td><?php echo printStatus($record['status'])?></td>
                <td><?php echo $record['created_at']?></td>
                <td><?php echo $record['updated_at']?></td>
                <td>
                    <a class="btn btn-primary" href="bookupdate.php?edtid=<?php echo $record['id'] ?>">Edit</a>
                    <a class="btn btn-danger" href="booklist.php?delid=<?php echo $record['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>