# Image Gallery with Admin Function, Delete, and Edit Functionality

This project is an image gallery with administrative functions, allowing users to add, delete, and edit image details.

## Features

- **Image Upload:** Users can upload images to the gallery.
- **Delete Functionality:** Users can delete images from the gallery.
- **Edit Functionality:** Users can edit the Alt-Text of the images.

## Getting Started

These instructions will help you set up the project on your local machine for development and testing purposes.

### Prerequisites

- [XAMPP](https://www.apachefriends.org/index.html) or any other PHP and MySQL environment.
- Web browser for accessing the application.

### Installation

1. **Clone the Repository:**

    ```bash
    git clone https://github.com/your-repo/image-gallery.git
    ```

2. **Move the Project to Your Web Server Directory:**

    Place the project files in the `htdocs` directory of your XAMPP installation (or the equivalent directory in your setup).

3. **Set Up the Database:**

    - Open phpMyAdmin and create a new database named `edvgraz_gallery`.
    - Import the provided SQL file (`database.sql`) to set up the necessary tables.

4. **Update Database Configuration:**

    Ensure the database configuration in `inc/db_connect.php` matches your setup:

    ```php
    <?php
    try {
        $dsn = 'mysql:host=localhost;dbname=edvgraz_gallery';
        $user_name = 'root';
        $password = '';
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];

        $pdo = new PDO($dsn, $user_name, $password, $options);
    } catch (PDOException $e) {
        echo 'Datenbank Verbindung gescheitert: ' . $e->getMessage();
    }
    ```

### Usage

1. **Start XAMPP:**

    Start Apache and MySQL from the XAMPP control panel.

2. **Access the Application:**

    Open your web browser and navigate to:

    ```url
    http://localhost/your-project-directory/
    ```

### Project Structure

- **admin/**
  - Contains the admin-related PHP files and views.
- **css/**
  - Contains the CSS files for styling the application.
- **inc/**
  - Contains the database connection and function files.
- **src/**
  - Contains the PHP classes for handling images.
- **uploads/**
  - Contains the uploaded images.
- **views/**
  - Contains the main views for the application.

### Files

- **index.php:**
  - The main entry point of the application.
- **admin.php:**
  - The admin dashboard.
- **upload.php:**
  - Handles image uploads.
- **delete.php:**
  - Handles image deletions.
- **edit.php:**
  - Handles image Alt-Text editing.
- **functions.php:**
  - Contains helper functions for rendering and processing.
