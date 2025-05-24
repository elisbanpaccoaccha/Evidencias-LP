edad =0
while True:
    edad = int(input('Escribe tu edad: '))
    if (edad>0) and (edad<99):
        break
    print('Edad no valida. Intenta de nuevo por favor ...')

print('Tu edad es : ', edad)