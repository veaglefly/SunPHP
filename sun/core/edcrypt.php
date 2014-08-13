<?php
/**
 * SunPHP For utf-8
 * This is an open-source software, follow the Apache License 2.0 (http://www.apache.org/licenses/LICENSE-2.0)
 * Copyright: Author All rights reserved.
 * @Author: Sun Qinye  sunqinye@gmail.com
 * @Github: https://github.com/sunqinye/SunPHP
 *
 * edcrypt加密解密类
 *
 * @example: $ed = new edcrypt();
 *			 $ed->encrypt($data);
 *			 $ed->decrypt($data);
 */
if(!defined('SUN_PATH')) exit('Access Denied');

class Sun_EDcrypt
{
	private $crypt_key;

	public function __construct($crypt_key = 'hisuncms'){
	   $this->crypt_key = $crypt_key;
	}

	public function encrypt($data){
		$encrypt_key = md5(rand(0,32000));
		$ptr = 0;
		$temp = '';
		for($i=0; $i<strlen($data); $i++){
			$ptr = $ptr == strlen($encrypt_key)?0:$ptr;
			$temp .= $encrypt_key[$ptr].($data[$i] ^ $encrypt_key[$ptr++]);
		}
		return base64_encode($this->coreCrypt($temp));
	}

	public function decrypt($data){
		$data = $this->coreCrypt(base64_decode($data));
		$temp = '';
		for($i=0; $i<strlen($data); $i++){
			$md5 = $data[$i];
			$temp .= $data[++$i] ^ $md5;
		}
		return $temp;
	}

	private function coreCrypt($data){
		$encrypt_key = md5($this->crypt_key);
		$ptr = 0;
		$temp = '';
		for($i=0; $i<strlen($data); $i++){
			$ptr = $ptr == strlen($encrypt_key)?0:$ptr;
			$temp .= $data[$i] ^ $encrypt_key[$ptr++];
		}
		return $temp;
	}

	public function __destruct(){
		$this->crypt_key = null;
	}
}
?>