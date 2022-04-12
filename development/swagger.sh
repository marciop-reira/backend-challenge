#!/bin/bash

.././vendor/bin/openapi -b ./swagger-constants.php -o ../public/swagger/openapi.json ./swagger-v1.php ../app/Http/Controllers ../app/Models --format json
