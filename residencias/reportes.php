<?php
    
    require_once($_SERVER["DOCUMENT_ROOT"]."/classPage.php");
    $page = new Page();
    print $page->getTop();

    date_default_timezone_set("America/Monterrey");
    $fecha = date("d/M/Y");
    $hora = date("h:i:sa");
        
    $BDSeleccionada = $_POST["nombreBD"];
    $reporteNombre  = $_POST["reporte"];
    $anio_reporte   = substr($_POST["nombreBD"],8,12);
    $swPerEsc       = $_POST["periodo_escolar"];
    $todas          = $_POST["Tipo_Todas"];

    //echo "año: $anio_reporte </br>";
    //echo "BD: $BDSeleccionada </br>";
    //echo "reporte: $reporteNombre </br>";
    //echo "Todas: $todas </br>";
    //echo "Per. Escolar: $swPerEsc  </br>";
    
    print <<<EOF
        <div id="mainContent">
            <div id="menu">
                <ul>
                    <li><a href="../home.php">Principal</a></li>
                    <li><a href="../about.php"><About Me>Acerca de</a></li>
                    <li><a href="../contact.php">Contactar</a></li>
                </ul>               
            </div> <!-- end menu -->
            <table width = 100%>
                <tr>
                <td>
                    </br>
                </td>
                </tr>

           
                <td align = "left">
                    <div id="reportes">

                        <table width = 100%>

                        <td>
                        <form method = "POST" action="reportes.php">
EOF;


                        If (($reporteNombre == "reporte2") and ($todas == "1")) {
                            
                            if ($swPerEsc == "1") {
                                // Encabezado
                                $mes_bd_1  = substr($BDSeleccionada,0,8);
                                $anio_bd_1 = substr($BDSeleccionada,8,4);

                                if ($mes_bd_1 == 'ene_jun_'){
                                    $mes_bd_2  = 'ago_dic_';
                                    $anio_bd_2 = $anio_bd_1 - 1;
                                    $periodo2  = $mes_bd_2 . strval($anio_bd_2);

                                    echo "<tr><td>Residencias en periodo: $periodo2 - $BDSeleccionada</td></td>";  
                                }
                                else {
                                    $mes_bd_2  = 'ene_jun_';
                                    $anio_bd_2 = $anio_bd_1 + 1;
                                    $periodo2  = $mes_bd_2 . strval($anio_bd_2);

                                    echo "<tr><td>Residencias en periodo: $BDSeleccionada - $periodo2</td></td>";
                                }
                            }
                            else 
                                echo "<tr><td> Residencias en $BDSeleccionada </td></tr>";

                            echo "<tr><td id=\"SubEncabezadoChico\"> Fecha: $fecha  &nbsp; Hora: $hora </td></tr>";
                            print <<< EOF

                            <tr>
                                    <td>
EOF;
                                        include ("reporte2.php");
                                        print <<< EOF
                                    </td>
                            </tr>

                            <input type="hidden" name="nombreBD" value="
EOF;
                            echo $_POST["nombreBD"];
                            print <<<EOF
                            ">
                            <input type="hidden" name="reporte" value="reporte2">
                            <input type="hidden" name="Tipo_Todas" value=
EOF;
                            echo $_POST["Tipo_Todas"];
                            print <<<EOF
                            >
                                
                            <tr>
                                <td>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="periodo_escolar" value="1">&nbsp;Reporte por periodo escolar
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input id="submit" type="submit" name="submit" value="Aplicar">
                                </td>
                            </tr>
EOF;
                        }
                                   
                        else {
                                    echo "No hay reporte seleccionado";
                             }
                 
                    print <<< EOF
                    </form>
                    </td>
                    </table>
                    </div> <!-- reportes -->
                </td>
            </table>
        </div> <!-- end main content -->
EOF;

      print $page->getBottom();
?>