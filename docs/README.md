# simple-web-engine

Мои сохраненные ссылки: http://telegra.ph/Napisanie-sobstvennoj-CMS-03-14

## Алгоритм

1. Пользователь совершает GET запрос на адрес веб-сервера
2. Модуля ModRewrite (веб. сервера Apache) переадресует запрос на `page.php?link=<ТЕЛО ЗАПРОСА>`
3. Ядро движка `page.php` обрабатывает запрос пользователя на просмотр страницы
4. Если по запросу найдена 1 страница, проверяются права пользователя на её просмотр
5. Если прав хватает, подгружается шаблон для её отображения

## Функции

1. Подмена адреса (с помощью модуля веб. сервера Apache - ModRewrite).
2. Выдача пользователю тех страниц, на которые у него есть доступ.
3. Редактирование и создание страниц.

## Структура

### blank-*

модули вызываемые самостоятельно, либо через шаблон `template_blank.php`

- `blank-phpinfo.php` - выводит результат функции `phpinfo()`
- `blank-page-api.php` - API построенное на AJAX для редактирования страниц
- `blank-user-api.php` - API построенное на AJAX для работы с пользователями

### block-*

модули встраиваемые в шаблон сайта в `<header>`, `<main>` или `<footer>`, встраивается между другими такими блоками в любом порядке

- `block-promo.php` - блок с бендером
- `block-quickmenu.php` - три кнопки (быстрый доступ)
- `block-sitemap.php` - используется в editor для отображения структуры сайта второго уровня
- `block-yandexmap.php` - используется в contacts
- `block-editor.ideas.php`
- `block-editor.php`
- `block-login_form.php`
- `block-main.php`
- `block-article.php` - редактор и отображение новости в шаблоне `template_standart` и `template_contacts`
- `block-news.ideas.php`
- `block-news.php`
- `block-navbar.php`

### template-*

шаблон, имеет ряд переменных определяющих его

- `template_blank.php`
- `template_block.php`
- `template_contacts.php`
- `template_main.php`
- `template_standart.php`

Проверка доступа:

1. Смотрим авторизована ли сессия
2. Проверяем права на просмотр страницы

Авторизация:

1. Если сессия не авторизована
2. Присваиваем сессии `user_id`

Выход:

1. Удаляем сессию на диске
2. Удаляем сессию в браузере
3. Удаляем сессию в бд (или ставим флаг неактивной)

Хорошо бы вести полную статистику работы пользователей. Может прикрутить логгер.

Редактирование страниц:

1. Если сессия авторизована
2. Если у пользователя есть прав на редактирование

Как организовать хранение прав на редактирование/просмотр?

* Пользователь
* Страница

Новая сущность группа - не нужна (группа храниться в Пользователе)

Новая сущность доступ:
Группа, страница, редактировать, просматривать

Нужно сделать страничку первоначальной настройки настройки
И сохранения бекапа

## Связка nginx + letsencrypt

-> https://hixon.ru/programmirovanie-2/delaem-https-sajtik-s-pomoshhyu-nginx-docker-compose-lets-encrypt.html
Обзорная статья описывающая процесс

-> https://github.com/evertramos/docker-compose-letsencrypt-nginx-proxy-companion
docker-compose с тремя контейнерами и сеткой

-> https://github.com/jwilder/docker-gen
docker-gen is a file generator that renders templates using docker container meta-data.

-> nginx-web
по сути официальный nginx

-> https://github.com/JrCs/docker-letsencrypt-nginx-proxy-companion

-> simp_le бот для получения сертефиката (вроде как работает на https://letsencrypt.org/2017/06/14/acme-v2-api.html)
что-то аля https://certbot.eff.org

## nginx + php docker-compose

https://phptoday.ru/post/gotovim-lokalnuyu-sredu-docker-dlya-razrabotki-na-php
Статья про nginx + mysql + php

https://github.com/nanoninja/docker-nginx-php-mysql
Аналогичная статья правда тут тоже есть про SSL

https://stackoverflow.com/questions/44994418/docker-compose-for-nginx-php-fpm-composer

Что-то старое депрекейченое для запуска nginx + ssl
https://github.com/libresh/compose-nginx/blob/master/docker-compose.yml

https://hub.docker.com/r/phpmyadmin/phpmyadmin/

старая статья на хабр об идеальном окружении (php, apache, nginx)
https://habr.com/en/post/346086/
