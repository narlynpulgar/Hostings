  
#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include <ESP8266WebServer.h>
#include <ESP8266mDNS.h>
#include <SPI.h>

/*for weight*/


#include <SoftwareSerial.h>

char string;
   
SoftwareSerial SIM900A(D3,D4);
String host = "pugon.000webhostapp.com";


const int Light = D7;
const int Pump = D8;

long duration;
  int distance_cm;
const int trigPin = D5;  // Trig pin of the ultrasonic sensor
const int echoPin = D6; // Echo pin of the ultrasonic sensor

const char* ssid = "Arduino";// 
const char* password = "arduinos";
//WiFiClient client;
char server[] = "pugon.000webhostapp.com";   //eg: 192.168.0.222


WiFiClient client;    



// constants won't change. They're used here to set pin numbers:
const int buttonPin = D2;     // the number of the pushbutton pin
  const int ledPin =  13; 
  unsigned long buttonpress = 0;
  bool ledon = false;
#include <Servo.h>

Servo myservo;
int pos = 0; 


// variables will change:
int buttonState = 0;         // variable for reading the pushbutton status

void setup() {
   Serial.begin(115200);

  delay(10);
/*for ultrasonic*/
pinMode(trigPin, OUTPUT);
  pinMode(echoPin, INPUT);
  // initialize the LED pin as an output:
  pinMode(ledPin, OUTPUT);
  // initialize the pushbutton pin as an input:
  pinMode(buttonPin, INPUT);
   myservo.attach(D1);  
   pinMode(buttonPin,INPUT_PULLUP);
 pinMode(Light, OUTPUT);
 pinMode(Pump, OUTPUT);

  // Connect to WiFi network
  Serial.println();
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);
 
  WiFi.begin(ssid, password);
 
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.println("WiFi connected");
 
  // Start the server
//  server.begin();
  Serial.println("Server started");
  Serial.print(WiFi.localIP());
  delay(1000);
  Serial.println("connecting...");
    digitalWrite(Light, HIGH);
}

void loop() { 
  // read the state of the pushbutton value:
  buttonState = digitalRead(buttonPin);
  /*for ultrasonic*/
    long duration;
  int distance_cm;


delay(1000);
  // Clear the trigPin to ensure a clean pulse
  digitalWrite(trigPin, LOW);
  delayMicroseconds(2);

  // Send a 10us pulse to trigger the sensor
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);

  // Read the time it takes for the echo to return
  duration = pulseIn(echoPin, HIGH);

  // Calculate the distance in centimeters
  distance_cm = duration / 58.2;

  // Print the distance in centimeters


  // Check the distance and print appropriate messages
  
