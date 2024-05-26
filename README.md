# CodeIgniter 4 Application Starter - API user management 
![delete user_DELETE](https://github.com/herdiyana256/api_registration_user/assets/82978131/f5c2dfe9-769a-4947-b675-94d8127aa3da)
![database_update](https://github.com/herdiyana256/api_registration_user/assets/82978131/8cd00c1b-7c28-4936-a76c-12dc33796658)
![changed password_PUT](https://github.com/herdiyana256/api_registration_user/assets/82978131/3c725a17-8d2d-4d57-a742-218febfbc9b9)
![POST_json](https://github.com/herdiyana256/api_registration_user/assets/82978131/523e9d1c-79fc-470e-b4af-c5407c6a20c3)
![GET_All user](https://github.com/herdiyana256/api_registration_user/assets/82978131/7e8d5c89-26e9-451a-9c37-b367a27a217e)
![duplicate_user](https://github.com/herdiyana256/api_registration_user/assets/82978131/198293a6-a6d8-46c1-8b47-63dfeaa8dc04)



Rute URL untuk Metode POST (Registrasi Pengguna)
URL: http://localhost:8080/user/register
Metode HTTP: POST
Body: JSON dengan format seperti ini:
json
Copy code
{
  "username": "nama_pengguna",
  "email": "email@contoh.com",
  "password": "password_pengguna"
}
Rute URL untuk Metode PUT atau PATCH (Perbarui Kata Sandi Pengguna)
URL: http://localhost:8080/user/updatePassword/{id_pengguna}
Ganti {id_pengguna} dengan ID pengguna yang ingin diperbarui.
Metode HTTP: PUT atau PATCH
Body: JSON dengan format seperti ini:
json
Copy code
{
  "password": "password_baru"
}
Rute URL untuk Metode DELETE (Hapus Pengguna)
URL: http://localhost:8080/user/delete/{id_pengguna}
Ganti {id_pengguna} dengan ID pengguna yang ingin dihapus.
Metode HTTP: DELETE
Rute URL untuk Metode GET (Dapatkan Data Pengguna)
URL: http://localhost:8080/user/{id_pengguna}
Ganti {id_pengguna} dengan ID pengguna yang ingin ditampilkan.
Metode HTTP: GET




## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

You can read the [user guide](https://codeigniter.com/user_guide/)
corresponding to the latest version of the framework.

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 8.1 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> [!WARNING]
> The end of life date for PHP 7.4 was November 28, 2022.
> The end of life date for PHP 8.0 was November 26, 2023.
> If you are still using PHP 7.4 or 8.0, you should upgrade immediately.
> The end of life date for PHP 8.1 will be November 25, 2024.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
