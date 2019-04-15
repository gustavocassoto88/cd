# Cyber Duck PHP TEST

# Requirements
PHP 7.0 or Highter
MySql Server
a local mysql database with “Cyberduck” name (if it’s not local you must set up the correct parameters on /config/database.php)

# Steps

1 - Clone this repo on your computer

2 - Go to root folder of this project and run the following commands:
    2.1 - php artisan update
    2.2 - php artisan migrate
    2.3 - composer dump-autoload
    2.4 - php artisan db:seed --class=UsersTableSeeder
    2.5 - php artisan serve
    
3 - On your favorite browser go to the following url http://127.0.0.1:8000

4 - use the following credentials to access the system
    user = admin@admin.com
    password  = password
    
5 - On the top of menu, you can access the functionalities (companies and employees)
