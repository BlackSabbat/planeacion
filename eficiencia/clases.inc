<?php

    class eficiencia_TNM
    {
        // eficiencia_TNM por carrera
        function reporte_TNM($carrera, $swAbierta, $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings){  

            global $hom_tit_5anios;
            global $muj_tit_5anios;
            global $gran_tit_5anios;
            global $hom_matricula;
            global $muj_matricula;
            global $gran_matricula;
            global $hom_tit_6anios;
            global $muj_tit_6anios;
            global $gran_tit_6anios;

            global $gral_5anios;
            global $gral_mat;
            global $gral_6anios;


            // CONSULTA 1er INGRESO (MATRICULAS 6 años previos a la titulacion o egreso)

            if (($carrera == 'ING INDUSTRIAL DIST') || ($carrera == 'ING GESTION EMPR. DIST') || ($carrera == 'ING SISTEMAS COMP. DIST')) {
                
                #incluir en consulta tambien carreas a distancia
                if (($carrera == 'ING INDUSTRIAL DIST')){
                    $carrera2 = 'ING INDUSTRIAL';
                }
                if ($carrera == 'ING GESTION EMPR. DIST') {
                    $carrera2 = 'ING GESTION EMPR.';
                }
                if ($carrera == 'ING SISTEMAS COMP. DIST') {
                    $carrera2 = 'ING SISTEMAS COMP.';
                }

                $consulta_matriculas = "SELECT 
                sum(hom1)  as hom1,
                sum(muj1)  as muj1
                FROM $tabla where (carrera = '$carrera2' and abierta = '$swAbierta' and distancia = '$swDistancia' and periodo = '$fecha_TNM2')";

            }
           
            else {

                $consulta_matriculas = "SELECT 
                sum(hom1)  as hom1,
                sum(muj1)  as muj1
                FROM $tabla where (carrera = '$carrera' and abierta = '$swAbierta' and distancia = '$swDistancia' and periodo = '$fecha_TNM2')";

                //$rubro = $carrera;
            }

            $rubro = $carrera;

            # ejecucion de consulta
            $query_matriculas = $consulta_matriculas;
            $result_matriculas = $db->query($query_matriculas);
            //echo "registros: $result_matriculas->num_rows";


            // CONSULTA DE TITULADOS UN AÑO PREVIO AL PERIODO ACTUAL (5 años)

            $mes_5anios   = substr($BDSeleccionada,0,8);
            $anio_5anios  = substr($BDSeleccionada,8,4);
            $anio_5anios  = $anio_5anios - 1;
            $fecha_5anios = $mes_5anios. strval($anio_5anios);

            if ($carrera == 'ING MECANICA') {
                $consulta_5anios = "SELECT num_control, edad, sexo 
                FROM $tabla_TitEgr 
                where ((carrera = '$carrera' or carrera = 'IND MECANICA TERMICA') and periodo = '$fecha_5anios')";
            }

            else if (($carrera == 'ING INDUSTRIAL') || ($carrera == 'ING INDUSTRIAL ELECTRONICA') || ($carrera == 'ING INDUSTRIAL MECANICA') || ($carrera == 'ING INDUSTRIAL PRODUCCION')) {
                $consulta_5anios = "SELECT num_control, edad, sexo 
                FROM $tabla_TitEgr 
                where ((carrera = '$carrera' or carrera = 'ING INDUSTRIAL ELECTRICA' or carrera = 'ING INDUSTRIAL ABIERTA' or carrera = 'IND ELECTRONICA') and periodo = '$fecha_5anios')";
            }

            else {
                $consulta_5anios = "SELECT num_control, edad, sexo 
                FROM $tabla_TitEgr 
                where (carrera = '$carrera' and periodo = '$fecha_5anios')";
            }

            $query_5anios = $consulta_5anios;
            $result_5anios = $db->query($query_5anios);
            //-----------------------------------------------


            // CONSULTA DE TITULADOS o EGRESADOS PERIODO ACTUAL (6 años)

            if ($carrera == 'ING MECANICA') {
                $consulta_6anios = "SELECT num_control, edad, sexo 
                FROM $tabla_TitEgr 
                where ((carrera = '$carrera' or carrera = 'IND MECANICA TERMICA') and periodo = '$BDSeleccionada')";
            }

            else if (($carrera == 'ING INDUSTRIAL') || ($carrera == 'ING INDUSTRIAL ELECTRONICA') || ($carrera == 'ING INDUSTRIAL MECANICA') || ($carrera == 'ING INDUSTRIAL PRODUCCION')) {
                $consulta_6anios = "SELECT num_control, edad, sexo 
                FROM $tabla_TitEgr 
                where ((carrera = '$carrera' or carrera = 'ING INDUSTRIAL ELECTRICA' or carrera = 'ING INDUSTRIAL ABIERTA' or carrera = 'IND ELECTRONICA') and periodo = '$BDSeleccionada')";
            }

            else {
                $consulta_6anios = "SELECT num_control, edad, sexo 
                FROM $tabla_TitEgr 
                where (carrera = '$carrera' and periodo = '$BDSeleccionada')";
            }

            $query_6anios = $consulta_6anios;
            $result_6anios = $db->query($query_6anios);
            //-----------------------------------------------


            #fecha TNM 5 años
            $mes_tnm_5anios= substr($fecha_5anios,0,3);
            $anio_tnm_5anios = substr($fecha_5anios,8,4);
            $rep_tnm_5anios = $mes_tnm_5anios. $anio_tnm_5anios;

            #fecha TNM 6 años
            $mes_tnm_6anios = substr($BDSeleccionada,0,3);
            $anio_tnm_6anios = substr($BDSeleccionada,8,4);
            $rep_tnm_6anios = $mes_tnm_6anios . $anio_tnm_6anios;

            #fecha matricula
            $mes_matricula = substr($fecha_TNM2,4,3);
            $anio_matricula = substr($fecha_TNM2,8,4);
            $rep_matricula = $mes_matricula . $anio_matricula;


            # Encabezado
            if ($swPrintHeadings == 0)
            {
                print <<<EOF
                <tr>
                    <th id="subEncabezado" rowspan = 2>Carrera                 </th>
                    <th id="subEncabezado" colspan = 3>Eficiencia TNM 5 (años) </th>
                    <!-- <th class= hide_all > &nbsp;                          </th>  -->
                    <th id="subEncabezado" colspan = 3>Eficiencia TNM 6 (años) </th>
                </tr>
                <tr>    
                    <th id="subEncabezado">Ingreso 
EOF;

                        echo "$rep_matricula";
                        print <<<EOF
                    </th>
                    <th id="subEncabezado">

EOF;
                        if ($tabla_TitEgr == 'titulados')
                            echo "Titulados $rep_tnm_5anios";
                        if ($tabla_TitEgr == 'egresados')
                            echo "Egresados $rep_tnm_5anios";
                        print <<<EOF
                    
                    </th>

                    <th id="subEncabezado">

EOF;
                        if ($tabla_TitEgr == 'titulados')
                            echo "Efic. Term.(%)";
                        if ($tabla_TitEgr == 'egresados')
                            echo "Efic. Egre.(%)";
                        print <<<EOF
                    
                    </th>
                    


                    <th id="subEncabezado">Ingreso 
EOF;

                        echo "$rep_matricula";
                        print <<<EOF
                    </th>
                    <th id="subEncabezado">

EOF;
                        if ($tabla_TitEgr == 'titulados')
                            echo "Titulados $rep_tnm_6anios";
                        if ($tabla_TitEgr == 'egresados')
                            echo "Egresados $rep_tnm_6anios";
                        print <<<EOF
                    
                    </th>

                    <th id="subEncabezado">

EOF;
                        if ($tabla_TitEgr == 'titulados')
                            echo "Efic. Term.(%)";
                        if ($tabla_TitEgr == 'egresados')
                            echo "Efic. Egre.(%)";
                        print <<<EOF
                    
                    </th>
                    

                </tr>

EOF;
            } // if ($swPrintHeadings == 0) 


            # Armar el reporte de MATRICULAS (6 años)
            while( $row = $result_matriculas->fetch_assoc()) {

                if ($row['hom1'] != null)
                {
                    $hom_matricula = $row['hom1'];
                    $muj_matricula = $row['muj1'];
                }  //cierre de if ($row[hom1] != null)

            }  //cierre while Matriculas



            # Armar el reporte de TITULADOS 5 años
            while ($row = $result_5anios->fetch_assoc()) {
                
                //echo "control: $row[num_control] edad: $row[edad] genero: $row[sexo] </br>";

                if ($row['sexo'] == 'M')
                    $hom_tit_5anios = $hom_tit_5anios + 1;
                if ($row['sexo'] == 'F')
                    $muj_tit_5anios = $muj_tit_5anios + 1;                       
 
            }  //cierre while Titulados Egresados


            # Armar el reporte de TITULADOS 6 años
            while ($row = $result_6anios->fetch_assoc()) {
                
                //echo "control: $row[num_control] edad: $row[edad] genero: $row[sexo] </br>";

                if ($row['sexo'] == 'M')
                    $hom_tit_6anios = $hom_tit_6anios + 1;
                if ($row['sexo'] == 'F')
                    $muj_tit_6anios = $muj_tit_6anios + 1;                       

            }  //cierre while Titulados Egresados


            #contadores de detalle
            $gran_matricula = $hom_matricula  + $muj_matricula;
            $gran_tit_5anios= $hom_tit_5anios  + $muj_tit_5anios;
            $gran_tit_6anios = $hom_tit_6anios + $muj_tit_6anios;
                 
            #contadores de totales generales
            $gral_mat = $gral_mat + $gran_matricula;
            $gral_5anios = $gral_5anios + $gran_tit_5anios;
            $gral_6anios = $gral_6anios + $gran_tit_6anios;
            

            if (($gran_tit_5anios!= 0) || ($gran_tit_6anios != 0) || ($gran_matricula != 0) ){

                #Imprimir Detalle del Reporte
                print <<<EOF
                <tr id="trChico">
                    <td id="SubEncabezadoChico">$rubro         </td>             
                    <td id="DetalleChico" >$gran_matricula     </td>
                    <td id="DetalleChico" >$gran_tit_5anios    </td>
                    <td id="DetalleChico" >
EOF;
                        if ($gran_matricula !=  0)
                            echo (number_format((($gran_tit_5anios/$gran_matricula) * 100), 2));
                        else 
                            echo "0";
                        
                    print <<<EOF
                    </td>
                    <td id="DetalleChico" >$gran_matricula     </td>
                    <td id="DetalleChico" >$gran_tit_6anios    </td>
                    <td id="DetalleChico" >
EOF;
                        if ($gran_matricula != 0)
                            echo (number_format((($gran_tit_6anios/$gran_matricula) * 100),2));
                        else 
                        echo "0";
                        

                    print <<<EOF
                    </td>
                </tr>

EOF;
            }  // if ($gral_5anios !=null) && ($gral_6anios!=null)

        }   //function



        // eficiencia_TNM en 5 años, por carrera
    function reporte_TNM_5anios($carrera, $swAbierta, $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings){  

            global $hom_matricula;
            global $muj_matricula;
            global $gran_matricula;
            global $hom_tit_6anios;
            global $muj_tit_6anios;
            global $gran_tit_6anios;

            global $gral_mat;
            global $gral_6anios;


            // CONSULTA 1er INGRESO (MATRICULAS 5 años previos a la titulacion o egreso)

            // fecha de 5 años previos a periodo actual, para consulta de Matriculas
            $sem_temp   = substr($fecha_TNM2,0,8);
            $anio_temp  = (substr($fecha_TNM2,8,4) + 1); 
            $fecha_TNM2 = $sem_temp . strval($anio_temp);
            
            

            if (($carrera == 'ING INDUSTRIAL DIST') || ($carrera == 'ING GESTION EMPR. DIST') || ($carrera == 'ING SISTEMAS COMP. DIST')) {
                
                #incluir en consulta tambien carreas a distancia
                if (($carrera == 'ING INDUSTRIAL DIST')){
                    $carrera2 = 'ING INDUSTRIAL';
                }
                if ($carrera == 'ING GESTION EMPR. DIST') {
                    $carrera2 = 'ING GESTION EMPR.';
                }
                if ($carrera == 'ING SISTEMAS COMP DIST') {
                    $carrera2 = 'ING SISTEMAS COMP.';
                }


                $consulta_matriculas = "SELECT 
                sum(hom1)  as hom1,
                sum(muj1)  as muj1
                FROM $tabla where (carrera = '$carrera2' and abierta = '$swAbierta' and distancia = '$swDistancia' and periodo = '$fecha_TNM2')";

            }
           
            else {

                $consulta_matriculas = "SELECT 
                sum(hom1)  as hom1,
                sum(muj1)  as muj1
                FROM $tabla where (carrera = '$carrera' and abierta = '$swAbierta' and distancia = '$swDistancia' and periodo = '$fecha_TNM2')";

                //$rubro = $carrera;
            }

            $rubro = $carrera;

            # ejecucion de consulta
            $query_matriculas = $consulta_matriculas;
            $result_matriculas = $db->query($query_matriculas);
            //echo "registros: $result_matriculas->num_rows";


            // CONSULTA DE TITULADOS o EGRESADOS PERIODO ACTUAL (6 años)

            if ($carrera == 'ING MECANICA') {
                $consulta_6anios = "SELECT num_control, edad, sexo 
                FROM $tabla_TitEgr 
                where ((carrera = '$carrera' or carrera = 'IND MECANICA TERMICA') and periodo = '$BDSeleccionada')";
            }

            else if (($carrera == 'ING INDUSTRIAL') || ($carrera == 'ING INDUSTRIAL ELECTRONICA') || ($carrera == 'ING INDUSTRIAL MECANICA') || ($carrera == 'ING INDUSTRIAL PRODUCCION')) {
                $consulta_6anios = "SELECT num_control, edad, sexo 
                FROM $tabla_TitEgr 
                where ((carrera = '$carrera' or carrera = 'ING INDUSTRIAL ELECTRICA' or carrera = 'ING INDUSTRIAL ABIERTA' or carrera = 'IND ELECTRONICA') and periodo = '$BDSeleccionada')";
            }

            else {
                $consulta_6anios = "SELECT num_control, edad, sexo 
                FROM $tabla_TitEgr 
                where (carrera = '$carrera' and periodo = '$BDSeleccionada')";
            }

            $query_6anios = $consulta_6anios;
            $result_6anios = $db->query($query_6anios);
            //-----------------------------------------------


            #fecha TNM 5 años
            $mes_tnm_5anios= substr($fecha_5anios,0,3);
            $anio_tnm_5anios = substr($fecha_5anios,8,4);
            $rep_tnm_5anios = $mes_tnm_5anios. $anio_tnm_5anios;

            #fecha TNM 6 años
            $mes_tnm_6anios = substr($BDSeleccionada,0,3);
            $anio_tnm_6anios = substr($BDSeleccionada,8,4);
            $rep_tnm_6anios = $mes_tnm_6anios . $anio_tnm_6anios;

            #fecha matricula
            $mes_matricula = substr($fecha_TNM2,4,3);
            $anio_matricula = substr($fecha_TNM2,8,4);
            $rep_matricula = $mes_matricula . $anio_matricula;


            # Encabezado
            if ($swPrintHeadings == 0)
            {
                print <<<EOF
                <tr>
                    <th id="subEncabezado" rowspan = 2>Carrera                 </th>
                    <!-- <th class= hide_all > &nbsp;                          </th>  -->
                    <th id="subEncabezado" colspan = 3>Eficiencia TNM 5 (años) </th>
                </tr>
                <tr>    
                    <th id="subEncabezado">Ingreso 
EOF;

                        echo "$rep_matricula";
                        print <<<EOF
                    </th>
                    <th id="subEncabezado">

EOF;
                        if ($tabla_TitEgr == 'titulados')
                            echo "Titulados $rep_tnm_6anios";
                        if ($tabla_TitEgr == 'egresados')
                            echo "Egresados $rep_tnm_6anios";
                        print <<<EOF
                    
                    </th>

                    <th id="subEncabezado">

EOF;
                        if ($tabla_TitEgr == 'titulados')
                            echo "Efic. Term.(%)";
                        if ($tabla_TitEgr == 'egresados')
                            echo "Efic. Egre.(%)";
                        print <<<EOF
                    
                    </th>                

                </tr>

EOF;
            } // if ($swPrintHeadings == 0) 


            # Armar el reporte de MATRICULAS (6 años)
            while( $row = $result_matriculas->fetch_assoc()) {

                if ($row['hom1'] != null)
                {
                    $hom_matricula = $row['hom1'];
                    $muj_matricula = $row['muj1'];
                }  //cierre de if ($row['hom1'] != null)

            }  //cierre while Matriculas



            # Armar el reporte de TITULADOS 6 años
            while ($row = $result_6anios->fetch_assoc()) {
                
                //echo "control: $row[num_control] edad: $row[edad] genero: $row[sexo] </br>";

                if ($row['sexo'] == 'M')
                    $hom_tit_6anios = $hom_tit_6anios + 1;
                if ($row['sexo'] == 'F')
                    $muj_tit_6anios = $muj_tit_6anios + 1;                       

            }  //cierre while Titulados Egresados


            #contadores de detalle
            $gran_matricula = $hom_matricula  + $muj_matricula;
            $gran_tit_6anios = $hom_tit_6anios + $muj_tit_6anios;
                 
            #contadores de totales generales
            $gral_mat = $gral_mat + $gran_matricula;
            $gral_6anios = $gral_6anios + $gran_tit_6anios;
            

            if ( ($gran_tit_6anios != 0) || ($gran_matricula != 0) ){

                #Imprimir Detalle del Reporte
                print <<<EOF
                <tr id="trChico">
                    <td id="SubEncabezadoChico">$rubro         </td>             
                    <td id="DetalleChico" >$gran_matricula     </td>
                    <td id="DetalleChico" >$gran_tit_6anios    </td>
                    <td id="DetalleChico" >
EOF;
                        if ($gran_matricula != 0)
                            echo (number_format((($gran_tit_6anios/$gran_matricula) * 100),2));
                        else 
                        echo "0";
                        

                    print <<<EOF
                    </td>
                </tr>

EOF;
            }  // if ($gral_5anios !=null) && ($gral_6anios!=null)

        }   //function TNM 5 años


    }    //class eficiencia_TNM


    class eficiencia_corchete
    {

        function matricula_corchete($tabla, $fecha_corchete, $db, $host, $user, $pwd){ 

            global $matricula_corchete;

            // OBTENER numero de 1er Ingreso en ene-jun 6 años previos
            
            $consulta_Cor = "SELECT 
            sum(hom1)  as hom1,
            sum(muj1)  as muj1
            FROM $tabla where (periodo = '$fecha_corchete')";

            # ejecucion de consulta 
            $query_Cor = $consulta_Cor;
            $result_Cor = $db->query($query_Cor);

            $matricula_corchete = 0;

            while( $row = $result_Cor->fetch_assoc()) 
                    $matricula_corchete = $matricula_corchete + $row['hom1'] + $row['muj1'];;
        
        }

        function fechas_corchete($BDSeleccionada){

            global $fechas_tit;     // guarda fechas apartir de periodo seleccionado y 3 semestres previos
            global $fechas_tit2;    // guarda fechas apartir del periodo previo al periodo seleccionado y 3 semestres previos

            //definir los periodos a utilizar en consulta de titulados o egresados en periodo actual y 5 sem previos
            
            $sem_temp = substr($BDSeleccionada,0,8);
            $anio_temp = substr($BDSeleccionada,8,4);

            for ($i=0; $i<6; $i++) {
                
                if ($i == 0){
                    $fechas_tit[$i] = $sem_temp . strval($anio_temp);
                    $fechas_tit2[$i] = $sem_temp . strval($anio_temp-1);
                }

                else {
                    if ($sem_temp == 'ene_jun_'){
                        $sem_temp   = 'ago_dic_';
                        $anio_temp  = $anio_temp - 1;
                        $fechas_tit[$i] = $sem_temp . strval($anio_temp);
                        $fechas_tit2[$i] = $sem_temp . strval($anio_temp-1);
                    }

                    else {
                        $sem_temp   = 'ene_jun_';
                        $fechas_tit[$i] = $sem_temp . strval($anio_temp);
                        $fechas_tit2[$i] = $sem_temp . strval($anio_temp-1);
                    }
                }

            }

        }



        // funcion para obtener reporte de eficiencia terminal o de egreso en base a matricula de 5 años previos a la fecha de titulacion o egreso en periodo actual.

        function reporte_corchete_5anios ($carrera, $swAbierta, $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla, $fecha_TNM2, $primer_ingreso2, $fechas_tit, $fechas_tit2, $db, $host, $user, $pwd, $swPrintHeadings){  

            global $hom_tit_5anios;
            global $muj_tit_5anios;
            global $gran_tit_5anios;;
            global $hom_matricula;
            global $muj_matricula;
            global $gran_matricula;
            global $hom_tit_6anios;
            global $muj_tit_6anios;
            global $gran_tit_6anios;

            global $gral_5anios;
            global $gral_mat;
            global $gral_6anios;


            // CONSULTA 1er INGRESO (MATRICULAS 5 años)

            // fecha de 5 años previos a periodo actual, para consulta de Matriculas

            $sem_temp   = substr($fecha_TNM2,0,8);
            $anio_temp  = (substr($fecha_TNM2,8,4) + 1); 
            $fecha_TNM2 = $sem_temp . strval($anio_temp);

            // considerar educacion a distancia en el reporte
            if (($carrera == 'ING INDUSTRIAL DIST') || ($carrera == 'ING GESTION EMPR. DIST') || ($carrera == 'ING GESTION EMPR. DIST')) {
                
                if (($carrera == 'ING INDUSTRIAL DIST')){
                    $carrera2 = 'ING INDUSTRIAL';
                }
                if ($carrera == 'ING GESTION EMPR. DIST') {
                    $carrera2 = 'ING GESTION EMPR.';
                }
                if ($carrera == 'ING SISTEMAS COMP. DIST') {
                    $carrera2 = 'ING SISTEMAS COMP.';
                }

                $consulta_matriculas = "SELECT 
                sum(hom1)  as hom1,
                sum(muj1)  as muj1
                FROM $tabla where (carrera = '$carrera2' and abierta = '$swAbierta' and distancia = '$swDistancia' and periodo = '$fecha_TNM2')";

            }
           
            else {

                $consulta_matriculas = "SELECT 
                sum(hom1)  as hom1,
                sum(muj1)  as muj1
                FROM $tabla where (carrera = '$carrera' and abierta = '$swAbierta' and distancia = '$swDistancia' and periodo = '$fecha_TNM2')";
            }


            $rubro = $carrera;

            # ejecucion de consulta 
            $query_matriculas = $consulta_matriculas;
            $result_matriculas = $db->query($query_matriculas);
            //echo "registros: $result_matriculas->num_rows";

            //echo "query: $query_matriculas </br>";


            // CONSULTA DE TITULADOS o EGRESADOS PERIODO ACTUAL (6 años)

            if ($carrera == 'ING MECANICA') {
                $consulta_6anios = "SELECT num_control, edad, sexo 
                FROM $tabla_TitEgr 
                where ((carrera = '$carrera' or carrera = 'IND MECANICA TERMICA') and (periodo = '$fechas_tit[0]' or periodo = '$fechas_tit[1]' or periodo = '$fechas_tit[2]' or periodo = '$fechas_tit[3]' or periodo = '$fechas_tit[4]' or periodo = '$fechas_tit[5]'))";
            }

            else if (($carrera == 'ING INDUSTRIAL') || ($carrera == 'ING INDUSTRIAL ELECTRONICA') || ($carrera == 'ING INDUSTRIAL MECANICA') || ($carrera == 'ING INDUSTRIAL PRODUCCION')) {
                $consulta_6anios = "SELECT num_control, edad, sexo 
                FROM $tabla_TitEgr 
                where ((carrera = '$carrera' or carrera = 'ING INDUSTRIAL ELECTRICA' or carrera = 'ING INDUSTRIAL ABIERTA' or carrera = 'IND ELECTRONICA' or carrera = 'ING INDUSTRIAL VESP') and (periodo = '$fechas_tit[0]' or periodo = '$fechas_tit[1]' or periodo = '$fechas_tit[2]' or periodo = '$fechas_tit[3]' or periodo = '$fechas_tit[4]' or periodo = '$fechas_tit[5]'))";
            }

            else {
                $consulta_6anios = "SELECT num_control, edad, sexo 
                FROM $tabla_TitEgr 
                where (carrera = '$carrera' and (periodo = '$fechas_tit[0]' or periodo = '$fechas_tit[1]' or periodo = '$fechas_tit[2]' or periodo = '$fechas_tit[3]' or periodo = '$fechas_tit[4]' or periodo = '$fechas_tit[5]'))";
            }

            # ejecucion de consulta 
            $query_6anios = $consulta_6anios;
            $result_6anios = $db->query($query_6anios);
            //echo "registros: $result_6anios->num_rows";
            //-----------------------------------------------

            //echo "query: $query_6anios </br>";

            /*
            $sem_temp = substr($BDSeleccionada,0,8);
            $anio_temp = substr($BDSeleccionada,8,4);

            //obtener fecha para consulta (10 semestres)
            for ($i = 0; $i < 9; $i++){

                if ($sem_temp == 'ene_jun_'){
                    $sem_temp    = 'ago_dic_';
                    $anio_temp  = $anio_temp - 1;
                    $fecha_TNM  = $sem_temp . strval($anio_temp);

                }
                else {
                    $sem_temp    = 'ene_jun_';
                    $fecha_TNM  = $sem_temp . strval($anio_temp);
                }
            }
            */

            
            $mes_5anios   = substr($BDSeleccionada,0,8);
            $anio_5anios  = substr($BDSeleccionada,8,4);
            $anio_5anios  = $anio_5anios - 1;
            $fecha_5anios = $mes_5anios. strval($anio_5anios);

            #fecha TNM 5 años
            $mes_tnm_5anios= substr($fecha_5anios,0,3);
            $anio_tnm_5anios = substr($fecha_5anios,8,4);
            $rep_tnm_5anios = $mes_tnm_5anios. $anio_tnm_5anios;
            

            #fecha TNM 6 años
            $mes_tnm_6anios = substr($BDSeleccionada,0,3);
            $anio_tnm_6anios = substr($BDSeleccionada,8,4);
            $rep_tnm_6anios = $mes_tnm_6anios . $anio_tnm_6anios;

            #fecha matricula
            $mes_matricula = substr($fecha_TNM2,4,3);
            $anio_matricula = substr($fecha_TNM2,8,4);
            $rep_matricula = $mes_matricula . $anio_matricula;
            

            # Encabezado
            if ($swPrintHeadings == 0)
            {
                print <<<EOF
                <tr>
                    <th id="subEncabezado" rowspan = 2>Carrera                 </th>
                    <th id="subEncabezado" colspan = 3>Eficiencia por Corchete 5 (años) </th>
                </tr>
                <tr>    
                    <th id="subEncabezado">Ingreso 
EOF;

                        echo "$rep_matricula";
                        print <<<EOF
                    </th>

                    <th id="subEncabezado">

EOF;
                        if ($tabla_TitEgr == 'titulados')
                            echo "Titulados $rep_tnm_6anios";
                        if ($tabla_TitEgr == 'egresados')
                            echo "Egresados $rep_tnm_6anios";
                        print <<<EOF
                    
                    </th>

                    <th id="subEncabezado">

EOF;
                        if ($tabla_TitEgr == 'titulados')
                            echo "Efic. Term.(%)";
                        if ($tabla_TitEgr == 'egresados')
                            echo "Efic. Egre.(%)";
                        print <<<EOF
                    
                    </th>
                    

                </tr>

EOF;
            } // if ($swPrintHeadings == 0)



            # Armar el reporte de MATRICULAS 6 años
            while( $row = $result_matriculas->fetch_assoc()) {

                if ($row['hom1'] != null)
                {
        
                    $hom_matricula = $row['hom1'];
                    $muj_matricula = $row['muj1'];

                }  //cierre de if ($row['hom1'] != null)
                
            }  //cierre while Matriculas



            # semestre y anio a usar en el filtro de titulados o egresados
            $titulados_sem  = substr($fecha_TNM2, 0, 8);
            $titulados_anio = substr($fecha_TNM2, 10, 4);

            /*
            echo "criterios de busqueda </br>";
            echo "sem: $titulados_sem </br>";
            echo "año: $titulados_anio </br>";
            echo "matricula: $primer_ingreso2 </br>";
            */
            


            # ARMAR REPORTE DE TITULADOS 6 años

            while ($row = $result_6anios->fetch_assoc()) {
                
                $long_num_control = strlen ($row['num_control']);

                if ($long_num_control == 9){
                    $num_control_cons = substr($row['num_control'],-4);
                    $num_control_anio = substr($row['num_control'],1,2);
                }
                if ($long_num_control == 8){
                    $num_control_cons = substr($row['num_control'],-4);
                    $num_control_anio = substr($row['num_control'],0,2);
                }

                if ($long_num_control == 7) {
                    $num_control_cons = (substr($row['num_control'],-3) . "5");
                    $num_control_anio = substr($row['num_control'],0,2);
                }

                if ( ($long_num_control == 7) or ($long_num_control == 8) or ($long_num_control == 9) ) {

                    
                    if ($titulados_sem == 'ene_jun_') {
                    
                        if ( ($num_control_anio == $titulados_anio)  &&  ($num_control_cons <= $primer_ingreso2) ) {
                            /*
                            if ($carrera == 'ING INDUSTRIAL') {
                                echo "$row[num_control] </br>";
                            }
                            */

                            if ($row['sexo'] == 'M')
                                $hom_tit_6anios = $hom_tit_6anios + 1;
                            if ($row['sexo'] == 'F')
                                $muj_tit_6anios = $muj_tit_6anios + 1;
                        }
                    }

                    if ($titulados_sem == 'ago_dic_') {
                    
                        if ( ($num_control_anio == $titulados_anio)  &&  ($num_control_cons > $primer_ingreso2) ) {

                            if ($row['sexo'] == 'M')
                                $hom_tit_6anios = $hom_tit_6anios + 1;
                            if ($row['sexo'] == 'F')
                                $muj_tit_6anios = $muj_tit_6anios + 1;
                        }
                    }   
                } 

                else {
                    echo "NumCtrl INCORRECTO: $row[num_control] $carrera</br>";
                }                   

            }  //cierre while Titulados Egresados


            #contadores de detalle
            $gran_matricula = $hom_matricula  + $muj_matricula;
            $gran_tit_6anios = $hom_tit_6anios + $muj_tit_6anios;
                 
            #contadores de totales generales
            $gral_mat = $gral_mat + $gran_matricula;
            $gral_6anios = $gral_6anios + $gran_tit_6anios;

            if ( ($gran_tit_6anios != 0) || ($gran_matricula != 0) ){

            #Imprimir Detalle del Reporte
                print <<<EOF
                <tr id="trChico">
                    <td id="SubEncabezadoChico">$rubro         </td>             
                    <td id="DetalleChico" >$gran_matricula     </td>
                    <td id="DetalleChico" >$gran_tit_6anios    </td>
                    <td id="DetalleChico" >
EOF;
                        if ($gran_matricula !=  0)
                            echo (number_format((($gran_tit_6anios/$gran_matricula) * 100), 2));
                        else 
                            echo "0";
                        
                    print <<<EOF
                    </td>
                </tr>

EOF;
            }  // if ($gral_5anios !=null) && ($gral_6anios!=null)

        }   //function



    
        // funcion para obtener reporte de eficiencia terminal o de egreso en base a matricula de 6 años previos a la fecha de titulacion o egreso en periodo actual y año previo.

        function reporte_corchete ($carrera, $swAbierta, $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla, $fecha_TNM2, $primer_ingreso2, $fechas_tit, $fechas_tit2, $db, $host, $user, $pwd, $swPrintHeadings){  

            global $hom_tit_5anios;
            global $muj_tit_5anios;
            global $gran_tit_5anios;;
            global $hom_matricula;
            global $muj_matricula;
            global $gran_matricula;
            global $hom_tit_6anios;
            global $muj_tit_6anios;
            global $gran_tit_6anios;

            global $gral_5anios;
            global $gral_mat;
            global $gral_6anios;


            // CONSULTA 1er INGRESO (MATRICULAS 6 años)

            if (($carrera == 'ING INDUSTRIAL DIST') || ($carrera == 'ING GESTION EMPR. DIST') || ($carrera == 'ING SISTEMAS COMP. DIST')) {
                
                if (($carrera == 'ING INDUSTRIAL DIST')){
                    $carrera2 = 'ING INDUSTRIAL';
                }
                if ($carrera == 'ING GESTION EMPR. DIST') {
                    $carrera2 = 'ING GESTION EMPR.';
                }
                if ($carrera == 'ING SISTEMAS COMP DIST') {
                    $carrera2 = 'ING SISTEMAS COMP.';
                }

                $consulta_matriculas = "SELECT 
                sum(hom1)  as hom1,
                sum(muj1)  as muj1
                FROM $tabla where (carrera = '$carrera2' and abierta = '$swAbierta' and distancia = '$swDistancia' and periodo = '$fecha_TNM2')";

            }
           
            else {

                $consulta_matriculas = "SELECT 
                sum(hom1)  as hom1,
                sum(muj1)  as muj1
                FROM $tabla where (carrera = '$carrera' and abierta = '$swAbierta' and distancia = '$swDistancia' and periodo = '$fecha_TNM2')";

            }


            $rubro = $carrera;

            # ejecucion de consulta 
            $query_matriculas = $consulta_matriculas;
            $result_matriculas = $db->query($query_matriculas);
            //echo "registros: $result_matriculas->num_rows";


            // CONSULTA DE TITULADOS 1 AÑO PREVIO AL PERIODO ACTUAL (5 AÑOS)

            if ($carrera == 'ING MECANICA') {
                $consulta_5anios = "SELECT num_control, edad, sexo 
                FROM $tabla_TitEgr 
                where ((carrera = '$carrera' or carrera = 'IND MECANICA TERMICA') and (periodo = '$fechas_tit2[0]' or periodo = '$fechas_tit2[1]' or periodo = '$fechas_tit2[2]' or periodo = '$fechas_tit2[3]' or periodo = '$fechas_tit2[4]' or periodo = '$fechas_tit2[5]'))";
            }

            else if (($carrera == 'ING INDUSTRIAL') || ($carrera == 'ING INDUSTRIAL ELECTRONICA') || ($carrera == 'ING INDUSTRIAL MECANICA') || ($carrera == 'ING INDUSTRIAL PRODUCCION')) {
                $consulta_5anios = "SELECT num_control, edad, sexo 
                FROM $tabla_TitEgr 
                where ((carrera = '$carrera' or carrera = 'ING INDUSTRIAL ELECTRICA' or carrera = 'ING INDUSTRIAL ABIERTA' or carrera = 'IND ELECTRONICA' or carrera = 'ING INDUSTRIAL VESP') and (periodo = '$fechas_tit2[0]' or periodo = '$fechas_tit2[1]' or periodo = '$fechas_tit2[2]' or periodo = '$fechas_tit2[3]' or periodo = '$fechas_tit2[4]' or periodo = '$fechas_tit2[5]'))";
            }

            else {
                $consulta_5anios = "SELECT num_control, edad, sexo 
                FROM $tabla_TitEgr 
                where (carrera = '$carrera' and (periodo = '$fechas_tit2[0]' or periodo = '$fechas_tit2[1]' or periodo = '$fechas_tit2[2]' or periodo = '$fechas_tit2[3]' or periodo = '$fechas_tit2[4]' or periodo = '$fechas_tit2[5]'))";
            }

            # ejecucion de consulta 
            $query_5anios = $consulta_5anios;
            //echo "$query_5anios<br>";
            $result_5anios = $db->query($query_5anios);
            //echo "registros: $result_5anios->num_rows";
            //-----------------------------------------------


            // CONSULTA DE TITULADOS o EGRESADOS PERIODO ACTUAL (6 años)

            if ($carrera == 'ING MECANICA') {
                $consulta_6anios = "SELECT num_control, edad, sexo 
                FROM $tabla_TitEgr 
                where ((carrera = '$carrera' or carrera = 'IND MECANICA TERMICA') and (periodo = '$fechas_tit[0]' or periodo = '$fechas_tit[1]' or periodo = '$fechas_tit[2]' or periodo = '$fechas_tit[3]' or periodo = '$fechas_tit[4]' or periodo = '$fechas_tit[5]'))";
            }

            else if (($carrera == 'ING INDUSTRIAL') || ($carrera == 'ING INDUSTRIAL ELECTRONICA') || ($carrera == 'ING INDUSTRIAL MECANICA') || ($carrera == 'ING INDUSTRIAL PRODUCCION')) {
                $consulta_6anios = "SELECT num_control, edad, sexo 
                FROM $tabla_TitEgr 
                where ((carrera = '$carrera' or carrera = 'ING INDUSTRIAL ELECTRICA' or carrera = 'ING INDUSTRIAL ABIERTA' or carrera = 'IND ELECTRONICA' or carrera = 'ING INDUSTRIAL VESP') and (periodo = '$fechas_tit[0]' or periodo = '$fechas_tit[1]' or periodo = '$fechas_tit[2]' or periodo = '$fechas_tit[3]' or periodo = '$fechas_tit[4]' or periodo = '$fechas_tit[5]'))";
            }

            else {
                $consulta_6anios = "SELECT num_control, edad, sexo 
                FROM $tabla_TitEgr 
                where (carrera = '$carrera' and (periodo = '$fechas_tit[0]' or periodo = '$fechas_tit[1]' or periodo = '$fechas_tit[2]' or periodo = '$fechas_tit[3]' or periodo = '$fechas_tit[4]' or periodo = '$fechas_tit[5]'))";
            }

            # ejecucion de consulta 
            $query_6anios = $consulta_6anios;
            $result_6anios = $db->query($query_6anios);
            //echo "registros: $result_6anios->num_rows";
            //-----------------------------------------------

            /*
            $sem_temp = substr($BDSeleccionada,0,8);
            $anio_temp = substr($BDSeleccionada,8,4);

            //obtener fecha para consulta (10 semestres)
            for ($i = 0; $i < 9; $i++){

                if ($sem_temp == 'ene_jun_'){
                    $sem_temp    = 'ago_dic_';
                    $anio_temp  = $anio_temp - 1;
                    $fecha_TNM  = $sem_temp . strval($anio_temp);

                }
                else {
                    $sem_temp    = 'ene_jun_';
                    $fecha_TNM  = $sem_temp . strval($anio_temp);
                }
            }
            */

            $mes_5anios   = substr($BDSeleccionada,0,8);
            $anio_5anios  = substr($BDSeleccionada,8,4);
            $anio_5anios  = $anio_5anios - 1;
            $fecha_5anios = $mes_5anios. strval($anio_5anios);

            #fecha TNM 5 años
            $mes_tnm_5anios= substr($fecha_5anios,0,3);
            $anio_tnm_5anios = substr($fecha_5anios,8,4);
            $rep_tnm_5anios = $mes_tnm_5anios. $anio_tnm_5anios;

            #fecha TNM 6 años
            $mes_tnm_6anios = substr($BDSeleccionada,0,3);
            $anio_tnm_6anios = substr($BDSeleccionada,8,4);
            $rep_tnm_6anios = $mes_tnm_6anios . $anio_tnm_6anios;

            #fecha matricula
            $mes_matricula = substr($fecha_TNM2,4,3);
            $anio_matricula = substr($fecha_TNM2,8,4);
            $rep_matricula = $mes_matricula . $anio_matricula;


            # Encabezado
            if ($swPrintHeadings == 0)
            {
                print <<<EOF
                <tr>
                    <th id="subEncabezado" rowspan = 2>Carrera                 </th>
                    <th id="subEncabezado" colspan = 3>Eficiencia por Corchete 5 (años) </th>
                    <!-- <th class= hide_all > &nbsp;                          </th>  -->
                    <th id="subEncabezado" colspan = 3>Eficiencia por Corchete 6 (años) </th>
                </tr>
                <tr>    
                    <th id="subEncabezado">Ingreso 
EOF;

                        echo "$rep_matricula";
                        print <<<EOF
                    </th>
                    <th id="subEncabezado">

EOF;
                        if ($tabla_TitEgr == 'titulados')
                            echo "Titulados $rep_tnm_5anios";
                        if ($tabla_TitEgr == 'egresados')
                            echo "Egresados $rep_tnm_5anios";
                        print <<<EOF
                    
                    </th>

                    <th id="subEncabezado">

EOF;
                        if ($tabla_TitEgr == 'titulados')
                            echo "Efic. Term.(%)";
                        if ($tabla_TitEgr == 'egresados')
                            echo "Efic. Egre.(%)";
                        print <<<EOF
                    
                    </th>
                    


                    <th id="subEncabezado">Ingreso 
EOF;

                        echo "$rep_matricula";
                        print <<<EOF
                    </th>
                    <th id="subEncabezado">

EOF;
                        if ($tabla_TitEgr == 'titulados')
                            echo "Titulados $rep_tnm_6anios";
                        if ($tabla_TitEgr == 'egresados')
                            echo "Egresados $rep_tnm_6anios";
                        print <<<EOF
                    
                    </th>

                    <th id="subEncabezado">

EOF;
                        if ($tabla_TitEgr == 'titulados')
                            echo "Efic. Term.(%)";
                        if ($tabla_TitEgr == 'egresados')
                            echo "Efic. Egre.(%)";
                        print <<<EOF
                    
                    </th>
                    

                </tr>

EOF;
            } // if ($swPrintHeadings == 0) 


            # Armar el reporte de MATRICULAS 6 años
            while( $row = $result_matriculas->fetch_assoc()) {

                if ($row['hom1'] != null)
                {
        
                    $hom_matricula = $row['hom1'];
                    $muj_matricula = $row['muj1'];

                }  //cierre de if ($row[hom1] != null)
                
            }  //cierre while Matriculas



            # semestre y anio a usar en el filtro de titulados o egresados
            $titulados_sem  = substr($fecha_TNM2, 0, 8);
            $titulados_anio = substr($fecha_TNM2, 10, 4);

            /*
            echo "criterios de busqueda </br>";
            echo "sem: $titulados_sem </br>";
            echo "año: $titulados_anio </br>";
            echo "matricula: $primer_ingreso2 </br>";
            */


            #ARMAR REPORTE DE TITULADOS 5 años

            while( $row = $result_5anios->fetch_assoc()) {

                $long_num_control = strlen ($row['num_control']);

                if ($long_num_control == 9){
                    $num_control_cons = substr($row['num_control'],-4);
                    $num_control_anio = substr($row['num_control'],1,2);
                }
                if ($long_num_control == 8){
                    $num_control_cons = substr($row['num_control'],-4);
                    $num_control_anio = substr($row['num_control'],0,2);
                }

                if ($long_num_control == 7) {       
                    $num_control_cons = (substr($row['num_control'],-3) . "5");
                    $num_control_anio = substr($row['num_control'],0,2);
                }

                if (($long_num_control == 7) or ($long_num_control == 8) or ($long_num_control == 9)) {

                    if ($titulados_sem == 'ene_jun_') {
                    
                        if ( ($num_control_anio == $titulados_anio)  &&  ($num_control_cons <= $primer_ingreso2) ) {

                            if ($row['sexo'] == 'M')
                                $hom_tit_5anios = $hom_tit_5anios + 1;
                            if ($row['sexo'] == 'F')
                                $muj_tit_5anios = $muj_tit_5anios + 1;
                        }
                    }

                    if ($titulados_sem == 'ago_dic_') {
                    
                        if ( ($num_control_anio == $titulados_anio)  &&  ($num_control_cons > $primer_ingreso2) ) {

                            if ($row['sexo'] == 'M')
                                $hom_tit_5anios = $hom_tit_5anios + 1;
                            if ($row['sexo'] == 'F')
                                $muj_tit_5anios = $muj_tit_5anios + 1;
                        }
                    }
                }

                else {
                    echo "NumCtrl INCORRECTO: $row[num_control] $carrera</br>";
                } 

            }  //cierre while Matriculas



            # ARMAR REPORTE DE TITULADOS 6 años

            while ($row = $result_6anios->fetch_assoc()) {
                
                $long_num_control = strlen ($row['num_control']);

                if ($long_num_control == 9){
                    $num_control_cons = substr($row['num_control'],-4);
                    $num_control_anio = substr($row['num_control'],1,2);
                }
                if ($long_num_control == 8){
                    $num_control_cons = substr($row['num_control'],-4);
                    
                    $num_control_anio = substr($row['num_control'],0,2);
                }

                if ($long_num_control == 7) {
                    $num_control_cons = (substr($row['num_control'],-3) . "5");
                    $num_control_anio = substr($row['num_control'],0,2);
                }

                if ( ($long_num_control == 7) or ($long_num_control == 8) or ($long_num_control == 9) ) {

                    
                    if ($titulados_sem == 'ene_jun_') {
                    
                        if ( ($num_control_anio == $titulados_anio)  &&  ($num_control_cons <= $primer_ingreso2) ) {
                            /*
                            if ($carrera == 'ING INDUSTRIAL') {
                                echo "$row[num_control] </br>";
                            }
                            */

                            if ($row['sexo'] == 'M')
                                $hom_tit_6anios = $hom_tit_6anios + 1;
                            if ($row['sexo'] == 'F')
                                $muj_tit_6anios = $muj_tit_6anios + 1;
                        }
                    }

                    if ($titulados_sem == 'ago_dic_') {
                    
                        if ( ($num_control_anio == $titulados_anio)  &&  ($num_control_cons > $primer_ingreso2) ) {

                            if ($row['sexo'] == 'M')
                                $hom_tit_6anios = $hom_tit_6anios + 1;
                            if ($row['sexo'] == 'F')
                                $muj_tit_6anios = $muj_tit_6anios + 1;
                        }
                    }   
                } 

                else {
                    echo "NumCtrl INCORRECTO: $row[num_control] $carrera</br>";
                }                   

            }  //cierre while Titulados Egresados


            #contadores de detalle
            $gran_matricula = $hom_matricula  + $muj_matricula;
            $gran_tit_5anios= $hom_tit_5anios  + $muj_tit_5anios;
            $gran_tit_6anios = $hom_tit_6anios + $muj_tit_6anios;
                 
            #contadores de totales generales
            $gral_mat = $gral_mat + $gran_matricula;
            $gral_5anios = $gral_5anios + $gran_tit_5anios;
            $gral_6anios = $gral_6anios + $gran_tit_6anios;

            if (($gran_tit_5anios!= 0) || ($gran_tit_6anios != 0) || ($gran_matricula != 0) ){

            #Imprimir Detalle del Reporte
                print <<<EOF
                <tr id="trChico">
                    <td id="SubEncabezadoChico">$rubro         </td>             
                    <td id="DetalleChico" >$gran_matricula     </td>
                    <td id="DetalleChico" >$gran_tit_5anios    </td>
                    <td id="DetalleChico" >
EOF;
                        if ($gran_matricula !=  0)
                            echo (number_format((($gran_tit_5anios/$gran_matricula) * 100), 2));
                        else 
                            echo "0";
                        
                    print <<<EOF
                    </td>
                    <td id="DetalleChico" >$gran_matricula     </td>
                    <td id="DetalleChico" >$gran_tit_6anios    </td>
                    <td id="DetalleChico" >
EOF;
                        if ($gran_matricula != 0)
                            echo (number_format((($gran_tit_6anios/$gran_matricula) * 100),2));
                        else 
                        echo "0";
                        

                    print <<<EOF
                    </td>
                </tr>

EOF;
            }  // if ($gral_5anios !=null) && ($gral_6anios!=null)

        }   //function

    } //class eficiencia_corchete

?>