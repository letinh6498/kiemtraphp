
<?php
require '../model/entity/danhba.php';
$contact = get_all_contacts();
disconnect_db();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Danh Bạ</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
    
    <div><a style="float: right;" href="logout.php"  class="mt-5 mr-3"><h2>Logout</h2> </a></div>
        <h1>Danh Sách </h1>
        <a href="danhba-add.php"><h3>Thêm Danh Bạ</h3></a> <br/> <br/>
        <table  class="table table-hover" >
            <thead class="thead-dark">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Thao tác</th>   
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contact as $item){ ?>
                <tr>
                    <td><?php echo $item['STT']; ?></td>
                    <td><?php echo $item['Ten']; ?></td>
                    <td><?php echo $item['Phone']; ?></td>
                    <td><?php echo $item['Email']; ?></td>
                    <td>
                        <form method="post" action="danhba-delete.php">
                            <input onclick="window.location = 'danhba-edit.php?id=<?php echo $item['STT']; ?>'" type="button" value="Sửa" class="btn btn-outline-primary"/>
                            <input type="hidden" name="id" value="<?php echo $item['STT']; ?>"/>
                            <input onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="delete" value="Xóa" class="btn btn-outline-danger"/>
                        </form>
                    </td>
                </tr>
                <?php } ?>
           </tbody>
          
        </table>
    </body>
</html>

                
    

