from plyer import notification
import smtplib
import time
from email import encoders 
from email.mime.base import MIMEBase
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText
from playsound import playsound
import cv2
import requests

def notifyMe(title, message):
   notification.notify(
      title=title,
      message=message,
      app_icon = "C:\\Users\\pc\\Desktop\\images\\mail.ico",
      timeout=50,
   )

def send_an_email():
    toaddr = 'adihack64@gmail.com'
    me = 'sahu00157@gmail.com'
    subject = "Fire Alarm System"
    text = "Warning A Fire Accident has been reported on ABC Company please Check this photos"
    
    msg=MIMEMultipart()
    msg['Subject'] = subject
    msg['From'] = me
    msg['To'] = toaddr
    msg.preamble = "test "
    msg.attach(MIMEText(text))

    part = MIMEBase('application', "octet-stream")
    part.set_payload(open("C:/Users/pc/Desktop/images/FireImage.jpg", "rb").read())
    encoders.encode_base64(part)
    part.add_header('Content-Disposition', 'attachment; filename="FireImage.jpg"')
    msg.attach(part)

    try:
       s = smtplib.SMTP('smtp.gmail.com', 587)
       s.ehlo()
       s.starttls()
       s.ehlo()
       s.login(user='sahu00157@gmail.com', password='ggits0206')
       s.sendmail(me, toaddr, msg.as_string())
       s.quit()
    except smtplib.SMTPException as error:
        print("Error")

'''def LineNotify():
    url = 'https://notify-api-line.me/api/notify'
    token = 'vzFn9np8dbI4n3d9TIYA0x1f1E60eOkMf621QHQ3XTx'
    headers = {'content-type': 'application/x-www-form-urlencoded', 'Authorization': 'Bearer ' + token)
    msg = 'Fire Detect'
    r = requests.post(url, headers=headers, data={'message': msg})
    print(r.text)'''

fire_cascade = cv2.CascadeClassifier('fire_detection.xml')
cap =cv2.VideoCapture(0)

while True:
     ret, img = cap.read()
     gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
     fire = fire_cascade.detectMultiScale(img, 1.2, 5)
     for (x, y, w, h) in fire:
         cv2.rectangle(img, (x,y), (x + w, y + h), (0, 0, 255), 2)
         roi_gray = gray[y:y + h, x:x + w]
         roi_color = img[y:y + h, x:x + w]

         print('Fire is detected..!')
         time.sleep(0.5)
         notifyMe("Red Alert", "A fire Has been detected")
         print('Alarm Created')
         playsound('audio.mp3')
         time.sleep(0.9)
         print('Save FireImage To Storage')
         out = cv2.imwrite('FireImage.jpg', img)
         time.sleep(0.5)
         print('Send Notification')
         print('Send Photos and text alert to Email')
         send_an_email()
         time.sleep(0.8)
     cv2.imshow('Fire Alarm System', img)
     
     k = cv2.waitKey(30) & 0Xff
     if k == 27:
         break
cap.release()
cv2.destroyAllWindows()

