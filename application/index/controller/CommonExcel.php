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
                $value = $currentSheet->getCell($address)->getValue();
                //读取到的数据，保存到数组$arr中
                $data[$currentRow][$currentColumn] = $value;
            }
        }
        @unlink ( $file ); //删除上传的文件
        return $data;
    }
}