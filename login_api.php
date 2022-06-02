<?php require __DIR__ . '/parts/connect.php';
header('Content-Type: application/json');

$output = [
    'success' => false,
    'postData' => $_POST,
    'error' => '',
    'code' =>0,
    'msg' =>'',
    
];


$account = $_POST['account'];
$password = $_POST['password'];

// $sql = "SELECT * FROM `member` WHERE `account``password`";
$sql ="SELECT * FROM `member` WHERE `account` = '$account' AND `password` = '$password'";
// $sql ="SELECT * FROM `member` WHERE 1";
// $all =$pdo->query($sql)->fetchAll();


$row = $pdo->query($sql)->fetch();
echo json_encode($row,JSON_UNESCAPED_UNICODE);
// echo $row;

if(!empty($_POST['account']) and !empty($_POST['password']) ){
    if($_POST['account'] === $row['account'] and $_POST['password'] === $row['password']){
        $output['msg']='succes';
        $output['success']=true;
        echo json_encode($output);
        echo $output['msg'];
    

    }else {
        $output['msg']='no complete';
        echo json_encode($output);
        echo $output['msg'];
    

        }
}

