<?php include 'incs/header.php'; 
if (!isset( $_SESSION['username'])) 
{
    header('Location: index.php');
    exit();
}
?>

<section id="profile">

<div class="container col-12 col-xxl-10 px-4 py-0">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-12 text-lg-start">
        <h1 class="display-4 fw-bold lh-1 mb-3">Profile</h1>
        <?php include 'incs/feedback.php'; ?>
      </div>
      <div class="col-12 col-lg-6 mx-auto" id="profile-container">

        <?php
            if (isset($_SESSION['img'])) {
              echo '<img id="profile-img" src="uploads/' . $_SESSION['img'] . '">';           
            }
            echo '<div id="profile-details">';
            echo '<div>Username: <b>' . filter_var($_SESSION['username'], FILTER_SANITIZE_SPECIAL_CHARS) . '</b></div>';
            echo '<div>Email: <b>' . filter_var($_SESSION['email'], FILTER_SANITIZE_SPECIAL_CHARS) . '</b></div>';
            echo '</div>';
        ?>

      </div>
      <div class="col-12 col-lg-6 mx-auto">
        <h5>Add/Update profile image:</h5>
        <span class="discreet">(Max file size 500k)</span>

        <form action="proc/profileImg.php" method="post" enctype="multipart/form-data" id="upload-img-form">
            <input type="file" name="file">
            <button type="submit" name="submit" class="btn btn-primary">Upload Image</button>
        </form>
      </div>


      <div class="col-12 mx-auto">
        <h5>Update profile blurb:</h5>

        <form action="proc/profileBlurb.php" method="post" id="mytinymce-form">
          <textarea name="mytinymce" id="mytinymce" class="form-control"><?php if (isset($_SESSION['blurb'])) { echo $_SESSION['blurb']; } ?></textarea>
          <p class="pt-2 text-end"><button class="px-4 btn btn-primary" type="submit" name="submit">Update</button></p>
        </form>
      </div>
    </div>
  </div>

</section>

<?php include 'incs/footer.php'; ?>