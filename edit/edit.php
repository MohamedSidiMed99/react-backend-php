<?php

// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Headers: *");
// error_reporting(0);
// include("../connect.php");

// echo "hello";
// $method = $_SERVER["REQUEST_METHOD"];
// switch ($method) {
//     case 'GET':
      
//         $path =  explode('/',$_SERVER["REQUEST_URI"]);
//         print_r($path);
//         echo $path;
       
//             $sql = "SELECT * FROM users WHERE id =$path[3]"; 
//             $result = $con->query($sql);
//             if($result){
//                 while($row= $result->fetch_assoc()){
//                     $data[] =$row;
//                 }
//                 echo json_encode($data);
//             }else{
//                 echo json_encode(array(array("status"=>"Error")));
//             }

    
//         break;
//     case 'POST':
//         $data = json_decode(file_get_contents('php://input'), true);
//         $sql = "INSERT INTO users (username,email,phone)VALUES('$data[username]','$data[email]','$data[mobile]')";
//         break;
    
//     default:
//         # code...
//         break;
// }
// $result = $con->query($sql);

// if($method == "POST"){
//     if($result){
//         echo json_encode(array(array("status"=>"Success")));
//     }else{
//         echo json_encode(array(array("status"=>"Error")));
//     }
// }

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