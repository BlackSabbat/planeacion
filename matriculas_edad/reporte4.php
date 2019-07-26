<?php
    #-----------------------------------------------------------------------------
    # programador: ing. Jose Ruben de la Peña Fuentes
    # objetivo: crear reporte "Matriculas de Carreras por Edades y por Año"
    #-----------------------------------------------------------------------------

    include ("clases.inc");
    include ("mysql_conection.inc");

    # Tabla de Licenciaturas

    if ($reporte == 'todas_carreras') {

    print <<<EOF

    <table>
        <tr>
            <td>Licenciaturas:</td>
        </tr>
    </table> 
EOF;
    }

    print <<<EOF
    <table>
EOF;

        $tabla = 'matriculas_edad_sem';
        $tipo = 'licenciatura';

        $myMatricula = new matricula;

        # Establacer conexion
        $db = new mysqli($host, $user, $pwd, $base_datos);

        $myMatricula -> reporte2($BDSeleccionada, $tabla, $tipo, $carrera, $reporte, $db, $host, $user, $pwd, $tipo_carrera);

        # Termina Tabla de Licenciaturas
        print <<<EOF
    </table>

EOF;


    if ($reporte == 'todas_carreras') {

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
    
        <table>
EOF;
    
            $tabla = 'matriculas_edad_sem';
            $tipo = 'posgrado';
    
            $myMatricula = new matricula;
    
            # Establacer conexion
            $db = new mysqli($host, $user, $pwd, $base_datos);

            $myMatricula -> reporte2($BDSeleccionada, $tabla, $tipo, $carrera, $reporte, $db, $host, $user, $pwd, $tipo_carrera);
    
        # Termina Tabla de Posgrado
        
            print <<<EOF
        </table>

EOF;

    } 

EOF;
    # cerrar conexion a BD
    $db->close();
?>