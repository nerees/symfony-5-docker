# Docker container with PHP 7.2 MariaDB Nginx and Symfony 5 application

THIS PROJECT USES LHMT API for forecast
https://api.meteo.lt/

1. YOU HAVE TO INSTALL DOCKER and DOCKER-Compose
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
4. TRY
```
After some time you should see JSON message on your localhost
http://localhost/

"Welcome to API ..."

```

5. API 

The api GET method with url "http://localhost/api/products/recommended/telsiai"
 
```

6 To run fixtures
```
Regenerates 100 demo products for application

Make sure you are on src catalog, where your symfony application is and
RUN:
bin/console doctrine:fixtures:load


```

7. HOSTING ON HEROKU
```
Pending
```

8. MORE INFO SOON
```
still completing some things ... :-)
Hope You like it
Best wishes!
Nerijus