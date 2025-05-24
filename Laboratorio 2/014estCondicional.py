nombre = input('EScribe tu nombre: ')

estatura= int(input('Escribe tu estatura en centimetros: '))

if(estatura<160):
    print(f"{nombre} Eres de estarura baja...")
    print(nombre, 'Eres de estatura baja', nombre, 'otro')
    print(f"{nombre} texto {nombre} texto2 {nombre}")

if (estatura>=160) and (estatura<=175):
    print(f"{nombre} Eres de estatura mediana ....")

if (estatura>175):
    print(f"{nombre} Eres de estatura alta ....")

