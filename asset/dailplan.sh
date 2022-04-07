#!/bin/sh

value=`cat /var/www/html/stratum/api/asset/extensions_additional.conf`
cat <<EOF >/etc/asterisk/extensions_additional.conf
$value
EOF

asterisk -rx"dialplan reload"
asterisk -rx"sip reload"
asterisk -rx"sip reload all"
asterisk -rx"reload"
asterisk -rx"module reload"
asterisk -rx"queue reload all"