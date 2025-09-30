<?php 
$images = [
    "https://static.insales-cdn.com/files/1/1158/25838726/original/8_ae6b6513214f1992ed752af830e37479.jpg",
    "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ9BcLF8OWCjFm7eg8_DeKu6RbsMFf1LVl2Nw&s",
    "https://turclub-pik.ru/crop/1160/464/uploads/blog_img/covers/a215353424ef752983b11561614fcf2a.jpeg.webp",
    "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-6_Wx6lX1p3r26ziDNv3Pb0cB-x7ouyFLkA&s"
];
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
    <h1 class="text-5xl font-extrabold text-center mt-5 mb-5 dark:text-white">Фотогалерея</h1>
    <div class="flex justify-self-auto flex-wrap pb-10 px-10 mx-auto w-[800px]">
        <div id="gallery" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                <?php foreach($images as $image): ?>
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="<?= $image ?>" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
                </div>
                <?php endforeach; ?>
            </div>
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Назад</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Вперед</span>
                </span>
            </button>
        </div>
    </div>

    

    <script src="https://happyhaha.github.io/css/dist/flowbite.min.js"></script>
</body>
</html>