<?php
session_start();

if(isset($_POST['number'])) {
    if(!isset($_SESSION['answer'])) {
        $_SESSION['answer'] = rand(1, 20);
        $_SESSION['remaining'] = 10;
        $_SESSION['gameOver'] = false;
    }


    if(!empty($_POST['newGame'])){
        session_unset();
        header('Location: /index.php');
        exit();
    }
        if (!empty($_SESSION['gameOver']) && $_SESSION['gameOver'] === true) {
            $_SESSION['hint'] = "Игра окончена! Загаданное число: " . $_SESSION['answer'] . " Начать новую игру?";
        }
        else {

        $user_answer = $_POST['number'];
        if(empty($user_answer) || $user_answer > 20 || $user_answer < 1){
            $_SESSION['hint'] = "Введите число от 1 до 20";
            $_SESSION['remaining'] ++;
        }
        else if ($user_answer > $_SESSION['answer']){
            $_SESSION['hint'] = "Загаданное число меньше";
        }
        else if  ($user_answer < $_SESSION['answer']){
            $_SESSION['hint'] = "Загаданное число больше";
        }

        else {
            $_SESSION['hint'] = "Вы угадали!, загаданное число: " . $_SESSION['answer'];
            $_SESSION['gameOver'] = true;
        }


        if($_SESSION['remaining'] === 1) {
            $_SESSION['gameOver'] = true;
            $_SESSION['hint'] = "попытки закончились, загаданное число: " . $_SESSION['answer'];
        }

        $_SESSION['remaining'] --;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Задача</title>
    <link rel="stylesheet" href="https://happyhaha.github.io/css/dist/style.min.css">
</head>
<body>

    <div class="pb-5 px-10">
        <div class="mt-12 ml-12 flex">
            <form method="post" class="w-[60%]">
                <h1 class="max-w-2xl mb-4 text-3xl font-extrabold tracking-tight leading-none md:text-5xl dark:text-white">Игра «Угадай число»</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Компьютер загадал число от 0 до 20. Введите то число которое по вашему мнению он загадал. У вас есть 10 попыток.</p>
                <div class="w-[350px]">
                    <div class="mx-auto p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                        Осталось попыток: <?php if(isset($_SESSION['remaining'])) { echo $_SESSION['remaining']; } else {echo 10; } ?>
                    </div>
                </div>
                <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Введите число</label>
                <input name="number" type="number" id="large-input" class="block p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <button type="submit" class="mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Проверить</button>
                <button name="newGame" value=1 type="submit" class="mt-2 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Новая игра</button>
            </form>
    
            
    
            <div class="w-[30%] pt-5">
                <h1 class="max-w-2xl mb-4 text-xl font-bold tracking-tight leading-none dark:text-white">Ответ</h1>
                
                <div class="mx-auto p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                    <?php if(isset($_SESSION['hint'])) {echo $_SESSION['hint']; }  ?>
                </div>

    
            </div>
        </div>
    </div>
  

    
    

    <script src="https://happyhaha.github.io/css/dist/flowbite.min.js"></script>
</body>
</html>
