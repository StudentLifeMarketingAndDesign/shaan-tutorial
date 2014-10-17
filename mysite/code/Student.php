<?php
class Student extends DataObject{
	private static $db = array(
			'Name' => 'Varchar',
			'University' => 'Varchar'
		);

	private static $has_one = array(
			'Project' => 'Project'
		);

	function getInfo(){
		return $this->renderWith('StudentInfo');
	}


}	