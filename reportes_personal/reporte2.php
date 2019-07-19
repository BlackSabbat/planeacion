<?php
    #-----------------------------------------------------------------------------
    # programador: ing. Jose Ruben de la Peña Fuentes
    # objetivo: crear reporte "Plaza Apoyo por Grado"
    #-----------------------------------------------------------------------------

    include ("clases.inc");
    include ("mysql_conection.inc");

    $plaza;
    $sexo;

    # Tabla del Reporte

    print <<<EOF

    <tr>
        <td>
            Personal Federal:
        </td>
    </tr>

    <table width = 600>
EOF;

    $myEmpleado = new empleado;

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

    #Contadores Totales
    $totalHombre_Uno    = 0;
    $totalMujer_Uno     = 0;
    $totalHombre_Dos    = 0;
    $totalMujer_Dos     = 0;
    $totalHombre_Tres   = 0;
    $totalMujer_Tres    = 0;
    $totalHombreGral    = 0;
    $totalMujerGral     = 0;
    $totalGral          = 0;

    $swPrintHeadings    = 0;

    # Consulta Empleados Federales no Docentes con Primaria
    $rubro = "Primaria";
    
    $contadorHombre_Uno  = 0;
    $contadorMujer_Uno   = 0;
    $contadorHombre_Dos  = 0;
    $contadorMujer_Dos   = 0;
    $contadorHombre_Tres = 0;
    $contadorMujer_Tres  = 0;

    $consulta = "select * from $BDSeleccionada where (plaza not like 'E%') and (preparacion_academica = 'primaria') and tipo='federal'";
    $myEmpleado -> reporte2($consulta, $db, $host, $user, $pwd);
    $myEmpleado -> imprimirReporte2($rubro,$contadorHombre_Uno, $contadorMujer_Uno, $contadorHombre_Dos, $contadorMujer_Dos, $contadorHombre_Tres, $contadorMujer_Tres,$swPrintHeadings);

    $swPrintHeadings = 1;


    # Consulta Empleados Federales no Docentes con Secundaria
    $rubro = "Secundaria";
    
    $contadorHombre_Uno = 0;
    $contadorMujer_Uno  = 0;
    $contadorHombre_Dos = 0;
    $contadorMujer_Dos  = 0;
    $contadorHombre_Tres= 0;
    $contadorMujer_Tres = 0;

    $consulta = "select * from $BDSeleccionada where (plaza not like 'E%') and (preparacion_academica = 'secundaria' or preparacion_academica = '') and tipo='federal'";
    $myEmpleado -> reporte2($consulta, $db, $host, $user, $pwd);

    $myEmpleado -> imprimirReporte2($rubro,$contadorHombre_Uno, $contadorMujer_Uno, $contadorHombre_Dos, $contadorMujer_Dos, $contadorHombre_Tres, $contadorMujer_Tres,$swPrintHeadings);


    # Consulta Empleados Federales no Docentes con Preparatoria
    $rubro = "Preparatoria";
    
    $contadorHombre_Uno = 0;
    $contadorMujer_Uno  = 0;
    $contadorHombre_Dos = 0;
    $contadorMujer_Dos  = 0;
    $contadorHombre_Tres= 0;
    $contadorMujer_Tres = 0;

    $consulta = "select * from $BDSeleccionada where (plaza not like 'E%') and (preparacion_academica like 'preparatoria' or preparacion_academica like 'bachillerato' or preparacion_academica = 'CARRERA TRUNCA') and tipo='federal'";
    $myEmpleado -> reporte2($consulta, $db, $host, $user, $pwd);

    $myEmpleado -> imprimirReporte2($rubro,$contadorHombre_Uno, $contadorMujer_Uno, $contadorHombre_Dos, $contadorMujer_Dos, $contadorHombre_Tres, $contadorMujer_Tres, $swPrintHeadings);

    # Consulta Empleados Federales no Docentes con Carrera Tecnica
    $rubro = "Tecnico";
    
    $contadorHombre_Uno = 0;
    $contadorMujer_Uno  = 0;
    $contadorHombre_Dos = 0;
    $contadorMujer_Dos  = 0;
    $contadorHombre_Tres= 0;
    $contadorMujer_Tres = 0;

    $consulta= "select * from $BDSeleccionada where (plaza not like 'E%') and (
    preparacion_academica like 'BACHILLERATO TECNICO%' or
    preparacion_academica = 'CONTADOR TECNICO EN IMPUESTOS'or
    preparacion_academica like 'DIBUJANTE%' or
    preparacion_academica like 'TECNICO%' or
    preparacion_academica = 'ESTENOGRAFO' or
    preparacion_academica = 'ESTENOGRAFO Y AUXILAR DE CONTADOR' or
    preparacion_academica = 'PROFESIONAL TECNICO BACHILLERATO EN MECATRONICA') and tipo='federal'";
    $myEmpleado -> reporte2($consulta, $db, $host, $user, $pwd);
    $myEmpleado -> imprimirReporte2($rubro,$contadorHombre_Uno, $contadorMujer_Uno, $contadorHombre_Dos, $contadorMujer_Dos, $contadorHombre_Tres, $contadorMujer_Tres,$swPrintHeadings);


    # Consulta Empleados Federales no Docentes con Licenciatura
    $rubro = "Licenciatura";
    
    $contadorHombre_Uno = 0;
    $contadorMujer_Uno  = 0;
    $contadorHombre_Dos = 0;
    $contadorMujer_Dos  = 0;
    $contadorHombre_Tres= 0;
    $contadorMujer_Tres = 0;

    $consulta= "select * from $BDSeleccionada where (plaza not like 'E%') and (
    preparacion_academica = 'CONTADOR PRIVADO ' or
    preparacion_academica = 'CONTADOR PRIVADO' or
    preparacion_academica = 'INGENIERO CIVIL' or
    preparacion_academica like '%LICENC%' or
    preparacion_academica = 'QUIMICO FARMACOBIOOLOGO' or
    preparacion_academica like 'bachillerato ') and tipo='federal'";
    $myEmpleado -> reporte2($consulta, $db, $host, $user, $pwd);
    $myEmpleado -> imprimirReporte2($rubro,$contadorHombre_Uno, $contadorMujer_Uno, $contadorHombre_Dos, $contadorMujer_Dos, $contadorHombre_Tres, $contadorMujer_Tres,$swPrintHeadings);
    
    # Consulta Empleados Federales no Docentes con Maesgria
    $rubro = "Maestria";

    $contadorHombre_Uno = 0;
    $contadorMujer_Uno  = 0;
    $contadorHombre_Dos = 0;
    $contadorMujer_Dos  = 0;
    $contadorHombre_Tres= 0;
    $contadorMujer_Tres = 0;

    $consulta= "select * from $BDSeleccionada where (plaza not like 'E%') and (
    preparacion_academica like 'M.C.%') and tipo='federal'";
    $myEmpleado -> reporte2($consulta, $db, $host, $user, $pwd);
    $myEmpleado -> imprimirReporte2($rubro,$contadorHombre_Uno, $contadorMujer_Uno, $contadorHombre_Dos, $contadorMujer_Dos, $contadorHombre_Tres, $contadorMujer_Tres,$swPrintHeadings);
    
    # Consulta Empleados Federales no Docentes con Doctorado
    $rubro = "Doctorado";

    $contadorHombre_Uno = 0;
    $contadorMujer_Uno  = 0;
    $contadorHombre_Dos = 0;
    $contadorMujer_Dos  = 0;
    $contadorHombre_Tres= 0;
    $contadorMujer_Tres = 0;

    $consulta = "select * from $BDSeleccionada where (plaza not like 'E%') and (
    preparacion_academica like 'Doc%') and tipo='federal'";
    $myEmpleado -> reporte2($consulta, $db, $host, $user, $pwd);
    $myEmpleado -> imprimirReporte2($rubro,$contadorHombre_Uno, $contadorMujer_Uno, $contadorHombre_Dos, $contadorMujer_Dos, $contadorHombre_Tres, $contadorMujer_Tres,$swPrintHeadings);


    # Consulta Empledos no Docentes con Carrera de Comercio
    $rubro = "Comercio";

    $contadorHombre_Uno = 0;
    $contadorMujer_Uno  = 0;
    $contadorHombre_Dos = 0;
    $contadorMujer_Dos  = 0;
    $contadorHombre_Tres= 0;
    $contadorMujer_Tres = 0;

    $consulta = "select * from $BDSeleccionada where (plaza not like 'E%') and (
    preparacion_academica like '%TAQUIGRA5' or
    preparacion_academica like '%ASISTENTE%' or
    preparacion_academica like '%TAQUIGRAF%' or
    preparacion_academica like '%SECRETARI%' or
    preparacion_academica like '%TAQUIMECANOGRAF%'
    ) and tipo='federal'";
    $myEmpleado -> reporte2($consulta, $db, $host, $user, $pwd);
    $myEmpleado -> imprimirReporte2($rubro,$contadorHombre_Uno, $contadorMujer_Uno, $contadorHombre_Dos, $contadorMujer_Dos, $contadorHombre_Tres, $contadorMujer_Tres,$swPrintHeadings);

    # subtotales en los totales
    $subtotal1 = $totalHombre_Uno + $totalMujer_Uno;
    $subtotal2 = $totalHombre_Dos + $totalMujer_Dos;
    $subtotal3 = $totalHombre_Tres + $totalMujer_Tres;


    # imprimir totales y cerrar tabla del reporte
    print <<<EOF

    <tr>
        <th id="TotalesChico">Tot. Federal          </th>
        <th id="TotalesChico">$totalHombre_Uno      </th>
        <th id="TotalesChico">$totalMujer_Uno       </th>
        <th id="TotalesChico">$subtotal1            </th>
        <th id="TotalesChico">$totalHombre_Dos      </th>
        <th id="TotalesChico">$totalMujer_Dos       </th>
        <th id="TotalesChico">$subtotal2            </th>
        <th id="TotalesChico">$totalHombre_Tres     </th>
        <th id="TotalesChico">$totalMujer_Tres      </th>
        <th id="TotalesChico">$subtotal3            </th>
        <th id="TotalesChico">$totalHombreGral      </th>
        <th id="TotalesChico">$totalMujerGral       </th>
        <th id="TotalesChico">$totalGral            </th>
    </tr>
    

