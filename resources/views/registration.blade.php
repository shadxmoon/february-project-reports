<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    <div class="auth-container">
            <div class="form-container" style="margin-bottom: -20px;">
                <h1 style="font-size: 48px; text-align: center; margin-left: -70px; margin-bottom: 15px; font-weight: 700; color: #051AFF;">НАРУШЕНИЙ<span style="color:red">.НЕТ<span></h1>
                <p style="font-size: 32px; color: #051AFF; text-align: center; margin-bottom: 24px;">Регистрация</p>
                <form action="">
                    <input type="text" name="login" placeholder="логин" class="form-input form-item">
                    <input type="text" name="password" placeholder="пароль" class="form-input form-item"> 
                    <input type="text" name="password" placeholder="фамилия" class="form-input form-item"> 
                    <input type="text" name="password" placeholder="имя" class="form-input form-item"> 
                    <input type="text" name="password" placeholder="отчество" class="form-input form-item"> 
                    <input type="text" name="password" placeholder="телефон" class="form-input form-item">
                    <input type="text" name="password" placeholder="адрес" class="form-input form-item">  
                    <button class="login-btn form-item" style="margin-top: -3px; font-size: 20px;">создать аккаунт</button>
                    <span style="text-align:center; margin-top: -20px; font-size: 18px;">У вас уже есть аккаунт? <a href="/" style="color: #051AFF;">Войти</a></span>
                </form>
            </div>                 
        </div>
</body>
</html>