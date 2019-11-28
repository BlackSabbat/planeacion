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
                            <form method = "POST" action="reportes.php">
                                <fieldset>
                                    <legend>Reportes Generales</legend>
                                    <div>
                                        <input type="radio" name="reporte" value="reporte1">
                                        <label for="reporte1">Reprobados en el Semestre</label></br>
                                        <input type="radio" name="reporte" value="reporte2">
                                        <label for="reporte2">Reprobados por Ciclo Escolar</label></br>

                                            
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
                        </tr> </td>
                    </table>
                    </div> <!-- end content -->
                </td>
            </table>
        </div> <!-- end main content -->
EOF;
      print $page->getBottom();
?>