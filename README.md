
## Word Search

- Find word definitions

### How to setup locally
Instructions:
- clone repo to local machine
- create a duplicate file of `.env.example` then rename it to `.env` file
- on your terminal run `php artisan generate:key`
- on the project directory, open terminal, excecute in your terminal the command `composer install` & `npm install && npm run dev`
- after installing composer dependencies, setup your local MySQL server, then create your a test Database
- copy project directory .env.example to .env, and then set local MySQL DB credentials and DB name
- then, execute `php artisan migrate` in your terminal