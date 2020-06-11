<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lv2課題</title>
    <style>
        body {
            position: fixed;
            margin-top: 0;
            height: 100%;
            width: 100%;
        }
        .logo {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 30%;
            z-index: -10;
        }
        .wrapper {
            margin: 0 auto;
            padding: 0 140px;
            width: 500px;
            box-sizing: border-box;
        }
        .title {
            text-align: center;
        }
        .row {
            font-size: 14px;
            text-align: right;
        }
        .row:last-child {
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <img class="logo" src="https://res.cloudinary.com/gizumo-inc/image/upload/v1583407487/curriculums/Laravel%20Lesson/extra/extra_work_bg.png" alt="">
        <h2 class="title">Lv2</h2>
        <form action="http://127.0.0.1:8000/gizumo_lv2" method="POST" >
        @csrf
            <input type="hidden" name="id" value="1">
            <input type="hidden" name="status" value="ok">
            <div class="row">
                <span>名前：</span>
                <input class="input_area name" type="text" name="name" placeholder="名前">
            </div>
            <div class="row">
                <span>パスワード：</span>
                <input class="input_area password" type="password" name="password" placeholder="パスワード">
            </div>
            <div class="row">
                <input class="input_area" type="submit">
            </div>
        </form>
    </div>
</body>
</html>