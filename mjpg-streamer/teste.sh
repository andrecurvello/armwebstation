#!/bin/sh
pidmp=$(pidof mjpg_streamer)
echo $pidmp

if [[ -z "$pidmp"]]; then
	/mjpg-streamer/start_uvc.sh	
fi

unset pidmp

