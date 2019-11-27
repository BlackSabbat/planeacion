<?php
    #-----------------------------------------------------------------------------
    # programador: ing. Jose Ruben de la Peña Fuentes
    # objetivo: crear reporte "Índice de Descerción"
    #-----------------------------------------------------------------------------
    
    require_once($_SERVER["DOCUMENT_ROOT"]."/classPage.php");
    $page = new Page();
    print $page->getTop();

    date_default_timezone_set("America/Monterrey");
    $fecha = date("d/M/Y");
    $hora = date("h:i:sa");
        
    $BDSeleccionada = $_POST["nombreBD"];
    $reporteNombre  = $_POST["reporte"];
    $anio_reporte   = $_POST["nombreBD"];
    $swEsconde      = $_POST["esconder"];
    
    if ($reporteNombre == 'reporte1')
        $swPerEsc = '0';
    else 
        $swPerEsc = '1';

    print <<<EOF

    </script>

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

                <td>
                    
                    <div id="reportes">
EOF;
                        print <<< EOF
                        <form method = "POST" action="reportes.php">                
EOF;
                                    switch ($reporteNombre)
                                    {

                                        // Desertados por Semestre
                                        case "reporte1":

                                            // Encabezado
                                            echo "<tr><td>Desertados en Semestre: $anio_reporte </td></td>";

                                            echo "<tr><td id=\"SubEncabezadoChico\"> Fecha: $fecha  &nbsp; Hora: $hora </td></td>";
                                            # ------------------------------------------


                                            print <<< EOF
                                            <tr>
                                                <td> 
EOF;
                                                    include ("reporte1.php");
                                                    print <<< EOF
                                                </td>
                                            </tr> 
                                       
                                            <input type="hidden" name="reporte" value="reporte1">
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
                                                    <input type="checkbox" name="esconder" value="1">&nbsp; mostrar solamente índice de deserción
                                                </td>
                                            </tr>


                                            <tr>
                                                <td>
                                                    <input id="submit" type="submit" name="submit" value="Refrescar">
                                                </td>
                                            </tr>                                     
EOF;
                                            break;
                                            

                                        // Desertados por Ciclo Escolar
                                        case "reporte2":

                                            // Encabezado
                                            $mes_bd_1  = substr($BDSeleccionada,0,8);
                                            $anio_bd_1 = substr($BDSeleccionada,8,4);

                                            if ($mes_bd_1 == 'ene_jun_'){
                                                $mes_bd_2  = 'ago_dic_';
                                                $anio_bd_2 = $anio_bd_1 - 1;
                                                $periodo2  = $mes_bd_2 . strval($anio_bd_2);

                                                echo "<tr><td>Desertados en Periodo: $periodo2 - $anio_reporte</td></td>";  
                                            }
                                            else {
                                                $mes_bd_2  = 'ene_jun_';
                                                $anio_bd_2 = $anio_bd_1 + 1;
                                                $periodo2  = $mes_bd_2 . strval($anio_bd_2);

                                                echo "<tr><td>Desertados en Periodo: $anio_reporte - $periodo2</td></td>";
                                            }
                                            

                                            echo "<tr><td id=\"SubEncabezadoChico\"> Fecha: $fecha  &nbsp; Hora: $hora </td></td>";
                                            # ------------------------------------------

                                            print <<< EOF
                                            <tr>
                                                <td> 
EOF;
                                                    include ("reporte1.php");
                                                    print <<< EOF
                                                </td>
                                            </tr> 
                                       
                                            <input type="hidden" name="reporte" value="reporte2">
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
                                                    <input type="checkbox" name="esconder" value="1">&nbsp; mostrar solamente índice de deserción
                                                </td>
                                            </tr>


                                            <tr>
                                                <td>
                                                    <input id="submit" type="submit" name="submit" value="Refrescar">
                                                </td>
                                            </tr>                                     
EOF;
                                            break;

                                        default:
                                            echo "No hay reporte seleccionado";

                                    }
                    
                                    
                                    print <<< EOF
                        </form>
                    </div> <!-- end reportes -->
                   
                </td>
            </table>
        </div> <!-- end main content -->
EOF;

      print $page->getBottom();
?>