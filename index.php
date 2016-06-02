<?php include_once 'includes/assets/header.php';?>

<style>
    body,html{padding:0;margin:0;font-family:Roboto, "HelveticaNeueLT Pro 55 Roman", sans-serif;height:100%;width:100%}.oop-wrapper{height:100%;width:100%;display:flex;flex-direction:column;justify-content:center;align-items:center}.oop-container{background-color:#ddd;border-radius:10px;height:50%;width:33%;padding:2rem;box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);transition:box-shadow .25s}.oop-container:hover{transition:box-shadow .25s;box-shadow:0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19)}.ooplr-info{background-color:#fff;padding:5px;border-radius:2px;font-size:1.2rem;font-family:"Lucida Sans Unicode", sans-serif;box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)}.ooplr-version{font-size:3rem}.header{font-size:2rem}a{text-decoration:none;color:#fff;height:36px;line-height:36px;background-color:#d32f2f;text-transform:uppercase;text-align:center;letter-spacing:0.5px;outline:0;padding:0 2rem;border-radius:2px;display:inline-block;transition:all 0.25s}a:hover{box-shadow:0 5px 11px 0 rgba(0,0,0,0.18),0 4px 15px 0 rgba(0,0,0,0.15);background-color:#f44336}
</style>

<div class="oop-wrapper">
    <div class="oop-container">
        <h1 class="header">Object Oriented Programming Login & Registration</h1>
        <h1 class="ooplr-version">Version: <?php echo Config::get('version/version'); ?></h1>
        <h1 class="ooplr-info">In Directory: <?php echo __DIR__ ?></h1>
        <p>You can find the documentation on <a href="#">Github</a></p>
    </div>
</div>


<?php include_once 'includes/assets/footer.php';?>
