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
                            <li><a href="../desercion.php">Índice de Deserción</a></li>
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
                        <tr> <td> Selección de Semestre </td></tr>
                        <tr>
                            <td>
                                <form method = "POST" action="bdselected.php" >
                                
                                
EOF;
                                
                                    //echo"Selección de Semestre</br>";
                                    print <<<EOF
                                    <div>
                                        <select name = "nombreBD">

EOF;
                                            $query = "select distinctrow(periodo) from matriculas_semestre";
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
                                        <input type="hidden" name="seleccion" value=
EOF;
                                        echo $seleccion;
                                        print <<<EOF

                                    </div>
                                    </p>
                                    <div align = "left">
                                        <input id="submit" type="submit" name="submit" value="Aplicar">
                                    </div>
                                                  
                                </form>
                            </td>
                        </tr>
                    </div> <!-- end content -->
                    </table>
                </td>
            </table>
        </div> <!-- end main content -->
EOF;
        print $page->getBottom();

        # cerrar conexion a BD
        $db->close();
?>