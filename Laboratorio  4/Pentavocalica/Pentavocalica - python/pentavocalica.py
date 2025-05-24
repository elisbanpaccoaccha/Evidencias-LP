class Pentavocalica:
    def __init__(self, cadena):
        self.__cadena = cadena 

    def esPentavocalica(self, c):
        a = e=i=o=u=0
        for l in range (len(c)):
            if c[l]=='a' or c[l]=="A": a=a +1
            if c[l]=='e' or c[l]=="E": a=a +1
            if c[l]=='i' or c[l]=="I": a=a +1
            if c[l]=='o' or c[l]=="O": a=a +1
            if c[l]=='u' or c[l]=="U": a=a +1
        if a>=1 and e>=1 and i> 1 and o >= 1 and u>=1:
            return True
        return False

p1 = Pentavocalica("murcielago")
p1.__cadena = "albaricoque" 
p2 = Pentavocalica("eucalipto")
p2.__cadena = "seculariza"
p3 = Pentavocalica("")
p3.__cadena= "peliagudo"
p4 = Pentavocalica("")
p4.__cadena = "abracadabra"