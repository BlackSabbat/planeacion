<?php
    #-----------------------------------------------------------------------------
    # programador: ing. Jose Ruben de la Peña Fuentes
    # objetivo: crear reporte "Docente en Ed. a Distancia Frente a Grupo por Grado"
    #-----------------------------------------------------------------------------

    include ("clases.inc");
    include ("mysql_conection.inc");

    $plaza;
    $sexo;

    # Tabla del Reporte
    print <<<EOF

    <table>
       <tr>
           <td>
               Personal Federal:
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

    $totalHombre_TiempoCompleto = 0;
    $totalMujer_TiempoCompleto  = 0;
    $totalHombre_TresCuartos    = 0;
    $totalMujer_TresCuartos     = 0;
    $totalHombre_MedioTiempo    = 0;
    $totalMujer_MedioTiempo     = 0;
    $totalHombre_Asignatura     = 0;
    $totalMujer_Asignatura      = 0;
    $totalHombreGral            = 0;
    $totalMujerGral             = 0;
    $totalGral                  = 0;

    $swPrintHeadings = 0;

    # Consulta Pasantes de licenciatura
    $rubro = "Pasante Lic.";

    $contadorHombre_TiempoCompleto  = 0;
    $contadorMujer_TiempoCompleto   = 0;
    $contadorHombre_TresCuartos     = 0;
    $contadorMujer_TresCuartos      = 0;
    $contadorHombre_MedioTiempo     = 0;
    $contadorMujer_MedioTiempo      = 0;
    $contadorHombre_Asignatura      = 0;
    $contadorMujer_Asignatura       = 0;
    
    $consulta = "select * from $BDSeleccionada where docente_distancia = 'si' and nomenclatura like '%LP%' and tipo = 'federal'";
    $myEmpleado -> reporte1($consulta, $db, $host, $user, $pwd);
    $myEmpleado -> imprimirReporte1($rubro,$contadorHombre_TiempoCompleto, $contadorMujer_TiempoCompleto, $contadorHombre_TresCuartos, $contadorMujer_TresCuartos, $contadorHombre_MedioTiempo, $contadorMujer_MedioTiempo, $contadorHombre_Asignatura, $contadorMujer_Asignatura,$swPrintHeadings);

    $swPrintHeadings = 1;


    # Consulta Licenciatura Titurlados
    $rubro = "Lic. Titulado";
    
    $contadorHombre_TiempoCompleto  = 0;
    $contadorMujer_TiempoCompleto   = 0;
    $contadorHombre_TresCuartos     = 0;
    $contadorMujer_TresCuartos      = 0;
    $contadorHombre_MedioTiempo     = 0;
    $contadorMujer_MedioTiempo      = 0;
    $contadorHombre_Asignatura      = 0;
    $contadorMujer_Asignatura       = 0;

    $consulta = "select * from $BDSeleccionada where docente_distancia = 'si' and (nomenclatura like '%LT%' or nomenclatura like 'LICENCIATURA') and tipo = 'federal'";
    $myEmpleado -> reporte1($consulta, $db, $host, $user, $pwd);
    $myEmpleado -> imprimirReporte1($rubro,$contadorHombre_TiempoCompleto, $contadorMujer_TiempoCompleto, $contadorHombre_TresCuartos, $contadorMujer_TresCuartos, $contadorHombre_MedioTiempo, $contadorMujer_MedioTiempo, $contadorHombre_Asignatura, $contadorMujer_Asignatura,$swPrintHeadings);


    # Consulta Especalizacion
    $rubro = "Especialización Tit.";
    
    $contadorHombre_TiempoCompleto  = 0;
    $contadorMujer_TiempoCompleto   = 0;
    $contadorHombre_TresCuartos     = 0;
    $contadorMujer_TresCuartos      = 0;
    $contadorHombre_MedioTiempo     = 0;
    $contadorMujer_MedioTiempo      = 0;
    $contadorHombre_Asignatura      = 0;
    $contadorMujer_Asignatura       = 0;

    $consulta = "select * from $BDSeleccionada where docente_distancia = 'si' and (nomenclatura like '%ET%') and tipo = 'federal'";
    $myEmpleado -> reporte1($consulta, $db, $host, $user, $pwd);
    $myEmpleado -> imprimirReporte1($rubro,$contadorHombre_TiempoCompleto, $contadorMujer_TiempoCompleto, $contadorHombre_TresCuartos, $contadorMujer_TresCuartos, $contadorHombre_MedioTiempo, $contadorMujer_MedioTiempo, $contadorHombre_Asignatura, $contadorMujer_Asignatura,$swPrintHeadings);


    # Consulta Maestria Sin Grado
    $rubro = "Maestría Sin Grado";

    $contadorHombre_TiempoCompleto  = 0;
    $contadorMujer_TiempoCompleto   = 0;
    $contadorHombre_TresCuartos     = 0;
    $contadorMujer_TresCuartos      = 0;
    $contadorHombre_MedioTiempo     = 0;
    $contadorMujer_MedioTiempo      = 0;
    $contadorHombre_Asignatura      = 0;
    $contadorMujer_Asignatura       = 0;

    $consulta = "select * from $BDSeleccionada where docente_distancia = 'si' and (nomenclatura like '%MS%') and tipo = 'federal'";
    $myEmpleado -> reporte1($consulta, $db, $host, $user, $pwd);
    $myEmpleado -> imprimirReporte1($rubro,$contadorHombre_TiempoCompleto, $contadorMujer_TiempoCompleto, $contadorHombre_TresCuartos, $contadorMujer_TresCuartos, $contadorHombre_MedioTiempo, $contadorMujer_MedioTiempo, $contadorHombre_Asignatura, $contadorMujer_Asignatura,$swPrintHeadings);


    # Consulta Maestria Con Grado
    $rubro = "Maestría Con Grado";

    $contadorHombre_TiempoCompleto  = 0;
    $contadorMujer_TiempoCompleto   = 0;
    $contadorHombre_TresCuartos     = 0;
    $contadorMujer_TresCuartos      = 0;
    $contadorHombre_MedioTiempo     = 0;
    $contadorMujer_MedioTiempo      = 0;
    $contadorHombre_Asignatura      = 0;
    $contadorMujer_Asignatura       = 0;

    $consulta = "select * from $BDSeleccionada where docente_distancia = 'si' and (nomenclatura like '%MG%') and tipo = 'federal'";
    $myEmpleado -> reporte1($consulta, $db, $host, $user, $pwd);
    $myEmpleado -> imprimirReporte1($rubro,$contadorHombre_TiempoCompleto, $contadorMujer_TiempoCompleto, $contadorHombre_TresCuartos, $contadorMujer_TresCuartos, $contadorHombre_MedioTiempo, $contadorMujer_MedioTiempo, $contadorHombre_Asignatura, $contadorMujer_Asignatura,$swPrintHeadings);


    # Consulta Doctor Sin Grado
    $rubro = "Doctor Sin Grado";

    $contadorHombre_TiempoCompleto  = 0;
    $contadorMujer_TiempoCompleto   = 0;
    $contadorHombre_TresCuartos     = 0;
    $contadorMujer_TresCuartos      = 0;
    $contadorHombre_MedioTiempo     = 0;
    $contadorMujer_MedioTiempo      = 0;
    $contadorHombre_Asignatura      = 0;
    $contadorMujer_Asignatura       = 0;

    $consulta = "select * from $BDSeleccionada where docente_distancia = 'si' and (nomenclatura like '%DS%') and tipo = 'federal'";
    $myEmpleado -> reporte1($consulta, $db, $host, $user, $pwd);
    $myEmpleado -> imprimirReporte1($rubro,$contadorHombre_TiempoCompleto, $contadorMujer_TiempoCompleto, $contadorHombre_TresCuartos, $contadorMujer_TresCuartos, $contadorHombre_MedioTiempo, $contadorMujer_MedioTiempo, $contadorHombre_Asignatura, $contadorMujer_Asignatura,$swPrintHeadings);


    # Consulta Doctor Con Grado
    $rubro = "Doctor con Grado";
    
    $contadorHombre_TiempoCompleto = 0;
    $contadorMujer_TiempoCompleto = 0;
    $contadorHombre_TresCuartos = 0;
    $contadorMujer_TresCuartos = 0;
    $contadorHombre_MedioTiempo = 0;
    $contadorMujer_MedioTiempo = 0;
    $contadorHombre_Asignatura = 0;
    $contadorMujer_Asignatura = 0;
    
    $consulta = "select * from $BDSeleccionada where docente_distancia = 'si' and (nomenclatura like '%DG%') and tipo = 'federal'";
    $myEmpleado -> reporte1($consulta, $db, $host, $user, $pwd);
    $myEmpleado -> imprimirReporte1($rubro,$contadorHombre_TiempoCompleto, $contadorMujer_TiempoCompleto, $contadorHombre_TresCuartos, $contadorMujer_TresCuartos, $contadorHombre_MedioTiempo, $contadorMujer_MedioTiempo, $contadorHombre_Asignatura, $contadorMujer_Asignatura,$swPrintHeadings);


    # Consulta Otros (personas sin Licenciatura, pero con plaza docente)
    $rubro = "Otros";

    $contadorHombre_TiempoCompleto = 0;
    $contadorMujer_TiempoCompleto = 0;
    $contadorHombre_TresCuartos = 0;
    $contadorMujer_TresCuartos = 0;
    $contadorHombre_MedioTiempo = 0;
    $contadorMujer_MedioTiempo = 0;
    $contadorHombre_Asignatura = 0;
    $contadorMujer_Asignatura = 0;

    $consulta = "select * from $BDSeleccionada where docente_distancia = 'si' and (nomenclatura like '%TT%' or nomenclatura like '( C ) CERTIFICADO' or nomenclatura like '%TP%' or nomenclatura like '') and tipo = 'federal'";
    $myEmpleado -> reporte1($consulta, $db, $host, $user, $pwd);
    $myEmpleado -> imprimirReporte1($rubro,$contadorHombre_TiempoCompleto, $contadorMujer_TiempoCompleto, $contadorHombre_TresCuartos, $contadorMujer_TresCuartos, $contadorHombre_MedioTiempo, $contadorMujer_MedioTiempo, $contadorHombre_Asignatura, $contadorMujer_Asignatura,$swPrintHeadings);

    # subtotales en totales
    $subtotal1 = $subtotal = $totalHombre_TiempoCompleto + $totalMujer_TiempoCompleto;
    $subtotal2 = $totalHombre_TresCuartos + $totalMujer_TresCuartos;
    $subtotal3 = $totalHombre_MedioTiempo + $totalMujer_MedioTiempo;
    $subtotal4 = $totalHombre_Asignatura + $totalMujer_Asignatura;

    # imprimir totales y cerrar tabla del reporte
    print <<<EOF

    <tr>
        <th id="TotalesChico">Totales Federal               </th>
        <th id="TotalesChico">$totalHombre_TiempoCompleto   </th>
        <th id="TotalesChico">$totalMujer_TiempoCompleto    </th>
        <th id="TotalesChico">$subtotal1                    </th>
        <th id="TotalesChico">$totalHombre_TresCuartos      </th>
        <th id="TotalesChico">$totalMujer_TresCuartos       </th>
        <th id="TotalesChico">$subtotal2                    </th>
        <th id="TotalesChico">$totalHombre_MedioTiempo      </th>
        <th id="TotalesChico">$totalMujer_MedioTiempo       </th>
        <th id="TotalesChico">$subtotal3                    </th>
        <th id="TotalesChico">$totalHombre_Asignatura       </th>
        <th id="TotalesChico">$totalMujer_Asignatura        </th>
        <th id="TotalesChico">$subtotal4                    </th>
        <th id="TotalesChico">$totalHombreGral              </th>
        <th id="TotalesChico">$totalMujerGral               </th>
        <th id="TotalesChico">$totalGral                    </th>
    </tr>

