<?php
    class reprobado
    {
        function reporte1($BDSeleccionada, $tabla1, $tabla2, $db, $host, $user, $pwd, $swPerEsc, $swEsconde)
        {

            // definir CONSULTA DE REPROBADOS
            // Analizar si el reporte es por periodo escolar (ejem Ene-Jun 2017 a Ago-Dic 20018)

            //echo "swEsconde: $swEsconde </br>";

            if ($swPerEsc == "1") {

                $mes_bd_1  = substr($BDSeleccionada,0,8);
                $anio_bd_1 = substr($BDSeleccionada,8,4);

                if ($mes_bd_1 == 'ene_jun_'){
                    
                    $mes_bd_2  = 'ago_dic_';
                    $anio_bd_2 = $anio_bd_1 - 1;
                    $periodo2  = $mes_bd_2 . strval($anio_bd_2);

                    // variable para encabezado
                    $periodo_encabezado = $periodo2 . " - " . $BDSeleccionada;
                }
                else {
                    $mes_bd_2  = 'ene_jun_';
                    $anio_bd_2 = $anio_bd_1 + 1;
                    $periodo2  = $mes_bd_2 . strval($anio_bd_2);

                    // variable para encabezado
                    $periodo_encabezado = $BDSeleccionada . " - " . $periodo2;
                }

                $consulta1 = "SELECT * FROM $tabla1 WHERE (periodo = '$BDSeleccionada' or periodo = '$periodo2')";

            }

            else {
                $consulta1 = "SELECT * 
                FROM $tabla1 
                where (periodo = '$BDSeleccionada')";

                // variable para encabezado
                $periodo_encabezado = $BDSeleccionada;
            }

            $query1 = $consulta1;
            $result1 = $db->query($query1);
            //echo "$query1 </br>";
            //echo "registros: $result1->num_rows";

            //ENCABEZADOS DEL REPORTE
            print <<<EOF
            </br>
            <tr>
                <th id="subEncabezado" rowspan=2>LISTA DE CARRERAS          </th>

EOF;
                //Esconder detalles adicionales del reporte
                if ($swEsconde == 0)
                {
                        print <<<EOF
                        <!-- <th id="subEncabezado" colspan=2> 0 Repr.           </th> -->
                        <th id="subEncabezado" rowspan=2> ALUM. APROB.      </th>

                        <!--
                        <th id="subEncabezado" rowspan=2> 1 Mat             </th>
                        <th id="subEncabezado" rowspan=2> 2 Mat             </th>
                        <th id="subEncabezado" rowspan=2> 3 Mat             </th>
                        <th id="subEncabezado" rowspan=2> > 3 Mat           </th>
                        -->
                        <th id="subEncabezado" rowspan=2> ALUMN. REPR.     </th>

                        <!-- <th id="subEncabezado" colspan=2> Total             </th>  -->
                        <th id="subEncabezado" rowspan=2> MATRÍCULA         </th>
EOF;
                }

                echo"<th id=\"subEncabezado\" colspan=4> ÍNDICES DE APROB. Y REPR. &nbsp; (%)</th>";
                print <<<EOF

            </tr>

            <tr>
EOF;
                /*
                    if ($swEsconde == 0)
                    {
                        print <<<EOF
                        <th id="subEncabezado">Sin Ajustar             </th>
                        <th id="subEncabezado">Con Ajustes             </th>
                        <th id="subEncabezado">Sin Ajustar             </th>
                        <th id="subEncabezado">Con Ajustes             </th>
                        
EOF;
                    }
                */
                    print <<<EOF
                    <th id="subEncabezado">Alum Apr.                   </th>
                    <th id="subEncabezado">Alum Repr.                   </th>
                    <th id="subEncabezado">Creditos Apr.                    </th>
                    <th id="subEncabezado">Creditos Repr.                   </th>
            </tr>
EOF;

            // termina encabezado

            //ARMAR EL REPORTE

            // Inicializa Totales de la tabla
            $total_ninguna_rep          = 0;
            $total_ninguna_rep_2        = 0;
            $total_reprobadas_1         = 0;
            $total_reprobadas_2         = 0;     
            $total_reprobadas_3         = 0;         
            $total_reprobadas_4         = 0;
            $total_sinAjustar           = 0;
            $total_Ajustado             = 0;  
            $total_creidtos_cursados    = 0;
            $total_creditos_aprobados   = 0;
            $total_creditos_reprobados  = 0;


            while($row1 = $result1->fetch_assoc()) {

                //definir CONSULTA DE MATRICULA de cada carrera
                // Analizar si el reporte es por periodo escolar (ejem Ene-Jun 2017 a Ago-Dic 20018)

                $carrera = $row1[carrera];

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

                        // Evaluar si carreras son a distancia
                        if (($carrera == 'ING INDUSTRIAL DIST') || ($carrera == 'ING GESTION EMPR. DIST')) {

                                #incluir en consulta tambien carreas a distancia
                                if (($carrera == 'ING INDUSTRIAL DIST')){
                                    $carrera = 'ING INDUSTRIAL';
                                }
                                if ($carrera == 'ING GESTION EMPR. DIST') {
                                    $carrera = 'ING GESTION EMPR.';
                                }

                                $consulta2 = "SELECT sum(hom1+muj1+hom2+muj2+hom3+muj3+hom4+muj4+hom5+muj5+hom6+muj6+hom7+muj7+hom8+muj8+hom9+muj9+hom10+muj10+hom11+muj11+hom12+muj12+hom13+muj13+hom14+muj14+hom15+muj15+hom16+muj16+hom17+muj17+hom18+muj18+hom19+muj19+hom20+muj20) as mat
                                    FROM $tabla2 
                                    WHERE (carrera = '$carrera' and distancia = 'si' and (periodo = '$BDSeleccionada' or periodo = '$periodo2'))";
                        } // Fin carreras son a distancia

                        // Evaluar si carreras son vespertinas
                        elseif (($carrera == 'ING INDUSTRIAL VESP')){
                                
                                $carrera = 'ING INDUSTRIAL';

                                $consulta2 = "SELECT sum(hom1+muj1+hom2+muj2+hom3+muj3+hom4+muj4+hom5+muj5+hom6+muj6+hom7+muj7+hom8+muj8+hom9+muj9+hom10+muj10+hom11+muj11+hom12+muj12+hom13+muj13+hom14+muj14+hom15+muj15+hom16+muj16+hom17+muj17+hom18+muj18+hom19+muj19+hom20+muj20) as mat
                                    FROM $tabla2 
                                    WHERE (carrera = '$carrera' and vespertino = 'si' and (periodo = '$BDSeleccionada' or periodo = '$periodo2'))";
                        } // FIN carreras son vespertina

                        // consulta general (no distancia ni vespertinas)
                        else {
                                $consulta2 = "SELECT sum(hom1+muj1+hom2+muj2+hom3+muj3+hom4+muj4+hom5+muj5+hom6+muj6+hom7+muj7+hom8+muj8+hom9+muj9+hom10+muj10+hom11+muj11+hom12+muj12+hom13+muj13+hom14+muj14+hom15+muj15+hom16+muj16+hom17+muj17+hom18+muj18+hom19+muj19+hom20+muj20) as mat
                                    FROM $tabla2 
                                    WHERE (carrera = '$carrera' and distancia <> 'si' and vespertino <> 'si' and (periodo = '$BDSeleccionada' or periodo = '$periodo2'))";
                        }

                }  // FIN de Evaluar si reporte es por ciclo escolar

                // condicional si reporte es por semestre
                else {
                    
                    // Evaluar si carreras son a distancia 
                    if (($carrera == 'ING INDUSTRIAL DIST') || ($carrera == 'ING GESTION EMPR. DIST')) {

                        #incluir en consulta tambien carreas a distancia
                        if ($carrera == 'ING INDUSTRIAL DIST'){
                            $carrera = 'ING INDUSTRIAL';
                        }
                        if ($carrera == 'ING GESTION EMPR. DIST') {
                            $carrera = 'ING GESTION EMPR.';
                        }
                        $consulta2 = "SELECT sum(hom1+muj1+hom2+muj2+hom3+muj3+hom4+muj4+hom5+muj5+hom6+muj6+hom7+muj7+hom8+muj8+hom9+muj9+hom10+muj10+hom11+muj11+hom12+muj12+hom13+muj13+hom14+muj14+hom15+muj15+hom16+muj16+hom17+muj17+hom18+muj18+hom19+muj19+hom20+muj20) as mat
                            FROM $tabla2 
                            WHERE (carrera = '$carrera' and distancia = 'si' and (periodo = '$BDSeleccionada'))";
                    } // Fin carreras son a distancia

                    // Evaluar si carreras son vespertinas
                    elseif (($carrera == 'ING INDUSTRIAL VESP')){
                        
                        $carrera = 'ING INDUSTRIAL';
                        $consulta2 = "SELECT sum(hom1+muj1+hom2+muj2+hom3+muj3+hom4+muj4+hom5+muj5+hom6+muj6+hom7+muj7+hom8+muj8+hom9+muj9+hom10+muj10+hom11+muj11+hom12+muj12+hom13+muj13+hom14+muj14+hom15+muj15+hom16+muj16+hom17+muj17+hom18+muj18+hom19+muj19+hom20+muj20) as mat
                            FROM $tabla2 
                            WHERE (carrera = '$carrera' and vespertino = 'si' and (periodo = '$BDSeleccionada'))";
                    } // FIN carreras son vespertina

                    // Consulta general (no distancia ni vespertina)
                    else {
                        
                        $consulta2 = "SELECT sum(hom1+muj1+hom2+muj2+hom3+muj3+hom4+muj4+hom5+muj5+hom6+muj6+hom7+muj7+hom8+muj8+hom9+muj9+hom10+muj10+hom11+muj11+hom12+muj12+hom13+muj13+hom14+muj14+hom15+muj15+hom16+muj16+hom17+muj17+hom18+muj18+hom19+muj19+hom20+muj20) as mat
                            FROM $tabla2
                            WHERE (carrera = '$carrera' and distancia <> 'si' and vespertino <> 'si' and periodo = '$BDSeleccionada')";
                    }

                } // FIN de Evaluar si reporte es por semestre
                // ---------------------------------------------------------------------------------
            
                $query2 = $consulta2;
                $result2 = $db->query($query2);

                $row2 = $result2->fetch_assoc();

                // Tabla del reporte
                $reprobados = array(
                    
                        carrera              =>   $row1[carrera],
                        ninguna_rep          =>   $row1[ninguna_rep],
                        reprobadas_1         =>   $row1[reprobadas_1],
                        reprobadas_2         =>   $row1[reprobadas_2],
                        reprobadas_3         =>   $row1[reprobadas_3],
                        reprobadas_4         =>   $row1[reprobadas_4],
                        creditos_cursados    =>   $row1[creditos_cursados],
                        creditos_aprobados   =>   $row1[creditos_aprobados],
                        periodo              =>   $row1[periodo],
                        matricula            =>   $row2[mat]

                );    

                // Cálculos
                $suma_reprobados     =  $reprobados[reprobadas_1] + $reprobados[reprobadas_2] + $reprobados[reprobadas_3] + $reprobados[reprobadas_4];
                $suma_sinAjustar     =  $suma_reprobados + $reprobados[ninguna_rep];

                $ajuste_aprobados    =  ($reprobados[matricula] - $suma_sinAjustar) + $reprobados[ninguna_rep];
                $suma_Ajustado       =  $suma_reprobados + $ajuste_aprobados;

                $creditos_reprobados =  $reprobados[creditos_cursados] - $reprobados[creditos_aprobados];

                if ($suma_Ajustado == 0){
                    $porcent_aprobados   =  0;
                    $porcent_reprobados  =  0;
                }
                else {
                    $porcent_aprobados   =  round ( ($ajuste_aprobados / $suma_Ajustado) * 100, 2 );
                    $porcent_reprobados  =  round ( ($suma_reprobados  / $suma_Ajustado) * 100, 2 );
                }

                if ($reprobados[creditos_cursados] == 0){
                    $porcent_creditos_aprobados   =  0;
                    $porcent_creditos_reprobados  =  0;
                }
                else {
                    $porcent_creditos_aprobados   =  round ( ($reprobados[creditos_aprobados] / $reprobados[creditos_cursados]) * 100, 2 );
                    $porcent_creditos_reprobados  =  round ( ($creditos_reprobados / $reprobados[creditos_cursados]) * 100, 2 );
                }

                // FIN Cálculos

                
                // imprime tabla
                print <<<EOF
                <tr id="trChico">
                    <td id="DetalleChico">$reprobados[carrera]              </td>
EOF;
                    // escoder detalles adicionales del reporte
                    if ($swEsconde == 0) {
                        print <<<EOF
                        <!-- <td id="DetalleChico">$reprobados[ninguna_rep]      </td> -->
                        <td id="DetalleChico">$ajuste_aprobados             </td>

                        <!--
                        <td id="DetalleChico">$reprobados[reprobadas_1]     </td>
                        <td id="DetalleChico">$reprobados[reprobadas_2]     </td>
                        <td id="DetalleChico">$reprobados[reprobadas_3]     </td>
                        <td id="DetalleChico">$reprobados[reprobadas_4]     </td>
                        -->
                        <td id="DetalleChico">$suma_reprobados              </td>

                        <!-- <td id="DetalleChico">$suma_sinAjustar              </td> -->
                        <td id="DetalleChico">$suma_Ajustado                </td>
EOF;
                    }
                    print <<<EOF

                    <td id="DetalleChico">$porcent_aprobados                </td>
                    <td id="DetalleChico">$porcent_reprobados               </td>
                    <td id="DetalleChico">$porcent_creditos_aprobados       </td>
                    <td id="DetalleChico">$porcent_creditos_reprobados      </td>

                </tr>

EOF;
                //actualizar totales de la tabla
                $total_ninguna_rep          =   $total_ninguna_rep          +  $reprobados[ninguna_rep];
                $total_ninguna_rep2         =   $total_ninguna_rep2         +  $ajuste_aprobados;
                $total_reprobadas_1         =   $total_reprobadas_1         +  $reprobados[reprobadas_1];
                $total_reprobadas_2         =   $total_reprobadas_2         +  $reprobados[reprobadas_2];
                $total_reprobadas_3         =   $total_reprobadas_3         +  $reprobados[reprobadas_3];    
                $total_reprobadas_4         =   $total_reprobadas_4         +  $reprobados[reprobadas_4];
                $total_sinAjustar           =   $total_sinAjustar           +  $suma_sinAjustar;
                $total_Ajustado             =   $total_Ajustado             +  $suma_Ajustado;
                $total_creditos_aprobados   =   $total_creditos_aprobados   +  $reprobados[creditos_aprobados];
                $total_creditos_reprobados  =   $total_creditos_reprobados  +  $creditos_reprobados;

                /*
                echo "<tr>";
                foreach($reprobados as $indice => $valor)
	            {
	            	//echo "<td id=\"DetalleChico\"> $valor </td>";
	            }
                echo "</tr>";
                */
                
            } // While principal

            // Imprmir Totales de tabla

            $total_reprobados       = $total_reprobadas_1 + $total_reprobadas_2 + $total_reprobadas_3 + $total_reprobadas_4;
            $porcentaje_aprobados   = round( ( $total_ninguna_rep2  / $total_Ajustado) * 100, 2);
            $porcentaje_reprobados  = round(( $total_reprobados / $total_Ajustado) * 100, 2);
            $porcentaje_creditos_aprobados  =  round (($total_creditos_aprobados  / ($total_creditos_aprobados + $total_creditos_reprobados) * 100), 2);
            $porcentaje_creditos_reprobados =  round (($total_creditos_reprobados / ($total_creditos_aprobados + $total_creditos_reprobados) * 100), 2);

            print <<<EOF
            <th id="subEncabezado">TOTALES                          </th>
EOF;

            // escoder detalles adicionales del reporte
            if ($swEsconde == 0) {
                print <<<EOF
                <!-- <th id="TotalesChico">$total_ninguna_rep            </th>  -->
                <th id="TotalesChico">$total_ninguna_rep2           </th>

                <!--
                <th id="TotalesChico">$total_reprobadas_1           </th>
                <th id="TotalesChico">$total_reprobadas_2           </th>
                <th id="TotalesChico">$total_reprobadas_3           </th>
                <th id="TotalesChico">$total_reprobadas_4           </th>
                -->
                <th id="TotalesChico">$total_reprobados             </th>

                <!-- <th id="TotalesChico">$total_sinAjustar             </th>  -->
                <th id="TotalesChico">$total_Ajustado               </th>
EOF;
            }
            print <<<EOF
            <th id="TotalesChico">$porcentaje_aprobados             </th>
            <th id="TotalesChico">$porcentaje_reprobados            </th>
            <th id="TotalesChico">$porcentaje_creditos_aprobados    </th>
            <th id="TotalesChico">$porcentaje_creditos_reprobados   </th>
EOF;

        }  //function 
        
    }  //class
?>