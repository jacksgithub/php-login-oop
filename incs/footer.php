</main><!-- main container -->
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="assets/js/scripts.js"></script>

<?php if (isset($_SESSION['username']) && $_SESSION['username'] === 'admin') { ?>
  <script src="assets/js/admin.js" referrerpolicy="origin"></script>

  <?php if (basename($_SERVER['PHP_SELF']) === 'profile.php') { ?>
    <script src="../../assets/tinymce/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
          tinymce.init({
            selector: '#mytinymce',
            plugins: 'code'
          });
    </script>
  <?php } ?>
  
<?php } ?>
</body>
</html>
