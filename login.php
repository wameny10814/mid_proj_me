<?php require __DIR__ . '/parts/connect.php';
$pageName = 'loginmember';
$title = '會員登入 - meow meow Donuts';
?>
<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/html-navbar.php' ?>
<!-- session_start(); -->

<!-- $users =[

];

$output =[
    'error'=>'',
];
if(!empty($_POST['account']) and !empty($_POST['password']) ){
    if($_POST['account'] === $_POST['account'] and $_POST['password'] === $_POST['password']){
        $output['msg']='登入成功';
        echo json_encode($output);
        exit;

    }
   
    

}else {
    $output['msg']='請輸入完整資料';
    echo json_encode($output);
    exit;
}



?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員登入</title>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <form name="memberform" class="form1"  onsubmit="memberdata(); return false" novlaidate>
            <div class="mb-3">
              <label for="formGroupExampleInput" class="form-label">*帳號</label>
              <input type="text" class="form-control" id="account" name="account" placeholder="帳號">
            </div>
            <div class="mb-3">
              <label for="formGroupExampleInput" class="form-label">*密碼</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="帳號">
            </div>

            <button type="submit" class="btn btn-primary">送出</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>

<?php include __DIR__ . '/parts/scripts.php' ?>
<script>
      async function memberdata() {
    console.log("123");
    const fd = new FormData(document.memberform);
    console.log("0",fd);

    const r = await fetch('login_api.php', {
      method: 'POST',   
      body: fd,
    });
    console.log("1",r);
    const result = await r.json();
    console.log("2222",result);
  };

</script>
<?php include __DIR__ . '/parts/html-footer.php' ?>