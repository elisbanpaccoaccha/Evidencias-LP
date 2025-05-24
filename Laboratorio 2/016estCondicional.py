pesos = int (input('Escribe la cantidad de pesos Mexicanos: '))

opcion= int( input('\n A cual moneda deseas convertir: '
              '\n 1. Dolares $17 '
              '\n 2. SOles peruanos $4\n '
              ))


mensaje1= 'La cantidad convertida en dolares es: '
mensaje2= 'La cantidad convertida en dolares es: '
ancho= 80
if (opcion==1):
    total = pesos/17
    mensaje1= mensaje1.center(ancho)
    print(mensaje1, round(total,4))

elif (opcion==2):
    total = pesos/4
    mensaje2= mensaje2.center(ancho)
    print(mensaje2, round(total,4))


else :

    print('Elegiste una opcion no valida... ')