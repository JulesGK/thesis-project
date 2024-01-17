<form class="ready-to-download-form d-none" method="POST" onsubmit="readyToDownloadSubmitHandler(event)">
    <div class="download-now-btn-wrapper">
        <button type="button" class="download-now-btn btn-primary" onclick="downloadResumeInPDFHandler(event)">Download Now</button>
    </div>

    <div class="resume-preview-wrapper-outer">
        <div class="resume-preview-wrapper">
            <div class="resume-preview-header">
                <img src="assets/img/no-person.jpg" alt="" class="resume-preview-header-img">
                <h3 class="resume-preview-full-name">Full Name</h3>
            </div>

            <div class="resume-preview-main">
                <div class="resume-preview-main-left">
                    <h5 class="resume-preview-personal-heading">PERSONAL</h5>
                    <ul class="resume-preview-personal-info-list"></ul>
                </div>
            <div class="resume-preview-main-right"></div>
        </div>
    </div>
</div>
<div class="ready-to-download-main-btn-wrapper">
<button type="button" class="ready-to-download-prev-step-btn btn-warning" data-changed-step-selector=".experiences-form" data-changed-step-heading="Experiences" onclick="goToChangedStepHandler(event)">⬅️ Prev Step</button>
</div>
</form>