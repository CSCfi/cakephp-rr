<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Federation $federation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Federations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Rps'), ['controller' => 'Rps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rp'), ['controller' => 'Rps', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="federations form large-9 medium-8 columns content">
    <?= $this->Form->create($federation) ?>
    <fieldset>
        <legend><?= __('Add Federation') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('rps._ids', ['options' => $rps]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
