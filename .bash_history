sudo chmod ugo+rwx /etc/
sudo chmod ugo+rwx /var/www/clinicamosconi/storage/logs/laravel.log 
sudo chmod ugo+rwx /var/www/clinicamosconi/storage/logs/
sudo php artisan config:clear
sudo php artisan cache:clear
sudo php artisan config:cache
sudo service apache2 restart
sudo chmod ugo+rwx /var/www/clinicamosconi/storage/framework/sessions/
sudo chmod ugo+rwx /var/www/clinicamosconi/storage/framework/views/
sudo php artisan config:clear
sudo php artisan cache:clear
sudo php artisan config:cache
