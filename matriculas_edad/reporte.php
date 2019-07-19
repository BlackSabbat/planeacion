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
    $semestre = trim($_POST["semestre"]);

    $reingreso = ($_POST["reingreso"]); 
    if ($reingreso == 1){
        $semestre = "reingreso";
    }
    if ($reingreso == 2){
        $semestre = "sem todos";
    }
    
    $tabla1 = $_POST["tabla1"];
    $tabla2 = $_POST["tabla2"];
    $anio_reporte = substr($_POST["nombreBD"],10,12);

    $swPerEsc      = $_POST["periodo_escolar"];    
    
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