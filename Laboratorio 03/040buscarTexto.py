import os

nombre_archivo = "miscelaneo.txt"
os.system('cls' if os.name == 'nt' else 'clear')  # Limpiar consola

texto = "Sistema"

try:
    encontrado = False
    with open(nombre_archivo, 'r') as archivo:
        lineas = archivo.readlines()

        for linea in lineas:
            if texto in linea:
                encontrado = True
                print(f"Texto '{texto}' encontrado en: {linea.strip()}")

    if not encontrado:
        print(f"No se encontró el texto en: {nombre_archivo}")

except Exception as e:
    print(f"Error al buscar texto: {str(e)}")