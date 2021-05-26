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

Initially you must enter the mysql server through the console or through an IDE for mysql
```
mysql -u root -p
Enter user password
```

Once we are inside the mysql server, we must execute the file that we will find in the path /config/migration.sql, for example in my case it would be

```
source /Users/danielbetancurvillada/dbv/login/config/migration.sql
```

## Run the project

In this case we are going to stop our local server on port 8080
```
php -S 127.0.0.1:8080
```
