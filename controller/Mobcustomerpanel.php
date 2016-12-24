<?php 

use \Tuanduimao\Loader\App as App;
use \Tuanduimao\Utils as Utils;
use \Tuanduimao\Tuan as Tuan;
use \Tuanduimao\Excp as Excp;
use \Tuanduimao\Conf as Conf;
use \Tuanduimao\Wechat as Wechat;
/**
 * 客户面板
 */
class MobCustomerPanelController extends \Tuanduimao\Loader\Controller {

	function __construct() {

	}

	/**
	 * 详情页入口
	 * @return [type] [description]
	 */
	function index(){

		$data=['title'=>'客户管理'];
		// html代码载入
		App::render($data,'mobile/customer','search.index');

	}

	/**
	 * 创建客户表单
	 * @return [type] [description]
	 */
	function create(){

		$data=['title'=>'客户管理'];
		// html代码载入
		App::render($data,'mobile/customer','panel.create');

	}

	/**
	 * 修改客户表单
	 * @return [type] [description]
	 */
	function  modify(){
		// html代码载入
		App::render($data,'mobile/customer','panel.modify');
	}

	/**
	 * 微信页载入
	 * @return [type] [description]
	 */
	function wechat(){

		$we = new Wechat([
			'appid'=>'wx7c841a9e71bca1a1',
			'secret'=>'e0c9c85d5ddcad1ab2c0444acb5cd43c'
		]);
		
		$data = $we->getSignature();

		App::render($data,'mobile/customer','panel.wechat');
	}
	
	/**
	 * 查看客户页面（客户详情页）
	 * @return [type] [description]
	 */
	function  read(){

		$_id = $_GET['_id'];
		// 实例化
		$Customer = App::M('Customer');
		// 查询这条数据的数值
		$data= $Customer->getLine( "where _id=:id", [],['id'=>$_id ] );
		$data  = ['data'=>$data];

		// html代码载入
		App::render($data,'mobile/customer','panel.read');
		
	}


}


 ?>