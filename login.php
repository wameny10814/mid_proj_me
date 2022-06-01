<?php 
session_start();

$users =[

];

$output =[
    'error'=>'',
];
if(!empty($_POST['account']) and !empty($_POST['password']) ){
    $output['msg']='登入成功';
    echo json_encode($output);
    exit;
    

}else {
    $output['msg']='請輸入完整資料';
    echo json_encode($output);
    exit;
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員登入</title>
</head>
<body>
    <form method="POST" >
        <div class="container">
            <div>會員登入</div>
            <input type="text" name="name">
            <br>
            <input type="password" name="password">
            <br>
            <button>登入</button>
        </div>
    </form>
</body>
</html>