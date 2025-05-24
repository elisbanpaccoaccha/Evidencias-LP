import os

nombre_archivo = "miscelaneo.txt"
os.system('cls' if os.name == 'nt' else 'clear')  # Limpiar consola

texto = "UNA Puno 2024"

try:
    # Leer archivo
    with open(nombre_archivo, 'r') as archivo:
        lineas = archivo.readlines()

    # Filtrar líneas
    with open(nombre_archivo, 'w') as archivo:
        for linea in lineas:
            if linea.strip() != texto:
                archivo.write(linea)

    print(f"Se eliminó el texto '{texto}' del archivo: {nombre_archivo}")

except Exception as e:
    print(f"Error al eliminar texto: {str(e)}")