"use strict";
jQuery.each(portfolio_param_obj, function (index, value) {
    if (!isNaN(value)) {
        portfolio_param_obj[index] = parseInt(value);
    }
});
function Portfolio_Gallery_Store(id) {
    var _this = this;
    _this.body = jQuery('body');
    _this.container = jQuery('#' + id + '.view-store');
    _this.title_block=_this.container.find('.huge_it_container-title');
    _this.image_block=_this.container.find('.huge_it_main-carousel-wrapper');
    _this.description_block=_this.container.find('.huge_it_container-details');
    _this.thumbnail_block=_this.container.find('.huge_it_thumbnail-carousel  ');
    _this.thumbnail_ul=_this.container.find('.huge_it_thumbnail-carousel ul ');
    _this.thumbnail_li=_this.container.find('.huge_it_thumbnail-carousel ul li');
    _this.element = _this.container.find('.portelement');
    _this.defaultBlockWidth= portfolio_param_obj.portfolio_gallery_ht_view8_width;
    _this.thumbnail_image=_this.container.find('.huge_it_thumbnail-carousel ul li a ');
    _this.main_image=_this.container.find('.huge_it_main-image-carousel img ');
    _this.next_button=_this.container.find('.huge_it_thumbnail-next-button');
    _this.prev_button=_this.container.find('.huge_it_thumbnail-prev-button');
    _this.optionsBlock = _this.container.parent().find('div[id^="huge_it_portfolio_options_"]');
    _this.filtersBlock = _this.container.parent().find('div[id^="huge_it_portfolio_filters_"]');
    _this.optionSets = _this.optionsBlock.find('.option-set');
    _this.optionLinks = _this.optionSets.find('a');
    _this.zoomedImage=jQuery('.rwd-img-wrap img');
    _this.sortBy = _this.optionsBlock.find('#sort-by');
    _this.filterButton = _this.filtersBlock.find('ul li');
    _this.hasLoading = _this.container.data("show-loading") == "on";
    _this.optionsBlock = _this.container.parent().find('div[id^="huge_it_portfolio_options_"]');
    _this.filtersBlock = _this.container.parent().find('div[id^="huge_it_portfolio_filters_"]');
    _this.content = _this.container.parent();
    if (_this.container.data('show-center') == 'on' && ( ( !_this.content.hasClass('sortingActive') && !_this.content.hasClass('filteringActive') )
        || ( _this.optionsBlock.data('sorting-position') == 'top' && _this.filtersBlock.data('filtering-position') == 'top' ) ||
        ( _this.optionsBlock.data('sorting-position') == 'top' && !_this.content.hasClass('filteringActive') ) || ( !_this.content.hasClass('sortingActive') && _this.filtersBlock.data('filtering-position') == 'top' ) )) {
        _this.isCentered = _this.container.data("show-center");
    }
    _this.documentReady = function () {
        var options = {
            itemSelector: _this.element,
            masonry: {
                columnWidth: _this.defaultBlockWidth + 15 + portfolio_param_obj.portfolio_gallery_ht_view8_border_width * 2,
            },
            masonryHorizontal: {
                rowHeight: 300 + 15
            },
            cellsByRow: {
                columnWidth: 300 + 15,
                rowHeight: 240
            },
            cellsByColumn: {
                columnWidth: 300 + 15,
                rowHeight: 240
            },
            getSortData: {
                symbol: function ($elem) {
                    return $elem.attr('data-symbol');
                },
                category: function ($elem) {
                    return $elem.attr('data-category');
                },
                number: function ($elem) {
                    return parseInt($elem.find('.number').text(), 10);
                },
                weight: function ($elem) {
                    return parseFloat($elem.find('.weight').text().replace(/[\(\)]/g, ''));
                },
                id: function ($elem) {
                    return $elem.find('.id').text();
                }
            }
        };
        portfolioGalleryIsotope(_this.container);
        portfolioGalleryIsotope(_this.container,options);


        _this.container.find('img').on('load', function () {
            portfolioGalleryIsotope(_this.container,'layout');
        });
    };

    _this.resizeEvent = function () {
        _this.showCenter();
        var loadInterval = setInterval(function(){
            portfolioGalleryIsotope(_this.container,'layout');
        },100);
        setTimeout(function(){clearInterval(loadInterval);},5000);
    };
    _this.showCenter = function () {
        if (_this.isCentered) {
            var count = _this.element.length;
            var elementwidth = _this.defaultBlockWidth + 15 + portfolio_param_obj.portfolio_gallery_ht_view8_border_width * 2;
            var enterycontent = _this.content.width();
            var whole = Math.floor(enterycontent / elementwidth);
            if (whole > count) whole = count;
            if (whole == 0) {
                return false;
            }
            else {
                var sectionwidth = whole * elementwidth ;
            }

            _this.container.width(sectionwidth).css({
                "margin": "0px auto",
                "overflow": "hidden"
            });
        }
    };

    _this.optionsClick = function () {
        var $this = jQuery(this);

        if ($this.hasClass('selected')) {
            return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');


        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');

        value = value === 'false' ? false : value;
        options[key] = value;
        if (key === 'layoutMode' && typeof changeLayoutMode === 'function') {

            changeLayoutMode($this, options)
        } else {

            portfolioGalleryIsotope(_this.container,options);
        }

        return false;
    };
    _this.randomClick = function () {
        portfolioGalleryIsotope(_this.container,'shuffle');
        _this.sortBy.find('.selected').removeClass('selected');
        _this.sortBy.find('[data-option-value="random"]').addClass('selected');
        return false;
    };
    _this.filtersClick = function () {
        _this.filterButton.each(function () {
            jQuery(this).removeClass('active');
        });
        jQuery(this).addClass('active');
        // get filter value from option value
        var filterValue = jQuery(this).attr('rel');
        // use filterFn if matches value
        filterValue = filterValue;
        portfolioGalleryIsotope(_this.container,{filter: filterValue});
    };
    _this.addEventListeners = function () {
        _this.optionLinks.on('click', _this.optionsClick);
        _this.optionsBlock.find('#shuffle a').on('click', _this.randomClick);
        _this.filterButton.on('click', _this.filtersClick);
        jQuery(window).resize(_this.resizeEvent);


    };


    _this.init = function () {
        _this.showCenter();
        _this.documentReady();
        _this.addEventListeners();
    };

    this.init();

    _this.thumbnail_image.each(function () {
        if(jQuery(this).hasClass('responsive_lightbox' ))
        {
            jQuery(this).removeClass('responsive_lightbox' );
        }

    });

    _this.thumbnail_image.each(function () {
        jQuery(this).click(function (e) {
            e.preventDefault();
            var thumb_src = jQuery(this).attr('href');
            _this.main_image.attr("src", thumb_src);
            _this.main_image.parent().attr("href", thumb_src);

        });
    });
    var position = 0;
    var count = _this.thumbnail_li.length;
    var height=  _this.thumbnail_li.height();
    var n = 1;  var k = 1;
    // var count =1;
    // var position = 0;
    _this.next_button.on('click', function () {


        _this.thumbnail_ul.animate({scrollTop:200},300,'linear',function(){
            jQuery(this).scrollTop(0).find('li:first').before(jQuery('li:last', this));
        });

        // if (n > count - 5) {
        //     n = 1;
        //     _this.thumbnail_ul.css('transform', 'translate3d(0px, -' + ( n * (height + 4) ) + 'px, 0px)');
        //     n++;
        //
        // }
        // else
        //     if (n <= count - 5) {
        //     _this.thumbnail_ul.css('transform', 'translate3d(0px, -' + ( n * (height + 4) ) + 'px, 0px)');
        //     n++;
        // }


     //
     // //   _this.thumbnail_ul.css('margin-top',  (height + 4) + 'px');
     //
     //    position = Math.max(position - height * count, -height * (countLi - count));
     //
     //    _this.thumbnail_ul.css('margin-top', position + 'px');
    });

    _this.prev_button.on('click', function () {

        _this.thumbnail_ul.animate({scrollTop: 200}, 300, 'linear', function () {
            jQuery(this).scrollTop(0).find('li:last').after(jQuery('li:first', this));
        });


        // if (k > count - 5) {
        //     k = 1;
        //     if (k <= count - 5) {
        //         _this.thumbnail_ul.css('transform', 'translate3d(0px, -' + ( k * ( height + 4 )) + 'px, 0px)');
        //         k++;
        //     }
        // }
        // else
        // if (k <= count - 5) {
        //     _this.thumbnail_ul.css('transform', 'translate3d(0px, -' + ( k * (height + 4 )) + 'px, 0px)');
        //     k++;
        // }


      //  _this.thumbnail_ul.css('margin-bottom',  (height + 4) + 'px');
      //
      //   position = Math.min(position + height * count, 0);
      //   _this.thumbnail_ul.css('margin-bottom', position + 'px');
    });


}
    var portfolios=[];
jQuery(document).ready(function () {


    jQuery(".view-store").each(function (i) {
        var id = jQuery(this).attr('id');
        portfolios[i]  = new Portfolio_Gallery_Store(id);
    });
});

