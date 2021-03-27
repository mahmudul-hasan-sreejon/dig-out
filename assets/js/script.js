let timer;

$(document).ready(function() {
	$('.result').on('click auxclick', function(e) {
		let id = $(this).attr('data-linkId');
		let url = $(this).attr('href');

		increaseLinkClicks(id, url, e.type);

		return false;
	});

	let grid = $('.imageResults');

	grid.on('layoutComplete', function() {
		$('.gridItem img').css('visibility', 'visible');
	});

	grid.masonry({
		itemSelector: '.gridItem',
		columnWidth: 200,
		gutter: 5,
		isInitLayout: false
	});

	$('[data-fancybox]').fancybox({
		caption: function(instance, item) {
			let caption = $(this).data('caption') || '';
			let siteUrl = $(this).data('siteurl') || '';

			if (item.type === 'image') {
				caption =
					(caption.length ? caption + '<br />' : '') +
					'<a href="' +
					item.src +
					'">View image</a>' +
					'<br />' +
					'<a href="' +
					siteUrl +
					'">View page</a>';
			}

			return caption;
		},

		afterShow: function(instance, item) {
			increaseImageClicks(item.src);
		}
	});
});

function loadImage(src, className) {
	var image = $('<img>');

	image.on('load', function() {
		$('.' + className + ' a').append(image);

		clearTimeout(timer);
		timer = setTimeout(function() {
			$('.imageResults').masonry();
		}, 500);
	});

	image.on('error', function() {
		$('.' + className).remove();

		$.post('hooks/setBroken.php', { src: src });
	});

	image.attr('src', src);
}

function increaseLinkClicks(linkId, url, type) {
	$.post('hooks/updateLinkCount.php', { linkId: linkId }).done(function(result) {
		if (result != '') {
			alert(result);
			return;
		}

		if (type == 'click') window.location.href = url;
	});
}

function increaseImageClicks(imageUrl) {
	$.post('hooks/updateImageCount.php', { imageUrl: imageUrl }).done(function(result) {
		if (result != '') {
			alert(result);
			return;
		}
	});
}
