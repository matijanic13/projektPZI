let textTag = document.querySelector('.content h1');
let text = textTag.textContent;

let splittedText = text.split('');

textTag.innerHTML = '';

for (let i = 0; i < splittedText.length; i++) {
    if(splittedText[i] == " "){
        splittedText[i] = "&nbsp;" 
    }

    textTag.innerHTML += `<span>${splittedText[i]}</span>`
}

let k = 0;
let interval = setInterval(() => {
    let spans = textTag.querySelectorAll('span');
    let singleSpan = spans[k];

    singleSpan.className = 'fadeMove';


    k++;
    if(k==spans.length) {
        clearInterval(interval);
    }
}, 80);

let sectionForAnimation = document.querySelector('.images');
let sectionPosition = sectionForAnimation.getBoundingClientRect().top;
let screenPosition = window.innerHeight;

console.log('sectionP: ' + sectionPosition);
console.log('screenP: ' + screenPosition);


let leftImage = document.querySelector('.slideFromLeft');
let rightImage = document.querySelector('.slideFromRight');


leftImage.classList.add('animated');
rightImage.classList.add('animated');



let anto = "anto";
console.log(anto);

