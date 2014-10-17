<?php
class ArticlePage extends Page{
	private static $db = array(
			'Date' => 'Date',
			'Author' => 'Text'
		);
	private static $icon = "cms/images/treeicons/news-file.gif";



	public function getCMSFields(){
		$fields = parent::getCMSFields();
		$dateField = new DateField('Date', 'Article Date (for example: 20/12/2014)');
		$dateField->setConfig('showcalendar', true);
		$dateField->setConfig('dateformat', 'dd/MM/YYYY');
		$fields->addFieldToTab('Root.Main', $dateField, 'Content');
		$fields->addFieldToTab('Root.Main', new TextField('Author', 'Author Name'), 'Content');
		return $fields;
	}



}
class ArticlePage_Controller extends Page_Controller{

}
?>