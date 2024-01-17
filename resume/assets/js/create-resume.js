const goToChangedStepHandler = (e) => {
    // get selector of which section to go as well as the heading of that section
    const dataChangedStepSelector = e.target.getAttribute('data-changed-step-selector')
    const dataChangedStepHeading = e.target.getAttribute('data-changed-step-heading')
  
    // place the heading for the active step
    const createResumeStepHeading = document.querySelector('.create-resume-step-heading')
    createResumeStepHeading.innerText = dataChangedStepHeading
  
    // make all of the three forms hidden
    const createResumeStepForms = document.querySelectorAll('form')
    const createResumeTargettedForm = document.querySelector(dataChangedStepSelector)
    createResumeStepForms.forEach((createResumeStepForm => createResumeStepForm.classList.add('d-none')))
    // later, showing the active form only
    createResumeTargettedForm.classList.remove('d-none')
  }
  
  const togglePersonalAdditionalsWrapper = (e) => {
    // toogle additional personal details section
    const personalDetailsAdditionalWrapper = document.querySelector('.personal-details-additionals-wrapper')
    personalDetailsAdditionalWrapper.classList.toggle('d-none')
    // change text based on additional personal details section
    if(personalDetailsAdditionalWrapper.classList.contains('d-none')) {
      e.target.innerText = '➕ Additional Information'
    } else {
      e.target.innerText = '➖ Additional Information'
    }
  }
  
  const changePersonalDetailsImgPreviewHandler = (e) => {
    // showing the upload image preview
    const personalDetailsImgPreview = document.querySelector('.personal-details-img-preview')
  
    const [file] = e.target.files
    if (file) {
      personalDetailsImgPreview.src = URL.createObjectURL(file)
    }
  }
  
  const addAnotherExperienceItemHandler = (e) => {
    // get the list where the experience item should go
    const list = e.target.previousElementSibling
    // get the item to clone and cloning it
    const itemToClone = list.previousElementSibling.querySelector('li')
    const itemCloned = itemToClone.cloneNode(true)
    // appending the cloned item to the list
    list.appendChild(itemCloned)
  }
  
  // delete the clicked experience item
  const deleteExperienceItemHandler = (e) => {
    const item = e.target.closest('li')
    item.remove()
  }
  
  const personalDetailsSubmitHandler = (e) => {
    e.preventDefault()
    goToChangedStepHandler(e)
  }
  
  // returns false if at least one input box inside a div  has a value
  const isEmptyItem = (ele) => {
    const allInputs = [...ele.querySelectorAll('input, select, textarea')]
    return allInputs.every((eachInput) => {
      return eachInput.value.trim() == ''
    })
  }
  
  // function to produce stars into preview 
  const renderStars = (cnt) => {
    let starts = ''
    for(let i = 0; i < cnt; i++) starts += '⭐'
    return starts
  }
  
  const renderResumePreviewHandler = (e) => {
    // get all the personal details
    const imgUrl = document.querySelector('.personal-details-img-preview').src != '' ? document.querySelector('.personal-details-img-preview').src : '' 
    const firstName = document.querySelector('.personal-details-first-name-inp').value != '' ? document.querySelector('.personal-details-first-name-inp').value : ''
    const lastName = document.querySelector('.personal-details-last-name-inp').value != '' ? document.querySelector('.personal-details-last-name-inp').value : ''
    const email = document.querySelector('.personal-details-email-inp').value != '' ? document.querySelector('.personal-details-email-inp').value : ''
    const phone = document.querySelector('.personal-details-phone-inp').value != '' ? document.querySelector('.personal-details-phone-inp').value : ''
    const address = document.querySelector('.personal-details-address-inp').value != '' ? document.querySelector('.personal-details-address-inp').value : ''
    const zipCode = document.querySelector('.personal-details-zip-code-inp').value != '' ? document.querySelector('.personal-details-zip-code-inp').value : ''
    const city = document.querySelector('.personal-details-city-inp').value != '' ? document.querySelector('.personal-details-city-inp').value : ''
    const dateOfBirth = document.querySelector('.personal-details-dob-inp').value != '' ? document.querySelector('.personal-details-dob-inp').value : ''
    const placeOfBirth = document.querySelector('.personal-details-pob-inp').value != '' ? document.querySelector('.personal-details-pob-inp').value : ''
    const drivingLicense = document.querySelector('.personal-details-driving-license-inp').value != '' ? document.querySelector('.personal-details-driving-license-inp').value : ''
    const gender = document.querySelector('.personal-details-gender-dd').value != '' ? document.querySelector('.personal-details-gender-dd').value : 'Male'
    const nationality = document.querySelector('.personal-details-nationality-inp').value != '' ? document.querySelector('.personal-details-nationality-inp').value : ''
    const maritalStatus = document.querySelector('.personal-details-marital-status-inp').value != '' ? document.querySelector('.personal-details-marital-status-inp').value : ''
    const linkedIn = document.querySelector('.personal-details-linkedin-inp').value != '' ? document.querySelector('.personal-details-linkedin-inp').value : ''
    const website = document.querySelector('.personal-details-website-inp').value != '' ? document.querySelector('.personal-details-website-inp').value : ''
  
    // fill resume preview header section
    const resumePreviewHeaderImg = document.querySelector('.resume-preview-header-img')
    const resumePreviewFullNameH3 = document.querySelector('.resume-preview-full-name')
    const resumePreviewPersonalInfoList = document.querySelector('.resume-preview-personal-info-list')
    resumePreviewPersonalInfoList.innerHTML = ''
  
    resumePreviewHeaderImg.src = imgUrl
    resumePreviewFullNameH3.innerText = `${firstName} ${lastName}`
  
    // fill full name
    if(firstName != '' && lastName != '') {
      resumePreviewPersonalInfoList.innerHTML += `<li class="resume-preview-personal-info-item">
        <h6>Name</h6>
        <span>${firstName} ${lastName}</span>
      </li>`
    }
    // fill address
    if(address != '') {
      resumePreviewPersonalInfoList.innerHTML += `<li class="resume-preview-personal-info-item">
        <h6>Address</h6>
        <span>${address}</span> <br/>
        <span>${zipCode} ${city}</span>
      </li>`
    }
    // fill phone number
    if(phone != '') {
      resumePreviewPersonalInfoList.innerHTML += `<li class="resume-preview-personal-info-item">
        <h6>Phone number</h6>
        <span>${phone}</span>
      </li>`
    }
    // fill email
    if(email != '') {
      resumePreviewPersonalInfoList.innerHTML += `<li class="resume-preview-personal-info-item">
        <h6>Email</h6>
        <span>${email}</span>
      </li>`
    }
    // fill date of birth
    if(dateOfBirth != '') {
      resumePreviewPersonalInfoList.innerHTML += `<li class="resume-preview-personal-info-item">
        <h6>Date of Birth</h6>
        <span>${dateOfBirth}</span>
      </li>`
    }
    // fill place of birth
    if(placeOfBirth != '') {
      resumePreviewPersonalInfoList.innerHTML += `<li class="resume-preview-personal-info-item">
        <h6>Place of Birth</h6>
        <span>${placeOfBirth}</span>
      </li>`
    }
    // fill gender
    if(gender != '') {
      resumePreviewPersonalInfoList.innerHTML += `<li class="resume-preview-personal-info-item">
        <h6>Gender</h6>
        <span>${gender}</span>
      </li>`
    }
    // fill nationality
    if(nationality != '') {
      resumePreviewPersonalInfoList.innerHTML += `<li class="resume-preview-personal-info-item">
        <h6>Nationality</h6>
        <span>${nationality}</span>
      </li>`
    }
    // fill marital status
    if(maritalStatus != '') {
      resumePreviewPersonalInfoList.innerHTML += `<li class="resume-preview-personal-info-item">
        <h6>Marital Status</h6>
        <span>${maritalStatus}</span>
      </li>`
    }
      // fill driving license if there is any
    if(drivingLicense != '') {
      resumePreviewPersonalInfoList.innerHTML += `<li class="resume-preview-personal-info-item">
        <h6>Driving License</h6>
        <span>${drivingLicense}</span>
      </li>`
    }
    // fill website if exists
    if(website != '') {
      resumePreviewPersonalInfoList.innerHTML += `<li class="resume-preview-personal-info-item">
        <h6>Website</h6>
        <span>${website}</span>
      </li>`
    }
    // fill linkedin if exists
    if(linkedIn != '') {
      resumePreviewPersonalInfoList.innerHTML += `<li class="resume-preview-personal-info-item">
        <h6>LinkedIn</h6>
        <span>${linkedIn}</span>
      </li>`
    }
    // make right side of the preview empty
    resumePreviewMainRightWrapper = document.querySelector('.resume-preview-main-right')
    resumePreviewMainRightWrapper.innerHTML = ''
    
    // provide work experience
    workExperienceList = document.querySelector('.work-experience-list')
    let html = ''
    if(!isEmptyItem(workExperienceList)) {
      workExperienceList.querySelectorAll('li').forEach((workExperienceListItem) => {
        if(isEmptyItem(workExperienceListItem)) return
        html += `<li class="work-experience-preview-item">
          <div class="work-experience-preview-item-left">
            <h6 class="work-experience-preview-item-job-title">${workExperienceListItem.querySelector('.work-experience-job-title-inp').value}</h6>
            <span class="work-experience-preview-item-employer-city">${workExperienceListItem.querySelector('.work-experience-employer-inp').value}, ${workExperienceListItem.querySelector('.work-experience-city-inp').value}</span>
            <p class="work-experience-preview-item-desc">${workExperienceListItem.querySelector('.work-experience-desc-inp').value}</p>
          </div>
          <div class="work-experience-preview-item-left">
            <span class="work-experience-preview-item-duration">${workExperienceListItem.querySelector('.work-experience-start-date-inp').value} - ${workExperienceListItem.querySelector('.work-experience-end-date-inp').value}</span>
          </div>
        </li>`
      })
      
      resumePreviewMainRightWrapper.innerHTML += `<div class="resume-preview-work-experience-wrapper">
        <h5 class="resume-preview-work-experience-heading">WORK EXPERIENCE</h5>
        <ul class="resume-preview-work-experience-list">${html}</ul>
      </div>`
    }
    
    // provide educational qualifications
    eduQualificationsList = document.querySelector('.edu-qualifications-list')
    html = ''
    if(!isEmptyItem(eduQualificationsList)) {
      eduQualificationsList.querySelectorAll('li').forEach((eduQualificationsListItem) => {
        if(isEmptyItem(eduQualificationsListItem)) return
        html += `<li class="edu-qualifications-preview-item">
          <div class="edu-qualifications-preview-item-left">
            <h6 class="edu-qualifications-preview-item-degree">${eduQualificationsListItem.querySelector('.edu-qualifications-degree-inp').value}</h6>
            <span class="edu-qualifications-preview-item-school-city">${eduQualificationsListItem.querySelector('.edu-qualifications-school-inp').value}, ${eduQualificationsListItem.querySelector('.edu-qualifications-city-inp').value}</span>
            <p class="edu-qualifications-preview-item-desc">${eduQualificationsListItem.querySelector('.edu-qualifications-desc-inp').value}</p>
          </div>
          <div class="edu-qualifications-preview-item-left">
            <span class="edu-qualifications-preview-item-duration">${eduQualificationsListItem.querySelector('.edu-qualifications-start-date-inp').value} - ${eduQualificationsListItem.querySelector('.edu-qualifications-end-date-inp').value}</span>
          </div>
        </li>`
      })
  
      resumePreviewMainRightWrapper.innerHTML += `<div class="resume-preview-edu-qualifications-wrapper">
        <h5 class="resume-preview-edu-qualifications-heading">EDUCATION AND QUALIFICATIONS</h5>
        <ul class="resume-preview-edu-qualifications-list">${html}</ul>
      </div>`
    }
  
    // provide skills
    skillsList = document.querySelector('.skills-list')
    html = ''
    if(!isEmptyItem(skillsList)) {
      skillsList.querySelectorAll('li').forEach((skillsListItem) => {
        if(isEmptyItem(skillsListItem)) return
        html += `<li class="skills-preview-item">
          <span class="skills-preview-item-title">${skillsListItem.querySelector('.skills-title-inp').value}</span>
          <span class="edu-qualifications-preview-item-duration">${renderStars(skillsListItem.querySelector('.skills-level-inp').value)}</span>
        </li>`
      })
  
      resumePreviewMainRightWrapper.innerHTML += `<div class="resume-preview-skills-wrapper">
        <h5 class="resume-preview-skills-heading">SKILLS</h5>
        <ul class="resume-preview-skills-list">${html}</ul>
      </div>`
    }
  }
  
  const experiencesSubmitHandler = (e) => {
    e.preventDefault()
    goToChangedStepHandler(e)
    renderResumePreviewHandler(e);
  }
  
  const downloadResumeInPDFHandler = (e) => {
    // // need to hide and change some styling of a few elements before printing
    document.querySelector('.main-header').remove()
    document.querySelector('.create-resume-step-heading').remove()
    document.querySelector('.download-now-btn-wrapper').remove()
    document.querySelector('.ready-to-download-main-btn-wrapper').remove()
    document.querySelector('.create-resume-container').classList.remove('d-none')
    document.querySelector('.create-resume-section').style.marginTop = 'initial'
    document.querySelector('.resume-preview-wrapper').style.width = '100%'
    document.querySelector('.ready-to-download-form').style.borderRadius = 'none'
    document.querySelector('.ready-to-download-form').style.boxShadow = 'none'
    document.querySelector('.ready-to-download-form').style.borderRadius = 'none'
    document.querySelector('.ready-to-download-form').style.padding = '0'
    document.querySelector('.main-footer').remove()
  
    // print the resume and reload
    window.print()
    location.reload()
}