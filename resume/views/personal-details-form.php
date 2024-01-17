<form class="personal-details-form" method="POST" data-changed-step-selector=".experiences-form" data-changed-step-heading="Experiences" onsubmit="personalDetailsSubmitHandler(event)">
    <div class="form-group">
        <label for="personal-details-img-inp">Upload Your Image</label>
        <input type="file" accept="image/*" class="personal-details-img-inp" id="personal-details-img-inp" onchange="changePersonalDetailsImgPreviewHandler(event)">
    
        <div class="personal-details-img-preview-wrapper">
            <img src="assets/img/no-person.jpg" alt="" class="personal-details-img-preview">
        </div>
    </div> 

    <div class="form-group">
        <label for="personal-details-first-name-inp">First Name *</label>
        <input type="text" class="personal-details-first-name-inp" id="personal-details-first-name-inp" required>
    </div>

    <div class="form-group">
        <label for="personal-details-last-name-inp">Last Name *</label>
        <input type="text" class="personal-details-last-name-inp" id="personal-details-last-name-inp" required>
    </div>

    <div class="form-group">
        <label for="personal-details-email-inp">Email address *</label>
        <input type="email" class="personal-details-email-inp" id="personal-details-email-inp" required>
    </div>

    <div class="form-group">
        <label for="personal-details-phone-inp">Phone Number</label>
        <input type="tel" class="personal-details-phone-inp" id="personal-details-phone-inp">
    </div>

    <div class="form-group">
        <label for="personal-details-address-inp">Address</label>
        <input type="text" class="personal-details-address-inp" id="personal-details-address-inp">
    </div>

    <div class="form-group">
        <label for="personal-details-zip-code-inp">Zip Code</label>
        <input type="text" class="personal-details-zip-code-inp" id="personal-details-zip-code-inp">
    </div>

    <div class="form-group">
        <label for="personal-details-city-inp">City/Town</label>
        <input type="text" class="personal-details-city-inp" id="personal-details-city-inp">
    </div>

    <div class="personal-details-additionals-wrapper d-none">
        <div class="form-group">
            <label for="personal-details-dob-inp">Date of Birth</label>
            <input type="date" class="personal-details-dob-inp" id="personal-details-dob-inp">
        </div>

        <div class="form-group">
            <label for="personal-details-pob-inp">Place of Birth</label>
            <input type="text" class="personal-details-pob-inp" id="personal-details-pob-inp">
        </div>

        <div class="form-group">
            <label for="personal-details-driving-license-inp">Driving License</label>
            <input type="text" class="personal-details-driving-license-inp" id="personal-details-driving-license-inp">
        </div>

        <div class="form-group">
        <label for="personal-details-gender-dd">Gender</label>
        <select class="personal-details-gender-dd" id="personal-details-gender-dd">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>
        </div>

        <div class="form-group">
            <label for="personal-details-nationality-inp">Nationality</label>
            <input type="text" class="personal-details-nationality-inp" id="personal-details-nationality-inp">
        </div>

        <div class="form-group">
            <label for="personal-details-marital-status-inp">Marital Status</label>
            <input type="text" class="personal-details-marital-status-inp" id="personal-details-marital-status-inp">
        </div>

        <div class="form-group">
            <label for="personal-details-linkedin-inp">LinkedIn</label>
            <input type="text" class="personal-details-linkedin-inp" id="personal-details-linkedin-inp">
        </div>

        <div class="form-group">
            <label for="personal-details-website-inp">Website</label>
            <input type="text" class="personal-details-website-inp" id="personal-details-website-inp">
        </div>
    </div>
    <button type="button" class="personal-details-additionals-toggle-btn btn-primary" onclick="togglePersonalAdditionalsWrapper(event)">➕ Additional Information</button>
  
    <div class="personal-details-main-btn-wrapper">
        <button type="submit" class="personal-details-next-step-btn btn-primary">Next Step ➡️</button>
    </div>
</form>