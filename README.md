# INSTALLATION TORANN FOR WEBSITE DEVELOPMENT

## Move Directory
cd SIGA

## Composer
From the command line run:

$ composer require torann/geoip
## Laravel
Once installed you need to register the service provider with the application. Open up config/app.php and find the providers key.

'providers' => [

    \Torann\GeoIP\GeoIPServiceProvider::class,

]
This package also comes with an optional facade, which provides an easy way to call the the class. Open up config/app.php and find the aliases key.

'aliases' => [

    'GeoIP' => \Torann\GeoIP\Facades\GeoIP::class,

];
## Publish the configurations
Run this on the command line from the root of your project:

php artisan vendor:publish --provider="Torann\GeoIP\GeoIPServiceProvider" --tag=config
A configuration file will be publish to config/geoip.php.
