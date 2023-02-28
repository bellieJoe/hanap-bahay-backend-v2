# hanap-bahay-backend-v2
This repository project uses [Laravel](www.laravel.com) as the main framework.

## Dependencies
+ Xampp - Xampp comes with MySQL and PHP pre-installed which is also a dependency of this project. If you do not want to use you can also install PHP and MySQL manually. Make sure to use xampp that has PHP version of 8 to prevent problems with version mismatch.
+ [Composer](getcomposer.org)
+ NodeJS

## Installation
1. Clone or download this repository.
2. Open the terminal and navigate to the main directory of this repository which is `hanap-bahay-backend-v2`.
3. From there you may run `composer install` this will run all the required PHP dependencies of this project.
5. Run `npm install` to install the required JS dependencies of this project.
6. Run `php artisan key:generate`.
7. Run `php artisan storage:link`.
8. Open xampp and start MySQL and Apache.
9. Open the [localhost/phpmyadmin](localhost/phpmyadmin) on the browser and create a database named 'hanapbahay_db'
10. Open the source code to Visual Studio code or any editor and copy and rename the file `.env.example` to `.env`.
11. Go back to the terminal and run `php artisan migrate` you should see that the database on localhost/phpmyadmin is now updated.

## Running on local server
To run the application follow the below steps:
1. Open the terminal and navigate to the main directory of the project then run `php artisan serve`.
2. Open another terminal then run `php artisan schedule:work`.

## Mail Configuration
To Configure the mailing service of this application you may follow this [Tutorial](https://medium.com/@agavitalis/how-to-send-an-email-in-laravel-using-gmail-smtp-server-53d962f01a0c)
