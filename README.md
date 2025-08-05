# Login-System-using-PHP-and-Bootstrap-wth-MVC-Application
Complete PHP MVC login system with Bootstrap - Features user registration, authentication, profile management, and responsive dashboard. Secure, modern, and ready to use!

# PHP Bootstrap MVC Application

## Project Structure
```
c:\wamp64\www\
├── assets/
│   ├── css/         # Custom CSS files
│   ├── js/          # Custom JavaScript files
│   └── img/         # Image assets
├── includes/
│   ├── config.php   # Configuration settings
│   ├── header.php   # Common header template
│   └── footer.php   # Common footer template
├── vendor/
│   └── bootstrap/   # Bootstrap framework files
├── database/
│   └── db.php      # Database connection and queries
├── models/         # Data models
│   └── User.php    # User model class
├── controllers/    # Application controllers
│   ├── HomeController.php  # Home page controller
│   └── AuthController.php  # Authentication controller
├── views/          # View templates
│   ├── auth/       # Authentication views
│   ├── home/       # Home page views
│   └── layouts/    # Layout templates
└── index.php      # Application entry point
```

## Technologies Used
- PHP 8.x
- MySQL latest version
- Bootstrap v5.3.x
- Bootstrap Icons
- Vanilla JavaScript/jQuery

## MVC Architecture

### Models
- Handle data logic and database operations
- Located in `models/` directory
- Example: `User.php` handles user authentication and profile management

### Views
- Contains HTML templates with PHP
- Located in `views/` directory
- Organized by feature (auth, home, layouts)

### Controllers
- Handle request processing and application flow
- Located in `controllers/` directory
- Main controllers:
  - `HomeController.php`: Manages main application pages
  - `AuthController.php`: Handles user authentication

## Setup Instructions
1. Install WAMP/XAMPP server
2. Clone repository to `www` directory
3. Configure database settings in `includes/config.php`
4. Import database schema
5. Access application through localhost

## Features
- User Authentication (Login/Register)
- User Dashboard
- Profile Management
- Responsive Bootstrap UI
- Secure Session Management

## Dependencies
- Bootstrap CSS Framework
- Bootstrap Icons
- PHP PDO Database Extension
- MySQL Database

## Development
- MVC pattern for organized code structure
- Session-based authentication
- PDO for database operations
- Bootstrap for responsive


