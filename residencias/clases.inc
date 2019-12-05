<?php
    class residencia
    {
        private $num_control;
        private $nombre;
        private $sexo;
        private $telefono;
        private $correo;
        private $empresa;
        private $nombre_proyecto;
        private $asesor_interno;
        private $asesor_extreno;
        private $fecha_inicio;
        private $fecha_termino;
        private $carrera;
        
        function armarReporte($tipo, $sector, $sexo)
        {
            
            // Tabla del reporte
            global $residencias;

            //foreach ($residencias as $i => $value) {
            //        $residencias[$i] = 0;
            //}

            if ($tipo == 'GRANDE')
            {
                if ($sector == '')
                {
                    if ($sexo == 'H') {
                        $contGrande_Priv_Hombre ++;
                        $residencias['GraPriHom'] ++;
                    }
                    if ($sexo == 'M') {
                        $contGrande_Priv_Mujer ++;
                        $residencias['GraPriMuj'] ++;
                    }
                    //echo"H: $contGrande_Priv_Hombre  M:$contGrande_Priv_Mujer<br>";
                }
                if ($sector == 'SECTOR PUBLICO')
                {
                    if ($sexo == 'H') {
                        $contGrande_Pub_Hombre ++;
                        $residencias['GraPubHom'] ++;
                    }
                    if ($sexo == 'M') {
                        $contGrande_Pub_Mujer ++;
                        $residencias['GraPubMuj'] ++;
                    }
                }
                if (($sector == 'SECTOR PUBLICO EDUCATIVO') OR ($sector == 'SECTOR EDUCATIVO PUBLICO'))
                {
                    if ($sexo == 'H') {
                        $contGrande_EduPub_Hombre ++;
                        $residencias['GraEduPubHom'] ++;
                    }
                    if ($sexo == 'M') {
                        $contGrande_EduPub_Mujer ++;
                        $residencias['GraEduPubMuj'] ++;
                    }
                }
                if (($sector == 'SECTOR PRIVADO EDUCATIVO') OR ($sector == 'SECTOR EDUCATIVO PRIVADO'))
                {
                    if ($sexo == 'H') {
                        $contGrande_EduPriv_Hombre ++;
                        $residencias['GraEduPriHom'] ++;
                    }
                    if ($sexo == 'M') {
                        $contGrande_EduPriv_Mujer ++;
                        $residencias['GraEduPriMuj'] ++;
                    }
                }
            }
            if ($tipo == 'MEDIANA')
            {
                if ($sector == '')
                {
                    if ($sexo == 'H') {
                        $contMediana_Priv_Hombre ++;
                        $residencias['MedPriHom'] ++;
                    }
                    if ($sexo == 'M') {
                        $contMediana_Priv_Mujer ++;
                        $residencias['MedPriMuj'] ++;
                    }
                }
                if ($sector == 'SECTOR PUBLICO')
                {
                    if ($sexo == 'H') {
                        $contMediana_Pub_Hombre ++;
                        $residencias['MedPubHom'] ++;
                    }
                    if ($sexo == 'M') {
                        $contMediana_Pub_Mujer ++;
                        $residencias['MedPubMuj'] ++;
                    }
                }
                if (($sector == 'SECTOR PUBLICO EDUCATIVO') OR ($sector == 'SECTOR EDUCATIVO PUBLICO'))
                {
                    if ($sexo == 'H') {
                        $contMediana_EduPub_Hombre ++;
                        $residencias['MedEduPubHom'] ++;
                    }
                    if ($sexo == 'M') {
                        $contMediana_EduPub_Mujer ++;
                        $residencias['MedEduPubMuj'] ++;
                    }
                }
                if (($sector == 'SECTOR PRIVADO EDUCATIVO') OR ($sector == 'SECTOR EDUCATIVO PRIVADO'))
                {
                    if ($sexo == 'H') {
                        $contMediana_EduPriv_Hombre ++;
                        $residencias['MedEduPriHom'] ++;
                    }
                    if ($sexo == 'M') {
                        $contMediana_EduPriv_Mujer ++;
                        $residencias['MedEduPriMuj'] ++;
                    }
                }
            }
            if ($tipo == 'PEQUENA')
            {
                if ($sector == '') 
                {
                    if ($sexo == 'H') {
                        $contPequena_Priv_Hombre ++;
                        $residencias['PeqPriHom'] ++;
                    }
                    if ($sexo == 'M') {
                        $contPequena_Priv_Mujer ++;
                        $residencias['PeqPriMuj'] ++;
                    }
                }
                if ($sector == 'SECTOR PUBLICO')
                {
                    if ($sexo == 'H') {
                        $contPequena_Pub_Hombre ++;
                        $residencias['PeqPubHom'] ++;
                    }
                    if ($sexo == 'M') {
                        $contPequena_Pub_Mujer ++;
                        $residencias['PeqPubMuj'] ++;
                    }
                }
                if (($sector == 'SECTOR PUBLICO EDUCATIVO') OR ($sector == 'SECTOR EDUCATIVO PUBLICO'))
                {
                    if ($sexo == 'H') {
                        $contPequena_EduPub_Hombre ++;
                        $residencias['PeqEduPubHom'] ++;
                    }
                    if ($sexo == 'M') {
                        $contPequena_EduPub_Mujer ++;
                        $residencias['PeqEduPubMuj'] ++;
                    }
                }
                if (($sector == 'SECTOR PRIVADO EDUCATIVO') OR ($sector == 'SECTOR EDUCATIVO PRIVADO'))
                {
                    if ($sexo == 'H') {
                        $contPequena_EduPriv_Hombre ++;
                        $residencias['PeqEduPriHom'] ++;
                    }
                    if ($sexo == 'M') {
                        $contPequena_EduPriv_Mujer ++;
                        $residencias['PeqEduPriMuj'] ++;
                    }
                }
            }

            if ($tipo == 'MICRO')
            {
                if ($sector == '')
                {
                    if ($sexo == 'H') {
                        $contMicro_Priv_Hombre ++;
                        $residencias['MicPriHom'] ++;
                    }
                    if ($sexo == 'M') {
                        $contMicro_Priv_Mujer ++;
                        $residencias['MicPriMuj'] ++;
                    }
                }
                if ($sector == 'SECTOR PUBLICO')
                {
                    if ($sexo == 'H') {
                        $contMicro_Pub_Hombre ++;
                        $residencias['MicPubHom'] ++;
                    }
                    if ($sexo == 'M') {
                        $contMicro_Pub_Mujer ++;
                        $residencias['MicPubMuj'] ++;
                    }
                }
                if (($sector == 'SECTOR PUBLICO EDUCATIVO') OR ($sector == 'SECTOR EDUCATIVO PUBLICO'))
                {
                    if ($sexo == 'H') {
                        $contMicro_EduPub_Hombre ++;
                        $residencias['MicEduPubHom'] ++;
                    }
                    if ($sexo == 'M') {
                        $contMicro_EduPub_Mujer ++;
                        $residencias['MicEduPubMuj'] ++;
                    }
                }
                if (($sector == 'SECTOR PRIVADO EDUCATIVO') OR ($sector == 'SECTOR EDUCATIVO PRIVADO'))
                {
                    if ($sexo == 'H') {
                        $contMicro_EduPriv_Hombre ++;
                        $residencias['MicEduPriHom'] ++;
                    }
                    if ($sexo == 'M') {
                        $contMicro_EduPriv_Mujer ++;
                        $residencias['MicEduPriMuj'] ++;
                    }
                }
            }

            //echo ("Grandes Privadas: $contGrande_Priv_Hombre </br>");

            //print_r($residencias);

        }


        function reporteResidencias1($swPrintHeadings, $myResidencia, $tabla, $BDSeleccionada, $db, $host, $user, $pwd, $base_datos, $swPerEsc)
        {

            // variables para totales
            global $totalGrande_Priv_Hombre, $totalGrande_Priv_Mujer, $totalGrande_Pub_Hombre,
            $totalGrande_Pub_Mujer, $totalGrande_EduPub_Hombre, $totalGrande_EduPub_Mujer,
            $totalGrande_EduPriv_Hombre, $totalGrande_EduPriv_Mujer, $totalMediana_Priv_Hombre,
            $totalMediana_Priv_Mujer, $totalMediana_Pub_Hombre, $totalMediana_Pub_Mujer,
            $totalMediana_EduPub_Hombre, $totalMediana_EduPub_Mujer, $totalMediana_EduPriv_Hombre,
            $totalMediana_EduPriv_Mujer, $totalPequena_Priv_Hombre, $totalPequena_Priv_Mujer,
            $totalPequena_Pub_Hombre, $totalPequena_Pub_Mujer, $totalPequena_EduPub_Hombre,
            $totalPequena_EduPub_Mujer, $totalPequena_EduPriv_Hombre, $totalPequena_EduPriv_Mujer,
            $totalMicro_Priv_Hombre, $totalMicro_Priv_Mujer, $totalMicro_Pub_Hombre,
            $totalMicro_Pub_Mujer, $totalMicro_EduPub_Hombre, $totalMicro_EduPub_Mujer,
            $totalMicro_EduPriv_Hombre, $totalMicro_EduPriv_Mujer;
            
            global $totalHombreGral;
            global $totalMujerGral;
            global $totalGral;      
           
            global $residencias;
            
            //echo ("switch: $swPrintHeadings query: $consulta rubro: $rubro");

            //CONSULTA para obtener carreras
            //validar si reporte es por periodo escolar
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

                $consulta = "select distinct carrera from $tabla where (periodo = '$BDSeleccionada' or periodo = '$periodo2') group by carrera";
            } // FIN validacion si es por ciclo escolar

            // Reporte es por Semestre
            else {

                $consulta = "select distinct carrera from $tabla where (periodo = '$BDSeleccionada') group by carrera";

            }  // FIN analisis si reporte es por periodo escolar o por semestre 


            # CONSULTA por carrera
            $query = $consulta;
            $result = $db->query($query);
            //echo "$query </br>";

           # Ciclo para recorrer las carreras
           while($row = $result->fetch_assoc()) {

              
                
                $residencias['GraPriHom']       = 0;
                $residencias['GraPriMuj']       = 0;
                $residencias['GraPubHom']       = 0;
                $residencias['GraPubMuj']       = 0;
                $residencias['GraEduPubHom']    = 0;
                $residencias['GraEduPubMuj']    = 0;
                $residencias['GraEduPriHom']    = 0;
                $residencias['GraEduPriMuj']    = 0;

                $residencias['MedPriHom']       = 0;
                $residencias['MedPriMuj']       = 0;
                $residencias['MedPubHom']       = 0;
                $residencias['MedPubMuj']       = 0;
                $residencias['MedEduPubHom']    = 0;
                $residencias['MedEduPubMuj']    = 0;
                $residencias['MedEduPriHom']    = 0;
                $residencias['MedEduPriMuj']    = 0;

                $residencias['PeqPriHom']       = 0;
                $residencias['PeqPriMuj']       = 0;
                $residencias['PeqPubHom']       = 0;
                $residencias['PeqPubMuj']       = 0;
                $residencias['PeqEduPubHom']    = 0;    
                $residencias['PeqEduPubMuj']    = 0;     
                $residencias['PeqEduPriHom']    = 0;    
                $residencias['PeqEduPriMuj']    = 0;    

                $residencias['MicPriHom']       = 0; 
                $residencias['MicPriMuj']       = 0; 
                $residencias['MicPubHom']       = 0; 
                $residencias['MicPubMuj']       = 0;  
                $residencias['MicEduPubHom']    = 0;    
                $residencias['MicEduPubMuj']    = 0;    
                $residencias['MicEduPriHom']    = 0;    
                $residencias['MicEduPriMuj']    = 0;    

                //echo "Num Control: $row[num_control] nombre: $row[nombre] sexo: $row[sexo] </br>";
                $rubro = trim($row['carrera']);

                // CONSULTA por cada carrera
                // validar si reporte es por ciclo escolar
                if ($swPerEsc == "1") {

                    $consulta_carrera = "SELECT distinct carrera, num_control, nombre, sexo, telefono, correo, empresa, nombre_proyecto, asesor_interno, fecha_inicio, fecha_termino FROM $tabla where ((periodo = '$BDSeleccionada' or periodo = '$periodo2') and (carrera = '$rubro')) GROUP BY carrera, id";
                }

                // reporte por semestre
                else {

                    $consulta_carrera = "SELECT distinct carrera, num_control, nombre, sexo, telefono, correo, empresa, nombre_proyecto, asesor_interno, fecha_inicio, fecha_termino FROM $tabla where ((periodo = '$BDSeleccionada') and (carrera = '$rubro')) GROUP BY carrera, id";
                }
                
                // Ejecutar consulta
                $query_carrera = $consulta_carrera;
                $result_carrera = $db->query($query_carrera);
                //echo "$query_carrera </br>";

                //Ciclo del Detalle del Reporte revisando el tipo y sector de cada empresa
                while($row_carrera = $result_carrera->fetch_assoc()) {

                    $empresa = trim($row_carrera['empresa']);
                    $sexo = $row_carrera['sexo'];

                    #Obtener Empresa, Tipo y Sector
                    if ($empresa != '')
                    {
                        $db2 = new mysqli($host, $user, $pwd, $base_datos);
                        $query2 = "select distinct nombre, tipo, sector from empresas where nombre = '$empresa'";
                        $result2 = $db2->query($query2);
                        
                        if ($result2->num_rows == 0)
                        {
                            echo ("NumControl: $row[num_control] $empresa no encontrada </br>");
                        }
                        else
                        {
                            $row2 = $result2->fetch_assoc();
                            $tipo = $row2['tipo'];
                            $sector = $row2['sector'];
                            //echo "tipo: $tipo sector:$sector sexo:$sexo </br>";

                            $myResidencia -> armarReporte($tipo, $sector, $sexo);
                        }
                    }
                    else
                    {
                        echo ("REVISAR registro con Num Control: $row[num_control] con empresa NULL</br>"); 
                    }

                } // while por cada carrera

                //print_r($residencias);

                $myResidencia -> imprimirReporte1($rubro, $swPrintHeadings);

                $swPrintHeadings = 1;

            } // While que recorre todas las carreras

            // Imprimir totales generales
            print <<<EOF

            <tr>
                <th id="TotalesChico">Totales                     </th>
                <th id="TotalesChico">$totalGrande_Priv_Hombre    </th>
                <th id="TotalesChico">$totalGrande_Priv_Mujer     </th>
                <th id="TotalesChico">$totalGrande_Pub_Hombre     </th>
                <th id="TotalesChico">$totalGrande_Pub_Mujer      </th>
                <th id="TotalesChico">$totalGrande_EduPub_Hombre  </th>
                <th id="TotalesChico">$totalGrande_EduPub_Mujer   </th>
                <th id="TotalesChico">$totalGrande_EduPriv_Hombre </th>
                <th id="TotalesChico">$totalGrande_EduPriv_Mujer  </th>
                <th id="TotalesChico">$totalMediana_Priv_Hombre   </th>
                <th id="TotalesChico">$totalMediana_Priv_Mujer    </th>
                <th id="TotalesChico">$totalMediana_Pub_Hombre    </th>
                <th id="TotalesChico">$totalMediana_Pub_Mujer     </th>
                <th id="TotalesChico">$totalMediana_EduPub_Hombre </th>
                <th id="TotalesChico">$totalMediana_EduPub_Mujer  </th>
                <th id="TotalesChico">$totalMediana_EduPriv_Hombre</th>
                <th id="TotalesChico">$totalMediana_EduPriv_Mujer </th>
                <th id="TotalesChico">$totalPequena_Priv_Hombre   </th>
                <th id="TotalesChico">$totalPequena_Priv_Mujer    </th>
                <th id="TotalesChico">$totalPequena_Pub_Hombre    </th>
                <th id="TotalesChico">$totalPequena_Pub_Mujer     </th>
                <th id="TotalesChico">$totalPequena_EduPub_Hombre </th>
                <th id="TotalesChico">$totalPequena_EduPub_Mujer  </th>
                <th id="TotalesChico">$totalPequena_EduPriv_Hombre</th>
                <th id="TotalesChico">$totalPequena_EduPriv_Mujer </th>
                <th id="TotalesChico">$totalMicro_Priv_Hombre     </th>
                <th id="TotalesChico">$totalMicro_Priv_Mujer      </th>
                <th id="TotalesChico">$totalMicro_Pub_Hombre      </th>
                <th id="TotalesChico">$totalMicro_Pub_Mujer       </th>
                <th id="TotalesChico">$totalMicro_EduPub_Hombre   </th>
                <th id="TotalesChico">$totalMicro_EduPub_Mujer    </th>
                <th id="TotalesChico">$totalMicro_EduPriv_Hombre  </th>
                <th id="TotalesChico">$totalMicro_EduPriv_Mujer   </th> 
                <th id="TotalesChico">$totalHombreGral            </th>
                <th id="TotalesChico">$totalMujerGral             </th>
                <th id="TotalesChico">$totalGral                  </th>
            </tr>
EOF;

        }


        
        function imprimirReporte1($rubro, $swPrintHeadings)
        {

            // Variables para calculos de totales
            global $totalGrande_Priv_Hombre, $totalGrande_Priv_Mujer, $totalGrande_Pub_Hombre,
            $totalGrande_Pub_Mujer, $totalGrande_EduPub_Hombre, $totalGrande_EduPub_Mujer,
            $totalGrande_EduPriv_Hombre, $totalGrande_EduPriv_Mujer, $totalMediana_Priv_Hombre,
            $totalMediana_Priv_Mujer, $totalMediana_Pub_Hombre, $totalMediana_Pub_Mujer,
            $totalMediana_EduPub_Hombre, $totalMediana_EduPub_Mujer, $totalMediana_EduPriv_Hombre,
            $totalMediana_EduPriv_Mujer, $totalPequena_Priv_Hombre, $totalPequena_Priv_Mujer,
            $totalPequena_Pub_Hombre, $totalPequena_Pub_Mujer, $totalPequena_EduPub_Hombre,
            $totalPequena_EduPub_Mujer, $totalPequena_EduPriv_Hombre, $totalPequena_EduPriv_Mujer,
            $totalMicro_Priv_Hombre, $totalMicro_Priv_Mujer, $totalMicro_Pub_Hombre,
            $totalMicro_Pub_Mujer, $totalMicro_EduPub_Hombre, $totalMicro_EduPub_Mujer,
            $totalMicro_EduPriv_Hombre, $totalMicro_EduPriv_Mujer;
            
            global $totalHombreGral;
            global $totalMujerGral;
            global $totalGral; 
            
            $total_Hombre               = 0;
            $total_Mujer                = 0;
            $total_rubro                = 0;

            global $residencias;

            $total_Hombre = $residencias['GraPriHom']    +  
                            $residencias['GraPubHom']    + 
                            $residencias['GraEduPubHom'] + 
                            $residencias['GraEduPriHom'] + 
                            $residencias['MedPriHom']    + 
                            $residencias['MedPubHom']    + 
                            $residencias['MedEduPubHom'] + 
                            $residencias['MedEduPriHom'] + 
                            $residencias['PeqPriHom']    + 
                            $residencias['PeqPubHom']    + 
                            $residencias['PeqEduPubHom'] + 
                            $residencias['PeqEduPriHom'] +  
                            $residencias['MicPriHom']    + 
                            $residencias['MicPubHom']    + 
                            $residencias['MicEduPubHom'] + 
                            $residencias['MicEduPriHom']; 

            $total_Mujer =  $residencias['GraPriMuj']    + 
                            $residencias['GraPubMuj']    +
                            $residencias['GraEduPubMuj'] +
                            $residencias['GraEduPriMuj'] +
                            $residencias['MedPriMuj']    +
                            $residencias['MedPubMuj']    +
                            $residencias['MedEduPubMuj'] +
                            $residencias['MedEduPriMuj'] +
                            $residencias['PeqPriMuj']    +
                            $residencias['PeqPubMuj']    +
                            $residencias['PeqEduPubMuj'] +
                            $residencias['PeqEduPriMuj'] + 
                            $residencias['MicPriMuj']    +
                            $residencias['MicPubMuj']    +
                            $residencias['MicEduPubMuj'] +
                            $residencias['MicEduPriMuj'];

            $total_rubro = $total_Hombre + $total_Mujer;

            if ($swPrintHeadings == 0)
            {
                    print <<<EOF
                    </br>
                    <tr>
                        <th rowspan=3 id="subEncabezado"> Carreras    </th>
                        <th colspan=8 id="subEncabezado"> Grande      </th>
                        <th colspan=8 id="subEncabezado"> Mediana     </th>
                        <th colspan=8 id="subEncabezado"> Pequeña     </th>
                        <th colspan=8 id="subEncabezado"> Micro       </th>
                        <th colspan=3 id="subEncabezado" rowspan=2> Total </th>
                    </tr>
                    <tr>
                        <th colspan=2 id="subEncabezado" nowrap> Priv   </th>
                        <th colspan=2 id="subEncabezado" nowrap> Publ   </th>
                        <th colspan=2 id="subEncabezado" nowrap> E. Pub </th>
                        <th colspan=2 id="subEncabezado" nowrap> E. Pri </th>
                        <th colspan=2 id="subEncabezado" nowrap> Priv   </th>
                        <th colspan=2 id="subEncabezado" nowrap> Publ   </th>
                        <th colspan=2 id="subEncabezado" nowrap> E. Pub </th>
                        <th colspan=2 id="subEncabezado" nowrap> E. Pri </th>
                        <th colspan=2 id="subEncabezado" nowrap> Priv   </th>
                        <th colspan=2 id="subEncabezado" nowrap> Publ   </th>
                        <th colspan=2 id="subEncabezado" nowrap> E. Pub </th>
                        <th colspan=2 id="subEncabezado" nowrap> E. Pri </th>  
                        <th colspan=2 id="subEncabezado" nowrap> Priv   </th>
                        <th colspan=2 id="subEncabezado" nowrap> Publ   </th>
                        <th colspan=2 id="subEncabezado" nowrap> E. Pub </th>
                        <th colspan=2 id="subEncabezado" nowrap> E. Pri </th>
                    </tr>
                    <tr">
                        <td id="subEncabezado"> H                       </td>
                        <td id="subEncabezado"> M                       </td>
                        <td id="subEncabezado"> H                       </td>
                        <td id="subEncabezado"> M                       </td>
                        <td id="subEncabezado"> H                       </td>
                        <td id="subEncabezado"> M                       </td>
                        <td id="subEncabezado"> H                       </td>
                        <td id="subEncabezado"> M                       </td>
                        <td id="subEncabezado"> H                       </td>
                        <td id="subEncabezado"> M                       </td>
                        <td id="subEncabezado"> H                       </td>
                        <td id="subEncabezado"> M                       </td>
                        <td id="subEncabezado"> H                       </td>
                        <td id="subEncabezado"> M                       </td>
                        <td id="subEncabezado"> H                       </td>
                        <td id="subEncabezado"> M                       </td>
                        <td id="subEncabezado"> H                       </td>
                        <td id="subEncabezado"> M                       </td>
                        <td id="subEncabezado"> H                       </td>
                        <td id="subEncabezado"> M                       </td>
                        <td id="subEncabezado"> H                       </td>
                        <td id="subEncabezado"> M                       </td>
                        <td id="subEncabezado"> H                       </td>
                        <td id="subEncabezado"> M                       </td>
                        <td id="subEncabezado"> H                       </td>
                        <td id="subEncabezado"> M                       </td>
                        <td id="subEncabezado"> H                       </td>
                        <td id="subEncabezado"> M                       </td>
                        <td id="subEncabezado"> H                       </td>
                        <td id="subEncabezado"> M                       </td>
                        <td id="subEncabezado"> H                       </td>
                        <td id="subEncabezado"> M                       </td>
                        <td id="subEncabezado"> H                       </td>
                        <td id="subEncabezado"> M                       </td>
                        <td id="subEncabezado"> Tot                     </td>
                    </tr>
EOF;
            }

            print <<<EOF
        
            <tr id="trChico">

                <td id="DetalleChico">$rubro    </td>
                <td id="DetalleChico">$residencias[GraPriHom]       </td>
                <td id="DetalleChico">$residencias[GraPriMuj]       </td>
                <td id="DetalleChico">$residencias[GraPubHom]       </td>
                <td id="DetalleChico">$residencias[GraPubMuj]       </td>
                <td id="DetalleChico">$residencias[GraEduPubHom]    </td>
                <td id="DetalleChico">$residencias[GraEduPubMuj]    </td>
                <td id="DetalleChico">$residencias[GraEduPriHom]    </td>
                <td id="DetalleChico">$residencias[GraEduPriMuj]    </td>
       
                <td id="DetalleChico">$residencias[MedPriHom]       </td>
                <td id="DetalleChico">$residencias[MedPriMuj]       </td>
                <td id="DetalleChico">$residencias[MedPubHom]       </td>
                <td id="DetalleChico">$residencias[MedPubMuj]       </td>
                <td id="DetalleChico">$residencias[MedEduPubHom]    </td>
                <td id="DetalleChico">$residencias[MedEduPubMuj]    </td>
                <td id="DetalleChico">$residencias[MedEduPriHom]    </td>
                <td id="DetalleChico">$residencias[MedEduPriMuj]    </td>

                <td id="DetalleChico">$residencias[PeqPriHom]       </td>
                <td id="DetalleChico">$residencias[PeqPriMuj]       </td>
                <td id="DetalleChico">$residencias[PeqPubHom]       </td>
                <td id="DetalleChico">$residencias[PeqPubMuj]       </td>
                <td id="DetalleChico">$residencias[PeqEduPubHom]    </td>
                <td id="DetalleChico">$residencias[PeqEduPubMuj]    </td>
                <td id="DetalleChico">$residencias[PeqEduPriHom]    </td>
                <td id="DetalleChico">$residencias[PeqEduPriMuj]    </td>

                <td id="DetalleChico">$residencias[MicPriHom]       </td>
                <td id="DetalleChico">$residencias[MicPriMuj]       </td>
                <td id="DetalleChico">$residencias[MicPubHom]       </td>
                <td id="DetalleChico">$residencias[MicPubMuj]       </td>
                <td id="DetalleChico">$residencias[MicEduPubHom]    </td>
                <td id="DetalleChico">$residencias[MicEduPubMuj]    </td>
                <td id="DetalleChico">$residencias[MicEduPriHom]    </td>
                <td id="DetalleChico">$residencias[MicEduPriMuj]    </td>

                <td id="DetalleChico">$total_Hombre                 </td>
                <td id="DetalleChico">$total_Mujer                  </td>
                <td id="DetalleChico">$total_rubro                  </td>
               
            </tr>
            
EOF;
            # Actualizar totales generales
            $totalGrande_Priv_Hombre    = $totalGrande_Priv_Hombre      + $residencias[GraPriHom];
            $totalGrande_Priv_Mujer     = $totalGrande_Priv_Mujer       + $residencias[GraPriMuj];
            $totalGrande_Pub_Hombre     = $totalGrande_Pub_Hombre       + $residencias[GraPubHom];
            $totalGrande_Pub_Mujer      = $totalGrande_Pub_Mujer        + $residencias[GraPubMuj];
            $totalGrande_EduPub_Hombre  = $totalGrande_EduPub_Hombre    + $residencias[GraEduPubHom];
            $totalGrande_EduPub_Mujer   = $totalGrande_EduPub_Mujer     + $residencias[GraEduPubMuj];
            $totalGrande_EduPriv_Hombre = $totalGrande_EduPriv_Hombre   + $residencias[GraEduPriHom];
            $totalGrande_EduPriv_Mujer  = $totalGrande_EduPriv_Mujer    + $residencias[GraEduPriMuj];
            
            $totalMediana_Priv_Hombre    = $totalMediana_Priv_Hombre    + $residencias[MedPriHom];
            $totalMediana_Priv_Mujer     = $totalMediana_Priv_Mujer     + $residencias[MedPriMuj];
            $totalMediana_Pub_Hombre     = $totalMediana_Pub_Hombre     + $residencias[MedPubHom];
            $totalMediana_Pub_Mujer      = $totalMediana_Pub_Mujer      + $residencias[MedPubMuj];
            $totalMediana_EduPub_Hombre  = $totalMediana_EduPub_Hombre  + $residencias[MedEduPubHom];
            $totalMediana_EduPub_Mujer   = $totalMediana_EduPub_Mujer   + $residencias[MedEduPubMuj];
            $totalMediana_EduPriv_Hombre = $totalMediana_EduPriv_Hombre + $residencias[MedEduPriHom];
            $totalMediana_EduPriv_Mujer  = $totalMediana_EduPriv_Mujer  + $residencias[MedEduPriMuj];
            
            $totalPequena_Priv_Hombre    = $totalPequena_Priv_Hombre    + $residencias[PeqPriHom];
            $totalPequena_Priv_Mujer     = $totalPequena_Priv_Mujer     + $residencias[PeqPriMuj];
            $totalPequena_Pub_Hombre     = $totalPequena_Pub_Hombre     + $residencias[PeqPubHom];
            $totalPequena_Pub_Mujer      = $totalPequena_Pub_Mujer      + $residencias[PeqPubMuj];
            $totalPequena_EduPub_Hombre  = $totalPequena_EduPub_Hombre  + $residencias[PeqEduPubHom];
            $totalPequena_EduPub_Mujer   = $totalPequena_EduPub_Mujer   + $residencias[PeqEduPubMuj];
            $totalPequena_EduPriv_Hombre = $totalPequena_EduPriv_Hombre + $residencias[PeqEduPriHom];
            $totalPequena_EduPriv_Mujer  = $totalPequena_EduPriv_Mujer  + $residencias[PeqEduPriMuj];

            $totalMicro_Priv_Hombre      = $totalMicro_Priv_Hombre      + $residencias[MicPriHom];
            $totalMicro_Priv_Mujer       = $totalMicro_Priv_Mujer       + $residencias[MicPriMuj];
            $totalMicro_Pub_Hombre       = $totalMicro_Pub_Hombre       + $residencias[MicPubHom];
            $totalMicro_Pub_Mujer        = $totalMicro_Pub_Mujer        + $residencias[MicPubMuj];
            $totalMicro_EduPub_Hombre    = $totalMicro_EduPub_Hombre    + $residencias[MicEduPubHom];
            $totalMicro_EduPub_Mujer     = $totalMicro_EduPub_Mujer     + $residencias[MicEduPubMuj];
            $totalMicro_EduPriv_Hombre   = $totalMicro_EduPriv_Hombre   + $residencias[MicEduPriHom];
            $totalMicro_EduPriv_Mujer    = $totalMicro_EduPriv_Mujer    + $residencias[MicEduPriMuj];
            
            $totalHombreGral = $totalHombreGral + $total_Hombre;
            $totalMujerGral = $totalMujerGral + $total_Mujer;
            $totalGral = $totalGral + $total_rubro ;
            
        }

    }
?>