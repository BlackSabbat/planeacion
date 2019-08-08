<?php
    class titulado_egresado
    {
        function reporte1($BDSeleccionada, $tabla, $tipo, $plan, $db, $host, $user, $pwd, $swEsconde, $swPerEsc)
        {

            //$rubro = $carrera;

            // Analizar si el reporte es por periodo escolar (ejem Ene-Jun 2017 Ago-Dic 20018)
            // y definir consulta
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

                $consulta_carrera = "SELECT distinct carrera FROM $tabla 
                where (periodo = '$BDSeleccionada' or periodo = '$periodo2') and tipo = '$tipo'
                GROUP BY carrera, id";
            }

            else {

                $consulta_carrera = "SELECT distinct carrera FROM $tabla 
                where (periodo = '$BDSeleccionada' and tipo = '$tipo')
                GROUP BY carrera, id";
            }

            // Ejecutar consulta
            //$query = $consulta;
            //$result = $db->query($query);

            $query_carrera = $consulta_carrera;
            $result_carrera = $db->query($query_carrera);

            //echo "$query_carrera </br>";
            //echo "registros: $result->num_rows"; 
            
            # Encabezado del Reporte
            
            print <<<EOF
            </br>
            <tr>
                <th id="subEncabezado" rowspan=2>  Carrera     </th>

EOF;

                //esconder rando de edades si el switch apagado
                if ($swEsconde == 0)
                {
                    print <<<EOF
                    <th id="subEncabezado" colspan=3> 21 <=        </th>
                    <th id="subEncabezado" colspan=3> 22 años      </th>
                    <th id="subEncabezado" colspan=3> 23 años      </th>
                    <th id="subEncabezado" colspan=3> 24 años      </th>
                    <th id="subEncabezado" colspan=3> 25 años      </th>
                    <th id="subEncabezado" colspan=3> 26 a 29      </th>
                    <th id="subEncabezado" colspan=3> 30 >=        </th>
EOF;
                }
                print <<<EOF
                <th id="subEncabezado" colspan=3> Total        </th>  
            </tr>
            
            <tr>
EOF;
                if ($swEsconde == 0)
                {
                    print <<<EOF
                    <th id="subEncabezado">Hom                     </th>
                    <th id="subEncabezado">Muj                     </th>
                    <th id="subEncabezado">Tot                     </th>
                    <th id="subEncabezado">Hom                     </th>
                    <th id="subEncabezado">Muj                     </th>
                    <th id="subEncabezado">Tot                     </th>
                    <th id="subEncabezado">Hom                     </th>
                    <th id="subEncabezado">Muj                     </th>
                    <th id="subEncabezado">Tot                     </th>
                    <th id="subEncabezado">Hom                     </th>
                    <th id="subEncabezado">Muj                     </th>
                    <th id="subEncabezado">Tot                     </th>
                    <th id="subEncabezado">Hom                     </th>
                    <th id="subEncabezado">Muj                     </th>
                    <th id="subEncabezado">Tot                     </th>
                    <th id="subEncabezado">Hom                     </th>
                    <th id="subEncabezado">Muj                     </th>
                    <th id="subEncabezado">Tot                     </th>
                    <th id="subEncabezado">Hom                     </th>
                    <th id="subEncabezado">Muj                     </th>
                    <th id="subEncabezado">Tot                     </th>
EOF;
                }
                print <<<EOF
                <th id="subEncabezado">Hom                     </th>
                <th id="subEncabezado">Muj                     </th>
                <th id="subEncabezado">Total                   </th>  
            </tr>

EOF;
            # Armar el reporte General

            // inicializar contadores totales
            $hom_carrera      = 0;  $muj_carrera      = 0;  $gran_carrera     = 0;

            $total_hom21      = 0;  $total_hom22      = 0;  $total_hom23      = 0;  
            $total_hom24      = 0;  $total_hom25      = 0;  $total_hom26      = 0;  
            $total_hom30      = 0;  
            
            $total_muj21      = 0;  $total_muj22      = 0;  $total_muj23      = 0;  
            $total_muj24      = 0;  $total_muj25      = 0;  $total_muj26      = 0;
            $total_muj30      = 0;  
            
            $total_gran21     = 0;  $total_gran22     = 0;  $total_gran23     = 0;  
            $total_gran24     = 0;  $total_gran25     = 0;  $total_gran26     = 0;  
            $total_gran30     = 0;

            // ciclo que recorre las carreras
            while( $row_consulta = $result_carrera->fetch_assoc()) {

                //inicializar contadores del detalle
                $hom21   = 0; $hom22   = 0; $hom23   = 0; $hom24   = 0; 
                $hom25   = 0; $hom26   = 0; $hom30   = 0;

                $muj21   = 0; $muj22   = 0; $muj23   = 0; $muj24   = 0; 
                $muj25   = 0; $muj26   = 0; $muj30   = 0;

                $total21 = 0; $total22 = 0; $total23 = 0; $total24 = 0; 
                $total25 = 0; $total26 = 0; $total30 = 0;

            
                $rubro = $row_consulta['carrera'];

                // Analizar si el reporte es por periodo escolar (ejem Ene-Jun 2017 Ago-Dic 20018)
                // y definir consulta
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

                    $consulta = "SELECT num_control, edad, sexo, carrera
                    FROM $tabla 
                    WHERE (periodo = '$BDSeleccionada' or periodo = '$periodo2') and carrera = '$rubro'
                    GROUP BY carrera, id";
                }
                else {
                    // Consulta
                    $consulta = "SELECT num_control, edad, sexo, carrera 
                    FROM $tabla 
                    where (periodo = '$BDSeleccionada' and carrera = '$rubro')
                    GROUP BY carrera, id";
                }

                // Ejecutar consulta
                $query = $consulta;
                $result = $db->query($query);

                //Ciclo del Detalle del Reporte
                while( $row = $result->fetch_assoc()) {
                
                    $rubro = $row['carrera'];
                    //echo "carrera:$row[carrera]</br>";
                    //echo "control: $row[num_control] edad: $row[edad] genero: $row[sexo] </br>";
                
                    # Reporte General
                    if ($plan == 'general'){
                        if ($row['edad'] <= 21)
                        {
                            if ($row['sexo'] == 'M')
                                $hom21 = $hom21 + 1;
                            if ($row['sexo'] == 'F')
                                $muj21 = $muj21 + 1;
                        }
                        if ($row['edad'] == 22)
                        {
                            if ($row['sexo'] == 'M')
                                $hom22 = $hom22 + 1;
                            if ($row['sexo'] == 'F')
                                $muj22 = $muj22 + 1;                            
                        }
                        if ($row['edad'] == 23)
                        {
                            if ($row['sexo'] == 'M')
                                $hom23 = $hom23 + 1;
                            if ($row['sexo'] == 'F')
                                $muj23 = $muj23 + 1;
                        }
                        if ($row['edad'] == 24)
                        {
                            if ($row['sexo'] == 'M')
                                $hom24 = $hom24 + 1;
                            if ($row['sexo'] == 'F')
                                $muj24 = $muj24 + 1;
                        }
                        if ($row['edad'] == 25)
                        {
                            if ($row['sexo'] == 'M')
                                $hom25 = $hom25 + 1;
                            if ($row['sexo'] == 'F')
                                $muj25 = $muj25 + 1;
                        }
                        if (($row['edad'] >= 26) && ($row['edad']<=29))
                        {
                            if ($row['sexo'] == 'M')
                                $hom26 = $hom26 + 1;
                            if ($row['sexo'] == 'F')
                                $muj26 = $muj26 + 1;
                        }
                        if ($row['edad'] >= 30)
                        {
                            if ($row['sexo'] == 'M')
                                $hom30 = $hom30 + 1;
                            if ($row['sexo'] == 'F')
                                $muj30 = $muj30 + 1;
                        }
                        #suma de generos por edad
                        $total21  = $hom21 + $muj21;
                        $total22  = $hom22 + $muj22;
                        $total23  = $hom23 + $muj23;
                        $total24  = $hom24 + $muj24;
                        $total25  = $hom25 + $muj25;
                        $total26  = $hom26 + $muj26;
                        $total30  = $hom30 + $muj30;

                    } #plan general

                    # Reporte Plan 2004
                    if ($plan == 'plan2004'){ 

                        # analizar si primer digito es numerico o letra
                        $anio_control = substr($row['num_control'],0,1);
                        if (is_numeric($anio_control)){
                            $anio_control = substr($row['num_control'],0,2);
                        }
                        else {
                            $anio_control = substr($row['num_control'],1,2);
                        }
                        //echo "Año de Ctrol: $anio_control carrera: $carrera</br>";

                        // Filtro para el plan
                        if ( (($anio_control <= 9) || (($anio_control>=50) && ($anio_control<=99))) && ($carrera != 'ING GESTION EMPR.') ) {

                            //echo "control: $row[num_control] carrera: $carrera edad: $row[edad] genero: $row[sexo] </br>";

                            if ($row['edad'] <= 21)
                            {
                                if ($row['sexo'] == 'M')
                                    $hom21 = $hom21 + 1;
                                if ($row['sexo'] == 'F')
                                    $muj21 = $muj21 + 1;
                            }
                            if ($row['edad'] == 22)
                            {
                                if ($row['sexo'] == 'M')
                                    $hom22 = $hom22 + 1;
                                if ($row['sexo'] == 'F')
                                    $muj22 = $muj22 + 1;                            
                            }
                            if ($row['edad'] == 23)
                            {
                                if ($row['sexo'] == 'M')
                                    $hom23 = $hom23 + 1;
                                if ($row['sexo'] == 'F')
                                    $muj23 = $muj23 + 1;
                            }
                            if ($row['edad'] == 24)
                            {
                                if ($row['sexo'] == 'M')
                                    $hom24 = $hom24 + 1;
                                if ($row['sexo'] == 'F')
                                    $muj24 = $muj24 + 1;
                            }
                            if ($row['edad'] == 25)
                            {
                                if ($row['sexo'] == 'M')
                                    $hom25 = $hom25 + 1;
                                if ($row['sexo'] == 'F')
                                    $muj25 = $muj25 + 1;
                            }
                            if (($row['edad'] >= 26) && ($row['edad']<=29))
                            {
                                if ($row['sexo'] == 'M')
                                    $hom26 = $hom26 + 1;
                                if ($row['sexo'] == 'F')
                                    $muj26 = $muj26 + 1;
                            }
                            if ($row['edad'] >= 30)
                            {
                                if ($row['sexo'] == 'M')
                                    $hom30 = $hom30 + 1;
                                if ($row['sexo'] == 'F')
                                    $muj30 = $muj30 + 1;
                            }

                            #suma de generos por edad
                            $total21  = $hom21 + $muj21;
                            $total22  = $hom22 + $muj22;
                            $total23  = $hom23 + $muj23;
                            $total24  = $hom24 + $muj24;
                            $total25  = $hom25 + $muj25;
                            $total26  = $hom26 + $muj26;
                            $total30  = $hom30 + $muj30;

                        }
                    
                    } #plan 2004

                    # Reporte Plan 2010
                    if ($plan == 'plan2010'){
                    
                        # analizar si primer digito es numerico o letra
                        $anio_control = substr($row['num_control'],0,1);
                        if (is_numeric($anio_control)){
                            $anio_control = substr($row['num_control'],0,2);
                        }
                        else {
                            $anio_control = substr($row['num_control'],1,2);
                        }
                        //echo "Año de Ctrol: $anio_control carrera: $carrera</br>";
                        // Filtro para el plan
                        if ( (($anio_control >= 10) && ($anio_control<50)) || ($carrera == 'ING GESTION EMPR.') ) {

                            //echo "control: $row[num_control] carrera: $carrera edad: $row[edad] genero: $row[sexo] </br>";
                            if ($row['edad'] <= 21)
                            {
                                if ($row['sexo'] == 'M')
                                    $hom21 = $hom21 + 1;
                                if ($row['sexo'] == 'F')
                                    $muj21 = $muj21 + 1;
                            }
                            if ($row['edad'] == 22)
                            {
                                if ($row['sexo'] == 'M')
                                    $hom22 = $hom22 + 1;
                                if ($row['sexo'] == 'F')
                                    $muj22 = $muj22 + 1;                            
                            }
                            if ($row['edad'] == 23)
                            {
                                if ($row['sexo'] == 'M')
                                    $hom23 = $hom23 + 1;
                                if ($row['sexo'] == 'F')
                                    $muj23 = $muj23 + 1;
                            }
                            if ($row['edad'] == 24)
                            {
                                if ($row['sexo'] == 'M')
                                    $hom24 = $hom24 + 1;
                                if ($row['sexo'] == 'F')
                                    $muj24 = $muj24 + 1;
                            }
                            if ($row['edad'] == 25)
                            {
                                if ($row['sexo'] == 'M')
                                    $hom25 = $hom25 + 1;
                                if ($row['sexo'] == 'F')
                                    $muj25 = $muj25 + 1;
                            }
                            if (($row['edad'] >= 26) && ($row['edad']<=29))
                            {
                                if ($row['sexo'] == 'M')
                                    $hom26 = $hom26 + 1;
                                if ($row['sexo'] == 'F')
                                    $muj26 = $muj26 + 1;
                            }
                            if ($row['edad'] >= 30)
                            {
                                if ($row['sexo'] == 'M')
                                    $hom30 = $hom30 + 1;
                                if ($row['sexo'] == 'F')
                                    $muj30 = $muj30 + 1;
                            }

                            #suma de generos por edad
                            $total21  = $hom21 + $muj21;
                            $total22  = $hom22 + $muj22;
                            $total23  = $hom23 + $muj23;
                            $total24  = $hom24 + $muj24;
                            $total25  = $hom25 + $muj25;
                            $total26  = $hom26 + $muj26;
                            $total30  = $hom30 + $muj30;

                        }
                    
                    } #plan 2004
    
                }  //cierre while del detalle

            //echo "carrera $rubro muj. >= 30 $muj30 </br>";

            # Calculo de Totales
            $total_hom21   = $total_hom21  + $hom21;
            $total_hom22   = $total_hom22  + $hom22;
            $total_hom23   = $total_hom23  + $hom23;
            $total_hom24   = $total_hom24  + $hom24;
            $total_hom25   = $total_hom25  + $hom25;
            $total_hom26   = $total_hom26  + $hom26;
            $total_hom30   = $total_hom30  + $hom30;

            $total_muj21   = $total_muj21  + $muj21;
            $total_muj22   = $total_muj22  + $muj22;
            $total_muj23   = $total_muj23  + $muj23;
            $total_muj24   = $total_muj24  + $muj24;
            $total_muj25   = $total_muj25  + $muj25;
            $total_muj26   = $total_muj26  + $muj26;
            $total_muj30   = $total_muj30  + $muj30;
                          
            $total_gran21   = $total_gran21  + $total21;
            $total_gran22   = $total_gran22  + $total22;
            $total_gran23   = $total_gran23  + $total23;
            $total_gran24   = $total_gran24  + $total24;
            $total_gran25   = $total_gran25  + $total25;
            $total_gran26   = $total_gran26  + $total26;
            $total_gran30   = $total_gran30  + $total30;

            #totales por carrera de cada genero
            $hom_carrera = $hom21 + $hom22 + $hom23 + $hom24 + $hom25 + $hom26 + $hom30;
            $muj_carrera = $muj21 + $muj22 + $muj23 + $muj24 + $muj25 + $muj26 + $muj30;

            # totales por carrera
            $gran_carrera = $total21 + $total22 + $total23 + $total24 + $total25 + $total26 + $total30; 

                
            if ($gran_carrera != 0) 
            {
                //echo "carrera $rubro muj. >= 30 $muj30 </br>";
                
                // Imprimir detalle del reporte
                print <<<EOF
                <tr id="trChico">
                    <!-- <td id="SubEncabezadoChico">$rubro                </td> -->
                    <td id="SubEncabezadoChico">$rubro                </td>
EOF;
                    //esconder rando de edades si el switch apagado
                    if ($swEsconde == 0)
                    {
                        print <<<EOF
                        <td id="DetalleChico" >$hom21                  </td>
                        <td id="DetalleChico" >$muj21                  </td>
                        <th id="DetalleChico" >$total21                </th>
                        <td id="DetalleChico" >$hom22                  </td>
                        <td id="DetalleChico" >$muj22                  </td>
                        <th id="DetalleChico" >$total22                </th>
                        <td id="DetalleChico" >$hom23                  </td>
                        <td id="DetalleChico" >$muj23                  </td>
                        <th id="DetalleChico" >$total23                </th>
                        <td id="DetalleChico" >$hom24                  </td>
                        <td id="DetalleChico" >$muj24                  </td>
                        <th id="DetalleChico" >$total24                </th>
                        <td id="DetalleChico" >$hom25                  </td>
                        <td id="DetalleChico" >$muj25                  </td>
                        <td id="DetalleChico" >$total25                </th>
                        <td id="DetalleChico" >$hom26                  </td>
                        <td id="DetalleChico" >$muj26                  </td>
                        <th id="DetalleChico" >$total26                </th>
                        <td id="DetalleChico" >$hom30                  </td>
                        <td id="DetalleChico" >$muj30                  </td>
                        <th id="DetalleChico" >$total30                </th>
EOF;
                    }
                    print <<<EOF
                    <th id="DetalleMasChico" >$hom_carrera            </th>
                    <th id="DetalleMasChico" >$muj_carrera            </th>
                    <th id="DetalleChico">$gran_carrera       </th>
                </tr> 
EOF;

                }  // if ($swEsconde == 0)

            }   //cierre while por carreras


            # IMPRIMIR TOTALES y cerrar tabla del reporte

            $hom_gral  = $total_hom21 + $total_hom22 + $total_hom23 + $total_hom24 + $total_hom25 + $total_hom26 + $total_hom30;
            $muj_gral  = $total_muj21 + $total_muj22 + $total_muj23 + $total_muj24 + $total_muj25 + $total_muj26 + $total_muj30;
            $gran_gral = $total_gran21 + $total_gran22 + $total_gran23 + $total_gran24 + $total_gran25 + $total_gran26 + $total_gran30;

            print <<<EOF
            <tr>
                <th id="subEncabezado" rowspan =3>Totales</th>
