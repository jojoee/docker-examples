# Docker Examples

[![Greenkeeper badge](https://badges.greenkeeper.io/jojoee/docker-examples.svg)](https://greenkeeper.io/)

Docker examples :p, please check all services in `docker-compose.yml`

## Getting Started

1. Install Docker
2. Clone project: `git clone https://github.com/jojoee/docker-examples.git`
3. Go to repository directory: `cd docker-examples`
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

## Source

1. Install Composer
2. Install Node.js

```
source/hello-php
- composer install

source/hello-node
- npm install -g yarn && yarn
```

## Folder structure

```
docker-examples
  ├── image
  └── source
```

## Update

- [ ] Deploy support
- [ ] Swarm mode
- [ ] Test script
- [ ] Merge similar services into one
- [ ] Load Balance
- [ ] Monitoring

## How to test it

```
- nginx (static)
http://localhost:8001
http://localhost:8001/image/test.png
http://localhost:8002
http://localhost:8002/image/test.png

- apache
- php
http://localhost:8011

- apache
- php
- mysql
http://localhost:8012

- apache (custom vhost)
- php
- mysql
http://localhost:8013
http://site91.doc:8013
http://site92.doc:8013
http://site92.doc:8013
http://localhost:8014
http://site101.doc:8014
http://site102.doc:8014
http://localhost:8015

- apache
- php (wordpress)
- mysql
http://localhost:8021
http://localhost:8022
http://localhost:8023

- node
http://localhost:8031
if want to try more please run
$ docker exec -it ctn_node /bin/bash
$ pm2 start index.js
http://localhost:8032

 - node (no volumes)
http://localhost:8033

- nginx
- php (fpm)
- mysql
http://localhost:8041
http://site111.doc:8041
http://site112.doc:8041

- phpMyAdmin
http://localhost:9001

- adminer
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
