<?php
$c_name = $this->request->getParam('controller');
$a_name = $this->request->getParam('action');

// echo $a_name;
// exit;
?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">Logo</a>

  <!-- Links -->
  <ul class="navbar-nav">

    <?php foreach ($menus as $key => $menu): ?>

      <?php if (empty($menu->submenus)): ?>
        <li class="nav-item">
          <a class="nav-link" href="#"><?=$menu->name;?></a>
        </li>
      <?php else: ?>

        <!-- Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            <?=$menu->name;?>
          </a>
          <div class="dropdown-menu">
            <?php foreach ($menu->submenus as $key => $submenu): ?>
              <a class="dropdown-item" href="#"><?=$submenu->name?></a>
            <?php endforeach;?>
          </div>
        </li>

      <?php endif;?>

    <?php endforeach;?>

  </ul>
</nav>
