$(document).ready(function() {
  
//--------------------------modifier un commentaire----------------------------------------------------------------------------
  var btModifComs = document.getElementsByName('btModifCom'); 

  for(let item of btModifComs){
    item.addEventListener("click",ajaxEnvoiCom,false);
  }
  
  function ajaxEnvoiCom(){ //function ajax pour chaque form
    //alert(this.getAttribute('id-com'));
    id='idC'+this.getAttribute('id-com');
    idcommentaire = 'commentaire'+this.getAttribute('id-com');
    commentaire=document.getElementById(idcommentaire).value;
    idC = 'idC'+this.getAttribute('id-com');
    id=document.getElementById(idC).value;
    
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
        //alert(msg);
        //console.log(msg);
      });
      // Fonction qui se lance lorsque l’accès au web service provoque une erreur
      request.fail(function( jqXHR, textStatus ) {
        alert ('erreur');
      });
    }

    //--------------------------Baisser qte---------------------------------------------------------------------------------
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
        });
        // Fonction qui se lance lorsque l’accès au web service provoque une erreur
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
      //alert("salut2");
      id='idP'+this.getAttribute('id-plus');
      idqte = 'qte'+this.getAttribute('id-plus');
      qte=document.getElementById(idqte).value;
      idP = 'idP'+this.getAttribute('id-plus');
      id=document.getElementById(idP).value;
     
      var request= $.ajax({
        url: "http://localhost/projet/web/index.php?page=api-augmenter-qte", //faire controleur uniquement pr api contenant des fonctions pour tt ce qui est ajax
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
        // Fonction qui se lance lorsque l’accès au web service provoque une erreur
        request.fail(function( jqXHR, textStatus ) {
          alert ('erreur');
        });
      }
  });