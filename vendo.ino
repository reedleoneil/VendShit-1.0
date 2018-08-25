/*
 * Project: Vendo Firmware
 * Version: 1.0
 * Author: LeoNeil Reed
 * 
 * Command Reference
 * q - return credit
 * w - add credit
 * e - remove credit
 * r - reset credit
 * 1 - slot 1
 * 2 - slot 2
 * 3 - slot 3
 * 4 - slot 4
 * a - 1 peso
 * s - 2 peso
 * d - refund/change
 * f - print
 */

#include <Servo.h>
#include <SoftwareSerial.h>

/*
 * Variables
 */
volatile int credit = 0;
Servo slot1;
Servo slot2;
Servo slot3;
Servo slot4;
Servo changer;
SoftwareSerial printer(6,7);
SoftwareSerial SIM900A(4,5);

/*
 * Setup Function
 */
void setup() {
  Serial.begin(9600);
  attachInterrupt(digitalPinToInterrupt(3), credit_inc, RISING);  //coin -> pin3
  slot1.attach(9);                                                //slot1 -> pin9
  slot2.attach(10);                                               //slot2 -> pin10
  slot3.attach(11);                                               //slot3 -> pin11
  slot4.attach(12);                                               //slot4 -> pin12
  changer.attach(13);
  printer.begin(9600);
  SIM900A.begin(9600);
}

/*
 * Main Loop
 */
void loop() {
  if(Serial.available()){
    char cmd = Serial.read();
    if(cmd == 'q'){
      credit_ret();
    }else if(cmd == 'w'){
      credit_inc();
    }else if(cmd == 'e'){
      credit_dec(); 
    }else if(cmd == 'r'){
      credit_res();
    }else if(cmd == '1' || cmd == '2' || cmd == '3' || cmd == '4'){
      dispense(cmd);
      //refund_change();
      /*if(cmd == '1'){
        printer.println("**Official Receipt**");
        printer.println("");
        printer.println("Biogesic      P6.00");
        printer.println("___________________");
        printer.println("OTC Vending Machine");
      }else if(cmd == '2'){
        printer.println("**Official Receipt**");
        printer.println("");
        printer.println("Biogesic      P7.00");
        printer.println("___________________");
        printer.println("OTC Vending Machine");
      }*/
    }else if(cmd == 'f') {
      String line = Serial.readString();
      printer.println(line);
    }else if(cmd == 'a'){
      onepeso();
    }else if(cmd == 's'){
      fivepeso();
    }else if(cmd == 'd'){
      refund_change();
    }else if(cmd == 'z'){
      SendMessage();
    }
  }
}

/*
 * SMS
 */

void SendMessage()
{
  SIM900A.println("AT+CMGF=1");
  delay(1000);
  SIM900A.println("AT+CMGS=\"+639208577497\"\r");
  delay(1000);
  SIM900A.println("Critical stocks");
  delay(100);
  SIM900A.println((char)26);
  delay(1000);
}

/*
 * Credit Functions
 */
int credit_ret(){
  Serial.print(credit);
  Serial.print("\r");
}

void credit_inc(){
  credit++;
}

void credit_dec(){
  credit--;
}

void credit_res(){
  credit=0;
}

/*
* Dispense Item
*/
void dispense(char slot){
  if(slot == '1'){
    slot1.write(30);
    delay(1000);
    slot1.write(90);
    delay(1000);
  }else if(slot == '2'){
    slot2.write(30);
    delay(1000);
    slot2.write(90);
  }else if(slot == '3'){
    slot3.write(180);
    delay(1000);
    slot3.write(90);
  }else if(slot == '4'){
    slot4.write(180);
    delay(1000);
    slot4.write(90);
  }
}

/*
* Dispense Coin
*/
void onepeso(){
  changer.write(30);
  delay(1000);
  changer.write(90);
  delay(1000);
}

void fivepeso(){
  changer.write(150);
  delay(1000);
  changer.write(90);
  delay(1000);
}

void refund_change(){
  while(credit != 0){
    if(credit >= 5){
      fivepeso();
      credit = credit - 5;
    }else{
      onepeso();
      credit--;
    }
  }
}


