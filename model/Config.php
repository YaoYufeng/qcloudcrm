<?php 
use \Tuanduimao\Mem as Mem;
use \Tuanduimao\Excp as Excp;
use \Tuanduimao\Err as Err;
use \Tuanduimao\Conf as Conf;
use \Tuanduimao\Model as Model;
use \Tuanduimao\Utils as Utils;


class ConfigModel extends Model {

	/**
	 * 初始化
	 * @param array $param [description]
	 */
	function __construct( $param=[] ) {
		parent::__construct();
		$this->table('config');
	}



	/**
	 * 数据表结构
	 * @see 
	 * @return [type] [description]
	 */
	function __schema() {
			$this->putColumn( 'key', $this->type('string', ['length'=>200, 'unique'=>1]))
				 ->putColumn( 'value', $this->type('string', ['length'=>200,'json'=>true]))
				 ->putColumn( 'data', $this->type('text' , ['json'=>true]) )
			;
	}


	function default(){
		$data = [
			'wechat'=>[
				'appid'=>'wx2d42da8f00cda86f',
				'secret'=>'cc261606688e141f9b51404088700a53'
			],
			'youtu'=>[
				'appid'=>'1252079924',
				'bucket'=>'qcloudcrm',
				'SecretID'=>'AKIDLbdPd8V5GAPlvnDl1txDW6vE6pttpCBd',
				'SecretKey'=>'IGMl3igGoqiMbcSVKpYsrFKy4XUNtf6S'
			],
			'cos'=>[
				'appid'=>'1252758974',
				'bucket'=>'test',
				'SecretID'=>'AKIDxoTxGQLIwPhnka5EOOCoFVZS9j8NKbw5',
				'SecretKey'=>'5VfkeLuHSTh8XkmbEfu030lKhsreLxPg'
			],
			'marking'=>[
			 	"appId"=>"52930002", 
			 	"Region"=>"gz",
			 	'SecretID'=>'AKIDcEi3fI86MQNAlEHrxxpcFnHclIpD3fll',
			 	'SecretKey'=>'0zscSBoGdty5BARI7veyb4teEx3992oT'
			],
			'tracking'=>[
			 	"appId"=>"52940002", 
			 	"Region"=>"gz",
			 	'SecretID'=>'AKIDcEi3fI86MQNAlEHrxxpcFnHclIpD3fll',
			 	'SecretKey'=>'0zscSBoGdty5BARI7veyb4teEx3992oT'
			],
			'sms'=>[
				"AppID"=>"1400017564", 
			 	"AppKey"=>"2b9f1e3ef8e81ebb5cf4f2b9d1433fe0"
			],
			'email'=>[
				"mail"=>"maoshun@diancloud.com", 
			 	"host"=>"smtp.exmail.qq.com",
			 	"user"=>"maoshun@diancloud.com",
			 	"passwd"=>"Loveme110"
			]	
		];
		foreach ($data as $num => $mes){
			$mesdata = [
					'key'=>$num,
					'value'=>$mes
				];
			$this->create($mesdata);
				
		}
	}

	
	// 删除表用
	function __clear() {
		$this->dropTable();
	}
	
	function getvalue( $key ) {

		return $this->getVar('value','where `key`=?',[$key]);
	}

	function getdata( $key ) {
		return $this->getVar('data', 'where `key`=?', [$key]);
	}
	

}

 ?>