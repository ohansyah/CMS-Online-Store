
# CMS Online Store

[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)


CMS-Online-Store is an open source eCommerce solution to sell and manage your products online. It has a clear, clean and responsive design that is easy to customize. The built-in CMS makes it easy for your customers to search and filter products and view them on their favourite device.


## Demo

[FE : cms-os.ohansyah.com](https://cms-os.ohansyah.com)

[CMS : cms-os.ohansyah.com/login](https://cms-os.ohansyah.com/login)

username: firstadmin@gmail.com

password: Admin123
## Environment Variables

This Project using Laravel Environment, you will need to add/adjust the environment variables based on your need like :

`APP_TIMEZONE=Asia/Jakarta`

`APP_LOCALE=id`

`DB_DATABASE=cms-online-store`
## Installation

#### Install this project with composer
```bash
  cp .env.example .env
  composer install
  php artisan key:generate
```

#### Create a symbolic link from public/storage to storage/app/public
```bash
  php artisan publish:img
```

#### Migration
```bash
  php artisan migrate
```
    
#### Seeder
```bash
  // init user admin
  php artisan db:seed --class=UserAdmin

  // init cms menus
  php artisan db:seed --class=MenuSeed
  php artisan menu:hot-deals

  // init categories
  php artisan db:seed --class=CategorySeed
  
  // init banners
  php artisan db:seed --class=BannerSeed

  // init products
  php artisan db:seed --class=ProductSeed

  // init hot_deals
  php artisan db:seed --class=HotDealSeed

  // init general setting
  php artisan db:seed --class=GeneralSettingSeed
  
  
```

#### Seeder Factory
if you want to test your performance or just bulk insert dummy data you can use this following Seeder Factory
```bash  
  // banners
  php artisan db:seed --class=BannerSeedFactory

  // products
  php artisan db:seed --class=ProductSeedFactory
```
## Run Locally
Go to the project directory then Start the server

```bash
  php -S localhost:2023 -t public
```


## Features

- Clean & minimal design
- Fully responsive
- Easy to install
- Full Customize in CMS
- Easy direct changes in code 
- Banners
- Hot Deals
- Products
- Multi product images
- Categpries
## Tech Stack
- [Laravel 8.83.27](https://github.com/laravel/laravel/tree/8.x)
- [NiceAdmin - v2.2.2](https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/)
- [Karma](https://themewagon.com/themes/free-reponsive-bootstrap-4-html5-ecommerce-website-template-karma/)