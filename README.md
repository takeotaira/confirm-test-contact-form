# coachtech お問い合わせフォーム

## 環境構築

### Dockerビルド

```bash
git clone git@github.com:takeotaira/confirm-test-contact-form.git
cd confirm-test-contact-form
docker compose up -d --build
```

### Laravel環境構築

```bash
docker compose exec php bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
```

## 使用技術

- PHP
- Laravel
- MySQL
- Docker

## ER図

![ER図](./docs/er.png)

## URL

- 開発環境: http://localhost/
- phpMyAdmin: http://localhost:8080/