EOF;
            //esconder rando de edades si el switch apagado
            if ($swEsconde == 0)
            {
                print <<<EOF
                <th id="TotalesChico">$total_hom21 </th>
                <th id="TotalesChico">$total_muj21 </th>
                <th id="TotalesChico">$total_gran21</th>
                <th id="TotalesChico">$total_hom22 </th>
                <th id="TotalesChico">$total_muj22 </th>
                <th id="TotalesChico">$total_gran22</th>
                <th id="TotalesChico">$total_hom23 </th>
                <th id="TotalesChico">$total_muj23 </th>
                <th id="TotalesChico">$total_gran23</th>
                <th id="TotalesChico">$total_hom24 </th>
                <th id="TotalesChico">$total_muj24 </th>
                <th id="TotalesChico">$total_gran24</th>
                <th id="TotalesChico">$total_hom25 </th>
                <th id="TotalesChico">$total_muj25 </th>
                <th id="TotalesChico">$total_gran25</th>
                <th id="TotalesChico">$total_hom26 </th>
                <th id="TotalesChico">$total_muj26 </th>
                <th id="TotalesChico">$total_gran26</th>
                <th id="TotalesChico">$total_hom30 </th>
                <th id="TotalesChico">$total_muj30 </th>
                <th id="TotalesChico">$total_gran30</th>
EOF;
            }
            print <<<EOF
            <th id="TotalesChico">$hom_gral    </th>
            <th id="TotalesChico">$muj_gral    </th>
            <th id="TotalesChico">$gran_gral   </th>
        </tr>

EOF;
        }  //function 
        
    }  //class
?>