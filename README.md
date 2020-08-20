# Docker container with PHP 7.2 MariaDB Nginx and Symfony 5 application

THIS PROJECT USES LHMT API for forecast
https://api.meteo.lt/

1. YOU HAVE TO INSTALL DOCKER and DOCKER-COMPOSE
```
https://docs.docker.com/engine/install/
https://docs.docker.com/compose/install/

```

2. NEXT: 

```
in your prefered dir
RUN

git clone https://github.com/nerees/symfony-5-docker.git

*You should see folder symfony-5-docker
```

3. Now You already have docker and docker-compose installed and downloaded repo from github:
```
ENTER DIRECTORY "symfony-5-docker"
cd symfony-5-docker

ENTER DIRECTORY "docker"
cd docker

RUN DOCKER
docker-compose up

```
4. TRYOUT
```
After some time you should see JSON message on your localhost
http://localhost/

{"message":"Welcome to products by weather API!","important":"Read the documentation first.","documentation":"documentation_link","author":"N.L."}


```

5. API 
```
The api GET method with url "http://localhost/api/products/recommended/{location}"

put city name instad of {location}, for example:
"http://localhost/api/products/recommended/telsiai"

You should get JSON with 10 recomended products by the weather
{"city":"telsiai","current_weather":"sunny","recommended_products":[{"sku":"11830689","name":"repellat","price":75.23},{"sku":"43310166","name":"in","price":75.54},{"sku":"92710467","name":"totam","price":18.53},{"sku":"07048258","name":"earum","price":29.77},{"sku":"07220586","name":"et","price":37.57},{"sku":"43361328","name":"sint","price":85.55},{"sku":"49828511","name":"quis","price":50.62},{"sku":"25504286","name":"numquam","price":96.47},{"sku":"77369291","name":"voluptatem","price":84.46},{"sku":"47433588","name":"placeat","price":34.13}]}

----------------
php curl example:

<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://localhost/api/products/recommended/telsiai",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

-------------------------------
 
```

6 TO RUN fixtures
```
Regenerates 100 demo products for application

Make sure you are on src catalog, where your symfony application is and
RUN:
bin/console doctrine:fixtures:load


```
7. SECURITY
```
Maybe CORS :/ pending .. :0

```
8. HOSTING ON HEROKU
```
https://fathomless-wildwood-19798.herokuapp.com/
ended with error ... :(  [remote rejected] master -> master (pre-receive hook declined)
Pending .... 
```

9. MORE INFO SOON
```
still completing some things ... :-)
Hope You like it
Best wishes!
Nerijus
