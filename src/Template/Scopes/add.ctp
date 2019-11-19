<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Scope $scope
 */
?>
<div class="scopes form large-9 medium-8 columns content">
    <?= $this->Form->create($scope) ?>
    <fieldset>
        <legend><?= __('Add Scope') ?></legend>
        <?php
            echo $this->Form->control('scope');
            echo $this->Form->control('rps._ids', ['options' => $rps]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
