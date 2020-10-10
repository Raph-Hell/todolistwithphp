<?php
        /** CRUD APP  **/

/** Database Connection **/
$server = 'localhost';
$username = 'root';
$password = '';
$db = 'todo';

$connect = mysqli_connect($server, $username, $password, $db);
/** ----------- End ----------- **/


/** C = CREATE -> Inserting  **/
if (isset($_POST['submit'])){
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

    $todo_item = mysqli_real_escape_string($connect, $POST['todo']);

    $query = "INSERT INTO `todo`(`todo_items`) VALUES ('$todo_item')";
    $result = mysqli_query($connect, $query);

    if($result){
        header('location: index.php?alert=add_success');
    }
    else{
        header('location: index.php?alert=failed');
    }
}

/** U = UPDATE -> Updating  **/
if (isset($_POST['update'])){
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

    $todo_item = mysqli_real_escape_string($connect, $POST['todo']);
    $id = mysqli_real_escape_string($connect, $POST['todo']);

    $query = "UPDATE `todo` SET `todo_items` = '$todo_item' WHERE `id` = '$id'";
    $result = mysqli_query($connect, $query);

    if($result){
        header('location: index.php?alert=update_success&view');
    }
    else{
        header('location: index.php?alert=failed');
    }
}


/** D = DELETE -> Deleting  **/
if (isset($_GET['delete'])){
    $id = $_GET['delete'];

    $query = "DELETE FROM `todo` WHERE `id` = '$id'";
    $result = mysqli_query($connect, $query);

    if($result){
        header('location: index.php?alert=delete_success&view');
    }
    else{
        header('location: index.php?alert=failed');
    }
}