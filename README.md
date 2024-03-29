# Simple Subscription Platform

This repository is a small platform, to which the USER can subscribe to a special website. When the new post was published on the website, the subscriber will receive an email to notify with the post title and post content.

## Include
- Use PHP 7.* (i.e. use Laravel 8 as Laravel 9 requires PHP 8.0)
- Write migrations for the required tables.
- Endpoint to create a "post" for a "particular website".
- Endpoint to make a user subscribe to a "particular website" with all the tiny validations included in it.
- Use of the command to send email to the subscribers.
- Use of queues to schedule sending in the background.
- No duplicate stories should get sent to subscribers.

Database schema: https://pasteboard.co/9128d1zO4QLs.png

## Installation

```bash
composer install
```

Setup environment

```bash
cp .env.example .env
```

Remember change information of database,base url, smtp...

## Database Migration & Seed

```bash
php artisan migrate
php artisan db:seed
```

## Running

Postman: https://www.postman.com/tuanhaviet22/workspace/inisev

Execute manually via CLI:

```bash
php artisan inisev:send
```


Note: 
This app using Google Gmail App is SMTP, so you need to account and password to using send mail function. 
I put demo account in **.env.example**

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=work.tuanha@gmail.com
MAIL_PASSWORD=oidqtacpcoqvfsvt
MAIL_ENCRYPTION=tls
MAIL_FROM_NAME="${APP_NAME}"
```

