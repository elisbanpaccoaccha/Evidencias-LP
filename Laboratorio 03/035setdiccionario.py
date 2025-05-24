# Crear diccionario
diccionario = {
    "nombre": "Lenia",
    "edad": 45,
    "ciudad": "Puno"
}

print("Diccionario original:", diccionario)

# Acceder a valores
print(f"\nNombre: {diccionario['nombre']}")
print(f"Edad: {diccionario['edad']}")
print(f"Ciudad: {diccionario['ciudad']}")

# Actualizar datos
print("\nActualizando edad...")
diccionario["edad"] = 27

# Eliminar elemento
print("\nEliminando ciudad...")
del diccionario["ciudad"]
print("Diccionario actualizado:", diccionario)

# Verificar existencia de claves
print("\nVerificando claves:")
print('"nombre" existe' if 'nombre' in diccionario else '"nombre" no existe')
print('"ciudad" existe' if 'ciudad' in diccionario else '"ciudad" no existe')