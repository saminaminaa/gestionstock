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
    id='idC'+this.getAttribute('id-com'); //On recupere l'id du commentaire
    idcommentaire = 'commentaire'+this.getAttribute('id-com');
    commentaire=document.getElementById(idcommentaire).value;
    idC = 'idC'+this.getAttribute('id-com');
    id=document.getElementById(idC).value;
    
    idCT = 'idCT'+this.getAttribute('id-comt'); //Pour recuperer l'id du type
    idT = document.getElementById(idCT).value;

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
        // Modifier le contenu de la div
        $(".res"+id).text(text);
        $('.ress'+id+"_"+idT).load('index.php .ress'+id+"_"+idT).fadeIn(); //Actualiser cette div
        $('.ress'+id).load('index.php?page=recherche .ress'+id).fadeIn();
      });
      request.fail(function( jqXHR, textStatus ) {
        alert ('erreur');
        var text = "❌"
        // Modifier le contenu de la div
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

      idBT = 'idBT'+this.getAttribute('id-moinst');
      idT = document.getElementById(idBT).value;
      
      
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
          //alert("fonctionne");
          //si la requete fonctionne on actualise ces divs :
          $('#output'+id).load('index.php?page=recherche #output'+id).fadeIn(); //Pour actualiser une div
          $('#output'+id+"_"+idT).load('index.php #output'+id+"_"+idT).fadeIn();
          $('#output__'+idT).load('index.php #output__'+idT).fadeIn();
          $('#outputt__'+idT).load('index.php #outputt__'+idT).fadeIn();
          $('#outputt'+id+"_"+idT).load('index.php #outputt'+id+"_"+idT).fadeIn();
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

      idPT = 'idBT'+this.getAttribute('id-plust');
      idT = document.getElementById(idPT).value;
     
      var request= $.ajax({
        url: "http://localhost/projet/web/index.php?page=api-augmenter-qte",
        method: "POST", 
        dataType: "text",
        data: {
          btAugmenterQte : 'test', 
          id: id,
          qte: qte,
        },
        beforeSend: function( xhr ) {
          //xhr.overrideMimeType( "application/json; charset=utf-8" );
        }});
        request.done(function( msg ) {
          //alert(msg);
          //console.log(msg);
          //si la requete fonctionne on actualise ces divs :
          $('#output'+id).load('index.php?page=recherche #output'+id).fadeIn();
          $('#output'+id+"_"+idT).load('index.php #output'+id+"_"+idT).fadeIn();
          $('#output__'+idT).load('index.php #output__'+idT).fadeIn();
          $('#outputt__'+idT).load('index.php #outputt__'+idT).fadeIn();
          $('#outputt'+id+"_"+idT).load('index.php #outputt'+id+"_"+idT).fadeIn();
        });
        request.fail(function( jqXHR, textStatus ) {
          alert ('erreur');
        });
      }
  });