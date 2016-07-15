# Docker Examples
This is A basic docker examples

```
docker-compose
- node
- php
- php-mysql
- static
- wordpress
images
- node
- php
- php-mysql
- static
sources
- php
- php-mysql
- static
- wordpress
```

## Tutorial (basic)
1: `docker run ubuntu echo "Hello world"`
```
1. Pull "ubuntu" image with `latest` tag (if you don't have it on local)
2. Create container image with random name
3. Run the container and run `echo "Hello world"` inside container
4. Now you will get `Hello world` in your console
```
2: `docker run ubuntu ping google.com`
```
Cause you want to "ping" some website then 
you will got an error because "ping" was not installed in ubuntu image by default
```
3: `docker run ubuntu apt-get install -y ping`
```
You trying to install `ping` inside it then
you will got new container
```
4: `docker commit <containerName>`
```
You will got new ubuntu image with "ping" command
```
5: `docker run <containerImage/containerId> ping google.com`

## 3 ways to start container
1. Use other image
2. Build you own image
3. `docker-compose`

## Example projects
Move this repository to follow this instruction

### Static
```
Method 1 - Other image
docker run -p 80:80 -d -v ~/Projects/sources/static:/usr/share/nginx/html:ro nginx

Method 2 - Own image
cd ~/Projects/images/static
docker build -t joestatic .
docker run -p 80:80 -d -v ~/Projects/sources/static:/var/www joestatic

Method 3 - docker-compose
cd ~/Projects/docker-compose/static
docker-compose up -d

Test
- /
- /sample.html
- /images/sample.jpg
- /pdfs/sample.pdf
```
### PHP
```
Method 1 - Other image
docker run -d -p 80:80 -v ~/Projects/sources/php:/var/www/html php:5.6-apache

Method 2 - Own image
cd ~/Projects/images/php
docker build -t joephp .
docker run -d -p 80:80 -p 443:443 -e API_TOKEN=arandomapitokenkey -v ~/Projects/sources/php:/var/www/public joephp

Method 3 - docker-compose
cd ~/Projects/docker-compose/php
docker-compose up -d

Test
- /
```
### Node
```
Method 2 - Own image
cd ~/Projects/images/node
docker build -t joenode .
docker run -p 80:8080 -d joenode

Method 3 - docker-compose
cd ~/Projects/docker-compose/node
docker-compose up -d

Test
- /
```
### PHP-MySQL
```
Method 2 - Own image
cd ~/Projects/images/php-mysql
docker build -t joephpmysql .
docker run --name joemysql_container -e MYSQL_ROOT_PASSWORD=password -e MYSQL_DATABASE=test_db -d -v ~/.docker-volumes/joephpmysql/mysql/data:/var/lib/mysql mysql:5.7.13
docker run --name joephpmysql_container -d -p 80:80 --link joemysql_container:mysqlhost -v ~/Projects/sources/php-mysql:/var/www/html joephpmysql

Method 3 - docker-compose
cd ~/Projects/docker-compose/php-mysql
docker-compose up -d

Test
- /
```
### Wordpress
```
Method 1 - Other image
docker run --name wordpressdb -e MYSQL_ROOT_PASSWORD=password -e MYSQL_DATABASE=wordpress -d -v ~/.docker-volumes/wordpress/mysql/data:/var/lib/mysql mysql:5.7.13
docker run --name wordpress -d -p 80:80 --link wordpressdb:mysqlhost -v ~/Projects/sources/wordpress:/var/www/html -e WORDPRESS_DB_HOST=mysqlhost -e WORDPRESS_DB_PASSWORD=password -e WORDPRESS_DB_NAME=wordpress wordpress:4.5

Method 3 - docker-compose
cd ~/Projects/docker-compose/wordpress
docker-compose up -d

Note
- Media will be stored on "host"

Test
- /
```

## TODO
- Static
  - [ ] Other image
  - [x] Other image + volume
  - [ ] Own image
  - [x] Own image + volume
  - [ ] docker-compose
  - [x] docker-compose + volume
- PHP
  - [ ] Other image
  - [x] Other image + volume
  - [ ] Own image
  - [x] Own image + volume
  - [ ] docker-compose
  - [x] docker-compose + volume
- NODE
  - [ ] Other image
  - [ ] Other image + volume
  - [x] Own image
  - [ ] Own image + volume
  - [x] docker-compose
  - [ ] docker-compose + volume
- PHP-MySQL
  - [ ] Other image
  - [ ] Other image + volume
  - [ ] Own image
  - [x] Own image + volume
  - [ ] docker-compose
  - [x] docker-compose + volume
- Wordpress
  - [ ] Other image
  - [x] Other image + volume
  - [ ] Own image
  - [ ] Own image + volume
  - [ ] docker-compose
  - [x] docker-compose + volume

## Thank you
- Dummy content from [wptest.io](http://wptest.io/)

## Images
- [wordpress](https://hub.docker.com/_/wordpress/)

## Reference
- [Docker](https://www.docker.com/)
