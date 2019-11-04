<?php

require '../model/entity/danhba.php';

// Lấy thông tin hiển thị lên để người dùng sửa
$id = isset($_GET['id']) ? (int)$_GET['id'] : '';
if ($id){
    $data = get_contact($id);
}

// Nếu không có dữ liệu tức không tìm thấy sinh viên cần sửa
if (!$data){
   header("location: index.php");
}

// Nếu người dùng submit form
if (!empty($_POST['edit_contact']))
{
    // Lay data
    $data['Ten']      = isset($_POST['name']) ? $_POST['name'] : '';
    $data['Phone']    = isset($_POST['phone']) ? $_POST['phone'] : '';
    $data['Email']    = isset($_POST['email']) ? $_POST['email'] : '';
    $data['STT']     = isset($_POST['id']) ? $_POST['id'] : '';
    
  
    
    // Neu ko co loi thi insert
    if (!$errors){
        edit_contact($data['STT'], $data['Ten'], $data['Phone'], $data['Email']);
        // Trở về trang danh sách
        header("location: index.php");
    }
}

disconnect_db();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Thêm sinh vien</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <h1>Thêm sinh vien </h1>
      
        <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
            <a href="index.php"><h2>Trở về</h2></a> <br/> <br/>
      
                <form method="post" action="danhba-edit.php?id=<?php echo $data['STT']; ?>">
                    <div class="form-group">
                        <label >Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $data['Ten']; ?>">
                        
                    </div>
                    <div class="form-group">
                        <label >Phone</label>
                        <input type="text" class="form-control"  name="phone"  value="<?php echo $data['Phone']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email"  value="<?php echo $data['Email']; ?>">
                    </div>
                    <input type="hidden" name="id" value="<?php echo $data['STT']; ?>"/>
                    <input type="submit" name="edit_contact" value="Lưu"/>
                </form>
            </div>
             <div class="col-md-4"></div>
        </div>
        </div>
    </body>
</html>
