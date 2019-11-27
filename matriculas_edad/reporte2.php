<?php
    #-----------------------------------------------------------------------------
    # programador: ing. Jose Ruben de la Peña Fuentes
    # objetivo: crear reporte "Matriculas de Licenciatura por Edades y por Semestre"
    #-----------------------------------------------------------------------------

    include ("clases.inc");
    include ("mysql_conection.inc");

    # Tabla de Licenciaturas
    print <<<EOF

    
        <tr>
            <td>Licenciaturas:</td>
        </tr>
    

    <table id=federal width = 100%>
EOF;

        $tabla = 'matriculas_edad_sem';
        $tipo = 'licenciatura';

        $myMatricula = new matricula;

        # Establacer conexion
        $db = new mysqli($host, $user, $pwd, $base_datos);

        $myMatricula -> reporte1($BDSeleccionada, $tabla, $tipo, $semestre, $db, $host, $user, $pwd, $swPerEsc);

    # Termina Tabla de Licenciaturas
        print <<<EOF
    </table>

EOF;
    # cerrar conexion a BD
    $db->close();
?>