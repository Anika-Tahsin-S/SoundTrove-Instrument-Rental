import mysql.connector

data = mysql.connector.connect(
    host = 'localhost',
    user = 'root',
    passwd = '1234',
    )

cursor = data.cursor() # automated database commands

cursor.execute("CREATE DATABASE rentaluser")
cursor.execute("SHOW DATABASES")

for db in cursor:
    print(db)