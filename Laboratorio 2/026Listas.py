numeros = []
contador=0

for i in range(10):
    numero = float(input('Ingresa un numero: '))
    numeros.append(numero)
    contador+=1

suma = sum(numeros)

print('La suma de los numeros introducidos es: ', suma)
print('Los numeros introducidos fueron: ', contador)
