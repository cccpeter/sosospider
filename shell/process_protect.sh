#! /bin/sh
### BEGIN INIT INFO
# Provides:          bbzhh.com
# Required-Start:    $local_fs $network
# Required-Stop:     $local_fs
# Default-Start:     2 3 4 5
# Default-Stop:      0 1 6
# Short-Description: tomcat service
# Description:       tomcat service daemon
### END INIT INFO
sleep 1s
# docker start 13625caa9f6a
# docker start daf2f8158a52
# docker start 03b9e0f02f30 
# docker start af6c2c530fed
# docker start 13625caa9f6a
# cd /home/hh
# nohup java -jar demo1-0.0.1-SNAPSHOT.jar &
# cd /home
# nohup java -jar mobile-0.0.1-SNAPSHOT.jar &

PRO_NAME=/opt/java/sosospider.jar
cd /opt/java
while true ; do

     NUM=`ps aux | grep -w ${PRO_NAME} | grep -v grep |wc -l`
     #echo $NUM

     if [ "${NUM}" -lt "1" ];then
         echo "${PRO_NAME} was killed"
		  rm -rf /opt/java/nohup.out
          cd /opt/java
         nohup java -jar /opt/java/sosospider.jar &

    elif [ "${NUM}" -gt "1" ];then
        echo "more than 1 ${PRO_NAME},killall ${PRO_NAME}"
         killall -9 $PRO_NAME
		rm -rf /opt/java/nohup.out
        cd /opt/java
        nohup java -jar /opt/java/sosospider.jar &
     fi

     NUM_STAT=`ps aux | grep -w ${PRO_NAME} | grep T | grep -v grep | wc -l`
     if [ "${NUM_STAT}" -gt "0" ];then
         killall -9 ${PRO_NAME}
		rm -rf /opt/java/nohup.out
        cd /opt/java
         nohup java -jar /opt/java/sosospider.jar &
    fi
     sleep 10s
 done
 
 exit 0
