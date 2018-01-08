<?php
/**
     * 获取当前页面完整URL地址
     */





function site_val_1($val){
    $strlen=strlen($val);
        if($strlen<6||$strlen>10){
            return false;
        }
    $test=utf8_str($val);
    if($test==2||$test==3){
        return false;
    }else{
        return true;
    }
}

    function get_url() {
        $sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
        $php_self = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
        $path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
        $relate_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $php_self.(isset($_SERVER['QUERY_STRING']) ? '?'.$_SERVER['QUERY_STRING'] : $path_info);
        return $sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '').$relate_url;
    }
    //判断是英文还是汉字或汉英混合
    function utf8_str($str){
        $mb = mb_strlen($str,'utf-8');
        $st = strlen($str);
        if($st==$mb){
//            return '纯英文';
            return 1;
        }
        if($st%$mb==0 && $st%3==0){
//            return '纯汉字';
            return 2;
        }else{
//            return '汉英混合';
            return 3;
        }
    }


//导出excel文件的函数
function PHPExcel($title,$field,$data){
    //通过vender方法加载第三方类库的文件
    vendor('PHPExcel.PHPExcel'); 
    vendor('PHPExcel.PHPExcel.Writer.Excel5'); 
    
    //创建一个excel  
    $objPHPExcel = new PHPExcel();  
    $activeSheet = $objPHPExcel->getActiveSheet();
    //输出字段
    foreach($field as $k=>$v){
        //$activeSheet->getColumnDimension($k)->setAutoSize(true);
        $activeSheet->getColumnDimension($k)->setWidth($v[1]);//宽度
        $activeSheet->getStyle($k.'1')->getFont()->setBold(true);  // 加粗
        $activeSheet->setCellValue($k.'1',$v[0]);
    }
    
    $i=2;
    foreach($data as $ob){
        foreach($ob as $k=>$v){
            $activeSheet->setCellValue($k.$i,$v);
        }
        $i++;
    }
    
    //直接输出到浏览器  
    $objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);  
    header("Pragma:public");
    header("Expires:0");
    header("Cache-Control:must-revalidate,post-check=0,pre-check=0");
    header("Content-Type:application/force-download");  
    header("Content-Type:application/vnd.ms-execl");  
    header("Content-Type:application/octet-stream");  
    header("Content-Type:application/download");  
    header("Content-Disposition:attachment;filename={$title}.xls");  
    header("Content-Transfer-Encoding:binary");  
    $objWriter->save("php://output");
    exit(); 
}