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
- Dockerfile
```
Dockerfile is instructions to build Docker image
e.g.
- How to run commands
- Add files or directories
- Create environment variables
- What process to run when launching container
```
- Docker Quickstart terminal app: terminal for running Docker
- Kitematic: Docker GUI
- Oracle VM VirtualBox: used for simulate `Linux` for using with Docker Machine
- Docker Swarm: ????
- Docker Master: ????
- Docker Node: ????
- Kubernetes: ????
- Mesos: ????
