var rotate = document.getElementById( 'rotate' );
var rotateColider = document.getElementById( 'rotateColider' );

rotateColider.addEventListener( 'mouseover', function () {

    rotate.className = 'over';

}, false );

rotateColider.addEventListener( 'mouseout', function () {

    rotate.className = 'out';
    window.setTimeout( function () { rotate.className = '' }, 550 );

}, false );
