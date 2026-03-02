<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex items-center justify-center mt-60 bg-main-300">
    <div class="auth-container">
        <div class="form-container">
            <h1 style="font-size: 48px; text-align: center; margin-left: -70px; margin-bottom: 15px; font-weight: 700; color: #051AFF;">НАРУШЕНИЙ<span style="color:red">.НЕТ<span></h1>
            <form method="POST" action="{{route('report.store')}}">
                @csrf
                <input type="text" name="number" placeholder="номер авто" class="form-input form-item">
                <textarea class="form-input form-item" name="description" placeholder="описание"></textarea>
                <button class="login-btn form-item" style="margin-top: -3px; font-size: 20px;">создать</button>
            </form>
        </div>
    </div>
</body>
</html>