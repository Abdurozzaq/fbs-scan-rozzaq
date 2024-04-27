INSTALLATION:

1. Clone Repo
2. run ```composer install```
3. creata database mysql dengan nama ```fbsscan``` atau dengan nama lain tapi di setting di env berikut:
   ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=fbsscan
    DB_USERNAME=root
    DB_PASSWORD=root
   ```
4. buka terminal dan masuk ke direktori projek
5. run ```php artisan migrate```
6. run ```php artisan serve```
7. buka paka web browser ```localhost:8000```
