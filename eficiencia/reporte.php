<?php
    #-----------------------------------------------------------------------------
    # programador: ing. Jose Ruben de la Peña Fuentes
    # objetivo: crear reporte "Eficiencia Terminal o de Egreso"
    #-----------------------------------------------------------------------------
    
    require_once($_SERVER["DOCUMENT_ROOT"]."/classPage.php");
    $page = new Page();
    print $page->getTop();

    date_default_timezone_set("America/Monterrey");
    $fecha = date("d/M/Y");
    $hora = date("h:i:sa");
        
    $BDSeleccionada = $_POST["nombreBD"];
    $reporteNombre = $_POST["reporte"];
    $swEsconde = $_POST["esconder"];

    $seleccion = $_POST["seleccion"];

    $anio_reporte = $_POST["nombreBD"];

    $anio_rep = substr($_POST["nombreBD"],8,4);
    $sem_rep = substr($_POST["nombreBD"],0,8);
    
    print <<<EOF

    </script>

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
                        <h3>&nbsp;&nbsp;Menu de Reportes</h3>
                        <ul>
                        <table>
                            <tr>
                            
                                <a href="../eficiencia.php");>Seleccionar Reporte </a></br>
                            
                            </tr>

                            </br>&nbsp
                            </br>&nbsp
                            
                            <tr>
                                <td>
                                    <a href="javascript:window.print()" style='text-decoration:none;'>
                                        <img src="/images/printer-xxl.jpg" border="0" alt="Este es el ejemplo de un texto alternativo">
                                    </a>
                                </td>
                            </tr>
                            
                        </table>
                        </ul>
                    </div> <!-- end sidebar -->
                </td>
                <td>
                    <table>
                    <div id="content">

                        <form method = "POST" action="reporte.php">

EOF;
                                    //echo "Reporte: $reporteNombre </br>";
                                    switch ($reporteNombre)
                                    {
                                        # Eficiencia Terminal en Licenciaturas
                                        case "reporte1":
                                            echo "<tr><td id=\"Encabezado1\">Eficiencia Terminal en Licenciaturas en $anio_reporte</td></tr>";
                                            echo "<tr><td id=\"SubEncabezadoFecha\"> Fecha: $fecha  &nbsp; Hora: $hora </td></tr>";
                                            
                                            echo "<tr>";
                                            echo "</tr>";

                                            print <<< EOF
                                            <tr>
                                                <td>                             

EOF;
                                                    include ("reporte1.php");
                                                    
                                                    print <<< EOF
                                                </td>
                                            </tr> 
                                            
                             
                                            <tr>
                                                <td>                             

EOF;
                                                    echo "</br>";                                      
                                                    include ("reporte2.php");
                                                    print <<< EOF
                                                </td>
                                            </tr>  
                                       
                                            <input type="hidden" name="reporte" value="reporte1">
                                            <input type="hidden" name="nombreBD" value="
EOF;

                                            echo $_POST["nombreBD"];
                                            print <<<EOF
                                            ">                              
EOF;
                                            break;


                                        # Eficiencia Terminal en Posgrado
                                        case "reporte2":
                                            echo "<tr><td id=\"Encabezado1\">Eficiencia Terminal en Posgrado en $anio_reporte</td></tr>";
                                            echo "<tr><td id=\"SubEncabezadoFecha\"> Fecha: $fecha  &nbsp; Hora: $hora </td></tr>";
                                            
                                            echo "<tr>";
                                            echo "</tr>";

                                            print <<< EOF
                                            <tr>
                                                <td>                             

EOF;
                                                    include ("reporte1.php");
                                                    
                                                    print <<< EOF
                                                </td>
                                            </tr> 
                                            
                             
                                             
                                       
                                            <input type="hidden" name="reporte" value="reporte2">
                                            <input type="hidden" name="nombreBD" value="
EOF;

                                            echo $_POST["nombreBD"];
                                            print <<<EOF
                                            ">                              
EOF;
                                            break;




                                        # Eficiencia de Egreso en Licenciaturas
                                        case "reporte3":
                                            echo "<tr><td id=\"Encabezado1\">Eficiencia de Egreso en Licenciaturas en $anio_reporte<tr><td>";
                                            echo "<tr><td id=\"SubEncabezadoChico\"> Fecha: $fecha  &nbsp; Hora: $hora <tr><td>";
                                            print <<< EOF
                                            <tr>
                                                 <td> 
EOF;
                                                    include ("reporte1.php");
                                                    print <<< EOF
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>                             

EOF;
                                                    echo "</br>";                                      
                                                    include ("reporte2.php");
                                                    print <<< EOF
                                                </td>
                                            </tr>
                                       
                                            <input type="hidden" name="reporte" value="reporte3">
                                            <input type="hidden" name="nombreBD" value="
EOF;
                                            echo $_POST["nombreBD"];
                                            print <<<EOF
                                            ">                                   
EOF;
                                            break;


                                            case "reporte4":
                                            echo "<tr><td id=\"Encabezado1\">Eficiencia de Egreso en Posgrado en $anio_reporte<tr><td>";
                                            echo "<tr><td id=\"SubEncabezadoChico\"> Fecha: $fecha  &nbsp; Hora: $hora <tr><td>";
                                            print <<< EOF
                                            <tr>
                                                 <td> 
EOF;
                                                    include ("reporte1.php");
                                                    print <<< EOF
                                                </td>
                                            </tr>

                                            
                                       
                                            <input type="hidden" name="reporte" value="reporte3">
                                            <input type="hidden" name="nombreBD" value="
EOF;
                                            echo $_POST["nombreBD"];
                                            print <<<EOF
                                            ">                                   
EOF;
                                            break;


                                        default:
                                            echo "No hay reporte seleccionado";

                                    }
                    
                                    
                                    print <<< EOF
                        </form>
                        
                    </div> <!-- end content -->
                    </table>
                </td>
            </table>
        </div> <!-- end main content -->
EOF;

      print $page->getBottom();
?>