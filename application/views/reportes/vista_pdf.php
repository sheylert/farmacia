<!DOCTYPE html>
<html lang="en">  
<head>
  <link rel="stylesheet" href="<?php echo base_url();?>assets_sistema/css/bootstrap.min.css">
  <link href="<?php echo base_url()?>assets_sistema/css/ace.min.css" rel="stylesheet" type="text/css">

  <style>

         html {
          margin: 0;
        }
        body {
          font-family: "Arial", serif;
          margin: 20mm 8mm 15mm 8mm;
          background-color: white;
        }

        table {     font-family: "Arial", "Lucida Grande", Sans-Serif;
            font-size: 12px;    margin: 45px;     width: 100%; text-align: center;    border-collapse: collapse; }

        th {     font-size: 13px;     font-weight: bold;     padding: 8px;
            border-top: 4px solid #aabcfe;    border-bottom: 1px solid black; }

        td {    padding: 8px; border-bottom: 1px solid black;
                border-top: 1px solid transparent; }

  </style>
</head>
<title>Censo Reporte pdf</title>
<body>
    
    <div class="text-center">
        <img src="<?php echo base_url()?>assets_sistema/images/gallery/complementos_login/logo.jpg" alt="" width="50" height="50">
       Entregas de Medicamentos
    </div>
    <table class="">
        <thead>
            <tr class="">
                <th class="text-center text-primary" width="11.1%">#</th>
                <th class="text-center text-primary" width="11.1%">N° Entrega</th>
                <th class="text-center text-primary" width="11.1%">Fecha Entrega</th>
                <th class="text-center text-primary" width="11.1%">Cédula Titular</th>
                <th class="text-center text-primary" width="11.1%">Nombre Titular</th>
                <th class="text-center text-primary" width="11.1%">Cédula Beneficiario</th>
                <th class="text-center text-primary" width="11.1%">Nombre Beneficiario</th>                     
                <th class="text-center text-primary" width="11.1%">Producto</th>
                <th class="text-center text-primary" width="11.1%">Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <?
                $con = 1;

                foreach ($data as $row) 
                {
                   $fecha1 =  date('d/m/Y', strtotime($row->fecha)); 
                   

                   /* $embarazada = '';
                    
                    $verificado = $row->verificado === 't' ? 'Si' : 'No';

                    $genero = $row->genero === '1' ? 'Masculino' : 'Femenino';

                    if($genero === 'Femenino')
                    {
                        $embarazada = $row->embarazada === 'f' ? 'No' : 'Si';
                    }

                    $pensionado = '';

                    if(!empty($row->pensionado))
                    {
                        $pensionado = '<span class="label label-sm label-pink arrowed arrowed-right">
                                            Pension: '.$row->pensionado.'
                                        </span>';
                    }

                    */

                    echo    "<tr>
                                     <td class='text-center'>{$con}</td>
                                     <td class='text-center'>{$row->id}</td>
                                     <td class='text-center'>{$fecha1}</td>
                                      <td class='text-center'>{$row->cedulatitular}</td>
                                    <td class='text-center'>{$row->nombretitular} {$row->apellidotitular}</td>
                                    <td class='text-center'>{$row->cedulabene}</span></td>
                                    <td class='text-center'>{$row->nombrebene} {$row->apellidobene}</td>
                                    <td class='text-center'>{$row->producto}</td>
                                    <td class='text-center'>{$row->cantidad}</td>
                                </tr>";
                    $con++;
                }
            ?>
 
        </tbody>
    </table>
</body>
</html>