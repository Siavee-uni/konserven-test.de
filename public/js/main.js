/* window.onload = function() {
    const card = document.querySelectorAll(".can .card");
    console.log(card);

    function showFunction() {
       this.querySelector('.face.face2').style.maxHeight = "3000px";
        this.querySelector('.face.face2').style.width = "400px"; 
    }
    function hideFunction() {
        this.querySelector('.face.face2').style.maxHeight = "0px";
     }
    card.forEach(el => el.addEventListener('mouseover', showFunction));
    card.forEach(el => el.addEventListener('mouseout', hideFunction));

}; */

/* window.onload = function () {
    const veganButton = document.querySelector("#vegan");

    veganButton.addEventListener("click", function(){

        const card = document.querySelectorAll(".can .card");

        card.forEach( function(card) {
            var vegan = card.getAttribute('data-vegan');
            if (!vegan) {
                card.remove();
            }
        });
        
    });
    
} */


