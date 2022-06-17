<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Advanced Project Template</h1>
    <br>
</p>

Used: `php 7.4, Apache2, mysql5`

1. Как развернуть:

Используйте `git clone https://github.com/Imunely/yii2-app-advanced.git` чтобы клонировать проект

2. Настройка веб-сервера:

Document_root смотрит на `your_folder/yii2-app-advanced/api/web`

В папке `\api\modules` находятся версии api в нумерации `v1, v2, ..., vn`

- Чтобы получить доступ к api используйте url `http://api.local/api/v1/userls`
- Чтобы получить доступ к документации api, используйте url `http://api.local/doc`


3. Выполнение миграции: `php yii migrate yiiUsr`

<br>







<!-- Доступны следующие запросы:

`'POST regist' => 'regist'` - запрос для регитрации

`'POST auth' => 'auth',` - запрос для подвтвержения номера

`'POST login' => 'login',` - запрос для авторизации


<br>

<div style="border-left: 1px solid black; padding: 10px 5px; padding-left: 15px; border-top: 1px solid black;">

<h4>Запрос <em>POST login</em> </h4>

<small> <em>curl -i -X POST -d "login[username]=Admin&login[password]=sfdb34b34" `"http://api.local/api/v1/userls/login"` </small> <em>

<h4>Ответ </h4>

<small> <em> `HTTP/1.1 200 OK`

Date: Mon, 13 Jun 2022 17:22:52 GMT

Server: Apache/2.4.53 (Unix) PHP/7.4.3

X-Powered-By: PHP/7.4.3

Vary: Accept

X-Debug-Tag: 62a7726c9cd79

X-Debug-Duration: 596

X-Debug-Link: /debug/default/view?tag=62a7726c9cd79

Transfer-Encoding: chunked

Content-Type: application/json; charset=UTF-8

`{"token":"\_xPXDbKZoH9vp1KJILPmoZ3BrEQOz5Q-"}`</em></small>

</div>
<br>

<div style="border-left: 1px solid black; padding: 10px 5px; padding-left: 15px; border-top: 1px solid black;">

<h4>Запрос <em>POST regist</em> </h4>

<small> <em>curl -i -X POST -d "login[username]=Admin&login[password]=sfdb34b34" `"http://api.local/api/v1/userls/login"` </small> <em>

<h4>Ответ </h4>

<small> <em>

`HTTP/1.1 200 OK`

Date: Mon, 13 Jun 2022 17:35:17 GMT

Server: Apache/2.4.53 (Unix) PHP/7.4.3

X-Powered-By: PHP/7.4.3

Vary: Accept

X-Debug-Tag: 62a77555bc3db

X-Debug-Duration: 573

X-Debug-Link: /debug/default/view?tag=62a77555bc3db

Transfer-Encoding: chunked

Content-Type: application/json; charset=UTF-8

`{"code":7773,"token":"4XnqVRMvW6LUYpkD_iVGW3cLOvOAAIrw"}`
</em></small>

</div>
<br>
<div style="border-left: 1px solid black; padding: 10px 5px; padding-left: 15px; border-top: 1px solid black;">

<h4>Запрос <em>POST auth</em> </h4>

<small> <em>curl -i -X POST -d "auth[token]=4XnqVRMvW6LUYpkD_iVGW3cLOvOAAIrw&auth[code]=7773" `"http://api.local/api/v1/userls/auth"` </small> <em>

<h4>Ответ</h4>

<small> <em>

`HTTP/1.1 200 OK`

Date: Mon, 13 Jun 2022 17:35:17 GMT

Server: Apache/2.4.53 (Unix) PHP/7.4.3

X-Powered-By: PHP/7.4.3

Vary: Accept

X-Debug-Tag: 62a776849e1d4

X-Debug-Duration: 51

X-Debug-Link: /debug/default/view?tag=62a776849e1d4

Transfer-Encoding: chunked

Content-Type: application/json; charset=UTF-8

`{"token":"MxzIQQc3dochrM7JktDqvV0twD93NJVJ"}`

</em></small>

</div> -->
