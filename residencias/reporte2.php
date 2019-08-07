<?php
    include ("clases.inc");
    include ("mysql_conection.inc");
    
    $plaza;
    $sexo;

    # Tabla del Reporte
    print <<<EOF
    <table width = 840>
EOF;

    $myResidencia = new residencia;

    # Establacer conexion
    $db = new mysqli($host, $user, $pwd, $base_datos);

    # Consulta de residencias de ing. electrica

    $swPrintHeadings = 0;
    //$rubro = "Ing. Eléctrica";
    //$consulta = "select * from residencias where carrera = 'ing. electrica'";
    //$myResidencia -> reporteResidencias1($swPrintHeadings, $consulta, $rubro, $myResidencia, $db, $host, $user, $pwd);

    $myResidencia -> reporteResidencias1($swPrintHeadings, $myResidencia, $BDSeleccionada, $db, $host, $user, $pwd, $base_datos);


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

    # Termina Tabla Plantilla Estatal

    
print <<<EOF
    </table>
EOF;



    # cerrar conexion a BD
    $db->close();
?>