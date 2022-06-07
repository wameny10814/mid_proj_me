<?php require __DIR__ . '/parts/connect.php';
$pageName = 'member_edit';
$title = '會員資料修改 - meow meow Donuts';
//session 存取跟讀取都要開start,session可以跨頁面讀取
//session 用無痕跟不同的瀏覽器會被視為不同用戶
session_start();
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

// var_dump ($_SESSION['user']);


$sid = isset($_SESSION['user']['sid']) ? intval($_SESSION['user']['sid']) : '';
// var_dump($sid);
// if(empty($sid)){
//     header('Location: login.php');
//     exit;

// 


$row = $pdo->query("SELECT * FROM `member` WHERE sid=$sid")->fetch();

$filename  = isset($_SESSION['user']['pic']) ? ($_SESSION['user']['pic']) : '';


?>
<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/html-navbar.php' ?>
<style>
    .row {
        display: flex;
        justify-content: center;
    }

    .red {
        color: red;
    }
  
</style>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form name="mypic" class="pic" action="uploadedpic.api.php" method="post" enctype="multipart/form-data" style="display: none">
                        <input class="img" type="file" name="avatar" accept="image/*" value="" >
                    </form>
                    <div class="pic_view" style="width: 100%;"><img style="width: 100%;" id="myimg" src="./uploaded/<?= $filename  ?> " alt="" /></div>
                    
                    <button id="btn" class="btn btn-primary" onclick="uploadAvatar()">上傳大頭貼</button>
                    <form name="form1" class="form1" onsubmit="adddata(); return false" novlaidate>
                        <input type="hidden" name="sid" value="<?= $row['sid'] ?>">

                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">*帳號</label>
                            <input type="text" class="form-control" id="account" name="account" placeholder="帳號" value="<?= $row['account'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">*密碼</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="帳號" value="<?= $row['password'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">姓名</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="帳號" value="<?= $row['name'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">電子信箱</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="帳號" value="<?= $row['email'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">出生日期</label>
                            <input type="date" class="form-control" id="birthday" name="birthday" placeholder="帳號" value="<?= $row['birthday'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">手機</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="帳號" value="<?= $row['mobile'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">地址</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="帳號" value="<?= $row['address'] ?>">
                        </div>
                        <div name="red" class="red"></div>
                        <button type="submit" class="btn btn-primary">修改資料</button>
                        <div><a href="delete.php?sid=<?= $_SESSION['user']['sid'] ?>">帳戶刪除</a></div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . '/parts/scripts.php' ?>
<script>
    const btn = document.querySelector("#btn");
    const myimg = document.querySelector("#myimg");
    const avatar = document.mypic.avatar;
    // const img = document.querySelector(".img");

    avatar.addEventListener("change", async function() {
        // 上傳表單
        const fd = new FormData(document.mypic);
        const r = await fetch("uploadedpic.api.php", {
            method: "POST",
            body: fd,
        });
        const obj = await r.json();
        console.log(obj);
        myimg.src = "./uploaded/" + obj.filename;
        // const objfilename = obj.filename;
        // objfilename = img;


    });

    function uploadAvatar() {
        avatar.click(); // 模擬點擊
    };


    const error_f = document.querySelector(".red");

    async function adddata() {
        console.log("123");
        const fd = new FormData(document.form1);
        console.log("0", fd);

        const r = await fetch('edit_api.php', {
            method: 'POST',
            body: fd,
        });
        console.log("1", r);
        const result = await r.json();
        console.log("2222", result);

        if (result.success) {
            error_f.classList.add('red');
            error_f.innerText = '資料修改成功';

        } else {
            error_f.classList.add('red');
            error_f.innerText = result.error || '資料沒有修改';
        };

    };
</script>
<?php include __DIR__ . '/parts/html-footer.php' ?>