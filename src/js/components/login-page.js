/*
 * Login page JS.
 */

document.addEventListener( 'DOMContentLoaded', function () {
	const showRegLink = document.getElementById( 'showReg' );
	const showLogin = document.getElementById( 'showLogin' );
	const registerSection = document.getElementById( 'register-section' );
	const loginSection = document.getElementById( 'login-section' );
	if ( showRegLink && registerSection ) {
		showRegLink.addEventListener( 'click', function ( event ) {
			event.preventDefault(); // Prevent the default link behavior.
			registerSection.style.display = 'flex'; // Show the register section.
			loginSection.style.display = 'none'; // Show the login section.
		} );
	}

	if ( showLogin && loginSection ) {
		showLogin.addEventListener( 'click', function ( event ) {
			event.preventDefault(); // Prevent the default link behavior.
			registerSection.style.display = 'none'; // Show the register section.
			loginSection.style.display = 'flex'; // Show the login section.
		} );
	}
} );
