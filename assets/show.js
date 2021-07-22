const uploads = document.getElementsByClassName('upload');

for (const upload of uploads) {
    upload.addEventListener('click',(e)=>{
        let printContents = document.getElementById('resume' + upload.dataset.resume).innerHTML;
        let originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents
    })
}