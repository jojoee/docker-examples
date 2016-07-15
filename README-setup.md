## Install
1. `sudo apt-get install libapparmor1 aufs-tools ca-certificates wget curl`
2. Install `Docker`
```
$ cd /home/joe/Downloads
$ wget https://apt.dockerproject.org/repo/pool/main/d/docker-engine/docker-engine_1.8.2-0~trusty_amd64.deb
$ sudo dpkg -i docker-engine_1.8.2-0~trusty_amd64.deb
$ sudo usermod -aG docker $(whoami)
$ docker --version
```
3. Install `docker-compose`
```
$ curl -L https://github.com/docker/compose/releases/download/1.4.2/docker-compose-Linux-x86_64 > /tmp/docker-compose
$ chmod +x /tmp/docker-compose
$ sudo mv /tmp/docker-compose /usr/local/bin
$ docker-compose --version
```
4. Install `Sublime Text`
```
1. Download "sublime-text_build-3114_amd64.deb" from https://www.sublimetext.com/3
2. Open that file and install (by double click)

3. If it not work, please follow this
3.1 Reinstall "software-center"
  $ sudo apt-get remove software-center
  $ sudo apt-get autoremove software-center
  $ sudo apt-get update
  $ sudo apt-get install software-center
3.2 Open it again by `Open with "Ubuntu Software Center"`
3.3 Test
  $ subl .
```
5. Install git
```
$ sudo apt-get install git
$ git config --global user.email "inid3a@gmail.com"
$ git config --global user.name "Nathachai Thongniran"
$ git init && git add -A && git commit -m "Initial commit"
```

## Setup shared folder with VirtualBox
1. Set shared folder: `Devices > Shared Folders > Shared Folders Settings...`
2. `sudo usermod -a -G vboxsf $(whoami)`  
(Add your user to `vboxsf` group that allow you to mount without using `sudo`)
3. If it not work, please follow this
```
Insert disk: `Devices > Insert Guest Additions CD images...`

$ sudo apt-get update
$ sudo apt-get install virtualbox-guest-additions-iso virtualbox-guest-utils
$ sudo mount /dev/sr0 /media/cdrom/
$ cd /media/cdrom
$ sudo ./VBoxLinuxAdditions.run
$ sudo usermod -aG vboxsf $(whoami)
$ sudo reboot
$ sudo ln -s /media/sf_shared $HOME/Shared
```

## Reference
- http://askubuntu.com/questions/133456/can-i-uninstall-and-reinstall-ubuntu-software-center
- http://askubuntu.com/questions/701998/is-possible-to-install-virtualbox-in-a-ubuntu-server-14-04
- http://askubuntu.com/questions/161759/how-to-access-a-shared-folder-in-virtualbox
- http://askubuntu.com/questions/456400/why-cant-i-access-a-shared-folder-from-within-my-virtualbox-machine
- http://askubuntu.com/questions/321589/unable-to-mount-the-cd-dvd-image-on-the-machine-sandbox
- http://askubuntu.com/questions/573596/unable-to-install-guest-additions-cd-image-on-virtual-box
- http://ubuntuforums.org/showthread.php?t=1871552
- http://linuxys.blogspot.com/2014/02/virtualbox-could-not-mount-mediadrive.html
