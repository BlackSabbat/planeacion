<?php

    #-----------------------------------------------------------------------------
    # programador: ing. Jose Ruben de la Peña Fuentes
    # objetivo: crear reportes adicionales
    # Docentes Discapacitados
    # SNI
    #-----------------------------------------------------------------------------
    
    include ("clases.inc");
    include ("mysql_conection.inc");

    $plaza;
    $sexo;

    $contH_fed = 0;
    $contM_fed = 0;
    $contH_est = 0;
    $contM_est = 0;

    # Tabla de Perfil Desable, SNI y Discapacitados
    print <<<EOF
    
    <tr>
        <td>&nbsp;</td>
    </tr>

    <table id=federal width = 100%> 
EOF;

    $myEmpleado = new empleado;

    $swPrintHeadings = 0;

    # Establacer conexion
    $db = new mysqli($host, $user, $pwd, $base_datos);


    # ---------------------
    # Tabla Perfil Deseable
    # ---------------------
    
    $rubro = 'Profesores con Pérfil Deseable';
    # Perfil Deseable Federales
    $consulta = "SELECT * FROM $BDSeleccionada where perfil_deseable = 'si' and tipo like 'federal'";
    $myEmpleado -> reporte7($consulta, $db, $host, $user, $pwd);

    # Perfil Deseable Estatales
    $consulta = "SELECT *  FROM $BDSeleccionada where perfil_deseable = 'si' and tipo like 'estatal'";
    $myEmpleado -> reporte7($consulta, $db, $host, $user, $pwd);

    # Imprimir Tabla
    $myEmpleado -> imprimirDiscapacitados($contH_fed, $contM_fed, $contH_est, $contM_est, $rubro, $swPrintHeadings);

    $swPrintHeadings = 1;


    # ---------------------
    # Tabla SNI
    # ---------------------

    $contH_fed = 0;
    $contM_fed = 0;
    $contH_est = 0;
    $contM_est = 0;
    
    $rubro = 'Profesores con SNI';
    # Perfil Deseable Federales
    $consulta = "SELECT * FROM $BDSeleccionada where SNI = 'si' and tipo like 'federal'";
    $myEmpleado -> reporte7($consulta, $db, $host, $user, $pwd);

    # Perfil Deseable Estatales
    $consulta = "SELECT * FROM $BDSeleccionada where SNI = 'si' and tipo like 'estatal'";
    $myEmpleado -> reporte7($consulta, $db, $host, $user, $pwd);

    # Imprimir Tabla
    $myEmpleado -> imprimirDiscapacitados($contH_fed, $contM_fed, $contH_est, $contM_est, $rubro, $swPrintHeadings);
    $swPrintHeadings = 1;


    # ---------------------
    # Tabla Discapacitados
    # ---------------------

    $contH_fed = 0;
    $contM_fed = 0;
    $contH_est = 0;
    $contM_est = 0;
    
    $rubro = 'Discapcitados';

    # Discapacitados Federales
    $consulta = "SELECT * FROM $BDSeleccionada where plaza like 'E%' and discapacidad = 'si' and tipo like 'federal'";
    $myEmpleado -> reporte7($consulta, $db, $host, $user, $pwd);
    
    # Discapacitados Estatales
    $consulta = "SELECT * FROM $BDSeleccionada where plaza like 'E%' and discapacidad = 'si' and tipo like 'estatal'";
    $myEmpleado -> reporte7($consulta, $db, $host, $user, $pwd);

    # Imprimir Tabla
    $myEmpleado -> imprimirDiscapacitados($contH_fed, $contM_fed, $contH_est, $contM_est, $rubro, $swPrintHeadings);

    # Termina Tabla 
    print <<<EOF
    </table>
EOF;

    # Tabla Dummie
    print <<<EOF
    
    
        <tr>
            <td>&nbsp;</td>
        </tr>
    
EOF;



# Tablas de cuerpos academicos
    print <<<EOF
    <table id=federal width = 100%> 
