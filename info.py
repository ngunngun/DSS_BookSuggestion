import MySQLdb

db = MySQLdb.connect("localhost","root","dsslamom01","DSS" )

cursor = db.cursor()

sql = "SELECT * FROM DSS_Users WHERE age = '%d'" % (40)

try:
	cursor.execute(sql)
	results = cursor.fetchall()
	for row in results:
		age = row[0]
		print "age = %d" % (age)

except:
	print "Error Kuy rai eak wa"

db.close()
