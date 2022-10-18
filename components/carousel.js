let offset = 0; // смещение от левого края
const buttons = document.querySelectorAll('button');
const sliderLine = document.querySelector('.slider-line');
const firstButton = document.querySelector('.first-slide');
const secondButton = document.querySelector('.second-slide');
const thirdButton = document.querySelector('.third-slide');

document.querySelector('.first-slide').addEventListener('click', function(){
    sliderLine.style.left = 0;
    clearButton()
    buttons[0].style.background = 'rgb(178, 234, 252)';
});

document.querySelector('.second-slide').addEventListener('click', function(){
    sliderLine.style.left = -100 + '%';
    clearButton()
    buttons[1].style.background = 'rgb(178, 234, 252)';
});

document.querySelector('.third-slide').addEventListener('click', function(){
    sliderLine.style.left = -200 + '%';
    clearButton()
    buttons[2].style.background = 'rgb(178, 234, 252)';
});

function clearButton() {
    buttons.forEach(button => {
        button.style.background = 'rgb(53, 71, 87, 0.7)';
    });
}