EOF;

        # ---------------------
        # Tabla Cuerpo Academico en Formacion
        # ---------------------

        $swPrintHeadings = 0;

        $contH_fed       = 0;
        $contM_fed       = 0;
        $contH_est       = 0;
        $contM_est       = 0;

        $consulta = "SELECT DISTINCTROW(nombre_cuerpo) FROM $BDSeleccionada WHERE nombre_cuerpo <> '' AND cuerpo_academico_formacion = 'si'";
        $result = $db->query($consulta);

        $rubro = 'Cuerpos Academicos en Formación';

        # Armar el reporte
        while( $row = $result->fetch_assoc()) {
            //echo "Num Control: $row[num_control] nombre: $row[nombre] sexo: $row[sexo] </br>";
            $proyecto = $row['nombre_cuerpo'];

            if ($proyecto != '')
            {
                $consulta2 = "SELECT nombre, curp, tipo FROM $BDSeleccionada WHERE nombre_cuerpo = '$proyecto'";
                $myEmpleado -> reporte7($consulta2, $db, $host, $user, $pwd);
            }
            else
            {
                echo ("Investigador: $row[nombre] con cuerpo academico NULL</br>"); 
            }
        
            # Imprimir Tabla
            $myEmpleado -> imprimirCuerpos($contH_fed, $contM_fed, $contH_est, $contM_est, $proyecto, $rubro, $swPrintHeadings);

            $swPrintHeadings = 1;

            $contH_fed = 0;
            $contM_fed = 0;
            $contH_est = 0;
            $contM_est = 0;
        
        }

        # ---------------------
        # Tabla Cuerpo Academico en Consolidacion
        # ---------------------

        $swPrintHeadings = 0;

        $contH_fed = 0;
        $contM_fed = 0;
        $contH_est = 0;
        $contM_est = 0;

        $consulta = "SELECT DISTINCTROW(nombre_cuerpo) FROM $BDSeleccionada WHERE nombre_cuerpo <> '' AND cuerpo_academico_consolidacion = 'si'";
        $result = $db->query($consulta);

        $rubro = 'Cuerpos Academicos en Consolidación';

        # Armar el reporte
        while( $row = $result->fetch_assoc()) {
            //echo "Num Control: $row[num_control] nombre: $row[nombre] sexo: $row[sexo] </br>";
            $proyecto = $row['nombre_cuerpo'];

            if ($proyecto != '')
            {
                $consulta2 = "SELECT nombre, curp, tipo FROM $BDSeleccionada WHERE nombre_cuerpo = '$proyecto'";
                $myEmpleado -> reporte7($consulta2, $db, $host, $user, $pwd);
            }
            else
            {
                echo ("Investigador: $row[nombre] con cuerpo academico NULL</br>"); 
            }
        
            # Imprimir Tabla
            $myEmpleado -> imprimirCuerpos($contH_fed, $contM_fed, $contH_est, $contM_est, $proyecto, $rubro, $swPrintHeadings);

            $swPrintHeadings = 1;

            $contH_fed = 0;
            $contM_fed = 0;
            $contH_est = 0;
            $contM_est = 0;
        
        }

        # ---------------------
        # Tabla Cuerpo Academico Consolidados
        # ---------------------

        $swPrintHeadings = 0;

        $contH_fed = 0;
        $contM_fed = 0;
        $contH_est = 0;
        $contM_est = 0;

        $consulta = "SELECT DISTINCTROW(nombre_cuerpo) FROM $BDSeleccionada WHERE nombre_cuerpo <> '' AND cuerpo_academico_consolidado = 'si'";
        $result = $db->query($consulta);

        $rubro = 'Cuerpos Academicos Consolidados';

        # Armar el reporte
        while( $row = $result->fetch_assoc()) {
            //echo "Num Control: $row[num_control] nombre: $row[nombre] sexo: $row[sexo] </br>";
            $proyecto = $row['nombre_cuerpo'];

            if ($proyecto != '')
            {
                $consulta2 = "SELECT nombre, curp, tipo FROM $BDSeleccionada WHERE nombre_cuerpo = '$proyecto'";
                $myEmpleado -> reporte7($consulta2, $db, $host, $user, $pwd);
            }
            else
            {
                echo ("Investigador: $row[nombre] con cuerpo academico NULL</br>"); 
            }
        
            # Imprimir Tabla
            $myEmpleado -> imprimirCuerpos($contH_fed, $contM_fed, $contH_est, $contM_est, $proyecto, $rubro, $swPrintHeadings);

            $swPrintHeadings = 1;

            $contH_fed = 0;
            $contM_fed = 0;
            $contH_est = 0;
            $contM_est = 0;
        
        }

        # Termina Tabla 
        print <<<EOF
    </table>
EOF;

    # cerrar conexion a BD
    $db->close();
?>