//call function on buttonclick
// document.getElementById("btn_open").addEventListener("click", open_close_menu);

//Declare variables
var side_menu = document.getElementById("menu_side");
// var btn_open = document.getElementById("btn_open");
var body = document.getElementById("body");

//Toggle show menu
function open_close_menu() {
  body.classList.toggle("body_move");
  side_menu.classList.toggle("menu__side_move");
}

setTimeout(function() {
//Anchor link active
if (window.innerWidth < 760) {
  body.classList.add("body_move");
  side_menu.classList.add("menu__side_move");
  // alert();

     $('.menu__side').removeClass('menu__side_move')
  // $('.menu__side').removeClass('menu__side_move');
}

}, 1500);

//Responsive menu
window.addEventListener("resize", function () {
  if (window.innerWidth > 760) {
    body.classList.remove("body_move");
    // side_menu.classList.remove("menu__side_move");
    $('.menu__side').removeClass('menu__side_move');

  }

  if (window.innerWidth < 760) {
    body.classList.add("body_move");
    side_menu.classList.add("menu__side_move");
    $('.menu__side').removeClass('menu__side_move');
  }
});




// CUSTOM FILE UPLOAD

$('#maintenanceTbl').on('click', '.custom-button-class', function () {
  var fileInput = $(this).parent().prev('input');
  fileInput.trigger("click");

  fileInput.on('change', function () {
    // Handle the change event
    // var selectedFileName = $(this).val();
    // console.log('Selected file:', selectedFileName);

    if ($(this).val()) {
      $(this).next('.custom-file-input').find('.custom-text-class').html(
        $(this).val().match(
          /[\/\\]([\w\d\s\.\-\(\)]+)$/
        )[1]
      );

    } else {
      $(this).next('.custom-file-input').find('.custom-text-class').html("No file chosen, yet.");
    }

  });

});

$('.section-wrapper').on('click', '.custom-button-class', function () {
  var fileInput = $(this).parent().prev('input');
  fileInput.trigger("click");

  fileInput.on('change', function () {

    if ($(this).val()) {
      $(this).next('.custom-file-input').find('.custom-text-class').html(
        $(this).val().match(
          /[\/\\]([\w\d\s\.\-\(\)]+)$/
        )[1]
      );

    } else {
      $(this).next('.custom-file-input').find('.custom-text-class').html("No file chosen, yet.");
    }

  });

});



// $(".custom-button-class").click(function () {
//   var fileInput = $(this).parent().prev('input');
//   fileInput.trigger("click");
// });

// $('.custom-button-class').parent().prev('input').change(function () {

//   console.log($(this).val());


//   if ($(this).val()) {
//     $(this).next('.custom-file-input').find('.custom-text-class').html(
//       $(this).val().match(
//         /[\/\\]([\w\d\s\.\-\(\)]+)$/
//       )[1]
//     );

//   } else {
//     $(this).next('.custom-file-input').find('.custom-text-class').html("No file chosen, yet.");
//   }

// });

// CUSTOM FILE UPLOAD
const realFileBtn = document.getElementById("real-file");
const customBtn = document.getElementById("custom-button");
const customTxt = document.getElementById("custom-text");

customBtn.addEventListener("click", function () {
  realFileBtn.click();
});

realFileBtn.addEventListener("change", function () {
  if (realFileBtn.value) {
    customTxt.innerHTML = realFileBtn.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    customTxt.innerHTML = "No file chosen, yet.";
  }
});

const fitness_cert = document.getElementById("fitness_cert");
const fitnesscustomBtn = document.getElementById("fitness-custom-button");
const fitnesscustomTxt = document.getElementById("fitness-custom-text");

fitnesscustomBtn.addEventListener("click", function () {
  fitness_cert.click();
});

fitness_cert.addEventListener("change", function () {
  if (fitness_cert.value) {
    fitnesscustomTxt.innerHTML = fitness_cert.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    fitnesscustomTxt.innerHTML = "No file chosen, yet.";
  }
});

// const noc_cert = document.getElementById("noc_certificate");
// const noccustomBtn = document.getElementById("noc-custom-button");
// const noccustomTxt = document.getElementById("noc-custom-text");

// noccustomBtn.addEventListener("click", function () {
//   noc_cert.click();
// });

// noc_cert.addEventListener("change", function () {
//   if (noc_cert.value) {
//     noccustomTxt.innerHTML = noc_cert.value.match(
//       /[\/\\]([\w\d\s\.\-\(\)]+)$/
//     )[1];
//   } else {
//     noccustomTxt.innerHTML = "No file chosen, yet.";
//   }
// });

