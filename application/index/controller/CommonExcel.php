<?php
namespace  app\index\controller;

require_once ROOT_PATH.'extend'.DS.'PHPExcel'.DS.'PHPExcel.php';


class CommonExcel{

    static function importExecl($file='',$exts='xlsx', $sheet=0){

        if ($exts == 'xls') {
            import("Org.Util.PHPExcel.Reader.Excel5");
            $PHPReader = new \PHPExcel_Reader_Excel5();
        } else if ($exts == 'xlsx') {
            import("Org.Util.PHPExcel.Reader.Excel2007");
            $PHPReader = new \PHPExcel_Reader_Excel2007();
        }


        //载入文件
        $PHPExcel = $PHPReader->load($file);
        //获取表中的第一个工作表，如果要获取第二个，把0改为1，依次类推
        $currentSheet = $PHPExcel->getSheet($sheet);
        //获取总列数
        $allColumn = $currentSheet->getHighestColumn();
        //获取总行数
        $allRow = $currentSheet->getHighestRow();
        //循环获取表中的数据，$currentRow表示当前行，从哪行开始读取数据，索引值从0开始
        for ($currentRow = 1; $currentRow <= $allRow; $currentRow++) {
            //从哪列开始，A表示第一列
            for ($currentColumn = 'A'; $currentColumn <= $allColumn; $currentColumn++) {
                //数据坐标
                $address = $currentColumn . $currentRow;
                $value =trim($currentSheet->getCell($address)->getValue()) ;
                //读取到的数据，保存到数组$arr中
                $data[$currentRow][$currentColumn] = $value;
            }
        }
        @unlink ( $file ); //删除上传的文件
        return $data;
    }


    static function exportExcel($data){

        $objPHPExcel = new \PHPExcel();
        $objSheet = $objPHPExcel->getActiveSheet();//获得当前活动sheet操作对象
        $objSheet->setTitle('通讯录');//给当前活动sheet修改名称

        $objSheet->getDefaultStyle()->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER)->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);//设置单元格垂直居中、水平居中
        $objSheet->getStyle("A1:H1")->getFont()->setName("微软雅黑")->setSize(10)->setBold(true);//设置单元格范围的字体、字体大小、加粗
       // $objSheet->getStyle("A1:Z1")->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('#00FF00');//给单元格填充背景颜色
        //添加边框
        $styleArray = array(
            'borders' => array(
                'outline' => array(
                    'style' => \PHPExcel_Style_Border::BORDER_THICK,
                    'color' => array('rgb' => '#000000'),
                ),
            ),
        );
        $objSheet->getStyle("A1")->applyFromArray($styleArray);
        $objSheet->getStyle("B1")->applyFromArray($styleArray);
        $objSheet->getStyle("C1")->applyFromArray($styleArray);
        $objSheet->getStyle("D1")->applyFromArray($styleArray);
        $objSheet->getStyle("E1")->applyFromArray($styleArray);
        $objSheet->getStyle("F1")->applyFromArray($styleArray);
        $objSheet->getStyle("G1")->applyFromArray($styleArray);
        $objSheet->getStyle("H1")->applyFromArray($styleArray);

        $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(31.5);
        $objPHPExcel->getActiveSheet()->getDefaultColumnDimension()->setWidth(30);


        $objSheet->setCellValue("A1","部门")
            ->setCellValue("B1","中文名")
            ->setCellValue("C1","英文名")
            ->setCellValue("D1","职位名称")
            ->setCellValue("E1","手机")
            ->setCellValue("F1","QQ")
            ->setCellValue("G1","微信")
            ->setCellValue("H1","邮箱");//给单元格填充相应的值

        //循环填充
        $j = 2;
        foreach($data as $key => $val){
            $forward = $j-1;
            //合并单元格
            if($forward-2>=0 && $data[$forward-2]['department_name'] == $data[$j-2]['department_name']){
                $col1 = "A".$forward;
                $col2 = "A".$j;
                $objPHPExcel->getActiveSheet()->mergeCells($col1.":".$col2);
            }
            else{
                $objSheet->setCellValue("A".$j,$val['department_name']);
            }
            $objSheet ->setCellValue("B".$j,$val['chinese_name'])
                ->setCellValue("C".$j,$val['english_name'])
                ->setCellValue("D".$j,$val['post_name'])
                ->setCellValue("E".$j,$val['mobile'])
                ->setCellValue("F".$j,$val['qq'])
                ->setCellValue("G".$j,$val['wechat'])
                ->setCellValue("H".$j,$val['email']);
            $objPHPExcel->getActiveSheet()->getRowDimension($j)->setRowHeight(25);
            $objSheet->getStyle("A".$j)->applyFromArray($styleArray);
            $objSheet->getStyle("B".$j)->applyFromArray($styleArray);
            $objSheet->getStyle("C".$j)->applyFromArray($styleArray);
            $objSheet->getStyle("D".$j)->applyFromArray($styleArray);
            $objSheet->getStyle("E".$j)->applyFromArray($styleArray);
            $objSheet->getStyle("F".$j)->applyFromArray($styleArray);
            $objSheet->getStyle("G".$j)->applyFromArray($styleArray);
            $objSheet->getStyle("H".$j)->applyFromArray($styleArray);


            $j++;

        }

        //设置文件保存的命名、编码、以及开放保存路径权限
        $fn= "通讯录".date('YmdHis').".xls";
        header('Content-Type: application/vnd.ms-excel; charset=utf-8');
        header("Content-Disposition: attachment;filename=$fn");//告诉浏览器将要输出的名称
        header('Cache-Control: max-age=0');//禁止缓存
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');//生成excel文件
        $objWriter->save('php://output');//彻底开放保存路径



    }





















}