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
        foreach($StartingMessage as $SingleMessage){
            $this->PrintLine($SingleMessage[0],$SingleMessage[1]);
        }
    }

    /**
     * @param $Message
     * @param int $Level
     */
    public function PrintLine($Message, $Level = 0){
            echo "[" . date("H:i:s") . " " . $this->GetLevel($Level) . "] " . $Message . "\r\n";
        if($this->GetLevel($Level) == "FATAL") {
            die("THE DAEMON DIES BECAUSE AN FATAL ERROR OCCURRED\r\n");
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
            case 4:
                $stype = "DANGER";
                break;
            case 5:
                $stype = "PANIC";
                break;
            case 6:
                $stype = "DEADLY";
                break;
            case 7:
                $stype = "FATAL";
                break;
            default:
                $stype = "INFORM";
        }
        return $stype;
    }
}