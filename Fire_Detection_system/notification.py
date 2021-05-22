from plyer import notification
def notifyMe(title, message):
   notification.notify(
      title=title,
      message=message,
      app_icon = "C:\\Users\\pc\\Desktop\\images\\mail.ico",
      timeout=10,
   )

if __name__=='__main__':
   notifyMe("Red Alert", "A fire Has been detected")
