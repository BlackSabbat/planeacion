<?php
    class matricula 
    {
        // matricula por carrera
        function reporte1($BDSeleccionada, $tabla, $tipo, $db, $host, $user, $pwd, $swPerEsc){  

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

                // Consulta
                $consulta = "SELECT carrera, abierta, distancia, vespertino, 
                                sum(hom1)  as hom1,  sum(muj1)  as muj1,
                                sum(hom2)  as hom2,  sum(muj2)  as muj2,
                                sum(hom3)  as hom3,  sum(muj3)  as muj3,
                                sum(hom4)  as hom4,  sum(muj4)  as muj4,
                                sum(hom5)  as hom5,  sum(muj5)  as muj5,
                                sum(hom6)  as hom6,  sum(muj6)  as muj6,
                                sum(hom7)  as hom7,  sum(muj7)  as muj7,
                                sum(hom8)  as hom8,  sum(muj8)  as muj8,
                                sum(hom9)  as hom9,  sum(muj9)  as muj9,
                                sum(hom10) as hom10, sum(muj10) as muj10,
                                sum(hom11) as hom11, sum(muj11) as muj11,
                                sum(hom12) as hom12, sum(muj12) as muj12,
                                sum(hom13) as hom13, sum(muj13) as muj13,
                                sum(hom14) as hom14, sum(muj14) as muj14,
                                sum(hom15) as hom15, sum(muj15) as muj15,
                                sum(hom16) as hom16, sum(muj16) as muj16,
                                sum(hom17) as hom17, sum(muj17) as muj17,
                                sum(hom18) as hom18, sum(muj18) as muj18,
                                sum(hom19) as hom19, sum(muj19) as muj19,
                                sum(hom20) as hom20, sum(muj20) as muj20

                                FROM $tabla 
                                WHERE (periodo = '$BDSeleccionada' or periodo = '$periodo2') and tipo = '$tipo'
                                GROUP BY carrera, abierta, distancia, vespertino";
                                
            }  // FIN validacion si es por ciclo escolar

            // Reporte es por Semestre
            else {

                // Consulta
                $consulta = "SELECT carrera, abierta, distancia, vespertino, 
                                sum(hom1)  as hom1,  sum(muj1)  as muj1,
                                sum(hom2)  as hom2,  sum(muj2)  as muj2,
                                sum(hom3)  as hom3,  sum(muj3)  as muj3,
                                sum(hom4)  as hom4,  sum(muj4)  as muj4,
                                sum(hom5)  as hom5,  sum(muj5)  as muj5,
                                sum(hom6)  as hom6,  sum(muj6)  as muj6,
                                sum(hom7)  as hom7,  sum(muj7)  as muj7,
                                sum(hom8)  as hom8,  sum(muj8)  as muj8,
                                sum(hom9)  as hom9,  sum(muj9)  as muj9,
                                sum(hom10) as hom10, sum(muj10) as muj10,
                                sum(hom11) as hom11, sum(muj11) as muj11,
                                sum(hom12) as hom12, sum(muj12) as muj12,
                                sum(hom13) as hom13, sum(muj13) as muj13,
                                sum(hom14) as hom14, sum(muj14) as muj14,
                                sum(hom15) as hom15, sum(muj15) as muj15,
                                sum(hom16) as hom16, sum(muj16) as muj16,
                                sum(hom17) as hom17, sum(muj17) as muj17,
                                sum(hom18) as hom18, sum(muj18) as muj18,
                                sum(hom19) as hom19, sum(muj19) as muj19,
                                sum(hom20) as hom20, sum(muj20) as muj20

                                FROM $tabla 
                                WHERE periodo = '$BDSeleccionada' and tipo = '$tipo'
                                GROUP BY carrera, abierta, distancia, vespertino";

            }  // FIN analisis si reporte es por periodo escolar o por semestre

            //ejecutar consulta
            $query = $consulta;
            $result = $db->query($query);
            //echo "consulta: $query </br>";
            //echo "registros: $result->num_rows"; 
            
            # Encabezado
            print <<<EOF
            </br>
            <tr>
                <th id="subEncabezado"> Carrera     </th>
                <th id="subEncabezado">Sem         </th>
                <th id="subEncabezado">1           </th>
                <th id="subEncabezado">2           </th>
                <th id="subEncabezado">3           </th>
                <th id="subEncabezado">4           </th>
                <th id="subEncabezado">5           </th>
                <th id="subEncabezado">6           </th>
                <th id="subEncabezado">7           </th>
                <th id="subEncabezado">8           </th>
                <th id="subEncabezado">9           </th>
                <th id="subEncabezado">10          </th>
                <th id="subEncabezado">11          </th>
                <th id="subEncabezado">12          </th>
                <th id="subEncabezado">13          </th>
                <th id="subEncabezado">14          </th>
                <th id="subEncabezado">15          </th>
                <th id="subEncabezado">16          </th>
                <th id="subEncabezado">17          </th>
                <th id="subEncabezado">18          </th>
                <th id="subEncabezado">19          </th>
                <th id="subEncabezado">20          </th> 
                <th id="subEncabezado">Total       </th>  
            </tr>
EOF;

            // ARMAR EL REPORTE

            // inicializar totales de la tabla
            $total_hom1   = 0;    $total_hom2   = 0;    $total_hom3   = 0;
            $total_hom4   = 0;    $total_hom5   = 0;    $total_hom6   = 0;
            $total_hom7   = 0;    $total_hom8   = 0;    $total_hom9   = 0;
            $total_hom10  = 0;    $total_hom11  = 0;    $total_hom12  = 0;
            $total_hom13  = 0;    $total_hom14  = 0;    $total_hom15  = 0;
            $total_hom16  = 0;    $total_hom17  = 0;    $total_hom18  = 0;
            $total_hom19  = 0;    $total_hom20  = 0;

            $total_muj1   = 0;    $total_muj2   = 0;    $total_muj3   = 0;
            $total_muj4   = 0;    $total_muj5   = 0;    $total_muj6   = 0;
            $total_muj7   = 0;    $total_muj8   = 0;    $total_muj9   = 0;
            $total_muj10  = 0;    $total_muj11  = 0;    $total_muj12  = 0;
            $total_muj13  = 0;    $total_muj14  = 0;    $total_muj15  = 0;
            $total_muj16  = 0;    $total_muj17  = 0;    $total_muj18  = 0;
            $total_muj19  = 0;    $total_muj20  = 0;

            $total_gran1  = 0;    $total_gran2  = 0;    $total_gran3  = 0;
            $total_gran4  = 0;    $total_gran5  = 0;    $total_gran6  = 0;
            $total_gran7  = 0;    $total_gran8  = 0;    $total_gran9  = 0;
            $total_gran10 = 0;    $total_gran11 = 0;    $total_gran12 = 0;
            $total_gran13 = 0;    $total_gran14 = 0;    $total_gran15 = 0;
            $total_gran16 = 0;    $total_gran17 = 0;    $total_gran18 = 0;
            $total_gran19 = 0;    $total_gran20 = 0;    

            while( $row = $result->fetch_assoc()) {

                //echo "carrera:$row[carrera]</br>"; 

                if ($row['hom1'] != null)
                {
                    $rubro = $row['carrera'];

                    if ($row['abierta'] == 'si'){
                        $rubro = "$rubro  abierta";
                    }
                    if ($row['vespertino'] == 'si'){
                        $rubro = "$rubro  vesp";
                    }
                    if ($row['distancia']== 'si'){
                        $rubro = "$rubro  dist.";
                    }

                    //CALCULOS EN EL REPORTE

                    //detalle de totales (hombres + mujeres)
                    $total1  = $row['hom1']    +   $row['muj1'];	
                    $total2  = $row['hom2']    +   $row['muj2'];
                    $total3  = $row['hom3']    +   $row['muj3'];
                    $total4  = $row['hom4']    +   $row['muj4'];
                    $total5  = $row['hom5']    +   $row['muj5'];
                    $total6  = $row['hom6']    +   $row['muj6'];
                    $total7  = $row['hom7']    +   $row['muj7'];
                    $total8  = $row['hom8']    +   $row['muj8'];
                    $total9  = $row['hom9']    +   $row['muj9'];
                    $total10 = $row['hom10']   +   $row['muj10'];
                    $total11 = $row['hom11']   +   $row['muj11'];
                    $total12 = $row['hom12']   +   $row['muj12'];
                    $total13 = $row['hom13']   +   $row['muj13'];
                    $total14 = $row['hom14']   +   $row['muj14'];
                    $total15 = $row['hom15']   +   $row['muj15'];
                    $total16 = $row['hom16']   +   $row['muj16'];
                    $total17 = $row['hom17']   +   $row['muj17'];
                    $total18 = $row['hom18']   +   $row['muj18'];
                    $total19 = $row['hom19']   +   $row['muj19'];
                    $total20 = $row['hom20']   +   $row['muj20'];

                    // totales finales en el reporte (hombres, mujeres y hombres + mujeres)
                    $hom_carrera = $row['hom1'] + $row['hom2'] + $row['hom3'] + $row['hom4'] + $row['hom5'] + $row['hom6'] + $row['hom7'] + $row['hom8'] + $row['hom9'] + $row['hom10'] + $row['hom11'] + $row['hom12'] + $row['hom13'] + $row['hom14'] + $row['hom15'] + $row['hom16'] + $row['hom17'] + $row['hom18'] + $row['hom19'] + $row['hom20'];

                    $muj_carrera = $row['muj1'] + $row['muj2'] + $row['muj3'] + $row['muj4'] + $row['muj5'] + $row['muj6'] + $row['muj7'] + $row['muj8'] + $row['muj9'] + $row['muj10'] + $row['muj11'] + $row['muj12'] + $row['muj13'] + $row['muj14'] + $row['muj15'] + $row['muj16'] + $row['muj17'] + $row['muj18'] + $row['muj19'] + $row['muj20'];

                    $gran_carrera = $total1 + $total2 + $total3 + $total4 + $total5 + $total6 + $total7 + $total8 + $total9 + $total10 + $total11 + $total12 + $total13 + $total14 + $total15 + $total16 + $total17 + $total18 + $total19 + $total20;

                    //IMPRIMIR DETALLE DEL REPORTE
                    print <<<EOF
                    <tr>
                        <td id="DetalleMasChico" rowspan=3>$rubro        </td>
                        <td id="DetalleMasChico" >Hom                       </td>
                        <td id="DetallePrimerIngreso"> $row[hom1]           </td>
                        <td id="DetalleChico"> $row[hom2]                   </td>
                        <td id="DetalleChico"> $row[hom3]                   </td>
                        <td id="DetalleChico"> $row[hom4]                   </td>
                        <td id="DetalleChico"> $row[hom5]                   </td>
                        <td id="DetalleChico"> $row[hom6]                   </td>
                        <td id="DetalleChico"> $row[hom7]                   </td>
                        <td id="DetalleChico"> $row[hom8]                   </td>
                        <td id="DetalleChico"> $row[hom9]                   </td>
                        <td id="DetalleChico"> $row[hom10]                  </td>
                        <td id="DetalleChico"> $row[hom11]                  </td>
                        <td id="DetalleChico"> $row[hom12]                  </td>
                        <td id="DetalleChico"> $row[hom13]                  </td>
                        <td id="DetalleChico"> $row[hom14]                  </td>
                        <td id="DetalleChico"> $row[hom15]                  </td>
                        <td id="DetalleChico"> $row[hom16]                  </td>
                        <td id="DetalleChico"> $row[hom17]                  </td>
                        <td id="DetalleChico"> $row[hom18]                  </td>
                        <td id="DetalleChico"> $row[hom19]                  </td>
                        <td id="DetalleChico"> $row[hom20]                  </td>
                        <td id="DetalleChico"> $hom_carrera                 </td>
                    </tr>
                    
                    <tr>
                        <td id="DetalleMasChico" >Muj                       </td>
                        <td id="DetallePrimerIngreso">$row[muj1]            </td>
                        <td id="DetalleChico"> $row[muj2]                   </td>
                        <td id="DetalleChico"> $row[muj3]                   </td>
                        <td id="DetalleChico"> $row[muj4]                   </td>
                        <td id="DetalleChico"> $row[muj5]                   </td>
                        <td id="DetalleChico"> $row[muj6]                   </td>
                        <td id="DetalleChico"> $row[muj7]                   </td>
                        <td id="DetalleChico"> $row[muj8]                   </td>
                        <td id="DetalleChico"> $row[muj9]                   </td>
                        <td id="DetalleChico"> $row[muj10]                  </td>
                        <td id="DetalleChico"> $row[muj11]                  </td>
                        <td id="DetalleChico"> $row[muj12]                  </td>
                        <td id="DetalleChico"> $row[muj13]                  </td>
                        <td id="DetalleChico"> $row[muj14]                  </td>
                        <td id="DetalleChico"> $row[muj15]                  </td>
                        <td id="DetalleChico"> $row[muj16]                  </td>
                        <td id="DetalleChico"> $row[muj17]                  </td>
                        <td id="DetalleChico"> $row[muj18]                  </td>
                        <td id="DetalleChico"> $row[muj19]                  </td>
                        <td id="DetalleChico"> $row[muj20]                  </td>
                        <td id="DetalleChico"> $muj_carrera                 </td>
                    </tr>

                    <tr>
                        <td id="DetalleMasChico">Total                      </td>
                        <th id="DetallePrimerIngreso">$total1               </th>
                        <th id="DetalleChicoTotal">$total2                  </th>
                        <th id="DetalleChicoTotal">$total3                  </th>
                        <th id="DetalleChicoTotal">$total4                  </th>
                        <th id="DetalleChicoTotal">$total5                  </th>
                        <th id="DetalleChicoTotal">$total6                  </th>
                        <th id="DetalleChicoTotal">$total7                  </th>
                        <th id="DetalleChicoTotal">$total8                  </th>
                        <th id="DetalleChicoTotal">$total9                  </th>
                        <th id="DetalleChicoTotal">$total10                 </th>
                        <th id="DetalleChicoTotal">$total11                 </th>
                        <th id="DetalleChicoTotal">$total12                 </th>
                        <th id="DetalleChicoTotal">$total13                 </th>
                        <th id="DetalleChicoTotal">$total14                 </th>
                        <th id="DetalleChicoTotal">$total15                 </th>
                        <th id="DetalleChicoTotal">$total16                 </th>
                        <th id="DetalleChicoTotal">$total17                 </th>
                        <th id="DetalleChicoTotal">$total18                 </th>
                        <th id="DetalleChicoTotal">$total19                 </th>
                        <th id="DetalleChicoTotal">$total20                 </th>
                        <th id="DetalleChicoTotal">$gran_carrera            </th>
                    </tr>
                    
EOF;
                    # Actualizar totales generales
                    $total_hom1   = $total_hom1  + $row['hom1'];
                    $total_hom2   = $total_hom2  + $row['hom2'];
                    $total_hom3   = $total_hom3  + $row['hom3'];
                    $total_hom4   = $total_hom4  + $row['hom4'];
                    $total_hom5   = $total_hom5  + $row['hom5'];
                    $total_hom6   = $total_hom6  + $row['hom6'];
                    $total_hom7   = $total_hom7  + $row['hom7'];
                    $total_hom8   = $total_hom8  + $row['hom8'];
                    $total_hom9   = $total_hom9  + $row['hom9'];
                    $total_hom10  = $total_hom10 + $row['hom10'];
                    $total_hom11  = $total_hom11 + $row['hom11'];
                    $total_hom12  = $total_hom12 + $row['hom12'];
                    $total_hom13  = $total_hom13 + $row['hom13'];
                    $total_hom14  = $total_hom14 + $row['hom14'];
                    $total_hom15  = $total_hom15 + $row['hom15'];
                    $total_hom16  = $total_hom16 + $row['hom16'];
                    $total_hom17  = $total_hom17 + $row['hom17'];
                    $total_hom18  = $total_hom18 + $row['hom18'];
                    $total_hom19  = $total_hom19 + $row['hom19'];
                    $total_hom20  = $total_hom20 + $row['hom20'];

                    $total_muj1   = $total_muj1  + $row['muj1'];
                    $total_muj2   = $total_muj2  + $row['muj2'];
                    $total_muj3   = $total_muj3  + $row['muj3'];
                    $total_muj4   = $total_muj4  + $row['muj4'];
                    $total_muj5   = $total_muj5  + $row['muj5'];
                    $total_muj6   = $total_muj6  + $row['muj6'];
                    $total_muj7   = $total_muj7  + $row['muj7'];
                    $total_muj8   = $total_muj8  + $row['muj8'];
                    $total_muj9   = $total_muj9  + $row['muj9'];
                    $total_muj10  = $total_muj10 + $row['muj10'];
                    $total_muj11  = $total_muj11 + $row['muj11'];
                    $total_muj12  = $total_muj12 + $row['muj12'];
                    $total_muj13  = $total_muj13 + $row['muj13'];
                    $total_muj14  = $total_muj14 + $row['muj14'];
                    $total_muj15  = $total_muj15 + $row['muj15'];
                    $total_muj16  = $total_muj16 + $row['muj16'];
                    $total_muj17  = $total_muj17 + $row['muj17'];
                    $total_muj18  = $total_muj18 + $row['muj18'];
                    $total_muj19  = $total_muj19 + $row['muj19'];
                    $total_muj20  = $total_muj20 + $row['muj20'];
                          
                    $total_gran1   = $total_gran1  + $total1;
                    $total_gran2   = $total_gran2  + $total2;
                    $total_gran3   = $total_gran3  + $total3;
                    $total_gran4   = $total_gran4  + $total4;
                    $total_gran5   = $total_gran5  + $total5;
                    $total_gran6   = $total_gran6  + $total6;
                    $total_gran7   = $total_gran7  + $total7;
                    $total_gran8   = $total_gran8  + $total8;
                    $total_gran9   = $total_gran9  + $total9;
                    $total_gran10  = $total_gran10 + $total10;
                    $total_gran11  = $total_gran11 + $total11;
                    $total_gran12  = $total_gran12 + $total12;
                    $total_gran13  = $total_gran13 + $total13;
                    $total_gran14  = $total_gran14 + $total14;
                    $total_gran15  = $total_gran15 + $total15;
                    $total_gran16  = $total_gran16 + $total16;
                    $total_gran17  = $total_gran17 + $total17;
                    $total_gran18  = $total_gran18 + $total18;
                    $total_gran19  = $total_gran19 + $total19;
                    $total_gran20  = $total_gran20 + $total20;

                }  //cierre de if 
                
            }  //cierre while

            # calcular totales de totales generales (total de hombres, mujeres y de hombres + mujeres)
            $hom_gral = $total_hom1 + $total_hom2 + $total_hom3 + $total_hom4 + $total_hom5 + $total_hom6 + $total_hom7 + $total_hom8 + $total_hom9 + $total_hom10 + $total_hom11 + $total_hom12 + $total_hom13 + $total_hom14 + $total_hom15 + $total_hom16 + $total_hom17 + $total_hom18 + $total_hom19 + $total_hom20;

            $muj_gral = $total_muj1 + $total_muj2 + $total_muj3 + $total_muj4 + $total_muj5 + $total_muj6 + $total_muj7 + $total_muj8 + $total_muj9 + $total_muj10 + $total_muj11 + $total_muj12 + $total_muj13 + $total_muj14 + $total_muj15 + $total_muj16 + $total_muj17 + $total_muj18 + $total_muj19 + $total_muj20;

            $gran_gral = $total_gran1 + $total_gran2 + $total_gran3 + $total_gran4 + $total_gran5 + $total_gran6 + $total_gran7 + $total_gran8 + $total_gran9 + $total_gran10 + $total_gran11 + $total_gran12 + $total_gran13 + $total_gran14 + $total_gran15 + $total_gran16 + $total_gran17 + $total_gran18 + $total_gran19 + $total_gran20;

            //Imprimir totales del reporte

            print <<<EOF
            <tr>
                <th rowspan =3 id="subEncabezado">Totales   </th>
                <th id="subEncabezado">Hom                  </th>
                <th id="DetallePrimerIngreso">$total_hom1   </th>
                <th id="subEncabezado">$total_hom2          </th>
                <th id="subEncabezado">$total_hom3          </th>
                <th id="subEncabezado">$total_hom4          </th>
                <th id="subEncabezado">$total_hom5          </th>
                <th id="subEncabezado">$total_hom6          </th>
                <th id="subEncabezado">$total_hom7          </th>
                <th id="subEncabezado">$total_hom8          </th>
                <th id="subEncabezado">$total_hom9          </th>
                <th id="subEncabezado">$total_hom10         </th>
                <th id="subEncabezado">$total_hom11         </th>
                <th id="subEncabezado">$total_hom12         </th>
                <th id="subEncabezado">$total_hom13         </th>
                <th id="subEncabezado">$total_hom14         </th>
                <th id="subEncabezado">$total_hom15         </th>
                <th id="subEncabezado">$total_hom16         </th>
                <th id="subEncabezado">$total_hom17         </th>
                <th id="subEncabezado">$total_hom18         </th>
                <th id="subEncabezado">$total_hom19         </th>
                <th id="subEncabezado">$total_hom20         </th>
                <th id="subEncabezado">$hom_gral            </th>
            </tr>

            <tr>
                <th id="subEncabezado">Muj                  </th>
                <th id="DetallePrimerIngreso">$total_muj1   </th>
                <th id="subEncabezado">$total_muj2          </th>
                <th id="subEncabezado">$total_muj3          </th>
                <th id="subEncabezado">$total_muj4          </th>
                <th id="subEncabezado">$total_muj5          </th>
                <th id="subEncabezado">$total_muj6          </th>
                <th id="subEncabezado">$total_muj7          </th>
                <th id="subEncabezado">$total_muj8          </th>
                <th id="subEncabezado">$total_muj9          </th>
                <th id="subEncabezado">$total_muj10         </th>
                <th id="subEncabezado">$total_muj11         </th>
                <th id="subEncabezado">$total_muj12         </th>
                <th id="subEncabezado">$total_muj13         </th>
                <th id="subEncabezado">$total_muj14         </th>
                <th id="subEncabezado">$total_muj15         </th>
                <th id="subEncabezado">$total_muj16         </th>
                <th id="subEncabezado">$total_muj17         </th>
                <th id="subEncabezado">$total_muj18         </th>
                <th id="subEncabezado">$total_muj19         </th>
                <th id="subEncabezado">$total_muj20         </th>
                <th id="subEncabezado">$muj_gral            </th>
            </tr>

            <tr>
                <th id="subEncabezado">Total                </th>
                <th id="DetallePrimerIngreso">$total_gran1  </th>
                <th id="subEncabezado">$total_gran2         </th>
                <th id="subEncabezado">$total_gran3         </th>
                <th id="subEncabezado">$total_gran4         </th>
                <th id="subEncabezado">$total_gran5         </th>
                <th id="subEncabezado">$total_gran6         </th>
                <th id="subEncabezado">$total_gran7         </th>
                <th id="subEncabezado">$total_gran8         </th>
                <th id="subEncabezado">$total_gran9         </th>
                <th id="subEncabezado">$total_gran10        </th>
                <th id="subEncabezado">$total_gran11        </th>
                <th id="subEncabezado">$total_gran12        </th>
                <th id="subEncabezado">$total_gran13        </th>
                <th id="subEncabezado">$total_gran14        </th>
                <th id="subEncabezado">$total_gran15        </th>
                <th id="subEncabezado">$total_gran16        </th>
                <th id="subEncabezado">$total_gran17        </th>
                <th id="subEncabezado">$total_gran18        </th>
                <th id="subEncabezado">$total_gran19        </th>
                <th id="subEncabezado">$total_gran20        </th>
                <th id="subEncabezado">$gran_gral           </th>
            </tr>
EOF;
        }

    }
?>  