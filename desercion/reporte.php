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
            <table>
                <td>
                    <div id="sidebar">
                        <h3>&nbsp;&nbsp;Menu de Reportes</h3>
                        <ul>
                        <table>
                            <tr>
                                <a href="../desercion.php");>Seleccionar Reporte </a></br>
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
EOF;
                        print <<< EOF
                        <form method = "POST" action="reporte.php">                
EOF;
                                    switch ($reporteNombre)
                                    {

                                        // Reprobados por Semestre
                                        case "reporte1":

                                            // Encabezado
                                            echo "<tr><td>Reprobados en Semestre: $anio_reporte </td></td>";

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
                                            

                                        // Reprobados por Ciclo Escolar
                                        case "reporte2":

                                            // Encabezado
                                            $mes_bd_1  = substr($BDSeleccionada,0,8);
                                            $anio_bd_1 = substr($BDSeleccionada,8,4);

                                            if ($mes_bd_1 == 'ene_jun_'){
                                                $mes_bd_2  = 'ago_dic_';
                                                $anio_bd_2 = $anio_bd_1 - 1;
                                                $periodo2  = $mes_bd_2 . strval($anio_bd_2);

                                                echo "<tr><td>Reprobados en Periodo: $periodo2 - $anio_reporte</td></td>";  
                                            }
                                            else {
                                                $mes_bd_2  = 'ene_jun_';
                                                $anio_bd_2 = $anio_bd_1 + 1;
                                                $periodo2  = $mes_bd_2 . strval($anio_bd_2);

                                                echo "<tr><td>Reprobados en Periodo: $anio_reporte - $periodo2</td></td>";
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
                                                    <input type="checkbox" name="esconder" value="1">&nbsp; esconder campos adicionales
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
                    </div> <!-- end content -->
                    </table>
                </td>
            </table>
        </div> <!-- end main content -->
EOF;

      print $page->getBottom();
?>