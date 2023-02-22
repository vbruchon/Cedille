console.log(contact_data);
console.log(contact_data.phone);
console.log(contact_data.email);

if (window.innerWidth > 767) {
    createContactElement();

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
    createContactElementForMobile();
}

function createContactElementForMobile() {
    createPhoneElementforMobile();
    createEmailElementforMobile();
}

function createContactElement() {
    createPhoneElement();
    createEmailElement();
}

function createPhoneElement() {
    // Catch div#phone
    const phoneDiv = document.getElementById("phone");

    // Create div.picto-contact element and create img
    const phonePictoDiv = document.createElement("div");
    phonePictoDiv.className = "picto-contact";
    const phoneImg = document.createElement("img");
    phoneImg.src = "http://cedille-formation.ftalps.fr/wp-content/uploads/2023/01/phone.png";
    phoneImg.alt = "Pictogramme d'un téléphone";
    phonePictoDiv.appendChild(phoneImg);

    // Create div#phone_number element and create the number
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

function createEmailElement() {
    // Catch div#email
    const emailDiv = document.getElementById("email");

    // Create div.picto-contact and img
    const emailPictoDiv = document.createElement("div");
    emailPictoDiv.className = "picto-contact";
    const emailImg = document.createElement("img");
    emailImg.src = "http://cedille-formation.ftalps.fr/wp-content/uploads/2023/01/email.png";
    emailImg.alt = "";
    emailPictoDiv.appendChild(emailImg);

    // Create div#email_adress and link email
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

function createPhoneElementforMobile() {
    // Catch div#phone
    const phoneDiv = document.getElementById("phone");

    // Create div.picto-contact 
    const phonePictoDiv = document.createElement("div");
    phonePictoDiv.className = "picto-contact";

    //Create Link
    const phoneLink = document.createElement("a");
    phoneLink.href = "tel:" + "<?php the_field('contact-phone'); ?>";

    //Create Img
    const phoneImg = document.createElement("img");
    phoneImg.src = "http://cedille-formation.ftalps.fr/wp-content/uploads/2023/01/phone.png";
    phoneImg.alt = "Pictogramme d'un téléphone";

    //Add
    phoneLink.appendChild(phoneImg);
    phonePictoDiv.appendChild(phoneLink)
    phoneDiv.appendChild(phonePictoDiv);
}

function createEmailElementforMobile() {
    // Catch div#email
    const emailDiv = document.getElementById("email");

    // Create div.picto-contact 
    const emailPictoDiv = document.createElement("div");
    emailPictoDiv.className = "picto-contact";

    // Create div#email_adress and link email
    const emailLink = document.createElement("a");
    emailLink.href = "mailto:" + "<?php the_field('contact-email'); ?>";

    //Create  img
    const emailImg = document.createElement("img");
    emailImg.src = "http://cedille-formation.ftalps.fr/wp-content/uploads/2023/01/email.png";
    emailImg.alt = "Pictogramme d'une lettre avec un @";

    // Add div.picto-contact and div#email_adress at div#email
    emailLink.appendChild(emailImg);
    emailPictoDiv.appendChild(emailLink)
    emailDiv.appendChild(emailPictoDiv);
}