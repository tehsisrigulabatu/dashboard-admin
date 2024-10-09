// document.getElementById("project").style.display = "none";
// document.getElementById("servis").style.display = "none";

/*document.getElementById('project').addEventListener('click', function() {
  document.getElementById('home-content').style.display = 'none';
  document.getElementById('servis').style.display = 'none';
  document.getElementById('rpl').style.display = 'block';
});

document.getElementById('rumah').addEventListener('click', function() {
  document.getElementById('rpl').style.display = 'none';
  document.getElementById('servis').style.display = 'none';
  document.getElementById('home-content').style.display = 'block';
});

document.getElementById('Service').addEventListener('click', function() {
  document.getElementById('home-content').style.display = 'none';
  document.getElementById('rpl').style.display = 'none';
  document.getElementById('servis').style.display = 'block';
}); */

document.getElementById("project").addEventListener("click", function () {
  document.getElementById("home-content").style.display = "none";
  document.getElementById("servis").style.display = "none";

  const repel = document.getElementById("rpl");
  repel.style.display = "block";

 const ruma = document.getElementById("rumah");
  ruma.classList.remove("active");

  const ms = document.getElementById("Service");
 ms.classList.remove("active"); 

  const projek = document.getElementById("project");
  projek.classList.add("active");
});

document.getElementById("Service").addEventListener("click", function () {
  document.getElementById("home-content").style.display = "none";
  document.getElementById("rpl").style.display = "none";

  const srvs = document.getElementById("servis");
  srvs.style.display = "block";

  const rm = document.getElementById("rumah");
  rm.classList.remove("active");

  const pj = document.getElementById("project");
  pj.classList.remove("active");

  const srv = document.getElementById("Service");
  srv.classList.add("active");
});

// hlou
