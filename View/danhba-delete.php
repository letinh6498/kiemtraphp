<?php

require '../model/entity/danhba.php';

// Thực hiện xóa
$id = isset($_POST['id']) ? (int)$_POST['id'] : '';
if ($id){
    delete_contact($id);
}

// Trở về trang danh sách
header("location: index.php");