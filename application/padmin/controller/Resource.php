<?php
namespace app\padmin\controller;

use think\Db;

class Resource extends Common
{
	public function pubiso()
	{
		$vendors = Db::name('srvVendors')->select();
		$this->assign('vendors',$vendors);
		return $this->fetch();
	}
	
	
	public function os()
	{
		$sqlRes = Db::name('srvOs')->where('disabled',0)->distinct('family')->field('family')->select();
		$family=[];
		foreach($sqlRes as $v)
		{
			$family[] = $v['family'];
		}
		$this->assign('family',$family);
		$vendors = Db::name('srvVendors')->select();
		$this->assign('vendors',$vendors);
		return $this->fetch();
		
	}
	
	
	public function snapshot()
	{

		return $this->fetch();
		
	}
	
	public function snapshotcreate()
	{
		return $this->fetch();
	}
	
	public function app()
	{
		return $this->fetch();
		
	}
}
?>