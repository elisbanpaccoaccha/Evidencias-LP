import os
import time
import mysql.connector

# Conexión a la base de datos
mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",  # Colocar tu contraseña
    database="sistemas"
)
mycursor = mydb.cursor()

while True:
    print("""
    ..:: SISTEMA DE REGISTROS ::..
    1. Insertar dato
    2. Eliminar dato
    3. Buscar dato
    4. Actualizar dato
    5. Mostrar todos los registros
    6. Salir
    """)
    
    opcion = input("Elija una opción: ")
    
    if opcion == "1":
        dni = input("Ingrese DNI: ")
        nombres = input("Ingrese nombres: ")
        apellido1 = input("Ingrese primer apellido: ")
        apellido2 = input("Ingrese segundo apellido: ")
        
        sql = "INSERT INTO personas (dni, nombres, apellido1, apellido2) VALUES (%s, %s, %s, %s)"
        val = (dni, nombres, apellido1, apellido2)
        mycursor.execute(sql, val)
        mydb.commit()
        print(mycursor.rowcount, "registro insertado")
        time.sleep(2)
        os.system('cls')
        
    elif opcion == "2":
        dni = input("Ingrese DNI a eliminar: ")
        sql = "DELETE FROM personas WHERE dni = %s"
        val = (dni,)
        mycursor.execute(sql, val)
        mydb.commit()
        print(mycursor.rowcount, "registro(s) eliminado(s)")
        time.sleep(2)
        os.system('cls')
        
    elif opcion == "3":
        dni = input("Ingrese DNI a buscar: ")
        sql = "SELECT * FROM personas WHERE dni = %s"
        val = (dni,)
        mycursor.execute(sql, val)
        result = mycursor.fetchall()
        
        if mycursor.rowcount > 0:
            for registro in result:
                print(registro)
        else:
            print("No se encontraron resultados")
        time.sleep(2)
        os.system('cls')
        
    elif opcion == "4":
        dni_viejo = input("DNI a actualizar: ")
        dni_nuevo = input("Nuevo DNI: ")
        sql = "UPDATE personas SET dni = %s WHERE dni = %s"
        val = (dni_nuevo, dni_viejo)
        mycursor.execute(sql, val)
        mydb.commit()
        print(mycursor.rowcount, "registro(s) actualizado(s)")
        time.sleep(2)
        os.system('cls')
        
    elif opcion == "5":
        mycursor.execute("SELECT * FROM personas")
        resultados = mycursor.fetchall()
        print("\nRegistros en la tabla:")
        for registro in resultados:
            print(registro)
        time.sleep(2)
        os.system('cls')
        
    elif opcion == "6":
        confirmar = input("¿Está seguro? (s/n): ").lower()
        if confirmar == "s":
            print("Saliendo del sistema...")
            time.sleep(2)
            os.system('cls')
            break
            
    else:
        print("Opción no válida")
        time.sleep(2)
        os.system('cls')


mydb.close()