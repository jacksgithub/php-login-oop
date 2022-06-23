<?php include 'incs/header.php'; ?>

<section id="login">

    <h1>Log In</h1>
    <p id="date">Today is: <b><?php echo CONSTANT_DATE; ?></b></p>

    <form action="proc/login.php" method="post">  
        <p><label for="uid">Username/Email: </label><br />
        <input type="text" name="uid" id="uid" required></p>

        <p><label for="pwd">Password: </label><br />
        <input type="password" name="pwd" id="pwd" required></p>

        <p><input type="submit" value="Submit" name="submit"></p>
    </form>
    
    <?php include 'incs/feedback.php'; ?>

</section>

<?php include 'incs/footer.php'; ?>