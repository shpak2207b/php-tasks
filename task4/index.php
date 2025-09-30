<?php
    $goods = [
        [
            "name" => "Poco x6 pro grey",
            "rate" => 4.1,
            "price" => 400,
            "image" => 'images/poco.jpg',
            "available" => true
        ],
        [
            "name" => "Samsung Galaxy S24 ultra Violet",
            "rate" => 4.5,
            "price" => 750,
            "image" => 'images/samsung.jpg',
            "available" => false

        ],
        [
            "name" => "Iphone 15 Pro Max white",
            "rate" => 4.0,
            "price" => 1000,
            "image" => 'images/iphone.webp',
            "available" => true
        ],
        [
            "name" => "Vivo X200 pro blue",
            "rate" => 5.0,
            "price" => 500,
            "image" => 'images/vivo.jpg',
            "available" => false
        ],
        [
            "name" => "Redmi note 13 pro Green",
            "rate" => 3.5,
            "price" => 300,
            "image" => 'images/redmi.jpg',
            "available" => true
        ]
        ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список товаров</title>
    <link rel="stylesheet" href="https://happyhaha.github.io/css/dist/style.min.css">
</head>
<body>
    

    
    <h1 class="text-5xl font-extrabold ml-36 mt-5 mb-5 dark:text-white">Наши товары</h1>

    <div class="flex justify-center flex-wrap pb-10">
        <?php foreach($goods as $item): ?>

        <div class="<?php if($item['available'] === false) echo "opacity-50 "; ?>w-full max-w-sm m-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <img class="p-8 rounded-t-lg" src="<?= $item['image'] ?>" alt="product 1image" />
            </a>
            <div class="px-5 pb-5">
                <a href="#">
                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?= $item['name'] ?></h5>
                </a>
                <div class="flex items-center mt-2.5 mb-5">
                    <div class="flex items-center space-x-1 rtl:space-x-reverse">
                        <div class='star-rating' data-rating='<?= $item['rate'] ?>'></div>
                    </div>
                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3"><?= $item['rate'] ?></span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-3xl font-bold text-gray-900 dark:text-white"><?= $item['price']?>$</span>
                    <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">В корзину</a>
                </div>
            </div>
        </div>

        <?php endforeach; ?>
    </div>
    
    

    <script src="https://happyhaha.github.io/css/dist/flowbite.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        const fullStar = '<svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20"><path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/></svg>';
        
        const emptyStar = '<svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20"><path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/></svg>';

        function renderStarRating(rating) {
            let stars = '';
            for (let i = 1; i <= 5; i++) {
                stars += i <= rating ? fullStar : emptyStar;
            }
            return `<div class="flex items-center space-x-1 rtl:space-x-reverse">${stars}</div>`;
        }

        const ratingElements = document.querySelectorAll('.star-rating');
        ratingElements.forEach(element => {
            const rating = parseFloat(element.getAttribute('data-rating') || 0);
            element.innerHTML = renderStarRating(rating);
        });
    });
    </script>
</body>
</html>