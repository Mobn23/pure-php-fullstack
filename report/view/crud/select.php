<h1>Select from database</h1>

<table>
    <tr>
        <th>Id</th>
        <th>Namn</th>
        <th>Datum</th>
        <th>Namnbetydelse</th>
    </tr>

<?php foreach ($res as $row) : ?>
    <tr>
        <td><?= $row['rowid'] ?></td>
        <td><?= $row['namn'] ?></td>
        <td><?= $row['datum'] ?></td>
        <td><?= $row['namnlängd'] ?? '' ?></td>
    </tr>
<?php endforeach ?>
</table>   

<prev><?=print_r($res, true) ?></prev>