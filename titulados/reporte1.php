<?php
    #-----------------------------------------------------------------------------
    # programador: ING Jose Ruben de la Peña Fuentes
    # objetivo: crear reporte "Titulados o Egresados"
    #-----------------------------------------------------------------------------

    include ("clases.inc");
    include ("mysql_conection.inc");

    if ($reporteNombre == "reporte1"){
        $tabla = 'titulados';
    }
    if ($reporteNombre == "reporte3"){
        $tabla = 'egresados';
    }

    //echo "swEsconde: $swEsconde </br>";

    # Tabla de Licenciaturas Reporte General
    print <<<EOF
    <table>
EOF;
    
        $plan = 'general';
        $tipo = 'licenciatura';
        $myTitulado = new titulado_egresado;

        # Establacer conexion
        $db = new mysqli($host, $user, $pwd, $base_datos);

        $myTitulado -> reporte1($BDSeleccionada, $tabla, $tipo, $plan, $db, $host, $user, $pwd, $swEsconde, $swPerEsc);

        print <<<EOF
    </table>
EOF;
    # Termina Tabla de Licenciaturas Reporte General 


    if ($swPlan == "1"){ 
        print <<<EOF

        <table>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Plan 2004:</td>
            </tr>
        </table>   

EOF;


        # Tabla de Licenciaturas Plan 2004
        print <<<EOF
        <table>
EOF;
            $plan = 'plan2004';
            $tipo = 'licenciatura';
            $myTitulado = new titulado_egresado;

            # Establacer conexion
            $db = new mysqli($host, $user, $pwd, $base_datos);

            $myTitulado -> reporte1($BDSeleccionada, $tabla, $tipo, $plan, $db, $host, $user, $pwd, $swEsconde, $swPerEsc);

            # Termina Tabla de Licenciaturas Plan 2004
            print <<<EOF
        </table>  

        <table>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Plan 2010:</td>
            </tr>
        </table>   

EOF;

        # Tabla de Licenciaturas Plan 2010
        print <<<EOF
        <table>
EOF;
            $plan = 'plan2010';
            $tipo = 'licenciatura';
            $myTitulado = new titulado_egresado;

            # Establacer conexion
            $db = new mysqli($host, $user, $pwd, $base_datos);

            $myTitulado -> reporte1($BDSeleccionada, $tabla, $tipo, $plan, $db, $host, $user, $pwd, $swEsconde, $swPerEsc);

            print <<<EOF

        </table> 


EOF;
        # Termina Tabla de Licenciaturas Plan 2010

    } # if ($swPlan  == 1)

    # cerrar conexion a BD
    $db->close();
?>