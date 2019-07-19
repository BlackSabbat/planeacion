<?php

    include ("mysql_conection.inc");
    require_once($_SERVER["DOCUMENT_ROOT"]."/classPage.php");
    $page = new Page();
    print $page->getTop();

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
                        </ul>
                    </div> <!-- end sidebar -->
                </td>
                <td>
                    <div id="content">
                        <p>Catálogo de reportes de plantilla de personal de acuerdo al año seleccionado.</p>
                        <form method = "POST" action="bdselected.php" >
                            <fieldset>
                                <legend>Selección de Base de Datos</legend>
                                <div>
                                    <select name = "nombreBD">
EOF;
                                        $query = "show tables like 'plantilla%'";
                                        $result = $db->query($query);
                                        
                                        while( $row = $result->fetch_array()) {
                                            //echo "base de datos: $row[0] <br>";
                                            print <<<EOF
                                                <option value="
EOF;
                                                echo ($row[0]);       
                                                print <<<EOF
                                               ">
EOF;
                                                echo ($row[0]);
                                                print <<<EOF
                  
                                                </option>                                   
EOF;
                                        }
                                        print <<<EOF
                                    </select>
                                </div>
                                <!--
                                <div>
                                    &nbsp;Año:
                                    <select name = "nombreBD">
                                        <option value="estadisticas_AgoDec_2017">2017 Ago-Dic</option>
                                        <option value="estadisticas_AgoDec_2018">2018 Ago-Dic</option>
                                        <option value="estadisticas_AgoDec_2019">2019 Ago-Dic</option>
                                    </select>
                                    </p>
                                </div>
                                -->
                                <div align = "left">
                                    <input id="submit" type="submit" name="submit" value="Aplicar">
                                </div>
                            </fieldset>
                        </form>
                    </div> <!-- end content -->
                </td>
            </table>
        </div> <!-- end main content -->
EOF;
        print $page->getBottom();

        # cerrar conexion a BD
        $db->close();
?>