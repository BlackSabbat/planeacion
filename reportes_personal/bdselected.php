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
                        </ul>
                    </div> <!-- end sidebar -->
                </td>
                
                

                    <div id="content">
                        </br>
                        <p>Base de Datos Seleccionada: 
                
EOF;
                        echo $_POST["nombreBD"];
                        
                        if (strpos($_POST["nombreBD"], 'plantilla') === FALSE)
                        {
                            echo "</br>";
                            echo "ERROR: Base de Datos Inconrrecta </br>";
                            echo "seleccionar una con prefijo 'plantilla' </br>";
                        }
                        else
                        {
                            print <<< EOF
                            </p>
                            <!-- <form method = "GET" action="reporte.php?reporte&nombreBD"> -->
                            <form method = "POST" action="reportes.php">
                                <fieldset>
                                    <legend>Selección de Reportes</legend>
                                    <div>
                                        <input type="radio" name="reporte" value="reporte1">
                                        <label for="reporte1">Personal Plaza Docente por Grado</label></br>

                                        <input type="radio" name="reporte" value="reporte2">
                                        <label for="reporte2">Personal Plaza de Apoyo por Grado</label></br>

                                        <input type="radio" name="reporte" value="reporte3">
                                        <label for="reporte3">Personal Plaza Docente por Edad</label></br>

                                        <input type="radio" name="reporte" value="reporte4">
                                        <label for="reporte4">Personal Plaza Apoyo por Edad</label></br>

                                        <input type="radio" name="reporte" value="reporte5">
                                        <label for="reporte5">Personal Docente Frente a Grupo por Grado</label></br>

                                        <input type="radio" name="reporte" value="reporte6">
                                        <label for="reporte6">Personal Docente Frente a Grupo por Edad</label></br>

                                        <input type="hidden" name="nombreBD" value="
EOF;
                                        echo $_POST["nombreBD"];
                                        print <<<EOF
                                        ">
                                        <input type="hidden" name="swGetPost" value=0>
                                        </br>
                                    </div>

                                    <legend>Reportes de Posgrado</legend>
                                    <div>

                                        <input type="radio" name="reporte" value="reporte8">
                                        <label for="reporte8">Investigadores por Grado</label></br>

                                        <input type="radio" name="reporte" value="reporte9">
                                        <label for="reporte9">Investigadores por Edad</label></br>

                                        <input type="radio" name="reporte" value="reporte10">
                                        <label for="reporte10">Investigador Frente a Grupo por Grado</label></br>

                                        <input type="radio" name="reporte" value="reporte11">
                                        <label for="reporte11">Investigador Frente a Grupo por Edad</label></br>

                                        <input type="radio" name="reporte" value="reporte7">
                                        <label for="reporte7">Reportes Adicionales</label></br>

                                        <input type="hidden" name="nombreBD" value="
EOF;
                                        echo $_POST["nombreBD"];
                                        print <<<EOF
                                        ">
                                        <input type="hidden" name="swGetPost" value=0>
                                        </br>
                                    </div>

                                    <legend>Reportes de Ed. a Distancia</legend>
                                    <div>

                                        <input type="radio" name="reporte" value="reporte12">
                                        <label for="reporte12">Docente Frente a Grupo por Grado</label></br>

                                        <input type="radio" name="reporte" value="reporte13">
                                        <label for="reporte13">Docente Frente a Grupo por Edad</label></br>

                                        <input type="hidden" name="nombreBD" value="
EOF;
                                        echo $_POST["nombreBD"];
                                        print <<<EOF
                                        ">
                                        <input type="hidden" name="swGetPost" value=0>
                                        </br>
                                    </div>

                                    <div align = "left">
                                        <input id="submit" type="submit" name="submit" value="Aplicar">
                                    </div>
                                </fieldset>
                            </form>
EOF;
                        }
                        
                    print <<<EOF
                    </div> <!-- end content -->
            
            </table>
        </div> <!-- end main content -->
EOF;
      print $page->getBottom();
?>