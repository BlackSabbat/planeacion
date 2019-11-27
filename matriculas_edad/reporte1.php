<?php
    #-----------------------------------------------------------------------------
    # programador: ing. Jose Ruben de la Peña Fuentes
    # objetivo: crear reporte "Matriculas de Licenciatura por Edades por semestre, regingreso o matricula completa"
    #-----------------------------------------------------------------------------

    include ("clases.inc");
    include ("mysql_conection.inc");

    # Tabla de Licenciaturas
    print <<<EOF

    <table>
        <tr>
            <td>Licenciaturas:</td>
        </tr>
    </table> 

    <table id=federal width = 100%>
EOF;

        $tabla = 'matriculas_edad_sem';
        $tipo = 'licenciatura';

        $myMatricula = new matricula;

        # Establacer conexion
        $db = new mysqli($host, $user, $pwd, $base_datos);

        // Reporte es por Semestre
        //f ($seleccion  == 'semestre')
            $myMatricula -> reporte1($BDSeleccionada, $tabla, $tipo, $semestre, $db, $host, $user, $pwd, $swPerEsc);

        //if ($seleccion  == 'anio')
        //    $myMatricula -> reporte2($BDSeleccionada, $tabla, $tipo, $carrera, $reporte, $db, $host, $user, $pwd, $tipo_carrera);

    # Termina Tabla de Licenciaturas
        print <<<EOF
    </table>

EOF;

    # Inicia Tabla de Posgrado
    print <<<EOF
    <table>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Posgrado:</td>
        </tr>
    </table>   

    <table id=federal width = 100%>
EOF;

        $tabla = 'matriculas_edad_sem';
        $tipo = 'posgrado';

        $myMatricula = new matricula;

        # Establacer conexion
        $db = new mysqli($host, $user, $pwd, $base_datos);

        // Reporte es por Semestre
        //if ($seleccion  == 'semestre')
            $myMatricula -> reporte1($BDSeleccionada, $tabla, $tipo, $semestre,$db, $host, $user, $pwd, $swPerEsc);


    # Termina Tabla de Posgrado
    
        print <<<EOF
    </table>

EOF;
    # cerrar conexion a BD
    $db->close();
?>