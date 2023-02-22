let programme = document.getElementById("single_formation_titre");
let content = document.getElementById("single_formation_content");
let satisfaction = document.getElementById("satisfaction");
let element = document.getElementById("slidebar_element");
let bloc_contact = document.getElementById("single_formation_bloc_contact")
let others = document.getElementsByClassName("single_formation_block_title_formation")

//Class css
const block = "single_formation_block";
const blockTitle = "single_formation_block_title"

//InnerWidth viewport
let lengthTablettMin = window.innerWidth >= 768;
let lengthTablettMax = window.innerWidth <= 1100;

let isMobile = window.innerWidth <= 767;
let isTablett = lengthTablettMin & lengthTablettMax;
let isDesktop = window.innerWidth > 1101;

function createSatifactionElementForMobile() {
    const img = document.querySelector("#satisfaction img")
    const p = document.querySelector("#satisfaction p")
    const newDiv = document.createElement("div")
    const newDiv2 = document.createElement("div")
    const newH2 = document.createElement("h2")

    newDiv.classList.add(block)
    newDiv2.classList.add(blockTitle)
    newH2.innerText = "TAUX DE SATISFACTION"

    newDiv2.appendChild(img)
    newDiv2.appendChild(newH2)
    newDiv.appendChild(newDiv2)
    newDiv.appendChild(p)
    satisfaction.appendChild(newDiv)

    //Ajout ou je veux 
    content.insertBefore(satisfaction, others)
}

document.addEventListener('DOMContentLoaded', () => {
    if (isMobile) {
        createSatifactionElementForMobile()
    } else if (isTablett) {
        programme.style.marginTop = 0;
        element.insertBefore(satisfaction, bloc_contact)
    } else if (isDesktop) {
        programme.style.marginTop = 0
        element.insertBefore(satisfaction, bloc_contact)
    }
})