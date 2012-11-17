#!/bin/sh

### Instanciando as variaveis responsaveis pelo binario de captura
dirUsbCapture='/usbCapture'
capProgram='usbCap'
capLink="$dirUsbCapture/$capProgram $tipo"


### Verificando se existe o diretorio de time
if [ ! -d /sdcard/pictures/time ]; then
mkdir /sdcard/pictures/time
fi

### Definindo o diretorio para se salvar as imagens
dirImg='/sdcard/pictures/time'

### Instanciando o link de relacaoo com MJPG-Streamer
mjpgDir='/mjpg-streamer'
mjpgFile='start_uvc.sh'
mjpgLink="$mjpgDir/$mjpgFile"

pidMJPGStreamer=$(pidof mjpg_streamer)
if [ -n $pidMJPGStreamer ]
then
	kill $pidMJPGStreamer
fi

nome=$(date +%d-%m-%Y--%H-%M)
fileName="$nome.jpg"
$capLink 1 "$fileName"

mv $fileName $dirImg

$mjpgLink > /dev/null &

echo $fileName
