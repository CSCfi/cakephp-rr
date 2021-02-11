<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rp[]|\Cake\Collection\CollectionInterface $rps
 */
?>
<div class="rps index large-9 medium-8 columns content">
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('client_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Federations') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Contacts') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rps as $rp): ?>
            <tr>
                <td><?= h($rp->client_name) ?></td>
                <td><?php foreach ($rp->federations as $federation) : 
                                echo $federation->name. " # ";
                    endforeach;?>
                </td>
		<td><?= h($rp->contacts) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
