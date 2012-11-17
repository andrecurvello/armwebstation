#!/usr/bin/python
# -*- coding: utf-8 -*-

import serial
import time
import sys

ser = serial.Serial("/dev/ttySAC3", 
    baudrate=9600,
	bytesize=8,
	parity=serial.PARITY_NONE,
	stopbits=1,
	timeout=1)

param = None
interval = None

def printUsage():
	print "./gps.py param time"

#Funcao para retornar o numero de argumentos passados.
def getArgs():
	if len(sys.argv)==1:
		return 1
	elif len(sys.argv)==2:
		return 2
	elif len(sys.argv)==3:
		return 3
	elif len(sys.argv)>=4:
		printUsage()


#Funcao para verificar os argumentos passados
def verifyArgs():
	print "Coisa"

#Funcao para, de acordo com o numero de parametros passados, setar as variaveis principais
def setArgs():
	global param
	global interval
	
	if getArgs() == 1:
		param = "GPRMC"
	elif getArgs() == 2:
		param = sys.argv[1]
	elif getArgs() == 3:
		param = sys.argv[1]
		interval = int(sys.argv[2])

#Funcao para obter uma unica string de dados NMEA do GPS.
def getSerial(param):
	global ser
	if param == "all":
		#Para evitar de pegar uma string no meio do envio.
		ser.readline()
		#Pega uma string fresca
		gps = ser.readline()
		return gps
	
	else:
		findAux = -1
	
		while cmp(findAux,-1) == 0:
			ser.readline()
			gps = ser.readline()
			findAux = gps.find(param)
		return gps
	
def getSerialTime(param,interval):
	diff = None

	if param == "all":
		time1 = int(time.time())
		ser.readline()
		while diff <= interval:
			gps = ser.readline()
			time2 = int(time.time())
			diff = time2 - time1
			sys.stdout.write(gps)
			
	else:
		diff = 0
		findAux = -1
		#time1 = int(time.time())
		
		ser.readline()
		
		while diff != interval:
			while findAux == -1:
				gps = ser.readline()
				findAux = gps.find(param)
			diff = diff+1	
			#diff = time2 - time1
			sys.stdout.write(gps)

# No caso da chamada padrao...
if getArgs() == 1:
	setArgs()
	sys.stdout.write(getSerial(param))
	
# No caso 
elif getArgs() == 2:
	setArgs()
	sys.stdout.write(getSerial(param))


elif getArgs() == 3:
	setArgs()
	getSerialTime(param,interval)
		