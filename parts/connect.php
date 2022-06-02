<?php
//此為設定檔案 基本不會放在GIT裡面 因為不同環境會不同設定 會單獨放一個檔案
$db_host = 'localhost'; // 主機名稱
$db_user = 'sunny'; // 資料庫連線的用戶
$db_pass = 'sunny666'; // 連線用戶的密碼
$db_name = 'mid_proj';  // 資料庫名稱

// data source name,"資料庫類型 此串不能有空白

$dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8mb4";
//連結資料庫
$pdo = new PDO($dsn, $db_user, $db_pass);
//本身為關聯式陣列
$pdo_options = [
    //PDO 類型內建常數是使用TRY CATCH
    //指定錯誤模式 EXCEPTION
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    //取資料的方式-->關聯式陣列<資料表的拿出來的資料會變成陣列>
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    //MYSOL啟動時執行什麼樣子的編碼,連線資料進去與出來
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
];

try {
        $pdo = new PDO($dsn, $db_user, $db_pass, $pdo_options);
        
    } catch (PDOException $ex) {
        //TRY CATCH 設定,連結不到的時候除錯,PHP TRY CATCH可以設定很多CATCH
        echo $ex->getMessage();
    }