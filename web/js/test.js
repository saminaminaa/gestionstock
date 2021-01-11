
/* console.log("test")

alert("test"); */

let btChevron = document.getElementsByClassName("btChevron")
btChevron[0].addEventListener("click", function () { 
    document.getElementsByClassName("btChevron")[0].style.visibility = 'hidden';
});