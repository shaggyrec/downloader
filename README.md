# Downloader

### Download manager using laravel

## Preparations

Run the command to install dependencies and to create database 

        ./install.sh
         
## Run application

    php artisan serve
    
### Web-interface

Open in browser
    
    http://localhost:8000/
    
### Api methods

#### GET /api/files

Retrieves the files list

+ Response 200
    +
            
            {
                "type": "object",
                "items": {
                    "type": "object",
                    "properties": {
                        "id": {"type": "integer"},
                        "src": {"type": "string"},
                        "url": {"type": "string"},
                        "status": {"type": "string"}
                    }       
                }
            } 

#### POST /api/to-queue

Adds file to the queue

+ Request
    + src (required | string) - path to the file
+ Response 200


### CLI commands 

To retrieve the files list:

    php artisan list-of-files

To add file to the queue:
    
    php artisan to-queue {pathToFile}

## Tests 

    ./vendor/bin/phpunit
