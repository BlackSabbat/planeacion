<?php

    #-----------------------------------------------------------------------------
    # programador: ing. Jose Ruben de la Peña Fuentes
    # objetivo: crear reporte "Matriculas por Edades en cada Semestre"
    #-----------------------------------------------------------------------------

    require_once($_SERVER["DOCUMENT_ROOT"]."/classPage.php");
    $page = new Page();
    print $page->getTop();

    date_default_timezone_set("America/Monterrey");
    $fecha = date("d/M/Y");
    $hora = date("h:i:sa");

    $BDSeleccionada = $_POST["nombreBD"];
    $semestre       = trim($_POST["semestre"]);
    $anio_reporte   = substr($_POST["nombreBD"],10,12);
    $swPerEsc       = $_POST["periodo_escolar"];

    $seleccion      = trim($_POST["seleccion"]);
    $carrera        = trim($_POST["carreras"]);
    $reporte        = trim($_POST["reporte"]);
    $tipo_carrera   = trim($_POST["tipo_carrera"]);
    
    if ($reporte != 'todas_carreras')
    {
        $reporte = $carrera;
        if ($tipo_carrera == '2'){
            $reporte = $reporte . " ABIERTA";
        }
        if ($tipo_carrera == '3'){
            $reporte = $reporte . " DIST.";
        }
        if ($tipo_carrera == '4'){
            $reporte = $reporte . " VESP.";
        }
    }

    $reingreso = ($_POST["reingreso"]);
    if ($reingreso == 1){
        $semestre = "reingreso";
    }
    if ($reingreso == 2){
        $semestre = "sem todos";
    }

    if ($_POST["tabla1"] == '')
    	$tabla1 = '';
    else{
    	$tabla1 = trim($_POST["tabla1"]);
    }

    if ($_POST["tabla2"] == ''){
	    $tabla2 = '';
	}
    else{
    	$tabla2 = trim($_POST["tabla2"]);
    }

    print <<<EOF
        <div id="mainContent">
            <div id="menu">
                <ul>
                    <li><a href="../home.php">Principal</a></li>
                    <li><a href="../about.php"><About Me>Acerca de</a></li>
                    <li><a href="../contact.php">Contactar</a></li>
                </ul>
            </div> <!-- end menu -->
            <table>
                <td>
                    <div id="sidebar">
                        <h3>&nbsp;&nbsp;Menu de Reportes</h3>
                        <ul>
                        <table>
                            <tr>

                                <a href="selectBD.php");>Seleccionar Base de Datos </a></br>

                            </tr>

                            </br>&nbsp
                            </br>&nbsp

                            <tr>
                                <td>
                                    <a href="javascript:window.print()" style='text-decoration:none;'>
                                        <img src="/images/printer-xxl.jpg" border="0" alt="Este es el ejemplo de un texto alternativo">
                                    </a>
                                </td>
                            </tr>

                        </table>
                        </ul>
                    </div> <!-- end sidebar -->
                </td>
                <td>
                    <table>
                    <div id="content">
                    <form method = "POST" action="reporte.php">
