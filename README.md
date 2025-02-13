# Laravel Blog Application

## Prerequisites

Before you begin, ensure you have met the following requirements:

- PHP = 7.3|8.0
- Laravel = 8.75
- Composer
- MySQL or another supported database
- Node.js and npm (for managing frontend assets)

## Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/Absalom-Silwal/blogApp.git

2. **Navigate to the project directory:**
    ```bash
    cd your-laravel-app

3. **Install the dependencies:**
    ```bash
    composer install

4. **Copy the example environment file and generate the application key:**
    ```bash
    cp .env.example .env
    php artisan key:generate

5. **Set up your database configuration in the .env file::**
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password

6. **Run the database migrations and seeders:**
    ```bash
    php artisan migrate
    php artisan db:seed

7. **Install and build frontend assets:**
    ```bash
    npm install
    npm run dev


8. **Start the local development server:**
    ```bash
    php artisan serve

9. **To run the application's test suite:**
    ```bash
    php artisan test

10. **API Documentation**
    ```bash
    http://127.0.0.1:8000/api/documentation