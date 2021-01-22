/* 
$(document).ready(function(){
    $('#search').keyup(function(){ //fonction qui permet de capter la sortie d'appuie d'une touche d'un clavier.
        $('#result-search').html(''); //permet de mettre le resultat à blanc à chaque appui.
    
      var produit = $(this).val(); //permet de recupérer notre saisie.
 
      if(produit != ""){
        $.ajax({ //fonction ajax
          type: 'GET',
          url: 'http://localhost/projet/web/index.php?page=recherche',
          data: 'recherche=' + encodeURIComponent(recherche),
          success: function(data){
            if(data != ""){
              $('#result-search').append(data);
            }else{
                //alert("testtt");
              document.getElementById('result-search').innerHTML = "<div style='font-size: 20px; text-align: center; margin-top: 10px'>Aucun Produit</div>"
            }
          }
        });
      }
    });
  }); */