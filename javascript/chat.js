const form = document.querySelector(".typing-area"),
inputField = document.querySelector(".input-field"),
sendBtn = document.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing from submitinng 
}


chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}
chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}
sendBtn.onclick = ()=>{
     // ajax code 
     let xhr = new XMLHttpRequest();
     xhr.open("POST", "php/insert-chat.php", true);
     xhr.onload = ()=>{
         if(xhr.readyState === XMLHttpRequest.DONE){
             if(xhr.status === 200){
                 inputField.value =  "";
                 scrollToBottom();
             }
         }
    }
    let fromData =  new FormData(form); //creating new formData oject 
    xhr.send(fromData); //sending the form to php
}

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                chatBox.innerHTML = data;
                if(!chatBox.classList.contains("active")){
                    scrollToBottom();
                }
            }
        }
    }
    let fromData =  new FormData(form); //creating new formData oject 
    xhr.send(fromData); //sending the form to php
}, 500);

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}