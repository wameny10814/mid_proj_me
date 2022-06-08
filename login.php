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

    body {
        background-color: #E8E7E5;
    }

    .row {
        display: flex;
        justify-content: center;
    }

    .card {
        border: none;
        background-color: #E8E7E5;
    }

    .form-control {
        background-color: #D9D9D9;

    }

    .btn {
        border-radius: 1.5rem;
        padding: .5rem 1.5rem;
        background-color: #616153;
        border: none;
        color: white;

    }

    .btn:hover {
        background-color: #F06D6D;
    }

    .add_msg {
        text-align: center;
        margin-bottom: 3rem;
        margin-top: 3rem;
    }

    .add_msg a {
        text-decoration: none;
        color: #D01F1F;

    }

    .sumit_btn{
        display: flex;
        justify-content: center;
        align-items: center;
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
                            <div class="add_msg">
                                <p>第一次光臨嗎?
                                    <a href="./member_add.php">點此註冊</a>
                                </p>
                            </div>
                            <div class="sumit_btn">
                                <button type="submit" class="btn btn-primary">登入</button>
                            </div>

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
    // const account_f = document.memberform.account;
    // const password_f = document.memberform.password;
    //此種取欄位方式只適用於input and button標籤

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