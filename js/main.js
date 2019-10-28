var i = 0;
const name1 = 'Aqua';
const name2 = 'FPS';
const speed = 200;

typeWriter(() => {
  if (i < name2.length) {
    document.getElementById("name2").innerHTML += name2.charAt(i);
    i++;
    setTimeout(typeWriter2, speed);
  }
});

function typeWriter(cb) {
  if (i < name1.length) {
    document.getElementById("name1").innerHTML += name1.charAt(i);
    i++;
    setTimeout(typeWriter, speed);
  }
  else {
    document.getElementById("name1").innerHTML += '<span class="text-primary" id="name2"></span>'
    i= 0;
    cb();
  }
}

new Twitch.Embed("twitch-embed", {
    width: "100%",
    height: 675,
    channel: "aquafps"
});
