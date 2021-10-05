const form = document.querySelector(".signup form");
continueBtn = form.querySelector(".button input");
errorText = form.querySelector(".error-txt");

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing from submitinng 
}

continueBtn.onclick =  ()=>{
    // ajax code 
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/signup.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "success"){
                    location.href="users.php";
                }else{
                    errorText.textContent  = data ; 
                    errorText.style.display = "block";
                }
                // console.log(data);
            }
        }
    }
    // we have to send the form data thoug ajax to php
    let fromData =  new FormData(form); //creating new formData oject 
    xhr.send(fromData); //sending the form to php
}
