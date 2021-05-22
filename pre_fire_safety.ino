/*************************************************************
  Download latest Blynk library here:
    https://github.com/blynkkk/blynk-library/releases/latest

  Blynk is a platform with iOS and Android apps to control
  Arduino, Raspberry Pi and the likes over the Internet.
  You can easily build graphic interfaces for all your
  projects by simply dragging and dropping widgets.

    Downloads, docs, tutorials: http://www.blynk.cc
    Sketch generator:           http://examples.blynk.cc
    Blynk community:            http://community.blynk.cc
    Follow us:                  http://www.fb.com/blynkapp
                                http://twitter.com/blynk_app

  Blynk library is licensed under MIT license
  This example code is in public domain.

 *************************************************************
  This example runs directly on ESP8266 chip.

  Note: This requires ESP8266 support package:
    https://github.com/esp8266/Arduino

  Please be sure to select the right ESP8266 module
  in the Tools -> Board menu! 

  Change WiFi ssid, pass, and Blynk auth token to run :)
  Feel free to apply it to any other example. It's simple!
 *************************************************************/

/* Comment this out to disable prints and save space */
#define BLYNK_PRINT Serial


#include <ESP8266WiFi.h>
#include <BlynkSimpleEsp8266.h>

// You should get Auth Token in the Blynk App.
// Go to the Project Settings (nut icon).
char auth[] = "Ieq2eYNfPS1W0eSIuoCYpf8Xs36iaps2";

// Your WiFi credentials.
// Set password to "" for open networks.
char ssid[] = "Redmif";
char pass[] = "123456789";

SimpleTimer timer;

int temp,mq2 = A0; 
int data = 0; 
int buzzer = 4;
int led_green = 14;
int led_red = 12; 
int dataadc;
float cr;

void setup() 
{
pinMode(buzzer, OUTPUT);
pinMode(mq2, INPUT);
pinMode(led_green, OUTPUT);
pinMode(led_red, OUTPUT);
digitalWrite(led_green, LOW);
digitalWrite(led_red, LOW);

  Serial.begin(9600);
  Blynk.begin(auth, ssid, pass);
  timer.setInterval(1000L, getSendData);
  timer.setInterval(1000L, sendUptime);
}
 
void loop() 
{
  timer.run();
  Blynk.run();
}

void sendUptime(){
  Blynk.virtualWrite(V3, cr);
  }
 
void getSendData()
{
data = analogRead(mq2); 
Serial.print("Gas Level: ");
Serial.println(data);
Blynk.virtualWrite(V2, data);
 
  if (data > 350 )
  {
    digitalWrite(led_green, LOW);
digitalWrite(led_red, HIGH);
digitalWrite(buzzer, HIGH);
Blynk.notify("Alert: Smoke Detected");
Blynk.email("Alert!!!" , " Smoke Detected, The Fire Alert Has Been Activated In The Canteen. Please Leave The Building By The Nearest Exit.");
delay(500);
digitalWrite(buzzer, LOW);
  }else
{
digitalWrite(buzzer, LOW);
digitalWrite(led_green, HIGH);
digitalWrite(led_red, LOW);
}
 dataadc = analogRead(temp);
cr = dataadc*(3.2/1023.0)*100.0;

}
