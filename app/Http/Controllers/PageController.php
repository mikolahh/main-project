<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $data;
    public function home()
    {
        $data = $this->data;
        $data['title'] = 'Создание сайтов, чат-ботов и парсинг данных — современный подход к web-разработке';
        $data['description'] = 'Разработка сайтов на Laravel, создание Telegram-ботов и парсинг сайтов. Адаптивный дизайн, надёжная архитектура и внимание к деталям — мы создаём решения, которые работают.';
        $data['h1'] = 'Веб-разработка с умом и вниманием к деталям';
        $data['location'] = ['city'=> 'Minsk'];
        return view('pages.home', $data);
    }

    public function draft()
    {
        $data = $this->data;
        $data['title'] = 'Тренируемся';
        $data['description'] = 'Страничка для тестов и тренировок';
        return view('pages.draft', $data); 
    }

    public function resPsw(string $token)
    {
        $data = $this->data;
        $data['title'] = 'Сброс пароля';
        $data['description'] = 'Введите новый пароль';
        $data['token'] = $token;
        return view('pages.auth.reset-password', $data); 
    }

    public function portfolio()
    {
        $data = $this->data;
        $data['title'] = 'Портфолио';
        $data['description'] = 'Наши реализованные проекты';
        return view('pages.portfolio', $data);        
    }    

    public function about()
    {
        $data = $this->data;
        $data['title'] = 'О компании';
        $data['description'] = 'Кто мы и чем занимаемся';
        return view('pages.about', $data); 
    }    
    public function services()
    {
        $data = $this->data;
        $data['title'] = 'Услуги веб-разработки: сайты, боты, продвижение и парсинг данных';
        $data['description'] = 'Полный спектр digital-услуг: от создания сайтов до SEO и парсинга. Используем Laravel и современные технологии. Работаем точно и в срок.';
        $data['h1'] = 'Комплексные услуги: сайты, чат-боты, реклама и автоматизация';
        return view('pages.services.index', $data);       
    }

    public function serviceSites()
    {
        $data = $this->data;
        $data['title'] = 'Разработка сайтов под ключ в Минске — лендинги, визитки, каталоги';
        $data['description'] = 'Создаем сайты под задачи бизнеса и частных проектов на laravel. Адаптивная верстка, индивидуальный дизайн, надежность и масштабирование.';
        $data['h1'] = 'Разработка сайтов';
        return view('pages.services.sites.index', $data);
    }

    public function serviceLanding()
    {
        $data = $this->data;
        $data['title'] = 'Разработка продающего landing page под ключ в Минске';
        $data['description'] = 'Создаем одностраничные сайты (лендинги) с высокой конверсией. Индивидуальный подход, фокус на целевую аудиторию, короткие сроки, приемлемая цена.';
        $data['h1'] = 'Разработка лендинга';
        return view('pages.services.sites.landing', $data);
    }

    public function serviceCutaway()
    {
        $data = $this->data;
        $data['title'] = 'Заказать сайт-визитку в Минске под ключ';
        $data['description'] = 'Создание простого адаптивного сайта-визитки на Laravel: идеальное решение для первого выхода в интернет.';
        $data['h1'] = 'Разработка сайта-визитки';
        return view('pages.services.sites.cutaway', $data);
    }

    public function serviceCatalog()
    {
        $data = $this->data;
        $data['title'] = 'Разработка сайта-каталога товаров и услуг под ключ в Минске';
        $data['description'] = 'Создаем современные сайты-каталоги: с удобной навигацией, фотогалереей, описаниями и контактной формой. Быстрый запуск, возможность масштабирования.';
        $data['h1'] = 'Разработка сайта-каталога';
        return view('pages.services.sites.catalog', $data);
    }

    public function serviceBots()
    {
        $data = $this->data;
        $data['title'] = 'Разработка чат-ботов на заказ в Минске';
        $data['description'] = 'Создаем Telegram-ботов для автоматизации бизнес-процессов: приём заявок, онлайн-запись, рассылки и другие сценарии. Настройка под конкретные цели и задачи.';
        $data['h1'] = 'Разработка Телеграм-ботов';
        return view('pages.services.bots.index', $data);
    }
    
    public function serviceParsing()
    {
        $data = $this->data;
        $data['title'] = 'Парсинг сайтов на заказ. Товары, цены, конкуренты.';
        $data['description'] = 'Разрабатываем индивидуальные парсеры (грабберы).Собираем структурированные данные: каталоги, объявления, отзывы, контакты.';
        $data['h1'] = 'Парсинг данных с сайтов — автоматизация сбора информации для бизнеса.';
        return view('pages.services.parsing.index', $data);
    }

    public function serviceCont()
    {
        $data = $this->data;
        $data['title'] = 'Заказать контекстную рекламу в Минске — настройка Google Ads и Яндекс Директ';
        $data['description'] = 'Настороим контекстную рекламу Google Ads и Яндекс Директ для вашего бизнеса под ключ. Подбор ключевых слов, минус-фраз, аналитика, быстрый старт.';
        $data['h1'] = 'Контекстная реклама';
        return view('pages.services.context.index', $data);
    }    
}
