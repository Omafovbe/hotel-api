


## Hotel-API

RESTful API endpoints for an Hotel. Built with [Laravel](https://laravel.com)
Remember to edit the ```.env``` file so as to set the database credentials

Getting Started
----
Clone this project and run composer

```
composer install
```

## Seeders

Generate dummy data with the help of fakers...

```
php artisan db:seed --class=HotelDetailSeeder
```

## Endpoints

These API Routes are categorized by their tables in the database

* **_Hotel Details_**

| Method       | URL         | Description  |
| ------------- |-------------| -----|
| GET      | api/hotels | All hotels |
| PUT      | api/hotel/{id} | Update hotel by ID |
| POST | api/hotel | Store an hotel information |
| DELETE | api/hotel/{id} | Delete an hotel |

* **_Customer Manager_**

| Method       | URL         | Description  |
| ------------- |-------------| -----|
| GET      | api/customers | All Customers |
| GET      | api/customer/{object} | Single Customer
| PUT      | api/customer/{id} | update customer by ID |
| POST | api/customer | store customer info |
| DELETE | api/customer/{object} | Delete customer |

* **_Room Capacity Manager_**

| Method       | URL         | Description  |
| ------------- |-------------| -----|
| GET      | api/room/capacity | List all room capacity |
| GET      | api/room/capacity/{ID} | Get a room capacity by ID
| PUT      | api/room/capacity{object} | update room capacity |
| POST | api/room/capacity | store room capacity info |
| DELETE | api/room/capacity/{object} | Delete room capacity |

* **_Room Type Manager_**

| Method       | URL         | Description  |
| ------------- |-------------| -----|
| GET      | api/room/type | List of all room types |
| GET      | api/room/type/{ID} | Get a room type by ID
| PUT      | api/room/type{object} | update room type |
| POST | api/room/type | store room type info |
| DELETE | api/room/type/{object} | Delete room type |

* **_Room Manager_**

| Method       | URL         | Description  |
| ------------- |-------------| -----|
| GET      | api/rmanager | List all rooms  |
| GET      | api/rmanager/{object} | Get a room info by ID |
| PUT      | api/rmanager/{object} | update room info |
| POST | api/rmanager | store room info |
| DELETE | api/rmanager/{object} | Delete room |

* **_Price List_**

| Method       | URL         | Description  |
| ------------- |-------------| -----|
| GET      | api/pricelist | Full list of prices  |
| GET      | api/pricelist/{object} | Get a price list  |
| PUT      | api/pricelist/{object} | update price list |
| POST | api/pricelist | store price list info |
| POST | api/search/pricelist | being able to query/filter the pricelist
| DELETE | api/pricelist/{object} | Delete pricelist|

## Test

On the terminal run unit test with the command while in the project directory:-

```
$ vendor/bin/phpunit
```

## Authentication

Subsequently äuthentication will be added...



