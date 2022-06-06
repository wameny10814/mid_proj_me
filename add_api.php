<?php require __DIR__ . '/parts/connect.php';
header('Content-Type: application/json');

$output = [
    'success' => false,
    'postData' => $_POST,
    'error' => '',
    'code' =>0,
    
];

$account = $_POST['account'];
$password = $_POST['password'] ;
$name = $_POST['name'] ;
$email = $_POST['email'] ?? '';
$birthday = empty($_POST['birthday']) ? NULL : $_POST['birthday'];
$mobile = $_POST['mobile'] ?? '';
$address = $_POST['address'] ?? '';



$sql = "INSERT INTO `member`(`account`, `password`, `name`, `email`, `birthday`, `mobile`, `address`, `creat_at`) VALUES (?,?,?,?,?,?,?,NOW())";

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
    $output['lastInsertId'] = $pdo->lastInsertId();
    // header("Location: member_edit.php");
    }; 
    
echo json_encode($output, JSON_UNESCAPED_UNICODE);





