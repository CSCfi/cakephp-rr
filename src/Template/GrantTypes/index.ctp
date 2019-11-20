<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GrantType[]|\Cake\Collection\CollectionInterface $grantTypes
 */
?>
<div class="grantTypes index large-9 medium-8 columns content">
    <h3><?= __('Grant Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('grant_type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?>
                    [<?= $this->Html->link(__('Add'), ['action' => 'add']) ?>]
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($grantTypes as $grantType): ?>
            <tr>
                <td><?= $this->Number->format($grantType->id) ?></td>
                <td><?= h($grantType->grant_type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $grantType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $grantType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $grantType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $grantType->id)]) ?>
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
