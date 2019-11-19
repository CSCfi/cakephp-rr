<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TokenEndpointAuthenticationMethod $tokenEndpointAuthenticationMethod
 */
?>
<div class="tokenEndpointAuthenticationMethods form large-9 medium-8 columns content">
    <?= $this->Form->create($tokenEndpointAuthenticationMethod) ?>
    <fieldset>
        <legend><?= __('Edit Token Endpoint Authentication Method') ?></legend>
        <?php
            echo $this->Form->control('token_endpoint_authentication_method');
            echo $this->Form->control('rps._ids', ['options' => $rps]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
