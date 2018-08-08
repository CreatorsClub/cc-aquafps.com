var i = 0;
var name1 = 'Aqua';
var name2 = 'FPS';
var speed = 200;

typeWriter();

function typeWriter() {
  if (i < name1.length) {
    document.getElementById("name1").innerHTML += name1.charAt(i);
    i++;
    setTimeout(typeWriter, speed);
  }
  else {
    document.getElementById("name1").innerHTML += '<span class="text-primary" id="name2"></span>'
    i= 0;
    typeWriter2();
  }
}

function typeWriter2() {
    if (i < name2.length) {
      document.getElementById("name2").innerHTML += name2.charAt(i);
      i++;
      setTimeout(typeWriter2, speed);
    }
}

new Twitch.Embed("twitch-embed", {
    width: "100%",
    height: 675,
    channel: "aquafpsgaming"
  });