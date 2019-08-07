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
            global $contGrande_Priv_Hombre;
            global $contGrande_Priv_Mujer;
            global $contGrande_Pub_Hombre;
            global $contGrande_Pub_Mujer;
            global $contGrande_EduPub_Hombre;
            global $contGrande_EduPub_Mujer;
            global $contGrande_EduPriv_Hombre;
            global $contGrande_EduPriv_Mujer;
            global $contMediana_Priv_Hombre;
            global $contMediana_Priv_Mujer;
            global $contMediana_Pub_Hombre;
            global $contMediana_Pub_Mujer;
            global $contMediana_EduPub_Hombre;
            global $contMediana_EduPub_Mujer;
            global $contMediana_EduPriv_Hombre;
            global $contMediana_EduPriv_Mujer;
            global $contPequena_Priv_Hombre;
            global $contPequena_Priv_Mujer;
            global $contPequena_Pub_Hombre;
            global $contPequena_Pub_Mujer;
            global $contPequena_EduPub_Hombre;
            global $contPequena_EduPub_Mujer;
            global $contPequena_EduPriv_Hombre;
            global $contPequena_EduPriv_Mujer;
            global $contMicro_Priv_Hombre;
            global $contMicro_Priv_Mujer;
            global $contMicro_Pub_Hombre;
            global $contMicro_Pub_Mujer;
            global $contMicro_EduPub_Hombre;
            global $contMicro_EduPub_Mujer;
            global $contMicro_EduPriv_Hombre;
            global $contMicro_EduPriv_Mujer;

            if ($tipo == 'GRANDE')
            {
                if ($sector == '')
                {
                    if ($sexo == 'H')
                        $contGrande_Priv_Hombre ++;
                    if ($sexo == 'M')
                        $contGrande_Priv_Mujer ++;
                    //echo"H: $contGrande_Priv_Hombre  M:$contGrande_Priv_Mujer<br>";
                }
                if ($sector == 'SECTOR PUBLICO')
                {
                    if ($sexo == 'H')
                        $contGrande_Pub_Hombre ++;
                    if ($sexo == 'M')
                        $contGrande_Pub_Mujer ++;
                }
                if (($sector == 'SECTOR PUBLICO EDUCATIVO') OR ($sector == 'SECTOR EDUCATIVO PUBLICO'))
                {
                    if ($sexo == 'H')
                        $contGrande_EduPub_Hombre ++;
                    if ($sexo == 'M')
                        $contGrande_EduPub_Mujer ++;
                }
                if (($sector == 'SECTOR PRIVADO EDUCATIVO') OR ($sector == 'SECTOR EDUCATIVO PRIVADO'))
                {
                    if ($sexo == 'H')
                        $contGrande_EduPriv_Hombre ++;
                    if ($sexo == 'M')
                        $contGrande_EduPriv_Mujer ++;
                }
            }
            if ($tipo == 'MEDIANA')
            {
                if ($sector == '')
                {
                    if ($sexo == 'H')
                        $contMediana_Priv_Hombre ++;
                    if ($sexo == 'M')
                        $contMediana_Priv_Mujer ++;
                }
                if ($sector == 'SECTOR PUBLICO')
                {
                    if ($sexo == 'H')
                        $contMediana_Pub_Hombre ++;
                    if ($sexo == 'M')
                        $contMediana_Pub_Mujer ++;
                }
                if (($sector == 'SECTOR PUBLICO EDUCATIVO') OR ($sector == 'SECTOR EDUCATIVO PUBLICO'))
                {
                    if ($sexo == 'H')
                        $contMediana_EduPub_Hombre ++;
                    if ($sexo == 'M')
                        $contMediana_EduPub_Mujer ++;
                }
                if (($sector == 'SECTOR PRIVADO EDUCATIVO') OR ($sector == 'SECTOR EDUCATIVO PRIVADO'))
                {
                    if ($sexo == 'H')
                        $contMediana_EduPriv_Hombre ++;
                    if ($sexo == 'M')
                        $contMediana_EduPriv_Mujer ++;
                }
            }
            if ($tipo == 'PEQUENA')
            {
                if ($sector == '')
                {
                    if ($sexo == 'H')
                        $contPequena_Priv_Hombre ++;
                    if ($sexo == 'M')
                        $contPequena_Priv_Mujer ++;
                }
                if ($sector == 'SECTOR PUBLICO')
                {
                    if ($sexo == 'H')
                        $contPequena_Pub_Hombre ++;
                    if ($sexo == 'M')
                        $contPequena_Pub_Mujer ++;
                }
                if (($sector == 'SECTOR PUBLICO EDUCATIVO') OR ($sector == 'SECTOR EDUCATIVO PUBLICO'))
                {
                    if ($sexo == 'H')
                        $contPequena_EduPub_Hombre ++;
                    if ($sexo == 'M')
                        $contPequena_EduPub_Mujer ++;
                }
                if (($sector == 'SECTOR PRIVADO EDUCATIVO') OR ($sector == 'SECTOR EDUCATIVO PRIVADO'))
                {
                    if ($sexo == 'H')
                        $contPequena_EduPriv_Hombre ++;
                    if ($sexo == 'M')
                        $contPequena_EduPriv_Mujer ++;
                }
            }

            if ($tipo == 'MICRO')
            {
                if ($sector == '')
                {
                    if ($sexo == 'H')
                        $contMicro_Priv_Hombre ++;
                    if ($sexo == 'M')
                        $contMicro_Priv_Mujer ++;
                }
                if ($sector == 'SECTOR PUBLICO')
                {
                    if ($sexo == 'H')
                        $contMicro_Pub_Hombre ++;
                    if ($sexo == 'M')
                        $contMicro_Pub_Mujer ++;
                }
                if (($sector == 'SECTOR PUBLICO EDUCATIVO') OR ($sector == 'SECTOR EDUCATIVO PUBLICO'))
                {
                    if ($sexo == 'H')
                        $contMicro_EduPub_Hombre ++;
                    if ($sexo == 'M')
                        $contMicro_EduPub_Mujer ++;
                }
                if (($sector == 'SECTOR PRIVADO EDUCATIVO') OR ($sector == 'SECTOR EDUCATIVO PRIVADO'))
                {
                    if ($sexo == 'H')
                        $contMicro_EduPriv_Hombre ++;
                    if ($sexo == 'M')
                        $contMicro_EduPriv_Mujer ++;
                }
            }

            //echo ("Grandes Privadas: $contGrande_Priv_Hombre </br>");
        

        }


        function reporteResidencias1($swPrintHeadings, $myResidencia, $BDSeleccionada, $db, $host, $user, $pwd, $base_datos)
        {
            global $contGrande_Priv_Hombre;
            global $contGrande_Priv_Mujer;
            global $contGrande_Pub_Hombre;
            global $contGrande_Pub_Mujer;
            global $contGrande_EduPub_Hombre;
            global $contGrande_EduPub_Mujer;
            global $contGrande_EduPriv_Hombre;
            global $contGrande_EduPriv_Mujer;
            global $contMediana_Priv_Hombre;
            global $contMediana_Priv_Mujer;
            global $contMediana_Pub_Hombre;
            global $contMediana_Pub_Mujer;
            global $contMediana_EduPub_Hombre;
            global $contMediana_EduPub_Mujer;
            global $contMediana_EduPriv_Hombre;
            global $contMediana_EduPriv_Mujer;
            global $contPequena_Priv_Hombre;
            global $contPequena_Priv_Mujer;
            global $contPequena_Pub_Hombre;
            global $contPequena_Pub_Mujer;
            global $contPequena_EduPub_Hombre;
            global $contPequena_EduPub_Mujer;
            global $contPequena_EduPriv_Hombre;
            global $contPequena_EduPriv_Mujer;
            global $contMicro_Priv_Hombre;
            global $contMicro_Priv_Mujer;
            global $contMicro_Pub_Hombre;
            global $contMicro_Pub_Mujer;
            global $contMicro_EduPub_Hombre;
            global $contMicro_EduPub_Mujer;
            global $contMicro_EduPriv_Hombre;
            global $contMicro_EduPriv_Mujer;
            
            //echo ("switch: $swPrintHeadings query: $consulta rubro: $rubro");

            $consulta = "select distinct carrera from $BDSeleccionada group by carrera";

            # Consulta por carrera
            $query = $consulta;
            $result = $db->query($query);
            //echo "$query </br>";

           # Ciclo para recorrer las carreras
           while( $row = $result->fetch_assoc()) {

                $contGrande_Priv_Hombre     = 0;
                $contGrande_Priv_Mujer      = 0;
                $contGrande_Pub_Hombre      = 0;
                $contGrande_Pub_Mujer       = 0;
                $contGrande_EduPub_Hombre   = 0;
                $contGrande_EduPub_Mujer    = 0;
                $contGrande_EduPriv_Hombre  = 0;
                $contGrande_EduPriv_Mujer   = 0;
                $contMediana_Priv_Hombre    = 0;
                $contMediana_Priv_Mujer     = 0;
                $contMediana_Pub_Hombre     = 0;
                $contMediana_Pub_Mujer      = 0;
                $contMediana_EduPub_Hombre  = 0;
                $contMediana_EduPub_Mujer   = 0;
                $contMediana_EduPriv_Hombre = 0;
                $contMediana_EduPriv_Mujer  = 0;
                $contPequena_Priv_Hombre    = 0;
                $contPequena_Priv_Mujer     = 0;
                $contPequena_Pub_Hombre     = 0;
                $contPequena_Pub_Mujer      = 0;
                $contPequena_EduPub_Hombre  = 0;
                $contPequena_EduPub_Mujer   = 0;
                $contPequena_EduPriv_Hombre = 0;
                $contPequena_EduPriv_Mujer  = 0;
                $contMicro_Priv_Hombre      = 0;
                $contMicro_Priv_Mujer       = 0;
                $contMicro_Pub_Hombre       = 0;
                $contMicro_Pub_Mujer        = 0;
                $contMicro_EduPub_Hombre    = 0;
                $contMicro_EduPub_Mujer     = 0;
                $contMicro_EduPriv_Hombre   = 0;
                $contMicro_EduPriv_Mujer    = 0;

                //echo "Num Control: $row[num_control] nombre: $row[nombre] sexo: $row[sexo] </br>";
                $rubro = trim($row[carrera]);

                // Consulta por cada carrera
                $consulta_carrera = "SELECT distinct carrera, num_control, nombre, sexo, telefono, correo, empresa, nombre_proyecto, asesor_interno, fecha_inicio, fecha_termino FROM $BDSeleccionada where carrera = '$rubro' GROUP BY carrera, id";
                
                // Ejecutar consulta
                $query_carrera = $consulta_carrera;
                $result_carrera = $db->query($query_carrera);
                //echo "$query_carrera </br>";

                //Ciclo del Detalle del Reporte
                while($row_carrera = $result_carrera->fetch_assoc()) {

                    $empresa = trim($row_carrera[empresa]);
                    $sexo = $row_carrera[sexo];

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
                            $tipo = $row2[tipo];
                            $sector = $row2[sector];
                            //echo "tipo: $tipo sector:$sector sexo:$sexo </br>";

                            $myResidencia -> armarReporte($tipo, $sector, $sexo);
                        }
                    }
                    else
                    {
                        echo ("REVISAR registro con Num Control: $row[num_control] con empresa NULL</br>"); 
                    }

                } // while por cada carrera

                $myResidencia -> imprimirReporte1($rubro, $contGrande_Priv_Hombre, $contGrande_Priv_Mujer,  $contGrande_Pub_Hombre, $contGrande_Pub_Mujer, $contGrande_EduPub_Hombre, $contGrande_EduPub_Mujer, $contGrande_EduPriv_Hombre, $contGrande_EduPriv_Mujer,$contMediana_Priv_Hombre, $contMediana_Priv_Mujer, $contMediana_Pub_Hombre, $contMediana_Pub_Mujer, $contMediana_EduPub_Hombre, $contMediana_EduPub_Mujer, $contMediana_EduPriv_Hombre, $contMediana_EduPriv_Mujer, $contPequena_Priv_Hombre, $contPequena_Priv_Mujer, $contPequena_Pub_Hombre, $contPequena_Pub_Mujer, $contPequena_EduPub_Hombre, $contPequena_EduPub_Mujer, $contPequena_EduPriv_Hombre, $contPequena_EduPriv_Mujer, $contMicro_Priv_Hombre, $contMicro_Priv_Mujer, $contMicro_Pub_Hombre, $contMicro_Pub_Mujer, $contMicro_EduPub_Hombre, $contMicro_EduPub_Mujer, $contMicro_EduPriv_Hombre, $contMicro_EduPriv_Mujer,$swPrintHeadings);

                $swPrintHeadings = 1;

            } // While que recorre todas las carreras

        }

        
        function imprimirReporte1($rubro, $contGrande_Priv_Hombre, $contGrande_Priv_Mujer, $contGrande_Pub_Hombre, $contGrande_Pub_Mujer, $contGrande_EduPub_Hombre, $contGrande_EduPub_Mujer, $contGrande_EduPriv_Hombre, $contGrande_EduPriv_Mujer,$contMediana_Priv_Hombre, $contMediana_Priv_Mujer, $contMediana_Pub_Hombre, $contMediana_Pub_Mujer, $contMediana_EduPub_Hombre, $contMediana_EduPub_Mujer, $contMediana_EduPriv_Hombre, $contMediana_EduPriv_Mujer,$contPequena_Priv_Hombre, $contPequena_Priv_Mujer, $contPequena_Pub_Hombre,$contPequena_Pub_Mujer, $contPequena_EduPub_Hombre, $contPequena_EduPub_Mujer, $contPequena_EduPriv_Hombre, $contPequena_EduPriv_Mujer, $contMicro_Priv_Hombre, $contMicro_Priv_Mujer, $contMicro_Pub_Hombre, $contMicro_Pub_Mujer, $contMicro_EduPub_Hombre, $contMicro_EduPub_Mujer, $contMicro_EduPriv_Hombre, $contMicro_EduPriv_Mujer, $swPrintHeadings)
        {
            $total_Hombre               = 0;
            $total_Mujer                = 0;
            $total_rubro                = 0;

            $total_Hombre = $contGrande_Priv_Hombre + $contGrande_Pub_Hombre + $contGrande_EduPub_Hombre + $contGrande_EduPriv_Hombre + $contMediana_Priv_Hombre + $contMediana_Pub_Hombre + $contMediana_EduPub_Hombre + $contMediana_EduPriv_Hombre + $contPequena_Priv_Hombre + $contPequena_Pub_Hombre + $contPequena_EduPub_Hombre + $contPequena_EduPriv_Hombre + $contMicro_Priv_Hombre + $contMicro_Pub_Hombre + $contMicro_EduPub_Hombre + $contMicro_EduPriv_Hombre;

            $total_Mujer = $contGrande_Priv_Mujer + $contGrande_Pub_Mujer + $contGrande_EduPub_Mujer + $contGrande_EduPriv_Mujer + $contMediana_Priv_Mujer + $contMediana_Pub_Mujer + $contMediana_EduPub_Mujer + $contMediana_EduPriv_Mujer + $contPequena_Priv_Mujer + $contPequena_Pub_Mujer + $contPequena_EduPub_Mujer + $contPequena_EduPriv_Mujer + $contMicro_Priv_Mujer + $contMicro_Pub_Mujer + $contMicro_EduPub_Mujer + $contMicro_EduPriv_Mujer;

            $total_rubro = $total_Hombre + $total_Mujer;

            global $totalGrande_Priv_Hombre;
            global $totalGrande_Priv_Mujer;
            global $totalGrande_Pub_Hombre;
            global $totalGrande_Pub_Mujer;
            global $totalGrande_EduPub_Hombre;
            global $totalGrande_EduPub_Mujer;
            global $totalGrande_EduPriv_Hombre;
            global $totalGrande_EduPriv_Mujer;
            global $totalMediana_Priv_Hombre;
            global $totalMediana_Priv_Mujer;
            global $totalMediana_Pub_Hombre;
            global $totalMediana_Pub_Mujer;
            global $totalMediana_EduPub_Hombre;
            global $totalMediana_EduPub_Mujer;
            global $totalMediana_EduPriv_Hombre;
            global $totalMediana_EduPriv_Mujer;
            global $totalPequena_Priv_Hombre;
            global $totalPequena_Priv_Mujer;
            global $totalPequena_Pub_Hombre;
            global $totalPequena_Pub_Mujer;
            global $totalPequena_EduPub_Hombre;
            global $totalPequena_EduPub_Mujer;
            global $totalPequena_EduPriv_Hombre;
            global $totalPequena_EduPriv_Mujer;
            global $totalMicro_Priv_Hombre;
            global $totalMicro_Priv_Mujer;
            global $totalMicro_Pub_Hombre;
            global $totalMicro_Pub_Mujer;
            global $totalMicro_EduPub_Hombre;
            global $totalMicro_EduPub_Mujer;
            global $totalMicro_EduPriv_Hombre;
            global $totalMicro_EduPriv_Mujer;
            
            global $totalHombreGral;
            global $totalMujerGral;
            global $totalGral;        
                
        
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
                <td id="DetalleChico">$contGrande_Priv_Hombre     </td>
                <td id="DetalleChico">$contGrande_Priv_Mujer      </td>
                <td id="DetalleChico">$contGrande_Pub_Hombre      </td>
                <td id="DetalleChico">$contGrande_Pub_Mujer       </td>
                <td id="DetalleChico">$contGrande_EduPub_Hombre   </td>
                <td id="DetalleChico">$contGrande_EduPub_Mujer    </td>
                <td id="DetalleChico">$contGrande_EduPriv_Hombre  </td>
                <td id="DetalleChico">$contGrande_EduPriv_Mujer   </td>
                <td id="DetalleChico">$contMediana_Priv_Hombre    </td>
                <td id="DetalleChico">$contMediana_Priv_Mujer     </td>
                <td id="DetalleChico">$contMediana_Pub_Hombre     </td>
                <td id="DetalleChico">$contMediana_Pub_Mujer      </td>
                <td id="DetalleChico">$contMediana_EduPub_Hombre  </td>
                <td id="DetalleChico">$contMediana_EduPub_Mujer   </td>
                <td id="DetalleChico">$contMediana_EduPriv_Hombre </td>
                <td id="DetalleChico">$contMediana_EduPriv_Mujer  </td>
                <td id="DetalleChico">$contPequena_Priv_Hombre    </td>
                <td id="DetalleChico">$contPequena_Priv_Mujer     </td>
                <td id="DetalleChico">$contPequena_Pub_Hombre     </td>
                <td id="DetalleChico">$contPequena_Pub_Mujer      </td>
                <td id="DetalleChico">$contPequena_EduPub_Hombre  </td>
                <td id="DetalleChico">$contPequena_EduPub_Mujer   </td>
                <td id="DetalleChico">$contPequena_EduPriv_Hombre </td>
                <td id="DetalleChico">$contPequena_EduPriv_Mujer  </td>
                <td id="DetalleChico">$contMicro_Priv_Hombre      </td>
                <td id="DetalleChico">$contMicro_Priv_Mujer       </td>
                <td id="DetalleChico">$contMicro_Pub_Hombre       </td>
                <td id="DetalleChico">$contMicro_Pub_Mujer        </td>
                <td id="DetalleChico">$contMicro_EduPub_Hombre    </td>
                <td id="DetalleChico">$contMicro_EduPub_Mujer     </td>
                <td id="DetalleChico">$contMicro_EduPriv_Hombre   </td>
                <td id="DetalleChico">$contMicro_EduPriv_Mujer    </td>
                <td id="DetalleChico">$total_Hombre               </td>
                <td id="DetalleChico">$total_Mujer                </td>
                <td id="DetalleChico">$total_rubro                </td>
            </tr>
            
EOF;
            # Actualizar totales
            $totalGrande_Priv_Hombre    = $totalGrande_Priv_Hombre    + $contGrande_Priv_Hombre;
            $totalGrande_Priv_Mujer     = $totalGrande_Priv_Mujer     + $contGrande_Priv_Mujer;
            $totalGrande_Pub_Hombre     = $totalGrande_Pub_Hombre     + $contGrande_Pub_Hombre;
            $totalGrande_Pub_Mujer      = $totalGrande_Pub_Mujer      + $contGrande_Pub_Mujer;
            $totalGrande_EduPub_Hombre  = $totalGrande_EduPub_Hombre  + $contGrande_EduPub_Hombre;
            $totalGrande_EduPub_Mujer   = $totalGrande_EduPub_Mujer   + $contGrande_EduPub_Mujer;
            $totalGrande_EduPriv_Hombre = $totalGrande_EduPriv_Hombre + $contGrande_EduPriv_Hombre;
            $totalGrande_EduPriv_Mujer  = $totalGrande_EduPriv_Mujer  + $contGrande_EduPriv_Mujer;
            
            $totalMediana_Priv_Hombre    = $totalMediana_Priv_Hombre    + $contMediana_Priv_Hombre;
            $totalMediana_Priv_Mujer     = $totalMediana_Priv_Mujer     + $contMediana_Priv_Mujer;
            $totalMediana_Pub_Hombre     = $totalMediana_Pub_Hombre     + $contMediana_Pub_Hombre;
            $totalMediana_Pub_Mujer      = $totalMediana_Pub_Mujer      + $contMediana_Pub_Mujer;
            $totalMediana_EduPub_Hombre  = $totalMediana_EduPub_Hombre  + $contMediana_EduPub_Hombre;
            $totalMediana_EduPub_Mujer   = $totalMediana_EduPub_Mujer   + $contMediana_EduPub_Mujer;
            $totalMediana_EduPriv_Hombre = $totalMediana_EduPriv_Hombre + $contMediana_EduPriv_Hombre;
            $totalMediana_EduPriv_Mujer  = $totalMediana_EduPriv_Mujer  + $contMediana_EduPriv_Mujer;
            
            $totalPequena_Priv_Hombre    = $totalPequena_Priv_Hombre    + $contPequena_Priv_Hombre;
            $totalPequena_Priv_Mujer     = $totalPequena_Priv_Mujer     + $contPequena_Priv_Mujer;
            $totalPequena_Pub_Hombre     = $totalPequena_Pub_Hombre     + $contPequena_Pub_Hombre;
            $totalPequena_Pub_Mujer      = $totalPequena_Pub_Mujer      + $contPequena_Pub_Mujer;
            $totalPequena_EduPub_Hombre  = $totalPequena_EduPub_Hombre  + $contPequena_EduPub_Hombre;
            $totalPequena_EduPub_Mujer   = $totalPequena_EduPub_Mujer   + $contPequena_EduPub_Mujer;
            $totalPequena_EduPriv_Hombre = $totalPequena_EduPriv_Hombre + $contPequena_EduPriv_Hombre;
            $totalPequena_EduPriv_Mujer  = $totalPequena_EduPriv_Mujer  + $contPequena_EduPriv_Mujer;

            $totalMicro_Priv_Hombre    = $totalMicro_Priv_Hombre    + $contMicro_Priv_Hombre;
            $totalMicro_Priv_Mujer     = $totalMicro_Priv_Mujer     + $contMicro_Priv_Mujer;
            $totalMicro_Pub_Hombre     = $totalMicro_Pub_Hombre     + $contMicro_Pub_Hombre;
            $totalMicro_Pub_Mujer      = $totalMicro_Pub_Mujer      + $contMicro_Pub_Mujer;
            $totalMicro_EduPub_Hombre  = $totalMicro_EduPub_Hombre  + $contMicro_EduPub_Hombre;
            $totalMicro_EduPub_Mujer   = $totalMicro_EduPub_Mujer   + $contMicro_EduPub_Mujer;
            $totalMicro_EduPriv_Hombre = $totalMicro_EduPriv_Hombre + $contMicro_EduPriv_Hombre;
            $totalMicro_EduPriv_Mujer  = $totalMicro_EduPriv_Mujer  + $contMicro_EduPriv_Mujer;
            
            $totalHombreGral = $totalHombreGral + $total_Hombre;
            $totalMujerGral = $totalMujerGral + $total_Mujer;
            $totalGral = $totalGral + $total_rubro ;
            
        }
    }
?>