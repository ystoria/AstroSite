/// Mehdi Calanducci
/// 31.03.2021
/// (Last modif. 13/10/2021)
/// fichier JS
/// Projet Spaceships
///

/*
//Méthode inconnues utilisées
* ClassList
    Permet de modifier la classe html de l'élément

* GetComputedStyle
    Retourne l'élément pour lequel le css va être modifié

* GetPropertyValue
    Convertit les valeurs css en string
*/


//Initialisation
var score = 0;   
const jump = 10;
var spaceship = document.getElementById("spaceship");
var weapons = document.getElementsByClassName("weapons");
var board = document.getElementById("board");
var enemies = document.getElementsByClassName("enemies");
var imgExplosion = document.createElement("img");
imgExplosion.src = "../img/explosion/explosion.png";
var deplacement = "";
var gameOver = false;

/*
while (!gameOver) {
    
}
*/

//Fonction Collision
function collision(object_1, object_2) {
    
    bound_1 = object_1.getBoundingClientRect();
    bound_2 = object_2.getBoundingClientRect();

    var touch = new Boolean(false);

    if (bound_1.x < bound_2.x + bound_2.width &&
        bound_1.x + bound_1.width > bound_2.x &&
        bound_1.y < bound_2.y + bound_2.height &&
        bound_1.y + bound_1.height > bound_2.y) {
         touch = true;
     }

    return touch;
}

/*function arrayRemoveItem(index, value, array) {
    return array.filter(function(index){
        return index != value;
    });
}*/

//Evenements claviers
window.addEventListener("keydown", (e) => {
    function keyPress(e) {
    var spaceshipTop = parseInt(window.getComputedStyle(spaceship).getPropertyValue("top"));

    
    //moveUP 
    if(e.keyCode == 87) 
    {
        spaceship.style.top = spaceshipTop - jump + "px";
        //alert("arrowUp"); //Debug
    }
    //moveDown
    else if (e.keyCode == 83)
    {
        spaceship.style.top = spaceshipTop + jump + "px";
        //alert("arrowDown"); //Debug
    }

    //Evènements arme
    if (e.keyCode == 32) {
        var weapon = document.createElement("div");
        weapon.classList.add("weapons");
        var weaponMovement = parseInt(window.getComputedStyle(weapon).getPropertyValue("left"));
        weapon.style.left = 120 + "px";
        weapon.style.top = spaceshipTop + 50 + "px";
        board.appendChild(weapon);
    }
}
document.onkeydown = keyPress;

});

//Conditions armes
var moveWeapon = setInterval (() => {
    for (var i = 0; i < weapons.length; i++) {    
        var weaponMovement = parseInt(window.getComputedStyle(weapons[i]).getPropertyValue("left"));
        var laser = weapons[i];
        var weaponMovement = parseInt(window.getComputedStyle(laser).getPropertyValue("left"));
        if (weaponMovement <= 2000) {
            laser.style.left = weaponMovement + jump + "px";
        }
        else
        {
            laser.parentElement.removeChild(laser);
        }
        
        for (var j = 0; j < enemies.length; j++) {
            var enemy = enemies[j]
            if (enemy != undefined) {
                if (collision(laser, enemy) == true) {
                    enemy.remove(); // cache les ennemis une fois touché
                    score += 100;
                    document.getElementById("score").innerHTML = "Score: " + score;
                    if (score > 1000) {
                        alert("Victoire!!!");
                        window.location.reload();
                        gameOver = true;
                    }
                }
            }
        }
    }
}, 10);

//Générer cibles
var generateEnemies = setInterval(() => {
    var enemy = document.createElement("div");
    enemy.classList.add("enemies");
    //-> 840 = board.width - enemy.width
    enemy.style.bottom = Math.floor(Math.random() * 840) + "px";
    if (enemy.style.bottom > 900) {
        enemy.style.bottom = Math.floor(Math.random() % 840) + "px";
    }
    board.appendChild(enemy);
}, 2000);

//Déplacement cibles
var moveEnemies = setInterval(() => {
    if (enemies != undefined) {
        for (var i = 0; i < enemies.length; i++) {
            var enemy = enemies[i];
            var enemyLeft = parseInt(window.getComputedStyle(enemy).getPropertyValue("left"));
            //0 => bord de la case de jeu
            if (enemyLeft <= 0) {
                alert("Game Over"); //Fin du jeu à l'alerte
                clearInterval(moveEnemies);
                window.location.reload();
                gameOver = true;
            }
            enemy.style.left = enemyLeft - jump + "px";
        }
    }
}, 200);


/*function itemRemover(items, i){
    const filteredItems = items.slice(0, i).concat(items.slice(i + 1, items.length))
}*/