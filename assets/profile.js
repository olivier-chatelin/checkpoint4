const inputProfile = document.getElementById('profile_description');
const profile = document.getElementById('profile');
inputProfile.addEventListener('change',(e)=>{
    profile.innerText = e.target.value;
})
