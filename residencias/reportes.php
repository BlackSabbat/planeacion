<?php
    
    require_once($_SERVER["DOCUMENT_ROOT"]."/classPage.php");
    $page = new Page();
    print $page->getTop();
        
    $BDSeleccionada = $_POST["nombreBD"];
    $reporteNombre = $_POST["reporte"];
    $anio_reporte = substr($_POST["nombreBD"],12,13);
    
    print <<<EOF
        <div id="mainContent">
            <div id="menu">
                <ul>
                    <li><a href="../home.php">Principal</a></li>
                    <li><a href="../about.php"><About Me>Acerca de</a></li>
                    <li><a href="../contact.php">Contactar</a></li>
                </ul>               
            </div> <!-- end menu -->
            <table width = 100%>
                <tr>
                <td>
                    </br>
                </td>
                </tr>

           
                <td align = "left">
                    <div id="reportes">
EOF;
                    
                            switch ($reporteNombre)
                            {
                                case "reporte2":
                                    echo "Residencias en $anio_reporte </br>";
                                    include ("reporte2.php");
                                    break;

                                default:
                                    echo "No hay reporte seleccionado";
                            }
                     
                    print <<< EOF
                
                    </div> <!-- end content -->
                </td>
            </table>
        </div> <!-- end main content -->
EOF;

      print $page->getBottom();
?>