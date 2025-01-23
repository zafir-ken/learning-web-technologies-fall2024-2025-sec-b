
console.log("working");

// Attach an event listener to the form to prevent the default submission
document.getElementById("comment_form").addEventListener("submit", validate_comment);

function validate_comment(event){
  
  // Prevent the form from submitting and refreshing the page
  event.preventDefault();

    var returnval = true;

    //perform validation and if validation fails, set the value of returnval to false
    var com = document.getElementById('comment_text').value.trim();
    var post_id=document.getElementById('post_id').value.trim();

   
    if( !com ) {
      alert('comment field can not be empty');
      returnval = false;
    }

    if( returnval == false ) {
      return ;
    }

    const form = document.getElementById('comment_form');

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
    xhr.open('POST', 'timeline.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send(JSON.stringify(data));

      // Handle the response
    xhr.onload = function(){
      if ( this.readyState==4 && xhr.status == 200) {
        const response = JSON.parse(xhr.responseText);
        const responseElement = document.getElementById('nam');
        document.getElementById('nam').innerText = response.name;
        document.getElementById('com').innerText = response.comment;
        document.getElementById('somoy').innerText =response.time;

        
        

        
        
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