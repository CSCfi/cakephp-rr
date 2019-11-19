<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ResponseType[]|\Cake\Collection\CollectionInterface $responseTypes
 */
?>
<div class="responseTypes index large-9 medium-8 columns content">
    <h3><?= __('Response Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('response_type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($responseTypes as $responseType): ?>
            <tr>
                <td><?= $this->Number->format($responseType->id) ?></td>
                <td><?= h($responseType->response_type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $responseType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $responseType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $responseType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $responseType->id)]) ?>
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
