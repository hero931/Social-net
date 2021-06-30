<?php include("includes/header.php"); ?>
    
<section class="p-5">        
    <div class="row g-4 mt-5">                
        <div class="col-sm-3">
        <div class="card mb-3 bg-light">
                <div class="row g-0">
                        <div class="col m-4">
                            <img src="<?php echo $user['profile_pic']; ?>" class="rounded-circle mb-3" alt="image" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col p-3">
                            <div class="card-body">
                            <h5 class="card-title mb-3">
                                <a href="#">
                                    <?php echo $user['first_name'] . " " . $user['last_name']; ?>
                                </a>                                    
                            </h5>                        
                                <p class="card-text"><small class="text-muted"><i class="far fa-post"><?php echo "Posts: " . $user['num_posts']; ?></i></small></p>
                                <p class="card-text"><small class="text-muted"><i class="far fa-thumbs-up"><?php echo ": " . $user['num_likes']; ?></i></small></p>
                            </div>
                        </div>
                </div>
            </div>
            
            <div class="card mb-3">
                <div class="row g-0">
                        <div class="col m-4">
                            <img src="<?php echo $user['profile_pic']; ?>" class="rounded-circle mb-3" alt="image" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col m-2 p-3">
                            <div class="card-body">
                            <h5 class="card-title mb-3">
                                <a href="#">
                                    <?php echo $user['first_name'] . " " . $user['last_name']; ?>
                                </a>                                    
                            </h5>                        
                                <p class="card-text"><small class="text-muted"><i class="far fa-post"><?php echo "Posts: " . $user['num_posts']; ?></i></small></p>
                                <p class="card-text"><small class="text-muted"><i class="far fa-thumbs-up"><?php echo ": " . $user['num_likes']; ?></i></small></p>
                            </div>
                        </div>
                </div>
            </div>
        </div>                           
        <div class="col-sm-6">
            <div class="card bg-light">
                <div class="card-body text-center">
                <form class="post_form flex-row" action="index.php" method="POST">
                    <div class="mb-3">                        
                        <textarea type="email" class="form-control" placeholder="Got something to say?"  aria-describedby="post"></textarea>                        
                    </div> 
                    <hr>                   
                    <button type="submit" id="post" class="btn btn-outline-secondary">Post</button>                    
                </form>
                </div>
            </div>
        </div>                        
    </div>        
</section>
</body>
</html>