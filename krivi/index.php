<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- meta info + OG tags -->
    <title>Krivi</title>
    <meta name="description" content="Ker iskreno verjamemo, da je treba vsebinam dati prednost pred obrazi, bi radi, da nas poznate le po delu. Da pa ne bi teoretikom zarote, spin medicini in Sovi povzročali preveč sivih las, evo nas. A nismo srčkani?">
    <meta name="author" content="Danes je nov dan, Inštitut za druga vprašanja">
    <link rel="shortcut icon" href="https://danesjenovdan.si/favicon.ico">

    <meta property="og:title" content="Krivi" />
    <meta property="og:type" content="article" />
    <meta property="og:description" content="Ker iskreno verjamemo, da je treba vsebinam dati prednost pred obrazi, bi radi, da nas poznate le po delu. Da pa ne bi teoretikom zarote, spin medicini in Sovi povzročali preveč sivih las, evo nas. A nismo srčkani?" />
    <meta property="og:image" content="https://danesjenovdan.si/img/djndog.png" />

    <!-- Bootstrap -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

    <!-- font -->
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:200,300,400,600,700&subset=latin-ext,latin' rel='stylesheet' type='text/css'>

    <!-- icons -->
    <link href="/icons_/icons.css" rel="stylesheet">

    <!-- CSS -->
    <link href="/css/guide.css?180928" rel="stylesheet">

    <!-- WP fix -->
    <script>
        (function () {
            if ("-ms-user-select" in document.documentElement.style && navigator.userAgent.match(/IEMobile\/10\.0/)) {
                var msViewportStyle = document.createElement("style");
                msViewportStyle.appendChild(
                    document.createTextNode("@-ms-viewport{width:auto!important}")
                );
                document.getElementsByTagName("head")[0].appendChild(msViewportStyle);
            }
        })();
    </script>

</head>

<body>

    <div id="menucontent">
        <div id="menuheader">
            <div id="menuclose">
                <div id="menucloseicon" class="icon col-light-green">×</div>
            </div>
            <div id="menutitle" class="bck-light-green">Danes je nov dan</div>
            <div class="col-light-green" id="menutitleback">Danes je nov dan</div>
        </div>
        <div class="menuitem menuitem-agrument" data-menu="agrument">
            <div class="ribbon bck-light-green"></div>Agrument</div>
        <div class="menuitem" data-menu="obcasnik/">
            <div class="ribbon bck-light-red"></div>Občasnik</div>
        <div class="menuitem" data-menu="projekti/">
            <div class="ribbon bck-light-red"></div>Projekti</div>
        <div class="menuitem active" data-menu="krivi/">
            <div class="ribbon bck-light-green"></div>Krivi</div>
        <div class="menuitem" data-menu="dolzni/">
            <div class="ribbon bck-light-gold"></div>Dolžni</div>
        <div class="menuitem" data-menu="konsenz/">
            <div class="ribbon bck-light-green"></div>Konsenz</div>
        <div class="menuitem" data-menu="formalnosti/">
            <div class="ribbon bck-light-gold"></div>Formalnosti</div>
    </div>

    <div class="container-fluid">
        <div class="row" id="header">
            <div class="container">
                <div class="row">
                    <div id="menu">
                        <div class="menutoggle">
                            <div class="icon-menu"></div>
                        </div>
                        <h1 class="nologo">Meni</h1>
                    </div>
                    <div class="languagetoggle" data-href="/en/">
                        <h1 class="nologo">En</h1>
                    </div>
                    <div class="col-md-12">
                        <h1 id="intro"><span id="title">KRIVI /</span> Ker iskreno verjamemo, da je treba vsebinam dati prednost pred obrazi, bi radi, da nas poznate le po delu. Da pa ne bi teoretikom zarote, spin medicini in Sovi povzročali preveč sivih las, evo nas. A nismo srčkani?</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="cookiewarning">
                        <span class="cookiewords">Soglašam z uporabo piškotkov</span>
                        <br class="visible-xs">
                        <div class="confirmcookies btn-cookie bck-red">V REDU</div>
                        <div class="cookiemoreinfo btn-cookie bck-light-green">Želim več informacij</div>
                    </div>
                </div>
            </div>

            <div class="row hidden-xs">
                <div class="col-md-12">
                    <div data-href="all" class="tab selected">vsi</div>
                    <!-- <div data-href="founder" class="tab">ustanovitelji/-ce</div> -->
                    <div data-href="council" class="tab">svet zavoda</div>
                    <div data-href="science" class="tab">znanstveni svet zavoda</div>
                </div>
            </div>

            <div class="row">


