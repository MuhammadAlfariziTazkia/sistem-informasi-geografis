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
    cursor.execute('CREATE TABLE object (id SERIAL PRIMARY KEY, nama VARCHAR, jenis VARCHAR, alamat VARCHAR, no_telp VARCHAR, rating NUMERIC, source VARCHAR, asset_link VARCHAR, asset_name VARCHAR, asset_source VARCHAR, latitude NUMERIC, longitude NUMERIC, geometry GEOMETRY);')
    # cursor.execute('CREATE TABLE asset (id SERIAL PRIMARY KEY, type VARCHAR, nama VARCHAR, link VARCHAR, slug VARCHAR, object_id INT, source VARCHAR);')
    connection.commit()
    cursor.close()

    print("Success creating table for object")

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
                asset_link = obj["properties"]["asset_link"]
                asset_name = obj["properties"]["asset_name"]
                asset_source = obj["properties"]["asset_source"]
                longitude = obj["geometry"]["longitude"]
                latitude = obj["geometry"]["latitude"]

                make_geom_query = "SELECT ST_MakePoint({}, {})".format(longitude, latitude)
                cursor.execute(make_geom_query)
                geometry = (cursor.fetchone()[0])
                
                insert_query = "INSERT INTO object (nama, jenis, alamat, no_telp, rating, source, asset_link, asset_name, asset_source, latitude, longitude, geometry) VALUES('{}', '{}', '{}', '{}', {}, '{}', '{}', '{}', '{}', {}, {}, '{}')".format(nama, jenis, alamat, no_telp, float(rating), source, asset_link, asset_name, asset_source, latitude, longitude, geometry)
                cursor.execute(insert_query)

                print("SUCCESS INJECTED {}".format(nama))
            else:
                print("FAILED INJECTED {}: is already".format(nama))
    connection.commit()
    cursor.close()

# def InjectAsset(connection, filename):
#     cursor = connection.cursor()
#     with open(filename, 'r') as file:
#         json_file = json.load(file)
        
#         for obj in json_file:
#             nama = obj["nama"]
#             link = obj["link"]
#             type = obj["type"]

#             if type == 'link':
#                 data_count_query = "SELECT COUNT(*) FROM asset WHERE link = '{}' AND link != ''".format(link)
#             else: 
#                 data_count_query = "SELECT COUNT(*) FROM asset WHERE nama = '{}' AND nama != ''".format(nama)

#             cursor.execute(data_count_query)
#             data_count = (cursor.fetchone()[0])

#             if data_count == 0:
#                 type = obj["type"]
#                 object_id = obj["object_id"]
#                 slug = obj["slug"]
#                 source = obj["source"]

#                 insert_query = "INSERT INTO asset (type, nama, link, slug, object_id, source) VALUES('{}', '{}', '{}', '{}', {}, '{}')".format(type, nama, link, slug, object_id, source)
#                 cursor.execute(insert_query)

#                 print("SUCCESS INJECTED {}".format(nama))
#             else:
#                 print("FAILED INJECTED {}: is already".format(nama))
#     connection.commit()
#     cursor.close()

def running():
    print()
    print("CONFIG DATABASE")
    DB_HOST = input("Hostname : ")
    DB_NAME = input("Database Name : ")
    DB_USER = input("Username : ")
    DB_PASS = input("Password : ")
    connection = psycopg2.connect(dbname = DB_NAME, user = DB_USER, password = DB_PASS, host = DB_HOST)

    print()
    print()

    print("Hello Welcome!")
    
    print("Input 1 For Add Extension Postgis")
    print("Input 2 For Create Table Object")
    print("Input 3 For Start Injecting Object Data")
    # print("Input 4 For Start Injecting Asset Data")
    print("Input 99 For Close this Prompt")
    print()
    option = input("Insert your option : ")

    while option != "99":
        print()
        if (option == "1"):
            addExtension(connection)
        elif (option == "2"):
            createTable(connection)
        elif (option == "3"):
            InjectObject(connection, 'pariwisata.geojson')
            InjectObject(connection, 'olahraga.geojson')
        # elif (option == "4"):
        #     # InjectAsset(connection, 'pariwisata-asset.json')
        #     InjectAsset(connection, 'olahraga-asset.json')
        else:
            print("FAILED: Invalid Option")
        option = input("Insert your option : ")

    print("Thank you for using this prompt!")
    connection.close()

running()






