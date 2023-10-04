<p align="center"><a href="#" target="_blank"><img src="#" width="400"></a></p>

## About This Project

This project is the Social App Project. Built with `Laravel` & various packages included.

## Setup

- First of all, we have to `clone` the project on our local machine using the below command
 ```
git clone https://github.com/spysabbir/Social-App-Project.git
``` 
- Now change the command line present working directory (pwd) by
 ```
cd Social-App-Project
``` 
- Now with the help of `composer` download all required packages that are needed to run this laravel project
 ```
composer install
``` 
- Basic setup is done at this point, now we have work on `.env`. The below changes should be done in the .env file

Variable Name | Description
--- | ---
DB_* | database settings to connect the database with this project
MAIL_* | database settings to send email via SMTP

- Now migrate and seed the database using
 ```
php artisan migrate --seed
``` 
- At last, we can now run the project using
 ```
php artisan serve
``` 

- Demo login credentials 
 ```
For Admin:- 
Email: admin@email.com
Password: 12345678
``` 

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the  [Laravel documentation](https://laravel.com/docs/contributions) .

## License

The Laravel framework is open-sourced software licensed under the  [MIT license](https://opensource.org/licenses/MIT) .
