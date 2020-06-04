
<div class="container">
    <hr>
    <div class="row">

            <?php 

                require 'lib/connection.php';

                $art_id = $res_article['id'];

                $sql = "SELECT * FROM comments WHERE type_id = '$art_id' ORDER BY id DESC";
                
                $res = mysqli_query($conn,$sql);

                $total_comment = mysqli_num_rows($res);
             ?>

            <div class="col-12">
                    <div class="comments">
                        <div class="bg-white card" style="padding: 10px; ">   
                            <div class="comments-details">
                                <span class="total-comments comments-sort"><?php echo $total_comment; ?> Comments</span>  
                            </div>

                            <?php if (isset($_SESSION['restriction'])): ?>
                                
                                <div class="comment-box add-comment">
                                    <span class="commenter-pic">
                                            <img src="assets/images/user-icon.jpg" class="img-fluid">
                                    </span>
                                    
                                    <span class="commenter-name">
                                        <input id="userComment" type="text" style="background: transparent; color:blacke;" placeholder="Add a public comment" name="Add Comment">
                                        <small style="color: red;" class="error"></small>
                                        <button class="btn btn-light" value="<?php echo $art_id ?>" id="submitComment">Comment</button>
                                        <button class="btn btn-light">Cancel</button>
                                    </span>
                                </div>

                                <?php else: ?>

                                    <button class="btn btn-dark mb-3" data-toggle="modal" data-target="#loginForm" >Signin to leave a comment</button> 

                            <?php endif ?>
                            <div class="clear"></div>
                        
                        <div class="comment_append">
                            
                        </div>


                         <?php while($row = mysqli_fetch_assoc($res)): ?> 
                            <div class="comment-box bg-white" style="box-shadow: 1px 1px 5px #00000008;"> <span class="commenter-pic">
                         <img src="assets/images/user-icon.jpg"
                         class="img-fluid"> </span>
                                
                                <?php 
                                    $user_id = $row['user_id'];
                                    $info = "SELECT * FROM credentials WHERE id = '$user_id'";
                                    $user = mysqli_query($conn,$info);
                                    $user = mysqli_fetch_assoc($user);
                                 ?>
                                <span class="commenter-name">
                                    <a href="#" style="color: black;"><?php echo $user['username'] ?></a> <span class="comment-time"><small style="color: #5e5e5e;"><?php echo timeago($row['date']); ?> <i class="fas fa-clock"></i> </small></span>
                                </span>       
                                <p class="comment-txt more">
                                    <label>
                                        <?php echo $row['comment']; ?>
                                    </label>
                                    <?php if ($user['id'] === $row['user_id']): ?>    
                                        <input type="text" class="btn-light form-control" value="<?php echo $row['comment'] ?>" style="width: 100%; display: none;">
                                    <?php endif ?>    
                                </p>

                                <div class="comment-meta">
                                    <?php if (isset($_SESSION['restriction'])): ?>
                                        
                                        <?php if ($user['id'] === $_SESSION['user_id']): ?>
                                            <button class="comment-reply modify-comment" value="<?php echo $row['id'] ?>"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button> 
                                            <button class="comment-reply remove-comment" value="<?php echo $row['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>  
                                        <?php endif; ?>      
                                         
                                    <?php endif ?>
                                </div>
                                
                                <!-- COMMENT REPLY -->
                                    <div class="reply_holder">
                                        <?php 
                                            $comment_id = $row['id'];
                                            $reply = "SELECT *  FROM reply WHERE comment_id = '$comment_id'  ORDER BY id DESC";
                                            $reply_res = mysqli_query($conn,$reply);
                                         ?>


                                        <?php while($reply = mysqli_fetch_assoc($reply_res)): ?>
                                            <div class="comment-box replied bg-white sampleReplyComment" style="box-shadow: 1px 1px 5px #00000008;">
                                                <span class="commenter-pic">
                                                        <img src="assets/images/user-icon.jpg" class="img-fluid">
                                                </span>

                                                <?php 
                                                    $reply_user_id = $reply['user_id'];
                                                    $info = "SELECT * FROM credentials WHERE id = '$reply_user_id'";
                                                    $reply_user = mysqli_query($conn,$info);
                                                    $reply_user = mysqli_fetch_assoc($reply_user);

                                                 ?>
                                                <span class="commenter-name">
                                                    <a href="#" style="color: black;"><?php echo $reply_user['username'] ?></a> <span class="comment-time"><small style="color: #5e5e5e;"><?php echo timeago($reply['date']); ?> <i class="fas fa-clock"></i> </small></span>
                                                </span>
                                                
                                                <p class="comment-txt more">
                                                   <?php echo $reply['reply'] ?>
                                                </p>
                                                <div class="comment-meta">
                                                    
                                                </div>
                                            </div>
                                        <?php endwhile; ?> 

                                    </div>
                                    <?php if (isset($_SESSION['restriction'])): ?>

                                         <div class="comment-meta">
                                             <button class="comment-reply reply-popup"><i class="fa fa-reply-all" aria-hidden="true"></i> Reply</button>         
                                         </div>
       
                                    <!-- END COMMENT REPLY -->

                                        <div class="comment-box add-comment reply-box">
                                            <span class="commenter-pic">
                                                <img src="assets/images/user-icon.jpg" class="img-fluid">
                                            </span>

                                            <span class="commenter-name">
                                                <input class="userReply" type="text" style="background: transparent; color: black;" placeholder="Add a public reply" name="Add Comment">
                                                <button class="btn btn-dark submitReply" data-id="<?php echo $art_id; ?>" value="<?php echo $row['id'] ?>">Reply</button>
                                                <button type="cancel" class="btn btn-white reply-popup-all">Cancel</button>
                                            </span>
                                        </div>
                                    <?php endif; ?>
                            </div>
                          <?php endwhile; ?>  
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
</div>




