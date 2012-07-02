<?php
class set_of_vars {
    // Property declaration
	public $my_vars = array();
	public $seed_count = 1;

    // method declaration
	public function get_my_vars() {
		return $this->my_vars;
	}

	public function is_empty() {
		return empty($this->my_vars);
	}

	public function add_variable($type_of_variable, $name, $min = 0, $max = 10){
		if ($type_of_variable == "Number") {
			$this->my_vars[$name] = "randRange(".$min.", ".$max.")";
		} elseif ($type_of_variable == "Person name") {
			$this->my_vars[$name] = "person(".$this->seed_count.")";
			$this->seed_count = $this->seed_count + 1;
		} elseif ($type_of_variable == "Hint") {
			array_push($this->my_vars, $name);
		}
	}

	public function delete_variable($to_be_deleted){
		foreach ($this->my_vars as $key => $value) {
			if ($key == $to_be_deleted) {
				unset($this->my_vars[$key]);
			}
		}
	}

	public function replace_variable($old_name, $type_of_variable, $name, $min = 0, $max = 10){
		foreach ($this->my_vars as $key => $value) {
			if ($key != $old_name) {
				$buffer[$key] = $value;
			} else {
				if ($type_of_variable == "Number") {
					$buffer[$name] = "randRange(".$min.", ".$max.")";
				} elseif ($type_of_variable == "Person name") {
					$buffer[$name] = "person(".$this->seed_count.")";
					$this->seed_count = $this->seed_count + 1;
				} elseif ($type_of_variable == "Hint") {
					$buffer[$old_name] = $name;
				}
			}
			$this->my_vars = $buffer;			
		}
	}

	public function pretty_print($ugly_string) {

		if (strpos($ugly_string, "randRange(") !== false ) {
		//It should return something like "0, 10)"
			preg_match('/[a-zA-Z0-9_]+\((.*?)\)/', $ugly_string, $matches);
			$array = explode(", ", $matches[1]);
			echo "Random Number from ". $array[0] . " to " . $array[1];
		}
		if (strpos($ugly_string, "person(") !== false ) {
		//It should return something like "0, 10)"
			preg_match('/[a-zA-Z0-9_]+\((.*?)\)/', $ugly_string, $matches);
			echo "Random person name #". $matches[1];
		}

	}

	public function property_dump($ugly_string) {
		$solution = array();
		if (strpos($ugly_string, "randRange(") !== false ) {
		//It should return something like "0, 10)"
			preg_match('/[a-zA-Z0-9_]+\((.*?)\)/', $ugly_string, $matches);
			$arrayr = explode(", ", $matches[1]);
			$solution = array_merge(array('Number'), (array)$arrayr);

		}
		if (strpos($ugly_string, "person(") !== false ) {
		//It should return something like "0, 10)"
			preg_match('/[a-zA-Z0-9_]+\((.*?)\)/', $ugly_string, $matches);
			$solution = array_merge(array('Person name'), array($matches[1]));
		}

		return $solution;
	}
}

?>