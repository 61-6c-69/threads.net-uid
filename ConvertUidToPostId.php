<?php
/*
*
*/
public function ConvertUidToPostId($uid){
		$alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-_';
		//64bit
		if(PHP_INT_SIZE == 8){
			$thread_id = 0;
			for ($i = 0; $i < strlen($uid); $i++) {
				$thread_id = ($thread_id * 64) + strpos($alphabet, $uid[$i]);
			}
			return $thread_id;
		}else{
		//32bit
			$thread_id = '0';
			for ($i = 0; $i < strlen($uid); $i++) {
				$thread_id = bcmul($thread_id, '64');
				$thread_id = bcadd($thread_id, (string)strpos($alphabet, $uid[$i]));
			}
			return $thread_id;
		}
	}