EOF;

    # Termina Tabla Plantilla Federal

    # tabla Dummie
    print <<<EOF
    <table>
        <tr>
            <td>&nbsp;</td>
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

    $totalHombre_TiempoCompleto = 0;
    $totalMujer_TiempoCompleto  = 0;
    $totalHombre_TresCuartos    = 0;
    $totalMujer_TresCuartos     = 0;
    $totalHombre_MedioTiempo    = 0;
    $totalMujer_MedioTiempo     = 0;
    $totalHombre_Asignatura     = 0;
    $totalMujer_Asignatura      = 0;
    $totalHombreGral            = 0;
    $totalMujerGral             = 0;
    $totalGral                  = 0;

    $swPrintHeadings = 0;

    # Consulta Pasantes de licenciatura
    $rubro = "Pasante Lic.";

    $contadorHombre_TiempoCompleto  = 0;
    $contadorMujer_TiempoCompleto   = 0;
    $contadorHombre_TresCuartos     = 0;
    $contadorMujer_TresCuartos      = 0;
    $contadorHombre_MedioTiempo     = 0;
    $contadorMujer_MedioTiempo      = 0;
    $contadorHombre_Asignatura      = 0;
    $contadorMujer_Asignatura       = 0;

    $consulta = "select * from $BDSeleccionada where docente_distancia = 'si' and (nomenclatura like 'LP') and tipo = 'estatal' and observaciones not like '%dualidad de plaza%'";
    $myEmpleado -> reporte1($consulta, $db, $host, $user, $pwd);
    $myEmpleado -> imprimirReporte1($rubro,$contadorHombre_TiempoCompleto, $contadorMujer_TiempoCompleto, $contadorHombre_TresCuartos, $contadorMujer_TresCuartos, $contadorHombre_MedioTiempo, $contadorMujer_MedioTiempo, $contadorHombre_Asignatura, $contadorMujer_Asignatura,$swPrintHeadings);

    $swPrintHeadings = 1;


    # Consulta Licenciatura Titulados
    $rubro = "Lic. Titulado";

    $contadorHombre_TiempoCompleto  = 0;
    $contadorMujer_TiempoCompleto   = 0;
    $contadorHombre_TresCuartos     = 0;
    $contadorMujer_TresCuartos      = 0;
    $contadorHombre_MedioTiempo     = 0;
    $contadorMujer_MedioTiempo      = 0;
    $contadorHombre_Asignatura      = 0;
    $contadorMujer_Asignatura       = 0;

    $consulta = "select * from $BDSeleccionada where docente_distancia = 'si' and (nomenclatura like 'LT' or nomenclatura like '') and tipo like 'estatal' and observaciones not like '%dualidad de plaza%'";
    $myEmpleado -> reporte1($consulta, $db, $host, $user, $pwd);
    $myEmpleado -> imprimirReporte1($rubro,$contadorHombre_TiempoCompleto, $contadorMujer_TiempoCompleto, $contadorHombre_TresCuartos, $contadorMujer_TresCuartos, $contadorHombre_MedioTiempo, $contadorMujer_MedioTiempo, $contadorHombre_Asignatura, $contadorMujer_Asignatura,$swPrintHeadings);


    # Consulta Especalizacion
    $rubro = "Especialización Tit.";

    $contadorHombre_TiempoCompleto  = 0;
    $contadorMujer_TiempoCompleto   = 0;
    $contadorHombre_TresCuartos     = 0;
    $contadorMujer_TresCuartos      = 0;
    $contadorHombre_MedioTiempo     = 0;
    $contadorMujer_MedioTiempo      = 0;
    $contadorHombre_Asignatura      = 0;
    $contadorMujer_Asignatura       = 0;

    $consulta = "select * from $BDSeleccionada where docente_distancia = 'si' and nomenclatura like 'ET' and tipo like 'estatal' and observaciones not like '%dualidad de plaza%'";
    $myEmpleado -> reporte1($consulta, $db, $host, $user, $pwd);
    $myEmpleado -> imprimirReporte1($rubro,$contadorHombre_TiempoCompleto, $contadorMujer_TiempoCompleto, $contadorHombre_TresCuartos, $contadorMujer_TresCuartos, $contadorHombre_MedioTiempo, $contadorMujer_MedioTiempo, $contadorHombre_Asignatura, $contadorMujer_Asignatura,$swPrintHeadings);


    # Consulta Maestria Sin Grado
    $rubro = "Maestría Sin Grado";
    
    $contadorHombre_TiempoCompleto  = 0;
    $contadorMujer_TiempoCompleto   = 0;
    $contadorHombre_TresCuartos     = 0;
    $contadorMujer_TresCuartos      = 0;
    $contadorHombre_MedioTiempo     = 0;
    $contadorMujer_MedioTiempo      = 0;
    $contadorHombre_Asignatura      = 0;
    $contadorMujer_Asignatura       = 0;

    $consulta = "select * from $BDSeleccionada where docente_distancia = 'si' and nomenclatura like 'MS' and tipo like 'estatal' and observaciones not like '%dualidad de plaza%'";
    $myEmpleado -> reporte1($consulta, $db, $host, $user, $pwd);
    $myEmpleado -> imprimirReporte1($rubro,$contadorHombre_TiempoCompleto, $contadorMujer_TiempoCompleto, $contadorHombre_TresCuartos, $contadorMujer_TresCuartos, $contadorHombre_MedioTiempo, $contadorMujer_MedioTiempo, $contadorHombre_Asignatura, $contadorMujer_Asignatura,$swPrintHeadings);
    
    
    # Consulta Maestria Con Grado
    $rubro = "Maestría Con Grado";

    $contadorHombre_TiempoCompleto  = 0;
    $contadorMujer_TiempoCompleto   = 0;
    $contadorHombre_TresCuartos     = 0;
    $contadorMujer_TresCuartos      = 0;
    $contadorHombre_MedioTiempo     = 0;
    $contadorMujer_MedioTiempo      = 0;
    $contadorHombre_Asignatura      = 0;
    $contadorMujer_Asignatura       = 0;

    $consulta = "select * from $BDSeleccionada where docente_distancia = 'si' and (nomenclatura like 'MG') and tipo like 'estatal' and observaciones not like '%dualidad de plaza%'";
    $myEmpleado -> reporte1($consulta, $db, $host, $user, $pwd);
    $myEmpleado -> imprimirReporte1($rubro,$contadorHombre_TiempoCompleto, $contadorMujer_TiempoCompleto, $contadorHombre_TresCuartos, $contadorMujer_TresCuartos, $contadorHombre_MedioTiempo, $contadorMujer_MedioTiempo, $contadorHombre_Asignatura, $contadorMujer_Asignatura,$swPrintHeadings);


    # Consulta Doctor Sin Grado
    $rubro = "Doctor Sin Grado";

    $contadorHombre_TiempoCompleto  = 0;
    $contadorMujer_TiempoCompleto   = 0;
    $contadorHombre_TresCuartos     = 0;
    $contadorMujer_TresCuartos      = 0;
    $contadorHombre_MedioTiempo     = 0;
    $contadorMujer_MedioTiempo      = 0;
    $contadorHombre_Asignatura      = 0;
    $contadorMujer_Asignatura       = 0;

    $consulta= "select * from $BDSeleccionada where docente_distancia = 'si' and nomenclatura like 'DS' and tipo like 'estatal' and observaciones not like '%dualidad de plaza%'";
    $myEmpleado -> reporte1($consulta, $db, $host, $user, $pwd);
    $myEmpleado -> imprimirReporte1($rubro,$contadorHombre_TiempoCompleto, $contadorMujer_TiempoCompleto, $contadorHombre_TresCuartos, $contadorMujer_TresCuartos, $contadorHombre_MedioTiempo, $contadorMujer_MedioTiempo, $contadorHombre_Asignatura, $contadorMujer_Asignatura,$swPrintHeadings);


    # Consulta Doctor Con Grado
    $rubro = "Doctor con Grado";
    
    $contadorHombre_TiempoCompleto = 0;
    $contadorMujer_TiempoCompleto = 0;
    $contadorHombre_TresCuartos = 0;
    $contadorMujer_TresCuartos = 0;
    $contadorHombre_MedioTiempo = 0;
    $contadorMujer_MedioTiempo = 0;
    $contadorHombre_Asignatura = 0;
    $contadorMujer_Asignatura = 0;

    $consulta = "select * from $BDSeleccionada where docente_distancia = 'si' and nomenclatura like 'DG' and tipo like 'estatal' and observaciones not like '%dualidad de plaza%'";
    $myEmpleado -> reporte1($consulta, $db, $host, $user, $pwd);
    $myEmpleado -> imprimirReporte1($rubro,$contadorHombre_TiempoCompleto, $contadorMujer_TiempoCompleto, $contadorHombre_TresCuartos, $contadorMujer_TresCuartos, $contadorHombre_MedioTiempo, $contadorMujer_MedioTiempo, $contadorHombre_Asignatura, $contadorMujer_Asignatura,$swPrintHeadings);


    # Consulta Otros (personas sin Licenciatura, pero con plaza docente)
    $rubro = "Otros";
    
    $contadorHombre_TiempoCompleto = 0;
    $contadorMujer_TiempoCompleto = 0;
    $contadorHombre_TresCuartos = 0;
    $contadorMujer_TresCuartos = 0;
    $contadorHombre_MedioTiempo = 0;
    $contadorMujer_MedioTiempo = 0;
    $contadorHombre_Asignatura = 0;
    $contadorMujer_Asignatura = 0;

    $consulta = "select * from $BDSeleccionada where docente_distancia = 'si' and (nomenclatura like 'TT' or nomenclatura like 'C' or nomenclatura like 'TP' or nomenclatura like 'P' or nomenclatura like '-') and (tipo like 'estatal') and observaciones not like '%dualidad de plaza%'";
    $myEmpleado -> reporte1($consulta, $db, $host, $user, $pwd);
    $myEmpleado -> imprimirReporte1($rubro,$contadorHombre_TiempoCompleto, $contadorMujer_TiempoCompleto, $contadorHombre_TresCuartos, $contadorMujer_TresCuartos, $contadorHombre_MedioTiempo, $contadorMujer_MedioTiempo, $contadorHombre_Asignatura, $contadorMujer_Asignatura,$swPrintHeadings);

    # subtotales en totales
    $subtotal1 = $subtotal = $totalHombre_TiempoCompleto + $totalMujer_TiempoCompleto;
    $subtotal2 = $totalHombre_TresCuartos + $totalMujer_TresCuartos;
    $subtotal3 = $totalHombre_MedioTiempo + $totalMujer_MedioTiempo;
    $subtotal4 = $totalHombre_Asignatura + $totalMujer_Asignatura;

    # imprimir totales y cerrar tabla del reporte
    print <<<EOF

    <tr>
        <th id="TotalesChico">Totales Estatal               </th>
        <th id="TotalesChico">$totalHombre_TiempoCompleto   </th>
        <th id="TotalesChico">$totalMujer_TiempoCompleto    </th>
        <th id="TotalesChico">$subtotal1                    </th>
        <th id="TotalesChico">$totalHombre_TresCuartos      </th>
        <th id="TotalesChico">$totalMujer_TresCuartos       </th>
        <th id="TotalesChico">$subtotal2                    </th>
        <th id="TotalesChico">$totalHombre_MedioTiempo      </th>
        <th id="TotalesChico">$totalMujer_MedioTiempo       </th>
        <th id="TotalesChico">$subtotal3                    </th>
        <th id="TotalesChico">$totalHombre_Asignatura       </th>
        <th id="TotalesChico">$totalMujer_Asignatura        </th>
        <th id="TotalesChico">$subtotal4                    </th>
        <th id="TotalesChico">$totalHombreGral              </th>
        <th id="TotalesChico">$totalMujerGral               </th>
        <th id="TotalesChico">$totalGral                    </th>
    </tr>

EOF;

    # Termina Tabla Plantilla Estatal

print <<<EOF
    </table>
EOF;

    # cerrar conexion a BD
    $db->close();
?>