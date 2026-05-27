@extends('layouts.app')
@section('content')
<section class="my-container">
    <article class="service-title-block">
        <h1>{{ $h1 }}</h1>
            <p>
                Мы предлагаем комплексные решения для бизнеса: создание сайтов от визитки до каталога, разработка чат-ботов в Telegram, настройка контекстной рекламы, сбор данных с сайтов (парсинг). Наш подход — это внимание к деталям, адаптация под задачи клиента и ориентация на результат.        
            </p>
    </article>    
</section>
<section class="my-container">
    <article class="service-content-block">        
        <div>
            <h2>Разработка сайтов</h2>
            <p>
                Создаём современные сайты на Laravel — от лаконичных лендингов до функциональных каталогов. Каждый проект адаптируем под задачи бизнеса, обеспечивая стабильную работу, удобство управления и готовность к SEO-продвижению.                                            
            </p>
            <div class="items-wrap">
                <a href="./uslugi/razrabotka-saitov/landing">Лендинг</a>
                <a href="./uslugi/razrabotka-saitov/vizitka">Визитка</a>
                <a href="./uslugi/razrabotka-saitov/catalog">Каталог</a>
            </div>
        </div>                                       
        <a href="./uslugi/razrabotka-saitov">
            <img src="./images/sites-360-240.png" alt="Разработка сайтов">
            <span>подробнее ...</span>
        </a>
    </article>
</section>
<section class="my-container">
    <article class="service-content-block">        
            <div>
                <h2>Разработка чат-ботов</h2>
                <p>                
                    Чат-боты — это простой способ автоматизировать коммуникации. Мы создаём ботов для Telegram, которые помогают продавать, консультировать, собирать данные и уведомлять о важных событиях. Они работают без выходных, не ошибаются и не устают. Решение под ключ — от идеи до запуска и сопровождения.                                               
                </p>
            </div>
            <a href="./uslugi/razrabotka-botov">
                <img src="./images/bots-360-240.png" alt="Разработка чат-ботов">
                <span>подробнее ...</span>
            </a>
    </article>
</section>
<section class="my-container">
    <article class="service-content-block">        
            <div>
                <h2>Контекстная реклама</h2>
                <p>                
                    Когда важно быстро выйти на аудиторию — контекстная реклама даёт нужный эффект. Мы профессионально работаем с Google Ads и Яндекс Директ, подбираем ключевые фразы, создаём привлекательные объявления и контролируем бюджет. Такая реклама даёт измеримый результат и работает сразу после запуска. Отличный выбор для тех, кто ценит скорость и эффективность.                                
                </p>
            </div>
            <a href="./uslugi/kontekstnaya-reklama">
                <img src="./images/context-360-240.png" alt="Контекстная реклама">
                <span>подробнее ...</span>
            </a>
    </article>
</section>
<section class="my-container">
    <article class="service-content-block">        
            <div>
                <h2>Парсинг данных</h2>
                <p>
                    Автоматизируем сбор информации с сайтов: от объявлений и цен до описаний товаров и контактных данных. Парсинг помогает экономить время, исключать ручной труд и всегда иметь актуальные данные. Мы разрабатываем парсеры под конкретные задачи и источники, учитывая особенности структуры сайтов. Результаты можно сохранять в Excel, базу данных или отправлять в Telegram.                               
                </p>
            </div>
            <a href="./uslugi/parsing">
                <img src="./images/parsing-360-240.png" alt="Парсинг">
                <span>подробнее ...</span>
            </a>
    </article>
</section>
@endsection
