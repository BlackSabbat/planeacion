<?php
    class matricula
    {
        // matricula por carrera y por semestre
        function reporte1($BDSeleccionada, $tabla, $tipo, $semestre, $db, $host, $user, $pwd, $swPerEsc){

            // Reingreso
            if ($semestre == "reingreso"){

                // Analizar si el reporte es por ciclo escolar (ejem Ene-Jun 2017 a Ago-Dic 20018)
                if ($swPerEsc == "1") {
                    $mes_bd_1  = substr($BDSeleccionada,0,8);
                    $anio_bd_1 = substr($BDSeleccionada,8,4);

                    if ($mes_bd_1 == 'ene_jun_'){  
                        $mes_bd_2  = 'ago_dic_';
                        $anio_bd_2 = $anio_bd_1 - 1;
                        $periodo2  = $mes_bd_2 . strval($anio_bd_2); 
                    }

                    else {
                        $mes_bd_2  = 'ene_jun_';
                        $anio_bd_2 = $anio_bd_1 + 1;
                        $periodo2  = $mes_bd_2 . strval($anio_bd_2);
                    }
                
                //Consulta  
                $consulta = "SELECT carrera, abierta, distancia, vespertino, 
                            sum(hom16) as hom16,  sum(muj16) as muj16,
                            sum(hom17) as hom17,  sum(muj17) as muj17,
                            sum(hom18) as hom18,  sum(muj18) as muj18,
                            sum(hom19) as hom19,  sum(muj19) as muj19,
                            sum(hom20) as hom20,  sum(muj20) as muj20,
                            sum(hom21) as hom21,  sum(muj21) as muj21,
                            sum(hom22) as hom22,  sum(muj22) as muj22,
                            sum(hom23) as hom23,  sum(muj23) as muj23,
                            sum(hom24) as hom24,  sum(muj24) as muj24,
                            sum(hom25) as hom25,  sum(muj25) as muj25,
                            sum(hom26) as hom26,  sum(muj26) as muj26,
                            sum(hom27) as hom27,  sum(muj27) as muj27,
                            sum(hom28) as hom28,  sum(muj28) as muj28,
                            sum(hom29) as hom29,  sum(muj29) as muj29,
                            sum(hom30) as hom30,  sum(muj30) as muj30,
                            sum(hom31) as hom31,  sum(muj31) as muj31,
                            sum(hom32) as hom32,  sum(muj32) as muj32,
                            sum(hom33) as hom33,  sum(muj33) as muj33,
                            sum(hom34) as hom34,  sum(muj34) as muj34,
                            sum(hom35) as hom35,  sum(muj35) as muj35,
                            sum(hom36) as hom36,  sum(muj36) as muj36,
                            sum(hom37) as hom37,  sum(muj37) as muj37,
                            sum(hom38) as hom38,  sum(muj38) as muj38,
                            sum(hom39) as hom39,  sum(muj39) as muj39

                            FROM $tabla 
                            WHERE (periodo = '$BDSeleccionada' or periodo = '$periodo2') and tipo = '$tipo' and semestre != 'sem01'
                            GROUP BY carrera, abierta, distancia, vespertino";
                } // FIN validacion si es por ciclo escolar
                
                // Reporte es por Semestre
                else {

                    // Consulta
                    $consulta = "SELECT carrera, abierta, distancia, vespertino, 
                            sum(hom16) as hom16,  sum(muj16) as muj16,
                            sum(hom17) as hom17,  sum(muj17) as muj17,
                            sum(hom18) as hom18,  sum(muj18) as muj18,
                            sum(hom19) as hom19,  sum(muj19) as muj19,
                            sum(hom20) as hom20,  sum(muj20) as muj20,
                            sum(hom21) as hom21,  sum(muj21) as muj21,
                            sum(hom22) as hom22,  sum(muj22) as muj22,
                            sum(hom23) as hom23,  sum(muj23) as muj23,
                            sum(hom24) as hom24,  sum(muj24) as muj24,
                            sum(hom25) as hom25,  sum(muj25) as muj25,
                            sum(hom26) as hom26,  sum(muj26) as muj26,
                            sum(hom27) as hom27,  sum(muj27) as muj27,
                            sum(hom28) as hom28,  sum(muj28) as muj28,
                            sum(hom29) as hom29,  sum(muj29) as muj29,
                            sum(hom30) as hom30,  sum(muj30) as muj30,
                            sum(hom31) as hom31,  sum(muj31) as muj31,
                            sum(hom32) as hom32,  sum(muj32) as muj32,
                            sum(hom33) as hom33,  sum(muj33) as muj33,
                            sum(hom34) as hom34,  sum(muj34) as muj34,
                            sum(hom35) as hom35,  sum(muj35) as muj35,
                            sum(hom36) as hom36,  sum(muj36) as muj36,
                            sum(hom37) as hom37,  sum(muj37) as muj37,
                            sum(hom38) as hom38,  sum(muj38) as muj38,
                            sum(hom39) as hom39,  sum(muj39) as muj39

                            FROM $tabla 
                            WHERE periodo = '$BDSeleccionada' and tipo = '$tipo' and semestre != 'sem01'
                            GROUP BY carrera, abierta, distancia, vespertino";

                }  // FIN analisis si reporte es por periodo escolar o por semestre

            } // FIN Reingreso

            // Matricula completa
            elseif ($semestre == "sem todos"){

                // Analizar si el reporte es por ciclo escolar (ejem Ene-Jun 2017 a Ago-Dic 20018)
                if ($swPerEsc == "1") {
                    $mes_bd_1  = substr($BDSeleccionada,0,8);
                    $anio_bd_1 = substr($BDSeleccionada,8,4);

                    if ($mes_bd_1 == 'ene_jun_'){  
                        $mes_bd_2  = 'ago_dic_';
                        $anio_bd_2 = $anio_bd_1 - 1;
                        $periodo2  = $mes_bd_2 . strval($anio_bd_2); 
                    }

                    else {
                        $mes_bd_2  = 'ene_jun_';
                        $anio_bd_2 = $anio_bd_1 + 1;
                        $periodo2  = $mes_bd_2 . strval($anio_bd_2);
                    }

                    //Consulta
                    $consulta = "SELECT carrera, abierta, distancia, vespertino, 
                            sum(hom16) as hom16,  sum(muj16) as muj16,
                            sum(hom17) as hom17,  sum(muj17) as muj17,
                            sum(hom18) as hom18,  sum(muj18) as muj18,
                            sum(hom19) as hom19,  sum(muj19) as muj19,
                            sum(hom20) as hom20,  sum(muj20) as muj20,
                            sum(hom21) as hom21,  sum(muj21) as muj21,
                            sum(hom22) as hom22,  sum(muj22) as muj22,
                            sum(hom23) as hom23,  sum(muj23) as muj23,
                            sum(hom24) as hom24,  sum(muj24) as muj24,
                            sum(hom25) as hom25,  sum(muj25) as muj25,
                            sum(hom26) as hom26,  sum(muj26) as muj26,
                            sum(hom27) as hom27,  sum(muj27) as muj27,
                            sum(hom28) as hom28,  sum(muj28) as muj28,
                            sum(hom29) as hom29,  sum(muj29) as muj29,
                            sum(hom30) as hom30,  sum(muj30) as muj30,
                            sum(hom31) as hom31,  sum(muj31) as muj31,
                            sum(hom32) as hom32,  sum(muj32) as muj32,
                            sum(hom33) as hom33,  sum(muj33) as muj33,
                            sum(hom34) as hom34,  sum(muj34) as muj34,
                            sum(hom35) as hom35,  sum(muj35) as muj35,
                            sum(hom36) as hom36,  sum(muj36) as muj36,
                            sum(hom37) as hom37,  sum(muj37) as muj37,
                            sum(hom38) as hom38,  sum(muj38) as muj38,
                            sum(hom39) as hom39,  sum(muj39) as muj39

                            FROM $tabla 
                            WHERE (periodo = '$BDSeleccionada' or periodo = '$periodo2') and tipo = '$tipo'
                            GROUP BY carrera, abierta, distancia, vespertino";

                } // FIN validacion si es por ciclo escolar

                // Reporte es por Semestre
                else {
                
                    //Consulta
                    $consulta = "SELECT carrera, abierta, distancia, vespertino, 
                            sum(hom16) as hom16,  sum(muj16) as muj16,
                            sum(hom17) as hom17,  sum(muj17) as muj17,
                            sum(hom18) as hom18,  sum(muj18) as muj18,
                            sum(hom19) as hom19,  sum(muj19) as muj19,
                            sum(hom20) as hom20,  sum(muj20) as muj20,
                            sum(hom21) as hom21,  sum(muj21) as muj21,
                            sum(hom22) as hom22,  sum(muj22) as muj22,
                            sum(hom23) as hom23,  sum(muj23) as muj23,
                            sum(hom24) as hom24,  sum(muj24) as muj24,
                            sum(hom25) as hom25,  sum(muj25) as muj25,
                            sum(hom26) as hom26,  sum(muj26) as muj26,
                            sum(hom27) as hom27,  sum(muj27) as muj27,
                            sum(hom28) as hom28,  sum(muj28) as muj28,
                            sum(hom29) as hom29,  sum(muj29) as muj29,
                            sum(hom30) as hom30,  sum(muj30) as muj30,
                            sum(hom31) as hom31,  sum(muj31) as muj31,
                            sum(hom32) as hom32,  sum(muj32) as muj32,
                            sum(hom33) as hom33,  sum(muj33) as muj33,
                            sum(hom34) as hom34,  sum(muj34) as muj34,
                            sum(hom35) as hom35,  sum(muj35) as muj35,
                            sum(hom36) as hom36,  sum(muj36) as muj36,
                            sum(hom37) as hom37,  sum(muj37) as muj37,
                            sum(hom38) as hom38,  sum(muj38) as muj38,
                            sum(hom39) as hom39,  sum(muj39) as muj39

                            FROM $tabla 
                            WHERE periodo = '$BDSeleccionada' and tipo = '$tipo'
                            GROUP BY carrera, abierta, distancia, vespertino";
                } // FIN analisis si reporte es por periodo escolar o por semestre
            } // FIN Matricula completa

            // Reporte por Semestre en Especfico
            else  {
                
                // Analizar si el reporte es por ciclo escolar (ejem Ene-Jun 2017 a Ago-Dic 20018)
                if ($swPerEsc == "1") {
                    $mes_bd_1  = substr($BDSeleccionada,0,8);
                    $anio_bd_1 = substr($BDSeleccionada,8,4);

                    if ($mes_bd_1 == 'ene_jun_'){  
                        $mes_bd_2  = 'ago_dic_';
                        $anio_bd_2 = $anio_bd_1 - 1;
                        $periodo2  = $mes_bd_2 . strval($anio_bd_2); 
                    }

                    else {
                        $mes_bd_2  = 'ene_jun_';
                        $anio_bd_2 = $anio_bd_1 + 1;
                        $periodo2  = $mes_bd_2 . strval($anio_bd_2);
                    }

                    //Consulta
                    $consulta = "SELECT carrera, abierta, distancia, vespertino, 
                            sum(hom16) as hom16,  sum(muj16) as muj16,
                            sum(hom17) as hom17,  sum(muj17) as muj17,
                            sum(hom18) as hom18,  sum(muj18) as muj18,
                            sum(hom19) as hom19,  sum(muj19) as muj19,
                            sum(hom20) as hom20,  sum(muj20) as muj20,
                            sum(hom21) as hom21,  sum(muj21) as muj21,
                            sum(hom22) as hom22,  sum(muj22) as muj22,
                            sum(hom23) as hom23,  sum(muj23) as muj23,
                            sum(hom24) as hom24,  sum(muj24) as muj24,
                            sum(hom25) as hom25,  sum(muj25) as muj25,
                            sum(hom26) as hom26,  sum(muj26) as muj26,
                            sum(hom27) as hom27,  sum(muj27) as muj27,
                            sum(hom28) as hom28,  sum(muj28) as muj28,
                            sum(hom29) as hom29,  sum(muj29) as muj29,
                            sum(hom30) as hom30,  sum(muj30) as muj30,
                            sum(hom31) as hom31,  sum(muj31) as muj31,
                            sum(hom32) as hom32,  sum(muj32) as muj32,
                            sum(hom33) as hom33,  sum(muj33) as muj33,
                            sum(hom34) as hom34,  sum(muj34) as muj34,
                            sum(hom35) as hom35,  sum(muj35) as muj35,
                            sum(hom36) as hom36,  sum(muj36) as muj36,
                            sum(hom37) as hom37,  sum(muj37) as muj37,
                            sum(hom38) as hom38,  sum(muj38) as muj38,
                            sum(hom39) as hom39,  sum(muj39) as muj39

                            FROM $tabla 
                            WHERE (periodo = '$BDSeleccionada' or periodo = '$periodo2') and tipo = '$tipo' and semestre = '$semestre'
                            GROUP BY carrera, abierta, distancia, vespertino";
                } // FIN validacion si es por ciclo escolar
                
                // Reporte es por Semestre
                else {

                    //Consulta
                    $consulta = "SELECT carrera, abierta, distancia, vespertino, 
                            sum(hom16) as hom16,  sum(muj16) as muj16,
                            sum(hom17) as hom17,  sum(muj17) as muj17,
                            sum(hom18) as hom18,  sum(muj18) as muj18,
                            sum(hom19) as hom19,  sum(muj19) as muj19,
                            sum(hom20) as hom20,  sum(muj20) as muj20,
                            sum(hom21) as hom21,  sum(muj21) as muj21,
                            sum(hom22) as hom22,  sum(muj22) as muj22,
                            sum(hom23) as hom23,  sum(muj23) as muj23,
                            sum(hom24) as hom24,  sum(muj24) as muj24,
                            sum(hom25) as hom25,  sum(muj25) as muj25,
                            sum(hom26) as hom26,  sum(muj26) as muj26,
                            sum(hom27) as hom27,  sum(muj27) as muj27,
                            sum(hom28) as hom28,  sum(muj28) as muj28,
                            sum(hom29) as hom29,  sum(muj29) as muj29,
                            sum(hom30) as hom30,  sum(muj30) as muj30,
                            sum(hom31) as hom31,  sum(muj31) as muj31,
                            sum(hom32) as hom32,  sum(muj32) as muj32,
                            sum(hom33) as hom33,  sum(muj33) as muj33,
                            sum(hom34) as hom34,  sum(muj34) as muj34,
                            sum(hom35) as hom35,  sum(muj35) as muj35,
                            sum(hom36) as hom36,  sum(muj36) as muj36,
                            sum(hom37) as hom37,  sum(muj37) as muj37,
                            sum(hom38) as hom38,  sum(muj38) as muj38,
                            sum(hom39) as hom39,  sum(muj39) as muj39

                            FROM $tabla 
                            WHERE periodo = '$BDSeleccionada' and tipo = '$tipo' and semestre = '$semestre'
                            GROUP BY carrera, abierta, distancia, vespertino";
                }  // FIN analisis si reporte es por periodo escolar o por semestre

            }   // FIN Semestre en especifio

            $query = $consulta;
            $result = $db->query($query);
            //echo "consulta: $query </br>";
            //echo "registros: $result->num_rows"; 
            
            # Encabezado
            print <<<EOF
            </br>
            <tr>
                <th id="subEncabezado">Carrera     </th>
                <th id="subEncabezado">Edad        </th>
                <th id="subEncabezado">16          </th>
                <th id="subEncabezado">17          </th>
                <th id="subEncabezado">18          </th>
                <th id="subEncabezado">19          </th>
                <th id="subEncabezado">20          </th>
                <th id="subEncabezado">21          </th>
                <th id="subEncabezado">22          </th>
                <th id="subEncabezado">23          </th>
                <th id="subEncabezado">24          </th>
                <th id="subEncabezado">25          </th>
                <th id="subEncabezado">26          </th>
                <th id="subEncabezado">27          </th>
                <th id="subEncabezado">28          </th>
                <th id="subEncabezado">29          </th>
                <th id="subEncabezado">30          </th>
                <th id="subEncabezado">31          </th>
                <th id="subEncabezado">32          </th>
                <th id="subEncabezado">33          </th>
                <th id="subEncabezado">34          </th>
                <th id="subEncabezado">35          </th>
                <th id="subEncabezado">36          </th>
                <th id="subEncabezado">37          </th>
                <th id="subEncabezado">38          </th>
                <th id="subEncabezado">>38         </th>
                <th id="subEncabezado">Total       </th>  
            </tr>
EOF;

            # Armar el reporte

            // inicializar totales de la tabla
            $total_hom_16 = 0;    $total_hom_17 = 0;    $total_hom_18 = 0;
            $total_hom_19 = 0;    $total_hom_20 = 0;    $total_hom_21 = 0;
            $total_hom_22 = 0;    $total_hom_23 = 0;    $total_hom_24 = 0;
            $total_hom_25 = 0;    $total_hom_26 = 0;    $total_hom_27 = 0;
            $total_hom_28 = 0;    $total_hom_29 = 0;    $total_hom_30 = 0;
            $total_hom_31 = 0;    $total_hom_32 = 0;    $total_hom_33 = 0;
            $total_hom_34 = 0;    $total_hom_35 = 0;    $total_hom_36 = 0;
            $total_hom_37 = 0;    $total_hom_38 = 0;    $total_hom_39 = 0;

            $total_muj_16 = 0;    $total_muj_17 = 0;    $total_muj_18 = 0;
            $total_muj_19 = 0;    $total_muj_20 = 0;    $total_muj_21 = 0;
            $total_muj_22 = 0;    $total_muj_23 = 0;    $total_muj_24 = 0;
            $total_muj_25 = 0;    $total_muj_26 = 0;    $total_muj_27 = 0;
            $total_muj_28 = 0;    $total_muj_29 = 0;    $total_muj_30 = 0;
            $total_muj_31 = 0;    $total_muj_32 = 0;    $total_muj_33 = 0;
            $total_muj_34 = 0;    $total_muj_35 = 0;    $total_muj_36 = 0;
            $total_muj_37 = 0;    $total_muj_38 = 0;    $total_muj_39 = 0;

            $total_gran_16 = 0;   $total_gran_17 = 0;   $total_gran_18 = 0;
            $total_gran_19 = 0;   $total_gran_20 = 0;   $total_gran_21 = 0;
            $total_gran_22 = 0;   $total_gran_23 = 0;   $total_gran_24 = 0;
            $total_gran_25 = 0;   $total_gran_26 = 0;   $total_gran_27 = 0;
            $total_gran_28 = 0;   $total_gran_29 = 0;   $total_gran_30 = 0;
            $total_gran_31 = 0;   $total_gran_32 = 0;   $total_gran_33 = 0;
            $total_gran_34 = 0;   $total_gran_35 = 0;   $total_gran_36 = 0;
            $total_gran_37 = 0;   $total_gran_38 = 0;   $total_gran_39 = 0;

            while( $row = $result->fetch_assoc()) {
              
                //echo "carrera:$row[carrera]</br>"; 

                if ($row[hom16] != null)
                {

                    $rubro = $row[carrera];

                    if ($swAbierta == 'si'){
                        $rubro = "$rubro  abierta";
                    }
                    if ($swVespertino == 'si'){
                        $rubro = "$rubro  vesp";
                    }
                    if ($swDistancia == 'si'){
                        $rubro = "$rubro  dist.";
                    }

                    //CALCULOS EN EL REPORTE

                    //detalle de totales (hombres + mujeres)
                    $total16 = $row[hom16] + $row[muj16];
                    $total17 = $row[hom17] + $row[muj17];
                    $total18 = $row[hom18] + $row[muj18];
                    $total19 = $row[hom19] + $row[muj19];
                    $total20 = $row[hom20] + $row[muj20];
                    $total21 = $row[hom21] + $row[muj21];
                    $total22 = $row[hom22] + $row[muj22];
                    $total23 = $row[hom23] + $row[muj23];
                    $total24 = $row[hom24] + $row[muj24];
                    $total25 = $row[hom25] + $row[muj25];
                    $total26 = $row[hom26] + $row[muj26];
                    $total27 = $row[hom27] + $row[muj27];
                    $total28 = $row[hom28] + $row[muj28];
                    $total29 = $row[hom29] + $row[muj29];
                    $total30 = $row[hom30] + $row[muj30];
                    $total31 = $row[hom31] + $row[muj31];
                    $total32 = $row[hom32] + $row[muj32];
                    $total33 = $row[hom33] + $row[muj33];
                    $total34 = $row[hom34] + $row[muj34];
                    $total35 = $row[hom35] + $row[muj35]; 
                    $total36 = $row[hom36] + $row[muj36];
                    $total37 = $row[hom37] + $row[muj37];
                    $total38 = $row[hom38] + $row[muj38];
                    $total39 = $row[hom39] + $row[muj39];

                    //totales finales en el reporte (hombres, mujeres y hombres + mujeres)

                    $hom_carrera = $row[hom16] + $row[hom17] + $row[hom18] + $row[hom19] + $row[hom20] + $row[hom21] + $row[hom22] + $row[hom23] + $row[hom24] + $row[hom25] + $row[hom26] + $row[hom27] + $row[hom28] + $row[hom29] + $row[hom30] + $row[hom31] + $row[hom32] + $row[hom33] + $row[hom34] + $row[hom35] + $row[hom36] + $row[hom37] + $row[hom38] + $row[hom39];

                    $muj_carrera = $row[muj16] + $row[muj17] + $row[muj18] + $row[muj19] + $row[muj20] + $row[muj21] + $row[muj22] + $row[muj23] + $row[muj24] + $row[muj25] + $row[muj26] + $row[muj27] + $row[muj28] + $row[muj29] + $row[muj30] + $row[muj31] + $row[muj32] + $row[muj33] + $row[muj34] + $row[muj35] + $row[muj37] + $row[muj37] + $row[muj38] + $row[muj39];

                    $gran_carrera = $total16 + $total17 + $total18 + $total19 + $total20 + $total21 + $total22 + $total23 + $total24 + $total25 + $total26 + $total27 + $total28 + $total29 + $total30 + $total31 + $total32 + $total33 + $total34 + $total35 + $total36 + $total37 + $total38 + $total39;

                    //IMPRIMIR DETALLE DEL REPORTE
                    print <<<EOF
                    <tr>
                        <td id="SubEncabezadoChico" rowspan=3>$rubro        </td>
                        <td id="DetalleMasChico" >Hom                       </td>
                        <td id="DetalleChico" >$row[hom16]                  </td>
                        <td id="DetalleChico" >$row[hom17]                  </td>
                        <td id="DetalleChico" >$row[hom18]                  </td>
                        <td id="DetalleChico" >$row[hom19]                  </td>
                        <td id="DetalleChico" >$row[hom20]                  </td>
                        <td id="DetalleChico" >$row[hom21]                  </td>
                        <td id="DetalleChico" >$row[hom22]                  </td>
                        <td id="DetalleChico" >$row[hom23]                  </td>
                        <td id="DetalleChico" >$row[hom24]                  </td>
                        <td id="DetalleChico" >$row[hom25]                  </td>
                        <td id="DetalleChico" >$row[hom26]                  </td>
                        <td id="DetalleChico" >$row[hom27]                  </td>
                        <td id="DetalleChico" >$row[hom28]                  </td>
                        <td id="DetalleChico" >$row[hom29]                  </td>
                        <td id="DetalleChico" >$row[hom30]                  </td>
                        <td id="DetalleChico" >$row[hom31]                  </td>
                        <td id="DetalleChico" >$row[hom32]                  </td>
                        <td id="DetalleChico" >$row[hom33]                  </td>
                        <td id="DetalleChico" >$row[hom34]                  </td>
                        <td id="DetalleChico" >$row[hom35]                  </td>
                        <td id="DetalleChico" >$row[hom36]                  </td>
                        <td id="DetalleChico" >$row[hom37]                  </td>
                        <td id="DetalleChico" >$row[hom38]                  </td>
                        <td id="DetalleChico" >$row[hom39]                  </td>
                        <td id="DetalleChico" >$hom_carrera                 </td>
                    </tr>
                    <tr>
                        <td id="DetalleMasChico" >Muj                       </td>
                        <td id="DetalleChico" >$row[muj16]                  </td>
                        <td id="DetalleChico" >$row[muj17]                  </td>
                        <td id="DetalleChico" >$row[muj18]                  </td>
                        <td id="DetalleChico" >$row[muj19]                  </td>
                        <td id="DetalleChico" >$row[muj20]                  </td>
                        <td id="DetalleChico" >$row[muj21]                  </td>
                        <td id="DetalleChico" >$row[muj22]                  </td>
                        <td id="DetalleChico" >$row[muj23]                  </td>
                        <td id="DetalleChico" >$row[muj24]                  </td>
                        <td id="DetalleChico" >$row[muj25]                  </td>
                        <td id="DetalleChico" >$row[muj26]                  </td>
                        <td id="DetalleChico" >$row[muj27]                  </td>
                        <td id="DetalleChico" >$row[muj28]                  </td>
                        <td id="DetalleChico" >$row[muj29]                  </td>
                        <td id="DetalleChico" >$row[muj30]                  </td>
                        <td id="DetalleChico" >$row[muj31]                  </td>
                        <td id="DetalleChico" >$row[muj32]                  </td>
                        <td id="DetalleChico" >$row[muj33]                  </td>
                        <td id="DetalleChico" >$row[muj34]                  </td>
                        <td id="DetalleChico" >$row[muj35]                  </td>
                        <td id="DetalleChico" >$row[muj36]                  </td>
                        <td id="DetalleChico" >$row[muj37]                  </td>
                        <td id="DetalleChico" >$row[muj38]                  </td>
                        <td id="DetalleChico" >$row[muj39]                  </td>
                        <td id="DetalleChico" >$muj_carrera                 </td>
                    </tr>
                    <tr>
                        <td id="DetalleMasChico">Total                      </td>
                        <th id="DetalleChicoTotal" >$total16                </th>
                        <th id="DetalleChicoTotal" >$total17                </th>
                        <th id="DetalleChicoTotal" >$total18                </th>
                        <th id="DetalleChicoTotal" >$total19                </th>
                        <th id="DetalleChicoTotal" >$total20                </th>
                        <th id="DetalleChicoTotal" >$total21                </th>
                        <th id="DetalleChicoTotal" >$total22                </th>
                        <th id="DetalleChicoTotal" >$total23                </th>
                        <th id="DetalleChicoTotal" >$total24                </th>
                        <th id="DetalleChicoTotal" >$total25                </th>
                        <th id="DetalleChicoTotal" >$total26                </th>
                        <th id="DetalleChicoTotal" >$total27                </th>
                        <th id="DetalleChicoTotal" >$total28                </th>
                        <th id="DetalleChicoTotal" >$total29                </th>
                        <th id="DetalleChicoTotal" >$total30                </th>
                        <th id="DetalleChicoTotal" >$total31                </th>
                        <th id="DetalleChicoTotal" >$total32                </th>
                        <th id="DetalleChicoTotal" >$total33                </th>
                        <th id="DetalleChicoTotal" >$total34                </th>
                        <th id="DetalleChicoTotal" >$total35                </th>
                        <th id="DetalleChicoTotal" >$total36                </th>
                        <th id="DetalleChicoTotal" >$total37                </th>
                        <th id="DetalleChicoTotal" >$total38                </th>
                        <th id="DetalleChicoTotal" >$total39                </th>
                        <th id="DetalleChicoTotal" >$gran_carrera           </th>
                    </tr>
                    
EOF;

                    # Actualizar totales generales
                    $total_hom_16  = $total_hom_16 + $row[hom16];
                    $total_hom_17  = $total_hom_17 + $row[hom17];
                    $total_hom_18  = $total_hom_18 + $row[hom18];
                    $total_hom_19  = $total_hom_19 + $row[hom19];
                    $total_hom_20  = $total_hom_20 + $row[hom20];
                    $total_hom_21  = $total_hom_21 + $row[hom21];
                    $total_hom_22  = $total_hom_22 + $row[hom22];
                    $total_hom_23  = $total_hom_23 + $row[hom23];
                    $total_hom_24  = $total_hom_24 + $row[hom24];
                    $total_hom_25  = $total_hom_25 + $row[hom25];
                    $total_hom_26  = $total_hom_26 + $row[hom26];
                    $total_hom_27  = $total_hom_27 + $row[hom27];
                    $total_hom_28  = $total_hom_28 + $row[hom28];
                    $total_hom_29  = $total_hom_29 + $row[hom29];
                    $total_hom_30  = $total_hom_30 + $row[hom30];
                    $total_hom_31  = $total_hom_31 + $row[hom31];
                    $total_hom_32  = $total_hom_32 + $row[hom32];
                    $total_hom_33  = $total_hom_33 + $row[hom33];
                    $total_hom_34  = $total_hom_34 + $row[hom34];
                    $total_hom_35  = $total_hom_35 + $row[hom35];
                    $total_hom_36  = $total_hom_36 + $row[hom36];
                    $total_hom_37  = $total_hom_37 + $row[hom37];
                    $total_hom_38  = $total_hom_38 + $row[hom38];
                    $total_hom_39  = $total_hom_39 + $row[hom39];

                    $total_muj_16  = $total_muj_16 + $row[muj16];
                    $total_muj_17  = $total_muj_17 + $row[muj17];
                    $total_muj_18  = $total_muj_18 + $row[muj18];
                    $total_muj_19  = $total_muj_19 + $row[muj19];
                    $total_muj_20  = $total_muj_20 + $row[muj20];
                    $total_muj_21  = $total_muj_21 + $row[muj21];
                    $total_muj_22  = $total_muj_22 + $row[muj22];
                    $total_muj_23  = $total_muj_23 + $row[muj23];
                    $total_muj_24  = $total_muj_24 + $row[muj24];
                    $total_muj_25  = $total_muj_25 + $row[muj25];
                    $total_muj_26  = $total_muj_26 + $row[muj26];
                    $total_muj_27  = $total_muj_27 + $row[muj27];
                    $total_muj_28  = $total_muj_28 + $row[muj28];
                    $total_muj_29  = $total_muj_29 + $row[muj29];
                    $total_muj_30  = $total_muj_30 + $row[muj30];
                    $total_muj_31  = $total_muj_31 + $row[muj31];
                    $total_muj_32  = $total_muj_32 + $row[muj32];
                    $total_muj_33  = $total_muj_33 + $row[muj33];
                    $total_muj_34  = $total_muj_34 + $row[muj34];
                    $total_muj_35  = $total_muj_35 + $row[muj35];
                    $total_muj_36  = $total_muj_36 + $row[muj36];
                    $total_muj_37  = $total_muj_37 + $row[muj37];
                    $total_muj_38  = $total_muj_38 + $row[muj38];
                    $total_muj_39  = $total_muj_39 + $row[muj39];
                          
                    $total_gran_16 = $total_gran_16 + $total16;
                    $total_gran_17 = $total_gran_17 + $total17;
                    $total_gran_18 = $total_gran_18 + $total18;
                    $total_gran_19 = $total_gran_19 + $total19;
                    $total_gran_20 = $total_gran_20 + $total20;
                    $total_gran_21 = $total_gran_21 + $total21;
                    $total_gran_22 = $total_gran_22 + $total22;
                    $total_gran_23 = $total_gran_23 + $total23;
                    $total_gran_24 = $total_gran_24 + $total24;
                    $total_gran_25 = $total_gran_25 + $total25;
                    $total_gran_26 = $total_gran_26 + $total26;
                    $total_gran_27 = $total_gran_27 + $total27;
                    $total_gran_28 = $total_gran_28 + $total28;
                    $total_gran_29 = $total_gran_29 + $total29;
                    $total_gran_30 = $total_gran_30 + $total30;
                    $total_gran_31 = $total_gran_31 + $total31;
                    $total_gran_32 = $total_gran_32 + $total32;
                    $total_gran_33 = $total_gran_33 + $total33;
                    $total_gran_34 = $total_gran_34 + $total34;
                    $total_gran_35 = $total_gran_35 + $total35;
                    $total_gran_36 = $total_gran_36 + $total36;
                    $total_gran_37 = $total_gran_37 + $total37;
                    $total_gran_38 = $total_gran_38 + $total38;
                    $total_gran_39 = $total_gran_39 + $total39;

                }  //cierre de if 
                
            }  //cierre while

            # calcular totales de totales generales (total de hombres, mujeres y de hombres + mujeres)
            $hom_gral  = $total_hom_16  + $total_hom_17  + $total_hom_18  + $total_hom_19  + $total_hom_20  + $total_hom_21  + $total_hom_22  + $total_hom_23  + $total_hom_24  + $total_hom_25  + $total_hom_26  + $total_hom_27  + $total_hom_28  + $total_hom_29  + $total_hom_30  + $total_hom_31  + $total_hom_32  + $total_hom_33  + $total_hom_34  + $total_hom_35  + $total_hom_36  + $total_hom_37  + $total_hom_38  + $total_hom_39;
            $muj_gral  = $total_muj_16  + $total_muj_17  + $total_muj_18  + $total_muj_19  + $total_muj_20  + $total_muj_21  + $total_muj_22  + $total_muj_23  + $total_muj_24  + $total_muj_25  + $total_muj_26  + $total_muj_27  + $total_muj_28  + $total_muj_29  + $total_muj_30  + $total_muj_31  + $total_muj_32  + $total_muj_33  + $total_muj_34  + $total_muj_35  + $total_muj_36  + $total_muj_37  + $total_muj_38  + $total_muj_39;
            $gran_gral = $total_gran_16 + $total_gran_17 + $total_gran_18 + $total_gran_19 + $total_gran_20 + $total_gran_21 + $total_gran_22 + $total_gran_23 + $total_gran_24 + $total_gran_25 + $total_gran_26 + $total_gran_27 + $total_gran_28 + $total_gran_29 + $total_gran_30 + $total_gran_31 + $total_gran_32 + $total_gran_33 + $total_gran_34 + $total_gran_35 + $total_gran_36 + $total_gran_37 + $total_gran_38 + $total_gran_39;

            //Imprimir totales del reporte

            print <<<EOF

             <tr>
                <th rowspan =3 id="subEncabezado">Totales</th>
                <!--<th rowspan =3></th> -->
                <th id="subEncabezado">Hom</th>
                <th id="subEncabezado">$total_hom_16 </th>
                <th id="subEncabezado">$total_hom_17 </th>
                <th id="subEncabezado">$total_hom_18 </th>
                <th id="subEncabezado">$total_hom_19 </th>
                <th id="subEncabezado">$total_hom_20 </th>
                <th id="subEncabezado">$total_hom_21 </th>
                <th id="subEncabezado">$total_hom_22 </th>
                <th id="subEncabezado">$total_hom_23 </th>
                <th id="subEncabezado">$total_hom_24 </th>
                <th id="subEncabezado">$total_hom_25</th>
                <th id="subEncabezado">$total_hom_26</th>
                <th id="subEncabezado">$total_hom_27</th>
                <th id="subEncabezado">$total_hom_28</th>
                <th id="subEncabezado">$total_hom_29</th>
                <th id="subEncabezado">$total_hom_30</th>
                <th id="subEncabezado">$total_hom_31</th>
                <th id="subEncabezado">$total_hom_32</th>
                <th id="subEncabezado">$total_hom_33</th>
                <th id="subEncabezado">$total_hom_34</th>
                <th id="subEncabezado">$total_hom_35</th>
                <th id="subEncabezado">$total_hom_36</th>
                <th id="subEncabezado">$total_hom_37</th>
                <th id="subEncabezado">$total_hom_38</th>
                <th id="subEncabezado">$total_hom_39</th>
                <th id="subEncabezado">$hom_gral</th>
            </tr>
            <tr>
                <th id="subEncabezado">Muj</th>
                <th id="subEncabezado">$total_muj_16 </th>
                <th id="subEncabezado">$total_muj_17 </th>
                <th id="subEncabezado">$total_muj_18 </th>
                <th id="subEncabezado">$total_muj_19 </th>
                <th id="subEncabezado">$total_muj_20 </th>
                <th id="subEncabezado">$total_muj_21 </th>
                <th id="subEncabezado">$total_muj_22 </th>
                <th id="subEncabezado">$total_muj_23 </th>
                <th id="subEncabezado">$total_muj_24 </th>
                <th id="subEncabezado">$total_muj_25</th>
                <th id="subEncabezado">$total_muj_26</th>
                <th id="subEncabezado">$total_muj_27</th>
                <th id="subEncabezado">$total_muj_28</th>
                <th id="subEncabezado">$total_muj_29</th>
                <th id="subEncabezado">$total_muj_30</th>
                <th id="subEncabezado">$total_muj_31</th>
                <th id="subEncabezado">$total_muj_32</th>
                <th id="subEncabezado">$total_muj_33</th>
                <th id="subEncabezado">$total_muj_34</th>
                <th id="subEncabezado">$total_muj_35</th>
                <th id="subEncabezado">$total_muj_36</th>
                <th id="subEncabezado">$total_muj_37</th>
                <th id="subEncabezado">$total_muj_38</th>
                <th id="subEncabezado">$total_muj_39</th>
                <th id="subEncabezado">$muj_gral</th>
            </tr>
            <tr>
                <th id="subEncabezado">Total</th>
                <th id="subEncabezado">$total_gran_16 </th>
                <th id="subEncabezado">$total_gran_17 </th>
                <th id="subEncabezado">$total_gran_18 </th>
                <th id="subEncabezado">$total_gran_19 </th>
                <th id="subEncabezado">$total_gran_20 </th>
                <th id="subEncabezado">$total_gran_21 </th>
                <th id="subEncabezado">$total_gran_22 </th>
                <th id="subEncabezado">$total_gran_23 </th>
                <th id="subEncabezado">$total_gran_24 </th>
                <th id="subEncabezado">$total_gran_25</th>
                <th id="subEncabezado">$total_gran_26</th>
                <th id="subEncabezado">$total_gran_27</th>
                <th id="subEncabezado">$total_gran_28</th>
                <th id="subEncabezado">$total_gran_29</th>
                <th id="subEncabezado">$total_gran_30</th>
                <th id="subEncabezado">$total_gran_31</th>
                <th id="subEncabezado">$total_gran_32</th>
                <th id="subEncabezado">$total_gran_33</th>
                <th id="subEncabezado">$total_gran_34</th>
                <th id="subEncabezado">$total_gran_35</th>
                <th id="subEncabezado">$total_gran_36</th>
                <th id="subEncabezado">$total_gran_37</th>
                <th id="subEncabezado">$total_gran_38</th>
                <th id="subEncabezado">$total_gran_39</th>
                <th id="subEncabezado">$gran_gral</th>
            </tr>

EOF;
            
        } # FIIN de funcion

    }   # FIN de la clase
?>