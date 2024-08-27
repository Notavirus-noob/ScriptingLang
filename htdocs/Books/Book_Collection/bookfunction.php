<?php
date_default_timezone_set('Asia/Kathmandu');
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

function validateEmail($email){
    if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}

function displaySuccessMessage($error,$index){
    if (array_key_exists($index,$error)) {
        return "<span class='success'>" . $error[$index] . " </span>";
    }
    return false;
}

function login($username,$password){
    if ('admin' == $username && $password == 'admin123') {
        return true;
   }
   return false;
}

function loginWithArray($username,$password){
    $users = [
        ['username' =>'admin','password' => 'admin123'],
        ['username' =>'ram','password' => 'admin123'],
        ['username' =>'shyam','password' => 'admin123'],
        ['username' =>'hari','password' => 'admin123'],
    ];
    foreach($users as $user){
        if ($user['username'] == $username && $password == $user['password']) {
            return true;
       } 
    }
    return false;
}

function addCategory($t,$r,$s){
    try {
        $cdate = date('Y-m-d H:i:s');
        $connect = new mysqli('localhost','root','','book_collection');
        $sql = "insert into books((book_category_id, title, price, author, edition, publication, noofpage, status, isbn, created_at) values ('$t',$r,$s,'$cdate')";
        $connect->query($sql);
        if ($connect->insert_id > 0 && $connect->affected_rows == 1) {
            return true;
        } else {
            return false;
        }
    } catch (\Throwable $th) {
       die('Error: ' . $th->getMessage());
    }
}

function getAllBookCategory(){
    try {
        $cdate = date('Y-m-d H:i:s');
        $connect = new mysqli('localhost','root','','book_collection');
        $sql = "select * from books";
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

function getBookCategoryById($id){
    try {
        $cdate = date('Y-m-d H:i:s');
        $connect = new mysqli('localhost','root','','book_collection');
        $sql = "select * from books where id=$id";
        $result = $connect->query($sql);
        if ($result->num_rows == 1) {
            $record= $result->fetch_assoc();
            return $record;
        }
        return false;
    } catch (\Throwable $th) {
       die('Error: ' . $th->getMessage());
    }
}


function deleteCategory($id){
    try {
        $connect = new mysqli('localhost','root','','book_collection');
        $sql = "delete from books where id=$id";
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

function updateCategory($i,$t,$r,$s){
    try {
        $ud = date('Y-m-d H:i:s');
        $connect = new mysqli('localhost','root','','book_collection');
        $sql = "update books set title='$t',rank='$r',status='$s',updated_at='$ud' where id=$i";
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

function printStatus($s)  {
    if ($s == 1) {
        return 'Active';
    } else {
        return 'DeActive';
    }
}

//function to insert book details
function addBook($title,$price,$author,$edition,$publication,$noofpage,$status,$isbn,$book_category_id){
    try {
        $cdate = date('Y-m-d H:i:s');
        $connect = new mysqli('localhost','root','','book_collection');
        $sql = "INSERT INTO books(book_category_id, title, price, author, edition, publication, noofpage, status, isbn, created_at)
        VALUES ('$book_category_id', '$title', '$price', '$author', '$edition', '$publication', '$noofpage', '$status', '$isbn', '$cdate')";

        $connect->query($sql);
        if ($connect->insert_id > 0 && $connect->affected_rows == 1) {
            return true;
        } else {
            return false;
        }
    } catch (\Throwable $th) {
       die('Error: ' . $th->getMessage());
    }
}
function updateBook($id,$title,$price,$author,$edition,$publication,$noofpage,$status,$isbn,$book_category_id){
    try {
        $updated_at = date('Y-m-d H:i:s');
        $connect = new mysqli('localhost','root','','book_collection');
        $sql = "UPDATE books SET book_category_id = '$book_category_id',
                title = '$title',
                price = '$price',
                author = '$author',
                edition = '$edition',
                publication = '$publication',
                noofpage = '$noofpage',
                status = '$status',
                isbn = '$isbn',
                updated_at='$updated_at' WHERE id = $id;";

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

function getAllBookCategoryForDropdown(){
    try {
        $cdate = date('Y-m-d H:i:s');
        $connect = new mysqli('localhost','root','','book_collection');
        $sql = "select id,title from book_category";
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

?>