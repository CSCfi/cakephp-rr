<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rp[]|\Cake\Collection\CollectionInterface $rps
 */
?>
<div class="rps index large-9 medium-8 columns content">
    <h3><?= __('Rps') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col" width="50px"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('client_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Federations') ?></th>
                <th scope="col"><?= $this->Paginator->sort('client_identifier') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rps as $rp): ?>
            <tr>
                <td><?= $this->Number->format($rp->id) ?></td>
                <td><?= h($rp->client_name) ?></td>
                <td><?php foreach ($rp->federations as $federation) : 
                                echo $federation->name. " # ";
                    endforeach;?>
                </td>
                <td><?= h($rp->client_identifier) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $rp->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rp->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rp->id)]) ?>
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
