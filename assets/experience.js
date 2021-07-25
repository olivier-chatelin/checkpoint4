//
// const inputProfile = document.getElementById('profile_description');
// const profile = document.getElementById('profile');
// inputProfile.addEventListener('change',(e)=>{
//     profile.innerText = e.target.value;
// })

const experienceContainer = document.getElementById('experience-container');
const form = experienceContainer.dataset.prototype;
const button = document.getElementById('button-add');
let index = 0;
const regex = /__name__/g
button.addEventListener('click',(e)=>{
    e.preventDefault();
    index ++;
    let p = document.createElement('p');
    let newForm = form.replace(regex, 'experience' + index)
    p.innerHTML=newForm;
    experienceContainer.appendChild(p);

})
