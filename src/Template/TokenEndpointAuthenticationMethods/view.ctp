<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TokenEndpointAuthenticationMethod $tokenEndpointAuthenticationMethod
 */
?>
<div class="tokenEndpointAuthenticationMethods view large-9 medium-8 columns content">
    <h3><?= h($tokenEndpointAuthenticationMethod->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Token Endpoint Authentication Method') ?></th>
            <td><?= h($tokenEndpointAuthenticationMethod->token_endpoint_authentication_method) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tokenEndpointAuthenticationMethod->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Rps') ?></h4>
        <?php if (!empty($tokenEndpointAuthenticationMethod->rps)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Client Identifier') ?></th>
                <th scope="col"><?= __('Client Secret') ?></th>
                <th scope="col"><?= __('Client Name') ?></th>
                <th scope="col"><?= __('Token Endpoint Auth Method') ?></th>
                <th scope="col"><?= __('Redirect Uris') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tokenEndpointAuthenticationMethod->rps as $rps): ?>
            <tr>
                <td><?= h($rps->id) ?></td>
                <td><?= h($rps->client_identifier) ?></td>
                <td><?= h($rps->client_secret) ?></td>
                <td><?= h($rps->client_name) ?></td>
                <td><?= h($rps->token_endpoint_auth_method) ?></td>
                <td><?= h($rps->redirect_uris) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Rps', 'action' => 'view', $rps->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Rps', 'action' => 'edit', $rps->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Rps', 'action' => 'delete', $rps->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rps->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
