# Installation Manual

## PHP version >= 8.0
## Composer version: 2

Here is how you will run this project. Its is making use of Laravel passport for OAuth2 authentication

- ```composer install``` to install all the packages used here.
- Copy the ```.env.example``` to ```.env``` file and setup your databases
- Run ```php artisan migrate:fresh seed``` to make the tables and create a user (ie Commissioner Gordon)
- The credentials of the user are as follows
  - ```email``` = ```gordon@commissioner.com```
  - ```password```=```password```
    
- Run ```php artisan passport:keys``` to publish Laravel Passport keys used for the authentication process.

# App is ready to serve :)
