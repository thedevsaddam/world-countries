World Countries
===================


This package contains world country list along with states, cities, country code and country flags.

----------


Installation
-------------
Via Composer

``` bash
$ composer require thedevsaddam/world-countries
```
Install manually (add the line to composer.json file)
``` bash
"thedevsaddam/world-countries": "1.1"
```
Open your terminal and hit the command
```bash
composer update
```

Add the following line to config/app.php file

```bash
        Thedevsaddam\WorldCountries\WorldCountriesServiceProvider::class,

```
To publish the configuration and resources

```bash
php artisan vendor:publish
```

###### ***If you need only flags then avoid the command below. The command will required when you are going to use countries with states, cities, country code etc***
```bash
php artisan world-countries:populate
```
The above command will populate the countries and other tables to database

To drop the populated tables
```bash
php artisan world-countries:drop
```

### **Usage**
To fetch all the countries with flag. This will return a collection object so that you can use the available method of Collection class

```bash
WorldCountries::getCountriesWithFlag();
```


##### Example
```
$countries = WorldCountries::getCountriesWithFlag();
foreach($countries as $key => $country){
    echo "<img src='".$country['flagLargeUrl']."' />";
    echo $country['name'];
    echo "<br/><hr/>";
}
// you can use all the method of Collection class

$country = WorldCountries::getCountriesWithFlag()->where('name', 'Bangladesh');
```

#### Fetch all the countries with  state and cities ####
```
$countries = WorldCountries::getCountriesWithStateCity();

//Note: This query will take some time to fetch all the countries with its associate states and cities

```
#### Get Eloquent model to perform custom query

```
$countryModel = WorldCountries::getCountryModel();

//Fetch all the countries in array
$countries = $countryModel->get()->toArray();

//Fetch all the countries with states
$countriesWithStates = $countryModel->with('states')->get();

//Note: you can use Laravel eloquent available methods (See the below example)

$countryModel = WorldCountries::getCountryModel();
$country = $countryModel->where('name', 'Bangladesh')->first();
```

##### Config
If you change the flag directory name or path then update the config/flag.php file_path according to the path name

##### Credit

###### Flag and country list json from: [cristiroma](https://github.com/cristiroma/countries)

###### Countries, state and cities mysql dump from: [cristiroma](https://github.com/cristiroma/countries)

Thank you :)