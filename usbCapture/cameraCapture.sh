#!/bin/sh

nome=$2
tipo=$1

### Instanciando as variaveis responsaveis pelo binario de captura
dirUsbCapture='/usbCapture'
capProgram='usbCap'
capLink="$dirUsbCapture/$capProgram $tipo"

### Definindo o diretorio para se salvar as imagens
dirImg='/sdcard/pictures'

### Instanciando o link de relacaoo com MJPG-Streamer
#mjpgDir='/mjpg-streamer'
#mjpgFile='start_uvc.sh'
#mjpgLink="$mjpgDir/$mjpgFile"

#pidMJPGStreamer=$(pidof mjpg_streamer)
#if [ -n $pidMJPGStreamer ]
#then
#	kill $pidMJPGStreamer
#fi

#dateTime=$(date +%d-%m-%Y--%H-%M)
fileName="$nome.jpg"
$capLink "$fileName"

mv $fileName $dirImg

#$mjpgLink > /dev/null &

echo $fileName
