#Arreglo o lista realizando operaciones básicas CRUD (Create, Read, Update, Delete)

import os
import time

arreglo=[]
while True:
    print('---MENU PRINCIPAL---'
          '\n 1. Insertar un dato'
          '\n 2. Eliminar un dato'
          '\n 3. Buscar un dato'
          '\n 4. Sobrescribir un dato'
          '\n 5. Mostrar contenido del arreglo')
    opcion=input('Elije una opcion: ')
    
    if opcion=='1':
        dato=input('Ingrese el dato a insertar: ')
        arreglo.append(dato)
        print('Dato insertado correctamente')
        time.sleep(1)
        os.system('cls')
    
    elif opcion=='2':
        dato=input('Ingrese el dato a eliminar: ')
        if(dato in arreglo):
            arreglo.remove(dato)
            print('Dato eliminado correctamente')
            time.sleep(1)
            os.system('cls')
        else:
            print('El dato no existe en el arreglo')
            time.sleep(1)
            os.system('cls')
    
    elif opcion=='3':
        dato=input('Ingrese el dato a buscar: ')
        if (dato in arreglo):
            print('El dato existe en el arreglo, en la posicion:')
            print(arreglo.index(dato))
            time.sleep(1)
            os.system('cls')
        else:
            print('El dato no existe en el arreglo')
            time.sleep(1)
            os.system('cls')

    elif opcion=='4':
        datoAnterior=input('Ingrese el dato a sobrescribir: ')
        if(datoAnterior in arreglo):
            indice=arreglo.index(datoAnterior)
            datoNuevo=input('Ingrese el nuevo dato: ')
            arreglo[indice]=datoNuevo
            print('Dato sobrescrito correctamente')
            time.sleep(1)
            os.system('cls')
        else:
            print('El dato no existe en el arreglo')
            time.sleep(1)
            os.system('cls')
    
    elif opcion=='5':
        print('El contenido del arreglo es: ')
        print(arreglo)
        time.sleep(1)
        os.system('cls')
    elif opcion== '6':
        print('saliendo del sistema')
        break
    else:
        print('Opcion no valida, intente nuevamente')
        time.sleep(1)
        os.system('cls')