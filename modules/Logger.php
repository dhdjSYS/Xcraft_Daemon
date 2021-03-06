<?php
/**
 * Created by PhpStorm.
 * User: dhdj
 * Date: 1/14/18
 * Time: 4:48 PM
 */
class Logger{
    /**
     * Logger constructor.
     */
    public function __construct(){

    }

    /**
     * @return string
     */
    public function setMP(){
        return json_encode(array());
    }

    /**
     * @param $StartingMessage
     * @param $Version
     */
    public function PrintStartingMessages($StartingMessage, $Version){
        $this->PrintLine('\--    --/  /------\  |-|  /--   /-------\   |-------|  |----------|');
        $this->PrintLine(' \ \  / /  / /-----/  |-| / /   / /-----\ |  |-|-----|  |----------|');
        $this->PrintLine('  \ || /  / /         |-|/ /   / /      | |  | |             ||     ');
        $this->PrintLine('  / || \  \ \         |-|-/    \ \      | |  | |-----        ||     ');
        $this->PrintLine(' / /  \ \  \ \-----\  |-|       \ \-----/ |  | |             ||     ');
        $this->PrintLine('/--    \--  \------/  |-|        \-------/ \ |-|             --     ');
        $this->PrintLine('                                                        '.$Version.'');
        $this->PrintLine('友情提示,所有输出的json因为格式问题,双引号全部被过滤为单引号,如果需要使用请自行更改',1);
        foreach($StartingMessage as $SingleMessage){
            $this->PrintLine($SingleMessage[0],$SingleMessage[1]);
        }
    }

    /**
     * @param $Message
     * @param int $Level
     */
    public function PrintLine($Message, $Level = 0){
        if(preg_match('/WIN*/',PHP_OS)){
            echo "[" . date("H:i:s") . " " . $this->GetLevel($Level) . "] " . $Message . "\r\n";
           } else {
	          	$c="37";       
            if($Level>0){
            	$c="33";
            }
            if($Level>1){
            	$c="31";
            }
            if($Level>4){
            	$c='40;31';
            }
            if($Level==233){
                $c='40;32';
            }
            $Message=str_replace('"',"'",$Message);
            if($Level>4) {
                if($Level==233){
                    system('echo -e "\033[32m ------------------------------------------------- \033[0m"');
                }else {
                    system('echo -e "\033[31m ------------------------------------------------- \033[0m"');
                }
            }
            system('echo -e "\033['.$c.'m '."[" . date("H:i:s") . " " . $this->GetLevel($Level) . "] " .$Message.' \033[0m"');
            if($Level>4) {
                if($Level==233){
                    system('echo -e "\033[32m ------------------------------------------------- \033[0m"');
                }else {
                    system('echo -e "\033[31m ------------------------------------------------- \033[0m"');
                }
            }
            unset($c);
        if($this->GetLevel($Level) == "FATAL") {
	          die("THE DAEMON DIES BECAUSE AN FATAL ERROR OCCURRED\r\n");
            }
          }
        }

    /**
     * @param $Message
     * @param int $Level
     * @param bool $status
     * @return string
     */
    public function PrintJson($Message, $Level = 0, $status = true){
        return json_encode(array("Message"=>'['.$this->GetLevel($Level).']'.$Message,"Status"=>$status));
    }

    /**
     * @param $Level
     * @return string
     */
    public function GetLevel($Level){
        switch($Level) {
            case 0:
                $stype = "INFORM";
                break;
            case 1:
                $stype = "WARNING";
                break;
            case 2:
                $stype = "ERROR";
                break;
            case 3:
                $stype = "DANGER";
                break;
            case 4:
                $stype = "PANIC";
                break;
            case 5:
                $stype = "DEADLY";
                break;
            case 6:
                $stype = "FATAL";
                break;
            case 233:
                $stype = "SUCCESS";
                break;
            default:
                $stype = "INFORM";
        }
        return $stype;
    }
}