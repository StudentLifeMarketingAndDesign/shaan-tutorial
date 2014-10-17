<?php
class Page extends SiteTree {

	private static $db = array(
	);

	private static $has_one = array(
	);

}
class Page_Controller extends ContentController {

	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
private static $allowed_actions = array('BrowserPollform');

	public function init() {
		parent::init();
		// You can include any CSS or JS required by your project here.
		// See: http://doc.silverstripe.org/framework/en/reference/requirements
	}

public function doBrowserPoll($data, $form){
		$submission = new BrowserPollSubmission();
		$form -> saveInto($submission);
		$submission->write();
		Session::set("BrowserPollVoted", true);
		return $this->redirectBack();
	}




	public function LatestNews($num=5){
		$holder = ArticleHolder::get()->First();
		return ($holder) ? ArticlePage::get()->filter('ParentID',$holder->ID)->sort('Date DESC')->limit($num) : false;
	}

	

	public function BrowserPollform(){
		if(Session::get('BrowserPollVoted')) return false;

		$fields = new FieldList(
			new TextField('Name'),
			new OptionsetField('Browser', 'Your Favourite Browser', array(
				'Firefox' => 'Firefox',
				'Chrome' => 'Chrome',
				'Internet Explorer' => 'Internet Explorer',
				'Safari'=>'Safari',
				'Opera'=>'Opera',
				'Lynx'=>'Lynx'

				))


			);

		$actions = new FieldList(
				new FormAction('doBrowserPoll', 'Submit')
			);
		$validator = new RequiredFields('Name', 'Browser');
		
		return new Form($this, 'BrowserPollform', $fields,$actions,$validator);
			


	}

	public function BrowserPollResults(){
		$submissions = new GroupedList(BrowserPollSubmission::get());
		$total = $submissions->Count();
		$list = new ArrayList();
		foreach($submissions->groupBy('Browser') as $browserName => $browserSubmissions){
			$percentage = (int) ($browserSubmissions->Count()/$total * 100);
			$list->push(new ArrayData(array(
					'Browser' => $browserName,
					'Percentage' => $percentage
				)));
		}
		return $list;
	}

}
