function toggleBoxVisibility() {
    if (document.getElementById("diplomacheck").checked == true) {
        document.getElementById("deploma").style.visibility = "visible";
        } 
    else {
        document.getElementById("deploma").style.visibility = "hidden";
        }
    if (document.getElementById("btechcheck").checked == true) {
        document.getElementById("btech").style.visibility = "visible";
        } 
    else {
        document.getElementById("btech").style.visibility = "hidden";
        }
    if (document.getElementById("mtechcheck").checked == true) {
        document.getElementById("mtech").style.visibility = "visible";
        } 
    else {
        document.getElementById("mtech").style.visibility = "hidden";
        }
    if (document.getElementById("phdcheck").checked == true) {
        document.getElementById("phd").style.visibility = "visible";
        } 
    else {
        document.getElementById("phd").style.visibility = "hidden";
        }
    }
    const el = document.getElementById('type');
    el.addEventListener('change', function handleChange(event)  {
        const penbox = document.getElementsByClassName('pnumber')[0];
        const empbox = document.getElementsByClassName('empnumber')[0];
        if (event.target.value === 'regular') {
            penbox.style.visibility = 'visible';
            empbox.style.visibility = 'hidden';
        } else {
            empbox.style.visibility = 'visible';
            penbox.style.visibility = 'hidden';
        }
    });
    function validateSize(input) {
        const fileSize = input.files[0].size / 1024 / 1024; // in MiB
        if (fileSize > 2) {
          alert('File size exceeds 2 MB');
          // $(file).val(''); //for clearing with Jquery
        } else {
          // Proceed further
        }
      }

