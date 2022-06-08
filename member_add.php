<?php require __DIR__ . '/parts/connect.php';
$pageName = 'addmember';
$title = '會員註冊 - meow meow Donuts';
?>
<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/html-navbar.php' ?>
<style>
  body{
    background-color: #E8E7E5;
  }
  .row {
    display: flex;
    justify-content: center;
  }
  .red{
    color: red;
  }
  h3{
    text-align: center;
  }
  .card{
    border: none;
    background-color:#E8E7E5;
  }

  .form-control{
    background-color: #D9D9D9;
    
  }
  .btn{
    border-radius:1.5rem;
    padding: .5rem 1.5rem;
    background-color: #616153;
    border: none;
    color: white;
   
  }
</style>

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h3>會員註冊</h3>
          <form name="form1" class="form1"  onsubmit="adddata(); return false" novlaidate>
             
            <div class="mb-3">
              <label for="formGroupExampleInput" class="form-label">*帳號</label>
              <input type="text" class="form-control" id="account" name="account" placeholder="帳號">
            </div>
            <div class="mb-3" autocomplete="off">
              <label for="formGroupExampleInput" class="form-label" autocomplete="off">*密碼</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="密碼" autocomplete="off">
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
            <div name="red" class="red"></div>
            <button type="submit" class="btn btn-primary">送出</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include __DIR__ . '/parts/scripts.php' ?>
<script>

  const error_f =document.querySelector(".red");
  async function adddata() {
    console.log("123");
    const fd = new FormData(document.form1);
    console.log("0",fd);

    const r = await fetch('add_api.php', {
      method: 'POST',   
      body: fd,
    });
    console.log("1",r);
    const result = await r.json();
    console.log("2222",result);

    if (result.success) {
            error_f.classList.add('red');
            error_f.innerText = '新增成功';
            location.href = 'login.php';

        } else {
            error_f.classList.add('red');
            error_f.innerText = '請填入帳號密碼';
        };

  };
</script>
<?php include __DIR__ . '/parts/html-footer.php' ?>