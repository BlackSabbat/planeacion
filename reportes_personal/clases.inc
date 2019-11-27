<?php
    class empleado
    {
        private $nombre;
        private $curp;
        private $plaza;
        private $puesto;
        private $depto_adscripcion;
        private $preparacion_academica;
        private $nomenclatura;
        private $grado_academico;
        private $fecha_ingreso;
        private $grado_estudio;
        private $observaciones;
        private $tipo;
        private $esp_docente;
        
        
        function calcularEdad($anio_emp,$anio_sistema_dosDigitos, $anio_sistema_cuatroDigitos)
        {
            global $edad;
            
            if ($anio_emp < $anio_sistema_dosDigitos)
            {
                $anio_emp = "20" . $anio_emp;
            }
            else{
                $anio_emp = "19" . $anio_emp;
            }
            $edad = $anio_sistema_cuatroDigitos - $anio_emp;
            //echo "año actual: $anio_sistema_cuatroDigitos  año nac:  $anio_emp<br>";
            //echo "Edad: $edad<br>";
        }
        
        function calcularAntiguedad($anio, $anio_sistema_dosDigitos, $anio_sistema_cuatroDigitos)
        {
            global $antiguedad;
            
            if (strlen($anio) ==2)
            {
                if ($anio < $anio_sistema_dosDigitos)
                {
                    $anio = "20" . $anio;
                }
                else{
                    $anio = "19" . $anio;
                }
            }
            $antiguedad = $anio_sistema_cuatroDigitos - $anio;
            //echo "Antigüedad: $antiguedad<br>";
        }
        
        function reporte1($consulta, $db, $host, $user, $pwd){
            
            global $contadorHombre_TiempoCompleto;
            global $contadorMujer_TiempoCompleto;
            global $contadorHombre_TresCuartos;
            global $contadorMujer_TresCuartos ;
            global $contadorHombre_MedioTiempo;
            global $contadorMujer_MedioTiempo ;
            global $contadorHombre_Asignatura;
            global $contadorMujer_Asignatura;  
        
            global $total_Hombre;
            global $total_Mujer;
            global $total_rubro;

            $query = $consulta;
            $result = $db->query($query);
            
            # Armar el reporte
            while( $row = $result->fetch_assoc()) {
                //echo "Empleado:$row[nombre]"; echo " "; echo "CURP:$row['curp']"; echo " "; echo "plaza:$row['plaza']</br>";
                $plaza = (substr ($row['plaza'], 0, 3));
                $sexo = (substr ($row['curp'], 10, 1));
                if ($plaza == 'E38')
                {
                    if ($sexo == 'H')
                        $contadorHombre_TiempoCompleto++;
                    else
                        $contadorMujer_TiempoCompleto++;
                }

                if ($plaza == 'E37')
                {
                    if ($sexo  == 'H')
                        $contadorHombre_TresCuartos++;
                    else
                        $contadorMujer_TresCuartos++;
                }

                if ($plaza == 'E36')
                {
                    if ($sexo  == 'H')
                        $contadorHombre_MedioTiempo++;
                    else
                        $contadorMujer_MedioTiempo++;
                }

                if ($plaza == 'E35')
                {
                    if ($sexo  == 'H')
                        $contadorHombre_Asignatura++;
                    else
                        $contadorMujer_Asignatura++;
                }
            }    
     
        }
        
        function imprimirReporte1($rubro, $contadorHombre_TiempoCompleto, $contadorMujer_TiempoCompleto, $contadorHombre_TresCuartos, $contadorMujer_TresCuartos, $contadorHombre_MedioTiempo, $contadorMujer_MedioTiempo, $contadorHombre_Asignatura, $contadorMujer_Asignatura, $swPrintHeadings)
        {
            $total_Hombre = $contadorHombre_TiempoCompleto + $contadorHombre_TresCuartos + $contadorHombre_MedioTiempo + $contadorHombre_Asignatura;
            $total_Mujer = $contadorMujer_TiempoCompleto + $contadorMujer_TresCuartos + $contadorMujer_MedioTiempo + $contadorMujer_Asignatura;
            $total_rubro = $total_Hombre + $total_Mujer;
            
            global $totalHombre_TiempoCompleto;
            global $totalMujer_TiempoCompleto;
            global $totalHombre_TresCuartos;
            global $totalMujer_TresCuartos ;
            global $totalHombre_MedioTiempo;
            global $totalMujer_MedioTiempo;
            global $totalHombre_Asignatura; 
            global $totalMujer_Asignatura;
            global $totalHombreGral;
            global $totalMujerGral;
            global $totalGral;
            
            
                if ($swPrintHeadings == 0)
                {
                    print <<<EOF
                    </br>
                    <tr>
                        <th id="subEncabezado" rowspan=2> RUBRO            </th>
                        <th id="subEncabezado" colspan=3> TPO. COMPLETO    </th>
                        <th id="subEncabezado" colspan=3> 3/4 TIEMPO       </th>
                        <th id="subEncabezado" colspan=3> 1/2 TIEMPO       </th>
                        <th id="subEncabezado" colspan=3> ASIGNATURA       </th>
                        <th id="subEncabezado" colspan=3> TOTAL            </th>
                    </tr>
                    <tr>
                        <th id="subEncabezado">Hom                         </th>
                        <th id="subEncabezado">Muj                         </th>
                        <th id="subEncabezado">Tot                         </th>
                        <th id="subEncabezado">Hom                         </th>
                        <th id="subEncabezado">Muj                         </th>
                        <th id="subEncabezado">Tot                         </th>
                        <th id="subEncabezado">Hom                         </th>
                        <th id="subEncabezado">Muj                         </th>
                        <th id="subEncabezado">Tot                         </th>
                        <th id="subEncabezado">Hom                         </th>
                        <th id="subEncabezado">Muj                         </th>
                        <th id="subEncabezado">Tot                         </th>
                        <th id="subEncabezado">Hom                         </th>
                        <th id="subEncabezado">Muj                         </th>
                        <th id="subEncabezado">Total                       </th>
                    </tr>
EOF;
                }

                $subtotal1 = $contadorHombre_TiempoCompleto + $contadorMujer_TiempoCompleto;
                $subtotal2 = $contadorHombre_TresCuartos + $contadorMujer_TresCuartos;
                $subtotal3 = $contadorHombre_MedioTiempo + $contadorMujer_MedioTiempo;
                $subtotal4 = $contadorHombre_Asignatura + $contadorMujer_Asignatura;

                print <<<EOF
                <tr id="trChico"> 
                    <td id="DetalleChico">$rubro</td>
                    <td id="DetalleChico">$contadorHombre_TiempoCompleto    </td>
                    <td id="DetalleChico">$contadorMujer_TiempoCompleto     </td>
                    <th id="DetalleChico">$subtotal1                        </th>
                    <td id="DetalleChico">$contadorHombre_TresCuartos       </td>
                    <td id="DetalleChico">$contadorMujer_TresCuartos        </td>
                    <th id="DetalleChico">$subtotal2                        </th>
                    <td id="DetalleChico">$contadorHombre_MedioTiempo       </td>
                    <td id="DetalleChico">$contadorMujer_MedioTiempo        </td>
                    <th id="DetalleChico">$subtotal3                        </th>
                    <td id="DetalleChico">$contadorHombre_Asignatura        </td>
                    <td id="DetalleChico">$contadorMujer_Asignatura         </td>
                    <th id="DetalleChico">$subtotal4                        </th>
                    <td id="DetalleChico">$total_Hombre                     </td>
                    <td id="DetalleChico">$total_Mujer                      </td>
                    <th id="DetalleChico">$total_rubro                      </th>
                </tr>
            
EOF;
            # Actualizar totales
            $totalHombre_TiempoCompleto = $totalHombre_TiempoCompleto +$contadorHombre_TiempoCompleto;
            $totalMujer_TiempoCompleto = $totalMujer_TiempoCompleto + $contadorMujer_TiempoCompleto;
            $totalHombre_TresCuartos = $totalHombre_TresCuartos + $contadorHombre_TresCuartos;
            $totalMujer_TresCuartos = $totalMujer_TresCuartos + $contadorMujer_TresCuartos;
            $totalHombre_MedioTiempo = $totalHombre_MedioTiempo + $contadorHombre_MedioTiempo;
            $totalMujer_MedioTiempo = $totalMujer_MedioTiempo + $contadorMujer_MedioTiempo;
            $totalHombre_Asignatura = $totalHombre_Asignatura + $contadorHombre_Asignatura;
            $totalMujer_Asignatura = $totalMujer_Asignatura + $contadorMujer_Asignatura;
            $totalHombreGral = $totalHombreGral + $total_Hombre;
            $totalMujerGral = $totalMujerGral + $total_Mujer;
            $totalGral = $totalGral + $total_rubro ;            
        }

        function reporte2($consulta, $db, $host, $user, $pwd){

            global $contadorHombre_Uno;
            global $contadorMujer_Uno;
            global $contadorHombre_Dos;
            global $contadorMujer_Dos;
            global $contadorHombre_Tres;
            global $contadorMujer_Tres ;         
            global $total_Hombre;
            global $total_Mujer;
            global $total_rubro;

            $query = $consulta;
            $result = $db->query($query);

            # Armar el reporte
            while( $row = $result->fetch_assoc()) {
                
                $puesto = ($row['puesto']);
                $sexo = (substr ($row['curp'], 10, 1));

                if (($puesto == 'AUXILIAR DE INTENDENCIA ') or
                ($puesto == 'AUXILIAR DEL DEPARTAMENTO DE MANTENIMIENTO Y EQUIPO') or
                ($puesto == 'COORDINADOR DE INTENDENCIA  (TURNO VESPERTINO)') or
                ($puesto == 'COORDINADOR DE INTENDENCIA ') or
                ($puesto == 'COORDINADOR DE VIGILANCIA') or
                ($puesto == 'ENCARGADO DE COCHERA') or
                ($puesto == 'INTENDENCIA ') or
                ($puesto == 'OPERADOR') or
                ($puesto == 'VIGILANTE') or
                ($puesto == 'VIGILANTE ') or
                ($puesto == 'CHOFER' ) or
                ($puesto == 'INTENDENTE') or
                ($puesto == 'JARDINERO') or
                ($puesto == 'COORD. DE JARDINEROS') or
                ($puesto == 'COORD. DE VIGILANCIA') or
                ($puesto == 'COORD. INTENDENCIA') or
                ($puesto == 'COORD. LIMPIEZA') or
                ($puesto == 'COORDINADOR DE INTENDENTES') or
                ($puesto == 'AUXILIAR DE INTENDENCIA'))
                {
                    if ($sexo == 'H')
                        $contadorHombre_Uno++;
                    else
                        $contadorMujer_Uno++;
                }
            
                else {
                    if ($sexo  == 'H')
                        $contadorHombre_Dos++;
                    else
                        $contadorMujer_Dos++;
                }          
            }

        }
        
        function imprimirReporte2($rubro, $contadorHombre_Uno, $contadorMujer_Uno, $contadorHombre_Dos, $contadorMujer_Dos, $contadorHombre_Tres, $contadorMujer_Tres, $swPrintHeadings)
        {
            $total_Hombre = $contadorHombre_Uno + $contadorHombre_Dos + $contadorHombre_Tres;
            $total_Mujer = $contadorMujer_Uno + $contadorMujer_Dos + $contadorMujer_Tres;
            $total_rubro = $total_Hombre + $total_Mujer;
            
            global $totalHombre_Uno;
            global $totalMujer_Uno;
            global $totalHombre_Dos;
            global $totalMujer_Dos ;
            global $totalHombre_Tres;
            global $totalMujer_Tres;
            global $totalHombreGral;
            global $totalMujerGral;
            global $totalGral;
            
            
                if ($swPrintHeadings == 0)
                {
                print <<<EOF
                    </br>
                    <tr>
                        <th rowspan=2 id="subEncabezado"> RUBRO      </th>
                        <th colspan=3 id="subEncabezado"> SERVICIOS  </th>
                        <th colspan=3 id="subEncabezado"> ADMVOS.    </th>
                        <th colspan=3 id="subEncabezado"> ANALISTAS  </th>
                        <th colspan=3 id="subEncabezado"> TOTAL      </th>
                    </tr>
                    <tr>
                        <td id="subEncabezado">Hom                   </td>
                        <td id="subEncabezado">Muj                   </td>
                        <td id="subEncabezado">Tot                   </td>
                        <td id="subEncabezado">Hom                   </td>
                        <td id="subEncabezado">Muj                   </td>
                        <td id="subEncabezado">Tot                   </td>
                        <td id="subEncabezado">Hom                   </td>
                        <td id="subEncabezado">Muj                   </td>
                        <td id="subEncabezado">Tot                   </td>
                        <td id="subEncabezado">Hom                   </td>
                        <td id="subEncabezado">Muj                   </td>
                        <td id="subEncabezado">Tot                   </td>
                    </tr>
EOF;
                }

                # subtotales en el detalle
                $subtotal1 = $contadorHombre_Uno + $contadorMujer_Uno;
                $subtotal2 = $contadorHombre_Dos + $contadorMujer_Dos;
                $subtotal3 = $contadorHombre_Tres + $contadorMujer_Tres;

                print <<<EOF
                <tr id="trChico">
                    <td id="DetalleChico">$rubro                        </td>
                    <td id="DetalleChico">$contadorHombre_Uno           </td>
                    <td id="DetalleChico">$contadorMujer_Uno            </td>
                    <th id="DetalleChico">$subtotal1                    </th>
                    <td id="DetalleChico">$contadorHombre_Dos           </td>
                    <td id="DetalleChico">$contadorMujer_Dos            </td>
                    <th id="DetalleChico">$subtotal2                    </th>
                    <td id="DetalleChico">$contadorHombre_Tres          </td>
                    <td id="DetalleChico">$contadorMujer_Tres           </td>
                    <th id="DetalleChico">$subtotal3                    </th>
                    <td id="DetalleChico">$total_Hombre                 </td>
                    <td id="DetalleChico">$total_Mujer                  </td>
                    <th id="DetalleChico">$total_rubro                  </th>
                </tr>
            
EOF;
            # Actualizar totales
            $totalHombre_Uno = $totalHombre_Uno +$contadorHombre_Uno;
            $totalMujer_Uno = $totalMujer_Uno + $contadorMujer_Uno;
            $totalHombre_Dos = $totalHombre_Dos + $contadorHombre_Dos;
            $totalMujer_Dos = $totalMujer_Dos + $contadorMujer_Dos;
            $totalHombre_Tres = $totalHombre_Tres + $contadorHombre_Tres;
            $totalMujer_Tres = $totalMujer_Tres + $contadorMujer_Tres;
            $totalHombreGral = $totalHombreGral + $total_Hombre;
            $totalMujerGral = $totalMujerGral + $total_Mujer;
            $totalGral = $totalGral + $total_rubro ;            
        }
        
        
        # funcion para obtener totales por rango de edades y de antiguedad de los empleados
        function edadAntig($edad,$sexo, $antiguedad)
        {
            global $contadorHombre_Uno_Reporte3;
            global $contadorMujer_Uno_Reporte3;
            global $contadorHombre_Dos_Reporte3;
            global $contadorMujer_Dos_Reporte3;
            global $contadorHombre_Tres_Reporte3;
            global $contadorMujer_Tres_Reporte3;
            global $contadorHombre_Cuatro_Reporte3;
            global $contadorMujer_Cuatro_Reporte3;
            global $contadorHombre_Cinco_Reporte3;
            global $contadorMujer_Cinco_Reporte3;
            global $contadorHombre_Seis_Reporte3;
            global $contadorMujer_Seis_Reporte3;
            global $contadorHombre_Siete_Reporte3;
            global $contadorMujer_Siete_Reporte3;
            global $contadorHombre_Ocho_Reporte3;
            global $contadorMujer_Ocho_Reporte3;
            global $contadorHombre_Nueve_Reporte3;
            global $contadorMujer_Nueve_Reporte3;
            global $contadorHombre_Diez_Reporte3;
            global $contadorMujer_Diez_Reporte3;
            
            global $contHom_Antig_Uno_Reporte3;
            global $contMuj_Antig_Uno_Reporte3;
            global $contHom_Antig_Dos_Reporte3;
            global $contMuj_Antig_Dos_Reporte3;
            global $contHom_Antig_Tres_Reporte3;
            global $contMuj_Antig_Tres_Reporte3;
            global $contHom_Antig_Cuatro_Reporte3;
            global $contMuj_Antig_Cuatro_Reporte3;
            global $contHom_Antig_Cinco_Reporte3;
            global $contMuj_Antig_Cinco_Reporte3;
            global $contHom_Antig_Seis_Reporte3;
            global $contMuj_Antig_Seis_Reporte3;
            global $contHom_Antig_Siete_Reporte3;
            global $contMuj_Antig_Siete_Reporte3;
            
            global $contadorTotal_Uno_Reporte3;
            global $contadorTotal_Dos_Reporte3;
            global $contadorTotal_Tres_Reporte3;
            global $contadorTotal_Cuatro_Reporte3;
            global $contadorTotal_Cinco_Reporte3;
            global $contadorTotal_Seis_Reporte3;
            global $contadorTotal_Siete_Reporte3;
            global $contadorTotal_Ocho_Reporte3;
            global $contadorTotal_Nueve_Reporte3;
            global $contadorTotal_Diez_Reporte3;
            
            global $conTotalAntig_Uno_Reporte3;
            global $conTotalAntig_Dos_Reporte3;
            global $conTotalAntig_Tres_Reporte3;
            global $conTotalAntig_Cuatro_Reporte3;
            global $conTotalAntig_Cinco_Reporte3;
            global $conTotalAntig_Seis_Reporte3;
            global $conTotalAntig_Siete_Reporte3;
            
            # Contar Edades de acuerdo a Rango
            if (($edad >= 20) and ($edad <= 24))
            {
                if ($sexo == 'H')
                    $contadorHombre_Uno_Reporte3++;
                else
                    $contadorMujer_Uno_Reporte3++;
            }
            
            if (($edad >= 25) and ($edad <= 29))
            {
                if ($sexo == 'H')
                    $contadorHombre_Dos_Reporte3++;
                else
                    $contadorMujer_Dos_Reporte3++;
            }
            
            if (($edad >= 30) and ($edad <= 34))
            {
                if ($sexo == 'H')
                    $contadorHombre_Tres_Reporte3++;
                else
                    $contadorMujer_Tres_Reporte3++;
            }
            
            if (($edad >= 35) and ($edad <= 39))
            {
                if ($sexo == 'H')
                    $contadorHombre_Cuatro_Reporte3++;
                else
                    $contadorMujer_Cuatro_Reporte3++;
            }
            
            if (($edad >= 40) and ($edad <= 44))
            {
                if ($sexo == 'H')
                    $contadorHombre_Cinco_Reporte3++;
                else
                    $contadorMujer_Cinco_Reporte3++;
            }
            
            if (($edad >= 45) and ($edad <= 49))
            {
                if ($sexo == 'H')
                    $contadorHombre_Seis_Reporte3++;
                else
                    $contadorMujer_Seis_Reporte3++;
            }
            
            if (($edad >= 50) and ($edad <= 54))
            {
                if ($sexo == 'H')
                    $contadorHombre_Siete_Reporte3++;
                else
                    $contadorMujer_Siete_Reporte3++;
            }
            
            if (($edad >= 55) and ($edad <= 59))
            {
                if ($sexo == 'H')
                    $contadorHombre_Ocho_Reporte3++;
                else
                    $contadorMujer_Ocho_Reporte3++;
            }
            
            if (($edad >= 60) and ($edad <= 64))
            {
                if ($sexo == 'H')
                    $contadorHombre_Nueve_Reporte3++;
                else
                    $contadorMujer_Nueve_Reporte3++;
            }
            
            if ($edad >= 65)
            {
                if ($sexo == 'H')
                    $contadorHombre_Diez_Reporte3++;
                else
                    $contadorMujer_Diez_Reporte3++;
            }
            
            #Contar Antiguedad de acuerdo a Rango
            if (($antiguedad >= 0) and ($antiguedad <= 4))
            {
                if ($sexo == 'H')
                    $contHom_Antig_Uno_Reporte3++;
                else
                    $contMuj_Antig_Uno_Reporte3++;
            }
            
            if (($antiguedad >= 5) and ($antiguedad <= 9))
            {
                if ($sexo == 'H')
                    $contHom_Antig_Dos_Reporte3++;
                else
                    $contMuj_Antig_Dos_Reporte3++;
            }
            
            if (($antiguedad >= 10) and ($antiguedad <= 14))
            {
                if ($sexo == 'H')
                    $contHom_Antig_Tres_Reporte3++;
                else
                    $contMuj_Antig_Tres_Reporte3++;
            }
            
            if (($antiguedad >= 15) and ($antiguedad <= 19))
            {
                if ($sexo == 'H')
                    $contHom_Antig_Cuatro_Reporte3++;
                else
                    $contMuj_Antig_Cuatro_Reporte3++;
            }
            
            if (($antiguedad >= 20) and ($antiguedad <= 24))
            {
                if ($sexo == 'H')
                    $contHom_Antig_Cinco_Reporte3++;
                else
                    $contMuj_Antig_Cinco_Reporte3++;
            }
            
            if (($antiguedad >= 25) and ($antiguedad <= 29))
            {
                if ($sexo == 'H')
                    $contHom_Antig_Seis_Reporte3++;
                else
                    $contMuj_Antig_Seis_Reporte3++;
            }
            
            if ($antiguedad >= 30)
            {
                if ($sexo == 'H')
                    $contHom_Antig_Siete_Reporte3++;
                else
                    $contMuj_Antig_Siete_Reporte3++;
            }
        }
        
        function imprimirReporte3($contadorHombre_Uno_Reporte3, $contadorMujer_Uno_Reporte3,$contadorHombre_Dos_Reporte3, $contadorMujer_Dos_Reporte3,$contadorHombre_Tres_Reporte3, $contadorMujer_Tres_Reporte3,$contadorHombre_Cuatro_Reporte3, $contadorMujer_Cuatro_Reporte3,$contadorHombre_Cinco_Reporte3, $contadorMujer_Cinco_Reporte3,$contadorHombre_Seis_Reporte3, $contadorMujer_Seis_Reporte3,$contadorHombre_Siete_Reporte3, $contadorMujer_Siete_Reporte3,$contadorHombre_Ocho_Reporte3, $contadorMujer_Ocho_Reporte3,$contadorHombre_Nueve_Reporte3, $contadorMujer_Nueve_Reporte3,$contadorHombre_Diez_Reporte3, $contadorMujer_Diez_Reporte3,$contHom_Antig_Uno_Reporte3, $contMuj_Antig_Uno_Reporte3, $contHom_Antig_Dos_Reporte3,     $contMuj_Antig_Dos_Reporte3, $contHom_Antig_Tres_Reporte3, $contMuj_Antig_Tres_Reporte3,     $contHom_Antig_Cuatro_Reporte3, $contMuj_Antig_Cuatro_Reporte3, $contHom_Antig_Cinco_Reporte3,$contMuj_Antig_Cinco_Reporte3, $contHom_Antig_Seis_Reporte3, $contMuj_Antig_Seis_Reporte3,$contHom_Antig_Siete_Reporte3, $contMuj_Antig_Siete_Reporte3, $swPrintHeadings)
        {
            global $totalHombre_Reporte3;
            global $totalMujer_Reporte3;
            global $totalGral_Reporte3;
            global $totalHomAntig_Reporte3;
            global $totalMujAntig_Reporte3;
            global $totalGralAntig_Reporte3;
            
            # Actualizar Totales por Rango de Edad
            $contadorTotal_Uno_Reporte3 = $contadorHombre_Uno_Reporte3 + $contadorMujer_Uno_Reporte3;
            $contadorTotal_Dos_Reporte3 = $contadorHombre_Dos_Reporte3 + $contadorMujer_Dos_Reporte3;
            $contadorTotal_Tres_Reporte3 = $contadorHombre_Tres_Reporte3 + $contadorMujer_Tres_Reporte3;
            $contadorTotal_Cuatro_Reporte3 = $contadorHombre_Cuatro_Reporte3 + $contadorMujer_Cuatro_Reporte3;
            $contadorTotal_Cinco_Reporte3 = $contadorHombre_Cinco_Reporte3 + $contadorMujer_Cinco_Reporte3;
            $contadorTotal_Seis_Reporte3 = $contadorHombre_Seis_Reporte3 + $contadorMujer_Seis_Reporte3;
            $contadorTotal_Siete_Reporte3 = $contadorHombre_Siete_Reporte3 + $contadorMujer_Siete_Reporte3;
            $contadorTotal_Ocho_Reporte3 = $contadorHombre_Ocho_Reporte3 + $contadorMujer_Ocho_Reporte3;
            $contadorTotal_Nueve_Reporte3 = $contadorHombre_Nueve_Reporte3 + $contadorMujer_Nueve_Reporte3;
            $contadorTotal_Diez_Reporte3 = $contadorHombre_Diez_Reporte3 + $contadorMujer_Diez_Reporte3;
            
            # Actualizar Totales por Rango de Antiguedad
            $conTotalAntig_Uno_Reporte3 = $contHom_Antig_Uno_Reporte3 + $contMuj_Antig_Uno_Reporte3;
            $conTotalAntig_Dos_Reporte3 = $contHom_Antig_Dos_Reporte3 + $contMuj_Antig_Dos_Reporte3;
            $conTotalAntig_Tres_Reporte3 = $contHom_Antig_Tres_Reporte3 + $contMuj_Antig_Tres_Reporte3;
            $conTotalAntig_Cuatro_Reporte3 = $contHom_Antig_Cuatro_Reporte3 + $contMuj_Antig_Cuatro_Reporte3;
            $conTotalAntig_Cinco_Reporte3 = $contHom_Antig_Cinco_Reporte3 + $contMuj_Antig_Cinco_Reporte3;
            $conTotalAntig_Seis_Reporte3 = $contHom_Antig_Seis_Reporte3 + $contMuj_Antig_Seis_Reporte3;
            $conTotalAntig_Siete_Reporte3 = $contHom_Antig_Siete_Reporte3 + $contMuj_Antig_Siete_Reporte3;
            
            if ($swPrintHeadings == 0)
            {
            print <<<EOF
                </br>
                <tr>
                    <th id="TotalesChico">Edad (rango en años)            </th>
                    <th id="subEncabezado">Hom                             </th>
                    <th id="subEncabezado">Muj                             </th>
                    <th id="subEncabezado">Total                           </th>
                    <th id="TotalesChico">Antig. (años)                   </th>
                    <th id="subEncabezado">Hom                             </th>
                    <th id="subEncabezado">Muj                             </th>
                    <th id="subEncabezado">Total                           </th>
                </tr>
EOF;
            }

            print <<<EOF
            <tr id ="trChico">
                <td id="DetalleChico">20 -  24                           </td>
                <td id="DetalleChico">$contadorHombre_Uno_Reporte3          </td>
                <td id="DetalleChico">$contadorMujer_Uno_Reporte3           </td>
                <th id="DetalleChico">$contadorTotal_Uno_Reporte3           </th>
                <td id="DetalleChico">0 - 4                              </td>
                <td id="DetalleChico">$contHom_Antig_Uno_Reporte3           </td>
                <td id="DetalleChico">$contMuj_Antig_Uno_Reporte3           </td>
                <th id="DetalleChico">$conTotalAntig_Uno_Reporte3           </th>
            </tr>
            <tr id ="trChico">
                <td id="DetalleChico">25 - 29                            </td>
                <td id="DetalleChico">$contadorHombre_Dos_Reporte3          </td>
                <td id="DetalleChico">$contadorMujer_Dos_Reporte3           </td>
                <th id="DetalleChico">$contadorTotal_Dos_Reporte3           </th>
                <td id="DetalleChico">5 - 9                              </td>
                <td id="DetalleChico">$contHom_Antig_Dos_Reporte3           </td>
                <td id="DetalleChico">$contMuj_Antig_Dos_Reporte3           </td>
                <th id="DetalleChico">$conTotalAntig_Dos_Reporte3           </th>
            </tr>
            <tr id ="trChico">
                <td id="DetalleChico">30 - 34                            </td>
                <td id="DetalleChico">$contadorHombre_Tres_Reporte3         </td>
                <td id="DetalleChico">$contadorMujer_Tres_Reporte3          </td>
                <th id="DetalleChico">$contadorTotal_Tres_Reporte3          </th>
                <td id="DetalleChico">10 - 14                            </td>
                <td id="DetalleChico">$contHom_Antig_Tres_Reporte3          </td>
                <td id="DetalleChico">$contMuj_Antig_Tres_Reporte3          </td>
                <th id="DetalleChico">$conTotalAntig_Tres_Reporte3          </th>
            </tr>
            <tr id ="trChico">
                <td id="DetalleChico">35 - 39                            </td>
                <td id="DetalleChico">$contadorHombre_Cuatro_Reporte3       </td>
                <td id="DetalleChico">$contadorMujer_Cuatro_Reporte3        </td>
                <th id="DetalleChico">$contadorTotal_Cuatro_Reporte3        </th>
                <td id="DetalleChico">15 - 19                            </td>
                <td id="DetalleChico">$contHom_Antig_Cuatro_Reporte3        </td>
                <td id="DetalleChico">$contMuj_Antig_Cuatro_Reporte3        </td>
                <th id="DetalleChico">$conTotalAntig_Cuatro_Reporte3        </th>
            </tr>
            <tr id ="trChico">
                <td id="DetalleChico">40 - 44                            </td>
                <td id="DetalleChico">$contadorHombre_Cinco_Reporte3        </td>
                <td id="DetalleChico">$contadorMujer_Cinco_Reporte3         </td>
                <th id="DetalleChico">$contadorTotal_Cinco_Reporte3         </th>
                <td id="DetalleChico">20 - 24                            </td>
                <td id="DetalleChico">$contHom_Antig_Cinco_Reporte3         </td>
                <td id="DetalleChico">$contMuj_Antig_Cinco_Reporte3         </td>
                <th id="DetalleChico">$conTotalAntig_Cinco_Reporte3         </th>
            </tr>
            <tr id ="trChico">
                <td id="DetalleChico">45 - 49                            </td>
                <td id="DetalleChico">$contadorHombre_Seis_Reporte3         </td>
                <td id="DetalleChico">$contadorMujer_Seis_Reporte3          </td>
                <th id="DetalleChico">$contadorTotal_Seis_Reporte3          </th>
                <td id="DetalleChico">25 - 29                            </td>
                <td id="DetalleChico">$contHom_Antig_Seis_Reporte3          </td>
                <td id="DetalleChico">$contMuj_Antig_Seis_Reporte3          </td>
                <th id="DetalleChico">$conTotalAntig_Seis_Reporte3          </th>
            </tr>
            <tr id ="trChico">
                <td id="DetalleChico">50 - 54                            </td>
                <td id="DetalleChico">$contadorHombre_Siete_Reporte3        </td>
                <td id="DetalleChico">$contadorMujer_Siete_Reporte3         </td>
                <th id="DetalleChico">$contadorTotal_Siete_Reporte3         </th>
                <td id="DetalleChico">>= 30                              </td>
                <td id="DetalleChico">$contHom_Antig_Siete_Reporte3         </td>
                <td id="DetalleChico">$contMuj_Antig_Siete_Reporte3         </td>
                <th id="DetalleChico">$conTotalAntig_Siete_Reporte3         </th>
            </tr>
            <tr id ="trChico">
                <td id="DetalleChico">55 - 59                            </td>
                <td id="DetalleChico">$contadorHombre_Ocho_Reporte3         </td>
                <td id="DetalleChico">$contadorMujer_Ocho_Reporte3          </td>
                <th id="DetalleChico">$contadorTotal_Ocho_Reporte3          </th>
                <td id="DetalleChico">&nbsp;                                </td>
                <td id="DetalleChico">&nbsp;                                </td>
                <td id="DetalleChico">&nbsp;                                </td>
                <th id="DetalleChico">&nbsp;                                </th>
            </tr>
            <tr id ="trChico">
                <td id="DetalleChico"> 60 - 64                           </td>
                <td id="DetalleChico">$contadorHombre_Nueve_Reporte3        </td>
                <td id="DetalleChico">$contadorMujer_Nueve_Reporte3         </td>
                <th id="DetalleChico">$contadorTotal_Nueve_Reporte3         </th>
                <td id="DetalleChico">&nbsp;                                </td>
                <td id="DetalleChico">&nbsp;                                </td>
                <td id="DetalleChico">&nbsp;                                </td>
                <th id="DetalleChico">&nbsp;                                </th>
            </tr>
            <tr id ="trChico">
                <td id="DetalleChico">>= 65                              </td>
                <td id="DetalleChico">$contadorHombre_Diez_Reporte3         </td>
                <td id="DetalleChico">$contadorMujer_Diez_Reporte3          </td>
                <th id="DetalleChico">$contadorTotal_Diez_Reporte3          </th>
                <td id="DetalleChico">&nbsp;                                </td>
                <td id="DetalleChico">&nbsp;                                </td>
                <td id="DetalleChico">&nbsp;                                </td>
                <th id="DetalleChico">&nbsp;                                </th>
            </tr>
EOF;
            # Actualizar totales
            
            $totalHombre_Reporte3 = $contadorHombre_Uno_Reporte3 + $contadorHombre_Dos_Reporte3+ $contadorHombre_Tres_Reporte3 + $contadorHombre_Cuatro_Reporte3 + $contadorHombre_Cinco_Reporte3 +$contadorHombre_Seis_Reporte3 + $contadorHombre_Siete_Reporte3 + $contadorHombre_Ocho_Reporte3 + $contadorHombre_Nueve_Reporte3 + $contadorHombre_Diez_Reporte3;
            $totalMujer_Reporte3 = $contadorMujer_Uno_Reporte3 + $contadorMujer_Dos_Reporte3  + $contadorMujer_Tres_Reporte3 + $contadorMujer_Cuatro_Reporte3 + $contadorMujer_Cinco_Reporte3 +$contadorMujer_Seis_Reporte3 + $contadorMujer_Siete_Reporte3 + $contadorMujer_Ocho_Reporte3 + $contadorMujer_Nueve_Reporte3 + $contadorMujer_Diez_Reporte3;
            $totalGral_Reporte3 = $totalHombre_Reporte3 + $totalMujer_Reporte3;
            $totalHomAntig_Reporte3 = $contHom_Antig_Uno_Reporte3 + $contHom_Antig_Dos_Reporte3+ $contHom_Antig_Tres_Reporte3 + $contHom_Antig_Cuatro_Reporte3 + $contHom_Antig_Cinco_Reporte3 +$contHom_Antig_Seis_Reporte3 + $contHom_Antig_Siete_Reporte3;
            $totalMujAntig_Reporte3 = $contMuj_Antig_Uno_Reporte3 + $contMuj_Antig_Dos_Reporte3  + $contMuj_Antig_Tres_Reporte3 + $contMuj_Antig_Cuatro_Reporte3 + $contMuj_Antig_Cinco_Reporte3 +$contMuj_Antig_Seis_Reporte3 + $contMuj_Antig_Siete_Reporte3;
            $totalGralAntig_Reporte3 = $totalHomAntig_Reporte3 + $totalMujAntig_Reporte3;
        }

        function imprimirDiscapacitados($contH_fed, $contM_fed, $contH_est, $contM_est, $rubro, $swPrintHeadings)
        {
            $totalH     = $contH_fed + $contH_est;
            $totalM     = $contM_fed + $contM_est;
            $totalGral  = $totalH + $totalM;


            if ($swPrintHeadings == 0)
            {
                print <<<EOF
                <tr>
                    <th rowspan=2 id="TotalesChico""> Rubro     </th>
                    <th colspan=2 id="subEncabezado"> Federales </th>
                    <th colspan=2 id="subEncabezado"> Estatales </th>
                    <th colspan=3 id="subEncabezado"> Total     </th>
                </tr>

                <tr>
                    <td id="subEncabezado">Hom                  </td>
                    <td id="subEncabezado">Muj                  </td>
                    <td id="subEncabezado">Hom                  </td>
                    <td id="subEncabezado">Muj                  </td>
                    <td id="subEncabezado">Hom                  </td>
                    <td id="subEncabezado">Muj                  </td>
                    <td id="subEncabezado">Total                </td>
                </tr>
EOF;
            }

            print <<<EOF
            <tr id ="trChico">
                <td id="DetalleChico">$rubro                    </td>
                <td id="DetalleChico">$contH_fed                </td>
                <td id="DetalleChico">$contM_fed                </td>
                <td id="DetalleChico">$contH_est                </td>
                <td id="DetalleChico">$contM_est                </td>
                <td id="DetalleChico">$totalH                   </td>
                <td id="DetalleChico">$totalM                   </td>
                <td id="DetalleChico">$totalGral                </td>
            </tr>
EOF;

        }

        function reporte7 ($consulta, $db, $host, $user, $pwd)
        {

            global $contH_fed;
            global $contM_fed;
            global $contH_est;
            global $contM_est;

            $query = $consulta;
            $result = $db->query($query);

            # Armar el reporte
            while( $row = $result->fetch_assoc()) {
                $sexo = (substr ($row['curp'], 10, 1));
                #echo "<p>Empleado:$row['nombre']"; echo " "; echo "CURP:$row['curp']";
                #echo "tipo: $row['tipo'] </br>";
                if ($sexo == 'H' and $row['tipo'] == 'federal') 
                    $contH_fed ++;
                if ($sexo == 'M' and $row['tipo'] == 'federal')   
                    $contM_fed ++;

                if ($sexo == 'H' and $row['tipo'] == 'estatal') 
                    $contH_est ++;
                if ($sexo == 'M' and $row['tipo'] == 'estatal')   
                    $contM_est ++;
        
                #echo "hombres: $contH_fed </br>";
            }

        }

        function imprimirCuerpos($contH_fed, $contM_fed, $contH_est, $contM_est, $proyecto, $rubro, $swPrintHeadings)
        {
            $totalH     = $contH_fed + $contH_est;
            $totalM     = $contM_fed + $contM_est;
            $totalGral  = $totalH + $totalM;


            if ($swPrintHeadings == 0)
            {
                print <<<EOF
                <tr>
                    <th rowspan=2 id="TotalesChico"> $rubro     </th>
                    <th colspan=2 id="subEncabezado"> Federales </th>
                    <th colspan=2 id="subEncabezado"> Estatales </th>
                    <th colspan=3 id="subEncabezado"> Total     </th>
                </tr>

                <tr>
                    <td id="subEncabezado">Hom                    </td>
                    <td id="subEncabezado">Muj                    </td>
                    <td id="subEncabezado">Hom                    </td>
                    <td id="subEncabezado">Muj                    </td>
                    <td id="subEncabezado">Hom                    </td>
                    <td id="subEncabezado">Muj                    </td>
                    <td id="subEncabezado">Total                </td>
                </tr>
EOF;
            }

            print <<<EOF
            <tr id = "trChico">
                <td id="DetalleChico">$proyecto                 </td>
                <td id="DetalleChico">$contH_fed                </td>
                <td id="DetalleChico">$contM_fed                </td>
                <td id="DetalleChico">$contH_est                </td>
                <td id="DetalleChico">$contM_est                </td>
                <td id="DetalleChico">$totalH                   </td>
                <td id="DetalleChico">$totalM                   </td>
                <td id="DetalleChico">$totalGral                </td>
            </tr>
EOF;

        }

    }

?>