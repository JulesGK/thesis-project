<!--filnamn: Projekt - Resume Generator
#Skrivet av: Gaylord Kaya
#Skapat datum: 2022-06-20
#Senast ändrat: 2022-08-23
#Kurs: Webbprogrammering DT058G
#Handledare: Mikael Hasselmalm
#Beskrivning: CvGenerator är ett verktyg för att snabbt skapa ett CV utifrån vad användare matar in.

-->

<?php 
$page_title = "Home";
include_once 'includes/header.php';
?>

<section class="main-hero">
    <div class="main-hero-container container">
      <h3 class="main-hero-heading">Create your professional Resume with us</h3>
      <h6 class="main-hero-sub-heading">Create your very own professional Resume and download it within 15 minutes.</h6>
      <a href="create.php" class="main-hero-cta-btn btn-primary">Create your Resume</a>
    </div>
</section>

<?php 
include_once 'includes/footer.php'; 
?>