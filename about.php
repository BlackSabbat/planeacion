<?php
require_once("classPage.php");
$page = new Page();
$page->titleExtra = "About";
print $page->getTop();
print <<< EOF
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
                <h3>Menu</h3>
                <ul>
                    <li><a href="home.php">Principal</a></li>
                    <li><a href="about.php">Acerca</a></li>
                    <li><a href="contact.php">Contacto</a></li>
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
                <p>Control de reportes estadísticos</p>
                <p>en el Instituto Tecnológico de Saltillo</p>
            </div> <!-- end content -->
        </td>
    </table>
</div> <!-- end main content -->
EOF;
print $page->getBottom();
?>