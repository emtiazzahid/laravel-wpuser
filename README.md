# Laravel to WP user
![Heroku](https://scrutinizer-ci.com/g/emtiazzahid/laravel-wpuser/badges/quality-score.png?b=master&s=0348db35ecefcd904d7b79418e1f627e452bd13e)
![Heroku](https://scrutinizer-ci.com/g/emtiazzahid/laravel-wpuser/badges/build.png?b=master&s=e4952fa027452bb103e589c47d8b3edeb5b3c2bf)
[![License: MIT](https://img.shields.io/badge/License-MIT-lime.svg)](https://opensource.org/licenses/MIT)

## Demo: [APP](https://larapress-app.herokuapp.com/)

# Installation
1. Clone this repo
```
git clone https://github.com/emtiazzahid/laravel-wpuser.git
```

2. Install composer packages
```
cd laravel-wpuser
```
```
composer install
```

3. Create and setup .env file
```
cp .env.example .env
```
```
php artisan key:generate
```
```
php artisan jwt:secret
```

4. put database credentials in .env file

    for testing add database name on DB_TEST_DATABASE


6. Migrate and insert records
```
php artisan migrate --seed
```

6. To run test
```
.\vendor\bin\phpunit
```

###For WP Plugin for this visit: [wp-laravel-user](https://github.com/emtiazzahid/wp-laravel-user)

## License

The MIT License (MIT)