/*for button*/
Serial.println(distance_cm);
  if  (buttonState == HIGH) {
    if (buttonpress == 0){
      buttonpress = millis();
    }
     if (millis() - buttonpress >= 3000 && distance_cm >= 1 && distance_cm <= 3){
string = 'F';

    Serial.print("&Storage=Full"); 
     digitalWrite(ledPin, LOW);
       digitalWrite(Pump, LOW);
  digitalWrite(Light, HIGH);

 for (pos = 0; pos <= 180; pos += 1) { // goes from 180 degrees to 0 degrees
    myservo.write(pos);              // tell servo to go to position in variable 'pos'
    delay(1);                       // waits 15 ms for the servo to reach the position
  }    // tell servo to go to position in variable 'pos'
   delay(4000);
    for (pos = 180; pos >= 0; pos -= 1) { // goes from 0 degrees to 180 degrees
    // in steps of 1 degree
    myservo.write(pos);              // tell servo to go to position in variable 'pos'
    delay(1);                     // waits 15 ms for the servo to reach the position
  }
  SendMessagef();
   digitalWrite(Pump, HIGH); 
  
  Sending_To_phpmyadmindatabase() ;  //CONNECTING WITH MYSQL
 }}
  if  (buttonState == HIGH) {
    if (buttonpress == 0){
      buttonpress = millis();
    }
     if (millis() - buttonpress >= 3000 && distance_cm >= 4 && distance_cm <= 6){
string = 'E';

    Serial.print("&Storage=Enough"); 
     digitalWrite(ledPin, LOW);
         digitalWrite(Pump, LOW);
  digitalWrite(Light, HIGH);
  
 for (pos = 0; pos <= 180; pos += 1) { // goes from 180 degrees to 0 degrees
    myservo.write(pos);              // tell servo to go to position in variable 'pos'
    delay(1);                       // waits 15 ms for the servo to reach the position
  }    // tell servo to go to position in variable 'pos'
   delay(4000);
    for (pos = 180; pos >= 0; pos -= 1) { // goes from 0 degrees to 180 degrees
    // in steps of 1 degree
    myservo.write(pos);              // tell servo to go to position in variable 'pos'
    delay(1);  
       
    // waits 15 ms for the servo to reach the position
  }
   digitalWrite(Pump, HIGH);
   SendMessagee();
  Sending_To_phpmyadmindatabase() ;  //CONNECTING WITH MYSQL
 
  }}
    if  (buttonState == HIGH) {
    if (buttonpress == 0){
      buttonpress = millis();
    }
     if (millis() - buttonpress >= 3000 && distance_cm >= 11 && distance_cm <= 12){
string = 'Y';

    Serial.print("&Storage=Very low!"); 
     digitalWrite(ledPin, LOW);
         digitalWrite(Pump, LOW);
  digitalWrite(Light, LOW);
 
 for (pos = 0; pos <= 180; pos += 1) { // goes from 180 degrees to 0 degrees
    myservo.write(pos);              // tell servo to go to position in variable 'pos'
    delay(1);                       // waits 15 ms for the servo to reach the position
  }    // tell servo to go to position in variable 'pos'
   delay(4000);
    for (pos = 180; pos >= 0; pos -= 1) { // goes from 0 degrees to 180 degrees
    // in steps of 1 degree
    myservo.write(pos);              // tell servo to go to position in variable 'pos'
    delay(1);                  // waits 15 ms for the servo to reach the position
  }
    digitalWrite(Pump, HIGH);   
  SendMessagey();
  Sending_To_phpmyadmindatabase() ;  //CONNECTING WITH MYSQL
 }}
   if  (buttonState == HIGH) {
    if (buttonpress == 0){
      buttonpress = millis();
    }
     if (millis() - buttonpress >= 3000 && distance_cm >= 7 && distance_cm <= 10){
string = 'L';

    Serial.print("&Storage=Low Storage"); 
     digitalWrite(ledPin, LOW);
         digitalWrite(Pump, LOW);
  digitalWrite(Light, HIGH);

 for (pos = 0; pos <= 180; pos += 1) { // goes from 180 degrees to 0 degrees
    myservo.write(pos);              // tell servo to go to position in variable 'pos'
    delay(1);                       // waits 15 ms for the servo to reach the position
  }    // tell servo to go to posiion in variable 'pos'
   delay(4000);
    for (pos = 180; pos >= 0; pos -= 1) { // goes from 0 degrees to 180 degrees
    // in steps of 1 degree
    myservo.write(pos);              // tell servo to go to position in variable 'pos'
    delay(1);                   // waits 15 ms for the servo to reach the position
  }
    digitalWrite(Pump, HIGH);
      SendMessagel();
  Sending_To_phpmyadmindatabase() ;  //CONNECTING WITH MYSQL
 }}
   if  (buttonState == HIGH) {
    if (buttonpress == 0){
      buttonpress = millis();}
  if (millis() - buttonpress >= 3000 && distance_cm >= 13 && distance_cm <= 14){
    string = 'Y';
    
    Serial.print("&Storage=Empty!"); 
     digitalWrite(ledPin, LOW);
         digitalWrite(Pump, LOW);
  digitalWrite(Light, LOW);
  
 for (pos = 0; pos <= 180; pos += 1) { // goes from 180 degrees to 0 degrees
    myservo.write(pos);              // tell servo to go to position in variable 'pos'
    delay(1);                       // waits 15 ms for the servo to reach the position
  }    // tell servo to go to position in variable 'pos'
   delay(4000);
    for (pos = 180; pos >= 0; pos -= 1) { // goes from 0 degrees to 180 degrees
    // in steps of 1 degree
    myservo.write(pos);              // tell servo to go to position in variable 'pos'
    delay(1);            
    // waits 15 ms for the servo to reach the position
  }
  digitalWrite(Pump, HIGH); 
  SendMessagey();
  Sending_To_phpmyadmindatabase() ;  //CONNECTING WITH MYSQL
 
   }}
   if  (buttonState == HIGH) {
    if (buttonpress == 0){
      buttonpress = millis();}
  if (millis() - buttonpress >= 3000 && distance_cm >= 15 && distance_cm <= 16){
    string = 'N';
    SendMessagey();
    delay(100000);
    Serial.print("&Storagenone");
      
     digitalWrite(ledPin, LOW);
  digitalWrite(Light, HIGH);
  digitalWrite(Pump, LOW);

   
     
    }
  delay(4000); 
 
}
  else {
  
    // if you didn’t get a connection to the server:   
   
  
  
   void Sending_To_phpmyadmindatabase() ;  //CONNECTING WITH MYSQL
 
   if (client.connect(server,80)) {
    Serial.println("connected");
    // Make a HTTP request:
   //YOUR URL

  //YOUR URL
      //YOUR URL
    
    client.print(" ");      //SPACE BEFORE HTTP/1.1
    client.print("HTTP/1.1");
    client.println();
        client.println("Host: " + host);  
    client.println("Connection: close");
    client.println();
  }
  }
   }    
 void Sending_To_phpmyadmindatabase() {  //CONNECTING WITH MYSQL
 
   if (client.connect(server,80)) {
    Serial.println("connected");
    // Make a HTTP request:
   //YOUR URL
 switch(string){
    case 'E': 
   
    Serial.print("GET /admin/device.php?Storage=Enough");
        client.print("GET /admin/device.php?Storage=Enough");     //YOUR URL
      //YOUR URL

   
       client.print(" ");      //SPACE BEFORE HTTP/1.1
    client.print("HTTP/1.1");
    client.println();
        client.println("Host: " + host);  
    client.println("Connection: close");
    client.println();
     break;
       case 'F':
   
    Serial.println("GET /admin/device.php?Storage=Full");
        client.print("GET /admin/device.php?Storage=Full");     //YOUR URL
      //YOUR URL

    
       client.print(" ");      //SPACE BEFORE HTTP/1.1
    client.print("HTTP/1.1");
    client.println();
        client.println("Host: " + host);  
    client.println("Connection: close");
    client.println();
     break;
       case 'L':
   
    Serial.print("GET /admin/device.php?Storage=Low_Storage");
        client.print("GET /admin/device.php?Storage=Low_Storage");     //YOUR URL
      //YOUR URL

       client.print(" ");      //SPACE BEFORE HTTP/1.1
    client.print("HTTP/1.1");
    client.println();
        client.println("Host: " + host);  
    client.println("Connection: close");
    client.println();
     break;  
     case 'Y':
   
    Serial.print("GET /admin/device.php?Storage=Empty!");
        client.print("GET /admin/device.php?Storage=Empty!");     //YOUR URL
      //YOUR URL

  
       client.print(" ");      //SPACE BEFORE HTTP/1.1
    client.print("HTTP/1.1");
    client.println();
        client.println("Host: " + host);  
    client.println("Connection: close");
    client.println();
     break;
     
  
    

  }}}


 void SendMessagel()
{
  
  SIM900A.println("AT+CMGF=1");    //Sets the GSM Module in Text Mode
  delay(1000);
 
  SIM900A.println("AT+CMGS=\"09516097220\"\r"); //Mobile phone number to send message
  delay(1000);
  Serial.println ("Set SMS Content low storage");
  SIM900A.println("The Device has been Triggered, Your storage now is LOW!");// Messsage content
  delay(100);
  
  SIM900A.println((char)26);// ASCII code of CTRL+Z
  delay(1000);
  Serial.println ("Message has been sent ->");
}
 void SendMessagee()
{
  
  SIM900A.println("AT+CMGF=1");    //Sets the GSM Module in Text Mode
  delay(1000);
 
  SIM900A.println("AT+CMGS=\"09516097220\"\r"); //Mobile phone number to send message
  delay(1000);
  Serial.println ("Set SMS Content enough");
  SIM900A.println("Device has been Triggered, Your storage now is ENOUGH");// Messsage content
  delay(100);
  
  SIM900A.println((char)26);// ASCII code of CTRL+Z
  delay(1000);
  Serial.println ("Message has been sent ->");
}
 void SendMessagef()
{
  
  SIM900A.println("AT+CMGF=1");    //Sets the GSM Module in Text Mode
  delay(1000);
 
  SIM900A.println("AT+CMGS=\"09516097220\"\r"); //Mobile phone number to send message
  delay(1000);
  Serial.println ("Set SMS Content full");
  SIM900A.println("Device has been Triggered, Your storage is FULL");// Messsage content
  delay(100);
  
  SIM900A.println((char)26);// ASCII code of CTRL+Z
  delay(1000);
  Serial.println ("Message has been sent ->");
}
 void SendMessagey()
{
  
  SIM900A.println("AT+CMGF=1");    //Sets the GSM Module in Text Mode
  delay(1000);
 
  SIM900A.println("AT+CMGS=\"09516097220\"\r"); //Mobile phone number to send message
  delay(1000);
  Serial.println ("Set SMS Content empty");
  
  SIM900A.println("Device has been Triggered, Your storage is now EMPTY!");// Messsage content
  delay(100);
  
  SIM900A.println((char)26);// ASCII code of CTRL+Z
  delay(1000);
  Serial.println ("Message has been sent ->");
}
  
