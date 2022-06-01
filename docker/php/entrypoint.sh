#!/bin/bash

chown -R www-data:www-data /var/www/html/public
chown -R www-data:www-data /var/www/html/storage/logs
chown -R www-data:www-data /var/www/html/storage/framework
chmod -R 777 /var/www/html/public
chmod -R 777 /var/www/html/storage/logs
chmod -R 777 /var/www/html/storage/framework

composer install --no-interaction --no-progress

npm install -g n
n 20.2.0
npm install -g npm@9.7.2
npm install
#npm install
#npm run build

#php bin/console cache:clear
#php bin/console doctrine:migrations:migrate --no-interaction
#php bin/console doctrine:fixtures:load --no-interaction

# utrzymuje kontener przy życiu - nie zamyka apache
# wyświetla logi apacha
exec docker-php-entrypoint apache2-foreground
