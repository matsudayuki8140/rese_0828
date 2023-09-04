const date = document.forms.rese.date;
date.addEventListener('input', () => {
    let inputDate = document.getElementById('date_box');
    inputDate.textContent = date.value
})

const time = document.forms.rese.time;
time.addEventListener('click', () => {
    let inputTime = document.getElementById('time_box');
    inputTime.textContent = time.value
})

const number = document.forms.rese.number;
number.addEventListener('click', () => {
    let inputNumber = document.getElementById('number_box');
    inputNumber.textContent = number.value
})