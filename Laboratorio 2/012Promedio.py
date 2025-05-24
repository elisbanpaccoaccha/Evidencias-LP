print('El programa calculara el promedio de tus 3 calificaciones\n')
nombre = input('Escribe tu nombre: ')
mat= float(input ('EScribe tu calificaion de Matematicas: '))
fis= float(input('Escribe tu calificaion de Fisica: '))
quim= float(input('Escribe tu calificacion de quimica: '))

prom = (mat+fis+quim)/3

print(f"{nombre} tu promedio es: {round(prom, 2)}")