## Installation steps

### Clone repo locally
`git clone git@github.com:Chaplinski/nylon-coding-test.git`

from the project's root directory run `composer install`

### Docker
run `docker-compose up` from the project root directory

After images build and containers launch, run the following commands:

`docker-compose exec php sh`

`cd /var/www/html`

`php artisan migrate`

Answer "yes" when asked if you would like to create the DB

### Testing
#### User-facing
Head over to `localhost:8080` and input some dummy data

#### Admin-facing
Now go to `localhost:8080/admin`. An admin user has already been [created for you.](database/migrations/0003_01_01_000000_create_admin_user.php)

**Admin email:** *admin@nylontechnology.com*<br>
**Admin password:** *nylon*

Here you can view, sort, and enable the Submissions that have been input on the public-facing site.

## Notes
- SQL dump can be found [here](dump.sql)
- The "Submission" object should have been named something like "Person". The submissions are not of the type "User", but "Submission" is very vague, and would be hard to understand when revisting the project in the future.
- Requirements called for Ubuntu 22.04 but this uses Alpine Linux 3.18. I didn't want to sink too much time into building a docker image, which is (in my opinion) my weakest part of this submission.

## External libraries
- [Bootstrap](https://getbootstrap.com/) on the front-end for resizing and grid structure
- [Filament](https://filamentphp.com/) for admin section
- PHPDocs were generated using https://github.com/barryvdh/laravel-ide-helper 
- DB dump was generated using https://github.com/spatie/db-dumper
