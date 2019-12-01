from flask import Flask, render_template, request
import serial
"""
ser = serial.Serial("/dev/ttyS5", 9600)
ser.close()
ser.open()
"""
app = Flask(__name__)

@app.route("/")
def home():
    return render_template('index.html')

@app.route("/diningroom")
def diningroom():
    return render_template('diningroom.html')
# Xử lý tốc độ

@app.route("/fan/<int:status>", methods=['GET'])
def change_fan_status(status):
  # Check the value of the parameter
  """if status == 0:
    print("Hello")
  elif status == 1:
    print("Goodbye")
  else:
    return ('Error', 500)"""
  ser.write(str.encode(str(status)))
  print(status)
  return ('', 200)

@app.route("/led/<int:status>", methods=['GET'])
def change_led_status(status):
  print("led" + str(status))
  return ('', 200)

if __name__ == "__main__":
	app.run(host = '192.168.1.13',port = 5000, debug=True)
