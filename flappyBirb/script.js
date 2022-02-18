
    

    // Getting reference to the bird element
let bird = document.querySelector('.bird');
    
// Getting bird element properties
let bird_props = bird.getBoundingClientRect();
// Getting reference to the score element
let score_val =
    document.querySelector('.score_val');
let message =
    document.querySelector('.message');
let score_title =
    document.querySelector('.score_title');
    
// Setting initial game state to start
let game_state = 'Start';
    
// Add an eventlistener for key presses
document.addEventListener('keydown', (e) => {
    
  // Start the game if enter key is pressed
  if (e.key == 'Enter' &&
      game_state != 'Play') {
    document.querySelectorAll('.pipe_sprite')
              .forEach((e) => {
      e.remove();
    });
    bird.style.top = '40vh';
    game_state = 'Play';
    message.innerHTML = '';
    score_title.innerHTML = 'Score : ';
    score_val.innerHTML = '0';
    play();
  }
});

 
