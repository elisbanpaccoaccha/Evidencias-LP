import os

nombre_archivo = 'miarchivo.txt'
os.system('cls' if os.name == 'nt' else 'clear')  # Limpiar consola

try:
    with open(nombre_archivo, 'w') as archivo:
        print(f'Se ha creado el archivo: {nombre_archivo}')
except Exception as e:
    print(f'Error al crear el archivo: {str(e)}')