<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/classPage.php");
    $page = new Page();
    print $page->getTop();

    $seleccion = $_POST["seleccion"];
    
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
                                    <legend>Reportes Generales</legend>
                                    <div>
EOF;
                                        if ($seleccion == 'titulados'){
                                            print <<<EOF
                                            <input type="radio" name="reporte" value="reporte1">
                                            <label for="reporte1">Titulados en Lic.</label></br>
                                            <input type="radio" name="reporte" value="reporte2">
                                            <label for="reporte2">Titulados de Posgrado</label></br>
EOF;
                                        }

                                        if ($seleccion == 'egresados'){
                                            print <<<EOF
                                            <input type="radio" name="reporte" value="reporte3">
                                            <label for="reporte3">Egresados en Lic.</label></br>
                                            <input type="radio" name="reporte" value="reporte4">
                                            <label for="reporte4">Egresados de Posgrado</label></br>
EOF;
                                        }
                                        print <<<EOF
                                        
                                            
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
                    </div> <!-- end content -->
                </td>
            </table>
        </div> <!-- end main content -->
EOF;
      print $page->getBottom();
?>