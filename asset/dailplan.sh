#!/bin/sh

value=`cat /var/www/html/stratum/api/asset/extensions_additional.conf`
cat <<EOF >/etc/asterisk/extensions_additional.conf
$value
EOF

echo "Stash@2050" | sudo -S asterisk -rx"dialplan reload"
echo "Stash@2050" | sudo -S asterisk -rx"sip reload"
echo "Stash@2050" | sudo -S asterisk -rx"sip reload all"
echo "Stash@2050" | sudo -S asterisk -rx"reload"
echo "Stash@2050" | sudo -S asterisk -rx"module reload"
echo "Stash@2050" | sudo -S asterisk -rx"queue reload all"