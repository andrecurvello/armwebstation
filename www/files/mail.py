#!/usr/bin/python
import sys
import smtplib
import string

FROM = "tiny6410@gmail.com"

to1 = "andre.ml.curvello@gmail.com"
to2 = "evandro@sc.usp.br"

SUBJECT = sys.argv[1]

username = "tiny6410"
password = "tiny6410armwe"

MESSAGE = sys.argv[2]

print SUBJECT
print MESSAGE

BODY1 = string.join((
       "From: %s" % FROM,
       "To: %s" %to1,
       "Subject: %s" % SUBJECT,
       "",
       MESSAGE),"\r\n")

BODY2 = string.join((
       "From: %s" % FROM,
       "To: %s" %to2,
       "Subject: %s" % SUBJECT,
       "",
       MESSAGE),"\r\n")


server = smtplib.SMTP('smtp.gmail.com:587')
server.starttls()

server.login(username,password)
server.sendmail(FROM,to1,BODY1)
server.sendmail(FROM,to2,BODY2)
server.quit()

sys.stdout.write("1");