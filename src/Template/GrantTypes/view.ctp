<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GrantType $grantType
 */
?>
<div class="grantTypes view large-9 medium-8 columns content">
    <h3><?= h($grantType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Grant Type') ?></th>
            <td><?= h($grantType->grant_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($grantType->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Rps') ?></h4>
        <?php if (!empty($grantType->rps)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Client Identifier') ?></th>
                <th scope="col"><?= __('Client Secret') ?></th>
                <th scope="col"><?= __('Client Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($grantType->rps as $rps): ?>
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
