<?php require __DIR__ . '/parts/connect.php';
header('Content-Type: application/json');
session_start();

$folder = __DIR__ . '/uploaded/';

// 用來篩選檔案, 用來決定副檔名
$extMap = [
    'image/jpeg' => '.jpg',
    'image/png' => '.png',
    'image/gif' => '.gif',
];

$output = [
    'success' => false,
    'filename' => '',
    'error' => '',
];


if (empty($extMap[$_FILES['avatar']['type']])) {
    $output['error'] = '檔案類型錯誤';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}
$ext = $extMap[$_FILES['avatar']['type']]; // 副檔名

$filename =$_FILES['avatar']['name'] . rand() . $ext;
$output['filename'] = $filename;

// 把上傳的檔案搬移到指定的位置
if (move_uploaded_file($_FILES['avatar']['tmp_name'], $folder . $filename)) {
    $output['success'] = true;
} else {
    $output['error'] = '無法搬動檔案';
};
$sid = isset($_SESSION['user']['sid']) ? intval($_SESSION['user']['sid']) : '';
// $sql = "UPDATE `member` SET `avatar` =?  WHERE `member`.`sid` =$sid";
$sql = "UPDATE `member` SET `avatar`=? WHERE `sid`=$sid";

// var_dump($sql);
// exit;

$stmt = $pdo->prepare($sql);
$stmt->execute([
    $filename,
]);


// echo json_encode($output);

if ($stmt->rowCount() == 1) {
    $output['msg'] ='pic success';
    
    $_SESSION['user']['pic']= $filename;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
 
}else{
    $output['msg'] = '頭貼無修改';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
};

