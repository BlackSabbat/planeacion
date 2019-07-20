<?php

    #-----------------------------------------------------------------------------
    # programador: ing. Jose Ruben de la Peña Fuentes
    # objetivo: crear reporte de Personal Docente Frente a Grupo por Edad y Antiguedad en Ed. a Dist.
    #-----------------------------------------------------------------------------

    include ("clases.inc");
    include ("mysql_conection.inc");

    $plaza;
    $sexo;
    //$anio_sistema_dosDigitos = date("y");
    //$anio_sistema_cuatroDigitos = date("Y");
    //$anio_sistema_dosDigitos = substr($_GET["nombreBD"],22,2);
    //$anio_sistema_cuatroDigitos = substr($_GET["nombreBD"],20,4);
    $anio_sistema_dosDigitos = substr($BDSeleccionada,20,2);
    $anio_sistema_cuatroDigitos = substr($BDSeleccionada,18,4);

    # Tabla del Reporte
    print <<<EOF

    <table>
       <tr>
           <td>
               Personal Estatal:
           </td>
       </tr>
    </table>

    <table width = 500>
EOF;

    $myEmpleado = new empleado;
    //$edad = $myEmpleado->calcularEdad(2018,1974);

    # Establacer conexion
    $db = new mysqli($host, $user, $pwd, $base_datos);

    #-----------------------------------
    # Determinar Dualidad en Plazas
    #-----------------------------------
    $consulta = "SELECT * FROM $BDSeleccionada where tipo like 'federal'";
    $result = $db->query($consulta);
    while( $row = $result->fetch_assoc()) {
        //echo "Empleado:$row[nombre]"; echo " "; echo "CURP:$row[curp]"; echo " "; echo "plaza:$row[plaza]</br>";
        $curp = trim($row['curp']);
        $db2 = new mysqli($host, $user, $pwd, $base_datos);
        $consulta2 = "SELECT * FROM $BDSeleccionada where curp = '$curp' and tipo like 'estatal'";
        $result2 = $db2->query($consulta2);
        $row2 = $result2->fetch_assoc();

        // buscar si empleado ya esta marcado con dualidad
        $observaciones = $row2['observaciones'];
        $buscarDualidad = strstr($observaciones, ',con dualidad de plaza');

        // marcar el empleado que tiene dualidad y si no esta previamente marcado
        if (($result2->num_rows != 0) && ($buscarDualidad ==''))
        {
            //Borrar de Estatales
            //echo "borrar de estatales: $curp <br>";

            $db3 = new mysqli($host, $user, $pwd, $base_datos);
            $consulta3 = "update plantilla_Ene_Jul_2019 set observaciones = '$observaciones ,con dualidad de plaza' where curp = '$curp' and tipo like 'estatal'";
            //echo "$consulta3</br>";
            $result3 = $db3->query($consulta3);
        }
    }
    

    #-----------------------------------
    # Inicia Tabla Plantilla Federal
    #-----------------------------------

    $totalHombre_Reporte3                = 0;
    $totalMujer_Reporte3                 = 0;
    $totalHomAntig_Reporte3              = 0;
    $totalMujAntig_Reporte3              = 0;

    $swPrintHeadings                     = 0;

    # Consulta Empleados Plaza Docente
    $query = "select * from $BDSeleccionada where docente_distancia = 'si'   and tipo = 'federal'";
    $result = $db->query($query);

    $contadorHombre_Uno_Reporte3         = 0;
    $contadorMujer_Uno_Reporte3          = 0;
    $contadorHombre_Dos_Reporte3         = 0;
    $contadorMujer_Dos_Reporte3          = 0;
    $contadorHombre_Tres_Reporte3        = 0;
    $contadorMujer_Tres_Reporte3         = 0;
    $contadorHombre_Cuatro_Reporte3      = 0;
    $contadorMujer_Cuatro_Reporte3       = 0;
    $contadorHombre_Cinco_Reporte3       = 0;
    $contadorMujer_Cinco_Reporte3        = 0;
    $contadorHombre_Seis_Reporte3        = 0;
    $contadorMujer_Seis_Reporte3         = 0;
    $contadorHombre_Siete_Reporte3       = 0;
    $contadorMujer_Siete_Reporte3        = 0;
    $contadorHombre_Ocho_Reporte3        = 0;
    $contadorMujer_Ocho_Reporte3         = 0;
    $contadorHombre_Nueve_Reporte3       = 0;
    $contadorMujer_Nueve_Reporte3        = 0;
    $contadorHombre_Diez_Reporte3        = 0;
    $contadorMujer_Diez_Reporte3         = 0;
    $contHom_Antig_Uno_Reporte3          = 0;
    $contMuj_Antig_Uno_Reporte3          = 0;
    $contHom_Antig_Dos_Reporte3          = 0;
    $contMuj_Antig_Dos_Reporte3          = 0;
    $contHom_Antig_Tres_Reporte3         = 0;
    $contMuj_Antig_Tres_Reporte3         = 0;
    $contHom_Antig_Cuatro_Reporte3       = 0;
    $contMuj_Antig_Cuatro_Reporte3       = 0;
    $contHom_Antig_Cinco_Reporte3        = 0;
    $contMuj_Antig_Cinco_Reporte3        = 0;
    $contHom_Antig_Seis_Reporte3         = 0;
    $contMuj_Antig_Seis_Reporte3         = 0;
    $contHom_Antig_Siete_Reporte3        = 0;
    $contMuj_Antig_Siete_Reporte3        = 0;

    

    # Armar el reporte
    while( $row = $result->fetch_assoc()) {
        #echo "<p>Empleado:$row[nombre]"; echo " "; echo "CURP:$row['curp']"; echo " "; echo "plaza:$row['plaza']</p>\n";

        # Calcular Edad
        $anio_emp = (substr ($row['curp'], 4, 2));
        $myEmpleado -> calcularEdad($anio_emp,$anio_sistema_dosDigitos, $anio_sistema_cuatroDigitos);


        # Obtener Antiguedad en base al año de ingreso con el año actual
        $fecha_ingreso = explode("/",$row['fecha_ingreso']);

        if ($row['fecha_ingreso'] == '')
        {
            $anio == '0000';
        }
        else
        {
            $dia = $fecha_ingreso[0];
            $mes = $fecha_ingreso[1];
            $anio = $fecha_ingreso[2];   
        }

        $myEmpleado -> calcularAntiguedad($anio, $anio_sistema_dosDigitos, $anio_sistema_cuatroDigitos);

        $sexo = (substr ($row['curp'], 10, 1));

        #Ejecutar metodo de la clase
        $myEmpleado -> edadAntig($edad, $sexo, $antiguedad);
    }

    $myEmpleado -> imprimirReporte3($contadorHombre_Uno_Reporte3, $contadorMujer_Uno_Reporte3,$contadorHombre_Dos_Reporte3, $contadorMujer_Dos_Reporte3,$contadorHombre_Tres_Reporte3, $contadorMujer_Tres_Reporte3,$contadorHombre_Cuatro_Reporte3, $contadorMujer_Cuatro_Reporte3,$contadorHombre_Cinco_Reporte3, $contadorMujer_Cinco_Reporte3,$contadorHombre_Seis_Reporte3, $contadorMujer_Seis_Reporte3,$contadorHombre_Siete_Reporte3, $contadorMujer_Siete_Reporte3,$contadorHombre_Ocho_Reporte3, $contadorMujer_Ocho_Reporte3,$contadorHombre_Nueve_Reporte3, $contadorMujer_Nueve_Reporte3,$contadorHombre_Diez_Reporte3, $contadorMujer_Diez_Reporte3,$contHom_Antig_Uno_Reporte3, $contMuj_Antig_Uno_Reporte3, $contHom_Antig_Dos_Reporte3,     $contMuj_Antig_Dos_Reporte3, $contHom_Antig_Tres_Reporte3, $contMuj_Antig_Tres_Reporte3,       $contHom_Antig_Cuatro_Reporte3, $contMuj_Antig_Cuatro_Reporte3, $contHom_Antig_Cinco_Reporte3,   $contMuj_Antig_Cinco_Reporte3, $contHom_Antig_Seis_Reporte3, $contMuj_Antig_Seis_Reporte3,       $contHom_Antig_Siete_Reporte3, $contMuj_Antig_Siete_Reporte3, $swPrintHeadings);

    $swPrintHeadings = 1;

    # imprimir totales y cerrar tabla del reporte
    print <<<EOF
        <tr>
            <th id="TotalesChico">Totales (Federal)</th>
            <th id="TotalesChico">$totalHombre_Reporte3</th>
            <th id="TotalesChico">$totalMujer_Reporte3</th>
            <th id="TotalesChico">$totalGral_Reporte3</th>
            <th id="TotalesChico">Totales (Federal)</th>
            <th id="TotalesChico">$totalHomAntig_Reporte3 </th>
            <th id="TotalesChico">$totalMujAntig_Reporte3 </th>
            <th id="TotalesChico">$totalGralAntig_Reporte3</th>
        </tr>
        
        </table>
