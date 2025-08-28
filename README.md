# CliniCare Web System

CliniCare is a web-based clinic management platform built with PHP and MySQL. It allows administrators to handle appointments, manage users, and review feedback while providing customers with an interface to interact with the clinic online.

## Directory Layout

```
/               Project root
├── CliniCare/  Core PHP application including AdminPage, Customer, Guest, and assets
├── Installer/  Uniform Server package for local development
├── README.md   Project overview and setup instructions
└── CONTRIBUTING.md  Guidelines for contributing to the project
```

## System Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache or another compatible web server (Uniform Server ZeroXIV recommended)
- Git for version control

## Setup

### Install Dependencies

1. Install [Uniform Server](https://www.uniformserver.com/) or ensure PHP, MySQL, and Apache are available on your machine.
2. Clone this repository:
   ```bash
   git clone https://github.com/amirulirfn1/CliniCare.git
   cd CliniCare
   ```

### Environment Variables

Create a `.env` file in the project root with your database configuration:
```bash
DB_HOST=localhost
DB_NAME=clinicaredb
DB_USER=your_user
DB_PASS=your_password
```

### Development Server

You can use the PHP built-in server for development:
```bash
php -S localhost:8000 -t CliniCare
```
Then open your browser to [http://localhost:8000](http://localhost:8000) to view the application.

## Project Credentials

Sample accounts for testing purposes:
```
Admin/Staff
  email: admin@gmail.com
  password: admin123

Customer
  email: customer@gmail.com
  password: customer123

phpMyAdmin
  username: clinicarecustomer
  password: customer
```

## License

This project is licensed under the MIT License.

