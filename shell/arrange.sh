#! /bin/sh
mv /opt/java/process_protect.sh /etc/init.d
chmod 777 /etc/init.d/process_protect.sh
update-rc.d process_protect.sh defaults 90
reboot