<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Federation[]|\Cake\Collection\CollectionInterface $federations
 */
?>
<div class="federations index large-9 medium-8 columns content">
    <h3><?= __('Federations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($federations as $federation): ?>
            <tr>
                <td><?= $this->Number->format($federation->id) ?></td>
                <td><?= h($federation->name) ?></td>
                <td><?= h($federation->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $federation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $federation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $federation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $federation->id)]) ?>
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
