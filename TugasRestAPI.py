from flask import Flask, jsonify
from flask_mysqldb import MySQL

app = Flask(__name__)

#mysql config
app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'universitas'
mysql = MySQL(app)

@app.route('/')
def root():
    return 'Welcome to Mobile Legend'

@app.route('/person')
def person():
    return jsonify({'name': 'faqih', 
                    'address': 'Bandung'})

@app.route('/dosen')
def dosen():
    cursor = mysql.connection.cursor()
    cursor.execute("SELECT * FROM DOSEN")
    
    column_name = [i[0] for i in cursor.description]
    data = []
    for row in cursor.fetchall():
        data.append(dict(zip(column_name, row)))
        
    return jsonify(data)
    cursor.close()
    

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=50, debug=True)