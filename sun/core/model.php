<?php
/**
 * SunPHP For utf-8
 * This is an open-source software, follow the Apache License 2.0 (http://www.apache.org/licenses/LICENSE-2.0)
 * Copyright: Author All rights reserved.
 * @Author: Sun Qinye  sunqinye@gmail.com
 * @Github: https://github.com/sunqinye/SunPHP
 */
if(!defined('SUN_PATH')) exit('Access Denied');

class Sun_Model{
	protected $host;
	protected $port;
	protected $user;
	protected $password;
	protected $name;
	protected $prefix;
	protected $charset;
	
	protected $link = NULL;
	protected $table = NULL;
	protected $where = NULL;
	protected $join = NULL;
	protected $order = NULL;
	protected $limit = NULL;
	protected $other = NULL;

	protected $datanum = NULL;
	protected $pagesize = 1;
	protected $pagenum = NULL;
	protected $currentpage = NULL;
	
	/*
	 * 构造函数
	 */
	function __construct(){
		global $config;
		$this->host = $config['DB_HOST'];
		$this->port = $config['DB_PORT'];
		$this->user = $config['DB_USER'];
		$this->password = $config['DB_PASSWORD'];
		$this->name = $config['DB_NAME'];
		$this->prefix = $config['DB_PREFIX'];
		$this->charset = $config['DB_CHARSET'];
		$this->link = @mysql_connect($this->host.':'.$this->port,$this->user,$this->password) or die('MySQL无法连接');
		@mysql_select_db($this->name,$this->link) or die('连接数据库'.$this->name.'失败');
		$this->query("SET NAMES ".$this->charset);
	}
	
	/*
	 * 执行一条SQL语句
	 */
	function query($sql){
		return mysql_query($sql);
	}
	/*
	 * 选择数据表
	 */
	function table($table){
		$this->prefix;
		$this->table = $this->prefix.$table;
		return $this;
	}
	/*
	 * 添加WHERE条件
	 */
	function where($where){
		$this->where = " WHERE ".$where;
		return $this;
	}
	/*
	 * 添加JOIN条件
	 */
	function join($join){
		$this->join = " ".$join;
		return $this;
	}
	/*
	 * 添加ORDER条件
	 * [ASC|DESC]
	 */
	function order($order){
		$this->order = " ORDER BY ".$order;
		return $this;
	}
	/*
	 * 添加WHERE条件
	 */
	function limit($limit){
		$this->limit = " LIMIT ".$limit;
		return $this;
	}
	/*
	 * 添加混杂条件
	 */
	function other($other){
		$this->other = " ".$other;
		return $this;
	}
	/*
	 * 分页设置
	 */
	function page($pagesize){
		$this->currentpage = isset($_GET['p'])?intval($_GET['p']):1;
		if($this->currentpage < 1){
			$this->currentpage = 1;
		}
		$this->pagesize = $pagesize;
		$this->limit = " LIMIT ".($this->currentpage-1)*$this->pagesize.",".$this->pagesize;
		return $this;
	}
	/*
	 * 执行插入
	 */
	function insert($data){
		$sql = "INSERT INTO ".$this->table.$data;
		$this->free();
		return $this->query($sql);
	}
	/*
	 * 执行更新
	 */
	function update($data){
		$sql = "UPDATE ".$this->table." SET ".$data.$this->where.$this->join.$this->order.$this->limit.$this->other;
		$this->free();
		return $this->query($sql);
	}
	/*
	 * 执行删除
	 */
	function delete(){
		$sql = "DELETE FROM ".$this->table.$this->where.$this->join.$this->order.$this->limit.$this->other;
		$this->free();
		return $this->query($sql);
	}
	/*
	 * 执行查询并取出一条记录
	 */
	function selectone($field = '*',$result_type = MYSQL_BOTH){
		$sql = "SELECT ".$field." FROM ".$this->table.$this->where.$this->join.$this->order.$this->limit.$this->other;
		$this->free();
		return @mysql_fetch_array(mysql_query($sql),$result_type);
	}
	/*
	 * 执行查询并取出所有记录
	 */
	function selectall($field = '*',$result_type = MYSQL_BOTH){
		$sql = "SELECT ".$field." FROM ".$this->table.$this->where.$this->join.$this->order.$this->other;
		$result = mysql_query($sql);
		$this->datanum = mysql_num_rows($result);
		$this->pagenum = intval(($this->datanum-1)/$this->pagesize) + 1;
		$sql = "SELECT ".$field." FROM ".$this->table.$this->where.$this->join.$this->order.$this->limit.$this->other;
		$this->free();
		$result = mysql_query($sql);
		$all = array();
		while($one = @mysql_fetch_array($result,$result_type)){
			$all[] = $one;
		}
		return $all;
	}
	/*
	 * 执行查询返回结果集
	 */
	function select($field = '*'){
		$sql = "SELECT ".$field." FROM ".$this->table.$this->where.$this->join.$this->order.$this->limit.$this->other;
		$this->free();
		return mysql_query($sql);
	}
	/*
	 * 获取结果集中行的数目
	 */
	function num_rows($field = '*'){
		$sql = "SELECT ".$field." FROM ".$this->table.$this->where.$this->join.$this->order.$this->limit.$this->other;
		$this->free();
		$result = mysql_query($sql);
		return mysql_num_rows($result);
	}
	/*
	 * 获取结果集中字段的数目
	 */
	function num_fields($result){
		return mysql_num_fields($result);
	}
	/*
	 * 从结果集中取出一条记录
	 */
	function fetch_one($result,$result_type = MYSQL_BOTH){
		return @mysql_fetch_array($result,$result_type);
	}
	/*
	 * 从结果集中取出所有记录
	 */
	function fetch_all($result){
		$all = array();
		while($one = @mysql_fetch_array($result)){
			$all[] = $one;
		}
		return $all;
	}
	/*
	 * 获取上一个INSERT操作产生的AUTO_INCREMENT的ID
	 */
	function insert_id(){
		return mysql_insert_id($this->link);
	}
	/*
	 * 释放私有属性
	 */
	function free(){
		$this->table = NULL;
		$this->where = NULL;
		$this->join = NULL;
		$this->order = NULL;
		$this->limit = NULL;
		$this->other = NULL;
	}
	/*
	 * 释放结果内存
	 */
	function free_result($result){
		return mysql_free_result($result);
	}
	/*
	 * 关闭MySQL连接
	 */
	function close(){
		return mysql_close($this->link);
	}
	/*
	 * 输出错误信息的数字编码
	 */
	function errno(){
		echo mysql_errno($this->link);
	}
	/*
	 * 输出文本错误信息
	 */
	function error(){
		echo mysql_error($this->link);
	}
	
