distancia = float (input('Escribe la cantidad en metros: '))

opcion= input('\n A que lo quieres convertir? '
              '\n a. que lo quieres kilometros '
              '\n b. que lo quieres centimetros '
              '\n c. que lo quieres pulgadas\n '
              )
if opcion=='a':
    total = distancia/1000
    print('La cantidad convertida a kilometros es: ', total)

elif opcion=='b':
    total = distancia*100
    print('La cantidad convertida a centimetros es: ', total)

elif opcion=='c':
    total = (distancia*1000)/2.54
    print('La cantidad convertida a pulgadas es: ', total)

else :
    total = distancia/1000
    print('Opcion no valida ... ')