<?php

require_once "connect.php";
//function clear(){
//    foreach ($_POST as $key => $value) {
//        $_POST[$key] = mysqli_real_escape_string($value);
//    }
//}


function save_mess($bd_misyte){
//    clear();
//    extract($_POST);
    $name = mysqli_real_escape_string($bd_misyte, $_POST['name']);
    $email = mysqli_real_escape_string($bd_misyte, $_POST['email']);
    $text = mysqli_real_escape_string($bd_misyte, $_POST['text']);

    $query = "INSERT INTO `guest_book` (`id`, `full_name`, `login`, `email`, `text`, `status`, `date`) VALUES (NULL, '$name', '', '$email', '$text', '1', CURRENT_TIMESTAMP);";
    mysqli_query($bd_misyte,$query);
}

function get_mess($bd_misyte,$first, $itemsPerPage){

    $query = "SELECT * FROM guest_book ORDER BY id DESC LIMIT $first, $itemsPerPage";
    $res = mysqli_query($bd_misyte,$query);
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function get_cout($bd_misyte){
    $query = "SELECT COUNT(id) FROM guest_book";
    $rez = mysqli_query($bd_misyte,$query);
    $row = mysqli_fetch_row($rez);
    return $row[0];
}

function print_arr($arr){
    echo "<pre>" . print_r($arr, true) . "</pre>";
}

