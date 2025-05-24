# Crear matriz 3x3
matriz = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
]

# Acceder a un elemento específico (fila 0, columna 2)
elemento = matriz[0][2]
print("Elemento en [0][2]:", elemento)

# Recorrer la matriz y mostrar sus elementos
print("\nElementos de la matriz:")
for fila in matriz:
    for elemento in fila:
        print(elemento, end=' ')
    print()