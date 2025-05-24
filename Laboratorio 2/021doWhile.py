contador = 0
suma =0
numero =0
 
while True:
    numero =float(input('Escribe un numero para sumarlo (Ingresa 0 para salir) '))
    if(numero==0):
        break
    suma += numero
    contador+=1

if (contador>0):
    promedio= suma/contador
    print('La suma de los numeros es: ', suma)
    print('EL total de numeros introducidos por el usuario son: ', contador )
    print('EL promedio de los numeros ingresados es: ', promedio)

else:
    print('Nose ingresaron numeros validos ....')