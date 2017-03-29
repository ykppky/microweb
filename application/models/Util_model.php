<?php
class Util_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//添加
	function add($data,$table)
	{
		if( empty($data) )
			return -1;
		$sql = "insert into ".$table." values($data[0]";
		for( $i=1;$i<count($data);$i++)
			$sql .= ",'$data[$i]'";
		$sql .=")";

		return $this->db->query( $sql );
	}
	
	function query($keys,$data,$table)
	{
		$sql = "select ";
		if( empty($keys))
			$sql .="*";
		else
		{
			for( $i=0;$i<count($keys);$i++)
			{
				$sql = $sql." `$keys[$i]`,";
			}
			$sql = substr( $sql, 0, -1);
		}
		$sql .= " from ".$table;
		if( !empty($data) )
		{
			$sql .= " where";
			foreach( $data as $key=>$value)
			{
				$sql .= " `$key`='$value' and";
			}
			$sql = substr( $sql, 0, -4);
		}
	   return $this->db->query($sql);
	}
			 
			 
	function update($data1, $data2,$table)
	{
		$sql = "update ".$table." set";
		if( empty($data1) )
			return 0;
		foreach( $data1 as $key=>$value)
		{
			$sql .= " `$key`='$value',";
		}
		$sql = substr($sql, 0, -1);
		if( !empty($data2) ) {
			$sql .= " where";
			foreach ($data2 as $key => $value) {
				$sql .= " `$key`='$value' and";
			}
			$sql = substr($sql, 0, -4);
		}
		
		return $this->db->query($sql);
	}
	function delete( $data, $table )
	{
		$sql = "delete from ".$table." where";
		if( empty($data) )
		{
			return 0;
		}
		foreach( $data as $key => $value)
		{
			$sql .= " `$key`='$value' and";
		}
		$sql = substr( $sql, 0, -4);
		//echo "delete=".$sql;
		return $this->db->query($sql);
	}
	
	function getTotal($data1, $data2, $table)
	{
		$sql = "select count(*) from ".$table;
		if( !empty($data1) )
		{
			$sql .= " where";
			foreach( $data1 as $key=>$value)
			{
				//$value = '%'.$value.'%';
				$sql .=" `$key` = '$value' and";
			}
			$sql = substr( $sql, 0, -4);
			if( !empty($data2) )
			{
				$sql .=" and (";
				foreach( $data2 as $key=>$value)
				{
					$value = '%'.$value.'%';
					$sql .=" `$key` like '$value' or";
				}
				$sql = substr( $sql, 0, -3);
				$sql .= ")";
			}
		
		}
		else if(  !empty($data2) )
		{
			$sql .= " where";
			foreach( $data2 as $key=>$value)
			{
				$value = '%'.$value.'%';
				$sql .=" `$key` like '$value' or";
			}
			$sql = substr( $sql, 0, -3);
		}
		//echo $sql;
		$query = $this->db->query($sql);
		$total = $query->row_array();
		if( empty($total) )
			return 0;
		return $total['count(*)'];
	}
	
	function getList($offset,$limit,$data1, $data2,$table)
	{
		$sql = "select * from ".$table;
		if( !empty($data1) )
		{
			$sql .= " where";
			foreach( $data1 as $key=>$value)
			{
				//$value = '%'.$value.'%';
				$sql .=" `$key`='$value' and";
			}
			$sql = substr( $sql, 0, -4);
			if( !empty($data2) )
			{
				$sql .=" and (";
				foreach( $data2 as $key=>$value)
				{
					$value = '%'.$value.'%';
					$sql .=" `$key` like '$value' or";
				}
				$sql = substr( $sql, 0, -3);
				$sql .= ")";
			}
		}
		else if( !empty($data2) )
		{
			$sql .= " where";
			foreach( $data2 as $key=>$value)
			{
				$value = '%'.$value.'%';
				$sql .=" `$key` like '$value' or";
			}
			$sql = substr( $sql, 0, -3);
		}
		$sql .= " limit $offset,$limit";
		//echo $sql;
		return $this->db->query($sql);
	}
/*	function getByProjectId($project_id,$table)
	{
		$sql = "select * from ".$table." where `project_id`='$project_id'";
		return  $this->db->query($sql);
		
	}*/
	function getById($id,$table)
	{
		$sql = "select * from ".$table." where `id`='$id'";	
		return $this->db->query($sql);
	}
	/*
  * User: YJS
  * Date: 2016/3/14
  * Description:获取表的列字段组成的字符
  */
	function getTableColumns( $columnKey, $excludeCol=null )
	{
		if( empty($excludeCol) )
		{
			return "*";
		}
		else
		{
			$str = null;
			foreach( $columnKey as $col )
			{
				$flag = false;
				foreach( $excludeCol as $item )
					if( $item == $col )
					{
						$flag = true;
						break;
					}
				if( !$flag )
				{
					if(empty($str))
						$str = "`$col`";
					else
						$str .= ","."`$col`";
				}
			}
			return $str;
		}
	}
}