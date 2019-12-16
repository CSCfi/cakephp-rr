<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rp $rp
 */
?>
<div class="rps view large-9 medium-8 columns content">
    <h3><?= h($rp->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Client Identifier') ?></th>
            <td><?= h($rp->client_identifier) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Client Secret') ?></th>
            <td><?= h($rp->client_secret) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Client Name') ?></th>
            <td><?= h($rp->client_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($rp->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Redirect Uris') ?></th>
            <td><?= nl2br($rp->redirect_uris) ?></td>
        </tr>
    </table>
    <div id="note" class="related">
        <h4><?= __('Related Grant Types') ?></h4>
        <?php if (!empty($rp->grant_types)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Grant Type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($rp->grant_types as $grantTypes): ?>
            <tr>
                <td><?= h($grantTypes->id) ?></td>
                <td><?= h($grantTypes->grant_type) ?></td>
								<?php if ($this->getRequest()->getSession()->read('Auth.User.status')=='admin'):?>

                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'GrantTypes', 'action' => 'view', $grantTypes->id]) ?>
                </td>
								<?php endif ?>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div id="note" class="related note">
        <h4><?= __('Related Response Types') ?></h4>
        <?php if (!empty($rp->response_types)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Response Type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($rp->response_types as $responseTypes): ?>
            <tr>
                <td><?= h($responseTypes->id) ?></td>
                <td><?= h($responseTypes->response_type) ?></td>
								<?php if ($this->getRequest()->getSession()->read('Auth.User.status')=='admin'):?>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ResponseTypes', 'action' => 'view', $responseTypes->id]) ?>
                </td>
								<?php endif ?>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Scopes') ?></h4>
        <?php if (!empty($rp->scopes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Scope') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($rp->scopes as $scopes): ?>
            <tr>
                <td><?= h($scopes->id) ?></td>
                <td><?= h($scopes->scope) ?></td>
								<?php if ($this->getRequest()->getSession()->read('Auth.User.status')=='admin'):?>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Scopes', 'action' => 'view', $scopes->id]) ?>
                </td>
								<?php endif ?>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($rp->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Eppn') ?></th>
                <th scope="col"><?= __('Family Name') ?></th>
                <th scope="col"><?= __('Given Name') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($rp->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->eppn) ?></td>
                <td><?= h($users->family_name) ?></td>
                <td><?= h($users->given_name) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->status) ?></td>
								<?php if ($this->getRequest()->getSession()->read('Auth.User.status')=='admin'):?>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                </td>
								<?php endif ?>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
		<div class="related">
        <h4><?= __('Related Federations') ?></h4>
        <?php if (!empty($rp->federations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($rp->federations as $federations): ?>
            <tr>
                <td><?= h($federations->id) ?></td>
                <td><?= h($federations->name) ?></td>
                <td><?= h($federations->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Federations', 'action' => 'view', $federations->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
