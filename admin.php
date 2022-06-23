<?php include 'incs/header.php'; 

if (!isset( $_SESSION['username']) || $_SESSION['username'] !== 'admin')
{
    header('Location: index.php');
    exit();
}

if (!isset($_GET['error'])) {
    // Instantiate ShowUsers class
    include './classes/DB.php';
    include './classes/admin/Admin.php';
    $admin = new Admin();
    $rows = $admin->queryUsers();
}   
?>

<section id="admin">

<div class="container col-12 px-4 py-0">
    <div class="row g-lg-5 py-5">
        <div class="col-12 text-lg-start" id="feedback-container">
            <h1 class="display-4 fw-bold lh-1 mb-3">Users</h1>
            <?php include 'incs/feedback.php'; ?>
        </div>
      </div>
    </div>
    <div class="row g-lg-5 pb-5">
        <div class="col-12" id="show-users-container">
        <?php
            if (isset($rows)) 
            {
        ?>
            <div class="show-users-row show-users-row-heading">
                <div class="show-users-img show-users-heading">Profile Pic</div>
                <div class="show-users-username show-users-heading">Username</div>
                <div class="show-users-email show-users-heading">Email</div>
                <div class="show-users-blurb show-users-heading">Blurb</div>
            </div>
        <?php
                foreach( $rows as $row ) 
                {
                    $username = filter_var($row['username'], FILTER_SANITIZE_SPECIAL_CHARS);
        ?>
            <div class="show-users-row<?php if ($username === 'admin') { ?> admin-row <?php } ?>">
                <div class="show-users-img">
                    <?php if ($row['img']) { ?>
                        <img src="<?php echo 'uploads/' . $row['img']; ?>">
                    <?php } ?>
                </div>
                <div class="show-users-username"><?php echo $username; ?></div>
                <div class="show-users-email"><?php echo filter_var($row['email'], FILTER_SANITIZE_SPECIAL_CHARS); ?></div>
                <div class="show-users-blurb"><?php echo $row['blurb']; ?></div>
                <span class="show-users-delete">
                    <button type="button" <?php echo 'id="username-' . $username . '"'; ?> class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteUserModal">Delete User</button>
                </span>
            </div>
        <?php
                }
            }
        ?>
        </div>
      </div>
    </div>    
  </div>

</section>


<!-- Modal -->
<div class="modal fade" id="deleteUserModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteUserModalLabel">Are you sure you want to delete <span class="text-danger" id="modal-username"></span>?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-danger">
        This action is non-reversible!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="cancel-btn" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="delete-btn" data-bs-dismiss="modal">Delete</button>
      </div>
    </div>
  </div>
</div>

<?php include 'incs/footer.php'; ?>