	/*
	 * 分页显示
	 */
	function show($style){
		$this->currentpage = isset($_GET['p'])?intval($_GET['p']):1;
		if($this->currentpage < 1){
			$this->currentpage = 1;
		}else if($this->currentpage > $this->pagenum){
			$this->currentpage = $this->pagenum;
		}
		$pageup = $this->currentpage - 1;
		$pagedowm = $this->currentpage + 1;
		$url = $_SERVER['REQUEST_URI'];
		$parse_url = parse_url($url);
		$url_path = $parse_url['path'];
		$url_path_array = explode('/',$url_path);
		$url_path = end($url_path_array);
		$url_query = isset($parse_url['query'])?$parse_url['query']:'';
		$url_query = preg_replace("/&p=./","",$url_query);
		
		switch ($style)
		{
		case 1:
			if($this->currentpage == 1){
				$bar = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			}else{
				$bar = "<a href='$url_path?$url_query&p=$pageup'>上一页</a> ";
			}
			if($this->currentpage == $this->pagenum){
				$bar = $bar.'';
			}else{
				$bar = $bar."<a href='$url_path?$url_query&p=$pagedowm'>下一页</a>";
			}
			return $bar;
			break;
		case 2:
			$bar = '第'.$this->currentpage.'页/共'.$this->pagenum.'页&nbsp;';
			if($this->currentpage == 1){
				$bar = $bar.'';
			}else{
				$bar = $bar."<a href='$url_path?$url_query&p=$pageup'>上一页</a> ";
			}
			if($this->currentpage == $this->pagenum){
				$bar = $bar.'';
			}else{
				$bar = $bar."<a href='$url_path?$url_query&p=$pagedowm'>下一页</a>";
			}
			$bar = $bar.'&nbsp;&nbsp;跳至<select>';
			for($i=1; $i<=$this->pagenum; $i++){
				$bar = $bar."<option value='$i' onclick=location='$url_path?$url_query&p=$i'>$i</option>";
			}
			$bar = $bar.'</select>';
			return $bar;
			break;
		case 3:
			$bar = "<a href='$url_path?$url_query&p=1'>首页</a> ";
			if($this->pagenum <= 7){
				for($i=1; $i<=$this->pagenum; $i++){
					$bar = $bar."<a href='$url_path?$url_query&p=$i'>$i</a> ";
				}
			}else{
				if($this->currentpage <= 4){
					for($i=1; $i<=7; $i++){
						$bar = $bar."<a href='$url_path?$url_query&p=$i'>$i</a> ";
					}
					$bar = $bar.'...';
				}else if($this->currentpage >= $this->pagenum-3){
					$bar = $bar.'...';
					for($i=$this->pagenum-6; $i<=$this->pagenum; $i++){
						$bar = $bar."<a href='$url_path?$url_query&p=$i'>$i</a> ";
					}
				}else{
					$bar = $bar.'...';
					for($i=$this->currentpage-3; $i<=$this->currentpage+3; $i++){
						$bar = $bar."<a href='$url_path?$url_query&p=$i'>$i</a> ";
					}
					$bar = $bar.'...';
				}
			}
			$bar = $bar."<a href='$url_path?$url_query&p=$this->pagenum'>尾页</a>";
			return $bar;
		default:
			$bar = '';
			break;
		}
	}
}
?>