<?php

    #-----------------------------------------------------------------------------
    # programador: ing. Jose Ruben de la Peña Fuentes
    # objetivo: crear reporte "Matriculas por Edades en cada Semestre"
    #-----------------------------------------------------------------------------

    require_once($_SERVER["DOCUMENT_ROOT"]."/classPage.php");
    $page = new Page();
    print $page->getTop();
    
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
                        <p>Base de Datos Seleccionada: &nbsp;
                
EOF;
                        echo $_POST["nombreBD"];
                        
                        
                            print <<< EOF
                            </p>
                            <form method = "POST" action="reporte.php">
                                <fieldset>
                                    <legend>Selección de Reportes</legend>
                                    <div>
                                        <input type="checkbox" name="tabla1" value="licenciatura">
                                        <label for="tabla1">Tabla Licenciatura</label></br>
                                        <input type="checkbox" name="tabla2" value="posgrado">
                                        <label for="tabla2">Tabla Posgrado</label></br>
                                        <input type="hidden" name="nombreBD" value="
EOF;
                                        echo $_POST["nombreBD"];
                                        print <<<EOF
                                        ">
                                        <input type="hidden" name="semestre" value="
EOF;
                                        echo $_POST["semestre"];
                                        print <<<EOF
                                        ">
                                        <input type="hidden" name="reingreso" value="
EOF;
                                        echo $_POST["reingreso"];
                                        print <<<EOF
                                        ">

                                        </br>
                                    </div>
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
?>