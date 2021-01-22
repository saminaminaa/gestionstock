$(document).ready(function() {
  
//--------------------------modifier un commentaire----------------------------------------------------------------------------
  
  //variable pour les boutons de modification d'un commentaire
  var btModifComs = document.getElementsByName('btModifCom');

  //pour tous les boutons faire....
  for(let item of btModifComs){
    item.addEventListener("click",ajaxEnvoiCom,false);
  }
  
  function ajaxEnvoiCom(){ //fonction ajax pour chaque form (ici pour l'envoi d'un commentaire)
    //alert(this.getAttribute('id-com'));
    id='idC'+this.getAttribute('id-com');
    idcommentaire = 'commentaire'+this.getAttribute('id-com');
    commentaire=document.getElementById(idcommentaire).value;
    idC = 'idC'+this.getAttribute('id-com');
    id=document.getElementById(idC).value;
    
    //ajax
    var request= $.ajax({
      url: "http://localhost/projet/web/index.php?page=api-modif-com", 
      method: "POST", 
      dataType: "text",
      data: {
        btModifCom : 'test', 
        id: id,
        commentaire: commentaire,
        //id: 'idC'+this.getAttribute('id-com'),
        //commentaire: 'commentaire'+this.getAttribute('id-com'),
      },
      beforeSend: function( xhr ) {
        //xhr.overrideMimeType( "application/json; charset=utf-8" );
      }});
      request.done(function( msg ) {
        //alert("Modification du commentaire reussie ✔️");
        var text = "✔️"
        // Modifier le contenu de div
        $(".res"+id).text(text);
      });
      request.fail(function( jqXHR, textStatus ) {
        alert ('erreur');
        var text = "❌"
        // Modifier le contenu de div
        $(".res"+id).text(text);
      });
    }

    //--------------------------Baisser qte---------------------------------------------------------------------------------
    // Même choses que pour la modification d'un commentaire.
    var btBaisserQtes = document.getElementsByName('btBaisserQte'); 

    for(let item of btBaisserQtes){
      item.addEventListener("click",ajaxBaisserQte,false);
    }
    function ajaxBaisserQte(){
      id='idB'+this.getAttribute('id-moins');
      idqteB = 'qte'+this.getAttribute('id-moins');
      qte=document.getElementById(idqteB).value;
      idB = 'idB'+this.getAttribute('id-moins');
      id=document.getElementById(idB).value;

      //idBT = 'idBT'+this.getAttribute('id-moinst');
      //idT=document.getElementById(idBT).value;

      //var qteN = document.getElementById('output'+id); 
      
      var request= $.ajax({
        url: "http://localhost/projet/web/index.php?page=api-baisser-qte",
        method: "POST", 
        dataType: "text",
        data: {
          btBaisserQte : 'test', 
          id: id,
          qte: qte,
        },
        beforeSend: function( xhr ) {
          //xhr.overrideMimeType( "application/json; charset=utf-8" );
        }});
        request.done(function( msg ) {
          //alert(msg);
          //console.log(msg);
          //var text = document.getElementById('#output'+id);
          // Modifier le contenu de div
          //$('#output'+id).text(text);
          //$('#output'+id).load('index.php?page=recherche #output'+id).fadeIn('slow');
            
        });
        request.fail(function( jqXHR, textStatus ) {
          alert ('erreur');
        });
      }


//--------------------------Augmenter qte------------------------------------------------------------------------------------------
    var btAugmenterQtes = document.getElementsByName('btAugmenterQte');

    for(let item of btAugmenterQtes){
      item.addEventListener("click",ajaxAugmenterQte,false);
    }

    function ajaxAugmenterQte(){
      id='idP'+this.getAttribute('id-plus');
      idqte = 'qte'+this.getAttribute('id-plus');
      qte=document.getElementById(idqte).value;
      idP = 'idP'+this.getAttribute('id-plus');
      id=document.getElementById(idP).value;
     
      var request= $.ajax({
        url: "http://localhost/projet/web/index.php?page=api-augmenter-qte",
        method: "POST", 
        dataType: "text",
        data: {
          btAugmenterQte : 'test', 
          id: id,
          qte: qte,
          //id: 'idC'+this.getAttribute('id-com'),
          //commentaire: 'commentaire'+this.getAttribute('id-com'),
        },
        beforeSend: function( xhr ) {
          //xhr.overrideMimeType( "application/json; charset=utf-8" );
        }});
        request.done(function( msg ) {
          //alert(msg);
          //console.log(msg);
        });
        request.fail(function( jqXHR, textStatus ) {
          alert ('erreur');
        });
      }
  });