<?php require __DIR__ . '/parts/connect.php';
$pageName = 'member_edit';
$title = '會員資料修改 - meow meow Donuts';


// $sql = "SELECT * FROM `member` WHERE 1";
// $member_sql = $pdo->query($sql)->fetchAll();
// if(isset($_SESSION['user'])){
//   foreach ($member_sql as $row =>$r){
//     if($r['account'] === $_SESSION['user']['account']){
//       $member_login = $r;
//       var_dump($member_login);
//     };
//   }
// }

$sid = isset($_GET['user']['sid']) ? intval($_GET['user']['sid']) : '';
// if(empty($sid)){
//     header('Location: login.php');
//     exit;
    
// 

$row =$pdo->query("SELECT * FROM `member` WHERE sid=$sid")->fetch();


?>
<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/html-navbar.php' ?>
<style>
  .row {
    display: flex;
    justify-content: center;
  }
</style>

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <form name="form1" class="form1"  onsubmit="adddata(); return false" novlaidate>
            <div class="mb-3">
              <label for="formGroupExampleInput" class="form-label">*帳號</label>
              <input type="text" class="form-control" id="account" name="account" placeholder="帳號" value="<?= $row['account'] ?>">
            </div>
            <div class="mb-3">
              <label for="formGroupExampleInput" class="form-label">*密碼</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="帳號">
            </div>
            <div class="mb-3">
              <label for="formGroupExampleInput" class="form-label">姓名</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="帳號">
            </div>
            <div class="mb-3">
              <label for="formGroupExampleInput" class="form-label">電子信箱</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="帳號">
            </div>
            <div class="mb-3">
              <label for="formGroupExampleInput" class="form-label">出生日期</label>
              <input type="date" class="form-control" id="birthday" name="birthday" placeholder="帳號">
            </div>
            <div class="mb-3">
              <label for="formGroupExampleInput" class="form-label">手機</label>
              <input type="text" class="form-control" id="mobile" name="mobile" placeholder="帳號">
            </div>
            <div class="mb-3">
              <label for="formGroupExampleInput" class="form-label">地址</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="帳號">
            </div>
            <button type="submit" class="btn btn-primary">送出</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include __DIR__ . '/parts/scripts.php' ?>
<script>
  // async function adddata() {
  //   console.log("123");
  //   const fd = new FormData(document.form1);
  //   console.log("0",fd);

  //   const r = await fetch('add_api.php', {
  //     method: 'POST',   
  //     body: fd,
  //   });
  //   console.log("1",r);
  //   const result = await r.json();
  //   console.log("2222",result);

  // };
</script>
<?php include __DIR__ . '/parts/html-footer.php' ?>