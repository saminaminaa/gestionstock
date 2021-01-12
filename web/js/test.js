/* $(document).ready(function() { 
  function ajax(){
    var request= $.ajax({
      url: "http://localhost/projet/web/index.php",
      method: "GET",
      dataType: "json",
      beforeSend: function( xhr ) {
        xhr.overrideMimeType( "application/json; charset=utf-8" );
      }});
      request.done(function( msg ) {
        $.each(msg, function(index,e){
          console.log(e.titre);
        });
      });
      // Fonction qui se lance lorsque l’accès au web service provoque une erreur
      request.fail(function( jqXHR, textStatus ) {
        alert ('erreur');
      });
    }
    // Appel de la fonction ajax
    ajax();
  });
 */

if (window.XMLHttpRequest)    //  Objet standard
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


xhr.open('GET', 'http://localhost/projet/web/index.php', true);  
xhr.send(null);