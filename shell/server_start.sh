#! /bin/bash
### BEGIN INIT INFO
# Provides:          cpeter.com
# Required-Start:    $local_fs $network
# Required-Stop:     $local_fs
# Default-Start:     2 3 4 5
# Default-Stop:      0 1 6
# Short-Description: server start service
# Description:       service daemon
### END INIT INFO
docker start 13625caa9f6a
docker start daf2f8158a52
docker start 03b9e0f02f30 
docker start af6c2c530fed

nohup java -jar /home/hh/demo1-0.0.1-SNAPSHOT.jar &
nohup java -jar /home/mobile-0.0.1-SNAPSHOT.jar &