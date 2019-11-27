<?php
    #-----------------------------------------------------------------------------
    # programador: ING Jose Ruben de la Peña Fuentes
    # objetivo: crear reporte "Índice de Deserción"
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
        $tabla2 = 'egresados';
        $tabla1 = 'matriculas_semestre';
        $tipo   = 'licenciatura';

        $myReprobado = new reprobado;

        # Establacer conexion
        $db = new mysqli($host, $user, $pwd, $base_datos);

        # Reporte
        $myReprobado -> reporte1($BDSeleccionada, $tabla1, $tabla2, $tipo, $db, $host, $user, $pwd, $swPerEsc, $swEsconde);

        print <<<EOF
    </table>
EOF;

    # Inicia Tabla de Posgrado
    print <<<EOF
<!--
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

        $tabla2 = 'egresados';
        $tabla1 = 'matriculas_semestre';
        $tipo   = 'posgrado';

        $myReprobado = new reprobado;

        # Establacer conexion
        $db = new mysqli($host, $user, $pwd, $base_datos);

        # Reporte
        $myReprobado -> reporte1($BDSeleccionada, $tabla1, $tabla2, $tipo, $db, $host, $user, $pwd, $swPerEsc, $swEsconde);

        print <<<EOF

    </table>
-->

EOF;

    # cerrar conexion a BD
    $db->close();
?>