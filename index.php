<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 도메인네임주소 127.0.1 -->
    <link rel="stylesheet" href="http://<?=$_SERVER["HTTP_HOST"]?>/mypage0420/css/common.css?after5">
    <link rel="stylesheet" href="http://<?=$_SERVER["HTTP_HOST"]?>/mypage0420/css/main.css">
    <!-- jquery란 자바스크립트 라이브러리 -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="http://<?=$_SERVER["HTTP_HOST"]?>/mypage0420/js/common.js" defer></script>
    <title>AOMG Page</title>
</head>

<body>
    <!-- header ------------------------------------------------>
    <header>
        <!--DOCUMENT_ROOT는 절대주소를 의미한다.D:\apm\Apache 2.4.33\httpd-2.4.33-win64-VC14\Apache24\htdocs  -->
        <!-- include_once 중복되면 한번만 포함시킨다. -->
        <?php include_once $_SERVER['DOCUMENT_ROOT']."/mypage0420/header.php"; ?>
    </header>

    <!-- section ------------------------------------------------->
    <section>
        <?php include_once $_SERVER['DOCUMENT_ROOT']."/mypage0420/main.php"; ?>
    </section>
    <!-- footer ------------------------------------------------->
    <footer>
        <?php include_once $_SERVER['DOCUMENT_ROOT']."/mypage0420/footer.php"; ?>

    </footer>

</body>

</html>