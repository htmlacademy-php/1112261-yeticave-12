<?php
require_once('helpers.php');

$is_auth = rand(0, 1);
$user_name = 'Анатолий Егоров';
$categories = ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'];

$lots = [
    [
        'title' => '2014 Rossignol District Snowboard',
        'category' => 'Доски и лыжи',
        'price' => 10999,
        'image_url' => 'img/lot-1.jpg'
    ],
    [
        'title' => 'DC Ply Mens 2016/2017 Snowboard',
        'category' => 'Доски и лыжи',
        'price' => 	159999,
        'image_url' => 'img/lot-2.jpg'
    ],
    [
        'title' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'category' => 'Крепления',
        'price' => 8000,
        'image_url' => 'img/lot-3.jpg'
    ],
    [
        'title' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'category' => 'Ботинки',
        'price' => 10999,
        'image_url' => 'img/lot-4.jpg'
    ],
    [
        'title' => 'Куртка для сноуборда DC Mutiny Charocal',
        'category' => 'Одежда',
        'price' => 7500,
        'image_url' => 'img/lot-5.jpg'
    ],
    [
        'title' => 'Маска Oakley Canopy',
        'category' => 'Разное',
        'price' => 5400,
        'image_url' => 'img/lot-6.jpg'
    ]
];

function formatedPrice($price) {
    $formatedPrice = ceil($price);
    if ($price >= 1000) {
        $formatedPrice = number_format($formatedPrice, 0, '.', ' ');
    }
    return $formatedPrice . ' ₽';
};

$page_content = include_template('main.php', [
    'categories' => $categories,
    'lots' => $lots
    ]);

$layout_content = include_template('layout.php', [
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'content' => $page_content,
    'categories' => $categories,
    'title' => 'Главная'
]);

print($layout_content);
?>
