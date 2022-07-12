<p align="center"><a href="http://168.232.165.28/" target="_blank"><img src="/public/media/logo/logo3.png" width="300"></a></p>
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200"></a></p>
## Korimangastore - Laravel 8 ##

### Installation ###

* `git clone https://github.com/JuanBaezaB/korimangastore.git`
* `cd korimangastore`
* `composer install`
* `php artisan key:generate`
* Create a database named "kori"
* `cp .env.example .env`
* `php artisan migrate:fresh --seed` to create and populate tables
* `php artisan optimize`
* `php artisan storage:link`
* `php artisan vendor:publish` to publish filemanager
* `php artisan serve` to start the app on http://localhost:8000/

