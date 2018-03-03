
# Setup

Go to your root path and type:
* Create .env file &nbsp; ```cp .env.example .env``` &nbsp; and change database information like so: <br />
    &emsp; DB_DATABASE=yourDatabaseName <br />
    &emsp; DB_USERNAME=yourUsername <br />
    &emsp; DB_PASSWORD=yourPassword (leave blank if you don't have any) <br />
* Run &nbsp; ```composer update```  
* Run &nbsp; ```php artisan key:generate```
* Create and seed the table &nbsp; ```php artisan migrate:refresh --seed```




