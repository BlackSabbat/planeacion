<?php
    #-----------------------------------------------------------------------------
    # programador: ING Jose Ruben de la Peña Fuentes
    # objetivo: crear reporte "Matriculas solamente de Licenciatura"
    #-----------------------------------------------------------------------------

    include ("clases.inc");
    include ("mysql_conection.inc");

    # Tabla de Licenciaturas
    print <<<EOF

    <table id=federal width = 100%>
    
EOF;

        $tabla = 'matriculas_semestre';
        $tipo = 'licenciatura';

        $myMatricula = new matricula;

        # Establacer conexion
        $db = new mysqli($host, $user, $pwd, $base_datos);

        $myMatricula -> reporte1($BDSeleccionada, $tabla, $tipo, $db, $host, $user, $pwd, $swPerEsc);

    # Termina Tabla de Licenciaturas
print <<<EOF
    </table>

EOF;

    # cerrar conexion a BD
    $db->close();
?>