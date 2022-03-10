let favicon = document.getElementById('favicon');


if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
    favicon.href = "{{ asset('images/logoCascClar.png') }}";
}else{
    favicon.href = "{{ asset('images/logoCascClar.png') }}";
}
