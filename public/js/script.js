// Small UI helpers
document.addEventListener('DOMContentLoaded', function () {
	// auto-dismiss alerts (elements with role alert)
	document.querySelectorAll('[role="alert"]').forEach(function(el){
		setTimeout(function(){
			el.style.transition = 'opacity 300ms ease';
			el.style.opacity = '0';
			setTimeout(function(){ el.remove(); }, 350);
		}, 5000);
	});
});

// Simple global confirm helper (optional)
function confirmAction(message){
	return confirm(message || 'Yakin?');
}

window.confirmAction = confirmAction;
