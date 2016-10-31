# Wordpress composer skeleton

This is simple a skeleton repo for a WordPress site. You can fork it and submit your change with a pull request on develop branch !

## Specificity

* Public folder for your web server : `public`
* WordPress directory : `public/wp/`
* Custom content directory : `public/content/`

Tested with :

* Wordpress 4.5.* / 4.6.0 / 4.6.1
* Wordpress single / multi website

## Installation

This architecture can be used in **development** and **production** environment. For change environment configuration you need to change 
**WORDPRESS_ENV** value in .htaccess or your server configuration.

### Development

**> Get wordpress and packages**

```
composer install
```

**> Update database info**

Edit your `public/wp-config`
```
/** MySQL database name */
define('DB_NAME', 'database_name_here');
/** MySQL database username */
define('DB_USER', 'username_here');
/** MySQL database password */
define('DB_PASSWORD', 'password_here');
/** MySQL hostname */
define('DB_HOST', 'localhost');
``` 

**> Launch your local server**

```
$ cd public
$ php -S localhost:8000
```

### Production

**> Get wordpress and packages and optimize composer**

```
composer install --no-dev --prefer-dist --no-interaction --optimize-autoloader
```

**> Set env to PROD**

Edit your `public/.htaccess`

```
SetEnv WORDPRESS_ENV PROD
```

**> Update database info**

Edit your `public/wp-config`
```
/** MySQL database name */
define('DB_NAME', 'database_name_here');
/** MySQL database username */
define('DB_USER', 'username_here');
/** MySQL database password */
define('DB_PASSWORD', 'password_here');
/** MySQL hostname */
define('DB_HOST', 'localhost');
``` 

**> Send on your prod server**