<?php

error_reporting(0);

$people = json_decode(file_get_contents('krivi.json'), true);

function sort_by_last_name($a, $b){
    $last_a = array_pop(explode(' ', $a['name']));
    $last_b = array_pop(explode(' ', $b['name']));
    return strcoll($last_a, $last_b);
}

$people_array = $people['people'];

$old_collate = setlocale(LC_COLLATE, 0);
setlocale(LC_COLLATE, 'sl_SI.utf8');

usort($people_array, 'sort_by_last_name');

setlocale(LC_COLLATE, $old_collate);

foreach ($people_array as $index => $person) {
    $mail_link = isset($person['mail'])
        ? '<a class="polarodilink" href="mailto:'.$person['mail'].'">'.$person['mail'].'</a>'
        : '<a class="polarodilink"><br></a>';
    $tags = isset($person['tags'])
        ? ' '.$person['tags']
        : '';
    $image_css = isset($person['image_css'])
        ? ' style="'.$person['image_css'].'"'
        : '';
    echo('
        <div class="col-md-3 col-sm-6'.$tags.'">
            <div class="polaroid">
                <div class="image" id="'.$person['id'].'"'.$image_css.'></div>
                <h1 class="polaroidname">'.$person['name'].'</h1>
                '.$mail_link.'
                <p class="polaroidtext">'.$person['desc'].'</p>
            </div>
        </div>
    ');
}

?>


        <div class="col-md-3 col-sm-6">
            <div class="polaroid" id="polaroidti" data-href="/dolzni/#popup-naturalijepopup">
                <div class="image" id="ti"></div>
                <h1 class="polaroidname">Ti!</h1>
                <a class="polarodilink"><br></a>
                <p class="polaroidtext">Ja, ti ja!</p>
            </div>
        </div>

            </div>

        </div>
        <!-- end of container-fluid -->

        <div class="row" id="footer">
            <svg id="footerdivider" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="40px" viewBox="0 0 100 102" preserveAspectRatio="none">
                <path d="M0 0 L50 300 L100 0 Z"></path>
            </svg>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 footerline">
                        <div id="newsletter" data-href="signup" class="icon-newsletter col-green buzz-out"></div>
                        <p id="newslettertext" class="footertext"><a class="footerlink link-green" href="/jaz/">Naroči se na e-novice.</a> Pišemo samo, kadar imamo res kaj povedati.</p>
                    </div>
                    <div class="col-md-3 footerline">
                        <div id="socialcontainer">
                            <div class="social push" data-href="https://www.facebook.com/danesjenovdan">
                                <div class="icon icon-facebook"></div>
                            </div>
                            <div class="social push" data-href="https://twitter.com/danesjenovdan">
                                <div class="icon icon-twitter"></div>
                            </div>
                            <div class="social push" data-href="https://github.com/danesjenovdan">
                                <div class="icon icon-github"></div>
                            </div>
                            <div class="social push" data-href="https://vimeo.com/user26914674">
                                <div class="icon icon-vimeo"></div>
                            </div>
                            <div class="social push" data-href="https://www.youtube.com/channel/UCWMqx3p_QtWjdDRq58Hfh_w">
                                <div class="icon icon-youtube"></div>
                            </div>
                            <div class="social push" data-href="https://agrument.danesjenovdan.si/rss/">
                                <div class="icon icon-rss"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 footerline">
                        <span id="podpri"><object data="/img/heart2.svg" class="icon-heart-line" type="image/svg+xml" /></object><span class="icon icon-heart col-green"></span>Podpri nas!</span>
                    </div>
                    <div class="col-md-3 footerline">
                        <p class="footertext" id="izkaznica"><a class="link-green" href="/formalnosti/">Danes je nov dan</a>
                            <br>Inštitut za druga vprašanja
                            <br>Parmova ulica 20
                            <br>1000 Ljubljana
                            <br>
                            <br><a class="footerlink link-green" href="mailto:vsi@danesjenovdan.si">vsi@danesjenovdan.si</a>
                        </p>
                    </div>
                </div>
                <div class="row" style="border-top: 1px solid #f0efef; padding-top: 20px; margin-top: 20px;">
          <div class="col-md-12">
            <p xmlns:dct="http://purl.org/dc/terms/" style="line-height: 1.4; font-size: 16px;">
              Izdano pod licenco <a rel="license" href="https://creativecommons.org/publicdomain/zero/1.0/deed.sl">CC0</a>.
              Kolikor dopušča zakonodaja, se <a rel="dct:publisher" href="https://danesjenovdan.si/"><span property="dct:title">Danes je nov dan, Inštitut za druga vprašanja</span></a> odpoveduje vsem avtorskim in sorodnim pravicam glede <span property="dct:title">spletnega mesta danesjenovdan.si</span> z izjemo vseh ikon in slik objavljenih na <a href="https://agrument.danesjenovdan.si">Agrumentu</a>, ki jih nismo ustvarili na inštitutu.
            </p>
          </div>
        </div>
            </div>
        </div>

    </div>

    <div class="popup centermycontentvertically" id="signup">
        <div class="popupclose">
            <div class="icon-close"></div>
        </div>
        <div class="container popupcontainer centermevertically">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <p class="popuptext">Dodajte me na mailing listo.</p>
                    <form class="ac-custom ac-checkbox ac-checkmark">
                        <input id="newsletteremail" type="email" class="form-control" placeholder="ti@email.com">
                        <ul>
                            <li>
                                <input id="dodajme" name="dodajme" type="checkbox">
                                <label for="dodajme">dodaj me na listo podpornikov</label>
                                <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"></svg>
                            </li>
                        </ul>
                        <div class="hider">
                            <p class="popuptext">Zaupaj nam še svoje polno ime.</p>
                            <input id="newslettername" type="text" class="form-control" placeholder="Ime Priimek">
                        </div>
                    </form>
                    <button class="btn btn-popup push" id="submitemail">Oddaj!</button>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/bootstrap/js/bootstrap.min.js"></script>

    <!-- jQuery cookie -->
    <script src="/js/jquery.cookie.js"></script>
    <!-- NSA -->
    <script src="/js/nsa.js"></script>

    <!-- frontend magic -->
    <script src="/js/front.js?_new"></script>

    <script type="text/javascript">
        var images = new Array()

        function preload() {
            for (i = 0; i < preload.arguments.length; i++) {
                images[i] = new Image()
                images[i].src = preload.arguments[i]
            }
        }
        preload(
            "/img/filip_hover.jpg",
            "/img/nika_hover.jpg",
            "/img/jasmina_hover.jpg",
            "/img/karmen_hover.jpg",
            "/img/eva_hover.jpg",
            "/img/ziga_hover.jpg",
            "/img/franci_hover.jpg",
            "/img/ursula_hover.jpg",
            "/img/tanja_hover.jpg",
            "/img/anja_hover.jpg",
            "/img/ti_hover.jpg",
            "/img/juric_hover.jpg",
            "/img/mirt_hover.jpg",
            "/img/kunst_hover.jpg",
            "/img/skornc_hover.jpg",
            "/img/tea_hover.jpg",
            "/img/tadej_hover.jpg",
            "/img/evas_hover.jpg",
            "/img/tine_hover.jpg",
            "/img/medeja_hover.jpg",
            "/img/zigaaljaz_hover.png",
            "/img/kaja_hover.png",
            "/img/mlacnik_hover.jpg",
            "/img/darja_hover.jpg",
            "/img/mato_hover.png",
            "/img/zeljka_hover.png",
            "/img/miha_hover.png",
            "/img/veronika_hover.jpg",
            "/img/matej_hover.jpg",
            "/img/anja_t_hover.jpg",
            "/img/katja_hover.jpg",
            "/img/dominik_hover.png",
            "/img/miha_s_hover.png",
            "/img/sara_hover.png",
            "/img/maja_p_hover.png",
            "/img/martin_hover.png",
            "/img/maja_c_hover.png",
            "/img/jan_hover.jpg",
            "/img/neza_hover.png"
        )
    </script>

<!-- Matomo -->
<script type="text/javascript">
  var _paq = _paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['setDoNotTrack', true]);
  _paq.push(['disableCookies']);
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u='//track.djnd.si/';
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', '6']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="//track.djnd.si/piwik.php?idsite=6&rec=1" style="border:0;" alt="" /></p></noscript>
<!-- End Matomo Code -->
</body>

</html>
