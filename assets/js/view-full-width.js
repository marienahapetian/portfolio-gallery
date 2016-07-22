/**
 * Created by User on 7/14/2016.
 */
jQuery.each(param_obj, function (index, value) {
    if (!isNaN(value)) {
        param_obj[index] = parseInt(value);
    }
});

function Portfolio_Gallery_Full_Width(id) {
    var _this = this;
    _this.container = jQuery('#' + id + '.view-full-width');
    _this.hasLoading = _this.container.data("show-loading") == "on" ? true : false;
    _this.optionsBlock = _this.container.parent().find('div[id^="huge_it_portfolio_options_"]');
    _this.filtersBlock = _this.container.parent().find('div[id^="huge_it_portfolio_filters_"]');
    _this.content = _this.container.parent();
    _this.element = _this.container.find('.portelement');
    _this.defaultBlockWidth = param_obj.ht_view3_mainimage_width;
    _this.optionSets = _this.optionsBlock.find('.option-set'),
        _this.optionLinks = _this.optionSets.find('a');
    _this.sortBy = _this.optionsBlock.find('#sort-by');
    _this.filterButton = _this.filtersBlock.find('ul li');
    if (_this.container.data('show-center') == 'on' && ( ( !_this.content.hasClass('sortingActive') && !_this.content.hasClass('filteringActive') )
        || ( _this.optionsBlock.data('sorting-position') == 'top' && _this.filtersBlock.data('filtering-position') == 'top' ) ||
        ( _this.optionsBlock.data('sorting-position') == 'top' && _this.filtersBlock.data('filtering-position') == '' ) || ( _this.optionsBlock.data('sorting-position') == '' && _this.filtersBlock.data('filtering-position') == 'top' ) )) {
        _this.isCentered = _this.container.data("show-center") == "on" ? true : false;
    }
    _this.documentReady = function () {
        _this.container.hugeitmicro({
            itemSelector: _this.element,
            masonry: {
                columnWidth: _this.defaultBlockWidth + 20 + param_obj.ht_view3_element_border_width * 2,
            },
            masonryHorizontal: {
                rowHeight: 300 + 20
            },
            cellsByRow: {
                columnWidth: 300 + 20,
                rowHeight: 240
            },
            cellsByColumn: {
                columnWidth: 300 + 20,
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
        });
        setInterval(function(){
            _this.container.hugeitmicro('reLayout');
        });
    };

    _this.manageLoading = function () {
        if (_this.hasLoading) {
            _this.container.css({'opacity': 1});
            _this.optionsBlock.css({'opacity': 1});
            _this.filtersBlock.css({'opacity': 1});
            _this.content.find('div[id^="huge-it-container-loading-overlay_"]').css('display', 'none');
        }
    };




    _this.addEventListeners = function () {
        _this.optionLinks.on('click', _this.optionsClick);
        _this.optionsBlock.find('#shuffle a').on('click',_this.randomClick);
        _this.filterButton.on('click', _this.filtersClick);
        jQuery(window).resize(_this.resizeEvent);


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

            _this.container.hugeitmicro(options);
        }

        return false;
    };
    _this.randomClick = function () {
        _this.container.hugeitmicro('shuffle');
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
        _this.container.hugeitmicro({filter: filterValue});
    };

    _this.init = function () {
        jQuery(window).load(_this.manageLoading);
        _this.documentReady();
        _this.addEventListeners();
    };

    this.init();
}
var portfolios = [];
jQuery(document).ready(function () {
    jQuery(".huge_it_portfolio_container.view-full-width").each(function (i) {
        var id = jQuery(this).attr('id');
        portfolios[i] = new Portfolio_Gallery_Full_Width(id);
    });
});
// var defaultBlockWidth =<?php echo $paramssld['ht_view3_mainimage_width']; ?>;
// var $container = jQuery('#huge_it_portfolio_container_<?php echo $portfolioID; ?>');

