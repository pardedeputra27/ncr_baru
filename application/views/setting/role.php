<table class="table table-bordered ">
    <thead>
        <tr>
            <th class="text-center">ID Role</th>
            <th class="text-center">Label</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($result as $role): ?>
        <tr>
            <td class="text-center"><?= $role['id_role']; ?></td>
            <td class="text-center"><span class="badge bg-secondary"><?=$role['label']; ?></span></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
