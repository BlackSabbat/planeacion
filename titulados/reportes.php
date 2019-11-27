<?php
    #-----------------------------------------------------------------------------
    # programador: ing. Jose Ruben de la Peña Fuentes
    # objetivo: crear reporte "Titulados"
    #-----------------------------------------------------------------------------
    
    require_once($_SERVER["DOCUMENT_ROOT"]."/classPage.php");
    $page = new Page();
    print $page->getTop();

    date_default_timezone_set("America/Monterrey");
    $fecha = date("d/M/Y");
    $hora = date("h:i:sa");
        
    $BDSeleccionada = $_POST["nombreBD"];
    $reporteNombre = $_POST["reporte"];
    $swEsconde     = $_POST["esconder"];
    $swPlan        = $_POST["no_plan"];
    $swPerEsc      = $_POST["periodo_escolar"];

    $seleccion = $_POST["seleccion"];
    $anio_reporte = $_POST["nombreBD"];
    
    //echo "swPerEsc: $swPerEsc </br>";

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

                    <div id="reportes">
EOF;
                        print <<< EOF
                        <form method = "POST" action="reportes.php">                
EOF;
                            switch ($reporteNombre)
                            {

                                // REPORTE DE TITULADOS DE LICENCIATURA
                                case "reporte1":

                                    // Encabezado
                                    $mes_bd_1  = substr($BDSeleccionada,0,8);
                                    $anio_bd_1 = substr($BDSeleccionada,8,4);
                                            
                                        if ($swPerEsc == "1") {

                                            if ($mes_bd_1 == 'ene_jun_'){
                                                $mes_bd_2  = 'ago_dic_';
                                                $anio_bd_2 = $anio_bd_1 - 1;
                                                $periodo2  = $mes_bd_2 . strval($anio_bd_2);

                                                 echo "<tr><td>Titulados de Licenciaturas en Periodo: $periodo2 - $anio_reporte</td></td>";  
                                             }
                                            else {
                                                $mes_bd_2  = 'ene_jun_';
                                                $anio_bd_2 = $anio_bd_1 + 1;
                                                $periodo2  = $mes_bd_2 . strval($anio_bd_2);

                                                    echo "<tr><td>Titulados de Licenciaturas en Periodo: $anio_reporte - $periodo2</td></td>";
                                            }
                                        }

                                        else
                                            echo "<tr><td>Titulados de Licenciaturas en Semestre: $anio_reporte </td></td>";

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
                                                <input type="checkbox" name="esconder" value="1">&nbsp; Esconder rango de edades
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <input type="checkbox" name="no_plan" value="1">&nbsp; Incluir reporte de planes (2004, 2010)
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <input type="checkbox" name="periodo_escolar" value="1">&nbsp; Reporte por periodo escolar
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <input id="submit" type="submit" name="submit" value="Refrescar">
                                            </td>
                                        </tr>                                     
EOF;
                                        break;


                                // REPORTE DE TITULADOS DE POSGRADO
                                case "reporte2":

                                        // Encabezado
                                        $mes_bd_1  = substr($BDSeleccionada,0,8);
                                        $anio_bd_1 = substr($BDSeleccionada,8,4);
                                            
                                        if ($swPerEsc == "1") {

                                            if ($mes_bd_1 == 'ene_jun_'){
                                                $mes_bd_2  = 'ago_dic_';
                                                $anio_bd_2 = $anio_bd_1 - 1;
                                                $periodo2  = $mes_bd_2 . strval($anio_bd_2);

                                                echo "<tr><td>Titulados de Posgrado en Periodo: $periodo2 - $anio_reporte</td></td>";  
                                            }
                                            else {
                                                $mes_bd_2  = 'ene_jun_';
                                                $anio_bd_2 = $anio_bd_1 + 1;
                                                $periodo2  = $mes_bd_2 . strval($anio_bd_2);

                                                echo "<tr><td>Titulados de Posgrado en Periodo: $anio_reporte - $periodo2</td></td>";
                                            }
                                        }

                                        else
                                            echo "<tr><td>Titulados de Posgrado en Semestre: $anio_reporte </td></td>"; 

                                        echo "<tr><td id=\"SubEncabezadoChico\"> Fecha: $fecha  &nbsp; Hora: $hora </td></td>";
                                        # ------------------------------------------  

                                        print <<< EOF
                                        <tr>
                                            <td> 
EOF;
                                                    include ("reporte2.php");
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
                                                <input type="checkbox" name="esconder" value="1">&nbsp; Esconder rango de edades
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <input type="checkbox" name="periodo_escolar" value="1">&nbsp; Reporte por periodo escolar
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <input id="submit" type="submit" name="submit" value="Refrescar">
                                            </td>
                                        </tr>                                     
EOF;
                                        break;


                                // REPORTE DE EGRESADOS DE LICENCIATURA
                                case "reporte3":

                                    // Encabezado
                                    $mes_bd_1  = substr($BDSeleccionada,0,8);
                                    $anio_bd_1 = substr($BDSeleccionada,8,4);
                                            
                                    if ($swPerEsc == "1") {

                                        if ($mes_bd_1 == 'ene_jun_'){
                                            $mes_bd_2  = 'ago_dic_';
                                            $anio_bd_2 = $anio_bd_1 - 1;
                                            $periodo2  = $mes_bd_2 . strval($anio_bd_2);

                                            echo "<tr><td>Egresados de Licenciaturas en Periodo: $periodo2 - $anio_reporte</td></td>";  
                                        }
                                        else {
                                            $mes_bd_2  = 'ene_jun_';
                                            $anio_bd_2 = $anio_bd_1 + 1;
                                            $periodo2  = $mes_bd_2 . strval($anio_bd_2);

                                            echo "<tr><td>Egresados de Licenciaturas en Periodo: $anio_reporte - $periodo2</td></td>";
                                        }
                                    }

                                    else
                                        echo "<tr><td>Egresados de Licenciaturas en Semestre: $anio_reporte </td></td>";

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
                                       
                                    <input type="hidden" name="reporte" value="reporte3">
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
                                            <input type="checkbox" name="esconder" value="1">&nbsp; Esconder rango de edades
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input type="checkbox" name="no_plan" value="1">&nbsp; Incluir reporte de planes (2004, 2010)
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input type="checkbox" name="periodo_escolar" value="1">&nbsp; Reporte por periodo escolar
                                        </td>
                                    </tr>
                                            
                                    <tr>
                                        <td>
                                            <input id="submit" type="submit" name="submit" value="Refrescar">
                                        </td>
                                    </tr>                                
EOF;
                                    break;


                                // REPORTE DE EGRESADOS DE POSGRADO
                                case "reporte4":

                                    // Encabezado
                                    $mes_bd_1  = substr($BDSeleccionada,0,8);
                                    $anio_bd_1 = substr($BDSeleccionada,8,4);
                                            
                                    if ($swPerEsc == "1") {

                                        if ($mes_bd_1 == 'ene_jun_'){
                                            $mes_bd_2  = 'ago_dic_';
                                            $anio_bd_2 = $anio_bd_1 - 1;
                                            $periodo2  = $mes_bd_2 . strval($anio_bd_2);

                                            echo "<tr><td>Egresados de Posgrado en Periodo: $periodo2 - $anio_reporte</td></td>";  
                                        }
                                        else {
                                            $mes_bd_2  = 'ene_jun_';
                                            $anio_bd_2 = $anio_bd_1 + 1;
                                            $periodo2  = $mes_bd_2 . strval($anio_bd_2);

                                            echo "<tr><td>Egresados de Posgrado en Periodo: $anio_reporte - $periodo2</td></td>";
                                        }
                                    }

                                    else
                                        echo "<tr><td>Egresados de Posgrado en Semestre: $anio_reporte </td></td>";
                                           
                                    echo "<tr><td id=\"SubEncabezadoChico\"> Fecha: $fecha  &nbsp; Hora: $hora </td></td>";
                                    # ------------------------------------------

                                    print <<< EOF
                                    <tr>
                                        <td> 
EOF;
                                            include ("reporte2.php");
                                            print <<< EOF
                                        </td>
                                    </tr> 
                                       
                                    <input type="hidden" name="reporte" value="reporte4">
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
                                            <input type="checkbox" name="esconder" value="1">&nbsp; Esconder rango de edades
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <input type="checkbox" name="periodo_escolar" value="1">&nbsp; Reporte por periodo escolar
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

                        }  # Switch
                    
                                    
                                    print <<< EOF
                        </form>
                    </div> <!-- reportes -->
                    </table>
                
        </div> <!-- end main content -->
EOF;

      print $page->getBottom();
?>