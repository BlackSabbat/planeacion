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
                    <li><a href="reprobados/selectBD.php">Seleccionar Base de Datos</a></li>
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
                <p>Índice de Reprobación.</p>
                <p>Favor de seleccionar un periodo para el reporte.</p>
            </div> <!-- end content -->
        </div> <!-- end main content -->
EOF;
      print $page->getBottom();
?>