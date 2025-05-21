<style>
table, th, td {
    border: 1px solid black;
}
</style>

<table>
    <tr>
        <th>Namn</th>
        <th>NamnlÃ¤ngd</th>
        <th>Namnbetydelse</th>
    </tr>

    <?php foreach ($mergedResults as $row) : ?>
        <tr>
            <td><?= $row['namn'] ?></td>
            <td><?= $row['namnlangd'] ?></td>
            <td><?= $row['betydelse'] ?? '' ?></td>
        </tr>
    <?php endforeach ?>
</table>
