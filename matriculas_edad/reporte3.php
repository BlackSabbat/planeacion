<?php
    #-----------------------------------------------------------------------------
    # programador: ing. Jose Ruben de la Peña Fuentes
    # objetivo: crear reporte "Matriculas de Posgrado por Edades por semestre, regingreso o matricula completa"
    #-----------------------------------------------------------------------------

    include ("clases.inc");
    include ("mysql_conection.inc");

    # Inicia Tabla de Posgrado
    print <<<EOF
    <table>
        <tr>
            <td>Posgrado:</td>
        </tr>
    </table>   

    <table>
EOF;

        $tabla = 'matriculas_edad_sem';
        $tipo = 'posgrado';

        $myMatricula = new matricula;

        # Establacer conexion
        $db = new mysqli($host, $user, $pwd, $base_datos);
 
        $myMatricula -> reporte1($BDSeleccionada, $tabla, $tipo, $semestre,$db, $host, $user, $pwd, $swPerEsc);

    # Termina Tabla de Posgrado
    
        print <<<EOF
    </table>


EOF;
    # cerrar conexion a BD
    $db->close();
?>