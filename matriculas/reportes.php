<?php
    
    require_once($_SERVER["DOCUMENT_ROOT"]."/classPage.php");
    $page = new Page();
    print $page->getTop();

    date_default_timezone_set("America/Monterrey");
    $fecha = date("d/M/Y");
    $hora = date("h:i:sa");
        
    $BDSeleccionada = $_POST["nombreBD"];
    //$reporteNombre = $_POST["reporte"];
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
           
            <div id="reportes">

                    <table width = 100%>
                    
                    <td>
                        </br>
                    </td>
                
                    <td>
                    
                    <form method = "POST" action="reportes.php">
EOF;
                        if (($tabla1 =='licenciatura') && ($tabla2 == 'posgrado')){

                            if ($swPerEsc == "1") {
                                // Encabezado
                                $mes_bd_1  = substr($BDSeleccionada,0,8);
                                $anio_bd_1 = substr($BDSeleccionada,8,4);

                                if ($mes_bd_1 == 'ene_jun_'){
                                    $mes_bd_2  = 'ago_dic_';
                                    $anio_bd_2 = $anio_bd_1 - 1;
                                    $periodo2  = $mes_bd_2 . strval($anio_bd_2);

                                    echo "<tr><td>Matrícula de Licenciatura y Posgrado en periodo: $periodo2 - $BDSeleccionada</td></tr>";  
                                }
                                else {
                                    $mes_bd_2  = 'ene_jun_';
                                    $anio_bd_2 = $anio_bd_1 + 1;
                                    $periodo2  = $mes_bd_2 . strval($anio_bd_2);

                                    echo "<tr><td>Matrícula de Licenciatura y Posgrado en periodo: $BDSeleccionada - $periodo2</td></tr>";
                                }
                            }
                            else 
                                echo "<tr><td>Matrícula de Licenciatura y Posgrado en Semestre: $BDSeleccionada</td></tr>";
                            
                            echo "<tr><td id=\"SubEncabezadoChico\"> Fecha: $fecha  &nbsp; Hora: $hora </td></tr>";
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

                                    echo "<tr><td>Matrícula de Licenciatura en periodo: $periodo2 - $BDSeleccionada</td></tr>";  
                                }
                                else {
                                    $mes_bd_2  = 'ene_jun_';
                                    $anio_bd_2 = $anio_bd_1 + 1;
                                    $periodo2  = $mes_bd_2 . strval($anio_bd_2);

                                    echo "<tr><td>Matrícula de Licenciatura en periodo: $BDSeleccionada - $periodo2</td></tr>";
                                }
                            }
                            else 
                                echo "<tr><td>Matrícula de Licenciatura en Semestre: $BDSeleccionada</td></tr>";

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

                                    echo "<tr><td>Matrícula de Posgrado en periodo: $periodo2 - $BDSeleccionada</td></tr>";  
                                }
                                else {
                                    $mes_bd_2  = 'ene_jun_';
                                    $anio_bd_2 = $anio_bd_1 + 1;
                                    $periodo2  = $mes_bd_2 . strval($anio_bd_2);

                                    echo "<tr><td>Matrícula de Posgrado en periodo: $BDSeleccionada - $periodo2</td></tr>";
                                }
                            }
                            else 
                                echo "<tr><td>Matrícula de Posgrado en Semestre: $BDSeleccionada</td></tr>";

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
                            echo "No hay reporte seleccionado en $BDSeleccionada";
                        }
                    
                    print <<< EOF
                    </form>
                    </td>
                   
                    </table>
                </div> <!-- reportes -->
            
       
EOF;

      print $page->getBottom();
?>