#! /bin/sh
echo "mv success"
chmod 777 /opt/java/process_protect.sh
echo "chmod success"
cd /opt/java
nohup ./process_protect.sh &
echo "update success"
echo "now reboot"
# reboot