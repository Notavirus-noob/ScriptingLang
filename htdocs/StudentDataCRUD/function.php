<?php

function checkRequiredField($index){
    if (isset($_POST[$index]) && !empty($_POST[$index]) && trim($_POST[$index]) && htmlspecialchars($index)) {
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
function displaySuccessMessage($error,$index){
    if (array_key_exists($index,$error)) {
        return "<span class='success'>" . $error[$index] . " </span>";
    }
    return false;
}

function matchPattern($var,$pattern){
    if (preg_match($pattern,$var)) {
        return true;
    }
    return false;
}
function dateType($dob){

}
function addStudents($name,$course,$fee,$rollno,$address,$dob,$status){
    try{
        $connection = mysqli_connect('localhost','root','','book_collection');
        //insert query
        $newdob=explode('-',$dob);
        $year = $newdob[0];
        $month = $newdob[1];
        $day = $newdob[2];
        $newdate= $year . '-' . $month . '-' . $day;
        $insertsql = "insert into students(name,course,fee,rollno,address,dob,status) 
        values ('$name','$course',$fee,$rollno,'$address',STR_TO_DATE('$newdate', '%Y-%m-%d'),$status)";
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
        $sql = "select * from students";
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

function getStudentById($id){
    try {
        $cdate = date('Y-m-d H:i:s');
        $connect = new mysqli('localhost','root','','book_collection');
        $sql = "select * from students where id=$id";
        $result = $connect->query($sql);
        if ($result->num_rows == 1) {
            $recordsed= $result->fetch_assoc();
            return $recordsed;
        }
        return false;
    } catch (\Throwable $th) {
       die('Error: ' . $th->getMessage());
    }
}


function deleteStudent($id){
    try {
        $connect = new mysqli('localhost','root','','book_collection');
        $sql = "delete from students where id=$id";
        $connect->query($sql);
        if ($connect->affected_rows == 1) {
            return true;
        } else {
            return false;
        }
    } catch (\Throwable $th) {
       die('Error: ' . $th->getMessage());
    }
}

function updateStudent($id,$name,$course,$fee,$rollno,$address,$dob,$status){
    try {
        $updated_at = date('Y-m-d H:i:s');
        $connect = new mysqli('localhost','root','','book_collection');
        $sql = "update students set name='$name',course='$course',fee=$fee,rollno=$rollno,address='$address',dob='$dob',status='$status',updated_at='$updated_at' where id=$id";
        $connect->query($sql);
        if ($connect->affected_rows == 1) {
            return true;
        } else {
            return false;
        }
    } catch (\Throwable $th) {
       die('Error: ' . $th->getMessage());
    }
}

?>