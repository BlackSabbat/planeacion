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
            <table>
                <td>
                    <div id="sidebar">
                        <h3>&nbsp;&nbsp;Menu</h3>
                        <ul>
                            <li><a href="residencias/selectBD.php">Base de Datos</a></li>
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
                        <p>Reportes de residencias de acuerdo a un periodo.</p>
                        <p>Favor de seleccionar un año para la Base de Datos.</p>
                    </div> <!-- end content -->
                </td>
            </table>
        </div> <!-- end main content -->
EOF;
      print $page->getBottom();
?>