<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TokenEndpointAuthenticationMethod[]|\Cake\Collection\CollectionInterface $tokenEndpointAuthenticationMethods
 */
?>
<div class="tokenEndpointAuthenticationMethods index large-9 medium-8 columns content">
    <h3><?= __('Token Endpoint Authentication Methods') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('token_endpoint_authentication_method') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?>
                    [<?= $this->Html->link(__('Add'), ['action' => 'add']) ?>]
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tokenEndpointAuthenticationMethods as $tokenEndpointAuthenticationMethod): ?>
            <tr>
                <td><?= $this->Number->format($tokenEndpointAuthenticationMethod->id) ?></td>
                <td><?= h($tokenEndpointAuthenticationMethod->token_endpoint_authentication_method) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tokenEndpointAuthenticationMethod->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tokenEndpointAuthenticationMethod->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tokenEndpointAuthenticationMethod->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tokenEndpointAuthenticationMethod->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
