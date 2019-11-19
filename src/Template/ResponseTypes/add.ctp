<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ResponseType $responseType
 */
?>
<div class="responseTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($responseType) ?>
    <fieldset>
        <legend><?= __('Add Response Type') ?></legend>
        <?php
            echo $this->Form->control('response_type');
            echo $this->Form->control('rps._ids', ['options' => $rps]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
