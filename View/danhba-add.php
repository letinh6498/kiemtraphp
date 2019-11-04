<?php

require '../model/entity/danhba.php';
if (!empty($_POST['add_contact']))
{
    // Lay data
    $data['Ten']        = isset($_POST['name']) ? $_POST['name'] : '';
    $data['Phone']         = isset($_POST['phone']) ? $_POST['phone'] : '';
    $data['Email']    = isset($_POST['email']) ? $_POST['email'] : '';

    // Neu ko co loi thi insert
    if (!$errors){
        add_contact($data['Ten'], $data['Phone'], $data['Email']);
        // Trở về trang danh sách
        header("location: index.php");
    }
}

disconnect_db();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Thêm danh bạ</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <h1>Thêm danh bạ</h1>
        <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
            <a href="index.php"><h2>Trở về</h2></a> <br/> <br/>
      
                <form class="form"  method="post" action="danhba-add.php">
                <div class="form-group">
                    <label >Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo !empty($data['Ten']) ? $data['Ten'] : ''; ?>">
                    
                </div>
                <div class="form-group">
                    <label >Phone</label>
                    <input type="text" class="form-control"  name="phone" value="<?php echo !empty($data['Phone']) ? $data['Phone'] : ''; ?>">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" value="<?php echo !empty($data['Email']) ? $data['Email'] : ''; ?>" >
                </div>
                <input type="submit" name="add_contact" value="Lưu"/>
                </form>
            </div>
             <div class="col-md-4"></div>
        </div>
        </div>
        
    </body>
</html>
