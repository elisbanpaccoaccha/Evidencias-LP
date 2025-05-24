import os

nombre_archivo = 'miarchivo.txt'
texto = 'Ingeniería de Sistemas\nUNA Puno 2024'

os.system('cls' if os.name == 'nt' else 'clear')  # Limpiar consola

try:
    with open(nombre_archivo, 'w') as archivo:
        archivo.write(texto)
    print(f'Texto agregado al archivo: {nombre_archivo}')
except Exception as e:
    print(f'Error al escribir en el archivo: {str(e)}')