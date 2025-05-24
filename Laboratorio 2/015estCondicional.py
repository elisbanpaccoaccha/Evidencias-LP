nombre = input('EScribe tu nombre: ')

dia= int(input('Escribe el numero del dia que quieres venir a trabajar: '))

if(dia==1):
    print(f"{nombre} felicidades vendras a trabjar el dia Lunes")
elif(dia==2):
    print(f"{nombre} felicidades vendras a trabjar el dia Martes")
elif(dia==3):
    print(f"{nombre} felicidades vendras a trabjar el dia Miercoles")
elif(dia==4):
    print(f"{nombre} felicidades vendras a trabjar el dia Jueves")
elif(dia==5):
    print(f"{nombre} felicidades vendras a trabjar el dia Viernes")
elif(dia==6):
    print(f"{nombre} felicidades vendras a trabjar el dia Sabado")
elif(dia==7):
    print(f"{nombre} felicidades vendras a trabjar el dia Domingo")
else:
    print(f"{nombre}, lo sentimoms ese dia no existe...")