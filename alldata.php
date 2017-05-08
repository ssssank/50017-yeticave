<?php
//Массив категорий товаров
$categories = ["Доски и лыжи", "Крепления", "Ботинки", "Одежда", "Инструменты", "Разное"];

//Массив объявлений
$lots = [
    [
        'lot-name' => '2014 Rossignol District Snowboard',
        'category' => 'Доски и лыжи',
        'message' => '',
        'lot-rate' => '10999',
        'lot-step' => '',
        'lot-img' => 'img/lot-1.jpg',
        'lot-date' => '',
    ],
    [
        'lot-name' => 'DC Ply Mens 2016/2017 Snowboard',
        'category' => 'Доски и лыжи',
        'message' => '',
        'lot-rate' => '159999',
        'lot-step' => '',
        'lot-img' => 'img/lot-2.jpg',
        'lot-date' => '',
    ],
    [
        'lot-name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'category' => 'Крепления',
        'message' => '',
        'lot-rate' => '8000',
        'lot-step' => '',
        'lot-img' => 'img/lot-3.jpg',
        'lot-date' => '',
    ],
    [
        'lot-name' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'category' => 'Ботинки',
        'message' => '',
        'lot-rate' => '10999',
        'lot-step' => '',
        'lot-img' => 'img/lot-4.jpg',
        'lot-date' => '',
    ],
    [
        'lot-name' => 'Куртка для сноуборда DC Mutiny Charocal',
        'category' => 'Одежда',
        'message' => '',
        'lot-rate' => '7500',
        'lot-step' => '',
        'lot-img' => 'img/lot-5.jpg',
        'lot-date' => '',
    ],
    [
        'lot-name' => 'Маска Oakley Canopy',
        'category' => 'Разное',
        'message' => '',
        'lot-rate' => '5400',
        'lot-step' => '',
        'lot-img' => 'img/lot-6.jpg',
        'lot-date' => '',
    ],
];

// ставки пользователей, которыми надо заполнить таблицу
$bets = [
    ['name' => 'Иван', 'price' => 11500, 'ts' => strtotime('-' . rand(1, 50) .' minute')],
    ['name' => 'Константин', 'price' => 11000, 'ts' => strtotime('-' . rand(1, 18) .' hour')],
    ['name' => 'Евгений', 'price' => 10500, 'ts' => strtotime('-' . rand(25, 50) .' hour')],
    ['name' => 'Семён', 'price' => 10000, 'ts' => strtotime('last week')]
];