<h1>All users</h1>

<?= getFlashMessage() ?>

<table>
    <tr>
        <th>Id</th>
        <th>Acronym</th>
        <th>Name</th>
        <th>Role</th>
        <th>Avatar</th>
        <th>Signature</th>
    </tr>

<?php foreach ($res as $row) : ?>
    <tr>
        <td><?= $row['rowid'] ?></td>
        <td><?= $row['acronym'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['role'] ?? '' ?></td>
        <td><?= $row['avatar'] ?? '' ?></td>
        <td><?= $row['signature'] ?? '' ?></td>
    </tr>
<?php endforeach ?>
</table><br>
