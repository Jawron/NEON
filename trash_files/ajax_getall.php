<?php


include(realpath($_SERVER["DOCUMENT_ROOT"])). '/neon/includes/config.php';
include(realpath($_SERVER["DOCUMENT_ROOT"])). '/neon/includes/init.php';

$comment_id = 100000;

$comment = new Comments();

$allComments = $comment->getAllComments();
        foreach($allComments as $comment){
            ?>
            <tr>
                <th scope="row"><?php echo $comment['id']?></th>
                <td><?php echo $comment['post_id']?></td>
                <td><?php echo $comment['comment_id']?></td>
                <td><?php echo $comment['comment']?></td>
                <td><?php echo $comment['date_posted']?></td>
                <td><?php echo $comment['active']?></td>

            </tr>        <?php
        }
        ?>