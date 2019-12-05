<?php
    include ("clases.inc");
    include ("mysql_conection.inc");
    
    $plaza;
    $sexo;

    # Tabla del Reporte
    print <<<EOF
    <table id=federal width = 100%> 
EOF;

    $myResidencia = new residencia;

    # Establacer conexion
    $db = new mysqli($host, $user, $pwd, $base_datos);

    # Consulta de residencias de ing. electrica

    $swPrintHeadings = 0;
    $tabla = 'residencias';

    $myResidencia -> reporteResidencias1($swPrintHeadings, $myResidencia, $tabla, $BDSeleccionada, $db, $host, $user, $pwd, $base_datos, $swPerEsc);


    # Termina Tabla Plantilla Estatal

    
print <<<EOF
    </table>
EOF;



    # cerrar conexion a BD
    $db->close();
?>