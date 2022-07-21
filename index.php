<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

error_reporting(0);
include("connect.php");



$method = $_SERVER["REQUEST_METHOD"];
switch ($method) {
    case 'GET':
        
        $path =  explode('/',$_SERVER["REQUEST_URI"]);
    
       if(isset($path[3]) && is_numeric($path[3])){
        $sql = "SELECT * FROM users  WHERE id =$path[3]"; 
            $result = $con->query($sql);
            if($result){
                while($row= $result->fetch_assoc()){
                    $data[] =$row;
                }
                echo json_encode($data);
            }else{
                echo json_encode(array(array("status"=>"Error")));
            }
        }else{
            $sql = "SELECT * FROM users";
            $result = $con->query($sql);
            if($result){
                while($row= $result->fetch_assoc()){
                    $data[] =$row;
                }
                echo json_encode($data);
            }else{
                echo json_encode(array(array("status"=>"Error")));
            }
        }
        break;
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $sql = "INSERT INTO users (username,email,phone)VALUES('$data[username]','$data[email]','$data[mobile]')";
        if($result){
            echo json_encode(array(array("status"=>"Success","creat"=>"Done Created new one")));
        }else{
            echo json_encode(array(array("status"=>"Error")));
        }
        break;
    case 'PUT':
        $path =  explode('/',$_SERVER["REQUEST_URI"]);
      
        $data = json_decode(file_get_contents('php://input'), true);
        $sql = "UPDATE users SET username = '$data[username]' , email = '$data[email]' , phone = '$data[phone]' WHERE id = $path[3]";
        if($result){
            echo json_encode(array(array("status"=>"Success","update"=>"Update user where id = $path[3]")));
        }else{
            echo json_encode(array(array("status"=>"Error" ,"update"=>"not Update user where id = ".$path[3])));
        }
        break;
    case 'DELETE':
        $path =  explode('/',$_SERVER["REQUEST_URI"]);
        
        $data = json_decode(file_get_contents('php://input'), true);
        $sql = "DELETE FROM users  WHERE id = $path[3]";
        if($result){
            echo json_encode(array(array("status"=>"Success","delete"=>"Deleted user where id = $path[3]")));
        }else{
            echo json_encode(array(array("status"=>"Error" ,"delete"=>"not deleted user where id = ".$path[3])));
        }
        break;
    default:
        # code...
        break;
}

$result = $con->query($sql);

if($method == "POST"){
    if($result){
        echo json_encode(array(array("status"=>"Success")));
    }else{
        echo json_encode(array(array("status"=>"Error")));
    }
}

// if($method == "GET"){
   
//     if($result){
//         while($row= $result->fetch_assoc()){
//             $data[] =$row;
//         }
//         echo json_encode($data);
//     }else{
//         echo json_encode(array(array("status"=>"Error")));
//     }
// }
