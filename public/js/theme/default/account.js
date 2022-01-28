// // App
// const App = function () {
//
//     let $html,
//         $body,
//         $header,
//         $main;
//
//     const init = function () {
//         // Set variables
//         $html = jQuery('html');
//         $body = jQuery('body');
//         $header = jQuery('#header-navbar');
//         $main = jQuery('#main-container');
//     };
//
//     return {
//         init: function ($mode) {
//             init();
//         }
//     };
// }();
//
// // Initialize app when page loads
// jQuery(function () {
//     App.init();
// });
//


// App
const App = function () {
    let $html,
        $body,
        $page,
        $header,
        $main;

    const init = function () {
        $html = jQuery('html');
        $body = jQuery('body');
        $page = jQuery('#page-container');
        $header = jQuery('#header-navbar');
        $main = jQuery('#main-container');

        /**  Dropdown */
        jQuery('.ui.dropdown').dropdown({allowAdditions: true});

        /**  Menu Tab */
        jQuery('.menu .item').tab();

        /**  Accordion */
        jQuery('.accordion').accordion({
            selector: {trigger: '.title'}
        });

        /**  Radio Checkbox */
        jQuery('.ui.radio.checkbox').checkbox();

        /**  Popup */
        jQuery('.inline.icon').popup({inline: true});

        /**  Message Close */
        jQuery('.message .close').on('click', function() {
            $(this).closest('.message').transition('fade');
        });

        options(false, 'init');

        jQuery('[data-toggle="option"]').on('click', function(){
            options(jQuery(this).closest('.block'), jQuery(this).data('action'));
        });
    };

    const draggable = function(){
        jQuery('.draggable-items > .draggable-column').sortable({
            connectWith: '.draggable-column',
            items: '.draggable-item',
            dropOnEmpty: true,
            opacity: .75,
            handle: '.draggable-handler',
            placeholder: 'draggable-placeholder',
            tolerance: 'pointer',
            start: function(e, ui){
                ui.placeholder.css({
                    'height': ui.item.outerHeight(),
                    'margin-bottom': ui.item.css('margin-bottom')
                });
            }
        });
    };

    const options = function($block, $mode) {
        // Set default icons for fullscreen and content toggle buttons
        const $iconFullscreen         = 'expand icon';
        const $iconFullscreenActive   = 'compress icon';
        const $iconContent            = 'bx bx-up-arrow-circle';
        const $iconContentActive      = 'bx bx-down-arrow-circle';

        if ($mode === 'init') {
            jQuery('[data-toggle="option"][data-action="fullscreen"]').each(function(){
                const $this = jQuery(this);

                $this.html('<i class="' + (jQuery(this).closest('.block').hasClass('option-fullscreen') ? $iconFullscreenActive : $iconFullscreen) + '"></i>');
            });

            jQuery('[data-toggle="option"][data-action="toggle"]').each(function(){
                const $this = jQuery(this);

                $this.html('<i class="' + ($this.closest('.block').hasClass('option-hidden') ? $iconContentActive : $iconContent) + '"></i>');
            });
        } else {
            const $elBlock = ($block instanceof jQuery) ? $block : jQuery($block);
            
            if ($elBlock.length) {
                const $btnFullscreen  = jQuery('[data-toggle="option"][data-action="fullscreen"]', $elBlock);
                const $btnToggle      = jQuery('[data-toggle="option"][data-action="toggle"]', $elBlock);
                
                switch($mode) {
                    case 'fullscreen':
                        $elBlock.toggleClass('option-fullscreen');
                        
                        if ($btnFullscreen.length) {
                            if ($elBlock.hasClass('option-fullscreen')) {
                                jQuery('i', $btnFullscreen)
                                    .removeClass($iconFullscreen)
                                    .addClass($iconFullscreenActive);
                            } else {
                                jQuery('i', $btnFullscreen)
                                    .removeClass($iconFullscreenActive)
                                    .addClass($iconFullscreen);
                            }
                        }
                        break;
                    case 'fullscreen_on':
                        $elBlock.addClass('option-fullscreen');
                        
                        if ($btnFullscreen.length) {
                            jQuery('i', $btnFullscreen)
                                .removeClass($iconFullscreen)
                                .addClass($iconFullscreenActive);
                        }
                        break;
                    case 'fullscreen_off':
                        $elBlock.removeClass('option-fullscreen');
                        
                        if ($btnFullscreen.length) {
                            jQuery('i', $btnFullscreen)
                                .removeClass($iconFullscreenActive)
                                .addClass($iconFullscreen);
                        }
                        break;
                    case 'toggle':
                        $elBlock.toggleClass('option-hidden');
                        
                        if ($btnToggle.length) {
                            if ($elBlock.hasClass('option-hidden')) {
                                jQuery('i', $btnToggle)
                                    .removeClass($iconContent)
                                    .addClass($iconContentActive);
                            } else {
                                jQuery('i', $btnToggle)
                                    .removeClass($iconContentActive)
                                    .addClass($iconContent);
                            }
                        }
                        break;
                    case 'hide':
                        $elBlock.addClass('option-hidden');
                        
                        if ($btnToggle.length) {
                            jQuery('i', $btnToggle)
                                .removeClass($iconContent)
                                .addClass($iconContentActive);
                        }
                        break;
                    case 'show':
                        $elBlock.removeClass('option-hidden');

                        if ($btnToggle.length) {
                            jQuery('i', $btnToggle)
                                .removeClass($iconContentActive)
                                .addClass($iconContent);
                        }
                        break;
                    case 'refresh':
                        $elBlock.toggleClass('option-refresh');
                        break;
                    case 'loading':
                        $elBlock.addClass('option-refresh');
                        break;
                    case 'normal':
                        $elBlock.removeClass('option-refresh');
                        break;
                    case 'close':
                        $elBlock.hide();
                        break;
                    case 'open':
                        $elBlock.show();
                        break;
                    default:
                        return false;
                }
            }
        }
    };

    const nav = function () {
        jQuery("#top-menu .tab a").each(function () {
            let pageUrl = window.location.href.split(/[?#]/)[0];

            if (this.href === pageUrl) {
                let tab = $(this).addClass("active").parent().parent().addClass("active").attr('data-tab');
                $('a[data-tab="' + tab + '"]').addClass("active");
            }
        });
    };

    const calendar = function () {
        jQuery('.datepicker').add('.input-daterange').datepicker({
            weekStart: 1,
            autoclose: true,
            todayHighlight: true
        });
    };

    const alert = function () {
        $(".swal").on("click", function () {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this data!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d26a5c",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false,
                html: false
            }, function () {
                document.forms.form.submit();
            });
        });
    };

    const form = function () {
        // jQuery('.form-material.floating > .form-control').each(function () {
        //     var $input = jQuery(this);
        //     var $parent = $input.parent('.form-material');
        //
        //     if ($input.val()) {
        //         $parent.addClass('open');
        //     }
        //
        //     $input.on('change', function () {
        //         if ($input.val()) {
        //             $parent.addClass('open');
        //         } else {
        //             $parent.removeClass('open');
        //         }
        //     });
        // });
        //
        // jQuery('.validation').validate({
        //     ignore: [],
        //     errorClass: 'help-block text-right animated fadeInDown',
        //     errorElement: 'div',
        //     errorPlacement: function (error, e) {
        //         jQuery(e).parents('.form-group > div').append(error);
        //     },
        //     highlight: function (e) {
        //         var elem = jQuery(e);
        //
        //         elem.closest('.form-group').removeClass('has-error').addClass('has-error');
        //         elem.closest('.help-block').remove();
        //     },
        //     success: function (e) {
        //         var elem = jQuery(e);
        //
        //         elem.closest('.form-group').removeClass('has-error');
        //         elem.closest('.help-block').remove();
        //     }
        // });
    };

    const table = function () {
        jQuery('.table-checkbox').each(function () {
            const $table = jQuery(this);

            jQuery('thead input:checkbox', $table).on('click', function () {
                const $checkedStatus = jQuery(this).prop('checked');

                jQuery('tbody input:checkbox', $table).each(function () {
                    const $checkbox = jQuery(this);

                    $checkbox.prop('checked', $checkedStatus);
                    checkbox($checkbox, $checkedStatus);
                });
            });

            jQuery('tbody input:checkbox', $table).on('click', function () {
                const $checkbox = jQuery(this);

                checkbox($checkbox, $checkbox.prop('checked'));
            });

            jQuery('tbody > tr', $table).on('click', function (e) {
                if (e.target.type !== 'checkbox'
                    && e.target.type !== 'button'
                    && e.target.tagName.toLowerCase() !== 'a'
                    && !jQuery(e.target).parent('label').length) {
                    const $checkbox = jQuery('input:checkbox', this);
                    const $checked = $checkbox.prop('checked');

                    $checkbox.prop('checked', !$checked);
                    checkbox($checkbox, !$checked);
                }
            });
        });

        jQuery('.table-sections').each(function(){
            const $table = jQuery(this);

            jQuery('.table-sections > th', $table).on('click', function(e) {
                const $row    = jQuery(this);
                const $tbody  = $row.parent('tbody');

                if (! $tbody.hasClass('open')) {
                    jQuery('tbody', $table).removeClass('open');
                }

                $tbody.toggleClass('open');
            });
        });
    };

    const select = function () {
        jQuery('.select2').select2();
    };

    const loader = function($mode) {
        let $pageLoader = jQuery('#page-loader');

        if ($mode === 'show') {
            if ($pageLoader.length) {
                $pageLoader.fadeIn(250);
            } else {
                $body.prepend('<div id="page-loader"></div>');
            }
        } else if ($mode === 'hide') {
            if ($pageLoader.length) {
                $pageLoader.fadeOut(250);
            }
        }

        return false;
    };

    const toggle = function () {
        jQuery('[data-toggle="class-toggle"]').on('click', function(){
            const $el = jQuery(this);

            jQuery($el.data('target').toString()).toggleClass($el.data('class').toString());

            if ($html.hasClass('no-focus')) {
                $el.blur();
            }
        });
    };

    const checkbox = function($checkbox, $checked) {
        $checked
            ? $checkbox.closest('tr').addClass('active')
            : $checkbox.closest('tr').removeClass('active');
    };

    const print = function() {
        const $pageCls = $page.prop('class');

        $page.prop('class', '');

        window.print();

        $page.prop('class', $pageCls);
    };











    // Layout API
    const layout = function($mode) {
        // Mode selection

        jQuery('[data-toggle="layout"]').on('click', function(){
            const $btn = jQuery(this);
            $mode = $btn.data('action');


            const $window = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

            switch($mode) {
                case 'sidebar_pos_toggle':
                    $page.toggleClass('sidebar-l sidebar-r');
                    break;
                case 'sidebar_pos_left':
                    $page
                        .removeClass('sidebar-r')
                        .addClass('sidebar-l');
                    break;
                case 'sidebar_pos_right':
                    $page
                        .removeClass('sidebar-l')
                        .addClass('sidebar-r');
                    break;
                case 'sidebar_toggle':
                        $page.toggleClass('sidebar-o');
                    break;
                case 'sidebar_open':
                        $page.addClass('sidebar-o');
                    break;
                case 'sidebar_close':
                        $page.removeClass('sidebar-o');
                    break;
                case 'sidebar_mini_toggle':
                    if ($window > 991) {
                        $page.toggleClass('sidebar-mini');
                    }
                    break;
                case 'sidebar_mini_on':
                    if ($window > 991) {
                        $page.addClass('sidebar-mini');
                    }
                    break;
                case 'sidebar_mini_off':
                    if ($window > 991) {
                        $page.removeClass('sidebar-mini');
                    }
                    break;
                case 'side_overlay_toggle':
                    $page.toggleClass('side-overlay-o');
                    break;
                case 'side_overlay_open':
                    $page.addClass('side-overlay-o');
                    break;
                case 'side_overlay_close':
                    $page.removeClass('side-overlay-o');
                    break;
                case 'side_overlay_hoverable_toggle':
                    $page.toggleClass('side-overlay-hover');
                    break;
                case 'side_overlay_hoverable_on':
                    $page.addClass('side-overlay-hover');
                    break;
                case 'side_overlay_hoverable_off':
                    $page.removeClass('side-overlay-hover');
                    break;
                default:
                    return false;
            }

            if ($html.hasClass('no-focus')) {
                $btn.blur();
            }
        });


    };









    return {
        init: function ($func) {
            switch ($func) {
                case 'init':
                    init();
                    break;
                case 'nav':
                    nav();
                    break;
                case 'form':
                    form();
                    break;
                case 'toggle':
                    toggle();
                    break;
                case 'options':
                    options();
                    break;
                case 'loader':
                    loader('hide');
                    break;
                default:
                    init();
                    nav();
                    form();
                    toggle();
                    options();
                    loader('hide');
            }
        },
        loader: function ($mode) {
            loader($mode);
        },
        options: function($block, $mode) {
            options($block, $mode);
        },
        layout: function($mode) {
            layout($mode);
        },
        vendor: function ($vendor) {
            switch ($vendor) {
                case 'table':
                    table();
                    break;
                case 'draggable':
                    draggable();
                    break;
                case 'calendar':
                    calendar();
                    break;
                case 'select':
                    select();
                    break;
                case 'alert':
                    alert();
                    break;
                default:
                    return false;
            }
        },
        vendors: function ($vendors) {
            if ($vendors instanceof Array) {
                for (let $index in $vendors) {
                    App.vendor($vendors[$index]);
                }
            } else {
                App.vendor($vendors);
            }
        }
    };
}();

// Initialize app when page loads
jQuery(function () {
    App.init();
    App.vendor('draggable');
    App.layout('side_overlay_close');
});
jQuery('.ui.sticky')
    .sticky({
        context: '#flow-editor'
    })
;