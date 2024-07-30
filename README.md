### 小聪明网站 Little Smart Website 
This project is to create an exclusive website for Little Smart Day Care Center(小聪明安亲班). It also serves as WIA3002 Academic Project I's final year project.

To learn more about the stakeholder:\
Facebook: [Little Smart Day Care Centre](https://www.facebook.com/p/%E5%B0%8F%E8%81%AA%E6%98%8ELittle-Smart-Day-Care-Centre-100064129656590) <br />
E-mail: littlesmartdaycare@gmail.com\
Phone: +6012-2751398 (Ms. Novy)

### How to run the website
As of current development, this project is required to be hosted locally, both server and MySQL database. You are required to install Laravel dependencies to run this website. While Laravel covers both server and database, you can still opt for XAMPP phpMyAdmin to manage database.

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
