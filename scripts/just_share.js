function class_just_share() {
	var self = this;
	var buttons = {
		'share-vkontakte': ['fa-vk', '91, 127, 166', 'Поделиться', '//vk.com/share.php?url=' + window.location + '&title=' + $('title').html()],
		'share-twitter': ['fa-twitter', '29, 202, 255', 'Твитнуть', '//twitter.com/intent/tweet?url=' + window.location + '&text=' + $('title').html()],
		'share-facebook': ['fa-facebook', '59, 89, 152', 'Поделиться', '//facebook.com/sharer/sharer.php?u=' + window.location],
		'share-google': ['fa-google-plus', '221, 75, 57', 'Плюс', '//plus.google.com/share?url=' + window.location]
	};

	self.start = function() {
		$('head').append('<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">');

		$('.share-vkontakte, .share-twitter, .share-facebook, .share-google').on('mouseenter', function() {
			$(this).css({background: 'rgba(' + buttons[$(this).attr('class')][1] + ', 0.7)'});
		});

		$('.share-vkontakte, .share-twitter, .share-facebook, .share-google').on('mouseleave', function() {
			$(this).css({background: 'rgba(255, 255, 255, 0.15)'});
		});

		$('.share-vkontakte, .share-twitter, .share-facebook, .share-google').on('click', function() {
			var width = 680, height = 420;
			var url = buttons[$(this).attr('class')][3];
			window.open(url, 'pmw', 'width=' + width + ', height=' + height + ', left=' + (window.innerWidth - width) / 2 + ', top=' + (window.innerHeight - height) / 2);
		});

		self.create();
	}

	self.create = function() {
		for(var index in buttons) {
			var button = buttons[index];
			var element = '<i class="fa ' + button[0] + '"></i><span>' + button[2] + '</span>';
			$('.' + index).append(element);
		}
	}
}

//

var just_share = new class_just_share();
$(document).ready(just_share.start);