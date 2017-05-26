## What does `Docker` do ?
- Packages a service into a standardized unit
- Everything is included to make it run

## Benefits of using Docker
- Scale up quickly
- Cross env consistency

## Tools & Keywords
- [boot2docker](http://boot2docker.io/): lightweight Linux distribution made to run Docker container
- Application: an application (e.g. apacha, php, mysql, wordpress, laravel)
- Docker Engine: create image and run container
- Docker Compose: for running Docker multiple containers (docker-compose.yml)
- [Docker Cloud](https://cloud.docker.com/): hosted service for building, testing and deploying Docker images to your hosts
- Docker Image: an image contains everything (application) your service needs to run (made by Dockerfile)
- Docker Container: a container is a running instance of an image (docker image)
- Docker Machine: automate container provisioning on your network (like JVM for running Java)
- Docker Client: a program used for play Docker
- Docker Registry: is the store for Docker iamge (hosted registry service)
- [Docker Hub](https://hub.docker.com/): public Docker Registry (like Github or `npm` for node)
- Dockerfile is instructions to build Docker image
- Docker Quickstart terminal app: terminal for running Docker
- Kitematic: Docker GUI
- Oracle VM VirtualBox: used for simulate `Linux` for using with Docker Machine
- Docker Swarm:
- Docker Master:
- Docker Node:
- Kubernetes:
- Mesos:

## Cli

``` bash
Basic
$ docker run hello-world
$ docker run busybox echo "Hello world"
$ docker run ubuntu echo "Hello world"
$ docker run docker/whalesay cowsay boo-boo
$ docker run ubuntu apt-get install -y ping & ping google.com -c 2
$ docker build -t jojoee/whalesay ./image/whalesay
$ docker run jojoee/whalesay

Cli
$ docker-compose build
$ docker-compose build <service-name>
$ docker-compose up
$ docker-compose up <service-name>
$ docker-compose up -d
$ docker --help
$ docker rmi <image-name>
$ docker rmi $( docker images -q -f dangling=true)
$ docker rm -f <container-name>
$ docker rm -f $(docker ps -aq)
$ docker rm -f <container-name> & docker-compose build <service-name> & docker-compose up -d <service-name>
$ docker-compose up -d <service-name>
$ docker log <container-name>
$ docker exec -it <container-name> /bin/bash
$ docker exec -it ctn_node /bin/bash

For Window guy run this command before start it
$ export COMPOSE_CONVERT_WINDOWS_PATHS=0
```
