
## Word Search

- Find word definitions

### How to setup locally
Instructions:
- clone repo to local machine
- create a duplicate file of `.env.example` then rename it to `.env` file
- on your terminal run `php artisan generate:key`
- on the project directory, open terminal, excecute in your terminal the command `composer install` & `npm install && npm run dev`
- after installing composer & npm dependencies, setup your local MySQL server, then create your a test Database. Dont forget to change value of the variable `DB_DATABASE` in `.env` file
- then, execute `php artisan migrate` in your terminal
- access application through a browser using the root url assign on local machine