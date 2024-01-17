<?php 
$page_title = "Create Resume";
include_once 'includes/header.php';
?>

<section class="create-resume-section">
    <div class="create-resume-container container">
        <h3 class="create-resume-step-heading">Personal Details</h3>
        <?php include_once 'views/personal-details-form.php'; ?>
        <?php include_once 'views/experiences-form.php'; ?>
        <?php include_once 'views/ready-to-download-form.php'; ?>
    </div>
</section>


<?php 
include_once 'includes/footer.php'; 
?>