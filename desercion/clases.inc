<?php
    class reprobado
    {
        function reporte1($BDSeleccionada, $tabla1, $tabla2, $tipo, $db, $host, $user, $pwd, $swPerEsc, $swEsconde)
        {

            // definir CONSULTA DE Matricula
            // Analizar si el reporte es por periodo escolar (ejem Ene-Jun 2017 a Ago-Dic 20018)

            //echo "swEsconde: $swEsconde </br>";

            // por Periodo Escolar
            if ($swPerEsc == "1") {

                $mes_bd_1  = substr($BDSeleccionada,0,8);
                $anio_bd_1 = substr($BDSeleccionada,8,4);

                if ($mes_bd_1 == 'ene_jun_'){
                    
                    $mes_bd_2  = 'ago_dic_';
                    $anio_bd_2 = $anio_bd_1 - 1;
            
                    $periodo2  = $mes_bd_2 . strval($anio_bd_2);
                    $periodo3  = $mes_bd_2 . strval($anio_bd_1);
                    $periodo32 = $BDSeleccionada;

                    // variable para encabezado
                    $periodo_encabezado = $periodo2 . " - " . $BDSeleccionada;
                }
                else {
                    $mes_bd_2  = 'ene_jun_';
                    $anio_bd_2 = $anio_bd_1 + 1;
                    $periodo2  = $mes_bd_2 . strval($anio_bd_2);

                    $periodo3  = $mes_bd_1 . strval($anio_bd_2);
                    $periodo32 = $periodo2;

                    // variable para encabezado
                    $periodo_encabezado = $BDSeleccionada . " - " . $periodo2;
                }

                $consulta1 = "SELECT carrera, abierta, distancia, vespertino, sum(hom1+hom2+hom3+hom4+hom5+hom6+hom7+hom8+hom9+hom10+hom11+hom12+hom13+hom14+hom15+hom16+hom17+hom18+hom19+hom20) as hom, sum(muj1+muj2+muj3+muj4+muj5+muj6+muj7+muj8+muj9+muj10+muj11+muj12+muj13+muj14+muj15+muj16+muj17+muj18+muj19+muj20) as muj 
                    FROM $tabla1 
                    WHERE (tipo = '$tipo' and (periodo = '$BDSeleccionada' or periodo = '$periodo2'))
                    group by carrera, abierta, distancia, vespertino";
            }

            // por Semestre
            else {
                $consulta1 = "SELECT carrera, abierta, distancia, vespertino, sum(hom1+hom2+hom3+hom4+hom5+hom6+hom7+hom8+hom9+hom10+hom11+hom12+hom13+hom14+hom15+hom16+hom17+hom18+hom19+hom20) as hom, sum(muj1+muj2+muj3+muj4+muj5+muj6+muj7+muj8+muj9+muj10+muj11+muj12+muj13+muj14+muj15+muj16+muj17+muj18+muj19+muj20) as muj  
                    FROM $tabla1 
                    where (tipo = '$tipo' and periodo = '$BDSeleccionada')
                    group by carrera, abierta, distancia, vespertino";

                // variable para encabezado
                $periodo_encabezado = $BDSeleccionada;
            }

            $query1 = $consulta1;
            $result1 = $db->query($query1);
            
            //echo "consulta1: $query1 </br>";
            //echo "registros: $result1->num_rows";

            //ENCABEZADOS DEL REPORTE
            print <<<EOF
            </br>
            <tr>
                <th id="subEncabezado" rowspan = 2>LISTA DE CARRERAS          </th>

EOF;

                //Esconder detalles adicionales del reporte
                if ($swEsconde == 0)
                {
                        print <<<EOF
                        <th id="subEncabezado" colspan = 3> MATRICULA    </th>
                        <th id="subEncabezado" colspan = 3> EGRESADOS    </th>
                        <th id="subEncabezado" colspan = 3> REINGRESO    </th>
                        <th id="subEncabezado" colspan = 3> BAJA         </th>
                        <th id="subEncabezado" colspan = 3> INDICE DESERCIÓN (%) </th>
EOF;
                        

                }

                if ($swEsconde != 0) {
                    print <<<EOF
                    <th id="subEncabezado" rowspan = 2> MATRICULA    </th>
                    <th id="subEncabezado" rowspan = 2> EGRESADOS    </th>
                    <th id="subEncabezado" rowspan = 2> REINGRESO    </th>
                    <th id="subEncabezado" rowspan = 2> BAJA         </th>
                    <th id="subEncabezado" rowspan = 2> INDICE DESERCIÓN (%) </th>
EOF;
                }
                print <<<EOF
            </tr>

            <tr>
EOF;

                //Esconder detalles adicionales del reporte
                if ($swEsconde == 0)
                {
                        print <<<EOF
                        <th id="subEncabezado" > Hom      </th>
                        <th id="subEncabezado" > Muj      </th>
                        <th id="subEncabezado" > Tot      </th>

EOF;

                } 
                

                if ($swEsconde == 0)
                {
                        print <<<EOF
                        <th id="subEncabezado" > Hom      </th>
                        <th id="subEncabezado" > Muj      </th>
                        <th id="subEncabezado" > Tot      </th>
                        
EOF;

                }
                 
                if ($swEsconde == 0)
                {
                        print <<<EOF
                        <th id="subEncabezado" > Hom      </th>
                        <th id="subEncabezado" > Muj      </th>
                        <th id="subEncabezado" > Tot      </th>
EOF;
                }
                 
                if ($swEsconde == 0)
                {
                    print <<<EOF
                    <th id="subEncabezado" > Hom      </th>
                    <th id="subEncabezado" > Muj      </th>
                    <th id="subEncabezado" > Tot      </th>
EOF;
                } 
                

                if ($swEsconde == 0)
                {
                    print <<<EOF
                    <th id="subEncabezado" > Hom      </th>
                    <th id="subEncabezado" > Muj      </th>
                    <th id="subEncabezado" > Tot      </th>
EOF;

                } 
                print <<<EOF
                

            </tr>

EOF;

            // termina encabezado

            // Inicializar totales del reporte
            $total_hom_mat      = 0;  $total_muj_mat      = 0;  $total_total_mat    = 0;
            $total_hom_egr      = 0;  $total_muj_egr      = 0;  $total_total_egr    = 0;
            $total_hom_reing    = 0;  $total_muj_reing    = 0;  $total_total_reing  = 0;        
            $total_baja_hom     = 0;  $total_baja_muj     = 0;  $total_baja_tot     = 0;
            $porc_tot_baja_hom  = 0;  $porc_tot_baja_muj  = 0;  $porc_tot_baja_tot  = 0;        


            //ARMAR EL REPORTE

            while($row1 = $result1->fetch_assoc()) {

                $total_mat          = 0; 
                $total_egr          = 0;
                $total_reing        = 0;

                //definir CONSULTA DE Egresados de cada carrera
                // Analizar si el reporte es por periodo escolar (ejem Ene-Jun 2017 a Ago-Dic 20018)

                $carrera        =   $row1['carrera'];
                $hom_mat        =   $row1['hom'];
                $muj_mat        =   $row1['muj'];

                if ($row1['abierta'] == 'si') {
                    $carrera    = $carrera;
                }

                if ($row1['distancia'] == 'si') {
                    $carrera    = $carrera . ' DIST';
                }

                if ($row1['vespertino'] == 'si') {
                    $carrera    = $carrera . ' VESP';
                }

                // condicional si reporte es por ciclo escolar 
                if ($swPerEsc == "1") {

                        $mes_bd_1  = substr($BDSeleccionada,0,8);
                        $anio_bd_1 = substr($BDSeleccionada,8,4);

                        // ciclo escolar ene-jun
                        if ($mes_bd_1 == 'ene_jun_'){
                    
                            $mes_bd_2  = 'ago_dic_';
                            $anio_bd_2 = $anio_bd_1 - 1;
                            $periodo2  = $mes_bd_2 . strval($anio_bd_2);
                        }

                        // ciclo escolar ago-dic
                        else {
                            $mes_bd_2  = 'ene_jun_';
                            $anio_bd_2 = $anio_bd_1 + 1;
                            $periodo2  = $mes_bd_2 . strval($anio_bd_2);

                        }
                        
                        $consulta2 = "SELECT * 
                            FROM $tabla2 
                            WHERE (carrera = '$carrera' and (periodo = '$BDSeleccionada' or periodo = '$periodo2'))";
                        
                }  // FIN de Evaluar si reporte es por ciclo escolar

                // condicional si reporte es por semestre
                else {                        
                        $consulta2 = "SELECT * FROM $tabla2
                            WHERE (carrera = '$carrera' and periodo = '$BDSeleccionada')";
                } // FIN de Evaluar si reporte es por semestre
                // ---------------------------------------------------------------------------------
            
                $query2 = $consulta2;
                $result2 = $db->query($query2);
                //echo "$query2 </br>";

                // contadores de egresados
                $hom_egr = 0;
                $muj_egr = 0;
                
                while($row2 = $result2->fetch_assoc()) {

                    //echo "$row2['alumno'] </br>";
            
                    if ($row2['sexo'] == 'M'){
                        $hom_egr  =  $hom_egr + 1;
                    }
                    else {
                        $muj_egr  =  $muj_egr + 1;
                    }

                }


                //definir CONSULTA DE REINGRESOS de cada carrera
                // por Periodo Escolar

                $carrera2       =   $row1['carrera'];
                $abierta        =   $row1['abierta'];
                $distancia      =   $row1['distancia'];
                $vespertino     =   $row1['vespertino'];

                if ($swPerEsc == "1") {

                    $mes_bd_1  = substr($BDSeleccionada,0,8);
                    $anio_bd_1 = substr($BDSeleccionada,8,4);

                    if ($mes_bd_1 == 'ene_jun_'){
                    
                        $mes_bd_2  = 'ago_dic_';
                        $anio_bd_2 = $anio_bd_1 - 1;
            
                        $periodo2  = $mes_bd_2 . strval($anio_bd_2);
                        $periodo3  = $mes_bd_2 . strval($anio_bd_1);
                        $periodo32 = $BDSeleccionada;

                        // variable para encabezado
                        $periodo_encabezado = $periodo2 . " - " . $BDSeleccionada;
                    }
                    else {
                        $mes_bd_2  = 'ene_jun_';
                        $anio_bd_2 = $anio_bd_1 + 1;
                        $periodo2  = $mes_bd_2 . strval($anio_bd_2);

                        $periodo3  = $mes_bd_1 . strval($anio_bd_2);
                        $periodo32 = $periodo2;

                        // variable para encabezado
                        $periodo_encabezado = $BDSeleccionada . " - " . $periodo2;
                    }

                    $consulta3 = "SELECT carrera, abierta, distancia, vespertino, sum(hom2+hom3+hom4+hom5+hom6+hom7+hom8+hom9+hom10+hom11+hom12+hom13+hom14+hom15+hom16+hom17+hom18+hom19+hom20) as hom_reingreso, sum(muj2+muj3+muj4+muj5+muj6+muj7+muj8+muj9+muj10+muj11+muj12+muj13+muj14+muj15+muj16+muj17+muj18+muj19+muj20) as muj_reingreso 
                        FROM $tabla1 
                        WHERE (carrera = '$carrera2' and abierta = '$abierta' and distancia = '$distancia' and vespertino = '$vespertino' and tipo = '$tipo' and (periodo = '$periodo32' or periodo = '$periodo3'))
                        group by carrera, abierta, distancia, vespertino";
                }

                // por Semestre
                else {
                    // incrementar semestre selecionado en 1 para utilizar en consulta de REINGRESO
                    $mes_bd_1  = substr($BDSeleccionada,0,8);
                    $anio_bd_1 = substr($BDSeleccionada,8,4);

                    if ($mes_bd_1 == 'ene_jun_'){
                    
                        $mes_bd_2  = 'ago_dic_';
                        $anio_bd_2 = $anio_bd_1;
                        $periodo2  = $mes_bd_2 . strval($anio_bd_2);

                        // variable para encabezado
                        $periodo_encabezado = $periodo2;
                    }
                    else {
                        $mes_bd_2  = 'ene_jun_';
                        $anio_bd_2 = $anio_bd_1 + 1;
                        $periodo2  = $mes_bd_2 . strval($anio_bd_2);

                        // variable para encabezado
                        $periodo_encabezado = $BDSeleccionada . " - " . $periodo2;
                    }

                    $consulta3 = "SELECT carrera, abierta, distancia, vespertino, sum(hom2+hom3+hom4+hom5+hom6+hom7+hom8+hom9+hom10+hom11+hom12+hom13+hom14+hom15+hom16+hom17+hom18+hom19+hom20) as hom_reingreso, sum(muj2+muj3+muj4+muj5+muj6+muj7+muj8+muj9+muj10+muj11+muj12+muj13+muj14+muj15+muj16+muj17+muj18+muj19+muj20) as muj_reingreso 
                        FROM $tabla1
                        WHERE (carrera = '$carrera2' and abierta = '$abierta' and distancia = '$distancia' and vespertino = '$vespertino' and tipo = '$tipo' and (periodo = '$periodo2'))
                        group by carrera, abierta, distancia, vespertino";

                    // variable para encabezado
                    $periodo_encabezado = $BDSeleccionada;
                }

                // ---------------------------------------------------------------------------------
            
            
                $query3 = $consulta3;
                $result3 = $db->query($query3);
                //echo "$query3</br>";

                // contadores de Reingreso

                $hom_reing = 0; 
                $muj_reing = 0;
                
                
                while($row3 = $result3->fetch_assoc()) {

                    $hom_reing = $row3['hom_reingreso'];
                    $muj_reing = $row3['muj_reingreso'];
                }

                // Calculos
                $total_mat      = $hom_mat + $muj_mat;
                $total_egr      = $hom_egr + $muj_egr;
                $total_reing    = $hom_reing + $muj_reing;

                $baja_hom       = $hom_mat - ($hom_egr + $hom_reing);
                $baja_muj       = $muj_mat - ($muj_egr + $muj_reing);
                $baja_tot       = $baja_hom + $baja_muj;

                if ($hom_mat == 0)
                    $porc_baja_hom = 0;
                else
                    $porc_baja_hom = round( ( ($baja_hom / $hom_mat) * 100), 2);

                if ($muj_mat == 0)
                    $porc_baja_muj = 0;
                else
                    $porc_baja_muj = round( ( ($baja_muj / $muj_mat) * 100), 2);

                if ($total_mat == 0)
                    $porc_baja_tot = 0;
                else
                    $porc_baja_tot = round( ( ($baja_tot / $total_mat) * 100), 2);


                // Tabla del reporte
                $tabla_bajas = array(

                        'carrera'              =>   $carrera,
                        'hom_mat'              =>   $hom_mat,
                        'muj_mat'              =>   $muj_mat,

                        'hom_egr'              =>   $hom_egr,
                        'muj_egr'              =>   $muj_egr,

                        'hom_reing'            =>   $hom_reing,
                        'muj_reing'            =>   $muj_reing

                ); 


                
                // imprime tabla
                print <<<EOF
                <tr id="trChico">
                    <td id="DetalleChico">$tabla_bajas[carrera]             </td>
EOF;
                    // escoder detalles adicionales del reporte
                    if ($swEsconde == 0) {

                        print <<<EOF
                        <td id="DetalleChico">$tabla_bajas[hom_mat]         </td>
                        <td id="DetalleChico">$tabla_bajas[muj_mat]         </td>
EOF;
                    }
                    print <<<EOF
                    <td id="DetalleChico">$total_mat                    </td>
EOF;
                    // escoder detalles adicionales del reporte
                    if ($swEsconde == 0) {
                        print <<<EOF
                        <td id="DetalleChico">$tabla_bajas[hom_egr]         </td>
                        <td id="DetalleChico">$tabla_bajas[muj_egr]         </td>
EOF;
                    }
                    print <<<EOF
                    <td id="DetalleChico">$total_egr                    </td>
EOF;

                    // escoder detalles adicionales del reporte
                    if ($swEsconde == 0) {
                        print <<<EOF
                        <td id="DetalleChico">$tabla_bajas[hom_reing]       </td>
                        <td id="DetalleChico">$tabla_bajas[muj_reing]       </td>
EOF;
                    }
                    print <<<EOF
                    <td id="DetalleChico">$total_reing                  </td>
EOF;

                    // escoder detalles adicionales del reporte
                    if ($swEsconde == 0) {
                        print <<<EOF
                        <td id="DetalleChico">$baja_hom                     </td>
                        <td id="DetalleChico">$baja_muj                     </td>
EOF;
                    }
                    print <<<EOF
                    <td id="DetalleChico">$baja_tot                     </td>
EOF;

                    // escoder detalles adicionales del reporte
                    if ($swEsconde == 0) {
                        print <<<EOF
                        <td id="DetalleChico">$porc_baja_hom                </td>
                        <td id="DetalleChico">$porc_baja_muj                </td>
EOF;
                    }
                    print <<<EOF
                    <td id="DetalleChico">$porc_baja_tot                </td>


                </tr>

EOF;
                //actualizar totales de la tabla
                $total_hom_mat      = $total_hom_mat     + $hom_mat;  
                $total_muj_mat      = $total_muj_mat     + $muj_mat;
                $total_total_mat    = $total_total_mat   + $total_mat;
                $total_hom_egr      = $total_hom_egr     + $hom_egr;  
                $total_muj_egr      = $total_muj_egr     + $muj_egr;  
                $total_total_egr    = $total_total_egr   + $total_egr;
                $total_hom_reing    = $total_hom_reing   + $hom_reing;  
                $total_muj_reing    = $total_muj_reing   + $muj_reing;  
                $total_total_reing  = $total_total_reing + $total_reing;
                $total_baja_hom     = $total_baja_hom    + $baja_hom;  
                $total_baja_muj     = $total_baja_muj    + $baja_muj;  
                $total_baja_tot     = $total_baja_tot    + $baja_tot;

                /*
                echo "<tr>";
                foreach($tabla_bajas as $indice => $valor)
	            {
	            	//echo "<td id=\"DetalleChico\"> $valor </td>";
	            }
                echo "</tr>";
                */
                
            } // While principal

            // calcular porcentaje de desersion

            if ($total_hom_mat != 0) 
                $porc_tot_baja_hom = round( (($total_baja_hom / $total_hom_mat) * 100), 2);

            if ($total_muj_mat != 0) 
                $porc_tot_baja_muj = round( (($total_baja_muj / $total_muj_mat) * 100), 2);

            if ($total_total_mat != 0) 
                $porc_tot_baja_tot = round( (($total_baja_tot / $total_total_mat) * 100), 2);


            // Imprmir Totales de tabla

            print <<<EOF
            <th id="subEncabezado">TOTALES                          </th>
EOF;

                
            if ($swEsconde == 0) {
                    print <<<EOF
                    <th id="TotalesChico">$total_hom_mat                </th>
                    <th id="TotalesChico">$total_muj_mat                </th>
EOF;
            }
            print <<<EOF
            <th id="TotalesChico">$total_total_mat              </th>
EOF;
                
            if ($swEsconde == 0) {
                    print <<<EOF
                    <th id="TotalesChico">$total_hom_egr                </th>
                    <th id="TotalesChico">$total_muj_egr                </th>
EOF;
            }
            print <<<EOF
            <th id="TotalesChico">$total_total_egr              </th>
EOF;
                
            if ($swEsconde == 0) {
                    print <<<EOF
                    <th id="TotalesChico">$total_hom_reing              </th>
                    <th id="TotalesChico">$total_muj_reing              </th>
EOF;
            }
            print <<<EOF
             <th id="TotalesChico">$total_total_reing            </th>
EOF;
                
            if ($swEsconde == 0) {
                    print <<<EOF
                    <th id="TotalesChico">$total_baja_hom                   </th>
                    <th id="TotalesChico">$total_baja_muj                   </th>
EOF;
            }
            print <<<EOF
            <th id="TotalesChico">$total_baja_tot                   </th>
EOF;
                
            if ($swEsconde == 0) {
                    print <<<EOF
                <th id="TotalesChico">$porc_tot_baja_hom                </th>
                <th id="TotalesChico">$porc_tot_baja_muj                </th>
EOF;
            }
            print <<<EOF
            <th id="TotalesChico">$porc_tot_baja_tot                </th>
EOF;

        }  //function 
        
    }  //class
?>