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
                    <li><a href="matriculas_edad/selectBD.php">Seleccionar Base de Datos</a></li>
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
                <p>Favor de seleccionar un periodo para la Base de Datos.</p>
            </div> <!-- end content -->
        </div> <!-- end main content -->
EOF;
      print $page->getBottom();
?>