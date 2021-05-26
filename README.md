# Zinobe
login project

## Configuration

To configure the project for the first time

```
git clone https://github.com/rulox12/login.git
cd login
composer install
composer dump-autoload
```
Copy and paste the .env.example file and rename it as .env located in the public folder with the extension .env, check the following variables and bring the corresponding connections
```
DB_HOST = localhost
DB_DATABASE = YOUR_DATABASE
DB_USER = USER
DB_PASSWORD = PASSWORD
```
For example
```
DB_HOST = localhost
DB_DATABASE = zinobe
DB_USER = root
DB_PASSWORD = password
```

## Creation of the database

```
php config/migration.php
```
The following message will come out

```
Se ejecuto correctamente la migracion
```

## Run the project

In this case we are going to stop our local server on port 8080
```
cd public
php -S 127.0.0.1:8080
```
