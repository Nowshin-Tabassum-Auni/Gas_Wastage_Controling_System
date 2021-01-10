#include <SoftwareSerial.h>
#include <Servo.h>

#include <ESP8266HTTPClient.h>
Servo myservo;
#define RX 2
#define TX 3
#define FlameSensor 10
#define ServoMotor 11
String AP = "Now";       // AP NAME
String PASS = "20202020"; // AP PASSWORD
String HOST = "10.195.57.184";
String PORT = "80";
int countTrueCommand;
int countTimeCommand; 
boolean found = false; 
int valSensor = 1;
SoftwareSerial esp8266(RX,TX); 
SoftwareSerial gsm(13, 12);
const int trigPin = 6;
const int echoPin = 5;
long duration;
int distance;
int pos = 0;    // variable to store the servo position
boolean OPStatus = false;
boolean flag = false;
void setup(){
  pinMode(4, OUTPUT); 
  digitalWrite(4, LOW);
  pinMode(trigPin, OUTPUT); // Sets the trigPin as an Output
  pinMode(echoPin, INPUT); // Sets the echoPin as an Input
  pinMode(7, OUTPUT); 
  digitalWrite(7, HIGH);
  pinMode(8, OUTPUT); 
  digitalWrite(8, HIGH);
  pinMode(9, OUTPUT); 
  digitalWrite(9, LOW);
  pinMode(FlameSensor, INPUT); 
  myservo.attach(ServoMotor);
  myservo.write(0);
  Serial.begin(9600);     
  gsm.begin(9600); 
  esp8266.begin(115200);
  delay(10000);
  sendCommand("AT",5,"OK");
  sendCommand("AT+CWMODE=1",5,"OK");
  sendCommand("AT+CWJAP=\""+ AP +"\",\""+ PASS +"\"",20,"OK");
}
void loop()
{
  HTTPClient http;    //Declare object of class HTTPClient
 
  String  postData;//by Nowshin
   String idValue; //By Nowshin
  // Clears the trigPin
  digitalWrite(trigPin, LOW);
  delayMicroseconds(2);
  
  // Sets the trigPin on HIGH state for 10 micro seconds
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);
  
  // Reads the echoPin, returns the sound wave travel time in microseconds
  duration = pulseIn(echoPin, HIGH);
  
  // Calculating the distance
  distance= duration*0.034/2;
  
  // Prints the distance on the Serial Monitor
  Serial.print("Distance: ");
  Serial.print(distance);
  if(distance < 20 && OPStatus == false){ 
    Serial.print(" Dish Detected "); 
    Serial.print(" Turning Gas On... "); 
    gasOn();
    delay(6000);
    if(digitalRead(FlameSensor) == LOW){
      OPStatus = true;
    }
    else{  
      Serial.print(" Flame Not Detected "); 
      Serial.print(" Turning Gas Off... "); 
      gasOff();
      OPStatus = false;
    }
    
  }
  else if(distance < 20 && OPStatus == true){
      Serial.print(" Cooking.. ");      
  }
  else if(distance > 20 && OPStatus == true){  
      Serial.print(" Dish Not Detected "); 
      Serial.print(" Turning Gas Off... "); 
      gasOff();
      OPStatus = false;
  }
  else{   
    Serial.print(" Dish Not Detected "); 
    OPStatus = false;
  }
  if(OPStatus == true){
     int id = 102;
  idValue = String(id);
  sValue = String(valSensor);
  postData = "id=" +idValue+  "&gas_value"+sValue;
  http.begin("http://192.168.43.28/Github/Gas_Wastage_Controling_System/Webpages.php");              //Specify request destination
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");    //Specify content-type header
 
  int httpCode = http.POST(postData);   //Send the request
  String payload = http.getString();    //Get the response payload

  //Serial.println("LDR Value=" + ldrvalue);
  Serial.print("httpcode ");
  Serial.println(httpCode);   //Print HTTP return code
  Serial.println("payload ");
  Serial.println(payload);    //Print request response payload
 // Serial.println("LDR Value=" + LdrValueSend);
  Serial.println(postData);
  http.end();  //Close connection
    char *kirim = "usage";  
    String getData = "GET /test.php?value="+String(valSensor);
    sendCommand("AT+CIPMUX=1",5,"OK");
    sendCommand("AT+CIPSTART=0,\"TCP\",\""+ HOST +"\","+ PORT,15,"OK");
    sendCommand("AT+CIPSEND=0," +String(getData.length()+4),4,">");
    esp8266.println(getData);delay(1500);countTrueCommand++;
    sendCommand("AT+CIPCLOSE=0",5,"OK");
  }
  Serial.println(); 
  delay(5000);
  Serial.println(analogRead(A0)); 
  if(analogRead(A0) > 500 && flag == false){
    flag = true;
    send_sms();
  }
  else{
    flag = false;
  }
}
void gasOn(){
  for (pos = 0; pos <= 180; pos += 1) { // goes from 0 degrees to 180 degrees
    // in steps of 1 degree
    myservo.write(pos);              // tell servo to go to position in variable 'pos'
    delay(15);                       // waits 15ms for the servo to reach the position
  }
  Serial.print(" Gas ON ");
}
void gasOff(){
  for (pos = 180; pos >= 0; pos -= 1) { // goes from 180 degrees to 0 degrees
    myservo.write(pos);              // tell servo to go to position in variable 'pos'
    delay(15);                       // waits 15ms for the servo to reach the position
  }
  Serial.print(" Gas OFF ");
}
void sendCommand(String command, int maxTime, char readReplay[]) {
  Serial.print(countTrueCommand);
  Serial.print(". at command => ");
  Serial.print(command);
  Serial.print(" ");
  while(countTimeCommand < (maxTime*1))
  {
    esp8266.println(command);//at+cipsend
    if(esp8266.find(readReplay))//ok
    {
      found = true;
      break;
    }
  
    countTimeCommand++;
  }
  
  if(found == true)
  {
    Serial.println("OK");
    countTrueCommand++;
    countTimeCommand = 0;
  }
  
  if(found == false)
  {
    Serial.println("Fail");
    countTrueCommand = 0;
    countTimeCommand = 0;
  }
  
  found = false;
 }
 void send_sms()
{  
  gsm.println("AT");
  updateSerial();

  gsm.println("AT+CMGF=1");
  updateSerial();
  gsm.println("AT+CMGS=\"+8801814849438\"");
  updateSerial();
  gsm.print("Gas detected...! Please take action immediately.");
  updateSerial();
  gsm.write(26);
}
void updateSerial()
{
  delay(500);
  while (Serial.available()) 
  {
    gsm.write(Serial.read());
  }
  while(gsm.available()) 
  {
    Serial.write(gsm.read());
  }
}
