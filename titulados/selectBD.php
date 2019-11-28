<?php

    include ("mysql_conection.inc");
    require_once($_SERVER["DOCUMENT_ROOT"]."/classPage.php");
    $seleccion = $_POST["seleccion"];
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
                            <li><a href="../egresados_titulados.php">Egresados y Titulados</a></li>
                            <br>&nbsp 
                        </ul>
                    </div> <!-- end sidebar -->
                </td>
                <td>
                    <div id="content">

EOF;
                        if ($seleccion == 'titulados'){
                        print <<<EOF
                            <p>Titulados.</p>
EOF;
                        }

                        if ($seleccion == 'egresados'){
                        print <<<EOF
                            <p>Egresados.</p>
EOF;
                        }
                        print <<<EOF

                        <form method = "POST" action="bdselected.php" >
EOF;
                                echo"Selección de Semestre</br>";
                                print <<<EOF
                                <div>
                                    <select name = "nombreBD">

EOF;
                                        if ($seleccion == 'titulados')
                                        {
                                            $query = "select distinctrow(periodo) from titulados";
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
                                        }

                                        if ($seleccion == 'egresados')
                                        {
                                            $query = "select distinctrow(periodo) from egresados";
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
                                        }
                                        print <<<EOF
                                    </select>
                                    <input type="hidden" name="seleccion" value=
EOF;
                                    echo $seleccion;
                                    print <<<EOF

                                </div>
                                <div align = "left">
                                    <input id="submit" type="submit" name="submit" value="Aplicar">
                                </div>
                        
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