var canvas = document.getElementById("background");
var context = canvas.getContext("2d");

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

context.fillStyle = "black";

var stars = [];

function newStar() {
  stars.push({
    x: canvas.width / 2,
    y: canvas.height / 2,
    dir: Math.random() * Math.PI * 2,
  });

  stars = stars.filter(function (x) {
    return x.x < canvas.width * 2 || x.y < canvas.height * 2;
  });
}

function draw() {
  context.fillStyle = "black";
  context.fillRect(0, 0, canvas.width, canvas.height);

  for (var index = 0; index < stars.length; index++) {
    var star = stars[index];
    star.x += Math.cos(star.dir) * 6;
    star.y += Math.sin(star.dir) * 6;
    context.fillStyle = "white";
    context.fillRect(Math.round(star.x / 2) * 2, Math.round(star.y / 2) * 2, 2, 2);
  }
}

function clearStars() {
  // remove stars that are off screen
  let stars_before = stars.length;
  stars = stars.filter(function (x) {
    return x.x > 0 && x.y > 0 && x.x < canvas.width && x.y < canvas.height;
  });
  let stars_after = stars.length;
  console.log(`Cleared ${stars_before - stars_after} stars`);
}

setInterval(newStar, 5);

document.addEventListener("resize", function () {
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
});

setInterval(draw, 10);

context.fillStyle = "black";
context.fillRect(0, 0, canvas.width, canvas.height);

for (var index = 0; index < 100; index++) {
  newStar();
  clearStars();
  draw();
}

window.addEventListener("resize", function () {
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
});
