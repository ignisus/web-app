window.addEventListener("load", () => {
    // (A) GET TEXTAREA + REMAINING COUNTER
    let textarea = document.querySelector("#char-count .area-comentario"),
        remain = document.querySelector("#char-count .char-remain-count");
   
    // (B) INIT REMAINING CHARACTERS
    remain.innerHTML = textarea.maxLength;
   
    // (C) CALCULATE REMAINING CHARACTERS WHILE TYPING
    textarea.addEventListener("keyup", () => {
      remain.innerHTML = textarea.maxLength - textarea.value.length;
    });
  });