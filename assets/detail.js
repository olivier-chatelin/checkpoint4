const inputHeader = document.getElementById('detail_header');
console.log(inputHeader);
const header = document.getElementById('header');
inputHeader.addEventListener('change',(e)=>{
    header.innerText = e.target.value;
})
const inputAddress = document.getElementById('detail_address');
const address = document.getElementById('address');
inputAddress.addEventListener('change',(e)=>{
    address.innerText = e.target.value;
})
const inputZipCode = document.getElementById('detail_zipCode');
const zipCode = document.getElementById('zipCode');
inputZipCode.addEventListener('change',(e)=>{
    zipCode.innerText = e.target.value;
})
const inputCity = document.getElementById('detail_city');
const city = document.getElementById('city');
inputCity.addEventListener('change',(e)=>{
    city.innerText = e.target.value;
})
const inputTel = document.getElementById('detail_tel');
const tel = document.getElementById('tel');
inputTel.addEventListener('change',(e)=>{
    city.innerText = e.target.value;
})
const inputLinkedin = document.getElementById('detail_linkedin');
const linkedin = document.getElementById('linkedin');
inputLinkedin.addEventListener('change',(e)=>{
    linkedin.innerText = e.target.value;
})
const inputGithub = document.getElementById('detail_github');
const github = document.getElementById('github');
inputGithub.addEventListener('change',(e)=>{
    github.innerText = e.target.value;
})