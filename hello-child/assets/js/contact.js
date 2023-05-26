emailImg = document.getElementById('email_picto');
phoneImg = document.getElementById('phone_picto');

if (window.innerWidth > 767) {

    createContactElement(emailImg, phoneImg);
    let phonePicto = document.querySelector("#phone .picto-contact");
    let phoneNumber = document.getElementById("phone_number");
    let emailPicto = document.querySelector("#email .picto-contact");
    let emailNumber = document.getElementById("email_adress");

    phonePicto.addEventListener("click", () => {
        if (phoneNumber.style.display === "flex") {
            phoneNumber.style.display = "none";
        } else {
            phoneNumber.style.display = "flex";
        }
    })

    emailPicto.addEventListener("click", () => {
        if (emailNumber.style.display === "flex") {
            emailNumber.style.display = "none";
        } else {
            emailNumber.style.display = "flex";
        }
    })
}else{
    createContactElementForMobile(emailImg, phoneImg);
}

function createContactElementForMobile(emailImg, phoneImg) {
    createPhoneElementforMobile(phoneImg);
    createEmailElementforMobile(emailImg);
}


function createPhoneElementforMobile(phoneImg) {
    const phoneDiv = document.getElementById("phone");
    let phoneLink = document.getElementById("number");
    phoneLink.innerHTML = '';
    phoneLink.appendChild(phoneImg);
    // Create div.picto-contact element and create img
    const phonePictoDiv = document.createElement("div");
    phonePictoDiv.className = "picto-contact";

    phonePictoDiv.appendChild(phoneLink);

    // Add div.picto-contact and  div#phone_number at div#phone
    phoneDiv.appendChild(phonePictoDiv);
}

function createEmailElementforMobile(emailImg) {
    const emailDiv = document.getElementById("email");
    let emailAdress = document.getElementById("adress");
    emailAdress.innerHTML = '';
    emailAdress.appendChild(emailImg);
    const emailPictoDiv = document.createElement("div");
    emailPictoDiv.className = "picto-contact";

    emailPictoDiv.appendChild(emailAdress);

    emailDiv.appendChild(emailPictoDiv);
}

function createContactElement(emailImg, phoneImg) {
    createPhoneElement(phoneImg);
    createEmailElement(emailImg);
}

function createPhoneElement(phoneImg) {
    // Catch div#phone
    const phoneDiv = document.getElementById("phone");
    let phoneLink = document.getElementById("number");


    // Create div#phone_number element
    const phoneNumberDiv = document.createElement("div");
    phoneNumberDiv.id = "phone_number";
    phoneNumberDiv.appendChild(phoneLink);

    const phonePictoDiv = document.createElement("div");
    phonePictoDiv.className = "picto-contact";

    phonePictoDiv.appendChild(phoneImg);

    // Add div.picto-contact and  div#phone_number at div#phone
    phoneDiv.appendChild(phonePictoDiv);
    phoneDiv.appendChild(phoneNumberDiv);
    //phoneDiv.appendChild(phoneNumberDiv);
}

function createEmailElement(emailImg) {
    // Catch div#email
    const emailDiv = document.getElementById("email");
    let emailAdress = document.getElementById("adress");

    // Create div#email_adress element
    const emailAdressDiv = document.createElement("div");
    emailAdressDiv.id = "email_adress";
    emailAdressDiv.appendChild(emailAdress);

    // Create div.picto-contact and img
    const emailPictoDiv = document.createElement("div");
    emailPictoDiv.className = "picto-contact";

    emailPictoDiv.appendChild(emailImg);

    // Add div.picto-contact and div#email_adress at div#email
    emailDiv.appendChild(emailPictoDiv);
    emailDiv.appendChild(emailAdressDiv);
}





















































/* function createContactElementForMobile(emailImg, phoneImg) {
    createPhoneElementforMobile(phoneImg);
    createEmailElementforMobile(emailImg);
}


function createPhoneElementforMobile(phoneImg) {
    // Catch div#phone
    const phoneDiv = document.getElementById("phone");

    // Create div.picto-contact 
    const phonePictoDiv = document.createElement("div");
    phonePictoDiv.className = "picto-contact";

    phonePictoDiv.appendChild(phoneImg);
    phoneDiv.appendChild(phonePictoDiv);
}

function createEmailElementforMobile(emailImg) {
    // Catch div#email
    const emailDiv = document.getElementById("email");

    // Create div.picto-contact 
    const emailPictoDiv = document.createElement("div");
    emailPictoDiv.className = "picto-contact";

    // Create div#email_adress and link email
    const emailLink = document.createElement("a");
    emailLink.href = "mailto:" + "<?php the_field('contact-email'); ?>";

    // Add div.picto-contact and div#email_adress at div#email
    emailLink.appendChild(emailImg);
    emailPictoDiv.appendChild(emailLink)
    emailDiv.appendChild(emailPictoDiv);
}
 */


