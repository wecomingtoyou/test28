### SETUP

```bash
git clone git@github.com:wecomingtoyou/test28.git
cd test28
cp .env.exemple .env
```
### edit env
```bash
DB_PASSWORD=password
DB_PASSWORD_ROOT=password
```
```bash
docker compose up -d
docker compose exec php composer install
docker compose exec php php artisan key:generate
```

### fake data

```bash
docker compose exec php php artisan migrate
docker compose exec php php artisan db:seed
```

### API

postman: https://www.postman.com/xworksteam/workspace/test/collection/24958248-92777384-73ae-41c8-b117-fe6aa6d53cd6

#### model listing
```bash
curl --location 'http://127.0.0.1:8787/api/v1/models'
```

#### brand listing
```bash
curl --location 'http://127.0.0.1:8787/api/v1/brands' \
--header 'Accept: application/json'
```

#### car listing
```bash
curl --location 'http://127.0.0.1:8787/api/v1/cars?per_page=2' \
--header 'Accept: application/json'
```
#### show car
```bash
curl --location 'http://127.0.0.1:8787/api/v1/cars/1' \
--header 'Accept: application/json'
```
```json
{
    "data": {
        "id": "1",
        "type": "cars",
        "attributes": {
            "color": "Olive",
            "mileage": 86149,
            "issued": "1991-08-04",
            "created_at": "2023-06-14 17:49:42",
            "updated_at": "2023-06-14 17:49:42"
        },
        "relations": {
            "model": {
                "id": "1",
                "type": "models",
                "attributes": {
                    "name": "cum"
                },
                "relations": {
                    "brand": {
                        "id": "1",
                        "type": "brands",
                        "attributes": {
                            "name": "eum"
                        }
                    }
                }
            }
        }
    }
}
```

#### create car
```bash
curl --location --request POST 'http://127.0.0.1:8787/api/v1/cars?vin=9c36a5ba-f79a-371f-b7d1-7720cb1ae02r&color=color%20name&mileage=10000&issued=1988-02-17&model_id=1' \
--header 'Accept: application/json'
```

```json
{
    "data": {
        "id": "51",
        "type": "cars",
        "attributes": {
            "vin": "9c36a5ba-f79a-371f-b7d1-7720cb1ae02r",
            "color": "color name",
            "mileage": 10000,
            "issued": "1988-02-17",
            "created_at": "2023-06-14 17:57:26",
            "updated_at": "2023-06-14 17:57:26"
        },
        "relations": {
            "model": {
                "id": "1",
                "type": "models",
                "attributes": {
                    "name": "cum"
                },
                "relations": {
                    "brand": {
                        "id": "1",
                        "type": "brands",
                        "attributes": {
                            "name": "eum"
                        }
                    }
                }
            }
        }
    }
}
```

#### update car
```bash
curl --location --request PATCH 'http://127.0.0.1:8787/api/v1/cars/1?vin=9c36a5ba-f79a-371f-b7d1-7720cb1ae02t&color=color%20name&mileage=10000&issued=1988-02-17&model_id=1' \
--header 'Accept: application/json'
```

```json
{
    "data": {
        "id": "1",
        "type": "cars",
        "attributes": {
            "vin": "9c36a5ba-f79a-371f-b7d1-7720cb1ae02t",
            "color": "color name",
            "mileage": 10000,
            "issued": "1988-02-17",
            "created_at": "2023-06-14 17:49:42",
            "updated_at": "2023-06-14 17:59:48"
        },
        "relations": {
            "model": {
                "id": "1",
                "type": "models",
                "attributes": {
                    "name": "cum"
                },
                "relations": {
                    "brand": {
                        "id": "1",
                        "type": "brands",
                        "attributes": {
                            "name": "eum"
                        }
                    }
                }
            }
        }
    }
}
```

#### delete car

```bash
curl --location --request DELETE 'http://127.0.0.1:8787/api/v1/cars/1' \
--header 'Accept: application/json'
```

### tests

```bash
docker compose exec php php artisan test
```
