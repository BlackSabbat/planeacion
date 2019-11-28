<?php

    #-----------------------------------------------------------------------------
    # programador: ing. Jose Ruben de la Peña Fuentes
    # objetivo: crear reporte de Eficiencia de Egreso y Terminal
    #-----------------------------------------------------------------------------
    
    include ("mysql_conection.inc");
    require_once($_SERVER["DOCUMENT_ROOT"]."/classPage.php");
    $page = new Page();
    print $page->getTop();

    $nombreBD = $_POST["nombreBD"];
    $anio_reporte = substr($_POST["nombreBD"],8,4);
    $sem_reporte = substr($_POST["nombreBD"],0,8);
    $swDatos = 0;
    
    $seleccion = $_POST["seleccion"];

    # Establacer conexion
    $db = new mysqli($host, $user, $pwd, $base_datos);

    /* verificar la conexión */
    if ($db->connect_errno) {
        printf("Conexión fallida: %s\n", $db->connect_error);
        exit();
    }
    
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
                        echo "</br>";

                        #verificar si hay datos para el reporte

                        if ($seleccion == '1'){
                            $tabla = 'titulados';
                        }
                    
                        if ($seleccion == '2'){
                            $tabla = 'egresados';
                        }

                        
                        # se usa 4 como limite porque se deben buscar registros hasta en 4 semestres anteriores
                        # identificar el error si no se tienen esas bases de datos

                        $anio_temp = $anio_reporte;
            
                        for ($i = 0; $i < 4; $i++){

                            //echo "Sem: $sem_reporte </br>";

                            if ($sem_reporte == 'ene_jun_'){
                                $sem_reporte = 'ago_dic_';
                                $anio_temp = $anio_temp - 1;
                                $BDSeleccionada = $sem_reporte . strval($anio_temp);
                                
                            }
                            else {
                                $sem_reporte = 'ene_jun_';
                                $BDSeleccionada = $sem_reporte . strval($anio_temp);
                            }
                            
                            $consulta = "SELECT num_control FROM $tabla where (periodo = '$BDSeleccionada')";  
                            $query = $consulta;
                            //echo "$query</br>";

                            $result = $db->query($query);  
                            if ( ($resultado = $result->fetch_assoc()) == null ){
                                $swDatos = 1;
                                $i= ($anio_reporte - 4);
                            }
                        }

                        # ---------------------------------------

                        # continuar si hay datos suficientes    
                        if ($swDatos == 0) {
                            print <<< EOF
                            </p>
                            <form method = "POST" action="reportes.php">
                                <fieldset>
                                    <legend>Selección de Reportes</legend>
                                    <div>
EOF;
                                        if ($seleccion == '1'){
                                            print <<<EOF
                                            <input type="radio" name="reporte" value="reporte1">
                                            <label>Eficiencia Terminal en Licenciaturas</label></br>
                                            <input type="radio" name="reporte" value="reporte2">
                                            <label>Eficiencia Terminal en Posgrado</label></br>
EOF;
                                        }

                                        if ($seleccion == '2'){
                                            print <<<EOF
                                            <input type="radio" name="reporte" value="reporte3">
                                            <label>Eficiencia de Egreso en Licenciaturas</label></br>
                                            <input type="radio" name="reporte" value="reporte4">
                                            <label>Eficiencia de Egreso en Posgrado</label></br>
EOF;
                                        }
                                        print <<<EOF
                                        </br>
                                        <input type="checkbox" name="reporte_5Anios" value="1">
                                        <label for="reporte_5Anios">Matrícula de 5 años</label></br>

                                        <input type="hidden" name="nombreBD" value="
EOF;
                                        echo $_POST["nombreBD"];
                                        print <<<EOF
                                        ">
                                        </br>
                                    </div>
                                    <div align = "left">
                                        <input id="submit" type="submit" name="submit" value="Aplicar">
                                    </div>
                                </fieldset>
                            </form>
EOF;
                        }

                        # error si no hay datos
                        else{
                            echo "</br></br>No hay datos suficientes para realizar el reporte. </br>";
                        }
                        print <<<EOF
                    </div> <!-- end content -->
                </td>
            </table>
        </div> <!-- end main content -->
EOF;

    print $page->getBottom();

    # cerrar conexion a BD
    $db->close();

?>