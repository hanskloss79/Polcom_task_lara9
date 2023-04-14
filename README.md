# Installing this project locally

### 1. Clone or download GitHub repo for this project locally.

### 2. cd into your project
 
### 3. Install Composer Dependencies

    composer install

### 4. Create a copy of your .env file

.env files are not generally committed to source control for security reasons. But there is a .env.example which is a template of the .env file that the project expects to have. So make a copy of the .env.example file and create a .env file that You can start to fill out to do things like database configuration in the next few steps.


    cp .env.example .env


This will create a copy of the .env.example file in your project and name the copy simply .env.

### 5. Generate an app encryption key


    php artisan key:generate


### 6. Create an empty database for application

Create an empty database for your project using the database tools you prefer e.g. phpMyAdmin or HeidiSQL.

### 7. In the .env file, add database information to allow Laravel to connect to the database.

In the .env file fill in the DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD options to match the credentials of the database you just created. This will allow You to run migrations and seed the database in the next steps.

### 8. Migrate the database

    php artisan migrate

### 9. Run the server

    php artisan serve

### 10. Start the application.

Type http://127.0.0.1:8000 in Your browser.  

## That is all you need to get started on a project.

