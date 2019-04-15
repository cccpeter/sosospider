#! /bin/bash
### BEGIN INIT INFO
# Provides:          bbzhh.com
# Required-Start:    $local_fs $network
# Required-Stop:     $local_fs
# Default-Start:     2 3 4 5
# Default-Stop:      0 1 6
# Short-Description: tomcat service
# Description:       tomcat service daemon
### END INIT INFO
PRO_NAME=/opt/java/sosospider.jar
cd /opt/java
while true ; do

     NUM=`ps aux | grep -w ${PRO_NAME} | grep -v grep |wc -l`
     #echo $NUM

     if [ "${NUM}" -lt "1" ];then
         echo "${PRO_NAME} was killed"
		rm -rf /opt/java/nohup.out
         nohup java -jar /opt/java/sosospider.jar &

    elif [ "${NUM}" -gt "1" ];then
        echo "more than 1 ${PRO_NAME},killall ${PRO_NAME}"
         killall -9 $PRO_NAME
		rm -rf /opt/java/nohup.out
        nohup java -jar /opt/java/sosospider.jar &
     fi

     NUM_STAT=`ps aux | grep -w ${PRO_NAME} | grep T | grep -v grep | wc -l`
     if [ "${NUM_STAT}" -gt "0" ];then
         killall -9 ${PRO_NAME}
		rm -rf /opt/java/nohup.out
         nohup java -jar /opt/java/sosospider.jar &
    fi
     sleep 5s
 done
 
 exit 0
