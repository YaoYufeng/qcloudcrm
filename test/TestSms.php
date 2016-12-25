<?php
define('SEROOT', getenv('SEROOT'));
define('TROOT', getenv('TROOT'));
define('CWD', getenv('CWD'));
define('APP_ROOT', getenv('APP_ROOT'));

require_once(SEROOT . "/loader/Autoload.php");


use \Tuanduimao\Loader\App as App;
use \Tuanduimao\Mem as Mem;
use \Tuanduimao\Excp as Excp;
use \Tuanduimao\Err as Err;
use \Tuanduimao\Conf as Conf;
use \Tuanduimao\Model as Model;
use \Tuanduimao\Utils as Utils;

/**
 *注意手机号
 * 信息测试
 */
class TestSms extends PHPUnit_Framework_TestCase
{


    function testSend()
    {

//        $config = App::M('config');
        $Sms = App::M("sms", [
            "AppID" => "1400017564",
            "AppKey" => "2b9f1e3ef8e81ebb5cf4f2b9d1433fe0"
        ]);
        $resp = $Sms->send('15506218525', "尊敬的客户张三您好！您的白金会员卡已生效，请在3天内激活，感谢合作和支持。");

        Utils::out("testSend\n", $resp);

        $this->assertEquals($resp['result'], 0);

    }


    function testSendVoice()
    {

//        $config = App::M('config');
        $Sms = App::M("sms", [
            "AppID" => "1400017564",
            "AppKey" => "2b9f1e3ef8e81ebb5cf4f2b9d1433fe0"
        ]);
        $resp = $Sms->sendvoice('15506218525', "尊敬的客户张三您好！您的白金会员卡已生效，请在3天内激活，感谢合作和支持。");

        Utils::out("testSendVoice\n", $resp);
        $this->assertEquals($resp['result'], 0);

    }

}


?>