# Simple-ecommerce-application

Instructions to setup this project in local server

1. Pull Simple-ecommerce-application project from git provider into local server folder
2. Run the Apache and MySQL server.
3. Create a database locally named 'simple_ecom_db' in phpmyadmin
4. Open the Simple_ecommerce_application folder in an editor, recommended VS Code
5. Setup .env: If you can not find .env file inside the root directory create a copy from .env.example file. Or rename .env.example to .env
6. Open and Setup environment variables in .env: 
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=simple_ecom_db
    DB_USERNAME=root
    DB_PASSWORD=
Set up the database variables like above.
7. Open the terminal in VS Code for commandline execution.
8. Run composer install or php composer command in terminal if composer is not installed.
9. Run php artisan config:cache command in terminal
10. Run php artisan migrate command in terminal.
11. Run the application in any browser by entering the url: localhost/Simple-ecommerce-application
12. You will see a dashboard page of Ecommerce application that created.
13. Product, Category, Order management sections can be accessed from the left side bar of this application.

* Note: Make sure the local server installed with PHP 8.0 or above and composer. This application is developed in Laravel 9.19
* Delete the config.php inside the root folder-> bootstrap/cache/.config if the file still exists or getting any errors while runnung. 
* This application is developed in Mac OS Ventura 13.3.1. If you are getting any kind of permission erros please give 777 permission to the required folder.