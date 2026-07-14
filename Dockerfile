FROM php:8.2-apache
COPY . /var/www/html/
EXPOSE 80
CMD sh -c 'sed -i "s/Listen 80/Listen ${PORT:-80}/g" /etc/apache2/ports.conf && sed -i "s/<VirtualHost \*:80>/<VirtualHost *:${PORT:-80}>/g" /etc/apache2/sites-available/000-default.conf && apache2-foreground'