function changeColor() {
    var header = document.querySelector('header');
    var body = document.querySelector('body');
    var signupBtn = document.querySelector('.signup-button');
    
    signupBtn.addEventListener('mouseover', function() {
      header.style.color = 'red';
      body.style.backgroundColor = '#f5f5f5';
    });
    
    signupBtn.addEventListener('mouseout', function() {
      header.style.color = '#333';
      body.style.backgroundColor = '#fff';
    });
  }
  