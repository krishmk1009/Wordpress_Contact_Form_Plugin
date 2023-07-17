<?php
global $wpdb,$table_prefix;

$wp_contact = $table_prefix."contact";
$q="SELECT * FROM `$wp_contact`;";
$results= $wpdb->get_results($q);
ob_start();

?>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $result) : ?>
            <tr>
                <td><?php echo $result->name; ?></td>
                <td><?php echo $result->email; ?></td>
                <td><?php echo $result->message; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php
echo ob_get_clean();
?>