jQuery(document).ready(function () {
	jQuery('.phone-number-click').click(function () {
		gtag('event', 'Click', { 'event_category': 'Phone Number', 'event_label': '', 'value': 15000 });
	});
	jQuery('#imageSlider').hover(function () {
		if (jQuery('.center.play.carousel-control').css('display') == 'none') {
			jQuery('.center.pause.carousel-control').show();
		}
	}, function () {
		jQuery('.center.pause.carousel-control').hide();
	})
	jQuery('.center.pause.carousel-control').click(function () {
		jQuery(this).hide();
		jQuery('.center.play.carousel-control').show();
	});
	jQuery('.center.play.carousel-control').click(function () {
		jQuery(this).hide();
		jQuery('.center.pause.carousel-control').show();
		jQuery('#imageSlider').carousel('cycle');
	});

	jQuery(".nav.navbar-nav li.menu-item-has-children").append('<i class="ddl-switch fa fa-angle-down"></i>');

	jQuery(".ddl-switch").click(function () {
		jQuery(this).parent().find("ul.sub-menu").slideToggle();
		jQuery(this).toggleClass("fa-angle-down");
		jQuery(this).toggleClass('fa-angle-up');
	});

	jQuery(".nav.navbar-nav li.menu-item-has-children > a").append('<span class="caret"></span>');

});

jQuery(function ($) {
	$(window).load(function () {
		// Use jQuery to add toggles, filters, and anchors to Yoast FAQ
		function extendFaqYoastFunctionality($sections) {
			if ($sections.length > 0) {
				// Extend each FAQ Section on the page
				$sections.each(function () {
					const settings = {
						allShowing: true,
						enableSidebar: false,
						enableToggling: true,
						enableSearch: false
					};

					function toggleAnswer(faq, forceOpen, forceClose) {
						if (settings.enableToggling) {
							const faqIsShowing = $(faq).hasClass('answer-is-showing');
							const toggle = $(faq).find('.answer-toggle');
							const $toggleIcon = $(toggle).find('.far');
							const $answer = $(faq).find('.schema-faq-answer');

							if (!faqIsShowing && !forceClose || forceOpen) {
								$answer.fadeIn(400);
								$(toggle).attr('aria-label', 'Hide the answer');
								$(faq).addClass('answer-is-showing');
								$toggleIcon.removeClass('fa-plus-square');
								$toggleIcon.addClass('fa-minus-square');

							} else if (faqIsShowing || forceClose) {
								$answer.hide();
								$(faq).removeClass('answer-is-showing');
								$(toggle).attr('aria-label', 'Show the answer');
								$toggleIcon.removeClass('fa-minus-square');
								$toggleIcon.addClass('fa-plus-square');

							}
						}
					}

					function addToggleEventHandler(question) {
						if (settings.enableToggling) {
							const $toggle = $(question).find('.answer-toggle');
							const $link = $(question).parent();
							const hasAnchor = $link.hasClass('anchor-toggle');

							if (hasAnchor) {
								$link.on('click', function (event) {
									event.preventDefault();
									toggleAnswer($link.parent());
								});

							} else {
								$toggle.on('click', function (event) {
									toggleAnswer($(question).parent());
								});
							}
						}
					}

					// Add the initial answer toggle 
					function addInitialAnswerToggle(question) {
						if (settings.enableToggling) {
							const $faq = $(question).parent();
							const toggle = document.createElement('button');
							const icon = '<i class="far fa-plus-square"></i>';
							const id = $faq.attr('id');

							$(toggle).css('background', 'none');
							$(toggle).css('border', 'none');
							$(toggle).attr('role', 'switch');
							$(toggle).attr('aria-checked', 'false');
							$(toggle).addClass('answer-toggle');
							$(toggle).css('margin-left', '1rem');
							$(toggle).html(icon);

							$(question).wrap('<a class="anchor-toggle" href="#' + id + '"></a>');
							$(question).css('display', 'flex');
							$(question).css('justify-content', 'space-between');
							$(question).css('align-items', 'center');

							$(question).append(toggle);

							if (settings.allShowing) {
								toggleAnswer($faq, true);
							}
						}
					}

					const loadFAQs = function ($faqs) {
						$faqs.each(function () {
							const question = $(this).find('.schema-faq-question')[0];

							addInitialAnswerToggle(question);
							addToggleEventHandler(question);

						});
					}
					loadFAQs($sections.children());

					const loadToggleForFullList = function (section) {
						if (settings.enableToggling) {
							const $filterContainer = $('<div class="filter-container"></div>');
							const $buttonContainer = $('<div class="toggle-all-container"></div>');
							const $button = $('<button class="answers-showing">Hide all answers <i class="far fa-minus-square"></i></button>');

							$filterContainer.css('display', 'flex');
							$filterContainer.css('flex-wrap', 'wrap');
							$filterContainer.css('justify-content', 'space-between');
							$buttonContainer.css('display', 'flex');
							$buttonContainer.css('flex', '1');
							$buttonContainer.css('justify-content', 'flex-end');
							$button.css('background', 'none');
							$button.css('border', 'none');
							$button.css('padding', '1rem 6px');
							$button.css('font-size', '2rem');
							$button.addClass('all-answer-toggle');

							function toggleFullList() {
								const answersShowing = $button.hasClass('answers-showing');
								const $answers = $(section).find('.schema-faq-answer');

								$answers.each(function () {

									if (answersShowing) {
										$button.removeClass('answers-showing');
										toggleAnswer($(this).parent(), false, true);
									} else {
										$button.addClass('answers-showing');
										toggleAnswer($(this).parent(), true, false);
									}

								});
							}

							function hideAnswersOnLoad() {
								if (!settings.allShowing) {
									toggleFullList();
								}
							}
							hideAnswersOnLoad();

							$button.on('click', function () {
								toggleFullList();

								if ($button.hasClass('answers-showing')) {
									$button.html('Hide all answers <i class="far fa-minus-square"></i>');
								} else {
									$button.html('Show all answers <i class="far fa-plus-square"></i>');
								}
							});

							$(section).css('margin-top', '0');
							$filterContainer.insertBefore(section);
							$('.filter-container').append($buttonContainer);
							$('.toggle-all-container').append($button);

						} else {
							$(section).css('margin-top', '0');
						}
					}
					loadToggleForFullList(this);

					const loadSearchContainer = function () {
						if (settings.enableSearch) {
							const $container = $('.filter-container');
							const $toggleContainer = $('.toggle-all-container');
							const $searchContainer = $('<div class="search-container"><div id="search-3" class="widget widget_search" style="display:none;"><form role="search" method="get" class="search-form" action="https://www.structuralpanels.ca/"><label><span class="screen-reader-text"></span><input type="search" class="search-field form-control" placeholder="Search …" value="" name="s"></label><button type="submit" class="search-submit"><i class="fa fa-search"></i></button></form></div></div>');

							$searchContainer.css('flex', '1');

							if ($toggleContainer.length > 0) {
								$searchContainer.insertBefore($toggleContainer);
							} else {
								$searchContainer('margin-right', 'auto');
								$container.append($searchContainer);
							}
						}
					};
					loadSearchContainer();

				});
			}
		}
		// Initialize Yoast Faq Toggling
		extendFaqYoastFunctionality($('.schema-faq'));


		function extendMediaGalleryFunctionality($items) {
			if ($items.length > 0) {
				$items.attr('target', '_blank');
			}
		}
		extendMediaGalleryFunctionality($('.wp-block-gallery.is-cropped').find('.blocks-gallery-item a'));



	});
});
