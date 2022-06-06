<?php require __DIR__ . '/parts/connect.php';
$pageName = 'loginmember';
$title = '會員登入 - meow meow Donuts';
?>
<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/html-navbar.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員登入</title>
</head>
<style>
    .red {
        color: red;
    }
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form name="form1" class="form1" onsubmit="sendData();return false;" novalidate>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">*帳號</label>
                                <input type="text" class="form-control" id="account" name="account" placeholder="帳號">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">*密碼</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="帳號">
                            </div>
                            <div name="red" class="red"></div>
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
    const error_f = document.querySelector(".red");
    // const account_f = document.memberform.account.value;
    // const password_f = document.memberform.password.value;

    // if (account_f === '' ) {
    //     error_f.classList.add('red');
    //     error_f.innerText = '請填入帳號密碼';
    // };



    async function sendData() {
        console.log("123");
        const fd = new FormData(document.form1);
       

        const r = await fetch('login_api2.php', {
            method: 'POST',
            body: fd,
        });
       

        const result = await r.json();
        console.log("2", result);
        
        if (result.success) {
            location.href = 'member_edit.php';

        } else {
            error_f.classList.add('red');
            error_f.innerText = '請填入帳號密碼';
        };
    };
</script>
<?php include __DIR__ . '/parts/html-footer.php' ?>