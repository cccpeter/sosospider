#! /bin/bash
mv /opt/java/process_protect.sh /etc/init.d
mv /opt/java/server_start.sh /etc/init.d
chmod 777 /etc/init.d/process_protect.sh
chmod 777 /etc/init.d/server_start.sh
update-rc.d process_protect.sh defaults 90
update-rc.d server_start.sh defaults 70
reboot