EOF;
                        // Reporte es por Semestre
                        if ($seleccion  == 'semestre')
                        {

                            if (($tabla1 =='licenciatura') && ($tabla2 == 'posgrado')) {

                                if ($swPerEsc == "1") {
                                    // Encabezado
                                    $mes_bd_1  = substr($BDSeleccionada,0,8);
                                    $anio_bd_1 = substr($BDSeleccionada,8,4);

                                    if ($mes_bd_1 == 'ene_jun_'){
                                        $mes_bd_2  = 'ago_dic_';
                                        $anio_bd_2 = $anio_bd_1 - 1;
                                        $periodo2  = $mes_bd_2 . strval($anio_bd_2);

                                        echo "<tr><td>Matrícula por edades de $semestre, en periodo: $periodo2 - $BDSeleccionada</td></td>";
                                    }
                                    else {
                                        $mes_bd_2  = 'ene_jun_';
                                        $anio_bd_2 = $anio_bd_1 + 1;
                                        $periodo2  = $mes_bd_2 . strval($anio_bd_2);

                                        echo "<tr><td>Matrícula por edades de $semestre, en periodo: $BDSeleccionada - $periodo2</td></td>";
                                    }
                                }
                                else
                                    echo "<tr><td>Matrícula por edades de $semestre, en Semestre: $BDSeleccionada</td></tr>";

                                echo "<tr><td id=\"SubEncabezadoChico\"> Fecha: $fecha  &nbsp; Hora: $hora <tr><td>";
                                print <<< EOF
                                <tr>
                                    <td>
EOF;
                                        include ("reporte1.php");
                                        print <<< EOF
                                    </td>
                                </tr>

                                <input type="hidden" name="tabla1" value="licenciatura">
                                <input type="hidden" name="tabla2" value="posgrado">
                                <input type="hidden" name="nombreBD" value="
EOF;
                                    echo $_POST["nombreBD"];
                                    print <<<EOF
                                ">

                                <input type="hidden" name="semestre" value="
EOF;

                                    echo "$semestre";
                                    print <<<EOF
                                ">

                                <tr>
                                    <td>
                                        &nbsp;
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="checkbox" name="periodo_escolar" value="1">&nbsp; Reporte por periodo escolar
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <input id="submit" type="submit" name="submit" value="Aplicar">
                                    </td>
                                </tr>
EOF;
                            }

                            if (($tabla1=='licenciatura') && ($tabla2 == '')){

                                if ($swPerEsc == "1") {
                                    // Encabezado
                                    $mes_bd_1  = substr($BDSeleccionada,0,8);
                                    $anio_bd_1 = substr($BDSeleccionada,8,4);

                                    if ($mes_bd_1 == 'ene_jun_'){
                                        $mes_bd_2  = 'ago_dic_';
                                        $anio_bd_2 = $anio_bd_1 - 1;
                                        $periodo2  = $mes_bd_2 . strval($anio_bd_2);

                                        echo "<tr><td>Matrícula por Edades de $semestre, en periodo: $periodo2 - $BDSeleccionada</td></td>";
                                    }
                                    else {
                                        $mes_bd_2  = 'ene_jun_';
                                        $anio_bd_2 = $anio_bd_1 + 1;
                                        $periodo2  = $mes_bd_2 . strval($anio_bd_2);

                                     echo "<tr><td>Matrícula por Edades de $semestre, en periodo: $BDSeleccionada - $periodo2</td></td>";
                                    }
                                }
                                else
                                    echo "<tr><td>Matrícula por Edades de $semestre, en Semestre: $BDSeleccionada</td></tr>";

                                echo "<tr><td id=\"SubEncabezadoChico\"> Fecha: $fecha  &nbsp; Hora: $hora </td></tr>";
                                print <<< EOF
                                <tr>
                                    <td>
EOF;
                                        include ("reporte2.php");
                                        print <<< EOF
                                    </td>
                                </tr>

                                <input type="hidden" name="tabla1" value="licenciatura">
                                <input type="hidden" name="tabla2" value="">
                                <input type="hidden" name="nombreBD" value="
EOF;
                                    echo $_POST["nombreBD"];
                                    print <<<EOF
                                ">

                                <input type="hidden" name="semestre" value="
EOF;
                                    echo "$semestre";
                                    print <<<EOF
                                ">

                                <tr>
                                    <td>
                                        &nbsp;
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="checkbox" name="periodo_escolar" value="1">&nbsp; Reporte por periodo escolar
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <input id="submit" type="submit" name="submit" value="Aplicar">
                                    </td>
                                </tr>
EOF;
                            }

                            if (($tabla1=='') && ($tabla2 == 'posgrado')){

                                if ($swPerEsc == "1") {
                                    // Encabezado
                                    $mes_bd_1  = substr($BDSeleccionada,0,8);
                                    $anio_bd_1 = substr($BDSeleccionada,8,4);

                                    if ($mes_bd_1 == 'ene_jun_'){
                                        $mes_bd_2  = 'ago_dic_';
                                        $anio_bd_2 = $anio_bd_1 - 1;
                                        $periodo2  = $mes_bd_2 . strval($anio_bd_2);

                                        echo "<tr><td>Matrícula por Edades de $semestre, en periodo: $periodo2 - $BDSeleccionada</td></td>";
                                    }
                                    else {
                                        $mes_bd_2  = 'ene_jun_';
                                        $anio_bd_2 = $anio_bd_1 + 1;
                                        $periodo2  = $mes_bd_2 . strval($anio_bd_2);

                                        echo "<tr><td>Matrícula por Edades de $semestre, en periodo: $BDSeleccionada - $periodo2</td></td>";
                                    }
                                }
                                else
                                    echo "<tr><td>Matrícula por Edades de $semestre, en Semestre: $BDSeleccionada</td></tr>";

                                echo "<tr><td id=\"SubEncabezadoChico\"> Fecha: $fecha  &nbsp; Hora: $hora </td></tr>";
                                print <<< EOF
                                <tr>
                                    <td>
EOF;
                                        include ("reporte3.php");
                                        print <<< EOF
                                    </td>
                                </tr>

                                <input type="hidden" name="tabla1" value="">
                                <input type="hidden" name="tabla2" value="posgrado">
                                <input type="hidden" name="nombreBD" value="
EOF;
                                    echo $_POST["nombreBD"];
                                    print <<<EOF
                                ">

                                <input type="hidden" name="semestre" value="
EOF;

                                    echo "$semestre";
                                    print <<<EOF
                                ">

                                <tr>
                                    <td>
                                        &nbsp;
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="checkbox" name="periodo_escolar" value="1">&nbsp; Reporte por periodo escolar
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <input id="submit" type="submit" name="submit" value="Aplicar">
                                    </td>
                                </tr>
EOF;

                            }

                            if (($tabla1=='') && ($tabla2 == '')) {
                                echo "<tr><td>No hay reporte seleccionado en $BDSeleccionada </td></tr>";
                            }

                        }  // FIN If reporte por semestre


                        // REPORTE POR AÑO
                        if ($seleccion  == 'anio')
                        {
                            // validar que la carrera exista
                            if (($carrera != 'ING INDUSTRIAL' and $carrera != 'ING GESTION EMPR.' and $reporte != 'todas_carreras') and ($tipo_carrera == "2" or $tipo_carrera == "3" or $tipo_carrera == "4")) {
                                    echo "<tr><td>No existe carrera $reporte en $BDSeleccionada</td></td>";
                            }
                            else if ($carrera == 'ING GESTION EMPR.' and ($tipo_carrera == "2" or $tipo_carrera == "4")) {
                                    echo "<tr><td>No existe carrera $reporte en $BDSeleccionada</td></td>";
                            }
                            else {
                                
                                //if (($tabla1 == 'licenciatura') && ($tabla2 == 'posgrado')) {

                                    $mes_bd_1  = substr($BDSeleccionada,0,8);
                                    $anio_bd_1 = substr($BDSeleccionada,8,4);
    
                                    if ($mes_bd_1 == 'ene_jun_'){
                                        $mes_bd_2  = 'ago_dic_';
                                        $anio_bd_2 = $anio_bd_1 - 1;
                                        $periodo2  = $mes_bd_2 . strval($anio_bd_2);
    
                                        echo "<tr><td>Matrícula por edades de $reporte en $periodo2 - $BDSeleccionada</td></td>";
                                    }
                                    else {
                                        $mes_bd_2  = 'ene_jun_';
                                        $anio_bd_2 = $anio_bd_1 + 1;
                                        $periodo2  = $mes_bd_2 . strval($anio_bd_2);
    
                                        echo "<tr><td>Matrícula por edades de $reporte en $BDSeleccionada - $periodo2</td></td>";
                                    }
    
                                    echo "<tr><td id=\"SubEncabezadoChico\"> Fecha: $fecha  &nbsp; Hora: $hora <tr><td>";
                                    print <<< EOF
                                    <tr>
                                        <td>
EOF;
                                            include ("reporte4.php");
                                            print <<< EOF
                                        </td>
                                    </tr>
    
                                    <input type="hidden" name="tabla1" value="licenciatura">
                                    <input type="hidden" name="tabla2" value="posgrado">
                                    <input type="hidden" name="nombreBD" value="
EOF;
                                        echo $_POST["nombreBD"];
                                        print <<<EOF
                                    ">
    
                                    
EOF;
                                //}

                            } //Else validacion si la carrera existe
                            
                        }  // FIN If reporte por Año
                        print <<< EOF
                    </form>
                    </div> <!-- end content -->
                    </table>
                </td>
            </table>
        </div> <!-- end main content -->

EOF;

      print $page->getBottom();
?>