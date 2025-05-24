/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package pentavocalica;

/**
 *
 * @author epadev
 */
public class Main {
    public static void main(String[] args){
        Pentavocalica p1= new Pentavocalica("albaricoque");
        Pentavocalica p2= new Pentavocalica("seculariza");
        Pentavocalica p3= new Pentavocalica("");
        p3.setCadena("peliagudo");
        Pentavocalica p4= new Pentavocalica("");
        p4.setCadena("abrur");
        
        if (p1.esPentavocalica(p1.getCadena())==true){
            System.out.println("SI");
        }else{
            System.out.println("NO");
        }
        if(p2.esPentavocalica(p2.getCadena())==true){
            System.out.println("SI");
        }else{
            System.out.println("NO");
        }
        
        if(p3.esPentavocalica(p3.getCadena())==true){
            System.out.println("SI");
        }else{
            System.out.println("NO");
        }
        
        if(p4.esPentavocalica(p4.getCadena())==true){
            System.out.println("SI");
        }else{
            System.out.println("NO");
        }
    }
}
