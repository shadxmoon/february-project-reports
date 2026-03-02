<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-main-800">
    <a href="/reports">
    <header class="reports-header bg-main-900">
        <h1 class="font-bold text-main-100 cursor-pointer" style="font-size: 48px;">нарушений<span class="text-accent">.net<span></h1>
        <h3 style="font-size: 18px;" class="font-bold">носова ольга бедросовна</h3>
    </header>        
    </a>
    <main class="flex items-center justify-center mt-30 flex-col">
        <h1 class="text-main-100 text-center text-4xl mb-2.5">Регистрация</h1>
        <div class="bg-main-300 px-4 py-3 rounded-2xl size-1/5">
            <div class="flex flex-col gap-1.5">    
                <form action="">
                    <input type="text" name="login" placeholder="логин" class="form-input">
                    <input type="text" name="password" placeholder="пароль" class="form-input"> 
                    <input type="text" name="lastname" placeholder="фамилия" class="form-input"> 
                    <input type="text" name="firstname" placeholder="имя" class="form-input"> 
                    <input type="text" name="middlename" placeholder="отчество" class="form-input"> 
                    <input type="text" name="phone" placeholder="телефон" class="form-input">
                    <input type="text" name="address" placeholder="адрес" class="form-input">  
                    <button class="bg-accent text-main-900 px-2 py-2 rounded-xl text-xl">создать аккаунт</button>
                    <span class="text-center">У вас уже есть аккаунт? <a href="/" class="text-accent">Войти</a></span>
                </form>
            </div>                 
        </div>        
    </main>
</body>
</html>