function showAlert($message,$color){
   let alert = document.getElementById('alert');
   let myalert = document.createElement('p');
   myalert.innerHTML = $message;
   let color 
   switch($color){
        case "green":
            color = "green-alert";
            break;
        case "red":
            color = "red-alert";
            break;
        case "yellow":
            color = "yellow-alert";
            break;

   };
   alert.classList.add(color);

   alert.appendChild(myalert);
//    console.log("append added");
   setTimeout(function() {
        // console.log("test");
        alert.innerHTML = "";
        alert.classList.remove(color);
  }, 10000);

};