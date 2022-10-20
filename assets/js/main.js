jQuery(document).ready(function($){
    $('.menu__icon').click(function(event) {
       $('.header__menu').toggleClass('open');
       $('body').toggleClass('_lock');
    });
});

jQuery(document).ready(function($){
    $('.filter_prod_img').click(function(event) {
        $('.filter_prod_filter').toggleClass('open');
    });
});
jQuery(document).ready(function($){
    $('.filter_prod_img').click(function(event) {
        $('.filter_prod_filter').toggleClass('open');
    });
});
jQuery(document).ready(function($){
    $('.second_content').click(function(event) {
        $('.tc-extra-product-options').toggleClass('open');
    });
    // $('.tmcp-field-wrap').click(function(event) {
    //     $('.tc-extra-product-options').removeClass('open');
    // });

});

jQuery(document).ready(function($){

});

jQuery(document).ready(function($){
    $('.wpcf7-intl-tel').on('input', function() {
        $(this).val($(this).val().replace(/[A-Za-zА-Яа-яЁё-і]/, ''))
    });
});

jQuery(function($){
    $(window).scroll(function() {
        var height = $(window).scrollTop();
        /*Если сделали скролл на 100px задаём новый класс для header*/
        if(height > 20){
            $('header').addClass('header_shadow');
        } else{
            /*Если меньше 100px удаляем класс для header*/
            $('header').removeClass('header_shadow');
        }
    });
});


// Dynamic Adapt v.1
// HTML data-da="where(uniq class name),position(digi),when(breakpoint)"
// e.x. data-da="item,2,992"

"use strict";

