contador = 0
suma =0
numero =0
 
while True:
    numero =int(input('Escribe un numero para sumar (Ingresa -1 para salir): '))
    if(numero==-1):
        break
    
    suma += numero
    contador+=1

if (contador>0):
    promedio= suma/contador
    print('La suma de los numeros es: ', suma)
    print('EL total de numeros introducidos es: ', contador )
    print('EL promedio de los numeros ingresados es: ', promedio)

else:
    print('Nose ingresaron numeros validos ....')