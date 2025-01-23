
console.log("working");

// Attach an event listener to the form to prevent the default submission
document.getElementById("about_form").addEventListener("submit", validate_about_form);

function validate_about_form(event){
  
  // Prevent the form from submitting and refreshing the page
  event.preventDefault();

    var returnval = true;
    

    //perform validation and if validation fails, set the value of returnval to false
    var dob = document.getElementById('dob').value.trim();
    var city = document.getElementById('city').value.trim();
    var bio = document.getElementById('bio').value.trim();
    var address = document.getElementById('address').value.trim();
    var relationship = document.getElementById('relationship').value.trim();
    var country = document.getElementById('country').value.trim();
    var edu = document.getElementById('edu').value.trim();

    if( !dob || !city || !bio || !address || !relationship || !country || !edu ) {
      alert('Please Fill up all the fields!');
      returnval = false;
    }
    

    if( returnval == false ) {
      return ;
    }

    const form = document.getElementById('about_form');

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
    xhr.open('POST', 'about.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send(JSON.stringify(data));

      // Handle the response
    xhr.onload = function(){
      if ( this.readyState==4 && xhr.status == 200) {
        const response = JSON.parse(xhr.responseText);
        const responseElement = document.getElementById('response');

        if(response.status === 'success') {
          responseElement.style.color = 'green';
        }
        else {
          responseElement.style.color = 'red';
        }

        document.getElementById('response').innerText = response.message;
        
        
      } 
      else {
          console.error('Request Error:', {
            status: this.status,
            statusText: this.statusText,
            responseText: this.responseText
        });
        document.getElementById('response').innerText = `Error occurred! Status: ${this.status}, Status Text: ${this.statusText}`;

        }
      };
}