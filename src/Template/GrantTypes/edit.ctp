<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GrantType $grantType
 */
?>
<div class="grantTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($grantType) ?>
    <fieldset>
        <legend><?= __('Edit Grant Type') ?></legend>
        <?php
            echo $this->Form->control('grant_type');
            echo $this->Form->control('rps._ids', ['options' => $rps]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
