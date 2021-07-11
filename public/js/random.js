// function  to create the random string 
var genratePassword = function(length) {

    var genratedPassword = "";
  
    var ALLOWED_CHARACTER_SETS = [
      [true, "Numbers", "0123456789"],
      [true, "Lowercase", "abcdefghijklmnopqrstuvwxyz"],
      [false, "Uppercase", "ABCDEFGHIJKLMNOPQRSTUVWXYZ"],
      [false, "ASCII symbols", "!\"#$%" + String.fromCharCode(38) + "'()*+,-./:;" + String.fromCharCode(60) + "=>?@[\\]^_`{|}~"],
      [false, "Space", " "],
    ];
  
    for(i=0; i<length; i++) {
      var rand_ACS = ALLOWED_CHARACTER_SETS[Math.floor(Math.random() * 3) + 1][2];
      genratedPassword += rand_ACS.charAt(Math.floor(Math.random() * rand_ACS.length));
    }
  
    a = genratedPassword;
    return a;
  }
  
  var onClick = function () {
    var password = genratePassword(20);
    
    document.getElementById('passwordOutput').value = password;
  }
   