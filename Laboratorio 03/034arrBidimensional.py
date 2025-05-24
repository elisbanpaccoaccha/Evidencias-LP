filas = 3
columnas = 3
matriz = []

# Llenar matriz con datos del usuario
for i in range(filas):
    fila = []
    for j in range(columnas):
        dato = input(f"Ingrese el dato para la posición [{i}][{j}]: ")
        fila.append(dato)
    matriz.append(fila)

# Mostrar contenido
print("\nDatos del arreglo bidimensional:")
for fila in matriz:
    print(fila)

# Mostrar diagonal principal
print("\nDiagonal principal:")
for i in range(3):
    print(matriz[i][i])