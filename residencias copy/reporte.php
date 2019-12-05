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
            <table>
                <td>
                    <div id="sidebar2">
                        <h3>&nbsp;&nbsp;Menu</h3>
                         <ul>
                            <li><a href="selectBD.php" style='text-decoration:none;'>Base de Datos </a></br></li>
EOF;
                             
                  
 print <<<EOF
             
                            </br>&nbsp
                            </br>&nbsp
                            </br>&nbsp
                            </br>&nbsp
                            </br>&nbsp
                            </br>&nbsp
                            </br>&nbsp
                            </br>&nbsp
                            </br>&nbsp
                            </br>&nbsp
                            </br>&nbsp
                            </br>&nbsp
                            </br>&nbsp
                            </br>&nbsp
                            </br>&nbsp
                            </br>&nbsp
                            </br>&nbsp  
                        </ul>  
                    </div> <!-- end sidebar -->
                </td>
                <td align = "left">
                    <div id="content">
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