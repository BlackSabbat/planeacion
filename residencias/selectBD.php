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
                        </ul>
                    </div> <!-- end sidebar -->
                </td>
                <td>    
                    <div id="content">
                        <p>Catálogo de reportes de residencias de acuerdo a un periodo</p>

                            <form method = "POST" action="bdselected.php">
                                <fieldset>
                                    <legend>Selección de Base de Datos</legend>
                                    <div>
                                        <!--nombre: <input type="text" name="nombre"><br> -->
                                        Año:
                                        <select name = "nombreBD">
                                            <option value="estadisticas_AgoDec_2017">2017 Ago-Dic</option>
                                            <option value="estadisticas_EneJun_2018">2018 Ene-Jun</option>
                                            <option value="estadisticas_AgoDec_2018">2019 Ago-Dic</option>
                                        </select>
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