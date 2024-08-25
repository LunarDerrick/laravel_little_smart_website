### 小聪明网站 Little Smart Website 
This project is to create an exclusive website for Little Smart Day Care Center(小聪明安亲班). It also serves as WIA3002 Academic Project I's final year project.

To learn more about the stakeholder:\
Facebook: [Little Smart Day Care Centre](https://www.facebook.com/p/%E5%B0%8F%E8%81%AA%E6%98%8ELittle-Smart-Day-Care-Centre-100064129656590) <br />
E-mail: littlesmartdaycare@gmail.com\
Phone: +6012-2751398 (Ms. Novy)

### How to run the website
To run this website locally, you are required to install Laravel dependencies to run this website. While Laravel covers both server and database, you can still opt for XAMPP phpMyAdmin to manage database.

Related Dependencies:\
[Download XAMPP/phpMyAdmin](https://www.apachefriends.org/download.html)\
[Install Laravel](https://laravel.com/docs/11.x/installation)\
[Download Composer](https://getcomposer.org/download/)

### Environment setup instruction
1. Clone the repository:
   ```
   https://github.com/LunarDerrick/laravel_little_smart_website.git
   ```
2. Open command prompt (Windows) or terminal (MacOS).
   
3. Navigate to the project directory:
   for example, if you place your folder in C: drive
   ```
   cd C:\laravel_little_smart_website
   ```
4. Install dependencies (require composer):
   ```
   composer install
   ```
5. Compile necessary assets to the main folder:
   ```
   npm run prod
   ```
7. Run migrations and seed the database (to populate the database):
   ```
   php artisan migrate --seed
   ```
   **OR**\
   Import database that I am working on:
   ```
   database/littlesmartdb.sql
   ```
8. Serve the application:
   (in subsequent hosting, just run this step in command prompt would do, remember to run in your project directory!)
   ```
   php artisan serve
   ```

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

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
