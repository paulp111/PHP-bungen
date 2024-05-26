<?php

declare(strict_types=1);
require 'validate.php';

$user = [
    'name' => '',
    'email' => '',
    'age' => '',
    'terms' => false,
];

$errors = [
    'name' => '',
    'email' => '',
    'age' => '',
    'terms' => '',
];

$info = '';

$filters = [
    'email' => FILTER_VALIDATE_EMAIL,
    'age' => [
        'filter' => FILTER_VALIDATE_INT,
        'options' => ['min_range' => 18, 'max_range' => 90]
    ],
    'terms' => FILTER_VALIDATE_BOOLEAN,
];

$filter = [
    'email' => '',
    'age' => '',
    'terms' => false,
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $filter = filter_input_array(INPUT_POST, $filters);

    $errors['email'] = !$filter['email'] ? 'E-Mail must be E-Mail-Format (e.g. user@mail.at)' : '';
    $errors['age'] = !$filter['age'] ? 'Age must be between 18 and 90' : '';
    $errors['terms'] = !$filter['terms'] ? 'You must agree to the terms and conditions' : '';

    if (empty(array_filter($errors))) {
        $info = 'Form was submitted successfully!';
    } else {
        $info = 'Form has errors, please correct the following fields:';
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="pico.classless.min.css">
    <title>Simple Form</title>
</head>

<body>
    <main class="container">
        <?php echo "<pre>$info</pre>" ?>
        <form action="simple-form.php" method="POST">
            <label for="name">Name
                <input type="text" id="name" name="name" placeholder="Your name" value="<?php echo e($user['name']); ?>">
                <span style="color: red;"><?php echo $errors['name']; ?></span>
            </label>
            <label for="email">E-Mail-Adresse
                <input type="text" id="email" name="email" placeholder="Your E-Mail" value="<?php echo e((string) $filter['email']); ?>">
                <span style="color: red;"><?php echo $errors['email']; ?></span>
            </label>
            <label for="age">Age
                <input type="text" id="age" name="age" placeholder="Your age" value="<?php echo e((string) $filter['age']); ?>">
                <span style="color: red;"><?php echo $errors['age']; ?></span>
            </label>
            <label for="terms">I agree to the terms and conditions
                <input type="checkbox" id="terms" name="terms" <?php echo $filter['terms'] ? 'checked' : ''; ?>>
                <span style="color: red;"><?php echo $errors['terms']; ?></span>
            </label>
            <button type="submit">Absenden</button>
        </form>
    </main>
</body>

</html>