<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Eppn') ?></th>
            <td><?= h($user->eppn) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Family Name') ?></th>
            <td><?= h($user->family_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Given Name') ?></th>
            <td><?= h($user->given_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($user->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Rps') ?></h4>
        <?php if (!empty($user->rps)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Client Identifier') ?></th>
                <th scope="col"><?= __('Client Secret') ?></th>
                <th scope="col"><?= __('Client Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->rps as $rps): ?>
            <tr>
                <td><?= h($rps->id) ?></td>
                <td><?= h($rps->client_identifier) ?></td>
                <td><?= h($rps->client_secret) ?></td>
                <td><?= h($rps->client_name) ?></td>
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
