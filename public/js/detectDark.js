let favicon = document.getElementById('favicon');


if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
    favicon.href = "images/logoCascClar.png";
}else{
    favicon.href = "images/logoCascNegre.png";
}
