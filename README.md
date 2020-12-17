### Linux Installation
- git clone https://github.com/thalysantana/inventory.git
- cd inventory
- composer install --no-dev
- docker-compose up --build

- Access http://localhost

### Test execution
docker-compose exec -T app php artisan test

### Workflow logic
- Validate if there is enough quantity in hand to fulfill the application.
- Get only purchases that weren't used on previous applications or still have some available quantity.
- Retrieve price from the oldest purchases available taking into consideration the quantity available on each of them.
- Sum the total price of purchases used to fulfill the application.

### Additional notes
- Built using Vue JS, Laravel and MySQL.
- CSV data will be loaded to MySQL using migration and seed. 
