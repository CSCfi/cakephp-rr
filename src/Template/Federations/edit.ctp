<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Federation $federation
 */
?>
<div class="federations form large-9 medium-8 columns content">
    <?= $this->Form->create($federation) ?>
    <fieldset>
        <legend><?= __('Edit Federation') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('rps._ids', ['options' => $rps]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
