<?php require __DIR__ . '/parts/connect.php';
$pageName = 'loginmember';
$title = 'center - meow meow Donuts';
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
                    <form name="form1" class="form1" onsubmit="adddata(); return false" novlaidate>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">*帳號</label>
                            <input type="text" class="form-control" id="account" name="account" placeholder="帳號">
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

                        <button type="submit" class="btn btn-primary">
                            <a href="member_edit.php?sid=<?= $_SESSION['sid'] ?>">
                                我要修改會員
                            </a>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/parts/html-footer.php' ?>