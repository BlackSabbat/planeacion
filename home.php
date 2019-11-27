<?php
    require_once("classPage.php");
    $page = new Page();
    print $page->getTop();
    
    print <<<EOF

        <div id="mainContent"> 
            <div id="menu">
                <ul>
                    <li><a href="home.php">Principal</a></li>
                    <li><a href="about.php">Acerca de</a></li>
                    <li><a href="contact.php">Contactar</a></li>
                    
                </ul> 
            </div> <!-- end menu -->
      
            <table>
                <td>
                <div id="sidebar">
                    <h3>Menu</h3>
                    <ul>
                        <li><a href="reportes_Personal.php">Reportes de Personal</a></li>
                        <li><a href="matriculas.php">Matrículas</a></li>
                        <li><a href="matriculas_edad.php">Matrícula por Edades</a></li>
                        <li><a href="residencias.php">Residencias</a></li>
                        <li><a href="egresados_titulados.php">Egresados y Titulados</a></li>
                        <li><a href="eficiencia.php">Efc Terminal y Egreso</a></li>
                        <li><a href="reprobados.php">Índice Reprobación</a></li>
                        <li><a href="desercion.php">Índice de Deserción</a></li>
                        <br>&nbsp
                        <br>&nbsp
                        <br>&nbsp
                        <br>&nbsp
                    </ul>
                </div> <!-- end sidebar -->
                </td>
                <td>
                        <div id="content">
                            <p>Catálogo de reportes estadísticos de acuerdo a un período seleccionado.</p>
                            <p>Favor de seleccionar un año para la Base de Datos.</p>
                        </div> <!-- end content -->
                </td>
            </table>
            
        </div> <!-- end main content --> 
EOF;
      print $page->getBottom();
?>