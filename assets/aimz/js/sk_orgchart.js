(function($) {
	$(function() {
		var oc = $('#chart-container').orgchart({
			'data' : '../../assets/mins/json/sk_orgchart.json',
			'depth': 0,
			'nodeTitle' : 'head',
			'nodeContent': 'contents',
			'zoom': true,
			'parentNodeSymbol': 'fa-navicon',
			//'direction': 'l2r'
		});
		
	});
})(jQuery);