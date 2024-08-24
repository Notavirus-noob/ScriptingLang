<?php
function checkRequiredField($index){
    if (isset($_POST[$index]) && !empty($_POST[$index]) && trim($_POST[$index])) {
        return true;
    } else {
        return false;
    }
}

function displayErrorMessage($error,$index){
    if (array_key_exists($index,$error)) {
        return "<span class='error'>" . $error[$index] . " </span>";
    }
    return false;
}

function matchPattern($var,$pattern){
    if (preg_match($pattern,$var)) {
        return true;
    }
    return false;
}
function addCategory($title,$rank,$status){
    try{
        $connection = mysqli_connect('localhost','root','','book_collection');
        //insert query
        $insertsql = "insert into book_category(title,rank,status) 
        values ('$title',$rank,$status)";
        mysqli_query($connection,$insertsql);
        if ($connection->insert_id > 0 && $connection->affected_rows == 1) {
            return true;
        } else {
            return false;
        }
        
    }catch(Exception $ex){
        echo "Database Error: " . $ex->getMessage();
    }
}

function getAllBookCategory(){
    try {
        // $cdate = date('Y-m-d H:i:s');
        $connect = new mysqli('localhost','root','','book_collection');
        //select query
        $sql = "select * from book_category";
        $result = $connect->query($sql);
        $data = [];
        if ($result->num_rows > 0) {
            //fetch data
            while ($record= $result->fetch_assoc()) {
                array_push($data,$record);
            }
        }
        return $data;
    } catch (\Throwable $th) {
       die('Error: ' . $th->getMessage());
    }
}
function printStatus($status)  {
    if ($status == 1) {
        return 'Active';
    } else {
        return 'DeActive';
    }
}
?>