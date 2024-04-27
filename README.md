INSTALLATION:

1. Clone Repo
2. buka terminal dan masuk ke direktori projek
3. run ```composer install```
4. ubah nama file ```.env.example``` menjadi ```.env```
5. creata database mysql dengan nama ```fbsscan``` atau dengan nama lain tapi di setting di ```.env``` berikut:
   ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=fbsscan
    DB_USERNAME=root
    DB_PASSWORD=root
   ```
6. run ```php artisan migrate```
7. run ```php artisan serve```
8. buka paka web browser ```localhost:8000```
