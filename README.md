# Docker Examples

Docker examples :p

## Getting Started

1. Install Docker
2. Clone project: `git clone https://github.com/jojoee/docker-examples.git`
3. Go to repository directory: `cd docker-examples
4. Copy: `cp -a source/hello-node/. image/node/`
5. Create volumns folder: `mkdir ~/Volumns`
6. Add point domain name into host file
```
127.0.0.1 site91.doc
127.0.0.1 site92.doc
127.0.0.1 site101.doc
127.0.0.1 site102.doc
127.0.0.1 site111.doc
127.0.0.1 site112.doc
```

Then run: `docker-compose up -d`

## Folder structure

```
docker-examples
  ├── image
  └── source
```

## Update

```
- [ ] Deploy support
- [ ] Swarm mode
- [ ] Test script
- [ ] Merge similar services into one
- [ ] Load Balance

Static
- [x] Nginx for static

PHP
- [ ] Stack for development
- [x] Apache
- [x] Apache (custom vHost)
- [x] Apache + MySQL (PDO)
- [x] Apache + MySQL (mysqli)
- [ ] Apache + MySQL (PDO) + MongoDB + Redis + RabbitMQ + beanstalkd
- [ ] Nginx + PHP-FPM (custom vHost)

Wordpress
- [x] Apache

Node
- [x] No server
- [ ] No server + pm2
- [ ] Stack for development
- [ ] Nginx (custom vHost)
- [ ] Nginx + MySQL (PDO) + MongoDB + Redis + RabbitMQ + beanstalkd

Database
- [x] memcached
- [x] MySQL
- [x] MariaDB
- [x] MongoDB

Queue
- [x] beanstalkd
- [x] RabbitMQ

Tool
- [x] phpMyAdmin
- [x] adminer
```

## How to test it

```
Staic
http://localhost:8001
http://localhost:8001/image/test.png
http://localhost:8002
http://localhost:8002/image/test.png

PHP
http://localhost:8003
http://localhost:8004

Wordpress
http://localhost:8005

Node
http://localhost:8006
if want to try more please run
$ docker exec -it ctn_node /bin/bash
$ pm2 start index.js
http://localhost:8007

Apache + PHP + Custom vHost
http://localhost:8009/
http://site91.doc:8009/
http://site92.doc:8009/
http://site92.doc:8009/

http://localhost:8010/
http://site101.doc:8010/
http://site102.doc:8010/

Nginx + PHP-FPM
http://localhost:8011/
http://site111.doc:8011/
http://site112.doc:8011/

Node (bundle app inside)
http://localhost:8012/

Tool
phpMyAdmin
http://localhost:9001

adminer
http://localhost:9002
```

## Reference

- [Dockerfile reference](https://docs.docker.com/engine/reference/builder/)
- [Compose file version 2 reference](https://docs.docker.com/compose/compose-file/compose-file-v2/)

### Tutorial

- [Docker for Beginners](https://prakhar.me/docker-curriculum/)
- [Docker Documentation](https://docs.docker.com/)
- [Dockerizing a Node.js web app](https://nodejs.org/en/docs/guides/nodejs-docker-webapp/)
- [Apache and PHP on Docker](https://writing.pupius.co.uk/apache-and-php-on-docker-44faef716150)
- [Dockerizing a PHP Application](https://semaphoreci.com/community/tutorials/dockerizing-a-php-application)
- [From Vagrant to Docker: How to use Docker for local web development](http://tech.osteel.me/posts/2015/12/18/from-vagrant-to-docker-how-to-use-docker-for-local-web-development.html)
- [Docker for PHP Developers](http://www.newmediacampaigns.com/blog/docker-for-php-developers)
- [Difference between links and depends_on in docker_compose.yml](http://stackoverflow.com/questions/35832095/difference-between-links-and-depends-on-in-docker-compose-yml)

### Example projects

- [docker/example-voting-app](https://github.com/docker/example-voting-app)
- [CentOS/CentOS-Dockerfiles](https://github.com/CentOS/CentOS-Dockerfiles)

### Future reading

- [Docker ADD vs VOLUME](http://stackoverflow.com/questions/27735706/docker-add-vs-volume)
- [What is the difference between the `COPY` and `ADD` commands in a Dockerfile?](http://stackoverflow.com/questions/24958140/what-is-the-difference-between-the-copy-and-add-commands-in-a-dockerfile)
- [How is Docker different from a normal virtual machine?](http://stackoverflow.com/questions/16047306/how-is-docker-different-from-a-normal-virtual-machine)
- [A curated list of Docker resources and projects](https://github.com/veggiemonk/awesome-docker)
- [Guidance for Docker Image Authors](http://www.projectatomic.io/docs/docker-image-author-guidance/)
- [Understanding Volumes in Docker](http://container-solutions.com/understanding-volumes-docker/)
