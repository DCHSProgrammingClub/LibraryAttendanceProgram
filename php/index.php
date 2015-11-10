<?php error_reporting(-1); ?>
<?php ini_set('display_errors', true); ?>

<?php

//phpinfo();


include('private/database.php');
echo 'Included<br />';
connect();
echo 'Connected<br />';

echo 'Echod connection<br />';
echo mysqli_num_rows(query('SELECT * FROM `users`'));
echo '<br />';
show(query('SELECT * FROM `users`'));
echo '<br />Queried';

close();
