<form class="experiences-form d-none" method="POST" data-changed-step-selector=".ready-to-download-form" data-changed-step-heading="Ready To Download" onsubmit="experiencesSubmitHandler(event)">
  <div class="form-group">
    <h5 class="work-experience-list-heading">Work experience</h5>
    <ul class="work-experience-list-hidden d-none">
      <li class="work-experience-list-item">
        <span class="work-experience-list-item-delete-icon" onclick="deleteExperienceItemHandler(event)">❌</span>
        <div class="form-group">
          <label>Job Title</label>
          <input type="text" class="work-experience-job-title-inp">
        </div>
        <div class="form-group">
          <label>City/Town</label>
          <input type="text" class="work-experience-city-inp">
        </div>
        <div class="form-group">
          <label>Employer</label>
          <input type="text" class="work-experience-employer-inp">
        </div>
        <div class="form-group">
          <label>Start Date</label>
          <input type="date" class="work-experience-start-date-inp">
        </div>
        <div class="form-group">
          <label>End Date</label>
          <input type="date" class="work-experience-end-date-inp">
        </div>
        <div class="form-group">
          <label>Description</label>
          <textarea class="work-experience-desc-inp"></textarea>
        </div>
      </li>
    </ul>
    <ul class="work-experience-list">
      <!-- ...  -->
    </ul>
    <button type="button" class="add-another-work-experience-btn btn-primary" onclick="addAnotherExperienceItemHandler(event)">➕ Add a work experience</button>
  </div>
  <div class="form-group">
    <h5 class="edu-qualifications-list-heading">Education and Qualifications</h5>
    <ul class="edu-qualifications-list-hidden d-none">
      <li class="edu-qualifications-list-item">
        <span class="edu-qualifications-list-item-delete-icon" onclick="deleteExperienceItemHandler(event)">❌</span>
        <div class="form-group">
          <label>Degree</label>
          <input type="text" class="edu-qualifications-degree-inp">
        </div>
        <div class="form-group">
          <label>City/Town</label>
          <input type="text" class="edu-qualifications-city-inp">
        </div>
        <div class="form-group">
          <label>School</label>
          <input type="text" class="edu-qualifications-school-inp">
        </div>
        <div class="form-group">
          <label>Start Date</label>
          <input type="date" class="edu-qualifications-start-date-inp">
        </div>
        <div class="form-group">
          <label>End Date</label>
          <input type="date" class="edu-qualifications-end-date-inp">
        </div>
        <div class="form-group">
          <label>Description</label>
          <textarea class="edu-qualifications-desc-inp"></textarea>
        </div>
      </li>
    </ul>
    <ul class="edu-qualifications-list">
      <!-- ...  -->
    </ul>
    <button type="button" class="add-another-edu-qualifications-btn btn-primary" onclick="addAnotherExperienceItemHandler(event)">➕ Add an  education</button>
  </div>
  <div class="form-group">
    <h5 class="skills-list-heading">Skills</h5>
    <ul class="skills-list-hidden d-none">
      <li class="skills-list-item">
        <span class="skills-list-item-delete-icon" onclick="deleteExperienceItemHandler(event)">❌</span>
        <div class="form-group">
          <label>Skill</label>
          <input type="text" class="skills-title-inp">
        </div>
        <div class="form-group">
          <label>Level</label>
          <select class="skills-level-inp">
            <option value="">Select level</option>
            <option value="5">Expert</option>
            <option value="4">Experienced</option>
            <option value="3">Skillful</option>
            <option value="2">Intermediate</option>
            <option value="1">Beginner</option>
          </select>
        </div>
      </li>
    </ul>
    <ul class="skills-list">
      <!-- ...  -->
    </ul>
    <button type="button" class="add-another-skill-btn btn-primary" onclick="addAnotherExperienceItemHandler(event)">➕ Add a skill</button>
  </div>
  <div class="experiences-main-btn-wrapper">
    <button type="button" class="experiences-prev-step-btn btn-warning" data-changed-step-selector=".personal-details-form" data-changed-step-heading="Personal Details" onclick="goToChangedStepHandler(event)">⬅️ Prev Step</button>
    <button type="submit" class="experiences-next-step-btn btn-primary">Next Step ➡️</button>
  </div>
</form>