//
// $container.hugeitmicro({
//     itemSelector: '.portelement_<?php echo $portfolioID; ?>',
//     masonry: {
//         columnWidth: <?php echo $paramssld['ht_view3_mainimage_width']; ?>+20 +<?php echo $paramssld['ht_view3_element_border_width'] * 2; ?>
// },
// masonryHorizontal: {
//     rowHeight: 300 + 20
// },
// cellsByRow: {
//     columnWidth: 300 + 20,
//         rowHeight: 240
// },
// cellsByColumn: {
//     columnWidth: 300 + 20,
//         rowHeight: 240
// },
// getSortData: {
//     symbol: function ($elem) {
//         return $elem.attr('data-symbol');
//     },
//     category: function ($elem) {
//         return $elem.attr('data-category');
//     },
//     number: function ($elem) {
//         return parseInt($elem.find('.number').text(), 10);
//     },
//     weight: function ($elem) {
//         return parseFloat($elem.find('.weight').text().replace(/[\(\)]/g, ''));
//     },
//     id: function ($elem) {
//         return $elem.find('.id').text();
//     }
// }
// });
//
//
// var $optionSets = jQuery('#huge_it_portfolio_options_<?php echo $portfolioID; ?> .option-set'),
//     $optionLinks = $optionSets.find('a');
//
// $optionLinks.click(function () {
//     var $this = jQuery(this);
//
//     if ($this.hasClass('selected')) {
//         return false;
//     }
//     var $optionSet = $this.parents('.option-set');
//     $optionSet.find('.selected').removeClass('selected');
//     $this.addClass('selected');
//
//
//     var options = {},
//         key = $optionSet.attr('data-option-key'),
//         value = $this.attr('data-option-value');
//
//     value = value === 'false' ? false : value;
//     options[key] = value;
//     if (key === 'layoutMode' && typeof changeLayoutMode === 'function') {
//
//         changeLayoutMode($this, options)
//     } else {
//
//         $container.hugeitmicro(options);
//     }
//
//     return false;
// });
//
//
// var isHorizontal = false;
//
// function changeLayoutMode($link, options) {
//     var wasHorizontal = isHorizontal;
//     isHorizontal = $link.hasClass('horizontal');
//
//     if (wasHorizontal !== isHorizontal) {
//
//         var style = isHorizontal ?
//         {height: '75%', width: $container.width()} :
//         {width: 'auto'};
//
//         $container.filter(':animated').stop();
//
//         $container.addClass('no-transition').css(style);
//         setTimeout(function () {
//             $container.removeClass('no-transition').hugeitmicro(options);
//         }, 100)
//     } else {
//         $container.hugeitmicro(options);
//     }
// }
//
// $container.delegate('.default-block_<?php echo $portfolioID; ?>', 'click', function () {
//     var strheight = 0;
//     jQuery(this).parents('.portelement_<?php echo $portfolioID; ?>').find('.wd-portfolio-panel_<?php echo $portfolioID; ?> > div').each(function () {
//         strheight += jQuery(this).outerHeight() + 10;
//         //alert(strheight);
//     })
//     strheight +=<?php echo $paramssld['ht_view0_block_height'] + 45; ?>;
//     if (jQuery(this).parents('.portelement_<?php echo $portfolioID; ?>').hasClass("large")) {
//         jQuery(this).parents('.portelement_<?php echo $portfolioID; ?>').animate({
//             height: "<?php echo $paramssld['ht_view0_block_height'] + 45; ?>px"
//         }, 300, function () {
//             jQuery(this).removeClass('large');
//             $container.hugeitmicro('reLayout');
//         });
//
//         jQuery(this).parents('.portelement_<?php echo $portfolioID; ?>').removeClass("active");
//         return false;
//     }
//
//
//     jQuery(this).parents('.portelement_<?php echo $portfolioID; ?>').css({height: strheight});
//     jQuery(this).parents('.portelement_<?php echo $portfolioID; ?>').addClass('large');
//
//     $container.hugeitmicro('reLayout');
//     jQuery(this).parents('.portelement_<?php echo $portfolioID; ?>').css({height: "<?php echo $paramssld['ht_view0_block_height'] + 45; ?>px"});
//
//     //alert(strheight);
//
//     jQuery(this).parents('.portelement_<?php echo $portfolioID; ?>').animate({
//         height: strheight + "px",
//     }, 300, function () {
//         $container.hugeitmicro('reLayout');
//     });
// });
//
// var $sortBy = jQuery('#huge_it_portfolio_content_<?php echo $portfolioID; ?> #sort-by');
// jQuery('#huge_it_portfolio_content_<?php echo $portfolioID; ?> #shuffle a').click(function () {
//     $container.hugeitmicro('shuffle');
//     $sortBy.find('.selected').removeClass('selected');
//     $sortBy.find('[data-option-value="random"]').addClass('selected');
//     return false;
// });
//
// ////filteringgggggg
//
// // bind filter on select change
// jQuery(document).ready(function () {
//     jQuery('#huge_it_portfolio_filters_<?php echo $portfolioID; ?> ul li').click(function () {
//         // get filter value from option value
//         var filterValue = jQuery(this).attr('rel');
//         // use filterFn if matches value
//         filterValue = filterValue;//filterFns[ filterValue ] ||
//         $container.hugeitmicro({filter: filterValue});
//     });
// });
//
// //end of filtering
//
// jQuery(window).load(function () {
//     $container.hugeitmicro('reLayout');
//     jQuery(window).resize(function () {
//         $container.hugeitmicro('reLayout');
//     });
//     <?php if($portfolioShowLoading == 'on'){?>
//         jQuery('#huge_it_portfolio_container_<?php echo $portfolioID; ?>').css({'opacity': 1});
//         jQuery('#huge_it_portfolio_content_<?php echo $portfolioID; ?> #huge_it_portfolio_options_<?php echo $portfolioID; ?>').css({'opacity': 1});
//         ;
//         jQuery('#huge_it_portfolio_content_<?php echo $portfolioID; ?> #huge_it_portfolio_filters_<?php echo $portfolioID; ?>').css({'opacity': 1});
//         ;
//         jQuery('#huge-it-container-loading-overlay_<?php echo $portfolioID; ?>').css('display', 'none');
//     <?php }?>
// });