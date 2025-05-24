/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package pentavocalica;

/**
 *
 * @author epadev
 */
public class Pentavocalica {

    /**
     * @param args the command line arguments
     */
    //public static void main(String[] args) {
        // TODO code application logic here
    //}
    
    private String cadena;
    
    public Pentavocalica (String  cadena){
        this.cadena= cadena;
    }
    public String getCadena(){
        return cadena;
    }
    public void setCadena(String cadena){
        this.cadena= cadena;
    }
    public boolean esPentavocalica(String c){
        int a, e, i, o, u;
        a=e=i=o=u=0;
        for (int l=0; l<c.length(); l++){
            if(c.charAt(l)=='a'|| c.charAt(l)=='A'){a++;}
            if(c.charAt(l)=='e'|| c.charAt(l)=='E'){e++;}
            if(c.charAt(l)=='i'|| c.charAt(l)=='I'){i++;}
            if(c.charAt(l)=='o'|| c.charAt(l)=='O'){o++;}
            if(c.charAt(l)=='u'|| c.charAt(l)=='U'){u++;}
        }
        if (a>=1 && e>=1 && i>=1 && o>=1 && u>=1){
            return true;
        }
        return false;
    }
}
