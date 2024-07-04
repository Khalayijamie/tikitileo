# TikitiLeo: An Event Ticketing Web Application

## Description

This project aims to develop a web application that allows users to purchase event tickets using flexible payment options, including installment plans. The goal is to increase accessibility and affordability for students and individuals with limited financial resources, promoting inclusivity in event participation.

## Project Setup / Installation Instructions

### Dependencies

- Laravel
- PHP
- MySQL
- Git
- Visual Studio Code

### Installation Steps

1. **Clone the repository:**

   ```bash
   git clone https://github.com/tatiana-omolleh/tikitileo.git

2. **Install composer dependencies:**

   ```bash
   composer install
3. **Copy the `.env.example` file to `.env`:**

   ```bash
   cp .env.example .env
4. **Generate an application key:**

   ```bash
   php artisan key:generate
5. **Set up your database in the `.env` file:**

   Update the following lines with your database information:

   ```env
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password
6. **Run the database migrations:**

   ```bash
   php artisan migrate
7. **Start the development server:**

   ```bash
   php artisan serve
## Usage Instructions
### How to Run
1. **To run the web application, navigate to the project directory and start the development server using the following command:**
   ```bash
   php artisan serve
   
## Examples
Open your web browser and go to [http://localhost:8000](http://localhost:8000).

- **Browse Events:** Users can browse events by category, location, and date.
- **Purchase Tickets:** Users can purchase tickets using a single payment or choose an installment plan.
- **Manage Installments:** Users will receive notifications and can view their payment progress through their account dashboard.

## Input/Output

- **Input:** Users input event details, payment information, and installment preferences.
- **Output:** The system generates tickets, payment confirmations, and installment notifications.
## Project Structure

### Overview

- **`app/`**: Contains the core application files and business logic.
- **`database/`**: Contains migration files for database schema.
- **`public/`**: Contains publicly accessible files like images and JavaScript.
- **`resources/`**: Contains views, layouts, and other front-end assets.
- **`routes/`**: Contains all route definitions.
- **`tests/`**: Contains test cases for the application.

## Key Files

- **`app/Http/Controllers/`**: Contains controllers that handle the application logic.
- **`app/Models/`**: Contains Eloquent models representing database tables.
- **`resources/views/`**: Contains Blade templates for the front-end.
- **`routes/web.php`**: Defines web routes for the application.

## Additional Sections

### Project Status

The project is currently in progress.

## Known Issues

No known issues at the moment.

## Acknowledgements

- **[Laravel](https://laravel.com/)**
- **[Visual Studio Code](https://code.visualstudio.com/)**
- **[GitHub](https://github.com/)**

## Contact Information

For questions or feedback, please contact:

- Email: [tatiana.omolleh@strathmore.edu](mailto:tatiana.omolleh@strathmore.edu)
- Email: [jamie.nangulu@strathmore.edu](mailto:jamie.nangulu@strathmore.edu)

