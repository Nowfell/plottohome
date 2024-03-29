function newTime() {
    function pad(s) {
        return s < 10 ? "0" + s : s
    }
    var date = new Date;
    return [date.getHours(), date.getMinutes()].map(pad).join(":")
}
!function($) {
    function isInternetExplorer() {
        var userAgent = window.navigator.userAgent;
        return userAgent.indexOf("MSIE") >= 0 || userAgent.match(/Trident.*rv\:11\./)
    }
    function mobilecheck() {
        var check = !1, a;
        return a = navigator.userAgent || navigator.vendor || window.opera,
        (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) && (check = !0),
        check
    }
    $.fn.venomButton = function(options) {
        var settings = $.extend({
            phone: "918714324466",
            message: "Hi",
            chatMessage: "Hi there 👋<br><br>How can I help you?",
            size: "72px",
            buttonColor: "rgb(9, 94, 84)",
            position: "left",
            linkButton: !1,
            showPopup: !1,
            showOnIE: !0,
            autoOpenTimeout: 0,
            headerColor: "rgb(9, 94, 84)",
            avatar: "../images/favicon.png",
            nameClient: "Plot to Home",
            headerTitle: "WhatsApp Chat",
            zIndex: 0,
            buttonImage: "../images/whatsapp.svg"
        }, options)
          , isMobile = mobilecheck();
        this.addClass("venom-button");
        var $button = $(document.createElement("div"))
          , $buttonImageContainer = $(document.createElement("div"))
          , $popup = $(document.createElement("div"))
          , $header = $(document.createElement("div"))
          , $popupMessage = $(document.createElement("div"))
          , $btnSend = $(document.createElement("div"))
          , $inputMessage = $(document.createElement("div"));
        if ($buttonImageContainer.addClass("venom-button-button-image"),
        $button.addClass("venom-button-button").append(`<img src="${settings.buttonImage}" />`).css({
            width: settings.size,
            height: settings.size,
            "background-color": settings.buttonColor
        }),
        isInternetExplorer() && !settings.showOnIE || $button.append($buttonImageContainer).appendTo(this),
        $button.on("click", (function() {
            // isMobile && settings.showPopup ? openPopup() : settings.linkButton && sendWhatsappMessage()
            settings.linkButton && sendWhatsappMessage()
        }
        )),
        settings.showPopup) {
            var $textarea = $(document.createElement("textarea"))
              , $closeBtn = $(document.createElement("div"))
              , $sendIcon = $('<?xml version="1.0" encoding="UTF-8" standalone="no"?><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="isolation:isolate" viewBox="0 0 20 18" width="20" height="18"><defs><clipPath id="_clipPath_fgX00hLzP9PnAfCkGQoSPsYB7aEGkj1G"><rect width="20" height="18"/></clipPath></defs><g clip-path="url(#_clipPath_fgX00hLzP9PnAfCkGQoSPsYB7aEGkj1G)"><path d=" M 0 0 L 0 7.813 L 16 9 L 0 10.188 L 0 18 L 20 9 L 0 0 Z " fill="rgb(46,46,46)"/></g></svg>');
            function openPopup() {
                $popup.hasClass("active") || ($popup.addClass("active"),
                $textarea.focus())
            }
            $popup.addClass("venom-button-popup"),
            $closeBtn.addClass("drfHxL"),
            $header.addClass("kdxbgZ").css("background", settings.headerColor),
            $popupMessage.addClass("ewIAEB"),
            $inputMessage.addClass("venom-button-input-message"),
            $btnSend.addClass("venom-button-btn-send"),
            $popupMessage.append(`\n            <div class="ewIAEB">\n            <div class="cWUfUj">\n                <div class="iNguXd" style="opacity: 0;">\n                    <div class="kYdave">\n                        <div class="eMFEyG"></div>\n                        <div class="jAqeVd"></div>\n                        <div class="CPQqS"></div>\n                    </div>\n                </div>\n                <div class="dSUAOZ" style="opacity: 1;">\n                    <div class="acKCA">${settings.nameClient}</div>\n                    <div class="hOnFlx">${settings.chatMessage}</div>\n                    <div class="dPhWdq">${newTime()}</div>\n                </div>\n            </div>\n        </div>\n            `),
            $textarea.val(settings.message),
            settings.chatMessage || $popupMessage.hide(),
            $header.append(`<div size="52" class="eZEgcx">\n            <div class="izlSME">\n                <div style="background-image: url(${settings.avatar});" class="lngbRu"></div>\n            </div>\n        </div>\n        <div class="hhASjW">\n            <div class="hDGnqR">${settings.nameClient}</div>\n            <div class="ioFWLq">${settings.headerTitle}</div>\n        </div>`),
            $btnSend.append($sendIcon),
            $inputMessage.append($textarea, $btnSend),
            $closeBtn.append('\n            <div role="button" tabindex="0" class="drfHx"></div>\n            '),
            $popup.append($closeBtn, $header, $popupMessage, $inputMessage).appendTo(this),
            $closeBtn.click((function() {
                $popup.removeClass("active")
            }
            )),
            $button.click((function() {
                $popup.toggleClass("active")
            }
            )),
            $textarea.keypress((function(event) {
                settings.message = $(this).val(),
                13 != event.keyCode || event.shiftKey || isMobile || (event.preventDefault(),
                $btnSend.click())
            }
            )),
            $btnSend.click((function() {
                settings.message = $textarea.val(),
                sendWhatsappMessage()
            }
            )),
            settings.autoOpenTimeout > 0 && setTimeout((function() {
                openPopup()
            }
            ), settings.autoOpenTimeout)
        }
        function sendWhatsappMessage() {
            var apilink = "http://";
            apilink += isMobile ? "api" : "web",
            apilink += ".whatsapp.com/send?phone=" + settings.phone + "&text=" + encodeURI(settings.message),
            window.open(apilink)
        }
        settings.zIndex && $(this).css("z-index", settings.zIndex),
        "right" === settings.position && (this.css({
            left: "auto",
            right: "15px"
        }),
        $popup.css("right", "0"))
    }
}(jQuery);
