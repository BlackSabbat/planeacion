<?php
    include ("clases.inc");
    include ("mysql_conection.inc");

    $plaza;
    $sexo;

    $swPrintHeadings = 0;

    # Tabla del Reporte
    print <<<EOF
    <table id=federal width = 100%>
EOF;

    $myResidencia = new residencia;

    # Establacer conexion
    $db = new mysqli($host, $user, $pwd, $_GET["nombreBD"]);

    # Consulta por carrera
    $query = "select * from residencias where carrera = 'ing. electrica'";
    $result = $db->query($query);

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

    $rubro = "Ing. Eléctrica";

    # Armar el reporte
    while( $row = $result->fetch_assoc()) {
        //echo "Num Control: $row[num_control] nombre: $row[nombre] sexo: $row[sexo] </br>";
        $empresa = trim($row['empresa']);
        $sexo = $row['sexo'];
        
        #Obtener Empresa, Tipo y Sector
        if ($empresa != '')
        {
            $db2 = new mysqli($host, $user, $pwd, "base_datos_comun");
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
        
                $myResidencia -> armarReporte($tipo, $sector, $sexo);
        
            }
        }
        else
        {
            echo ("registro con Num Control: $row[num_control] con empresa NULL</br>"); 
        }
    }

    $myResidencia -> imprimirReporte1($rubro, $contGrande_Priv_Hombre, $contGrande_Priv_Mujer, $contGrande_Pub_Hombre, $contGrande_Pub_Mujer, $contGrande_EduPub_Hombre, $contGrande_EduPub_Mujer, $contGrande_EduPriv_Hombre, $contGrande_EduPriv_Mujer,$contMediana_Priv_Hombre, $contMediana_Priv_Mujer, $contMediana_Pub_Hombre, $contMediana_Pub_Mujer, $contMediana_EduPub_Hombre, $contMediana_EduPub_Mujer, $contMediana_EduPriv_Hombre, $contMediana_EduPriv_Mujer,$contPequena_Priv_Hombre, $contPequena_Priv_Mujer, $contPequena_Pub_Hombre, $contPequena_Pub_Mujer, $contPequena_EduPub_Hombre, $contPequena_EduPub_Mujer, $contPequena_EduPriv_Hombre, $contPequena_EduPriv_Mujer,$swPrintHeadings);

    $swPrintHeadings = 1;
    
    
    # Consulta por carrera
    $query = "select * from residencias where carrera = 'ing. electronica'";
    $result = $db->query($query);

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

    $rubro = "Ing. Electrónica";

    # Armar el reporte
    while( $row = $result->fetch_assoc()) {
        //echo "Num Control: $row[num_control] nombre: $row[nombre] sexo: $row[sexo] </br>";
        $empresa = trim($row['empresa']);
        $sexo = $row['sexo'];
        
        #Obtener Empresa, Tipo y Sector
        if ($empresa != '')
        {
            $db2 = new mysqli($host, $user, $pwd, "base_datos_comun");
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
        
                $myResidencia -> armarReporte($tipo, $sector, $sexo);
        
            }
        }
        else
        {
            echo ("registro con Num Control: $row[num_control] con empresa NULL</br>"); 
        }
    }

    $myResidencia -> imprimirReporte1($rubro, $contGrande_Priv_Hombre, $contGrande_Priv_Mujer, $contGrande_Pub_Hombre, $contGrande_Pub_Mujer, $contGrande_EduPub_Hombre, $contGrande_EduPub_Mujer, $contGrande_EduPriv_Hombre, $contGrande_EduPriv_Mujer,$contMediana_Priv_Hombre, $contMediana_Priv_Mujer, $contMediana_Pub_Hombre, $contMediana_Pub_Mujer, $contMediana_EduPub_Hombre, $contMediana_EduPub_Mujer, $contMediana_EduPriv_Hombre, $contMediana_EduPriv_Mujer,$contPequena_Priv_Hombre, $contPequena_Priv_Mujer, $contPequena_Pub_Hombre, $contPequena_Pub_Mujer, $contPequena_EduPub_Hombre, $contPequena_EduPub_Mujer, $contPequena_EduPriv_Hombre, $contPequena_EduPriv_Mujer,$swPrintHeadings);

    $swPrintHeadings = 1;



    # Consulta por carrera
    $query = "select * from residencias where carrera = 'ing. industrial'";
    $result = $db->query($query);

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

    $rubro = "Ing. Industrial";

    # Armar el reporte
    while( $row = $result->fetch_assoc()) {
        //echo "Num Control: $row[num_control] nombre: $row[nombre] sexo: $row[sexo] </br>";
        $empresa = trim($row['empresa']);
        $sexo = $row['sexo'];
        
        #Obtener Empresa, Tipo y Sector
        if ($empresa != '')
        {
            $db2 = new mysqli($host, $user, $pwd, "base_datos_comun");
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
        
                $myResidencia -> armarReporte($tipo, $sector, $sexo);
        
            }
        }
        else
        {
            echo ("registro con Num Control: $row[num_control] con empresa NULL</br>"); 
        }
    }

    $myResidencia -> imprimirReporte1($rubro, $contGrande_Priv_Hombre, $contGrande_Priv_Mujer, $contGrande_Pub_Hombre, $contGrande_Pub_Mujer, $contGrande_EduPub_Hombre, $contGrande_EduPub_Mujer, $contGrande_EduPriv_Hombre, $contGrande_EduPriv_Mujer,$contMediana_Priv_Hombre, $contMediana_Priv_Mujer, $contMediana_Pub_Hombre, $contMediana_Pub_Mujer, $contMediana_EduPub_Hombre, $contMediana_EduPub_Mujer, $contMediana_EduPriv_Hombre, $contMediana_EduPriv_Mujer,$contPequena_Priv_Hombre, $contPequena_Priv_Mujer, $contPequena_Pub_Hombre, $contPequena_Pub_Mujer, $contPequena_EduPub_Hombre, $contPequena_EduPub_Mujer, $contPequena_EduPriv_Hombre, $contPequena_EduPriv_Mujer,$swPrintHeadings);

    $swPrintHeadings = 1;
    
    
     # Consulta por carrera
    $query = "select * from residencias where carrera = 'ing. materiales'";
    $result = $db->query($query);

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

    $rubro = "Ing. Materiales";

    # Armar el reporte
    while( $row = $result->fetch_assoc()) {
        //echo "Num Control: $row[num_control] nombre: $row[nombre] sexo: $row[sexo] </br>";
        $empresa = trim($row['empresa']);
        $sexo = $row['sexo'];
        
        #Obtener Empresa, Tipo y Sector
        if ($empresa != '')
        {
            $db2 = new mysqli($host, $user, $pwd, "base_datos_comun");
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
        
                $myResidencia -> armarReporte($tipo, $sector, $sexo);
        
            }
        }
        else
        {
            echo ("registro con Num Control: $row[num_control] con empresa NULL</br>"); 
        }
    }

    $myResidencia -> imprimirReporte1($rubro, $contGrande_Priv_Hombre, $contGrande_Priv_Mujer, $contGrande_Pub_Hombre, $contGrande_Pub_Mujer, $contGrande_EduPub_Hombre, $contGrande_EduPub_Mujer, $contGrande_EduPriv_Hombre, $contGrande_EduPriv_Mujer,$contMediana_Priv_Hombre, $contMediana_Priv_Mujer, $contMediana_Pub_Hombre, $contMediana_Pub_Mujer, $contMediana_EduPub_Hombre, $contMediana_EduPub_Mujer, $contMediana_EduPriv_Hombre, $contMediana_EduPriv_Mujer,$contPequena_Priv_Hombre, $contPequena_Priv_Mujer, $contPequena_Pub_Hombre, $contPequena_Pub_Mujer, $contPequena_EduPub_Hombre, $contPequena_EduPub_Mujer, $contPequena_EduPriv_Hombre, $contPequena_EduPriv_Mujer,$swPrintHeadings);

    $swPrintHeadings = 1;
    
    
    # Consulta por carrera
    $query = "select * from residencias where carrera = 'ing. mecanica'";
    $result = $db->query($query);

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

    $rubro = "Ing. Mecánica";

    # Armar el reporte
    while( $row = $result->fetch_assoc()) {
        //echo "Num Control: $row[num_control] nombre: $row[nombre] sexo: $row[sexo] </br>";
        $empresa = trim($row['empresa']);
        $sexo = $row['sexo'];
        
        #Obtener Empresa, Tipo y Sector
        if ($empresa != '')
        {
            $db2 = new mysqli($host, $user, $pwd, "base_datos_comun");
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
        
                $myResidencia -> armarReporte($tipo, $sector, $sexo);
        
            }
        }
        else
        {
            echo ("registro con Num Control: $row[num_control] con empresa NULL</br>"); 
        }
    }

    $myResidencia -> imprimirReporte1($rubro, $contGrande_Priv_Hombre, $contGrande_Priv_Mujer, $contGrande_Pub_Hombre, $contGrande_Pub_Mujer, $contGrande_EduPub_Hombre, $contGrande_EduPub_Mujer, $contGrande_EduPriv_Hombre, $contGrande_EduPriv_Mujer,$contMediana_Priv_Hombre, $contMediana_Priv_Mujer, $contMediana_Pub_Hombre, $contMediana_Pub_Mujer, $contMediana_EduPub_Hombre, $contMediana_EduPub_Mujer, $contMediana_EduPriv_Hombre, $contMediana_EduPriv_Mujer,$contPequena_Priv_Hombre, $contPequena_Priv_Mujer, $contPequena_Pub_Hombre, $contPequena_Pub_Mujer, $contPequena_EduPub_Hombre, $contPequena_EduPub_Mujer, $contPequena_EduPriv_Hombre, $contPequena_EduPriv_Mujer,$swPrintHeadings);

    $swPrintHeadings = 1;
    
    
     # Consulta por carrera
    $query = "select * from residencias where carrera = 'ing. mecatronica'";
    $result = $db->query($query);

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

    $rubro = "Ing. Mecatrónica";

    # Armar el reporte
    while( $row = $result->fetch_assoc()) {
        //echo "Num Control: $row[num_control] nombre: $row[nombre] sexo: $row[sexo] </br>";
        $empresa = trim($row['empresa']);
        $sexo = $row['sexo'];
        
        #Obtener Empresa, Tipo y Sector
        if ($empresa != '')
        {
            $db2 = new mysqli($host, $user, $pwd, "base_datos_comun");
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
        
                $myResidencia -> armarReporte($tipo, $sector, $sexo);
        
            }
        }
        else
        {
            echo ("registro con Num Control: $row[num_control] con empresa NULL</br>"); 
        }
    }

    $myResidencia -> imprimirReporte1($rubro, $contGrande_Priv_Hombre, $contGrande_Priv_Mujer, $contGrande_Pub_Hombre, $contGrande_Pub_Mujer, $contGrande_EduPub_Hombre, $contGrande_EduPub_Mujer, $contGrande_EduPriv_Hombre, $contGrande_EduPriv_Mujer,$contMediana_Priv_Hombre, $contMediana_Priv_Mujer, $contMediana_Pub_Hombre, $contMediana_Pub_Mujer, $contMediana_EduPub_Hombre, $contMediana_EduPub_Mujer, $contMediana_EduPriv_Hombre, $contMediana_EduPriv_Mujer,$contPequena_Priv_Hombre, $contPequena_Priv_Mujer, $contPequena_Pub_Hombre, $contPequena_Pub_Mujer, $contPequena_EduPub_Hombre, $contPequena_EduPub_Mujer, $contPequena_EduPriv_Hombre, $contPequena_EduPriv_Mujer,$swPrintHeadings);

    $swPrintHeadings = 1;
    
    # Consulta por carrera
    $query = "select * from residencias where carrera = 'ing. industrial v.'";
    $result = $db->query($query);

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

    $rubro = "Industrial Vesp.";

    # Armar el reporte
    while( $row = $result->fetch_assoc()) {
        //echo "Num Control: $row[num_control] nombre: $row[nombre] sexo: $row[sexo] </br>";
        $empresa = trim($row['empresa']);
        $sexo = $row['sexo'];
        
        #Obtener Empresa, Tipo y Sector
        if ($empresa != '')
        {
            $db2 = new mysqli($host, $user, $pwd, "base_datos_comun");
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
        
                $myResidencia -> armarReporte($tipo, $sector, $sexo);
        
            }
        }
        else
        {
            echo ("registro con Num Control: $row[num_control] con empresa NULL</br>"); 
        }
    }

    $myResidencia -> imprimirReporte1($rubro, $contGrande_Priv_Hombre, $contGrande_Priv_Mujer, $contGrande_Pub_Hombre, $contGrande_Pub_Mujer, $contGrande_EduPub_Hombre, $contGrande_EduPub_Mujer, $contGrande_EduPriv_Hombre, $contGrande_EduPriv_Mujer,$contMediana_Priv_Hombre, $contMediana_Priv_Mujer, $contMediana_Pub_Hombre, $contMediana_Pub_Mujer, $contMediana_EduPub_Hombre, $contMediana_EduPub_Mujer, $contMediana_EduPriv_Hombre, $contMediana_EduPriv_Mujer,$contPequena_Priv_Hombre, $contPequena_Priv_Mujer, $contPequena_Pub_Hombre, $contPequena_Pub_Mujer, $contPequena_EduPub_Hombre, $contPequena_EduPub_Mujer, $contPequena_EduPriv_Hombre, $contPequena_EduPriv_Mujer,$swPrintHeadings);

    $swPrintHeadings = 1;
    
    
    # Consulta por carrera
    $query = "select * from residencias where carrera = 'ing. industrial d.'";
    $result = $db->query($query);

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

    $rubro = "Industrial Dist.";

    # Armar el reporte
    while( $row = $result->fetch_assoc()) {
        //echo "Num Control: $row[num_control] nombre: $row[nombre] sexo: $row[sexo] </br>";
        $empresa = trim($row['empresa']);
        $sexo = $row['sexo'];
        
        #Obtener Empresa, Tipo y Sector
        $db2 = new mysqli($host, $user, $pwd, "base_datos_comun");
        $query2 = "select distinct nombre, tipo, sector from empresas where nombre = '$empresa'";
        $result2 = $db2->query($query2);
        if ($empresa != '')
        {
            $db2 = new mysqli($host, $user, $pwd, "base_datos_comun");
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
        
                $myResidencia -> armarReporte($tipo, $sector, $sexo);
        
            }
        }
        else
        {
            echo ("registro con Num Control: $row[num_control] con empresa NULL</br>"); 
        }
    }

    $myResidencia -> imprimirReporte1($rubro, $contGrande_Priv_Hombre, $contGrande_Priv_Mujer, $contGrande_Pub_Hombre, $contGrande_Pub_Mujer, $contGrande_EduPub_Hombre, $contGrande_EduPub_Mujer, $contGrande_EduPriv_Hombre, $contGrande_EduPriv_Mujer,$contMediana_Priv_Hombre, $contMediana_Priv_Mujer, $contMediana_Pub_Hombre, $contMediana_Pub_Mujer, $contMediana_EduPub_Hombre, $contMediana_EduPub_Mujer, $contMediana_EduPriv_Hombre, $contMediana_EduPriv_Mujer,$contPequena_Priv_Hombre, $contPequena_Priv_Mujer, $contPequena_Pub_Hombre, $contPequena_Pub_Mujer, $contPequena_EduPub_Hombre, $contPequena_EduPub_Mujer, $contPequena_EduPriv_Hombre, $contPequena_EduPriv_Mujer,$swPrintHeadings);

    $swPrintHeadings = 1;
    
    
    # Consulta por carrera
    $query = "select * from residencias where carrera = 'ing. gestion empresarial'";
    $result = $db->query($query);

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

    $rubro = "IGE";

    # Armar el reporte
    while( $row = $result->fetch_assoc()) {
        //echo "Num Control: $row[num_control] nombre: $row[nombre] sexo: $row[sexo] </br>";
        $empresa = trim($row['empresa']);
        $sexo = $row['sexo'];
        
        #Obtener Empresa, Tipo y Sector
        if ($empresa != '')
        {
            $db2 = new mysqli($host, $user, $pwd, "base_datos_comun");
            $query2 = "select distinct nombre, tipo, sector from empresas where nombre = '$empresa'";
            $result2 = $db2->query($query2);
            if ($result2->num_rows == 0)
            {
                echo ("NumControl: $row[num_control] $empresa no encontrada </br>");;
            }
            else
            {
                $row2 = $result2->fetch_assoc();
                $tipo = $row2['tipo'];
                $sector = $row2['sector'];
        
                $myResidencia -> armarReporte($tipo, $sector, $sexo);
        
            }
        }
        else
        {
            echo ("registro con Num Control: $row[num_control] con empresa NULL</br>"); 
        }
    }

    $myResidencia -> imprimirReporte1($rubro, $contGrande_Priv_Hombre, $contGrande_Priv_Mujer, $contGrande_Pub_Hombre, $contGrande_Pub_Mujer, $contGrande_EduPub_Hombre, $contGrande_EduPub_Mujer, $contGrande_EduPriv_Hombre, $contGrande_EduPriv_Mujer,$contMediana_Priv_Hombre, $contMediana_Priv_Mujer, $contMediana_Pub_Hombre, $contMediana_Pub_Mujer, $contMediana_EduPub_Hombre, $contMediana_EduPub_Mujer, $contMediana_EduPriv_Hombre, $contMediana_EduPriv_Mujer,$contPequena_Priv_Hombre, $contPequena_Priv_Mujer, $contPequena_Pub_Hombre, $contPequena_Pub_Mujer, $contPequena_EduPub_Hombre, $contPequena_EduPub_Mujer, $contPequena_EduPriv_Hombre, $contPequena_EduPriv_Mujer,$swPrintHeadings);

    $swPrintHeadings = 1;
    
    
    
    # Consulta por carrera
    $query = "select * from residencias where carrera = 'lic. administracion'";
    $result = $db->query($query);

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

    $rubro = "Lic. Admon.";

    # Armar el reporte
    while( $row = $result->fetch_assoc()) {
        //echo "Num Control: $row[num_control] nombre: $row[nombre] sexo: $row[sexo] </br>";
        $empresa = trim($row['empresa']);
        $sexo = $row['sexo'];
        
        #Obtener Empresa, Tipo y Sector
        if ($empresa != '')
        {
            $db2 = new mysqli($host, $user, $pwd, "base_datos_comun");
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
        
                $myResidencia -> armarReporte($tipo, $sector, $sexo);
        
            }
        }
        else
        {
            echo ("registro con Num Control: $row[num_control] con empresa NULL</br>"); 
        }
    }

    $myResidencia -> imprimirReporte1($rubro, $contGrande_Priv_Hombre, $contGrande_Priv_Mujer, $contGrande_Pub_Hombre, $contGrande_Pub_Mujer, $contGrande_EduPub_Hombre, $contGrande_EduPub_Mujer, $contGrande_EduPriv_Hombre, $contGrande_EduPriv_Mujer,$contMediana_Priv_Hombre, $contMediana_Priv_Mujer, $contMediana_Pub_Hombre, $contMediana_Pub_Mujer, $contMediana_EduPub_Hombre, $contMediana_EduPub_Mujer, $contMediana_EduPriv_Hombre, $contMediana_EduPriv_Mujer,$contPequena_Priv_Hombre, $contPequena_Priv_Mujer, $contPequena_Pub_Hombre, $contPequena_Pub_Mujer, $contPequena_EduPub_Hombre, $contPequena_EduPub_Mujer, $contPequena_EduPriv_Hombre, $contPequena_EduPriv_Mujer,$swPrintHeadings);
    
    $swPrintHeadings = 1;
    
    
    # Consulta por carrera
    $query = "select * from residencias where carrera = 'ing. sistemas computacionales'";
    $result = $db->query($query);

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

    $rubro = "Sist. Comp.";

    # Armar el reporte
    while( $row = $result->fetch_assoc()) {
        //echo "Num Control: $row[num_control] nombre: $row[nombre] sexo: $row[sexo] </br>";
        $empresa = trim($row['empresa']);
        $sexo = $row['sexo'];
        
        #Obtener Empresa, Tipo y Sector
        if ($empresa != '')
        {
            $db2 = new mysqli($host, $user, $pwd, "base_datos_comun");
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
            
                $myResidencia -> armarReporte($tipo, $sector, $sexo);
            }
        }
        else
        {
            echo ("registro con Num Control: $row[num_control] con empresa NULL</br>"); 
        }
    }

    $myResidencia -> imprimirReporte1($rubro, $contGrande_Priv_Hombre, $contGrande_Priv_Mujer, $contGrande_Pub_Hombre, $contGrande_Pub_Mujer, $contGrande_EduPub_Hombre, $contGrande_EduPub_Mujer, $contGrande_EduPriv_Hombre, $contGrande_EduPriv_Mujer,$contMediana_Priv_Hombre, $contMediana_Priv_Mujer, $contMediana_Pub_Hombre, $contMediana_Pub_Mujer, $contMediana_EduPub_Hombre, $contMediana_EduPub_Mujer, $contMediana_EduPriv_Hombre, $contMediana_EduPriv_Mujer,$contPequena_Priv_Hombre, $contPequena_Priv_Mujer, $contPequena_Pub_Hombre, $contPequena_Pub_Mujer, $contPequena_EduPub_Hombre, $contPequena_EduPub_Mujer, $contPequena_EduPriv_Hombre, $contPequena_EduPriv_Mujer,$swPrintHeadings);

    $swPrintHeadings = 1;
    
    
    # Consulta por carrera
    $query = "select * from residencias where carrera = 'ing. informatica'";
    $result = $db->query($query);

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

    $rubro = "Ing. Informática";

    # Armar el reporte
    while( $row = $result->fetch_assoc()) {
        //echo "Num Control: $row[num_control] nombre: $row[nombre] sexo: $row[sexo] </br>";
        $empresa = trim($row['empresa']);
        $sexo = $row['sexo'];
        
        #Obtener Empresa, Tipo y Sector
        if ($empresa != '')
        {
            $db2 = new mysqli($host, $user, $pwd, "base_datos_comun");
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
            
                $myResidencia -> armarReporte($tipo, $sector, $sexo);
            }
        }
        else
        {
            echo ("registro con Num Control: $row[num_control] con empresa NULL</br>"); 
        }
    }

    $myResidencia -> imprimirReporte1($rubro, $contGrande_Priv_Hombre, $contGrande_Priv_Mujer, $contGrande_Pub_Hombre, $contGrande_Pub_Mujer, $contGrande_EduPub_Hombre, $contGrande_EduPub_Mujer, $contGrande_EduPriv_Hombre, $contGrande_EduPriv_Mujer,$contMediana_Priv_Hombre, $contMediana_Priv_Mujer, $contMediana_Pub_Hombre, $contMediana_Pub_Mujer, $contMediana_EduPub_Hombre, $contMediana_EduPub_Mujer, $contMediana_EduPriv_Hombre, $contMediana_EduPriv_Mujer,$contPequena_Priv_Hombre, $contPequena_Priv_Mujer, $contPequena_Pub_Hombre, $contPequena_Pub_Mujer, $contPequena_EduPub_Hombre, $contPequena_EduPub_Mujer, $contPequena_EduPriv_Hombre, $contPequena_EduPriv_Mujer,$swPrintHeadings);

    $swPrintHeadings = 1;
    
    
    # imprimir totales y cerrar tabla del reporte

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