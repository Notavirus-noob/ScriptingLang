<?php
require_once 'function.php';
$records = getAllBookCategory();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category List</title>
</head>
<body>
    <h1 align="center">List Book Category</h1>
    <table width="100%" border="1">
        <tr>
            <th>Sn</th>
            <th>Title</th>
            <th>Rank</th>
            <th>Status</th>
            <th>Created at</th>
            <th>Updated at</th>
        </tr>
        <?php foreach ($records as $key => $record) { ?>
            <tr>
                <td><?php echo $key+1 ?></td>
                <td><?php echo $record['title']?></td>
                <td><?php echo $record['rank']?></td>
                <td><?php echo printStatus($record['status'])?></td>
                <td><?php echo $record['created_at']?></td>
                <td><?php echo $record['updated_at']?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>