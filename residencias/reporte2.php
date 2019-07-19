<?php
    include ("clases.inc");
    include ("mysql_conection.inc");
    
    $plaza;
    $sexo;

    # Tabla del Reporte
    print <<<EOF
    <table border = 1>
EOF;

    $myResidencia = new residencia;

    # Establacer conexion
    $db = new mysqli($host, $user, $pwd, $_GET["nombreBD"]);

    # Consulta de residencias de ing. electrica

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

    $swPrintHeadings = 0;
    $rubro = "Ing. Eléctrica";
    $consulta = "select * from residencias where carrera = 'ing. electrica'";
    $myResidencia -> reporteResidencias1($swPrintHeadings, $consulta, $rubro, $myResidencia, $db, $host, $user, $pwd);


    # Consulta de residencias de ing. electronica

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

    $swPrintHeadings = 1;
    $rubro = "Ing. Electrónica";
    $consulta = "select * from residencias where carrera = 'ing. electronica'";
    $myResidencia -> reporteResidencias1($swPrintHeadings, $consulta, $rubro, $myResidencia, $db, $host, $user, $pwd);

    # Consulta de residencias de ing. industrial

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

    $swPrintHeadings = 1;
    $rubro = "Ing. Industrial";
    $consulta = "select * from residencias where carrera = 'ing. industrial'";
    $myResidencia -> reporteResidencias1($swPrintHeadings, $consulta, $rubro, $myResidencia, $db, $host, $user, $pwd);

    # Consulta de residencias de ing. Materiales

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

    $swPrintHeadings = 1;
    $rubro = "Ing. Materiales";
    $consulta = "select * from residencias where carrera = 'ing. materiales'";
    $myResidencia -> reporteResidencias1($swPrintHeadings, $consulta, $rubro, $myResidencia, $db, $host, $user, $pwd);


    # ---------------------------------------------
    # Consulta de residencias de ing. Mecanica
    # ---------------------------------------------

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

    $swPrintHeadings = 1;
    $rubro = "Ing. Mecánica";
    $consulta = "select * from residencias where carrera = 'ing. mecanica'";
    $myResidencia -> reporteResidencias1($swPrintHeadings, $consulta, $rubro, $myResidencia, $db, $host, $user, $pwd);

    # Consulta de residencias de ing. industrial vespertino

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

    $swPrintHeadings = 1;
    $rubro = "Industrial Vesp.";
    $consulta = $query = "select * from residencias where carrera = 'ing. industrial v.'";
    $myResidencia -> reporteResidencias1($swPrintHeadings, $consulta, $rubro, $myResidencia, $db, $host, $user, $pwd);


    # Consulta de residencias de ing. industrial a distancia

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

    $swPrintHeadings = 1;
    $rubro = "Industrial Dist.";
    $consulta = "select * from residencias where carrera = 'ing. industrial d.'";
    $myResidencia -> reporteResidencias1($swPrintHeadings, $consulta, $rubro, $myResidencia, $db, $host, $user, $pwd);

    # Consulta de residencias de ing. mecatronica

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

    $swPrintHeadings = 1;
    $rubro = "Ing. Mecatrónica";
    $consulta = "select * from residencias where carrera = 'ing. mecatronica'";
    $myResidencia -> reporteResidencias1($swPrintHeadings, $consulta, $rubro, $myResidencia, $db, $host, $user, $pwd);


    # Consulta de residencias de ing. gestion empresarial

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

    $swPrintHeadings = 1;
    $rubro = "IGE";
    $consulta = "select * from residencias where carrera = 'ing. gestion empresarial'";
    $myResidencia -> reporteResidencias1($swPrintHeadings, $consulta, $rubro, $myResidencia, $db, $host, $user, $pwd);

    # Consulta de residencias de ing. gestion empresarial

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

    $swPrintHeadings = 1;
    $rubro = "Lic. Admon.";
    $consulta = "select * from residencias where carrera = 'lic. administracion'";
    $myResidencia -> reporteResidencias1($swPrintHeadings, $consulta, $rubro, $myResidencia, $db, $host, $user, $pwd);

    # Consulta de residencias de ing. sistemas computacionales

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

    $swPrintHeadings = 1;
    $rubro = "Sist. Comp.";
    $consulta = "select * from residencias where carrera = 'ing. sistemas computacionales'";
    $myResidencia -> reporteResidencias1($swPrintHeadings, $consulta, $rubro, $myResidencia, $db, $host, $user, $pwd);


    # Consulta de residencias de ing. sistemas computacionales

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

    $swPrintHeadings = 1;
    $rubro = "Ing. Informática";
    $consulta = "select * from residencias where carrera = 'ing. informatica'";
    $myResidencia -> reporteResidencias1($swPrintHeadings, $consulta, $rubro, $myResidencia, $db, $host, $user, $pwd);

       
    # imprimir totales y cerrar tabla del reporte

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

    print <<<EOF

    <tr>
        <th align = "left">Totales                     </th>
        <th align = "left">$totalGrande_Priv_Hombre    </th>
        <th align = "left">$totalGrande_Priv_Mujer     </th>
        <th align = "left">$totalGrande_Pub_Hombre     </th>
        <th align = "left">$totalGrande_Pub_Mujer      </th>
        <th align = "left">$totalGrande_EduPub_Hombre  </th>
        <th align = "left">$totalGrande_EduPub_Mujer   </th>
        <th align = "left">$totalGrande_EduPriv_Hombre </th>
        <th align = "left">$totalGrande_EduPriv_Mujer  </th>
        <th align = "left">$totalMediana_Priv_Hombre   </th>
        <th align = "left">$totalMediana_Priv_Mujer    </th>
        <th align = "left">$totalMediana_Pub_Hombre    </th>
        <th align = "left">$totalMediana_Pub_Mujer     </th>
        <th align = "left">$totalMediana_EduPub_Hombre </th>
        <th align = "left">$totalMediana_EduPub_Mujer  </th>
        <th align = "left">$totalMediana_EduPriv_Hombre</th>
        <th align = "left">$totalMediana_EduPriv_Mujer </th>
        <th align = "left">$totalPequena_Priv_Hombre   </th>
        <th align = "left">$totalPequena_Priv_Mujer    </th>
        <th align = "left">$totalPequena_Pub_Hombre    </th>
        <th align = "left">$totalPequena_Pub_Mujer     </th>
        <th align = "left">$totalPequena_EduPub_Hombre </th>
        <th align = "left">$totalPequena_EduPub_Mujer  </th>
        <th align = "left">$totalPequena_EduPriv_Hombre</th>
        <th align = "left">$totalPequena_EduPriv_Mujer </th>
        <th align = "left">$totalMicro_Priv_Hombre     </th>
        <th align = "left">$totalMicro_Priv_Mujer      </th>
        <th align = "left">$totalMicro_Pub_Hombre      </th>
        <th align = "left">$totalMicro_Pub_Mujer       </th>
        <th align = "left">$totalMicro_EduPub_Hombre   </th>
        <th align = "left">$totalMicro_EduPub_Mujer    </th>
        <th align = "left">$totalMicro_EduPriv_Hombre  </th>
        <th align = "left">$totalMicro_EduPriv_Mujer   </th>
        
        <th align = "left">$totalHombreGral            </th>
        <th align = "left">$totalMujerGral             </th>
        <th align = "left">$totalGral                  </th>
    </tr>


EOF;

    # Termina Tabla Plantilla Estatal

    
print <<<EOF
    </table>
EOF;



    # cerrar conexion a BD
    $db->close();
?>