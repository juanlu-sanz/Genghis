<?php

/**
 * SDIC API CLIENT E-LEARNING
 * VERSION: 1.0.1
 * AUTHOR: Antonio Morillo Callejon <amorillo@di.uc3m.es>
 */

	if (!function_exists('curl_init')) {
	  throw new Exception('SDIC API CLIENT E-LEARNING needs the CURL PHP extension.');
	}
	if (!function_exists('json_decode')) {
	  throw new Exception('SDIC API CLIENT E-LEARNING needs the JSON PHP extension.');
	}

	class SDICApiClientELearning {

		var $key;
		var $server = 'https://baal.uc3m.es/gel/api/do.php';		

		private function exec($params) {
			$url_call = "{$this->server}?key={$this->key}";			
			foreach ($params as $name => $value) $url_call .= "&$name=$value";						
			$cl = curl_init();     
 			curl_setopt($cl, CURLOPT_TIMEOUT, 30);     
     		curl_setopt($cl, CURLOPT_RETURNTRANSFER, true);
     		curl_setopt($cl, CURLOPT_FOLLOWLOCATION, false);

     		curl_setopt($cl, CURLOPT_URL, str_replace(" ", "%20", $url_call));
 
			$data = curl_exec($cl);
    		$info = curl_getinfo($cl);
 			curl_close($cl);

     		if ($data === false) throw new Exception("[SDIC API CLIENT E-LEARNING] Error executing $url_call.");
     		return json_decode($data);
		}

		function assignKey($key) {
			$this->key = $key;
		}

		function getCourses($platform_id = NULL, $user_uid = NULL) {
			return $this->exec(
				array(
					"action" => "getAll-cCourse",
					"platform" => $platform_id,
					"uid" => $user_uid
					)
				);
		}

		function getPlatforms() {
			return $this->exec(
				array(
					"action" => "getAll-cPlatform"
					)
				);
		}

		function getDepartments() {
			return $this->exec(
				array(
					"action" => "getAll-cDepartment"
					)
				);
		}

		function getLogoutURL() {
			return $this->exec(
				array(
					"action" => "logoutURL-authenticate"
					)
				);
		}

		function getUser($userKey) {
			return $this->exec(
				array(
					"action" => "getUser-authenticate",
					"userKey" => $userKey
					)
				);
		}

	}

?>
