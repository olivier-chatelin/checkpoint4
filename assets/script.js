const dots = document.getElementsByClassName('dot');
const inputTheme = document.getElementById('template_theme');
const inputName = document.getElementById('template_name');
const selectProfiles = document.getElementsByClassName('select-profile')
for (const dot of dots) {
    dot.addEventListener('click',(e)=>{
        dot.classList.toggle('dot-active');
        inputTheme.value=dot.dataset.theme;
    })
}
for (const template of selectProfiles) {
    template.addEventListener('click', (e) => {
        inputName.value = template.dataset.template;
    })
}