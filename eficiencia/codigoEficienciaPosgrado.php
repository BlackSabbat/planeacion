   
    # REPORTE DE POSGRADO
    if ($reporteNombre == 'reporte2' or $reporteNombre == 'reporte4')
    {

        print <<<EOF
        <table border = 1>
EOF;

        $myMatricula = new eficiencia_corchete;

         # Establecer conexion
         $db = new mysqli($host, $user, $pwd, $base_datos);

        // OBTENER FECHA para la consulta de Matricula por Corchete es a 12 semestres (6 años) antes de su titulacion o egreso
        $anio_temp = $anio_rep;
        $sem_temp = $sem_rep;

        for ($i = 0; $i < 11; $i++){

            //echo "Sem: $sem_temporte </br>";

            if ($sem_temp == 'ene_jun_'){
                $sem_temp   = 'ago_dic_';
                $anio_temp  = $anio_temp - 1;
                $fecha_TNM2 = $sem_temp . strval($anio_temp);

            }
            else {
                $sem_temp   = 'ene_jun_';
                $fecha_TNM2 = $sem_temp . strval($anio_temp);
            }

        }
        # ---------------------------------------

        // OBTENER Matricula de ene-jun en el año escolar correspondiente

        if ($_POST["reporte_5Anios"] == 1) 
            $fecha_corchete = 'ene_jun_' . strval($anio_temp + 1);
        else
            $fecha_corchete = 'ene_jun_' . strval($anio_temp);

        $myMatricula -> matricula_corchete($tabla_Mat, $fecha_corchete, $db, $host, $user, $pwd);
        $primer_ingreso2 = $matricula_corchete;
    

        // obtener fechas para consultas de titulados del semestre y 5 posteriores
        $myMatricula -> fechas_corchete($BDSeleccionada);
    
        /*
        echo "vector1: $fechas_tit[0] </br>";
        echo "vector1: $fechas_tit[1] </br>";
        echo "vector1: $fechas_tit[2] </br>";
        echo "vector1: $fechas_tit[3] </br>";
        echo "vector1: $fechas_tit[4] </br>";
        echo "vector1: $fechas_tit[5] </br>";
        echo "</br>";
        echo "vector2: $fechas_tit2[0] </br>";
        echo "vector2: $fechas_tit2[1] </br>";
        echo "vector2: $fechas_tit2[2] </br>";
        echo "vector2: $fechas_tit2[3] </br>";
        echo "vector1: $fechas_tit2[4] </br>";
        echo "vector1: $fechas_tit2[5] </br>";
        */
    

        #Contadores Generales 
        $gral_5anios            = 0;
        $gral_mat               = 0;
        $gral_6anios            = 0;


        # MAESTRIA EN CIENCIAS DE LOS MATERIALES
        $swPrintHeadings        = 0;
        #contadores
        $hom_tit_5anios         = 0;
        $muj_tit_5anios         = 0;
        $gran_tit_5anios        = 0;
        $hom_matricula          = 0;
        $muj_matricula          = 0;
        $gran_matricula         = 0;
        $hom_tit_6anios         = 0;
        $muj_tit_6anios         = 0;
        $gran_tit_6anios        = 0;

        $carrera                = 'MC EN MATERIALES';
        $swAbierta              = '';
        $swDistancia            = '';

        if ($_POST["reporte_5Anios"] == 1) {
            #obener matriculados de 1er ingreso en 10 semestres previos a titulacion o egreso
            $myMatricula -> reporte_corchete_5anios ($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $primer_ingreso2, $fechas_tit, $fechas_tit2, $db, $host, $user, $pwd, $swPrintHeadings);
        }
        else {
            #obener matriculados de 1er ingreso en 12 semestres previos a titulacion o egreso
            $myMatricula -> reporte_corchete ($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $primer_ingreso2, $fechas_tit, $fechas_tit2, $db, $host, $user, $pwd, $swPrintHeadings);
        }

        $swPrintHeadings    = 1;


        # MAESTRIA EN INGENIERIA INDUSTRIAL
        #contadores
        $hom_tit_5anios         = 0;
        $muj_tit_5anios         = 0;
        $gran_tit_5anios        = 0;
        $hom_matricula          = 0;
        $muj_matricula          = 0;
        $gran_matricula         = 0;
        $hom_tit_6anios         = 0;
        $muj_tit_6anios         = 0;
        $gran_tit_6anios        = 0;

        $carrera                = 'MAEST EN ING. INDUSTRIAL';
        $swAbierta              = '';
        $swDistancia            = '';

        if ($_POST["reporte_5Anios"] == 1) {
            #obener matriculados de 1er ingreso en 10 semestres previos a titulacion o egreso
            $myMatricula -> reporte_corchete_5anios ($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $primer_ingreso2, $fechas_tit, $fechas_tit2, $db, $host, $user, $pwd, $swPrintHeadings);
        }
        else {
            #obener matriculados de 1er ingreso en 12 semestres previos a titulacion o egreso
            $myMatricula -> reporte_corchete ($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $primer_ingreso2, $fechas_tit, $fechas_tit2, $db, $host, $user, $pwd, $swPrintHeadings);
        }


        # MAESTRIA EN CIENCIAS DE LA ADMINISTRACION
        #contadores
        $hom_tit_5anios         = 0;
        $muj_tit_5anios         = 0;
        $gran_tit_5anios        = 0;
        $hom_matricula          = 0;
        $muj_matricula          = 0;
        $gran_matricula         = 0;
        $hom_tit_6anios         = 0;
        $muj_tit_6anios         = 0;
        $gran_tit_6anios        = 0;

        $carrera                = 'MC en ADMINISTRACION';
        $swAbierta              = '';
        $swDistancia            = '';

        if ($_POST["reporte_5Anios"] == 1) {
            #obener matriculados de 1er ingreso en 10 semestres previos a titulacion o egreso
            $myMatricula -> reporte_corchete_5anios ($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $primer_ingreso2, $fechas_tit, $fechas_tit2, $db, $host, $user, $pwd, $swPrintHeadings);
        }
        else {
            #obener matriculados de 1er ingreso en 12 semestres previos a titulacion o egreso
            $myMatricula -> reporte_corchete ($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $primer_ingreso2, $fechas_tit, $fechas_tit2, $db, $host, $user, $pwd, $swPrintHeadings);
        }


        # ESPECIALIDAD EN INGENIERIA AMBIENTAL
        #contadores
        $hom_tit_5anios         = 0;
        $muj_tit_5anios         = 0;
        $gran_tit_5anios        = 0;
        $hom_matricula          = 0;
        $muj_matricula          = 0;
        $gran_matricula         = 0;
        $hom_tit_6anios         = 0;
        $muj_tit_6anios         = 0;
        $gran_tit_6anios        = 0;

        $carrera                = 'ESP EN ING. AMBIENTAL';
        $swAbierta              = '';
        $swDistancia            = '';

        if ($_POST["reporte_5Anios"] == 1) {
            #obener matriculados de 1er ingreso en 10 semestres previos a titulacion o egreso
            $myMatricula -> reporte_corchete_5anios ($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $primer_ingreso2, $fechas_tit, $fechas_tit2, $db, $host, $user, $pwd, $swPrintHeadings);
        }
        else {
            #obener matriculados de 1er ingreso en 12 semestres previos a titulacion o egreso
            $myMatricula -> reporte_corchete ($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $primer_ingreso2, $fechas_tit, $fechas_tit2, $db, $host, $user, $pwd, $swPrintHeadings);
        }


        # DOCTORADO EN CIENCIAS DE LA INGENIERIA
        #contadores
        $hom_tit_5anios         = 0;
        $muj_tit_5anios         = 0;
        $gran_tit_5anios        = 0;
        $hom_matricula          = 0;
        $muj_matricula          = 0;
        $gran_matricula         = 0;
        $hom_tit_6anios         = 0;
        $muj_tit_6anios         = 0;
        $gran_tit_6anios        = 0;

        $carrera                = 'DOC EN C. DE LA INGENIERIA';
        $swAbierta              = '';
        $swDistancia            = '';

        if ($_POST["reporte_5Anios"] == 1) {
            #obener matriculados de 1er ingreso en 10 semestres previos a titulacion o egreso
            $myMatricula -> reporte_corchete_5anios ($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $primer_ingreso2, $fechas_tit, $fechas_tit2, $db, $host, $user, $pwd, $swPrintHeadings);
        }
        else {
            #obener matriculados de 1er ingreso en 12 semestres previos a titulacion o egreso
            $myMatricula -> reporte_corchete ($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $primer_ingreso2, $fechas_tit, $fechas_tit2, $db, $host, $user, $pwd, $swPrintHeadings);
        }


        # DOCTORADO EN CIENCIAS DE LOS MATERIALES
        #contadores
        $hom_tit_5anios         = 0;
        $muj_tit_5anios         = 0;
        $gran_tit_5anios        = 0;
        $hom_matricula          = 0;
        $muj_matricula          = 0;
        $gran_matricula         = 0;
        $hom_tit_6anios         = 0;
        $muj_tit_6anios         = 0;
        $gran_tit_6anios        = 0;

        $carrera                = 'DOC EN C. EN MATERIALES';
        $swAbierta              = '';
        $swDistancia            = '';

        if ($_POST["reporte_5Anios"] == 1) {
            #obener matriculados de 1er ingreso en 10 semestres previos a titulacion o egreso
            $myMatricula -> reporte_corchete_5anios ($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $primer_ingreso2, $fechas_tit, $fechas_tit2, $db, $host, $user, $pwd, $swPrintHeadings);
        }
        else {
            #obener matriculados de 1er ingreso en 12 semestres previos a titulacion o egreso
            $myMatricula -> reporte_corchete ($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $primer_ingreso2, $fechas_tit, $fechas_tit2, $db, $host, $user, $pwd, $swPrintHeadings);
        }


        # imprimir totales y cerrar tabla del reporte
        print <<<EOF

        <tr>
            <th id="subEncabezado">Totales          </th>
EOF;
            if ($_POST["reporte_5Anios"] != 1)
            {
                print <<<EOF
                <th id="TotalesChico">$gral_mat         </th>
                <th id="TotalesChico">$gral_5anios      </th>
                <th id="TotalesChico">
EOF;
                    echo number_format((($gral_5anios/$gral_mat) * 100), 2);
                    print <<<EOF
                </th> 
EOF;

            }
            print <<<EOF
            <th id="TotalesChico">$gral_mat         </th>
            <th id="TotalesChico">$gral_6anios      </th>
            <th id="TotalesChico">
EOF;
                echo number_format((($gral_6anios/$gral_mat) * 100), 2);
                print <<<EOF
            </th> 

         </tr>

EOF;

    # Termina Tabla de Posgrado
        print <<<EOF
        </table>

EOF;
    } // fin reporte de Posgrado