<div class="comment-box bg-white sampleCommentBox" style="display: none; box-shadow: 1px 1px 5px #00000008;" >
    <span class="commenter-pic">
        <img src="assets/images/user-icon.jpg" class="img-fluid">
    </span>
    
    <span class="commenter-name">
        <a href="#" style="color: black;">Happy uiuxStream</a> <span class="comment-time">2 hours ago</span>
    </span>       
    <p class="comment-txt more">
        Suspendisse massa enim, condimentum sit amet maximus quis, pulvinar sit amet ante. Fusce eleifend dui mi, blandit vehicula orci iaculis ac.
    </p>

    <div class="comment-meta">
        <button class="comment-reply reply-popup"><i class="fa fa-reply-all" aria-hidden="true"></i> Reply</button>         
    </div>

    <div class="comment-box add-comment reply-box">
        <span class="commenter-pic">
            <img src="assets/images/user-icon.jpg" class="img-fluid">
        </span>

        <span class="commenter-name">
            <input type="text"blacke="background: transparent; color:blacke;" placeholder="Add a public reply" name="Add Comment">
            <button type="submit" class="btn btn-white">Reply</button>
            <button type="cancel" class="btn btn-white reply-popup">Cancel</button>
        </span>
    </div>
</div>

<div class="comment-box replied bg-white sampleReplyComment" style="box-shadow: 1px 1px 5px #00000008; display: none;">
    <span class="commenter-pic">
            <img src="assets/images/user-icon.jpg" class="img-fluid">
    </span>
    <span class="commenter-name">
        <a href="#" style="color: black;">MT-CRIME</a> <span class="comment-time"><small style="color: #5e5e5e;">UNKNOWN<i class="fas fa-clock"></i> </small></span>
    </span>
    
    <p class="comment-txt more">
       sample
    </p>
    <div class="comment-meta">
        
    </div>
</div>