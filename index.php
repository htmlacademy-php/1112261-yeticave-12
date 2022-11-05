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
        'image_url' => 'img/lot-1.jpg',
        'close_time' => '2022-11-30'
    ],
    [
        'title' => 'DC Ply Mens 2016/2017 Snowboard',
        'category' => 'Доски и лыжи',
        'price' => 	159999,
        'image_url' => 'img/lot-2.jpg',
        'close_time' => '2022-11-29'
    ],
    [
        'title' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'category' => 'Крепления',
        'price' => 8000,
        'image_url' => 'img/lot-3.jpg',
        'close_time' => '2022-11-28'
    ],
    [
        'title' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'category' => 'Ботинки',
        'price' => 10999,
        'image_url' => 'img/lot-4.jpg',
        'close_time' => '2022-11-27'
    ],
    [
        'title' => 'Куртка для сноуборда DC Mutiny Charocal',
        'category' => 'Одежда',
        'price' => 7500,
        'image_url' => 'img/lot-5.jpg',
        'close_time' => '2022-11-26'
    ],
    [
        'title' => 'Маска Oakley Canopy',
        'category' => 'Разное',
        'price' => 5400,
        'image_url' => 'img/lot-6.jpg',
        'close_time' => '2022-11-25'
    ]
];

function formatedPrice($price) {
    $formatedPrice = ceil($price);
    if ($price >= 1000) {
        $formatedPrice = number_format($formatedPrice, 0, '.', ' ');
    }
    return $formatedPrice . ' ₽';
};

function calculateTimeToClose($time) {
    $arr = [];
    $cur_date = strtotime('now');
    $future_date = strtotime($time);
    $hours = floor(($future_date - $cur_date) / 3600);
    $hours = str_pad($hours, 2, "0", STR_PAD_LEFT);
    $arr[] = $hours;
    $minutes = floor((($future_date - $cur_date) % 3600) / 60);
    $minutes = str_pad($minutes, 2, "0", STR_PAD_LEFT);
    $arr[] = $minutes;
    return $arr;
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
