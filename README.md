# Laravel Multi-Database Ticketing System

This is a Laravel-based ticketing system that supports multiple databases for different ticket types and a unified admin panel.

---

## 🔧 Features

- Ticket submission form with type-based database routing  
- Admin login system  
- Unified ticket view from multiple databases  
- Admin note system using Trix editor  
- Bootstrap 5 UI + DataTables

---

## 🛠️ Setup Instructions

1. **Clone the Repository**

```bash
git clone https://github.com/Syedhasan8750/Laravel-Ticketing-System.git
cd Laravel-Ticketing-System.

2. **Install Dependencies**
    composer install
    npm install && npm run dev (optional for frontend assets)

3. **Create Environment File**
    --bash
    cp .env.example .env

4. **Generate App Key**
    --bash
    php artisan key:generate

5. **Create Databases
-------------------------------------
    Run these commands in your phpmyadin or any mysql client
    CREATE DATABASE technical_issues;
    CREATE DATABASE billing;
    CREATE DATABASE product_service;
    CREATE DATABASE general;
    CREATE DATABASE feedback;
-------------------------------------------

6. **Run Migrations**
    --bash
    php artisan migrate

7. **Seed Admin**
    --bash
    php artisan db:seed --class=AdminSeeder

8. **Start the App**

    --bash
    php artisan serve

9. **Default Admin Login**

    Email: admin@demouser.com
    Password: admin@123
