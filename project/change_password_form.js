
console.log("working");

// Attach an event listener to the form to prevent the default submission
document.getElementById("change_pass_form").addEventListener("submit", validate_change_pass);

function validate_change_pass(event){
  
  // Prevent the form from submitting and refreshing the page
  event.preventDefault();

    var returnval = true;

    //perform validation and if validation fails, set the value of returnval to false
    
    var current_password = document.getElementById('current_password').value.trim();
    var new_password =document.getElementById('new_password').value.trim();
    var confirm_password =document.getElementById('confirm_password').value.trim();

    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    if(new_password!== confirm_password) {
      alert('password does not match!');
      returnval = false;
    }
    else if (!passwordPattern.test(new_password)) {
        alert('Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.');
        returnval = false;
      }
    

    if( returnval == false ) {
      return ;
    }

    const form = document.getElementById('change_pass_form');

    // Create a FormData object from the form
    const formData = new FormData(form);

      // Convert the FormData to JSON
    const data = {};
    formData.forEach( (value, key) => {
      data[key] = value;
      console.log(key);
      console.log(value);
    });

      // Create a new XMLHttpRequest object
    const xhr = new XMLHttpRequest();

      // Set up the request
    xhr.open('POST', 'settings.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send(JSON.stringify(data));

      // Handle the response
      xhr.onload = function () {
        if (this.readyState == 4 && xhr.status == 200) {
            const response = JSON.parse(xhr.responseText); 
            const responseElement = document.getElementById('response2');
    
            
            if (response.status === 'success') {
                responseElement.style.color = 'green';
            } else {
                responseElement.style.color = 'red';
            }
    
            responseElement.innerText = response.message;
        } else {
            
            console.error('Request Error:', {
                status: this.status,
                statusText: this.statusText,
                responseText: this.responseText
            });
    
           
            document.getElementById('response2').innerText = `Error occurred! Status: ${this.status}, Status Text: ${this.statusText}`;
        }
    };
    
    
    
    
}