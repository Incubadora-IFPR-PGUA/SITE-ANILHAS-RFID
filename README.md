# COMO USAR

1 - De um COMPOSER INSTALL
2 - Inicie seu banco, se for windows abra pelo XAMPP, se for linux acesse no navegador o link http://localhost/phpmyadmin
3 - Apos isso configure o .env.example para .env e insira seus dados
4 - Faca o comando php artisan key:generate
5 - De migrate nas seeder e migrations com o comando php artisan migrate:fresh --seed
6 - Crie um link com seu storage para cadastros que utilizam o pdf com o comando php artisan storage:link
7 - Inicie o servidor com o comando php artisan serve