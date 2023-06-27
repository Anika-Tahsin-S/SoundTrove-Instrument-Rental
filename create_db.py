import mysql.connector

data = mysql.connector.connect(
	host="localhost",
	user="root",
	# passwd = "1234", #gives error
	)

cursor = data.cursor()

# cursor.execute("CREATE DATABASE rentalusers")

cursor.execute("SHOW DATABASES")
for db in cursor:
	print(db)