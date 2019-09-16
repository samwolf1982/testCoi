
Тестове завдання

Проект повинен бути написаний на Laravel останньої версії.
Після реєстрації/авторизації юзер має мати можливість додати товар (назва, фото, ціна в гривнях).
Валідація: назва - мінімум 3 символи, фото - jpg і png, ціна - тільки цифри і кома.
Товари мають зберігатись в базі даних (ід, назва, посилання на фото).
В окремій таблиці має бути ціна товару в різних валютах (гривня, долар, євро).
Курс валют можна взяти з апі приватбанку https://api.privatbank.ua/ або іншого для автоматичної конвертації при додаванні товару.
На сайті неавторизованому юзеру має виводитись список товарів (назва, фото, ціни в різних валютах, посилання на сторінку товару) по 3 на сторінку.
На сторінці товару авторизований користувач зможе його видалити.
UI на власний смак.
Готову роботу потрібно залити на github/bitbucket, в описі мають бути команди для інсталяції та запуску проекту.

composer require mews/captcha
composer require doctrine/dbal
composer require unisharp/laravel-filemanager:~1.8

mkdir website

cd website

git clone https://github.com/samwolf1982/testCoi.git .


apt-get install php-mbstring php7.0-gd php-xml zip unzip php-zip composer

composer require composer-plugin-api

chmod -R 775 bootstrap/cache

chmod -R 775 public

chmod -R 775 storage

chmod 777 storage/logs bootstrap/cache storage/framework/views  storage/framework/sessions 
 
docker-compose up 




