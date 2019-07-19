<?php
    #-----------------------------------------------------------------------------
    # programador: ING Jose Ruben de la Peña Fuentes
    # objetivo: crear reporte "Matriculas de Posgrado"
    #-----------------------------------------------------------------------------

    include ("clases.inc");
    include ("mysql_conection.inc");

    # Inicia Tabla de Posgrado
    print <<<EOF

    <table>
EOF;

        $tabla = 'matriculas_semestre';
        $tipo = 'posgrado';

        $myMatricula = new matricula;

        # Establacer conexion
        $db = new mysqli($host, $user, $pwd, $base_datos);
 
        $myMatricula -> reporte1($BDSeleccionada, $tabla, $tipo, $db, $host, $user, $pwd, $swPerEsc);

    # Termina Tabla de Posgrado
    
        print <<<EOF
    </table>

EOF;
    # cerrar conexion a BD
    $db->close();
?>