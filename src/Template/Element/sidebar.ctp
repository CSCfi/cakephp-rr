<?php if ($this->getRequest()->getSession()->read('Auth.User.username')): ?>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
				<li><?= $this->Html->link(__('List Relying parties'), ['controller'=>'rps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Relying party'), ['controller'=>'rps', 'action' => 'add']) ?></li>

				<?php if ($this->getRequest()->getSession()->read('Auth.User.status')=='admin'):?>
					<li class="heading"><?= __('Admin actions') ?> (Wide affect)</li>
	        <li><?= $this->Html->link(__('Grant Types'), ['controller' => 'GrantTypes', 'action' => 'index']) ?></li>
	        <li><?= $this->Html->link(__('Response Types'), ['controller' => 'ResponseTypes', 'action' => 'index']) ?></li>
	        <li><?= $this->Html->link(__('Scopes'), ['controller' => 'Scopes', 'action' => 'index']) ?></li>
          <li><?= $this->Html->link(__('TokenEndpointAuthenticationMethods'), ['controller' => 'TokenEndpointAuthenticationMethods', 'action' => 'index']) ?></li>
	        <li><?= $this->Html->link(__('Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
					<li><?= $this->Html->link(__('Federations'), ['controller' => 'Federations', 'action' => 'index']) ?></li>
					<li class="heading"><?= __('Metadata') ?></li>
          <li><?= $this->Html->link(__('CSC AAI'), ['controller' => 'api', 'action' => 'rps.json?fdid=1']) ?></li>
          <li><?= $this->Html->link(__('CSC AAI Test'), ['controller' => 'api', 'action' => 'rps.json?fdid=2']) ?></li>
          <li><?= $this->Html->link(__('Haka OIDC Test'), ['controller' => 'api', 'action' => 'rps.json?fdid=3']) ?></li>
          <li><?= $this->Html->link(__('CSC IdP Internal'), ['controller' => 'api', 'action' => 'rps.json?fdid=4']) ?></li>
				<?php endif; ?>
    </ul>
</nav>
<?php endif ?>

