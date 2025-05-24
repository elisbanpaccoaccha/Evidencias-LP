using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Pentavocalica
{
    class Program
    {
        public static void Main(string[] args)
        {
            Pentavocalica p1 = new Pentavocalica("murcielago");
            p1.cadena = "albaricoque";
            Pentavocalica p2 = new Pentavocalica("eucalipto");
            p2.cadena = "seculariza";
            Pentavocalica p3 = new Pentavocalica("");
            p3.cadena = "peliagudo";
            Pentavocalica p4 = new Pentavocalica("");
            p4.cadena = "abracadabra";

            if (p1.esPentavocalica(p1.cadena) == true)
            {
                Console.WriteLine("SI");
            }
            else
            {
                Console.WriteLine("NO");
            }

            if (p2.esPentavocalica(p2.cadena) == true)
            {
                Console.WriteLine("SI");
            }
            else
            {
                Console.WriteLine("NO");
            }

            if (p3.esPentavocalica(p3.cadena) == true)
            {
                Console.WriteLine("SI");
            }
            else
            {
                Console.WriteLine("NO");
            }

            if (p4.esPentavocalica(p4.cadena) == true)
            {
                Console.WriteLine("SI");
            }
            else
            {
                Console.WriteLine("NO");
            }

            Console.ReadKey();
        }
    }
}