EOF;

    # Termina Tabla Plantilla Federal
    print <<<EOF
    </table>

    <!-- Tabla Dummie -->
    <table>
        <tr>
            <td>&nbsp;</td>
        </tr>
    </table>

    <!--
    #-----------------------------------
    # Inicia Tabla Plantilla Estatal
    #-----------------------------------
    -->
    <table>
        <tr>
            <td>
                Personal Estatal:
            </td>
        </tr>
    </table>

    <table  width = 600>
EOF;

    $contadorHombre_Uno = 0;
    $contadorMujer_Uno  = 0;
    $contadorHombre_Dos = 0;
    $contadorMujer_Dos  = 0;
    $contadorHombre_Tres= 0;
    $contadorMujer_Tres = 0;

    # Consulta Empleados  no Docentes con Primaria
    $rubro = "Primaria";
    
    $totalHombre_Uno    = 0;
    $totalMujer_Uno     = 0;
    $totalHombre_Dos    = 0;
    $totalMujer_Dos     = 0;
    $totalHombre_Tres   = 0;
    $totalMujer_Tres    = 0;
    $totalHombreGral    = 0;
    $totalMujerGral     = 0;
    $totalGral          = 0;

    $swPrintHeadings    = 0;

    $consulta = "select * from $BDSeleccionada where (plaza not like 'E%') and (
    preparacion_academica = 'PRIMARIA' or
    preparacion_academica like 'NO TIENE COMPROBANTES%')
    and tipo='estatal' and observaciones not like '%dualidad de plaza%'";
    $myEmpleado -> reporte2($consulta, $db, $host, $user, $pwd);
    $myEmpleado -> imprimirReporte2($rubro,$contadorHombre_Uno, $contadorMujer_Uno, $contadorHombre_Dos, $contadorMujer_Dos, $contadorHombre_Tres, $contadorMujer_Tres,$swPrintHeadings);

    $swPrintHeadings = 1;


    # Consulta Empleados  no Docentes con Secundaria
    $rubro = "Secundaria";

    $contadorHombre_Uno = 0;
    $contadorMujer_Uno  = 0;
    $contadorHombre_Dos = 0;
    $contadorMujer_Dos  = 0;
    $contadorHombre_Tres= 0;
    $contadorMujer_Tres = 0;

    $consulta = "select * from $BDSeleccionada where (plaza not like 'E%') and (
    preparacion_academica = 'SECUNDARIA' or
    preparacion_academica like '%MED. BASICA, ESP%' or
    preparacion_academica like 'SECUNDARIA. DIPLOMADO EN COMP%') and tipo='estatal' and observaciones not like '%dualidad de plaza%'";
    $myEmpleado -> reporte2($consulta, $db, $host, $user, $pwd);
    $myEmpleado -> imprimirReporte2($rubro,$contadorHombre_Uno, $contadorMujer_Uno, $contadorHombre_Dos, $contadorMujer_Dos, $contadorHombre_Tres, $contadorMujer_Tres,$swPrintHeadings);


    # Consulta Empleados  no Docentes con Preparatoria

    $rubro = "Preparatoria";

    $contadorHombre_Uno = 0;
    $contadorMujer_Uno  = 0;
    $contadorHombre_Dos = 0;
    $contadorMujer_Dos  = 0;
    $contadorHombre_Tres= 0;
    $contadorMujer_Tres = 0;

    $consulta = "select * from $BDSeleccionada where (plaza not like 'E%') and (
    preparacion_academica = 'PREPARATORIA' or
    preparacion_academica = 'BACHILLER' or
    preparacion_academica = 'CARRERA TRUNCA' or
    preparacion_academica = 'BACHILLERATO' or
    preparacion_academica = ''
    ) and tipo='estatal' and observaciones not like '%dualidad de plaza%'";
    $myEmpleado -> reporte2($consulta, $db, $host, $user, $pwd);
    $myEmpleado -> imprimirReporte2($rubro,$contadorHombre_Uno, $contadorMujer_Uno, $contadorHombre_Dos, $contadorMujer_Dos, $contadorHombre_Tres, $contadorMujer_Tres, $swPrintHeadings);


    # Consulta Empleados  no Docentes con Carrera Tecnica

    $rubro = "Tecnico";

    $contadorHombre_Uno = 0;
    $contadorMujer_Uno  = 0;
    $contadorHombre_Dos = 0;
    $contadorMujer_Dos  = 0;
    $contadorHombre_Tres= 0;
    $contadorMujer_Tres = 0;

    $consulta = "select * from $BDSeleccionada where (plaza not like 'E%') and (
    preparacion_academica like 'BACHILLERATO EN CIENCIA Y TECN%' or
    preparacion_academica Like 'BACH% TECN%' or
    preparacion_academica Like 'CARRERA TECNICA' or
    preparacion_academica = 'CONTADOR TECNICO EN IMPUESTOS' or
    preparacion_academica = 'ENFERMERA TECNICA' or
    preparacion_academica = 'ENFERMERO TECNICO' or
    preparacion_academica like 'PROFESIONAL TECN%' or
    preparacion_academica like 'PREPARATORIA TECN%' or
    preparacion_academica like 'TECNIC%' or
    preparacion_academica like 'TEC. %' or
    preparacion_academica = 'DIBUJANTE' or
    preparacion_academica = 'ESTENOGRAFO' or
    preparacion_academica = 'ESTENOGRAFO Y AUXILAR DE CONTADOR'
    ) and tipo='estatal' and observaciones not like '%dualidad de plaza%'";
    $myEmpleado -> reporte2($consulta, $db, $host, $user, $pwd);
    $myEmpleado -> imprimirReporte2($rubro,$contadorHombre_Uno, $contadorMujer_Uno, $contadorHombre_Dos, $contadorMujer_Dos, $contadorHombre_Tres, $contadorMujer_Tres,$swPrintHeadings);


    # Consulta Empleados  no Docentes con Licenciatura
    $rubro = "Licenciatura";

    $contadorHombre_Uno = 0;
    $contadorMujer_Uno  = 0;
    $contadorHombre_Dos = 0;
    $contadorMujer_Dos  = 0;
    $contadorHombre_Tres= 0;
    $contadorMujer_Tres = 0;

    $consulta = "select * from $BDSeleccionada where (plaza not like 'E%') and (
    preparacion_academica = 'ARQUITECTO' or
    preparacion_academica = 'CONTADOR PRIVADO ' or
    preparacion_academica = 'CONTADOR PRIVADO' or
    preparacion_academica = 'ENFERMERA GENERAL' or
    preparacion_academica like 'LIC. %' or
    preparacion_academica like 'ING. %' or
    preparacion_academica like 'LICENCIA%' or
    preparacion_academica like 'INGENIER%' or
    preparacion_academica like 'TSU. EN TEC%' or
    preparacion_academica = 'QUIMICO FARMACOBIOOLOGO'
    ) and tipo='estatal' and observaciones not like '%dualidad de plaza%'";
    $myEmpleado -> reporte2($consulta, $db, $host, $user, $pwd);
    $myEmpleado -> imprimirReporte2($rubro,$contadorHombre_Uno, $contadorMujer_Uno, $contadorHombre_Dos, $contadorMujer_Dos, $contadorHombre_Tres, $contadorMujer_Tres,$swPrintHeadings);
    

    # Consulta Empleados  no Docentes con Maestria
    $rubro = "Maestria";

    $contadorHombre_Uno = 0;
    $contadorMujer_Uno  = 0;
    $contadorHombre_Dos = 0;
    $contadorMujer_Dos  = 0;
    $contadorHombre_Tres= 0;
    $contadorMujer_Tres = 0;

    $consulta = "select * from $BDSeleccionada where (plaza not like 'E%') and (
    preparacion_academica like 'M.C.%') and tipo='estatal' and observaciones not like '%dualidad de plaza%'";
    $myEmpleado -> reporte2($consulta, $db, $host, $user, $pwd);
    $myEmpleado -> imprimirReporte2($rubro,$contadorHombre_Uno, $contadorMujer_Uno, $contadorHombre_Dos, $contadorMujer_Dos, $contadorHombre_Tres, $contadorMujer_Tres,$swPrintHeadings);
    

    # Consulta Empleados  no Docentes con Doctorado
    $rubro = "Doctorado";

    $contadorHombre_Uno = 0;
    $contadorMujer_Uno  = 0;
    $contadorHombre_Dos = 0;
    $contadorMujer_Dos  = 0;
    $contadorHombre_Tres= 0;
    $contadorMujer_Tres = 0;

    $consulta = "select * from $BDSeleccionada where (plaza not like 'E%') and (
    preparacion_academica like 'Doc%') and tipo='estatal' and observaciones not like '%dualidad de plaza%'";
    $myEmpleado -> reporte2($consulta, $db, $host, $user, $pwd);
    $myEmpleado -> imprimirReporte2($rubro,$contadorHombre_Uno, $contadorMujer_Uno, $contadorHombre_Dos, $contadorMujer_Dos, $contadorHombre_Tres, $contadorMujer_Tres,$swPrintHeadings);


    # Consulta Empledos no Docentes con Carrera de Comercio
    $rubro = "Comercio";

    $contadorHombre_Uno = 0;
    $contadorMujer_Uno  = 0;
    $contadorHombre_Dos = 0;
    $contadorMujer_Dos  = 0;
    $contadorHombre_Tres= 0;
    $contadorMujer_Tres = 0;

    $consulta = "select * from $BDSeleccionada where (plaza not like 'E%') and (
    preparacion_academica like 'ASISTENTE%' or
    preparacion_academica = 'CARRERA COMERCIAL' or
    preparacion_academica = 'COMERCIO' or
    preparacion_academica like '%SECRETARI%' or
    preparacion_academica like '%TAQUIGRAF%' or
    preparacion_academica = 'TAQUIMECANOGRAFA'
    ) and tipo='estatal' and observaciones not like '%dualidad de plaza%'";
    $myEmpleado -> reporte2($consulta, $db, $host, $user, $pwd);
    $myEmpleado -> imprimirReporte2($rubro,$contadorHombre_Uno, $contadorMujer_Uno, $contadorHombre_Dos, $contadorMujer_Dos, $contadorHombre_Tres, $contadorMujer_Tres,$swPrintHeadings);

    # Subtotales en los totales
    $subtotal1 = $totalHombre_Uno + $totalMujer_Uno;
    $subtotal2 = $totalHombre_Dos + $totalMujer_Dos;
    $subtotal3 = $totalHombre_Tres + $totalMujer_Tres;
    
    # imprimir totales y cerrar tabla del reporte
    print <<<EOF

    <tr>
        <th id="TotalesChico">Tot. Estatal          </th>
        <th id="TotalesChico">$totalHombre_Uno      </th>
        <th id="TotalesChico">$totalMujer_Uno       </th>
        <th id="TotalesChico">$subtotal1            </th>
        <th id="TotalesChico">$totalHombre_Dos      </th>
        <th id="TotalesChico">$totalMujer_Dos       </th>
        <th id="TotalesChico">$subtotal2            </th>
        <th id="TotalesChico">$totalHombre_Tres     </th>
        <th id="TotalesChico">$totalMujer_Tres      </th>
        <th id="TotalesChico">$subtotal3            </th>
        <th id="TotalesChico">$totalHombreGral      </th>
        <th id="TotalesChico">$totalMujerGral       </th>
        <th id="TotalesChico">$totalGral            </th>
    </tr>

EOF;

    # Termina Tabla Plantilla Estatal

    print <<<EOF
    </table>

    <table>
        <tr>
            <td>&nbsp;</td>
        </tr>
    </table>

EOF;

    # cerrar conexion a BD
    $db->close();
?>