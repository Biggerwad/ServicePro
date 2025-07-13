# ServicePro - Multi-Service PHP Website

ServicePro is a fully functional, responsive service-based website built with **HTML**, **CSS**, **PHP**, and **MySQL**. 
It includes a public testimonial display section and a secure admin dashboard with CRUD functionality. This project showcases fundamental PHP practices and backend integration, perfect for small businesses offering home-based or professional services like electrical work, cleaning, or tutoring.

---

## Features

### Public Site
- Responsive layout (HTML/CSS)
- Dynamic testimonials (pulled from MySQL DB)
- Static fallback testimonials when DB is empty
- Carousel-ready testimonial layout

### Admin Dashboard
- Admin login (PHP Sessions)
- Add, view, delete testimonials
- Responsive design
- Spinner on login submission for user feedback

### Security
- Passwords hashed using `password_hash()`
- SQL injection protection via `mysqli prepared statements`

---

## Folder Structure

```bash
servicepro/
├── public/                 # Web root
│   ├── index.php
│   ├── css/
│   ├── js/
│   └── assets/
├── includes/              
│   └── db.php             
├── admin/                 
│   ├── login.php
│   ├── dashboard.php
│   ├── logout.php
│   └── manage_testimonials.php
├── Dockerfile
├── render.yaml
└── README.md
```

---

## ⚙️ Setup Instructions

### Prerequisites
- PHP 8+
- MySQL
- XAMPP / MAMP / Docker (optional)

### 1. Clone the Repository
```bash
git clone https://github.com/biggerwad/servicepro.git
cd servicepro
```

### 2. Create Database
```sql
CREATE DATABASE servicepro;

CREATE TABLE testimonials (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    service VARCHAR(255),
    message TEXT
);

CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE,
    password_hash TEXT
);

-- Insert admin user:
INSERT INTO admins (username, password_hash)
VALUES ('admin', '<replace-with-output-of-php-hash>');
```

### 3. Run Locally
- Place project in `htdocs` folder of XAMPP
- Visit `http://localhost/servicepro/public/`
- Admin login: `http://localhost/servicepro/admin/login.php`

---

## Deployment on Render

### Steps
1. Push to GitHub
2. Create a Docker-based Web Service on [render.com](https://render.com)
3. Set Docker root to repo root (not `/public`)
4. Expose port 80

### Dockerfile Setup
```Dockerfile
FROM php:8.2-apache
WORKDIR /var/www/html
RUN a2enmod rewrite
COPY public/ /var/www/html/
COPY includes/ /var/www/includes/
EXPOSE 80
```

### render.yaml
```yaml
services:
  - type: web
    name: servicepro
    env: docker
    plan: free
    dockerfilePath: Dockerfile
    repo: https://github.com/biggerwad/servicepro
    branch: main
    autoDeploy: true
```

---

## License
MIT

---

## Acknowledgements
Built by Daniel Wesey – [linkedin.com/in/daniel-wesey](https://linkedin.com/in/daniel-wesey)

> This project was built as a showcase for applications and portfolio proof of backend and PHP proficiency.
