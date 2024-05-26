<?php
include_once './includes/functions.php';
include './includes/persons_data.php';
$persons = [];
if ( ! empty( $data ) ) {
    $persons = $data;
}

# Funktion die, die Anfangsbuchstaben der Vornamen einmalig zurückgibt
function getFirstLetterOnce( array $data, string $key ): array {
    $first_letters = [];
    foreach ( $data as $person ) {
        // Wenn der Anfangsbuchstabe des Vornamens nicht im Array $first_letters enthalten ist, dann füge ihn hinzu
        if ( ! array_key_exists( substr( $person[ $key ], 0, 1 ), $first_letters ) ) {
            $first_letters[ substr( $person[ $key ], 0, 1 ) ] = true;
        }
    }

    // Sortiere die Anfangsbuchstaben
    ksort( $first_letters );

    return $first_letters;
}
?>

<?php foreach ( getFirstLetterOnce( $persons, 'first_name' ) as $letter => $_ ) : ?>
    <a href="../uebung-P5/?char=<?php echo e($letter); ?>" role="button" style="margin: 10px 0"><?php echo e($letter); ?></a>
<?php endforeach; ?>
