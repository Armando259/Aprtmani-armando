$(document).ready(function () {
    $("#formValid").validate({
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                minlength: 9
            },
            city: {
                required: true
            },
            message: {
                required: true,
                minlength: 10
            }
        },
        messages: {
            name: {
                required: "Ovo polje je obavezno.",
                minlength: "Ime mora imati barem 2 znaka."
            },
            email: {
                required: "Ovo polje je obavezno.",
                email: "Unesite valjanu email adresu."
            },
            phone: {
                required: "Ovo polje je obavezno.",
                minlength: "Broj telefona mora imati barem 9 znakova."
            },
            city: {
                required: "Ovo polje je obavezno."
            },
            message: {
                required: "Ovo polje je obavezno.",
                minlength: "Poruka mora imati barem 10 znakova."
            }
        },
        submitHandler: function(form, event) {
          event.preventDefault();  // Sprječava klasično slanje formulara
          $.ajax({
              type: 'POST',
              url: '/kontakti.php',
              data: $(form).serialize(),
              success: function(response) {
                  alert('Poruka je uspješno poslana!');
                  $('#formValid')[0].reset();  // Resetira formular nakon slanja
              },
              error: function() {
                  alert('Došlo je do greške pri slanju poruke.');
              }
          });
          return false; // Ovo dodatno osigurava da se formular ne šalje klasičnim putem
      }
    });
});
