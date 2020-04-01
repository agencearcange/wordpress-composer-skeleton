# Wordpress composer skeleton

This is simple a skeleton repo for a WordPress site managed by composer.phar.

## Specifications

* Public folder for your web server : `public`
* WordPress directory : `public/wp/`
* Custom content directory : `public/content/`
* Configuration file : `config/`
* Autoload your must-use plugins with [bedrock-autoloader](https://github.com/roots/bedrock/blob/master/web/app/mu-plugins/bedrock-autoloader.php)

Tested with :

* Wordpress 4.5.* => 5.4.*
* Wordpress single / multi website

## Getting Started

1. Create a new mysql database for wordpress (local or use `docker-compose up -d`).
2. Install wordpress with `composer install`.
3. Add your theme into `public/content/themes`
4. Add any required plugins, from their [wpackagist](http://wpackagist.org/) packages or by adding your custom plugins into `public/content/plugins`
5. Launch your local server

### Installation

This architecture can be used in **development** and **production** environment.

For change environment configuration you need to change
**WP_ENV** value in **.env** file.

#### Development

**> Get wordpress and packages**

```
composer install
```
![composer install cmd](https://i.imgur.com/aAiEOX0.png)

**> Launch your local server**

```
$ php -S localhost:8000 -t public
// or 
$ symfony serve --no-tls
```

#### Production

**> Get wordpress and packages and optimize composer**

```
composer install --no-dev --prefer-dist --no-interaction --optimize-autoloader
```

**> Set env to PROD**

Edit the `.env` to set `WP_ENV`

```
WP_ENV='production'
```


**> Send to your prod server via FTP or with your favorite deployment tool :thumbsup:**

## Contribution

 You can fork it and submit your change with a pull request on develop branch !
