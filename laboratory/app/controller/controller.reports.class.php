
<?php

/**
 * 
 */
class report
{
    
    function excelProductos($data){
    $title="Reporte de Ventas por Producto";
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->getProperties()
    ->setCreator("Owl Desarrollos")
    ->setLastModifiedBy("Owl Desarrollos")
    ->setTitle("Reporte de turnos Generados")
    ->setSubject("Reporte General"); 
                            
            // Se agregan los titulos del reporte
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1',  "Producto")
                    ->setCellValue('B1',  "Monto Vendido")
                    ->setCellValue('C1',  "Cantidad");


                            //Se agregan los datos de los alumnos
        $i = 2;

        for ($j=0; $j <count($data) ; $j++) { 
             $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i, $data[$j]["clave_articulo"])
                    ->setCellValue('B'.$i, "$ ".$data[$j]["total"])
                    ->setCellValue('C'.$i, $data[$j]["cantidad"]);
                    $i++;
        }
           
        $estiloTituloColumnas = array(
        'font' => array(
            'name'      => 'Calibri',
            'bold'      => true,                          
            'color'     => array(
                'rgb' => '000000'
            )
        ),
   
        'alignment' =>  array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrap'          => TRUE
        ));

        $objPHPExcel->getActiveSheet()->getStyle('A1:C1')->applyFromArray($estiloTituloColumnas);
        //$objPHPExcel->getActiveSheet()->setAutoFilter("A1:F1");

        for($col = 'A'; $col !== 'C'; $col++) {
            $objPHPExcel->getActiveSheet()
                ->getColumnDimension($col)
                ->setAutoSize(true);
        }

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Reporte de Ventas por Producto.xlsx"');
        header('Cache-Control: max-age=0');
        ob_clean();
        $objWriter->save("php://output");
        exit;
    }


    function excelVentas($data){
    $title="Reporte de Ventas a  Detalle";
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->getProperties()
    ->setCreator("Owl Desarrollos")
    ->setLastModifiedBy("Owl Desarrollos")
    ->setTitle("Reporte de turnos Generados")
    ->setSubject("Reporte General"); 
                            
            // Se agregan los titulos del reporte
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1',  "Folio")
                    ->setCellValue('B1',  "Fecha de Compra")
                    ->setCellValue('C1',  "Forma de Pago")
                    ->setCellValue('D1',  "Clave de Producto")
                    ->setCellValue('E1',  "Descripción")
                    ->setCellValue('F1',  "Cantidad")
                    ->setCellValue('G1',  "Seleccion")
                    ->setCellValue('H1',  "Fecha de Dispensado")
                    ->setCellValue('I1',  "Timeout")
                    ->setCellValue('J1',  "Ingresado")
                    ->setCellValue('K1',  "Cambio")
                    ->setCellValue('L1',  "Total");


                            //Se agregan los datos de los alumnos
        $i = 2;

        for ($j=0; $j <count($data) ; $j++) { 
             $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$i, $data[$j]["id_movimiento"])
                    ->setCellValue('B'.$i, $data[$j]["fecha_creacion"])
                    ->setCellValue('C'.$i, $data[$j]["tipo_movimiento"])
                    ->setCellValue('D'.$i, $data[$j]["cve_producto"])
                    ->setCellValue('E'.$i, $data[$j]["descripcion"])
                    ->setCellValue('F'.$i, $data[$j]["cantidad"])
                    ->setCellValue('G'.$i, $data[$j]["seleccion"])
                    ->setCellValue('H'.$i, $data[$j]["fecha_dispensado"])
                    ->setCellValue('I'.$i, $data[$j]["timeout"])
                    ->setCellValue('J'.$i, $data[$j]["ingresado"])
                    ->setCellValue('K'.$i, $data[$j]["cambio"])
                    ->setCellValue('L'.$i, $data[$j]["total"]);
                    $i++;
        }
           
        $estiloTituloColumnas = array(
        'font' => array(
            'name'      => 'Calibri',
            'bold'      => true,                          
            'color'     => array(
                'rgb' => '000000'
            )
        ),
   
        'alignment' =>  array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                'wrap'          => TRUE
        ));

        $objPHPExcel->getActiveSheet()->getStyle('A1:L1')->applyFromArray($estiloTituloColumnas);
        //$objPHPExcel->getActiveSheet()->setAutoFilter("A1:F1");

        for($col = 'A'; $col !== 'L'; $col++) {
            $objPHPExcel->getActiveSheet()
                ->getColumnDimension($col)
                ->setAutoSize(true);
        }

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Reporte de Ventas a Detalle.xlsx"');
        header('Cache-Control: max-age=0');
        ob_clean();
        $objWriter->save("php://output");
        exit;
    }
}
?>