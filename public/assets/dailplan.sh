#!/bin/sh

value=`cat /var/www/html/stratum/api/asset/extensions_additional.conf`
cat <<EOF >/etc/asterisk/extensions_additional.conf
$value
EOF