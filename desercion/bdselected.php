<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/classPage.php");
    $page = new Page();
    print $page->getTop();

    $periodo = $_POST["nombreBD"];

    include ("mysql_conection.inc");

    # Establacer conexion
    $db = new mysqli($host, $user, $pwd, $base_datos);
    
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
                        <h3>&nbsp;&nbsp;Menu</h3>
                        <ul>
                            <li><a href="selectBD.php">Base de Datos</a></li>
                            <br>&nbsp
                            <br>&nbsp
                            <br>&nbsp
                            <br>&nbsp
                            <br>&nbsp
                            <br>&nbsp
                            <br>&nbsp
                            <br>&nbsp
                            <br>&nbsp
                            <br>&nbsp

                        </ul>
                    </div> <!-- end sidebar -->
                </td>
                <td>
                    <div id="content">
                    <table>
                    
                        <tr> <td> &nbsp; </td></tr>
                        <tr> <td> Base de Datos Seleccionada:     
EOF;

                        echo $_POST["nombreBD"];
                        print <<< EOF
                        </td></tr>
                        <tr> <td>
                            
EOF;

                            //Analizar si existen egresados en base al periodo seleccionado
                            /*

                            $mes_bd_1  = substr($periodo,0,8);
                            $anio_bd_1 = substr($periodo,8,4);
                            if ($mes_bd_1 == 'ene_jun_'){
                                $mes_bd_2  = 'ago_dic_';
                                $anio_bd_2 = $anio_bd_1;
                            }
                            else {
                                $mes_bd_2  = 'ene_jun_';
                                $anio_bd_2 = $anio_bd_1 + 1;
                            }
                            $periodo2  = $mes_bd_2 . strval($anio_bd_2);
                            
                            $query = "select distinctrow(periodo) from egresados where periodo = '$periodo2'";
                            $result1 = $db->query($query);
                            //echo "$result1->num_rows";

                            if ($result1->num_rows == 0){
                                    echo "No hay egresados! seleccionar un periodo menor. </br>";
                            }
             
                            else {
                            
                            */
                                print <<<EOF
                            
                                <form method = "POST" action="reporte.php">
                                    <fieldset>
                                        <legend>Reportes Generales</legend>
                                        <div>
                                            <input type="radio" name="reporte" value="reporte1">
                                            <label for="reporte1">Deserciones en el Semestre</label></br>
                                            <input type="radio" name="reporte" value="reporte2">
                                            <label for="reporte2">Deserciones por Ciclo Escolar</label></br>

                                            <input type="hidden" name="nombreBD" value="
EOF;
                                            echo $_POST["nombreBD"];
                                            print <<<EOF
                                            ">
                                            </br>
                                        </div>
                                        <div align = "left">
                                            <input id="submit" type="submit" name="submit" value="Aplicar">
                                        </div>
                                    </fieldset>                           
                                </form>
EOF;
                            /*
                            }  // FIN Else
                            */
                            print <<<EOF

                        </tr> </td>
                    </table>
                    </div> <!-- end content -->
                </td>
            </table>
        </div> <!-- end main content -->
EOF;

    # cerrar conexion a BD
    $db->close();

    print $page->getBottom();
?>