EOF;

    # FINALIZA Tabla Plantilla Federal

    print <<<EOF

    <table>
        <tr>
            <td>&nbsp;  </td>
        </tr>
    </table>
EOF;


    #-----------------------------------
    # Inicia Tabla Plantilla Estatal
    #-----------------------------------

    print <<<EOF

    <table>
       <tr>
           <td>
               Personal Estatal:
           </td>
       </tr>
   </table>
   
    <table width = 500>
EOF;

    #-----------------------------------
    # Inicia Tabla Plantilla Estatal
    #-----------------------------------

    $totalHombre_Reporte3                = 0;
    $totalMujer_Reporte3                 = 0;
    $totalHomAntig_Reporte3              = 0;
    $totalMujAntig_Reporte3              = 0;

    $swPrintHeadings                     = 0;

    # Consulta Empleados Plaza Docente
    $query = "select * from $BDSeleccionada where docente_distancia = 'si'   and tipo = 'estatal' and observaciones not like '%dualidad de plaza%'";
    $result = $db->query($query);

    $contadorHombre_Uno_Reporte3         = 0;
    $contadorMujer_Uno_Reporte3          = 0;
    $contadorHombre_Dos_Reporte3         = 0;
    $contadorMujer_Dos_Reporte3          = 0;
    $contadorHombre_Tres_Reporte3        = 0;
    $contadorMujer_Tres_Reporte3         = 0;
    $contadorHombre_Cuatro_Reporte3      = 0;
    $contadorMujer_Cuatro_Reporte3       = 0;
    $contadorHombre_Cinco_Reporte3       = 0;
    $contadorMujer_Cinco_Reporte3        = 0;
    $contadorHombre_Seis_Reporte3        = 0;
    $contadorMujer_Seis_Reporte3         = 0;
    $contadorHombre_Siete_Reporte3       = 0;
    $contadorMujer_Siete_Reporte3        = 0;
    $contadorHombre_Ocho_Reporte3        = 0;
    $contadorMujer_Ocho_Reporte3         = 0;
    $contadorHombre_Nueve_Reporte3       = 0;
    $contadorMujer_Nueve_Reporte3        = 0;
    $contadorHombre_Diez_Reporte3        = 0;
    $contadorMujer_Diez_Reporte3         = 0;
    $contHom_Antig_Uno_Reporte3          = 0;
    $contMuj_Antig_Uno_Reporte3          = 0;
    $contHom_Antig_Dos_Reporte3          = 0;
    $contMuj_Antig_Dos_Reporte3          = 0;
    $contHom_Antig_Tres_Reporte3         = 0;
    $contMuj_Antig_Tres_Reporte3         = 0;
    $contHom_Antig_Cuatro_Reporte3       = 0;
    $contMuj_Antig_Cuatro_Reporte3       = 0;
    $contHom_Antig_Cinco_Reporte3        = 0;
    $contMuj_Antig_Cinco_Reporte3        = 0;
    $contHom_Antig_Seis_Reporte3         = 0;
    $contMuj_Antig_Seis_Reporte3         = 0;
    $contHom_Antig_Siete_Reporte3        = 0;
    $contMuj_Antig_Siete_Reporte3        = 0;

    # Armar el reporte
    while( $row = $result->fetch_assoc()) {
        #echo "<p>Empleado:$row[nombre]"; echo " "; echo "CURP:$row['curp']"; echo " "; echo "plaza:$row['plaza']</p>\n";

        # Calcular Edad
        $anio_emp = (substr ($row['curp'], 4, 2));
        $myEmpleado -> calcularEdad($anio_emp,$anio_sistema_dosDigitos, $anio_sistema_cuatroDigitos);

        # Obtener Antiguedad en base al año de ingreso con el año actual
        $fecha_ingreso = explode("/",$row['fecha_ingreso']);

        if ($row['fecha_ingreso'] == '')
        {
            $anio == '0000';
        }
        else
        {
            $dia = $fecha_ingreso[0];
            $mes = $fecha_ingreso[1];
            $anio = $fecha_ingreso[2];   
        }

        $myEmpleado -> calcularAntiguedad($anio, $anio_sistema_dosDigitos, $anio_sistema_cuatroDigitos);

        $sexo = (substr ($row['curp'], 10, 1));

        #Ejecutar metodo de la clase
        $myEmpleado -> edadAntig($edad, $sexo, $antiguedad);
    }

    $myEmpleado -> imprimirReporte3($contadorHombre_Uno_Reporte3, $contadorMujer_Uno_Reporte3,$contadorHombre_Dos_Reporte3, $contadorMujer_Dos_Reporte3,$contadorHombre_Tres_Reporte3, $contadorMujer_Tres_Reporte3,$contadorHombre_Cuatro_Reporte3, $contadorMujer_Cuatro_Reporte3,$contadorHombre_Cinco_Reporte3, $contadorMujer_Cinco_Reporte3,$contadorHombre_Seis_Reporte3, $contadorMujer_Seis_Reporte3,$contadorHombre_Siete_Reporte3, $contadorMujer_Siete_Reporte3,$contadorHombre_Ocho_Reporte3, $contadorMujer_Ocho_Reporte3,$contadorHombre_Nueve_Reporte3, $contadorMujer_Nueve_Reporte3,$contadorHombre_Diez_Reporte3, $contadorMujer_Diez_Reporte3,$contHom_Antig_Uno_Reporte3, $contMuj_Antig_Uno_Reporte3, $contHom_Antig_Dos_Reporte3,     $contMuj_Antig_Dos_Reporte3, $contHom_Antig_Tres_Reporte3, $contMuj_Antig_Tres_Reporte3,       $contHom_Antig_Cuatro_Reporte3, $contMuj_Antig_Cuatro_Reporte3, $contHom_Antig_Cinco_Reporte3,   $contMuj_Antig_Cinco_Reporte3, $contHom_Antig_Seis_Reporte3, $contMuj_Antig_Seis_Reporte3,       $contHom_Antig_Siete_Reporte3, $contMuj_Antig_Siete_Reporte3, $swPrintHeadings);

    $swPrintHeadings = 1;

    # imprimir totales y cerrar tabla del reporte
    print <<<EOF
        <tr>
            <th id="TotalesChico">Totales (Estatal)</th>
            <th id="TotalesChico">$totalHombre_Reporte3</th>
            <th id="TotalesChico">$totalMujer_Reporte3</th>
            <th id="TotalesChico">$totalGral_Reporte3</th>
            <th id="TotalesChico">Totales (Estatal)</th>
            <th id="TotalesChico">$totalHomAntig_Reporte3 </th>
            <th id="TotalesChico">$totalMujAntig_Reporte3 </th>
            <th id="TotalesChico">$totalGralAntig_Reporte3</th>
        </tr>
    </table>
EOF;

    # cerrar conexion a BD
    $db->close();
?>