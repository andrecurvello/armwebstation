#!/bin/sh

#Inicializando o crond
/usr/sbin/crond

#Criando as pastas que ele precisa
if [ ! -d /var/spool ]; then
mkdir /var/spool
fi

if [ ! -d /var/spool/cron ]; then
mkdir /var/spool/cron
fi

if [ ! -d /var/spool/cron/crontabs ]; then
mkdir /var/spool/cron/crontabs
fi

#Agora que existem as pastas, a pasta principal serah definida
cronDir=/var/spool/cron/crontabs

#Criando o arquivo
touch $cronDir/root

cronFile=$cronDir/root

#Definindo o script de tirar fotos a cada 30 hora, padrao.
echo "30 * * * * /usbCapture/timeCapture.sh" > $cronFile  
