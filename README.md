flyPHP
======

Fly MVC framework for PHP



Installation Notes:
===================

1. Clone the project for github repo

2. Give 777 permissions to following folders
	- temp/
	- app/assets/stylesheets/compiled/
	- vendor/assets/stylesheets/compiled/

3. Rename the 'fly' folder to your project name.

4. Its very important to create a virtual host for fly project (Lots of tutorials are available for setting up virtual host, please google and create a virtual host for your fly project)

5. Enable rewrite module in apache config. (Ubuntu users: sudo a2enmod rewrite)

6. In apache httpd.conf file set "AllowOverride None" to "AllowOverride FileInfo" or to "AllowOverride All" if first doesn't work. This is makes sure that apache reads the .htaccess file in fly folder.

7. Enable short tags by changing "short_open_tag = Off" to "short_open_tag = On" (without quotes) in php.ini.

8. Restart the apache server after the changes are made.

9. Configure your database in db/connection.php