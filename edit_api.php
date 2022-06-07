<?php require __DIR__ . '/parts/connect.php';
header('Content-Type: application/json');

$output = [
    'success' => false,
    'postData' => $_POST,
    'error' => '',
    'code' => 0,
    'msg' =>'',

];





$sid = isset($_POST['sid']) ? intval($_POST['sid']) : 0;

if (empty($sid) or empty($_POST['name'])) {
    $output['error'] = '沒有姓名資料';
    $output['code'] = 400;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}


$account = $_POST['account'];
$password = $_POST['password'];
$name = $_POST['name'];
$email = $_POST['email'] ?? '';
$birthday = empty($_POST['birthday']) ? NULL : $_POST['birthday'];
$mobile = $_POST['mobile'] ?? '';
$address = $_POST['address'] ?? '';

if (!empty($email) and filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $output['error'] = 'email 格式錯誤';
    $output['code'] = 405;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}



$sql = "UPDATE `member` SET `account`=?,`password`=?,`name`=?,`email`=?,`birthday`=?,`mobile`=?,`address`=? WHERE `sid`=$sid";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    $account,
    // password_hash($password, PASSWORD_BCRYPT),
    $password,
    $name,
    $email,
    $birthday,
    $mobile,
    $address,
]);



if ($stmt->rowCount() == 1) {
    $output['success'] = true;
    //最近一筆資料sid
    //用在訂單 order and order detail, order 主鍵為order detail外鍵
    //處理資料為$stmt 拿sid 為在$pdo拿
 
}else{
    $output['msg'] = '資料無修改';
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
