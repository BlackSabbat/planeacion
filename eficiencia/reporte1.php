<?php

    #-----------------------------------------------------------------------------
    # programador: ING Jose Ruben de la Peña Fuentes
    # objetivo: crear reporte "Eficiencia Terminal o Egreso segun TNM"
    #-----------------------------------------------------------------------------

    include ("clases.inc");
    include ("mysql_conection.inc");
    

    if ($reporteNombre == "reporte1" or $reporteNombre == "reporte2"){
        $tabla_TitEgr = 'titulados';
    }
    if ($reporteNombre == "reporte3" or $reporteNombre == "reporte4"){
        $tabla_TitEgr = 'egresados';
    }

    $tabla_Mat = 'matriculas_semestre';


    // OBTENER FECHA para consulta de Matricula, es a 12 semestres (6 años) antes de su titulacion o egreso
    $anio_temp = $anio_rep;
    $sem_temp = $sem_rep;

    for ($i = 0; $i < 11; $i++){

        //echo "Sem: $sem_temporte </br>";

        if ($sem_temp == 'ene_jun_'){
            $sem_temp    = 'ago_dic_';
            $anio_temp  = $anio_temp - 1;
            $fecha_TNM2  = $sem_temp . strval($anio_temp);
            
        }
        else {
            $sem_temp    = 'ene_jun_';
            $fecha_TNM2  = $sem_temp . strval($anio_temp);
        }
        //echo "Matricula TNM: $fecha_TNM </br>";
        
    }
    # ---------------------------------------


    # Tabla de Licenciaturas
    if ($reporteNombre == 'reporte1' or $reporteNombre == 'reporte3')
    {
        print <<<EOF
        <table id=federal width = 100%>
EOF;

        $myMatricula = new eficiencia_TNM;

        # Establecer conexion
        $db = new mysqli($host, $user, $pwd, $base_datos);

        #Contadores Generales 

        $gral_5anios          = 0;
        $gral_mat             = 0;
        $gral_6anios          = 0;


        # ING MECANICA
        $swPrintHeadings      = 0;

        #contadores
        $hom_tit_5anios       = 0;
        $muj_tit_5anios       = 0;
        $gran_tit_5anios      = 0;
        $hom_matricula        = 0;
        $muj_matricula        = 0;
        $gran_matricula       = 0;
        $hom_tit_6anios       = 0;
        $muj_tit_6anios       = 0;
        $gran_tit_6anios      = 0;

        $carrera              = 'ING MECANICA';
        $swAbierta            = '';
        $swDistancia          = '';

        if ($_POST["reporte_5Anios"] == 1) {
            #obener matriculados de 1er ingreso en 10 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM_5anios($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }
        else {
            #obener matriculados de 1er ingreso en 12 semestres previos a titulacion    o egreso
            $myMatricula -> reporte_TNM($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }
        $swPrintHeadings    = 1;


        # ING ELECTRICA 
    
        #contadores
        $hom_tit_5anios        = 0;
        $muj_tit_5anios        = 0;
        $gran_tit_5anios       = 0;
        $hom_matricula         = 0;
        $muj_matricula         = 0;
        $gran_matricula        = 0;
        $hom_tit_6anios        = 0;
        $muj_tit_6anios        = 0;
        $gran_tit_6anios       = 0;

        $carrera                = 'ING ELECTRICA';
        $swAbierta              = '';
        $swDistancia            = '';

        if ($_POST["reporte_5Anios"] == 1) {
            #obener matriculados de 1er ingreso en 10 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM_5anios($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }
        else {
            #obener matriculados de 1er ingreso en 12 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }


        # ING ELECTRONICA
        #contadores
        $hom_tit_5anios        = 0;
        $muj_tit_5anios        = 0;
        $gran_tit_5anios       = 0;
        $hom_matricula         = 0;
        $muj_matricula         = 0;
        $gran_matricula        = 0;
        $hom_tit_6anios        = 0;
        $muj_tit_6anios        = 0;
        $gran_tit_6anios       = 0;

        $carrera                = 'ING ELECTRONICA';
        $swAbierta              = '';
        $swDistancia            = '';

        if ($_POST["reporte_5Anios"] == 1) {
            #obener matriculados de 1er ingreso en 10 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM_5anios($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }
        else {
            #obener matriculados de 1er ingreso en 12 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }

    
        # ING INDUSTRIAL reporte incluye ing industrial vesp
        #egresados o titulados
        $hom_tit_5anios        = 0;
        $muj_tit_5anios        = 0;
        $gran_tit_5anios       = 0;
        $hom_matricula         = 0;
        $muj_matricula         = 0;
        $gran_matricula        = 0;
        $hom_tit_6anios        = 0;
        $muj_tit_6anios        = 0;
        $gran_tit_6anios       = 0;

        $carrera                = 'ING INDUSTRIAL';
        $swAbierta              = '';
        $swDistancia            = '';
    
        if ($_POST["reporte_5Anios"] == 1) {
            #obener matriculados de 1er ingreso en 10 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM_5anios($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }
        else {
            #obener matriculados de 1er ingreso en 12 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }


        # ING SISTEMAS COMPUTACIONALES
        $hom_tit_5anios        = 0;
        $muj_tit_5anios        = 0;
        $gran_tit_5anios       = 0;
        $hom_matricula         = 0;
        $muj_matricula         = 0;
        $gran_matricula         = 0;
        $hom_tit_6anios        = 0;
        $muj_tit_6anios        = 0;
        $gran_tit_6anios       = 0;

        $carrera                = 'ING SISTEMAS COMP.';
        $swAbierta              = '';
        $swDistancia            = '';

        if ($_POST["reporte_5Anios"] == 1) {
            #obener matriculados de 1er ingreso en 10 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM_5anios($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }
        else {
            #obener matriculados de 1er ingreso en 12 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }


        # ING MATERIALES
        $hom_tit_5anios        = 0;
        $muj_tit_5anios        = 0;
        $gran_tit_5anios       = 0;
        $hom_matricula         = 0;
        $muj_matricula         = 0;
        $gran_matricula        = 0;
        $hom_tit_6anios        = 0;
        $muj_tit_6anios        = 0;
        $gran_tit_6anios       = 0;

        $carrera                = 'ING MATERIALES';
        $swAbierta              = '';
        $swDistancia            = '';
    
        if ($_POST["reporte_5Anios"] == 1) {
            #obener matriculados de 1er ingreso en 10 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM_5anios($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }
        else {
            #obener matriculados de 1er ingreso en 12 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }


        # ING MECATRONICA
        $hom_tit_5anios        = 0;
        $muj_tit_5anios        = 0;
        $gran_tit_5anios       = 0;
        $hom_matricula         = 0;
        $muj_matricula         = 0;
        $gran_matricula        = 0;
        $hom_tit_6anios        = 0;
        $muj_tit_6anios        = 0;
        $gran_tit_6anios       = 0;

        $carrera                = 'ING MECATRONICA';
        $swAbierta              = '';
        $swDistancia            = '';

        if ($_POST["reporte_5Anios"] == 1) {
            #obener matriculados de 1er ingreso en 10 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM_5anios($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }
        else {
            #obener matriculados de 1er ingreso en 12 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }


        # LIC INFORMATICA
        $hom_tit_5anios        = 0;
        $muj_tit_5anios        = 0;
        $gran_tit_5anios       = 0;
        $hom_matricula         = 0;
        $muj_matricula         = 0;
        $gran_matricula        = 0;
        $hom_tit_6anios        = 0;
        $muj_tit_6anios        = 0;
        $gran_tit_6anios       = 0;
    
        $carrera                = 'LIC INFORMATICA';
        $swAbierta              = '';
        $swDistancia            = '';
    
        if ($_POST["reporte_5Anios"] == 1) {
            #obener matriculados de 1er ingreso en 10 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM_5anios($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }
        else {
            #obener matriculados de 1er ingreso en 12 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }


        # LIC ADMINISTRACION
        $hom_tit_5anios        = 0;
        $muj_tit_5anios        = 0;
        $gran_tit_5anios       = 0;
        $hom_matricula         = 0;
        $muj_matricula         = 0;
        $gran_matricula        = 0;
        $hom_tit_6anios        = 0;
        $muj_tit_6anios        = 0;
        $gran_tit_6anios       = 0;

        $carrera                = 'LIC ADMINISTRACION';
        $swAbierta              = '';
        $swDistancia            = '';
    
        if ($_POST["reporte_5Anios"] == 1) {
            #obener matriculados de 1er ingreso en 10 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM_5anios($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }
        else {
            #obener matriculados de 1er ingreso en 12 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }


        # LIC ADMINISTRACION ABIERTA
        $hom_tit_5anios        = 0;
        $muj_tit_5anios        = 0;
        $gran_tit_5anios       = 0;
        $hom_matricula         = 0;
        $muj_matricula         = 0;
        $gran_matricula        = 0;
        $hom_tit_6anios        = 0;
        $muj_tit_6anios        = 0;
        $gran_tit_6anios       = 0;

        $carrera                = 'LIC ADMINISTRACION ABIERTA';
        $swAbierta              = 'si';
        $swDistancia            = '';

    
        if ($_POST["reporte_5Anios"] == 1) {
            #obener matriculados de 1er ingreso en 10 semestres previos a   titulacion o egreso
            $myMatricula -> reporte_TNM_5anios($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }
        else {
            #obener matriculados de 1er ingreso en 12 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }



        # LIC ADMINISTRACION INDUSTRIAL
        $hom_tit_5anios        = 0;
        $muj_tit_5anios        = 0;
        $gran_tit_5anios       = 0;
        $hom_matricula         = 0;
        $muj_matricula         = 0;
        $gran_matricula        = 0;
        $hom_tit_6anios        = 0;
        $muj_tit_6anios        = 0;
        $gran_tit_6anios       = 0;

        $carrera                = 'LIC ADMINISTRACION INDUSTRIAL';
        $swAbierta              = '';
        $swDistancia            = '';
    
        if ($_POST["reporte_5Anios"] == 1) {
            #obener matriculados de 1er ingreso en 10 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM_5anios($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }
        else {
            #obener matriculados de 1er ingreso en 12 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }


        # ING GESTION EMPR.
        $hom_tit_5anios        = 0;
        $muj_tit_5anios        = 0;
        $gran_tit_5anios       = 0;
        $hom_matricula         = 0;
        $muj_matricula         = 0;
        $gran_matricula        = 0;
        $hom_tit_6anios        = 0;
        $muj_tit_6anios        = 0;
        $gran_tit_6anios       = 0;

        $carrera                = 'ING GESTION EMPR.';
        $swAbierta              = '';
        $swDistancia            = '';

        if ($_POST["reporte_5Anios"] == 1) {
            #obener matriculados de 1er ingreso en 10 semestres previos a   titulacion o egreso
            $myMatricula -> reporte_TNM_5anios($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }
        else {
            #obener matriculados de 1er ingreso en 12 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }


        # ING INFORMATICA
        $hom_tit_5anios        = 0;
        $muj_tit_5anios        = 0;
        $gran_tit_5anios       = 0;
        $hom_matricula         = 0;
        $muj_matricula         = 0;
        $gran_matricula        = 0;
        $hom_tit_6anios        = 0;
        $muj_tit_6anios        = 0;
        $gran_tit_6anios       = 0;

        $carrera                = 'ING INFORMATICA';
        $swAbierta              = '';
        $swDistancia            = '';

        if ($_POST["reporte_5Anios"] == 1) {
            #obener matriculados de 1er ingreso en 10 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM_5anios($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }
        else {
            #obener matriculados de 1er ingreso en 12 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }



        # ING INDUSTRIAL a DIST
        $hom_tit_5anios        = 0;
        $muj_tit_5anios        = 0;
        $gran_tit_5anios       = 0;
        $hom_matricula         = 0;
        $muj_matricula         = 0;
        $gran_matricula        = 0;
        $hom_tit_6anios        = 0;
        $muj_tit_6anios        = 0;
        $gran_tit_6anios       = 0;

        $carrera                = 'ING INDUSTRIAL DIST';
        $swAbierta              = '';
        $swDistancia            = 'si';

        if ($_POST["reporte_5Anios"] == 1) {
            #obener matriculados de 1er ingreso en 10 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM_5anios($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }
        else {
            #obener matriculados de 1er ingreso en 12 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }

    
        # ING GESTION EMPR. a DIST
        $hom_tit_5anios            = 0;
        $muj_tit_5anios            = 0;
        $gran_tit_5anios          = 0;
        $hom_matricula          = 0;
        $muj_matricula          = 0;
        $gran_matricula          = 0;
        $hom_tit_6anios        = 0;
        $muj_tit_6anios        = 0;
        $gran_tit_6anios       = 0;
    
        $carrera                = 'ING GESTION EMPR. DIST';
        $swAbierta              = '';
        $swDistancia            = 'si';
    
        if ($_POST["reporte_5Anios"] == 1) {
            #obener matriculados de 1er ingreso en 10 semestres previos a   titulacion o egreso
            $myMatricula -> reporte_TNM_5anios($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }
        else {
            #obener matriculados de 1er ingreso en 12 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }


        # imprimir totales y cerrar tabla del reporte
    
        print <<<EOF

        <tr>
            <th id="subEncabezado">Totales         </th>
EOF;
            if ($_POST["reporte_5Anios"] != 1)
            {
                print <<<EOF
                <th id="TotalesChico">$gral_mat        </th>
                <th id="TotalesChico">$gral_5anios     </th>
                <th id="TotalesChico">
EOF;
                    echo number_format((($gral_5anios/$gral_mat) * 100), 2);
                    print <<<EOF
                </th>
EOF;
            }
            print <<<EOF
            <th id="TotalesChico">$gral_mat       </th>
            <th id="TotalesChico">$gral_6anios    </th>
            <th id="TotalesChico">
EOF;
                echo number_format((($gral_6anios/$gral_mat) * 100), 2);
                print <<<EOF
            </th> 

        </tr>
EOF;
 
        # Termina Tabla de Licenciaturas
        print <<<EOF
        </table> 

EOF;
    
    } // fin de reporte de Licenciaturas

    # Tabla de Posgrado
    if ($reporteNombre == 'reporte2' or $reporteNombre == 'reporte4')
    {
        print <<<EOF
        <table id=federal width = 100%>
EOF;

        $myMatricula = new eficiencia_TNM;

        # Establecer conexion
        $db = new mysqli($host, $user, $pwd, $base_datos);

        #Contadores Generales 
        $gral_5anios          = 0;
        $gral_mat             = 0;
        $gral_6anios          = 0;


        # MAESTRIA EN CIENCIAS EN MATERIALES
        $swPrintHeadings      = 0;

        #contadores
        $hom_tit_5anios       = 0;
        $muj_tit_5anios       = 0;
        $gran_tit_5anios      = 0;
        $hom_matricula        = 0;
        $muj_matricula        = 0;
        $gran_matricula       = 0;
        $hom_tit_6anios       = 0;
        $muj_tit_6anios       = 0;
        $gran_tit_6anios      = 0;

        $carrera              = 'MC EN MATERIALES';
        $swAbierta            = '';
        $swDistancia          = '';

        if ($_POST["reporte_5Anios"] == 1) {
            #obener matriculados de 1er ingreso en 10 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM_5anios($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }
        else {
            #obener matriculados de 1er ingreso en 12 semestres previos a titulacion    o egreso
            $myMatricula -> reporte_TNM($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }
        $swPrintHeadings    = 1;


        # MAESTRIA EN INGENIERIA INDUSTRIAL
        #contadores
        $hom_tit_5anios        = 0;
        $muj_tit_5anios        = 0;
        $gran_tit_5anios       = 0;
        $hom_matricula         = 0;
        $muj_matricula         = 0;
        $gran_matricula        = 0;
        $hom_tit_6anios        = 0;
        $muj_tit_6anios        = 0;
        $gran_tit_6anios       = 0;

        $carrera                = 'MAEST EN ING. INDUSTRIAL';
        $swAbierta              = '';
        $swDistancia            = '';

        if ($_POST["reporte_5Anios"] == 1) {
            #obener matriculados de 1er ingreso en 10 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM_5anios($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }
        else {
            #obener matriculados de 1er ingreso en 12 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }


        # MAESRIA EN CIENCIAS DE LA ADMINISTRACION
        #contadores
        $hom_tit_5anios        = 0;
        $muj_tit_5anios        = 0;
        $gran_tit_5anios       = 0;
        $hom_matricula         = 0;
        $muj_matricula         = 0;
        $gran_matricula        = 0;
        $hom_tit_6anios        = 0;
        $muj_tit_6anios        = 0;
        $gran_tit_6anios       = 0;

        $carrera                = 'MC en ADMINISTRACION';
        $swAbierta              = '';
        $swDistancia            = '';

        if ($_POST["reporte_5Anios"] == 1) {
            #obener matriculados de 1er ingreso en 10 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM_5anios($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }
        else {
            #obener matriculados de 1er ingreso en 12 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }


        # ESPECIALIDAD EN INGENIERIA AMBIENTAL
        #contadores
        $hom_tit_5anios        = 0;
        $muj_tit_5anios        = 0;
        $gran_tit_5anios       = 0;
        $hom_matricula         = 0;
        $muj_matricula         = 0;
        $gran_matricula        = 0;
        $hom_tit_6anios        = 0;
        $muj_tit_6anios        = 0;
        $gran_tit_6anios       = 0;

        $carrera                = 'ESP EN ING. AMBIENTAL';
        $swAbierta              = '';
        $swDistancia            = '';

        if ($_POST["reporte_5Anios"] == 1) {
            #obener matriculados de 1er ingreso en 10 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM_5anios($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }
        else {
            #obener matriculados de 1er ingreso en 12 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }


        # DOCTORADO EN CIENCIAS DE LA INGENIERIA
        #contadores
        $hom_tit_5anios        = 0;
        $muj_tit_5anios        = 0;
        $gran_tit_5anios       = 0;
        $hom_matricula         = 0;
        $muj_matricula         = 0;
        $gran_matricula        = 0;
        $hom_tit_6anios        = 0;
        $muj_tit_6anios        = 0;
        $gran_tit_6anios       = 0;

        $carrera                = 'DOC EN C. DE LA INGENIERIA';
        $swAbierta              = '';
        $swDistancia            = '';

        if ($_POST["reporte_5Anios"] == 1) {
            #obener matriculados de 1er ingreso en 10 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM_5anios($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }
        else {
            #obener matriculados de 1er ingreso en 12 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }


        # DOC EN CIENCIAS EN MATERIALES
        #contadores
        $hom_tit_5anios        = 0;
        $muj_tit_5anios        = 0;
        $gran_tit_5anios       = 0;
        $hom_matricula         = 0;
        $muj_matricula         = 0;
        $gran_matricula        = 0;
        $hom_tit_6anios        = 0;
        $muj_tit_6anios        = 0;
        $gran_tit_6anios       = 0;

        $carrera                = 'DOC EN C. EN MATERIALES';
        $swAbierta              = '';
        $swDistancia            = '';

        if ($_POST["reporte_5Anios"] == 1) {
            #obener matriculados de 1er ingreso en 10 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM_5anios($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }
        else {
            #obener matriculados de 1er ingreso en 12 semestres previos a titulacion o egreso
            $myMatricula -> reporte_TNM($carrera, $swAbierta,  $swDistancia, $BDSeleccionada, $tabla_TitEgr, $tabla_Mat, $fecha_TNM2, $db, $host, $user, $pwd, $swPrintHeadings);
        }


        # imprimir totales y cerrar tabla del reporte
    
        print <<<EOF

        <tr>
            <th id="subEncabezado">Totales         </th>
EOF;
            if ($_POST["reporte_5Anios"] != 1)
            {
                print <<<EOF
                <th id="TotalesChico">$gral_mat        </th>
                <th id="TotalesChico">$gral_5anios     </th>
                <th id="TotalesChico">
EOF;
                    echo number_format((($gral_5anios/$gral_mat) * 100), 2);
                print <<<EOF
                </th>
EOF;
            }
            print <<<EOF
            <th id="TotalesChico">$gral_mat       </th>
            <th id="TotalesChico">$gral_6anios    </th>
            <th id="TotalesChico">
EOF;
                echo number_format((($gral_6anios/$gral_mat) * 100), 2);
                print <<<EOF
            </th> 

        </tr>
EOF;

        # Termina Tabla de Licenciaturas
        print <<<EOF
    </table>
EOF;
    } // fin reporte de posgrado
 
    # cerrar conexion a BD
    $db->close();

?>