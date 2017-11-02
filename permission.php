<?php 
/**
 * @Author: shiyunfei
 * @Date:   2017-05-12 14:32:07
 * @Last Modified by:   shiyunfei
 * @Last Modified time: 2017-11-02 13:42:58
 */
class Common
{
    private $permission_array = []; //用来存贮权限
    private $appPath = "";//项目的控制器目录
	public function __construct(){
	}
	public function permission(){
        $this->getFile(glob($this->appPath.'/*'));
        print_r($this->permission_array);
	}
	//获取文件
	private function getFile($path){
		foreach ($path as $file ){
			if(is_dir($file)){
                $this->getFile(glob($file.'/*'));
                continue;
			}
			$this->set_permission($file);
		}
	}
	//获取注释 关键字 permission是否需要记录权限
	private function set_permission($file){
		require_once $file;
		$className = basename($file, '.php');
		$class = new ReflectionClass($className);
		$pDesc = $this->match_param('permission',$class->getDocComment(),true);
        if(!$pDesc){
        	return;
        }
        $pKey = substr($file,strpos($file,'controllers/')+12,-4);
		$this->permission_array[$pKey] = ['key'=>$pKey,'name'=>$pDesc];
		$methods = $class->getMethods(ReflectionMethod::IS_PUBLIC);
		foreach ($methods as $method) {
			$mpDesc = $this->match_param('permission',$method->getDocComment(),true);
			if(!$mpDesc){
				continue;
			}
			$mpKey = $pKey.'/'.$method->name;
			$this->permission_array[$pKey]['sub'][]=['key'=>$mpKey,'name'=>$mpDesc];
		}
	}
	//匹配注视 
	private function match_param($key,$str,$only = false){
  	 if(preg_match_all( "/@{$key}\s+([\S]+)/i", $str, $matches)){
  	 	 if($only){
  	 	 	 return $matches[1][0];
  	 	 }
         return $matches[1];
  	 }
     return false;
  }
}