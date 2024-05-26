<?php
include_once './includes/functions.php';
include './includes/persons_data.php';

function filtered_names( $persons, $char ): array {
    return array_filter( $persons, function ( $person ) use ( &$char ) {
        return substr( $person['first_name'], 0, 1 ) === $char;
    } );
}

$filtered_persons = [];
if ( ! empty( $_GET['char'] ) ) {
    $char = $_GET['char'];
    $persons = [];
    if ( isset( $data ) ) {
        $persons = $data;
    }

    $filtered_persons = filtered_names( $persons, $char );
}
?>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Lastname</th>
            <th>Birthdate</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ( $filtered_persons as $person ): ?>
            <tr>
                <td><?php echo e( $person['first_name'] ); ?></td>
                <td><?php echo e( $person['last_name'] ); ?></td>
                <td><?php echo e( $person['birthdate'] ); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
