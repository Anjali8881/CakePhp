<?php
namespace App\Controller;

class ArticlesController extends AppController {
	public function initialize(): void{
		parent::initialize();
		$this->loadComponent('Paginator');
		$this->loadComponent('Flash');
	}

	public function index() {
		// $article = $this->Articles->newEmptyEntity();
		// echo "<pre>";
		// print_r($article);
		// die();
		// print_r(get_class($this));
		// die();
		$articles = $this->Paginator->paginate($this->Articles->find());
		$this->set(compact('articles'));
	}

	public function add() {
		$article = $this->Articles->newEmptyEntity();
		//$article = $this->Articles;

		if ($this->request->is('post')) {
			$article = $this->Articles->patchEntity($article, $this->request->getData());
			$article->user_id = 1;
			if ($this->Articles->save($article)) {
				$this->Flash->success('Your Article Has Been Saved');
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error('Unable To add article');
		}
		$this->set('article', $article);
	}

	public function edit($slug) {
		$article = $this->Articles->findBySlug($slug)->firstOrFail();
		if ($this->request->is(['post', 'put'])) {
			$this->Articles->patchEntity($article, $this->request->getData());
			if ($this->Articles->save($article)) {
				$this->Flash->success("Your Articles has been updated successfully");
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error("Unable to update article");
		}
		$this->set('article', $article);
	}

	public function view($slug = null) {
		$article = $this->Articles->findBySlug($slug)->firstOrFail();
		$this->set(compact('article'));
	}

	public function delete($slug) {
		$this->request->allowMethod(['post', 'delete']);
		$article = $this->Articles->findBySlug($slug)->firstOrFail();
		if ($this->Articles->delete($article)) {
			$this->Flash->success("Your Articles has been deleted successfully" . $article->title);
			return $this->redirect(['action' => 'index']);
		}
		$this->Flash->error("Unable to delete article");
		return $this->redirect(['action' => 'index']);
	}
}
?>