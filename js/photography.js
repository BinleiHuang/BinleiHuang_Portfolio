$(document).ready(function() {
			$('#fullpage').fullpage({
				anchors: [ 'secondPage', '3rdPage'],
				sectionsColor: [ '#1BBC9B', '#7E8F7C'],
				navigation: true,
				navigationPosition: 'right',
				navigationTooltips: ['First page', 'Second page', 'Third and last page']
			});
		});
