#! /bin/sh
#�������ֿ��޸�
PRO_NAME=/opt/java/sosospider.jar
cd /opt/java
while true ; do
     #��ps��ȡ$PRO_NAME��������
     NUM=`ps aux | grep -w ${PRO_NAME} | grep -v grep |wc -l`
     #echo $NUM
     #����1����������
     if [ "${NUM}" -lt "1" ];then
         echo "${PRO_NAME} was killed"
		rm -rf /opt/java/nohup.out
         nohup java -jar /opt/java/sosospider.jar &
    #����1��ɱ�����н��̣�����
    elif [ "${NUM}" -gt "1" ];then
        echo "more than 1 ${PRO_NAME},killall ${PRO_NAME}"
         killall -9 $PRO_NAME
		rm -rf /opt/java/nohup.out
        nohup java -jar /opt/java/sosospider.jar &
     fi
     #kill��ʬ����
     NUM_STAT=`ps aux | grep -w ${PRO_NAME} | grep T | grep -v grep | wc -l`
     if [ "${NUM_STAT}" -gt "0" ];then
         killall -9 ${PRO_NAME}
		rm -rf /opt/java/nohup.out
         nohup java -jar /opt/java/sosospider.jar &
    fi
     sleep 5s
 done
 
 exit 0
