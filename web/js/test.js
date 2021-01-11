
/* console.log("test")

alert("test"); */

let btChevron = document.getElementsByClassName("btChevron")
btChevron[0].addEventListener("click", function () { 
    document.getElementsByClassName("btChevron")[0].style.visibility = 'hidden';
});



$(document).ready(function() {
  $('div.projet1:eq(0)> div').hide();
  $('div.projet1:eq(0)> h3').click(function() {
 $(this).next().slideToggle('fast');
  });
});

$(document).ready(function() {
  $('div.projet2:eq(0)> div').hide();
  $('div.projet2:eq(0)> h3').click(function() {
 $(this).next().slideToggle('fast');
  });
});


$(document).ready(function() {
  $('div.categorie:eq(0)> div').hide();
  $('div.categorie:eq(0)> h2').click(function() {
 $(this).next().slideToggle('fast');
  });
});
  