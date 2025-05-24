import time as t

contador =10

print ('Inicia l conteo regresivo...')

while contador>0:
    print(contador)
    t.sleep(1)
    contador-=1

print('EL conteo ha despegado con exito...')