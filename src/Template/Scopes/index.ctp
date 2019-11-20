<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Scope[]|\Cake\Collection\CollectionInterface $scopes
 */
?>
<div class="scopes index large-9 medium-8 columns content">
    <h3><?= __('Scopes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('scope') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?>
                     [<?= $this->Html->link(__('Add'), ['action' => 'add']) ?>]
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($scopes as $scope): ?>
            <tr>
                <td><?= $this->Number->format($scope->id) ?></td>
                <td><?= h($scope->scope) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $scope->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $scope->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $scope->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scope->id)]) ?>
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
