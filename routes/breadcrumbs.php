<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Главная', route('home'));
});
Breadcrumbs::for('portfolio', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Портфолио', route('portfolio'));
});
Breadcrumbs::for('about', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('О нас', route('about'));
});
Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Блог', route('blog'));
});
Breadcrumbs::for('services', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Услуги', route('services'));
});
Breadcrumbs::for('serviceCont', function (BreadcrumbTrail $trail) {
    $trail->parent('services');
    $trail->push('Контекстная реклама', route('serviceCont'));
});
Breadcrumbs::for('serviceBots', function (BreadcrumbTrail $trail) {
    $trail->parent('services');
    $trail->push('Разработка чат-ботов', route('serviceBots'));
});
Breadcrumbs::for('serviceParsing', function (BreadcrumbTrail $trail) {
    $trail->parent('services');
    $trail->push('Парсинг данных', route('serviceParsing'));
});
Breadcrumbs::for('serviceSites', function (BreadcrumbTrail $trail) {
    $trail->parent('services');
    $trail->push('Разработка сайтов', route('serviceSites'));
});
Breadcrumbs::for('serviceLanding', function (BreadcrumbTrail $trail) {
    $trail->parent('serviceSites');
    $trail->push('Лендинг', route('serviceLanding'));
});
Breadcrumbs::for('serviceCutaway', function (BreadcrumbTrail $trail) {
    $trail->parent('serviceSites');
    $trail->push('Сайт-визитка', route('serviceCutaway'));
});
Breadcrumbs::for('serviceCatalog', function (BreadcrumbTrail $trail) {
    $trail->parent('serviceSites');
    $trail->push('Сайт-каталог', route('serviceCatalog'));
});