<?php require __DIR__ . '/parts/connect.php';
header('Content-Type: application/json');
session_start();

$output = [
    'success' => false,
    'postData' => $_POST,
    'error' => '',
    // 'code' => 0,
    'msg' => '',

];


$account = $_POST['account'];
$password = $_POST['password'];

// $sql = "SELECT * FROM `member` WHERE `account``password`";
$sql = "SELECT * FROM `member` WHERE `account` = '$account' AND `password` = '$password'";
// $sql ="SELECT * FROM `member` WHERE 1";
// $all =$pdo->query($sql)->fetchAll();


$row = $pdo->query($sql)->fetch();




// echo json_encode($row,JSON_UNESCAPED_UNICODE);
var_dump($row);
$data_sid = $row['sid'] ? $row['sid'] : '';
$data_account = $row['account'] ? $row['account'] : '';
$data_password = $row['password'] ? $row['password'] : '';
$data_name = $row['name'] ? $row['name'] : '';
$data_email = $row['email'] ? $row['email'] : '';
$data_birthday = $row['birthday'] ? $row['birthday'] : '';
$data_mobile = $row['mobile'] ? $row['mobile'] : '';
$data_address = $row['address'] ? $row['address'] : '';
// var_dump($data_account);
// var_dump($data_password);
// var_dump($data_name);
// var_dump($data_email);
// var_dump($data_birthday);
// var_dump($data_mobile);
// var_dump($data_address);






// if(!empty($_POST['account']) and !empty($_POST['password']) ){
//     if($_POST['account'] == $row['account'] and $_POST['password'] == $row['password']){
//         $output['msg']='succes';
//         $output['success']=true;
//         echo json_encode($output);
//         echo $output['msg'];


//     }else {
//         $output['msg']='no complete';
//         echo json_encode($output);
//         echo $output['msg'];


//         }
// }


if (empty($account) and empty($password)) {
    echo 'no data';
} else {
    if ($data_sid) {
        $output['msg'] = 'success';
        $output['success'] = true;
        echo '成功';
        $_SESSION['sid'] = $data_sid;
        
        
    } else {

        echo '哭哭';
    }
};

// if ($data_sid) {
//     header('Location: ./member_edit.php');
// };
