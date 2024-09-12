<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">

    <title>Upload Videos</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>

    <?php
    include("config.php");
    $subject = '';
    $title = '';
    if (isset($_POST['subject'])) {
        $subject = $_POST['subject'];
    }
    if (isset($_POST['title'])) {
        $title = $_POST['title'];
    }



    if (isset($_POST['but_upload'])) {

        $max_size = 5242880;
        $file_name = $_FILES['file']['name'];
        $folder = "videos/";
        $file_path = $folder . $_FILES['file']['name'];
        $file_ext = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
        $ext_arr = array("mp4", "avi", "3gp", "mpeg");

        if (in_array($file_ext, $ext_arr)) {
            if ($_FILES['file']['size'] >= $max_size || ($_FILES['file']['size'] == 0)) {
                echo "<center><h3 class='failed'>حجم الملف يجب ان يكون اقل من 5 ميجابايت</h3></center>";
            } else {
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $file_path)) {
                    $query = "INSERT INTO viedeos (name,location,subject,title) VALUES('" . $file_name . "','" . $file_path . "','$subject','$title')";
                    mysqli_query($conn, $query);
                echo "<center><h3 class='success'>تم رفع الفيديو بنجاح</h3></center>";

                }
            }
        } else {
            echo "<center><h3 class='choose'>برجاء اختيار الفيديو</h3></center>";
        }
    }
    ?>



    <div class="container">
        <center>
            <img src="images/islamic_muslim_islam_quran_book_holy_icon_258696.webp">
        </center>
        <div class="form">
            <form method="POST" enctype="multipart/form-data">
                <input type="file" name="file">
                <br>
                <input type="text" name="subject" id="subject" placeholder="اكتب عنوان الفيديو ">
                <br>
                <input type="text" name="title" id="title" placeholder="وصف عن الفيديو ">
                <br>
                <input type="submit" value="رفع الفيديو" name="but_upload">
                <br>
                <a href="http://localhost/phpprojects/quranapp/readviedeos.php" class="linko">الرجوع الى التطبيق</a>
            </form>
        </div>
    </div>
</body>

</html>