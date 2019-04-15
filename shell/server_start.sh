#! /bin/sh
### BEGIN INIT INFO
# Provides:          cpeter.com
# Required-Start:    $local_fs $network
# Required-Stop:     $local_fs
# Default-Start:     2 3 4 5
# Default-Stop:      0 1 6
# Short-Description: server start service
# Description:       service daemon
### END INIT INFO
docker start db57f08a34bb