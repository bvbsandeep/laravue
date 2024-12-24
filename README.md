## Set-Up instructions
Make a copy of .env.example and rename the copied file to .env within the same folder location

Open two terminal tabs
1) In first terminal, navigate to resources/js folder and run npm install and later run npm run dev
2) In second terminal, navigate to laravue/ main folder and run composer install and then do php artisan migrate
   and then run php artisan serve (here we get the url)
   Now, in the web browser goto the url obtained in the 2nd step (usually it would be http://localhost:8000 or similar) 

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
