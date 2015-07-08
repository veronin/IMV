<?php
$pdf = Yii::createComponent('application.extensions.mpdf60.mpdf');
$dataProvider = $_SESSION['datos_filtrados']->getData();
$contador=count($dataProvider);
    $html.=' <link rel="stylesheet" type="text/css" href="'.Yii::app()->request->baseUrl.'/css/pdf.css" />

    <table align="center"><tr>
    <td align="center"><b>LISTADO DE PAGOS</b></td>
    </tr>
    <tr>Recibos emitidos: '.$contador.' </tr>
    </table>
    * Los recibos mostrados con ROJO se encuentran impagos a la fecha.</td>
    
    
        <table cellpadding="1" cellspacing="1" width="100%" border="0">
            <tr >
                <td class="tit" >Nro.Recibo</td>
                <td class="tit" >Cuenta</td>
                <td class="tit" >Fecha Emision</td>
                <td class="tit" >Apellido</td>
            </tr>';
         $i=0;
        

         while($i<$contador){
$html.='    
            <tr class="">';
            $clase='nodeudor';
            if ($dataProvider[$i]["importePendiente"]!== 0){
                $clase='deudor';
            }
            $html.=' 
                <td class='.$clase.'>&nbsp;'.$dataProvider[$i]["idRecibo"].'</td>
                <td class='.$clase.'>&nbsp;'.$dataProvider[$i]["idCuenta"].'</td>
                <td class='.$clase.'>&nbsp;'.$dataProvider[$i]["fechaEmision"].'</td>
                <td class='.$clase.'>&nbsp;'.$dataProvider[$i]["idCuenta0"]["idCliente0"]["nombreCompleto"].'</td>
        
            ';
    $html.='</tr>'; $i++;
                        }
    $html.='</table>';
$mpdf=new mPDF('win-1252','LETTER-L','','',9,9,24,10,5,5);
$mpdf->WriteHTML($html);
$mpdf->Output('ReportePagos.pdf','D');
exit;
?>