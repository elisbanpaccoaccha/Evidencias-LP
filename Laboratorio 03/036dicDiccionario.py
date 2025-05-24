# Diccionario principal con diccionarios internos como valores
empleados = {
    "001": {"nombre": "Juan", "edad": 28, "puesto": "Administrador"},
    "002": {"nombre": "Pamela", "edad": 25, "puesto": "Analista"},
    "003": {"nombre": "Pedro", "edad": 35, "puesto": "Desarrollador"}
}

# Acceder a datos de un empleado específico
print("\nInformación del empleado con código 002:")
print(f"Nombre: {empleados['002']['nombre']}")
print(f"Edad: {empleados['002']['edad']}")
print(f"Puesto: {empleados['002']['puesto']}")

# Mostrar información de todos los empleados
print("\nInformación de todos los empleados:")
for codigo, info in empleados.items():
    print(f"Código: {codigo}")
    print(f"Nombre: {info['nombre']}")
    print(f"Edad: {info['edad']}")
    print(f"Puesto: {info['puesto']}\n")

# Agregar nuevo empleado
print("Agregando empleado 004...")
empleados["004"] = {"nombre": "Laura", "edad": 28, "puesto": "Diseñadora"}

# Verificar actualización
print("\nInformación actualizada de empleados:")
for codigo, info in empleados.items():
    print(f"Código: {codigo}")
    print(f"Nombre: {info['nombre']}")
    print(f"Edad: {info['edad']}")
    print(f"Puesto: {info['puesto']}\n")