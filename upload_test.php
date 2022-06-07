// //圖片上傳後儲存位置
// $folder = __DIR__ . '/uploaded/';
// //$_files 上傳後會存入暫存,php完成後會被刪除,故先移動檔案至指定位置
// move_uploaded_file($_FILES['myfile']['tmp_name'], $folder . $_FILES['myfile']['name']);

// echo json_encode($_FILES);

// 單一檔案
// $_FILES['myfile']
/*

    "myfile": {
        "name": "v_149255855_m_601_m1_220_124.jpg",
        "type": "image/jpeg",
        "tmp_name": "C:\\xampp\\tmp\\phpFB9.tmp",
        "error": 0,
        "size": 5576
    }