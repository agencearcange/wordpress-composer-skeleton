![wordpress-composer-skeleton](https://i.imgur.com/gXJ0EWm.png)

# [WPress composer-skeleton](https://github.com/agencearcange/wordpress-composer-skeleton)

[![Packagist](https://img.shields.io/packagist/v/agencearcange/wordpress-composer-skeleton.svg)](https://packagist.org/packages/agencearcange/wordpress-composer-skeleton)

Simple, light and powerful WordPress skeleton for a WordPress site managed by composer. 

Tested with :

- Wordpress 4.5.* => 5.4.*
- Wordpress single / multi website

Specifications :

- Public folder : `public`
- WordPress directory : `public/wp/`
- Custom content directory : `public/content/`
- Env file : `.env`
- Settings : `config/`
- Autoload your must-use plugins with [bedrock-autoloader](https://github.com/roots/bedrock/blob/master/web/app/mu-plugins/bedrock-autoloader.php)

## Installation

Use composer to create new project.

```
composer create-project agencearcange/wordpress-composer-skeleton
```

## Usage

- Update environment variables in the `.env` file - [you can generate salts here](https://roots.io/salts.html)
- Use `docker-compose up -d` or other mysql database.
- Start your local server 

```
$ cd wordpress-composer-skeleton
$ php -S localhost:8000 -t public

// or 

$ cd wordpress-composer-skeleton
$ symfony serve --no-tls
```

**Adding theme**

Add your theme into `public/content/themes`

**Adding plugin**

Add any required plugins, from their [wpackagist](http://wpackagist.org/) packages or by adding your custom plugins into `public/content/plugins`

```
composer require wpackagist-plugin/contact-form-7
```

## Use twig

If you want to install [timber/timber](https://github.com/timber/timber) library, you can just install it with composer :

```
composer require timber/timber
```

See [the starter theme](https://github.com/timber/starter-theme) to try it.


## Production

Optimize composer install

```
composer install --no-dev --prefer-dist --no-interaction --optimize-autoloader
```

Edit the `.env` to set `WP_ENV`

```
WP_ENV='production'
```

Send to your prod server via FTP or with your favorite deployment tool  :rocket:

## Contribution

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License

[MIT](https://choosealicense.com/licenses/mit/)


