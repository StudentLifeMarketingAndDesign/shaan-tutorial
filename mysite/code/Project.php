<?php
class Project extends Page{
	private static $has_many = array(
			'Students' => 'Student'
		);

	private static $many_many = array(

			'Mentors'=>'Mentor'
		);


	public function getCMSFields(){
		$fields = parent::getCMSFields();
		$config = GridFieldConfig_RelationEditor::create();
		$config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
			'Name' => 'Name',
			'Project.Title'=>'Project'
			));

		$studentsField = new GridField(
				'Students',
				'Student',
				$this->Students(),
				$config

			);
		$fields->addFieldToTab('Root.Students',$studentsField);
		

		$mentorsField = new GridField(
			'Mentors',
			'Mentors',
			$this->Mentors(),
			GridFieldConfig_RelationEditor::create()

			);

		$fields->addFieldToTab('Root.Mentors',$mentorsField);
		return $fields;
	}

}

class Project_Controller extends Page_Controller{

}