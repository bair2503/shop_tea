<?php

/**
 * Постановка:
 * Есть магазин и всего две сущности:
 *   1. клиент (имеет имя и фамилию);
 *   2. продукт (имеет название и цену);
 * Продавцу нужно собирать отчетность кто и что покупает,
 * на какие суммы и т.д.
 *
 * Задача:
 * Описать структуру БД для хранения всей необходимой информации
 * и написать следующие запросы:
 *   1. получение списка клиентов со списком названий заказанных ими продуктов;
 *   2. получение списка продуктов с общей стоимостью заказов по ним;
 *   3. поиск продукта, который заказал один из клиентов, по названию.
 *      (Как пример - можно найти "Покупал ли Петр Сидоров продукт,
 *       у которого в названии есть слово 'грушевый' ");
 *
 * Описать можно в любом удобном виде (использовать то что ниже не обязательно)
 */

class Client
{
    protected $table = 'id, name, last_name';
}

class Product
{
    protected $table = 'id, name_product, price';
}



function getClientList()
{
    return Null;
    ' select *  from 
    ';
}

function getProductList()
{
    return '
        select *
        from *
    ';
}

function getClientList($client, string $searchString)
{
    return '
        select *
        from *
        where *
    ';
}