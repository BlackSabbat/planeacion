<?php
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
                    <!--<li><a href="titulados/selectBD.php">Seleccionar Base de Datos</a></li>-->
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
                <p>Egresados y Titulados.</p>
                <p>Seleccionar reporte de Titulados o Egresados.</p>
                <form method = "POST" action="titulados/selectBD.php">
                    
                        <div>
                            <input type="radio" name="seleccion" value="egresados">
                            <label for="tabla1">Egresados</label></br>
                            <input type="radio" name="seleccion" value="titulados">
                            <label for="tabla2">Titulados</label></br>
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