/* if (window.innerWidth > 767) {
    createContactElement(emailImg, phoneImg);

    let phonePicto = document.querySelector("#phone .picto-contact")
    let phoneNumber = document.getElementById("phone_number")
    let emailPicto = document.querySelector("#email .picto-contact")
    let emailNumber = document.getElementById("email_adress")
    //const isMobile = innerWidth < 768;


    phonePicto.addEventListener("click", () => {
        if (phoneNumber.style.display === "flex") {
            phoneNumber.style.display = "none";
        } else {
            phoneNumber.style.display = "flex";
        }
    })

    emailPicto.addEventListener("click", () => {
        if (emailNumber.style.display === "flex") {
            emailNumber.style.display = "none";
        } else {
            emailNumber.style.display = "flex";
        }
    })
}else {
    createContactElementForMobile(emailImg, phoneImg);
} */



/* emailAlt = "Pictogramme d'une lettre avec un @ représentant un email";
phoneAlt = "Pictogramme d'un téléphone";

emailImg = document.getElementById('email_picto');
emailImg.alt = emailAlt;
phoneImg = document.getElementById('phone_picto');
phoneImg.alt = phoneAlt;






if (window.innerWidth > 767) {
    createContactElement(emailImg, phoneImg);

    let phonePicto = document.querySelector("#phone .picto-contact")
    let phoneNumber = document.getElementById("phone_number")
    let emailPicto = document.querySelector("#email .picto-contact")
    let emailNumber = document.getElementById("email_adress")
    //const isMobile = innerWidth < 768;


    phonePicto.addEventListener("click", () => {
        if (phoneNumber.style.display === "flex") {
            phoneNumber.style.display = "none";
        } else {
            phoneNumber.style.display = "flex";
        }
    })

    emailPicto.addEventListener("click", () => {
        if (emailNumber.style.display === "flex") {
            emailNumber.style.display = "none";
        } else {
            emailNumber.style.display = "flex";
        }
    })
} else {
    createContactElementForMobile(emailImg, phoneImg);
}


function createContactElementForMobile(emailImg, phoneImg) {
    createPhoneElementforMobile(phoneImg);
    createEmailElementforMobile(emailImg);
}

function createContactElement(emailImg, phoneImg) {
    createPhoneElement(phoneImg);
    createEmailElement(emailImg);
}

function createPhoneElement(phoneImg) {
    // Catch div#phone
    const phoneDiv = document.getElementById("phone");

    // Create div.picto-contact element and create img
    const phonePictoDiv = document.createElement("div");
    phonePictoDiv.className = "picto-contact";

    phonePictoDiv.appendChild(phoneImg);

    /* // Create div#phone_number element and create the number
    const phoneNumberDiv = document.createElement("div");
    phoneNumberDiv.id = "phone_number";
    const phoneLink = document.createElement("a");
    phoneLink.href = "tel:" + contact_data.phone;
    phoneLink.textContent = contact_data.phone;
    phoneNumberDiv.appendChild(phoneLink); 

    // Add div.picto-contact and  div#phone_number at div#phone
    phoneDiv.appendChild(phonePictoDiv);
    phoneDiv.appendChild(phoneNumberDiv);
}

function createEmailElement(emailImg) {
    // Catch div#email
    const emailDiv = document.getElementById("email");

    // Create div.picto-contact and img
    const emailPictoDiv = document.createElement("div");
    emailPictoDiv.className = "picto-contact";

    emailPictoDiv.appendChild(emailImg);

/*     // Create div#email_adress and link email
    const emailAdressDiv = document.createElement("div");
    emailAdressDiv.id = "email_adress";
    const emailLink = document.createElement("a");
    emailLink.href = "mailto:" + contact_data.email;
    emailLink.textContent = contact_data.email;
    emailAdressDiv.appendChild(emailLink); 

    // Add div.picto-contact and div#email_adress at div#email
    emailDiv.appendChild(emailPictoDiv);
    emailDiv.appendChild(emailAdressDiv);
}

function createPhoneElementforMobile(phoneImg) {
    // Catch div#phone
    const phoneDiv = document.getElementById("phone");

    // Create div.picto-contact 
    const phonePictoDiv = document.createElement("div");
    phonePictoDiv.className = "picto-contact";

    //Create Link
    const phoneLink = document.createElement("a");
    phoneLink.href = "tel:" + "<?php the_field('contact-phone'); ?>";

    //Add
    phoneLink.appendChild(phoneImg);
    phonePictoDiv.appendChild(phoneLink)
    phoneDiv.appendChild(phonePictoDiv);
}

function createEmailElementforMobile(emailImg) {
    // Catch div#email
    const emailDiv = document.getElementById("email");

    // Create div.picto-contact 
    const emailPictoDiv = document.createElement("div");
    emailPictoDiv.className = "picto-contact";

    // Create div#email_adress and link email
    const emailLink = document.createElement("a");
    emailLink.href = "mailto:" + "<?php the_field('contact-email'); ?>";

    // Add div.picto-contact and div#email_adress at div#email
    emailLink.appendChild(emailImg);
    emailPictoDiv.appendChild(emailLink)
    emailDiv.appendChild(emailPictoDiv);
} */
