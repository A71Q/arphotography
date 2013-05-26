About the project
=============================================================
This is a application to share photograph developed back in February 2010.

The exiting thing is that admin just upload the picture and its automatically
resized to thumb for display and on click it shows a small version maintaining the aspect ratio.

Another thing is its automatically add a copyright message in the picture.

Used CodeIgniter 1.7.2 as a framework for development.

Did couple of customization on jquery.galleria.js to show the image look better.

Happy Sharing :).

Considering the development environment is in MAC OS X
=============================================================

Couple of things have to fix before deploying the application
=============================================================
in /etc/php.ini
> short_open_tag = on
> upload_max_filesize = 16M

in /etc/apache2/httpd.conf
AllowOverRide All(or something else, but not None).
Apache won't read the rewrite rules nor the .htaccess-files if AllowOverRide is set to None.
>/etc/init.d/apache2 restart

in config.php
change $config['base_url']	= "http://10.1.1.12";

in database.php
$db['default']['password'] = "PASSWORD"; // if you have pass set for database

Deploy application
=============================================================
>ant deploy
>chmod 777 -R upload //give write access to upload folder
restart apache

Default Username:admin
Default Password:pass