<p align="center">
    <img src="./public/logo.png" alt="Project logo">
</p>

# Seller.lv

Seller.lv is a classifieds platform designed for businesses and individuals to post and browse listings. The project leverages modern web technologies to provide a robust and efficient user experience.

## Technologies Used
- Laravel 11: A PHP framework for web artisans.
- MySQL: An open-source relational database management system.
- Composer: A dependency manager for PHP.

## Prerequisites
Make sure you have the following software installed:

- PHP 8.1 or higher
- Composer
- MySQL
- Git

## Run Locally

Clone the project:

```bash
  git clone https://github.com/DannZolik/sellerlv.git
  cd seller.lv
```
Install the dependencies:
```bash
  sudo apt install openssl php-bcmath php-curl php-json php-mbstring php-mysql php-tokenizer php-xml php-zip
  composer update
  composer install
```
Set up the environment variables:
```bash
  cp .env.example .env
```
Update the following lines in the .env file to match your database configuration:
```bash
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=your_database_name
  DB_USERNAME=your_database_user
  DB_PASSWORD=your_database_password
```
Generate the application key:
```bash
  php artisan key:generate

```
Run the migrations & seed:
```bash
  php artisan migrate --seed
```
Serve the application:
```bash
  php artisan serve
```

The application will be accessible at http://localhost:8000.

