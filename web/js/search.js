/* 

$(document).ready(function(){
    $('#search-produit').keyup(function(){ //fonction qui permet de capter la sortie d'appuie d'une touche d'un clavier.
        $('#result-search').html(''); //permet de mettre le resultat à blanc à chaque appui.
    
      var produit = $(this).val(); //permet de recupérer notre saisie.
 
      if(produit != ""){
        $.ajax({ //fonction ajax
          type: 'GET',
          url: 'http://localhost/projet/web/index.php?page=api-recherche-produit',
          data: 'libelle=' + encodeURIComponent(libelle),
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