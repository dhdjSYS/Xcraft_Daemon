<?php
/**
 * Created by PhpStorm.
 * User: dhdj
 * Date: 1/23/18
 * Time: 3:31 PM
 */
class ServerControl{
    public function __construct(){

    }
    public function SetMP($Logger,$UserControl,$Security,$dataDIR,$ServerDIR,$JarDIR){
        $this->Logger = $Logger;
        $this->UserControl = $UserControl;
        $this->Security = $Security;
        $this->DIR = $dataDIR;
        $this->ListDIR = $this->DIR."list/";
        $this->ServerDIR = $ServerDIR;
        $this->JarDIR = $JarDIR;
        return json_encode(array("dataDIR"=>$this->DIR));
    }
    public function GetServerInfoByID($id){
        if($this->Security->IsMatch($id) and file_exists($this->ListDIR.$id.".json")){
            $data = json_decode(file_get_contents($this->ListDIR.$id.".json"),true);
            $data["id"]=$id;
                return $data;//完全没有必要进行安全检测
        }else{
            $this->Logger->PrintLine("不存在的ID,无法找到对应的数据或者出现了安全问题",5);
            return false;
        }
    }
    public function NewServer($AssignedUser,$MemorySize,$PlayerAmount,$IP,$Port,$JarName){
        if($this->Security->IsMatch($AssignedUser) and is_numeric($MemorySize) and is_numeric($PlayerAmount) and $this->Security->IsBasicallyMatch($IP) and is_numeric($Port) and $this->UserControl->IsUser($AssignedUser) and file_exists($this->JarDIR.$JarName) and file_exists($this->JarDIR.$JarName.".conf")){
            $ServerID=$this->GetCurrentServerID()+1;
            @mkdir($this->ServerDIR."server".$ServerID."/");
            @file_put_contents($this->DIR."list/".$ServerID.".json",json_encode(array("AssignedUser"=>$AssignedUser,"MemorySize"=>$MemorySize,"PlayerAmount"=>$PlayerAmount,"IP"=>$IP,"Port"=>$Port,"JarName"=>$JarName)));
            $currentserver=json_decode(file_get_contents($this->DIR."serverlist.json"),true);
            $currentserver[]=$ServerID;
            @file_put_contents($this->DIR."serverlist.json",json_encode($currentserver));
            if(file_exists($this->DIR."list/".$ServerID.".json") ){
                $this->Logger->PrintLine("服务器创建成功",233);
                return true;
            }else{
                $this->Logger->PrintLine("出现了dhdj无法预知的错误并且创建服务器失败",5);
                return false;
            }
        }else{
            $this->Logger->Printline("出现了安全问题导致无法创建数据",5);
            return false;
        }
    }
    public function GetCurrentServerID(){
        $servers=scandir($this->DIR."list/");
        $lastbig=0;
        foreach($servers as $singleserver){
            $singleserver=str_replace(".json","",$singleserver);
            if($singleserver>$lastbig){
                $lastbig=$singleserver;
            }
        }
        return $lastbig;
    }
}