const dots = document.getElementsByClassName('dot');
for (const dot of dots) {
    dot.addEventListener('click',(e)=>{
        dot.classList.toggle('dot-active');
    })
}