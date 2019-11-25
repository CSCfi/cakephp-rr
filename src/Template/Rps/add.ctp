<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rp $rp
 */
?>
<div class="rps form large-9 medium-8 columns content">
    <?= $this->Form->create($rp) ?>
    <fieldset>
        <legend><?= __('Add Rp') ?></legend>
        <?php
            echo $this->Form->control('client_identifier');
            echo $this->Form->control('client_secret');
            echo $this->Form->control('client_name');
	    echo $this->Form->control('policy_uri');
            echo $this->Form->control('initiate_login_uri');
            echo $this->Form->control('redirect_uris',['type' => 'textarea']);
            echo $this->Form->control('contacts',['type' => 'textarea']);
            echo $this->Form->control('token_endpoint_auth_method',['options' => [''=>'Default','client_secret_post' => 'client_secret_post','client_secret_basic' => 'client_secret_basic','client_secret_jwt' => 'client_secret_jwt','private_key_jwt' => 'private_key_jwt','tls_client_auth' => 'tls_client_auth','self_signed_tls_client_auth' => 'self_signed_tls_client_auth']]);
            echo $this->Form->control('token_endpoint_authentication_methods._ids', ['options' => $tokenEndpointAuthenticationMethods]);
            echo $this->Form->control('grant_types._ids', ['options' => $grantTypes, 'default'=> [1]]);
            echo $this->Form->control('response_types._ids', ['options' => $responseTypes, 'default'=>[4]]);
            echo $this->Form->control('scopes._ids', ['options' => $scopes, 'default'=>[1]]);
            echo $this->Form->control('federations._ids', ['options' => $federations, 'default'=> [2]]);
 	  echo ($this->getRequest()->getSession()->read('Auth.User.status')=='admin') ? $this->Form->control('users._ids', ['options' => $users]) : '';
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