(function () {
    let originalPositions = [];
    let daElements = document.querySelectorAll('[data-da]');
    let daElementsArray = [];
    let daMatchMedia = [];
    //Заполняем массивы
    if (daElements.length > 0) {
        let number = 0;
        for (let index = 0; index < daElements.length; index++) {
            const daElement = daElements[index];
            const daMove = daElement.getAttribute('data-da');
            if (daMove != '') {
                const daArray = daMove.split(',');
                const daPlace = daArray[1] ? daArray[1].trim() : 'last';
                const daBreakpoint = daArray[2] ? daArray[2].trim() : '767';
                const daType = daArray[3] === 'min' ? daArray[3].trim() : 'max';
                const daDestination = document.querySelector('.' + daArray[0].trim())
                if (daArray.length > 0 && daDestination) {
                    daElement.setAttribute('data-da-index', number);
                    //Заполняем массив первоначальных позиций
                    originalPositions[number] = {
                        "parent": daElement.parentNode,
                        "index": indexInParent(daElement)
                    };
                    //Заполняем массив элементов
                    daElementsArray[number] = {
                        "element": daElement,
                        "destination": document.querySelector('.' + daArray[0].trim()),
                        "place": daPlace,
                        "breakpoint": daBreakpoint,
                        "type": daType
                    }
                    number++;
                }
            }
        }
        dynamicAdaptSort(daElementsArray);

        //Создаем события в точке брейкпоинта
        for (let index = 0; index < daElementsArray.length; index++) {
            const el = daElementsArray[index];
            const daBreakpoint = el.breakpoint;
            const daType = el.type;

            daMatchMedia.push(window.matchMedia("(" + daType + "-width: " + daBreakpoint + "px)"));
            daMatchMedia[index].addListener(dynamicAdapt);
        }
    }
    //Основная функция
    function dynamicAdapt(e) {
        for (let index = 0; index < daElementsArray.length; index++) {
            const el = daElementsArray[index];
            const daElement = el.element;
            const daDestination = el.destination;
            const daPlace = el.place;
            const daBreakpoint = el.breakpoint;
            const daClassname = "_dynamic_adapt_" + daBreakpoint;

            if (daMatchMedia[index].matches) {
                //Перебрасываем элементы
                if (!daElement.classList.contains(daClassname)) {
                    let actualIndex = indexOfElements(daDestination)[daPlace];
                    if (daPlace === 'first') {
                        actualIndex = indexOfElements(daDestination)[0];
                    } else if (daPlace === 'last') {
                        actualIndex = indexOfElements(daDestination)[indexOfElements(daDestination).length];
                    }
                    daDestination.insertBefore(daElement, daDestination.children[actualIndex]);
                    daElement.classList.add(daClassname);
                }
            } else {
                //Возвращаем на место
                if (daElement.classList.contains(daClassname)) {
                    dynamicAdaptBack(daElement);
                    daElement.classList.remove(daClassname);
                }
            }
        }
        customAdapt();
    }

    //Вызов основной функции
    dynamicAdapt();

    //Функция возврата на место
    function dynamicAdaptBack(el) {
        const daIndex = el.getAttribute('data-da-index');
        const originalPlace = originalPositions[daIndex];
        const parentPlace = originalPlace['parent'];
        const indexPlace = originalPlace['index'];
        const actualIndex = indexOfElements(parentPlace, true)[indexPlace];
        parentPlace.insertBefore(el, parentPlace.children[actualIndex]);
    }
    //Функция получения индекса внутри родителя
    function indexInParent(el) {
        var children = Array.prototype.slice.call(el.parentNode.children);
        return children.indexOf(el);
    }
    //Функция получения массива индексов элементов внутри родителя
    function indexOfElements(parent, back) {
        const children = parent.children;
        const childrenArray = [];
        for (let i = 0; i < children.length; i++) {
            const childrenElement = children[i];
            if (back) {
                childrenArray.push(i);
            } else {
                //Исключая перенесенный элемент
                if (childrenElement.getAttribute('data-da') == null) {
                    childrenArray.push(i);
                }
            }
        }
        return childrenArray;
    }
    //Сортировка объекта
    function dynamicAdaptSort(arr) {
        arr.sort(function (a, b) {
            if (a.breakpoint > b.breakpoint) { return -1 } else { return 1 }
        });
        arr.sort(function (a, b) {
            if (a.place > b.place) { return 1 } else { return -1 }
        });
    }
    //Дополнительные сценарии адаптации
    function customAdapt() {
        //const viewport_width = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    }
}());


var page = 2;
jQuery(function($) {
    $('body').on('click', '.loadmore', function() {
        var data = {
            'action': 'load_posts_by_ajax',
            'page': page,
            'security': blog.security
        };

        $.post(blog.ajaxurl, data, function(response) {
            if($.trim(response) != '') {
                $('.blog-posts').append(response);
                page++;
            } else {
                $('.loadmore').hide();
            }
        });
    });
});


jQuery(function($){
    $('#true_loadmore').click(function(){
        $(this).text('Loading ...');
        var data = {
            'action': 'loadmore',
            'query': true_posts,
            'page' : current_page
        };
        $.ajax({
            url:ajaxurl,
            data:data,
            type:'POST',
            success:function(data){
                if( data ) {
                    $('#true_loadmore').text('OLDER POSTS').before(data);
                    current_page++;
                    if (current_page == max_pages) $("#true_loadmore").remove();
                } else {
                    $('#true_loadmore').remove();
                }
            }
        });
    });
});



jQuery(document).ready(function($){
    $(function(){
        var current = location.pathname;
        $('.blog_category_list ul li a').each(function(){
            var $this = $(this);
            // if the current path is like this link, make it active
            if($this.attr('href').indexOf(current) !== -1){
                $this.addClass('current');
            }
        })
    })
});







jQuery(document).ready(function($){

    setShareLinks();

    function socialWindow(url) {
        var left = (screen.width -570) / 2;
        var top = (screen.height -570) / 2;
        var params = "menubar=no,toolbar=no,status=no,width=570,height=570,top=" + top + ",left=" + left;  window.open(url,"NewWindow",params);}

    function setShareLinks() {
        var pageUrl = encodeURIComponent(document.URL);
        var tweet = encodeURIComponent($("meta[property='og:description']").attr("content"));

        $(".share-social.facebook").on("click", function() { url="https://www.facebook.com/sharer.php?u=" + pageUrl;
            socialWindow(url);
        });

        $(".share-social.twitter").on("click", function() {
            url = "https://twitter.com/intent/tweet?url=" + pageUrl + "&text=" + tweet;
            socialWindow(url);
        });

        $(".share-social.linkedin").on("click", function() {
            url = "https://www.linkedin.com/shareArticle?mini=true&url=" + pageUrl;
            socialWindow(url);
        })
    }


});

function videoId(button) {
    var $videoUrl = button.attr("data-video");
    if ($videoUrl !== undefined) {
        var $videoUrl = $videoUrl.toString();
        var srcVideo;

        if ($videoUrl.indexOf("youtube") !== -1) {
            var et = $videoUrl.lastIndexOf("&");
            if (et !== -1) {
                $videoUrl = $videoUrl.substring(0, et);
            }
            var embed = $videoUrl.indexOf("embed");
            if (embed !== -1) {
                $videoUrl =
                    "https://www.youtube.com/watch?v=" +
                    $videoUrl.substring(embed + 6, embed + 17);
            }

            srcVideo =
                "https://www.youtube.com/embed/" +
                $videoUrl.substring($videoUrl.length - 11, $videoUrl.length) +
                "?autoplay=1&mute=1&loop=1&playlist=" +
                $videoUrl.substring($videoUrl.length - 11, $videoUrl.length) +
                "";
        } else if ($videoUrl.indexOf("youtu") !== -1) {
            var et = $videoUrl.lastIndexOf("&");
            if (et !== -1) {
                $videoUrl = $videoUrl.substring(0, et);
            }
            var embed = $videoUrl.indexOf("embed");
            if (embed !== -1) {
                $videoUrl =
                    "https://youtu.be/" + $videoUrl.substring(embed + 6, embed + 17);
            }

            srcVideo =
                "https://www.youtube.com/embed/" +
                $videoUrl.substring($videoUrl.length - 11, $videoUrl.length) +
                "?autoplay=1&mute=1&loop=1&playlist=" +
                $videoUrl.substring($videoUrl.length - 11, $videoUrl.length) +
                "";
        } else if ($videoUrl.indexOf("vimeo") !== -1) {
            srcVideo =
                "https://player.vimeo.com/video/" +
                $videoUrl
                    .substring($videoUrl.indexOf(".com") + 5, $videoUrl.length)
                    .replace("/", "") +
                "?autoplay=1";
        } else if ($videoUrl.indexOf("mp4") !== -1) {
            return (
                '<video loop playsinline autoplay><source src="' +
                $videoUrl +
                '" type="video/mp4"></video>'
            );
        } else if ($videoUrl.indexOf("m4v") !== -1) {
            return (
                '<video loop playsinline autoplay><source src="' +
                $videoUrl +
                '" type="video/mp4"></video>'
            );
        } else {
            alert(
                "The video assigned is not from Youtube, Vimeo or MP4, remember to enter the correct complete video link .\n - Youtube: https://www.youtube.com/watch?v=43ngkc2Ejgw\n - Vimeo: https://vimeo.com/111939668\n - MP4 https://server.com/file.mp4"
            );
            return false;
        }
        return (
            '<iframe src="' +
            srcVideo +
            '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
        );
    } else {
        alert("No video assigned.");
        return false;
    }
}

document
    .querySelectorAll(".lets-play")
    .forEach((d) => d.addEventListener("click", playVideos));

function playVideos(e) {
    e.preventDefault();
    var $theVideo = videoId($(this));

    var appendVideo = document.createElement("div");

    if ($theVideo) {
        appendVideo.innerHTML +=
            '<div class="active video-modal-wrapp" id="video-wrap"><span onclick="lvideoClose();" class="video-overlay"></span><div class="video-container">' +
            $theVideo +
            '</div><button onclick="lvideoClose();" class="close-video">x</button></div>';

        document.body.appendChild(appendVideo);
    }
}

const lvideoClose = () => {
    const boxes = document.querySelectorAll(".video-modal-wrapp, .video-overlay");

    boxes.forEach((box) => {
        box.remove();
    });
};




//


$(document).ready(function(){


    /* Toggle Video Modal
  -----------------------------------------*/
    function toggle_video_modal() {

        // Click on video thumbnail or link
        $(".js-trigger-video-modal").on("click", function(e){

            // prevent default behavior for a-tags, button tags, etc.
            e.preventDefault();

            // Grab the video ID from the element clicked
            var id = $(this).attr('data-youtube-id');

            // Autoplay when the modal appears
            // Note: this is intetnionally disabled on most mobile devices
            // If critical on mobile, then some alternate method is needed
            var autoplay = '?autoplay=1';

            // Don't show the 'Related Videos' view when the video ends
            var related_no = '&rel=0';

            // String the ID and param variables together
            var src = '//www.youtube.com/embed/'+id+autoplay+related_no;

            // Pass the YouTube video ID into the iframe template...
            // Set the source on the iframe to match the video ID
            $("#youtube").attr('src', src);

            // Add class to the body to visually reveal the modal
            $("body").addClass("show-video-modal noscroll");

        });

        // Close and Reset the Video Modal
        function close_video_modal() {

            event.preventDefault();

            // re-hide the video modal
            $("body").removeClass("show-video-modal noscroll");

            // reset the source attribute for the iframe template, kills the video
            $("#youtube").attr('src', '');

        }
        // if the 'close' button/element, or the overlay are clicked
        $('body').on('click', '.close-video-modal, .video-modal .overlay', function(event) {

            // call the close and reset function
            close_video_modal();

        });
        // if the ESC key is tapped
        $('body').keyup(function(e) {
            // ESC key maps to keycode `27`
            if (e.keyCode == 27) {

                // call the close and reset function
                close_video_modal();

            }
        });
    }
    toggle_video_modal();



});



jQuery(document).ready(function($){

    var monkeyList = new List('information', {
        valueNames: ['information__block'],
        page: 6,
        pagination: true
    });
});

