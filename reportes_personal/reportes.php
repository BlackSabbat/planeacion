<?php
    
    require_once($_SERVER["DOCUMENT_ROOT"]."/classPage.php");
    $page = new Page();
    print $page->getTop();

    date_default_timezone_set("America/Monterrey");
    $fecha = date("d/M/Y");
    $hora = date("h:i:sa");
        
    $BDSeleccionada = $_POST["nombreBD"];
    $reporteNombre = $_POST["reporte"];
    $anio_reporte = substr($_POST["nombreBD"],10,12);
    
    print <<<EOF
        
    

    </script>
    
            <div id="menu">
                <ul>
                    <li><a href="../home.php">Principal</a></li>
                    <li><a href="../about.php"><About Me>Acerca de</a></li>
                    <li><a href="../contact.php">Contactar</a></li>
                </ul>               
            </div> <!-- end menu -->
        
            <div id="reportes">
            <table>
                <td>
                    </br>
                </td>
                
                <td>
                    
EOF;

                            switch ($reporteNombre)
                            {
                                case "reporte1":
                                    echo "<tr><td>Personal Plaza Docente por Grado en $anio_reporte </tr></td>";
                                    echo "<tr><td id=\"SubEncabezadoChico\"> Fecha: $fecha  &nbsp; Hora: $hora </td></tr>";
                                    print <<< EOF

                                    <tr>
                                        <td> 
EOF;
                                            include ("reporte1.php");
                                            break;
                                            print <<< EOF
                                         </td>
                                    </tr> 
EOF;
                                case "reporte2":
                                    echo "<tr><td>Personal Plaza de Apoyo por Grado en $anio_reporte </tr></td>";
                                    echo "<tr><td id=\"SubEncabezadoChico\"> Fecha: $fecha  &nbsp; Hora: $hora </td></tr>";
                                    print <<< EOF
                                    <tr>
                                        <td> 
EOF;
                                            include ("reporte2.php");
                                            break;
                                            print <<< EOF
                                         </td>
                                    </tr> 
EOF;

                                case "reporte3":
                                    echo "<tr><td>Personal Plaza de Docente por Edad y Antigüedad en $anio_reporte  </tr></td>";
                                    echo "<tr><td id=\"SubEncabezadoChico\"> Fecha: $fecha  &nbsp; Hora: $hora </td></tr>";
                                    print <<< EOF
                                    <tr>
                                        <td> 
EOF;
                                            include ("reporte3.php");
                                            break;
                                            print <<< EOF
                                         </td>
                                    </tr> 
EOF;

                                case "reporte4":
                                    echo "<tr><td>Personal Plaza de Apoyo por Edad y Antigüedad en $anio_reporte </td></tr>";
                                    echo "<tr><td id=\"SubEncabezadoChico\"> Fecha: $fecha  &nbsp; Hora: $hora </td></tr>";
                                    print <<< EOF
                                    <tr>
                                        <td> 
EOF;
                                            include ("reporte4.php");
                                            break;
                                            print <<< EOF
                                        </td>
                                    </tr> 
EOF;

                                case "reporte5":
                                    echo "<tr><td>Personal Docente Frente a Grupo por Grado en $anio_reporte </td></tr>";
                                    echo "<tr><td id=\"SubEncabezadoChico\"> Fecha: $fecha  &nbsp; Hora: $hora </td></tr>";
                                    print <<< EOF
                                    <tr>
                                        <td> 
EOF;
                                            include ("reporte5.php");
                                            break;
                                            print <<< EOF
                                        </td>
                                    </tr> 
EOF;

                                case "reporte6":
                                    echo "<tr><td>Personal Docente Frente a Grupo por Edad en $anio_reporte </td></tr>";
                                    echo "<tr><td id=\"SubEncabezadoChico\"> Fecha: $fecha  &nbsp; Hora: $hora </td></tr>";
                                    print <<< EOF
                                    <tr>
                                        <td> 
EOF;
                                            include ("reporte6.php");
                                            break;
                                            print <<< EOF
                                        </td>
                                    </tr> 
EOF;

                                case "reporte7":
                                    echo "<tr><td>Docentes con SNI & Discapacitados en periodo $anio_reporte </td></tr>";
                                    echo "<tr><td id=\"SubEncabezadoChico\"> Fecha: $fecha  &nbsp; Hora: $hora </td></tr>";
                                    print <<< EOF
                                    <tr>
                                        <td> 
EOF;
                                            include ("reporte7.php");
                                            break;
                                            print <<< EOF
                                        </td>
                                    </tr> 
EOF;

                                case "reporte8":
                                    echo "<tr><td>Investigadores por Grado en $anio_reporte </tr></td>";
                                    echo "<tr><td id=\"SubEncabezadoChico\"> Fecha: $fecha  &nbsp; Hora: $hora </td></tr>";
                                    print <<< EOF

                                    <tr>
                                        <td> 
EOF;
                                            include ("reporte8.php");
                                            break;
                                            print <<< EOF
                                         </td>
                                    </tr> 
EOF;

                                case "reporte9":
                                    echo "<tr><td>Investigadores por Edad y Antig. en $anio_reporte </tr></td>";
                                    echo "<tr><td id=\"SubEncabezadoChico\"> Fecha: $fecha  &nbsp; Hora: $hora </td></tr>";
                                    print <<< EOF

                                    <tr>
                                        <td> 
EOF;
                                            include ("reporte9.php");
                                            break;
                                            print <<< EOF
                                         </td>
                                    </tr> 
EOF;

                                case "reporte10":
                                    echo "<tr><td>Investigador Frente a Grupo por Grado en $anio_reporte </td></tr>";
                                    echo "<tr><td id=\"SubEncabezadoChico\"> Fecha: $fecha  &nbsp; Hora: $hora </td></tr>";
                                    print <<< EOF
                                    <tr>
                                        <td> 
EOF;
                                            include ("reporte10.php");
                                            break;
                                            print <<< EOF
                                        </td>
                                    </tr> 
EOF;

                                case "reporte11":
                                    echo "<tr><td>Investigador Frente a Grupo por Edad y Antig. en $anio_reporte </td></tr>";
                                    echo "<tr><td id=\"SubEncabezadoChico\"> Fecha: $fecha  &nbsp; Hora: $hora </td></tr>";
                                    print <<< EOF
                                    <tr>
                                        <td> 
EOF;
                                            include ("reporte11.php");
                                            break;
                                            print <<< EOF
                                        </td>
                                    </tr> 
EOF;

                                case "reporte12":
                                    echo "<tr><td>Docente en Ed. a Dist. Frente a Gpo por Grado en $anio_reporte </td></tr>";
                                    echo "<tr><td id=\"SubEncabezadoChico\"> Fecha: $fecha  &nbsp; Hora: $hora </td></tr>";
                                    print <<< EOF
                                    <tr>
                                        <td> 
EOF;
                                            include ("reporte12.php");
                                            break;
                                            print <<< EOF
                                        </td>
                                    </tr> 
EOF;

                                case "reporte13":
                                    echo "<tr><td>Docente en Ed. Dist. Frente a Gpo por Edad y Antig. en $anio_reporte </td></tr>";
                                    echo "<tr><td id=\"SubEncabezadoChico\"> Fecha: $fecha  &nbsp; Hora: $hora </td></tr>";
                                    print <<< EOF
                                    <tr>
                                        <td> 
EOF;
                                            include ("reporte13.php");
                                            break;
                                            print <<< EOF
                                        </td>
                                    </tr> 
EOF;
                                

                                default:
                                    echo "No hay reporte seleccionado";
                            }
 
                    print <<< EOF
                </td> 
            </table>
            </div> <!-- reportes -->
       
EOF;

      print $page->getBottom();
?>