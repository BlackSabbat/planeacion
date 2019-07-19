<?php

    #-----------------------------------------------------------------------------
    # programador: ing. Jose Ruben de la Peña Fuentes
    # objetivo: crear reporte "Matriculas por Edades en cada Semestre"
    #-----------------------------------------------------------------------------

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
                        <p>Matricula por Edades.</p>
                        <form method = "POST" action="bdselected.php" >
                            <fieldset>
                                <legend>Selección de Periodo</legend>
                                <div>
                                    <select name = "nombreBD">

EOF;
            
                                        $query = "select distinctrow(periodo) from matriculas_edad_sem";
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
                                </br>
                                <legend>Semestre</legend>
                                <div>
                                    <select name = "semestre">

EOF;
                                        for ($i=1; $i<=15; $i++){
                                            print <<<EOF
                                            <option value="

EOF;
                                                if (($i >= 1) and ($i <= 9))
                                                    echo "sem0$i";
                                                else
                                                    echo "sem$i";   
                                                print <<<EOF
                                                
                                               ">
EOF;
                                                if (($i >= 1) and ($i <= 9))
                                                    echo "sem0$i";
                                                else
                                                    echo "sem$i";
                                                print <<<EOF

                                            </option>                                 
EOF;
                                        }

                                        print <<<EOF
                                    </select>
                                    
                                </div>
                                </br>
                                
                                <input type="radio" name="reingreso" value="3" checked>
                                <label for="reingreso">Registros por Semestre</label></br>
                                <input type="radio" name="reingreso" value="1">
                                <label for="reingreso">Registros de Reingreso</label></br>
                                <input type="radio" name="reingreso" value="2">
                                <label for="reingreso">Matrícula Completa</label></br></br>

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