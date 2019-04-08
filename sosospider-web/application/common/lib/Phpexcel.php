<?php 
	namespace app\common\lib;

	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
/**
 * phpexcel 类
 */
class Phpexcel{
	protected $spreadsheet='';
	protected $sheet='';

	public function __construct(){
		$this->spreadsheet = new Spreadsheet();
        $this->sheet = $this->spreadsheet->getActiveSheet();
	}
	/**
	 * 导出excel
	 * @param  [string] $filename [文件名]
	 * @param  [array] $rowname  [列名称]
	 * @param  [array] $data     [数据]
	 * @param  [array] $time     [需要时间戳转时间的字段]
	 * @return [type]           [description]
	 */
	public function exportExcel($filename,$spanname,$data,$time=[]){
		if(empty($filename))return;
		if(!is_array($spanname))return '列名称必须为数组';
		if(!is_array($data))return '数据必须为数组';
		if(empty($data))return;

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');

		foreach ($spanname as $k => $v) {
			$span_ascii = ord('A');
			$span = chr($span_ascii+$k);
			$k += 1;
			$this->sheet->setCellValue($span.'1', $v);
		}
		foreach($data as $k => $value){
            
			$k+= 2;   //从第二行开始填充
			$span_num = 0;
            foreach ($value as $key => $v) {
            	$span_ascii = ord('A');
				$span = chr($span_ascii+$span_num);
				//如果是时间戳转时间
				if(!empty($time)&&in_array($key, $time)){
            		$this->sheet->setCellValue($span.$k,date('Y-m-d',$v));
				}else{
            		$this->sheet->setCellValue($span.$k,$v);
				}
            	$span_num++;
            }
        }
        
        $writer = new Xlsx($this->spreadsheet);
        $writer->save('php://output');
	}


}