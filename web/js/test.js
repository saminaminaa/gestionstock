 

 
 $(document).ready(function() {
  
//--------------------------modifier un commentaire----------------------------------------------------------------------------
  var btModifComs = document.getElementsByName('btModifCom'); 

  for(let item of btModifComs){
    item.addEventListener("click",ajaxEnvoiCom,false);
  }
  //btModifComs.addEventListener("click",ajaxEnvoiCom,false);
  
  function ajaxEnvoiCom(){ //function ajax pour chaque form
    //alert(this.getAttribute('id-com'));
    id='idC'+this.getAttribute('id-com');
    idcommentaire = 'commentaire'+this.getAttribute('id-com');
    commentaire=document.getElementById(idcommentaire).value;
    idC = 'idC'+this.getAttribute('id-com');
    id=document.getElementById(idC).value;
    
    var request= $.ajax({
      url: "http://localhost/projet/web/index.php?page=api-modif-com", //faire controleur uniquement pr api contenant des fonctions pour tt ce qui est ajax
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


//--------------------------Augmenter qte------------------------------------------------------------------------------------------
    var btAugmenterQtes = document.getElementsByName('btAugmenterQte'); 
    var output = document.getElementsByName('output');
       
    for(let item of btAugmenterQtes){
      item.addEventListener("click",ajaxAugmenterQte,false);
    }
    function ajaxAugmenterQte(){ //function ajax pour chaque form
      //alert(this.getAttribute('id-plus'));
      //$('#counter').html(function(i, val) { return +val+1 });
      id='idP'+this.getAttribute('id-plus');
      idqte = 'qte'+this.getAttribute('id-plus');
      qte=document.getElementById(idqte).value;
      idP = 'idP'+this.getAttribute('id-plus');
      id=document.getElementById(idP).value;
      //idoutput = 'output'+this.getAttribute('id-plus');
      //output=document.getElementById(output).value;

      //$(output).html(function(i, val) { return val*1+1 });
      //document.getElementById('output').innerHTML += "1";
      //document.getElementById('output').innerHTML ++; //fait la mm chose que $("#output").html(function(i, val) { return val*1+1 }); mais ne modifie toujours que la 1ere ligne
      
      //$(output).html(retour);
      //$(output).load("http://localhost/projet/web/index.php #output");

      /* var j = jQuery.noConflict();

      j(btAugmenterQtes).everyTime(2000, refreshDiv)
       j(output).click(refreshDiv);

       j(btAugmenterQtes).css({
           color: ""
       });

       function refreshDiv() {
           j.ajax({
               url: "index.php",
               cache: true,
               success: function (html) {
                   j(btAugmenterQtes).html(html);
               }
           });
       } */

      /* $(btAugmenterQtes).on('click', function(){

        $.ajax({
            success: function (html) {
                $(output).html(html);
            }
        });
    }); */

    //$(output).load("http://localhost/projet/web/index.php #output");
    //$refresh(output);

    document.getElementById("qte"+numligne).content = $retourAjax;
      
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
      
      /* id='idP'+this.getAttribute('id-plus');
      idoutput = 'qte'+this.getAttribute('id-plus'); */
      //$('#btAugmenterQte').click(function() {
        //alert("test");
        //$('#output').html(function(i, val) { return val*1+1 });
      //});



//--------------------------Baisser qte---------------------------------------------------------------------------------
    var btBaisserQtes = document.getElementsByName('btBaisserQte'); 

    for(let item of btBaisserQtes){
      item.addEventListener("click",ajaxBaisserQte,false);
    }

    function ajaxBaisserQte(){ //function ajax pour chaque form
      //alert(this.getAttribute('id-mois'));
      id='idB'+this.getAttribute('id-moins');
      idqteB = 'qte'+this.getAttribute('id-moins');
      qte=document.getElementById(idqteB).value;
      idB = 'idB'+this.getAttribute('id-moins');
      id=document.getElementById(idB).value;
      
      var request= $.ajax({
        url: "http://localhost/projet/web/index.php?page=api-baisser-qte", //faire controleur uniquement pr api contenant des fonctions pour tt ce qui est ajax
        method: "POST", 
        dataType: "text",
        data: {
          btBaisserQte : 'test', 
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


/* if (window.XMLHttpRequest)    //  Objet standard
{ 
    xhr = new XMLHttpRequest();     //  Firefox, Safari, ...
} 
else  if (window.ActiveXObject)      //  Internet Explorer
{
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}

try
{
   xhr = new ActiveXObject("Microsoft.XMLHTTP"); // Essayer IE 
}
catch(e)   // Echec, utiliser l'objet standard 
{
  xhr = new XMLHttpRequest();
}

xhr.onreadystatechange = function()
{
 console.log("cc")
};

if (xhr.readyState == 4) 
{ 
  // Reçu, OK 
  console.log("bien reçu") 
}
else
{ 
// Attendre...
console.log("attendre")
}


//xhr.open('GET', 'http://localhost/projet/web/index.php', true);  
xhr.send(null); */