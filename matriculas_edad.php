<?php
    #-----------------------------------------------------------------------------
    # programador: ing. Jose Ruben de la Peña Fuentes
    # objetivo: crear reporte "Matriculas por Edades en cada Semestre"
    #-----------------------------------------------------------------------------

    require_once("classPage.php");
    $page = new Page();
    print $page->getTop();
    
    print <<<EOF
        <div id="mainContent">
            <div id="menu">
                <ul>
                    <li><a href="home.php">Principal</a></li>
                    <li><a href="about.php"><About Me>Acerca de</a></li>
                    <li><a href="contact.php">Contactar</a></li>
                </ul>
                
            </div> <!-- end menu -->
            <div id="sidebar">
                <h3>&nbsp;&nbsp;Menu</h3>
                <ul>
                    <!-- <li><a href="matriculas_edad/selectBD.php">Seleccionar Base de Datos</a></li> -->
                    <br>&nbsp
                    <br>&nbsp
                    <br>&nbsp
                    <br>&nbsp
                    <br>&nbsp
                    <br>&nbsp
                    <br>&nbsp
                </ul>
            </div> <!-- end sidebar -->
            <div id="content">
                <p>Matrículas por Edades en Semestres.</p>
                <p>Seleccionar tipo de reporte:</p>

                <form method = "POST" action="matriculas_edad/selectBD.php">
                    
                        <div>
                            
                            <input type="radio" name="seleccion" value="semestre" checked>
                            <label for="tabla1">por Semestre</label></br>
                            <input type="radio" name="seleccion" value="anio">
                            <label for="tabla2">por Año</label></br>

                            <!--
                            <input type="checkbox" name="seleccion" value="anio">
                            <label for "seleccion">por Año</label>
                            -->

                            </br>
                        </div>
                        <div align = "left">
                            <input id="submit" type="submit" name="submit" value="Aplicar">
                        </div>
                    
                </form>

            </div> <!-- end content -->
        </div> <!-- end main content -->
EOF;
      print $page->getBottom();
?>