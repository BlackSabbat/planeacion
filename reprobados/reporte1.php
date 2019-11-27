<?php
    #-----------------------------------------------------------------------------
    # programador: ING Jose Ruben de la Peña Fuentes
    # objetivo: crear reporte "Índice de Reprobación"
    #-----------------------------------------------------------------------------

    include ("clases.inc");
    include ("mysql_conection.inc");

    $tabla1 = 'reprobados';
    $tabla2 = 'matriculas_semestre';

    //echo "swEsconde: $swEsconde </br>";

    print <<<EOF
    <table id=federal width = 100%>
EOF;
        $myReprobado = new reprobado;

        # Establacer conexion
        $db = new mysqli($host, $user, $pwd, $base_datos);

        # Reporte
        $myReprobado -> reporte1($BDSeleccionada, $tabla1, $tabla2, $db, $host, $user, $pwd, $swPerEsc, $swEsconde);

        print <<<EOF
    </table>
EOF;

    # cerrar conexion a BD
    $db->close();
?>