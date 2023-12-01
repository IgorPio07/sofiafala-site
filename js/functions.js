(function ($) {

    $('#reload-slider').click(function (e) {
        e.preventDefault();
        slider.reloadSlider({
            mode: 'fade',
            auto: true,
            pause: 1000,
            speed: 500
        });
    });

    jQuery(document).ready(function ($) {
        $('.slider').bxSlider({
            auto: true,
            mode: 'fade',
            slideWidth: 300
        });
    });

    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({
                scrollTop: $(this.hash).offset().top - 100
            }, 800);
        });
    });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 1000);
        return false;
    });

    wow = new WOW({}).init();


})(jQuery);

var loadedFrameCount = 0;

function loaded() {
    loadedFrameCount += 1;
    if (loadedFrameCount === 2) {
        //Scrol back to the top
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera

        //Resise form
        $('#formgoogle', window.parent.document).height('700px');

        generateCodes();
    }
}

function generateCodes() {
    $.getJSON('https://api.ipify.org?format=json').then(data => {
        $.ajax({
            url: 'gerar_codigo_acesso.php',
            method: 'POST',
            data: {
                ip: '' + data["ip"] + ''
            },
            complete: function (response) {
                var _response = JSON.parse(response.responseText);

                var len = _response[0].codes.length;
                for (var i = 0; i < len; i++) {
                    var code = _response[0].codes[i];

                    var finalResult = "<tr><td align='center'>" + code + "</td></tr>";

                    $('#codesTable tbody').append(finalResult);
                }
                $('#codigosAcesso').css('display', '');
                exportTableToPdf('codigosAcesso');
            },
            error: function () {
                $('#codigosAcesso').html('Houve um erro na geração dos seus códigos de acesso! Por favor, entre em contato através do email: ');
                $('#codigosAcesso').css('display', '');
            }
        });
    });
}

function checkDownload($codigo) {
    $.getJSON('https://api.ipify.org?format=json').then(data => {
        $.ajax({
            type: "POST",
            url: 'autorizar_download.php',
            data: {
                ip: '' + data["ip"] + '',
                codigo: $codigo
            },
            processData: true,
            complete: function (response) {
                if (response.responseText.includes(".apk")) {
                    filePath = response.responseText;
                    var a = document.createElement('A');
                    a.href = filePath;
                    a.setAttribute("download", "");
                    a.download = filePath.substr(filePath.lastIndexOf('/') + 1);
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                    setTimeout(function(){
                        window.location.replace('https://dcm.ffclrp.usp.br/sofiafala/index.php#demonstracao');
                    }, 3000);
                } else {
                    alert(response.responseText)
                }
            }
        });
    });
}

function showHideComponent(elementId){
    var element = document.getElementById(elementId);
    if (element.style.display === "none") {
        element.style.display = "block";
      } else {
        element.style.display = "none";
      }
}

function exportTableToPdf($tableId) {
    html2canvas(document.getElementById($tableId), {
        onrendered: function (canvas) {
            var data = canvas.toDataURL();
            var docDefinition = {
                content: [{
                    image: data,
                    width: 500
                }]
            };
            pdfMake.createPdf(docDefinition).download("codigos_acesso.pdf");
        }
    });
}

function finishDownload() {
    var divDownloadUsuario = document.getElementById("divDownloadUsuario");
    var divDownloadFono = document.getElementById("divDownloadFono");
    divDownloadUsuario.style.display = "none";
    divDownloadFono.style.display = "none";
}