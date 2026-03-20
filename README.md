# Restaurant Billing Webapp

A clean and efficient restaurant billing system built with PHP, MySQL, and Vanilla CSS. This project allows cashiers to manage food orders, process payments, and view order summaries.

## Features
- **Login System**: Simple login to track the Cashier ID.
- **Dynamic Menu**: filterable food categories and real-time cart management.
- **Order Persistence**: Saves orders and items directly to a MySQL database.
- **Summary Dashboard**: View all past orders with cashier attribution.

## Tech Stack
- **Frontend**: HTML5, CSS3 (Bootstrap for layout), JavaScript.
- **Backend**: PHP.
- **Database**: MySQL.

## Setup Instructions

### 1. Prerequisites
- Install **XAMPP** or **WAMP** server.
- Ensure your Apache and MySQL services are running.

### 2. Database Setup
1. Open **phpMyAdmin** (usually `http://localhost/phpmyadmin`).
2. Create a new database named `ps_restaurant`.
3. Select the `ps_restaurant` database.
4. Click on the **Import** tab.
5. Choose the `database.sql` file provided in this repository.
6. Click **Go** to run the import.

### 3. Project Configuration
1. Copy the entire project folder into your server's web root:
   - For XAMPP: `C:\xampp\htdocs\Rest_php`
   - For WAMP: `C:\wamp64\www\Rest_php`
2. Open `database.php` and verify the database credentials:
   ```php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "ps_restaurant";
   ```

### 4. Running the Application
1. Open your web browser.
2. Navigate to `http://localhost/Rest_php/index.php`.
3. Login with any Username and a 4-digit Cashier ID.

## File Structure
- `index.php`: Login page.
- `main.php`: Food menu / dashboard.
- `2.php`: Cart and checkout.
- `summary.php`: Order history.
- `database.php`: MySQL connection.
- `database.sql`: Database schema.
- `css/`, `js/`, `images/`: Frontend assets.

---
Repository: [Restaurantphase03](https://github.com/thilakshanakunasegaram-cloud/Restaurantphase03)
Developed for PS Restaurant.
