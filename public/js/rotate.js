var rotate = document.getElementById( 'rotate' );
var rotateColider = document.getElementById( 'rotateColider' );

rotateColider.addEventListener( 'mouseover', function () {

    rotate.className = 'over fondoInterrogant';

}, false );

rotateColider.addEventListener( 'mouseout', function () {

    rotate.className = 'out fondoInterrogant';
    window.setTimeout( function () { rotate.className = 'fondoInterrogant' }, 550 );

}, false );
