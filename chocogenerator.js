let randomSweet;
let randomSemiSweet;
let randomChocoDarkness;

function combineFlavour() {
    randomSweet = sweet[Math.floor(Math.random() * sweet.length)];
    randomSemiSweet = semiSweet[Math.floor(Math.random() * semiSweet.length)];
    randomChocoDarkness = chocoDarkness[Math.floor(Math.random() * chocoDarkness.length)];   
    if (randomChocoDarkness === "Melk"){
        percentageCacao = [Math.floor(Math.random() * (50 - 25) + 25)] + "%";
    }
    else if (randomChocoDarkness === "Puur"){
        percentageCacao = [Math.floor(Math.random() * (80 - 40) + 40)] + "%";
    }
    else{
        percentageCacao = "";
    }
    return(randomSweet + " " + randomSemiSweet.toLowerCase() + " " + percentageCacao + " " + randomChocoDarkness.toLowerCase());
};

function randomColor() {
    let color = "#" + Math.floor(Math.random()*16777215).toString(16);
    return color;
}

let icon = document.querySelector('i');

function showFlavour() {
    document.getElementById("flavour").style.backgroundColor = randomColor();    
    document.getElementById("flavour").innerHTML = combineFlavour();    
    if (icon.classList.contains('fa-heart')){
        icon.classList.remove('fa-heart');
        icon.classList.add('fa-heart-o');
    }   
//Cancel default button behaviour to refresh page  
    return false;
}

if(document.querySelector('.iconSpan')){
    document.querySelector('.iconSpan').addEventListener('click', function changeHeart() {
        if (icon.classList.contains('fa-heart-o')) {
            icon.classList.remove('fa-heart-o');
            icon.classList.add('fa-heart');
            plusOne();
            lightUp();
        } else {
            icon.classList.remove('fa-heart');
            minusOne();
        }
    });
}

function lightUp() {
    document.getElementById("popularity").setAttribute("class", "lightup popularity");
}

if(document.querySelector('.iconSpan')){
    document.querySelector('.iconSpan').addEventListener('mouseleave', function lightDown() {
        document.getElementById("popularity").setAttribute("class", "popularity");
    });
}

function plusOne() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "addone.php?sweet="+randomSweet+"&semiSweet="+randomSemiSweet+"&chocoDarkness="+randomChocoDarkness, true);
    xmlhttp.send(); 
}

function minusOne() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "minusone.php?sweet="+randomSweet+"&semiSweet="+randomSemiSweet+"&chocoDarkness="+randomChocoDarkness, true);
    xmlhttp.send(); 
}

let iconAfter = document.querySelector('.plusAfter').childNodes[0];

if(document.querySelector('.plusAfter')){
    document.querySelector('.plusAfter').addEventListener('click', function changeAfter() {
        if (iconAfter.classList.contains('fa-thumbs-o-up')) {
            iconAfter.classList.remove('fa-thumbs-o-up');
            iconAfter.classList.add('fa-thumbs-up');
            //plusAfter();
        } else {
            iconAfter.classList.remove('fa-thumbs-up');
            iconAfter.classList.add('fa-thumbs-o-up');
            //plusAfterChange();
        }
    });
}

let iconMinus = document.querySelector('.minusAfter').childNodes[0];

if(document.querySelector('.minusAfter')){
    document.querySelector('.minusAfter').addEventListener('click', function changeAfter() {
        if (iconMinus.classList.contains('fa-thumbs-o-down')) {
            iconMinus.classList.remove('fa-thumbs-o-down');
            iconMinus.classList.add('fa-thumbs-down');
            //minusAfter();
        } else {
            iconMinus.classList.remove('fa-thumbs-down');
            iconMinus.classList.add('fa-thumbs-o-down');
            //minusAfterChange();
        }
    });
}

//function plusAfter() {
//    var xmlhttp = new XMLHttpRequest();
//    xmlhttp.open("GET");
//}