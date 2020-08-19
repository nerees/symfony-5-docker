# Symfony 5 docker container with PHP 7.2 MariaDB Nginx and Symfony application

#FIRST YOU HAVE TO INSTALL DOCKER and DOCKER-Compose

```
#NEXT: 
RUN
git clone https://github.com/nerees/symfony-5-docker.git

cd symfony-5-docker

cd docker

docker-compose up
```



```
 
```

# To run fixtures
Regenerates 100 demo products for application

```
Make sure you are on src catalog, where your symfony application is and
RUN:
bin/console doctrine:fixtures:load
```

