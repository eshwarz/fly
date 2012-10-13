flyPHP
======

Fly MVC framework for PHP



Installation Notes:
===================

1. Clone the project for github repo

2. Give 777 permissions to temp folder, its important to do this because fly relies on creating temporary files for rendering HTML pages.

3. Rename the 'fly' folder to your project name.

4. Define SERVER_PATH constants correctly so that it matches your server. (SERVER_NAME is different from SERVER_PATH in case you have multiple projects)

5. Enable rewrite module in apache config. (Ubuntu users: sudo a2enmod rewrite)

6. In apache httpd.conf file set "AllowOverride None" to "AllowOverride All". This is makes sure that apache reads the .htaccess file in fly folder.

7. Restart the apache server after the changes are made.

8. Configure your database in db/connection.php

9. 