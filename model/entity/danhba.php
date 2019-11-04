<?php
// Biến kết nối toàn cục
global $conn;


function connect_db()
{
    // Gọi tới biến toàn cục $conn
    global $conn;
    if (!$conn){
        $conn = mysqli_connect('localhost', 'root', '', 'contacts') or die ('Can\'t not connect to database');
        // Thiết lập font chữ kết nối
        mysqli_set_charset($conn, 'utf8');
    }
}
function disconnect_db()
{
    global $conn;
    if ($conn){
        mysqli_close($conn);
    }
}
function get_all_contacts()
{
    global $conn;
    connect_db();
    $sql = "select * from contact";
    $query = mysqli_query($conn, $sql);
    $result = array();
    if ($query){
        while ($row = mysqli_fetch_assoc($query)){
            $result[] = $row;
        }
    }
    
    return $result;
}

function get_contact($ID)
{
    global $conn;
    connect_db();
    $sql = "select * from contact where STT = {$ID}";
    $query = mysqli_query($conn, $sql);
    $result = array();
    if (mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
        $result = $row;
    }
    return $result;
}
function add_contact($Ten, $Phone, $Email)
{
    global $conn;
    connect_db();
    $sql = "
            INSERT INTO contact (Ten, Phone, Email) VALUES
            ('$Ten','$Phone','$Email')
    ";
    $query = mysqli_query($conn, $sql);
    
    return $query;
}
function edit_contact($ID, $Ten, $Phone, $Email)
{
    global $conn;
    connect_db();
    $sql = "
            UPDATE contact SET
            Ten = '$Ten',
            Phone = '$Phone',
            Email = '$Email'
            WHERE STT = $ID
    ";
    $query = mysqli_query($conn, $sql);
    
    return $query;
}

function delete_contact($ID)
{
    global $conn;
    
    connect_db();
    $sql = "
            DELETE FROM contact
            WHERE STT = $ID
    ";
    

    $query = mysqli_query($conn, $sql);
    
    return $query;
}