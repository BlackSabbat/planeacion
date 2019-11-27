<?php
    #-----------------------------------------------------------------------------
    # programador: ING Jose Ruben de la Peña Fuentes
    # objetivo: crear reporte "Titulados o Egresados" de Posgrado
    #-----------------------------------------------------------------------------

    include ("clases.inc");
    include ("mysql_conection.inc");

    if ($reporteNombre == "reporte2"){
        $tabla = 'titulados';
    }
    if ($reporteNombre == "reporte4"){
        $tabla = 'egresados';
    }


    # Tabla de Posgrado Reporte General
    print <<<EOF
    <table id=federal width = 100%>
EOF;
    
        $plan = 'general';
        $tipo = 'posgrado';
        $myTitulado = new titulado_egresado;

        # Establacer conexion
        $db = new mysqli($host, $user, $pwd, $base_datos);

        $myTitulado -> reporte1($BDSeleccionada, $tabla, $tipo, $plan, $db, $host, $user, $pwd, $swEsconde, $swPerEsc);

        print <<<EOF
    </table>

EOF;
    # Termina Tabla de Posgrado Reporte General

    # cerrar conexion a BD
    $db->close();
?>