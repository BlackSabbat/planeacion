<?php
    #-----------------------------------------------------------------------------
    # programador: ing. Jose Ruben de la Peña Fuentes
    # objetivo: crear reporte "Matriculas por Edades en cada Semestre"
    #-----------------------------------------------------------------------------
    
    include ("mysql_conection.inc");
    require_once($_SERVER["DOCUMENT_ROOT"]."/classPage.php");
    $page = new Page();
    print $page->getTop();

    $BDSeleccionada = $_POST["nombreBD"];

    # Establacer conexion
    $db = new mysqli($host, $user, $pwd, $base_datos);
    
    $seleccion = $_POST["seleccion"]; 

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
                    <div id="sidebar">
                        <h3>&nbsp;&nbsp;Menu</h3>
                        <ul>
                            <li><a href="selectBD.php">Base de Datos</a></li>
                            <br>&nbsp
                            <br>&nbsp
                            <br>&nbsp
                            
                        </ul>
                    </div> <!-- end sidebar -->
                </td>
                <td>
                    <div id="content">
                        <p>Base de Datos Seleccionada: &nbsp;
EOF;
                        echo $_POST["nombreBD"];
                            print <<< EOF
                            </p>

                            <form method = "POST" action="reportes.php">
                                <fieldset>

EOF;
                                    // Si Reporte es por Semestre
                                    
                                    if ($seleccion  == 'semestre')
                                    {
                                        
                                        print <<<EOF
                                        
                                        <div>
                                            <legend>Selección de Reportes</legend>
                                            <input type="checkbox" name="tabla1" value="licenciatura">
                                            <label for="tabla1">Tabla Licenciatura</label></br>
                                            <input type="checkbox" name="tabla2" value="posgrado">
                                            <label for="tabla2">Tabla Posgrado</label></br>
                                            </br>
                                        </div>

                                        <input type="hidden" name="seleccion" value="semestre">

                                        <div align = "left">
                                            <input id="submit" type="submit" name="submit" value="Aplicar">
                                        </div>
EOF;
                                    }  //If

                                    // Reporte es por Año
                                    if ($seleccion  == 'anio')
                                    {

                                        print <<<EOF
                                        
                                        <div>
                                            <legend>Reporte por Carrera</legend>
                                            <select name = "carreras"> 
EOF;

                                            if (($_POST["tabla1"] == 'licenciatura') and $_POST["tabla2"] == 'posgrado')
                                                $query = "select distinct(carrera) from matriculas_edad_sem where periodo = '$BDSeleccionada'";

                                            if (($_POST["tabla1"] == 'licenciatura') and $_POST["tabla2"] == '')
                                                $query = "select distinct(carrera) from matriculas_edad_sem where periodo = '$BDSeleccionada' and tipo = 'licenciatura'";
                                        
                                            if (($_POST["tabla1"] == '') and $_POST["tabla2"] == 'posgrado')
                                                $query = "select distinct(carrera) from matriculas_edad_sem where periodo = '$BDSeleccionada' and tipo = 'posgrado'";

                                            $result = $db->query($query);

                                            while( $row = $result->fetch_array()) {
                                            //echo "base de datos: $row[0] <br>";
                                                print <<<EOF
                                                <option value="
EOF;
                                                    echo ($row[0]);       
                                                    print <<<EOF
                                               ">
EOF;
                                                    echo ($row[0]);
                                                    print <<<EOF
                  
                                                </option>                                   
EOF;
                                            }

                                            print <<<EOF
                                            
                                            </select>
                                            </br>

EOF;
                                            print <<<EOF

                                            </br>
                                            <input type="radio" name="tipo_carrera" value="1" checked>
                                            <label for="tipo_carrera">carrera específica</label></br>
                                            <input type="radio" name="tipo_carrera" value="2">
                                            <label for="tipo_carrera">carrera abierta</label></br>
                                            <input type="radio" name="tipo_carrera" value="3">
                                            <label for="tipo_carrera">carrera a distacia</label></br>
                                            <input type="radio" name="tipo_carrera" value="4">
                                            <label for="tipo_carrera">turno vespertino</label></br>
                                            </br>
                                            <input type="checkbox" name="reporte" value="todas_carreras">
                                            <label for="reporte">todas las carreras</label></br>
                                            </br>
                                            <input type="hidden" name="seleccion" value="anio">

                                            <input type="hidden" name="tabla1" value="
EOF;
                                                echo $_POST["tabla1"];
                                                print <<<EOF
                                            "> 

                                            <input type="hidden" name="tabla2" value="
EOF;
                                                echo $_POST["tabla2"];
                                                print <<<EOF
                                            "> 
                              
                                        </div>

                                        <div align = "left">
                                            <input id="submit" type="submit" name="submit" value="Aplicar">
                                        </div>
EOF;
                                    } //if

                                    print <<<EOF

                                    <input type="hidden" name="nombreBD" value="
EOF;
                                        echo $_POST["nombreBD"];
                                        print <<<EOF
                                    ">

                                    <input type="hidden" name="periodo_escolar" value="">

                                    <input type="hidden" name="semestre" value="
EOF;
                                        echo $_POST["semestre"];
                                        print <<<EOF
                                    ">
                                    
                                    <input type="hidden" name="reingreso" value="
EOF;
                                        echo $_POST["reingreso"];
                                        print <<<EOF
                                    ">

                                </fieldset>
                            </form>
                    </div> <!-- end content -->
                </td>
            </table>
        </div> <!-- end main content -->

EOF;
      print $page->getBottom();
?>