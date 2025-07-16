<<<<<<< HEAD
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
=======
# ACT Consultant Roster System

A role-based admin and user management system built for **ACT International (Aiming Change for Tomorrow)** to streamline the registration, tracking, and role assignment of expert consultants and users in general.

## 🔍 Features

- 📝 **Expert Registration Form** – Collect consultant data with structured form validation.
- 🔒 **Role-Based Access** – Admin, User, and Data Entry roles with scoped access control.
- 📊 **Admin Dashboard** – Manage experts, assign roles, and oversee activity.
- 🧠 **Areas of Expertise** – Categorize consultants by sector and sub-sector.
- 📋 **Audit & CRUD Control** – Create, view, edit, and delete roles, areas, and registrations.

## 🛠️ Tech Stack

- **Backend:** Laravel (PHP)
- **Frontend:** Blade + TailwindCSS
- **Database:** MySQL
- **Other:** Laravel Breeze, Validation Middleware, RESTful Routing

## 📸 Screenshots

### User Panel
<img width="1816" height="964" alt="{0737378A-8232-47C3-9125-098AA73AD8F2}" src="https://github.com/user-attachments/assets/c72ee79c-d242-4a38-a8ca-73084da6c8f2" />

<img width="1822" height="965" alt="{6BA3E894-18BC-4910-A6E5-0F63AB4D06B1}" src="https://github.com/user-attachments/assets/2e7685b8-5577-44a1-99e8-8259b2e0b21d" />


### Admin Panel

<img width="1820" height="967" alt="{713E251F-5CC8-4116-9757-614D6765007A}" src="https://github.com/user-attachments/assets/13653433-ef3b-4cd1-8f64-deff3325c943" />

<img width="1853" height="986" alt="{3D17B1E5-DB24-42C5-8CC0-AC0F68413FD7}" src="https://github.com/user-attachments/assets/8c682a7e-5ff7-4f30-a5db-3e7be2c46bd2" />
<img width="1856" height="982" alt="{2C1A4E5C-82D0-4A29-89E1-F1D05386FD99}" src="https://github.com/user-attachments/assets/8e7ace7e-bd23-42dd-a932-c2d59ceb2dd8" />


## 🚀 Setup Instructions

### 1. Clone the Repository

```bash
git clone https://github.com/yourusername/act-consultant-roster.git
cd act-consultant-roster
```

### 2. Install Dependencies

```bash
composer install
npm install && npm run dev
```

### 3. Setup Environment File

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure `.env`

Update the `.env` file with your **database credentials** and any other environment variables.

### 5. Run Migrations

```bash
php artisan migrate
```

### 6. Launch the App

```bash
php artisan serve
```

Then navigate to `http://127.0.0.1:8000` in your browser.


## 🤝 Acknowledgements

Built during my internship with [ACT International](https://actinternational.org/) as a full-stack Laravel developer to support their expert consultant program.

## 📄 License

MIT
>>>>>>> 0f6a89c4b6b3e767e0736977c52a11bec3ff7b98
