import psycopg2
import psycopg2.extras
import json

def addExtension(connection):
    cursor = connection.cursor()
    cursor.execute("CREATE EXTENSION postgis;")
    connection.commit()
    cursor.close()
    print ("Success add postgis extension")

def createTable(connection):
    cursor = connection.cursor()
    cursor.execute('CREATE TABLE object (id SERIAL PRIMARY KEY, nama VARCHAR, jenis VARCHAR, alamat VARCHAR, no_telp VARCHAR, rating NUMERIC, source VARCHAR, geometry GEOMETRY);')
    cursor.execute('CREATE TABLE asset (id SERIAL PRIMARY KEY, type VARCHAR, nama VARCHAR, link VARCHAR, slug VARCHAR, object_id INT);')
    connection.commit()
    cursor.close()

    print("Success creating table for object and asset")

def InjectObject(connection, filename):
    cursor = connection.cursor()
    with open(filename, 'r') as file:
        json_file = json.load(file)
        
        for obj in json_file:
            nama = obj["properties"]["nama"]
            data_count_query = "SELECT COUNT(*) FROM object WHERE nama = '{}'".format(nama)
            cursor.execute(data_count_query)
            data_count = (cursor.fetchone()[0])
            if data_count == 0:
                jenis = obj["properties"]["jenis"]
                alamat = obj["properties"]["alamat"]
                no_telp = obj["properties"]["no_telp"]
                rating = obj["properties"]["rating"]
                source = obj["properties"]["source"]
                longitude = obj["geometry"]["longitude"]
                latitude = obj["geometry"]["latitude"]

                make_geom_query = "SELECT ST_MakePoint({}, {})".format(longitude, latitude)
                cursor.execute(make_geom_query)
                geometry = (cursor.fetchone()[0])
                
                insert_query = "INSERT INTO object (nama, jenis, alamat, no_telp, rating, source, geometry) VALUES('{}', '{}', '{}', '{}', {}, '{}', '{}')".format(nama, jenis, alamat, no_telp, float(rating), source, geometry)
                cursor.execute(insert_query)

                print("SUCCESS INJECTED {}".format(nama))
            else:
                print("FAILED INJECTED {}: is already".format(nama))
    connection.commit()
    cursor.close()

def running():
    DB_HOST = input("Hostname : ")
    DB_NAME = input("Database Name : ")
    DB_USER = input("Username : ")
    DB_PASS = input("Password : ")
    
    print("Hello Welcome!")
    
    print("Input 1 For Add Extension Postgis")
    print("Input 2 For Create Table Object and Asset")
    print("Input 3 For Start Injecting Data")
    print("Input 4 For Close this Prompt")

    option = input("Insert your option : ")
    connection = psycopg2.connect(dbname = DB_NAME, user = DB_USER, password = DB_PASS, host = DB_HOST)

    while option != "4":
        if (option == "1"):
            addExtension(connection)
        elif (option == "2"):
            createTable(connection)
        elif (option == "3"):
            InjectObject(connection, 'pariwisata.geojson')
            InjectObject(connection, 'olahraga.geojson')
        else:
            print("FAILED: Invalid Option")
        option = input("Insert your option : ")

    print("Thank you for using this prompt!")
    connection.close()

running()






