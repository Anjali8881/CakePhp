<?php
namespace App\View\Cell;

use Cake\View\Cell;

class ArticleCell extends Cell {
	public function display() {
		$this->loadModel('Articles');
		$unread = $this->Articles->find();
		$this->set('unread_count', $unread->count());
	}
}
?>