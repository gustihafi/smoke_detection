#define BLYNK_TEMPLATE_ID "TMPLSKZaZc8s"
#define BLYNK_DEVICE_NAME "Smoke Sensor Dormitory"
#define BLYNK_AUTH_TOKEN "0t0nkLeUTmiEDOG_tBBMqmhqDmvbFRPR"


// Comment this out to disable prints and save space
#define BLYNK_PRINT Serial

#ifdef ESP32
  #include <WiFi.h>
  #include <HTTPClient.h>
#else
  #include <ESP8266WiFi.h>
  #include <ESP8266HTTPClient.h>
  #include <WiFiClient.h>
#endif

#include <BlynkSimpleEsp8266.h>
#include <DHT.h>

char auth[] = BLYNK_AUTH_TOKEN;

// Your WiFi credentials.
// Set password to "" for open networks.
//char ssid[] = "LAB_I2605";
//char pass[] = "OMmqPakr8z";
//char ssid[] = "lalak";
//char pass[] = "lalalala";
char ssid[] = "5915 kamar damai";
char pass[] = "lulus2023";
//char W_APIKey='ZKS8W4YM981317UB'
//char R_APIKey='HAWLA0Y6YJBTNJ5N'
//char Channel_Id='1681804'
//const char* serverName = "http://192.168.50.240/project_ksu/insert_temp.php";
const char* serverName = "http://192.168.31.88/project_ksu/insert_temp.php";

//char ssid[] = "lalalilo";
//char pass[] = "lalalala";

SimpleTimer timer;

int mq2 = A0; // smoke sensor is connected with the analog pin A0
int data = 0;
#define DHTPIN 0          // D3
 
// Uncomment whatever type you're using!
#define DHTTYPE DHT22    // DHT 11
//#define DHTTYPE DHT22   // DHT 22, AM2302, AM2321
//#define DHTTYPE DHT21   // DHT 21, AM2301
 
DHT dht(DHTPIN, DHTTYPE);

// This function is called every time the Virtual Pin 0 state changes
BLYNK_WRITE(V0)
{
  // Set incoming value from pin V0 to a variable
  int value = param.asInt();

  // Update state
  Blynk.virtualWrite(V1, value);
}

// This function is called every time the device is connected to the Blynk.Cloud
BLYNK_CONNECTED()
{
  // Change Web Link Button message to "Congratulations!"
  Blynk.setProperty(V3, "offImageUrl", "https://static-image.nyc3.cdn.digitaloceanspaces.com/general/fte/congratulations.png");
  Blynk.setProperty(V3, "onImageUrl",  "https://static-image.nyc3.cdn.digitaloceanspaces.com/general/fte/congratulations_pressed.png");
  Blynk.setProperty(V3, "url", "https://docs.blynk.io/en/getting-started/what-do-i-need-to-blynk/how-quickstart-device-was-made");
}

// This function sends Arduino's uptime every second to Virtual Pin 2.
void getSendData()
{
  // You can send any value at any time.
  // Please don't send more that 10 values per second.
  data = analogRead(mq2);
  Blynk.virtualWrite(V2, data); // Blynk INPUT Connect V2 Pin
  Serial.print("Gas = ");
  Serial.println(data);
  if (data>200)
  {
 // Blynk.notify("Smoke Detected!");
  Blynk.logEvent("fire_alert","Smoke detected!");
  Serial.println("FIRE ALERT");
  
  }

  float h = dht.readHumidity();
  float t = dht.readTemperature(); // or dht.readTemperature(true) for Fahrenheit
 
  if (isnan(h) || isnan(t)) {
    Serial.println("Failed to read from DHT sensor!");
    return;
  }
  // You can send any value at any time.
  // Please don't send more that 10 values per second.
  Blynk.virtualWrite(V5, t);
  Blynk.virtualWrite(V6, h);
  Serial.print("Temp =");
  Serial.println(t);
  Serial.print("Humidity =");
  Serial.println(h);

  //String postData = (String)"id=" + 1 + "&status=" + status;
  String postData = (String)"temperature=" + t + "&humidity=" + h + "&smoke=" + data + "&id=3";
  HTTPClient http;
  WiFiClientSecure client;
  client.setInsecure();
  //http.begin(client,"https://192.168.50.240/project_ksu/insert_temp.php");
  http.begin(client,"https://192.168.31.88/project_ksu/insert_temp.php");
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");

  auto httpCode = http.POST(postData);
  String payload = http.getString();

  Serial.println(postData);
  Serial.println(payload);
  
  if (httpCode>0) {
    Serial.print("HTTP Response code: ");
    Serial.println(httpCode);
    }
  else {
    Serial.print("Error code: ");
    Serial.println(httpCode);
    }

  http.end();

  }



void setup()
{
  // Debug console
  Serial.begin(115200);

  Blynk.begin(auth, ssid, pass);
  dht.begin();
  // You can also specify server:
  //Blynk.begin(auth, ssid, pass, "blynk.cloud", 80);
  //Blynk.begin(auth, ssid, pass, IPAddress(192,168,1,100), 8080);

  // Setup a function to be called every second
  timer.setInterval(1000L, getSendData);
}

void loop()
{
  Blynk.run();
  timer.run();
  // You can inject your own code or combine it with other sketches.
  // Check other examples on how to communicate with Blynk. Remember
  // to avoid delay() function!
}