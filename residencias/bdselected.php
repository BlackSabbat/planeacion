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
                <td valign = "top">
                    <div id="sidebar">
                        <h3>&nbsp;&nbsp;Menu</h3>
                        <ul>
                            <li><a href="selectBD.php">Base de Datos</a></li>                           
                        </ul>
                    </div> <!-- end sidebar -->
                </td>
                <td>
                    <div id="content">
                        </br>
                        <p>Base de Datos Seleccionada: &nbsp
EOF;
                        echo $_POST["nombreBD"];
                        print <<< EOF
                     
                        <table>  
                        <form method = "POST" action="reportes.php">
                            <fieldset>
                                <tr> <legend>Selección de Reportes</legend> </tr> 
                                    
                                    </br>
                                    <tr> <input type="radio" name="reporte" value="reporte2"> </tr>
                                    <label for="reporte2">Residencias por Carrera y Sector</label></br>

                                    <input type="hidden" name="nombreBD" value=
EOF;
                                    echo $_POST["nombreBD"];
                                    print <<<EOF
                                    >
                                    </br>
                                <tr>
                                    <td>
                                    <table>
                                        
                                            <tr>
                                                Sector:
                                            <tr>
                                            </br>
                                            <tr>
                                                <input type="checkbox" name="Sector_Privado" value="1">&nbsp; Privado
                                            <tr>
                                            </br>
                                            <tr>
                                                <input type="checkbox" name="Sector_Publico" value="1">&nbsp; Público
                                            </tr>
                                            </br>
                                            <tr>
                                                <input type="checkbox" name="Sector_EdPublico" value="1">&nbsp; Educ. Público
                                            </tr>
                                            </br>
                                            <tr>
                                                <input type="checkbox" name="Sector_EdPrivado" value="1">&nbsp; Educ. Privado
                                            </tr>
                                            </br>
                                            <tr>
                                                <input type="checkbox" name="Tipo_Todas" value="1">&nbsp; Todos
                                            </tr>
                                            </br>
                                       
                                    </table>
                                    </td>  
                                </tr>


                                <tr>
                                    <td> 
                                        </br>
                                        <input id="submit" type="submit" name="submit" value="Aplicar"> 
                                    </td>
                                </tr>

                            </fieldset>
                        </form>
                        </table>
                     </div> <!-- end content -->
                </td>
            </table>
        </div> <!-- end main content -->
EOF;
      print $page->getBottom();
?>