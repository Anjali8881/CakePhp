<h1>Add Article</h1>
<?php echo $this->cell('Article::display', ['name' => 'hello']);
//echo "<pre>";
//$cell->set('cart', 'cartValue');
// print_r($cell);
 ?>
<?php
echo $this->Form->create($article);
echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => 1]);
echo $this->Form->control('title');
echo $this->Form->control('body', ['rows' => '3']);
echo $this->Form->button('Save Article');
echo $this->Form->end();
?>