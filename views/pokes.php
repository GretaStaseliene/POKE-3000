<?php

// $data = file_get_contents('./pokes.json');
// $pokes = json_decode($data, true);
// $stmt = $db->prepare('INSERT INTO pokes (poke_from, poke_to, date) VALUES (?, ?, ?)');
// foreach ($pokes as $poke) {
//     $stmt->execute([$poke['from'], $poke['to'], $poke['date']]);
// }
// print_r($pokes);

$result = $db->query("SELECT * FROM pokes");
$pokes = $result->fetch_all(MYSQLI_ASSOC);
?>

<div class="pokes">
    <h2 class="text-uppercase fw-normal">Pokes istorija</h2>
    
    <table class="table">
        <thead>
            <tr>
                <th>Data</th>
                <th>Siuntėjas</th>
                <th>Gavėjas</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($pokes as $poke) : ?>
                <tr>
                    <td><?= date("Y-m-d", strtotime($poke['date'])); ?></td>
                    <td><?= $poke['poke_from']; ?></td>
                    <td><?= $poke['poke_to']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>




<script>
    // $(document).ready(function(){
    //     load_data(1);
    // });

    // function load_data(page) {
    //     $.ajax({
    //         url: 'pokes_data.php',
    //         method: 'POST',
    //         data: {page: page},
    //         success: function(data){
    //             $('#data').html(data);
    //         }
    //     });
    // }

    // $(document).on('click', '.pagination-link', function() {
    //     var page = $(this).data('page');
    //     $.ajax({
    //         url: 'pokes_data.php',
    //         type: 'POST',
    //         data: {page: page},
    //         success: function(){
    //             $('#data-table tbody').html(data);
    //         }
    //     });
    // });
</script>