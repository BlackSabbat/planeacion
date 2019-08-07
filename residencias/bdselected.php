<?php
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
                        <p>Base de Datos Seleccionada.</p>
EOF;
                        echo $_POST["nombreBD"];
                        print <<< EOF
                        <br>&nbsp
                        <br>&nbsp

                        <form method = "POST" action="reporte.php">
                            <fieldset>
                                <legend>Selección de Reportes</legend>
                                <div>
                                    <input type="radio" name="reporte" value="reporte2">
                                    <label for="reporte2">Residencias por Carrera y Sector</label></br>

                                    <input type="hidden" name="nombreBD" value=
EOF;
                                    echo $_POST["nombreBD"];
                                    print <<<EOF
                                    >   
                                    &nbsp</br>
                                </div>
                                <div align = "center">
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