# Docker Examples
This is A basic docker examples

## Tutorial (basic)
1. Run `docker run ubuntu echo "Hello world"`
  > It will  
  > 1. Pull `ubuntu` image with `latest` tag  
  >    (if you don't have it on local)  
  > 2. Create container image with random name  
  >    (or you can use `docker run --name <containerName> <containerImage> <command>` for specify your container name)  
  > 3. Run the container and run `echo "Hello world"` inside container.  
  >    So you will get `Hello world` in your console
2. `docker run ubuntu ping google.com`, cause you want to `ping` some website
  > You will got an error because `ping` is not installed in ubuntu image by default
3. `docker run ubuntu apt-get install -y ping`, you trying to install `ping` inside it 
  > You will got new container
4. `docker commit <containerName>`
  > You will got new ubuntu image with `ping` command
5. `docker run <containerImage/containerId> ping google.com`, test it with your new container

## Projects

