using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Pentavocalica
{
    public class Pentavocalica
    {
        private String _cadena;
        public Pentavocalica(String cadena)
        {
            this.cadena = cadena;
        }

        public String cadena
        {
            set
            {
                if (value.Length > 0)
                    _cadena = value;
                else
                    _cadena = "";
            }
            get { return _cadena; }
        }

        public bool esPentavocalica(String c)
        {
            int a, e, i, o, u;
            a = e = i = o = u = 0;
            for (int l = 0; l < c.Length; l++)
            {
                if (c[l] == 'a' || c[l] == 'A') { a++; }
                if (c[l] == 'e' || c[l] == 'E') { e++; }
                if (c[l] == 'i' || c[l] == 'I') { i++; }
                if (c[l] == 'o' || c[l] == 'O') { o++; }
                if (c[l] == 'u' || c[l] == 'U') { u++; }
            }
            if (a >= 1 && e >= 1 && i >= 1 && o >= 1 && u >= 1)
            {
                return true;
            }
            return false;
        }
    }
}
