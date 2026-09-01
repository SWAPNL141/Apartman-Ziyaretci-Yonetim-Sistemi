/**
 * AdminLTE Demo Menü
 * ------------------
 * Bu dosyayı üretim ortamında kullanmamalısınız.
 * Bu dosya yalnızca demo amaçlıdır.
 */
$(function () {
    'use strict'

    /**
     * Eklentilere erişim sağlama
     */

    $('[data-toggle="control-sidebar"]').controlSidebar()
    $('[data-toggle="push-menu"]').pushMenu()
    var $pushMenu = $('[data-toggle="push-menu"]').data('lte.pushmenu')
    var $controlSidebar = $('[data-toggle="control-sidebar"]').data('lte.controlsidebar')
    var $layout = $('body').data('lte.layout')
    $(window).on('load', function() {
        // Değişkenleri yeniden başlat
        $pushMenu = $('[data-toggle="push-menu"]').data('lte.pushmenu')
        $controlSidebar = $('[data-toggle="control-sidebar"]').data('lte.controlsidebar')
        $layout = $('body').data('lte.layout')
    })

    /**
     * Mevcut tüm temaların listesi
     *
     * @type Array
     */
    var temalarım = [
        'skin-blue',
        'skin-black',
        'skin-red',
        'skin-yellow',
        'skin-purple',
        'skin-green',
        'skin-blue-light',
        'skin-black-light',
        'skin-red-light',
        'skin-yellow-light',
        'skin-purple-light',
        'skin-green-light'
    ]

    /**
     * Önceden kaydedilmiş bir ayarı alır
     *
     * @param String name Ayarın adı
     * @returns String Ayarın değeri | null
     */
    function al(name) {
        if (typeof (Storage) !== 'undefined') {
            return localStorage.getItem(name)
        } else {
            window.alert('Lütfen bu şablonu düzgün görüntülemek için modern bir tarayıcı kullanın!')
        }
    }

    /**
     * Yeni bir ayarı tarayıcıda saklar
     *
     * @param String name Ayarın adı
     * @param String val Ayarın değeri
     * @returns void
     */
    function sakla(name, val) {
        if (typeof (Storage) !== 'undefined') {
            localStorage.setItem(name, val)
        } else {
            window.alert('Lütfen bu şablonu düzgün görüntülemek için modern bir tarayıcı kullanın!')
        }
    }

    /**
     * Layout sınıflarını değiştirir
     *
     * @param String cls Değiştirilecek layout sınıfı
     * @returns void
     */
    function layoutDeğiştir(cls) {
        $('body').toggleClass(cls)
        $layout.fixSidebar()
        if ($('body').hasClass('fixed') && cls == 'fixed') {
            $pushMenu.expandOnHover()
            $layout.activate()
        }
        $controlSidebar.fix()
    }

    /**
     * Eski temayı yeni tema ile değiştirir
     * @param String cls Yeni tema sınıfı
     * @returns Boolean Linkin varsayılan eylemini engellemek için false döner
     */
    function temaDeğiştir(cls) {
        $.each(temalarım, function (i) {
            $('body').removeClass(temalarım[i])
        })

        $('body').addClass(cls)
        sakla('skin', cls)
        return false
    }

    /**
     * Varsayılan ayarları alır ve şablona uygular
     *
     * @returns void
     */
    function ayarla() {
        var tmp = al('skin')
        if (tmp && $.inArray(tmp, temalarım))
            temaDeğiştir(tmp)

        // Tema değiştirme dinleyicisini ekle
        $('[data-skin]').on('click', function (e) {
            if ($(this).hasClass('knob'))
                return
            e.preventDefault()
            temaDeğiştir($(this).data('skin'))
        })

        // Layout yöneticisini ekle
        $('[data-layout]').on('click', function () {
            layoutDeğiştir($(this).data('layout'))
        })

        $('[data-controlsidebar]').on('click', function () {
            layoutDeğiştir($(this).data('controlsidebar'))
            var slide = !$controlSidebar.options.slide

            $controlSidebar.options.slide = slide
            if (!slide)
                $('.control-sidebar').removeClass('control-sidebar-open')
        })

        $('[data-sidebarskin="toggle"]').on('click', function () {
            var $sidebar = $('.control-sidebar')
            if ($sidebar.hasClass('control-sidebar-dark')) {
                $sidebar.removeClass('control-sidebar-dark')
                $sidebar.addClass('control-sidebar-light')
            } else {
                $sidebar.removeClass('control-sidebar-light')
                $sidebar.addClass('control-sidebar-dark')
            }
        })

        $('[data-enable="expandOnHover"]').on('click', function () {
            $(this).attr('disabled', true)
            $pushMenu.expandOnHover()
            if (!$('body').hasClass('sidebar-collapse'))
                $('[data-layout="sidebar-collapse"]').click()
        })

        // Seçenekleri sıfırla
        if ($('body').hasClass('fixed')) {
            $('[data-layout="fixed"]').attr('checked', 'checked')
        }
        if ($('body').hasClass('layout-boxed')) {
            $('[data-layout="layout-boxed"]').attr('checked', 'checked')
        }
        if ($('body').hasClass('sidebar-collapse')) {
            $('[data-layout="sidebar-collapse"]').attr('checked', 'checked')
        }

    }

    // Yeni sekme oluştur
    var $tabPane = $('<div />', {
        'id': 'control-sidebar-theme-demo-options-tab',
        'class': 'tab-pane active'
    })

    // Sekme butonunu oluştur
    var $tabButton = $('<li />', {'class': 'active'})
        .html('<a href=\'#control-sidebar-theme-demo-options-tab\' data-toggle=\'tab\'>'
            + '<i class="fa fa-wrench"></i>'
            + '</a>')

    // Sağ sidebar sekmelerine sekme butonunu ekle
    $('[href="#control-sidebar-home-tab"]')
        .parent()
        .before($tabButton)

    // Menüyü oluştur
    var $demoAyarlar = $('<div />')

    // Layout seçenekleri
    $demoAyarlar.append(
        '<h4 class="control-sidebar-heading">'
        + 'Layout Seçenekleri'
        + '</h4>'
        // Sabit layout
        + '<div class="form-group">'
        + '<label class="control-sidebar-subheading">'
        + '<input type="checkbox"data-layout="fixed"class="pull-right"/> '
        + 'Sabit Layout'
        + '</label>'
        + '<p>Sabit layout\'u etkinleştirin. Sabit ve kutulu layout\'ları birlikte kullanamazsınız</p>'
        + '</div>'
        // Kutulu layout
        + '<div class="form-group">'
        + '<label class="control-sidebar-subheading">'
        + '<input type="checkbox"data-layout="layout-boxed" class="pull-right"/> '
        + 'Kutulu Layout'
        + '</label>'
        + '<p>Kutulu layout\'u etkinleştirin</p>'
        + '</div>'
        // Sidebar Aç/Kapa
        + '<div class="form-group">'
        + '<label class="control-sidebar-subheading">'
        + '<input type="checkbox"data-layout="sidebar-collapse"class="pull-right"/> '
        + 'Sidebar\'ı Aç/Kapa'
        + '</label>'
        + '<p>Sol sidebar\'ın durumunu değiştirin (açık veya kapalı)</p>'
        + '</div>'
        // Sidebar mini genişletme (hover ile)
        + '<div class="form-group">'
        + '<label class="control-sidebar-subheading">'
        + '<input type="checkbox"data-enable="expandOnHover"class="pull-right"/> '
        + 'Sidebar\'ı Hover ile Genişlet'
        + '</label>'
        + '<p>Sidebar mini\'yi hover ile genişletin</p>'
        + '</div>'
        // Sağ Sidebar Aç/Kapa
        + '<div class="form-group">'
        + '<label class="control-sidebar-subheading">'
        + '<input type="checkbox"data-controlsidebar="control-sidebar-open"class="pull-right"/> '
        + 'Sağ Sidebar Kaydırmayı Aç/Kapa'
        + '</label>'
        + '<p>İçerik üzerinde kaydırma veya itme efekti arasında geçiş yapın</p>'
        + '</div>'
        // Sağ Sidebar Tema Değiştirme
        + '<div class="form-group">'
        + '<label class="control-sidebar-subheading">'
        + '<input type="checkbox"data-sidebarskin="toggle"class="pull-right"/> '
        + 'Sağ Sidebar Temasını Değiştir'
        + '</label>'
        + '<p>Sağ sidebar için koyu ve açık temalar arasında geçiş yapın</p>'
        + '</div>'
    )
    var $temalarListesi = $('<ul />', {'class': 'list-unstyled clearfix'})

    // Koyu sidebar temaları
    var $maviTema =
        $('<li />', {style: 'float:left; width: 33.33333%; padding: 5px;'})
            .append('<a href="javascript:void(0)" data-skin="skin-blue" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">'
                + '<div><span style="display:block; width: 20%; float: left; height: 7px; background: #367fa9"></span><span class="bg-light-blue" style="display:block; width: 80%; float: left; height: 7px;"></span></div>'
                + '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>'
                + '</a>'
                + '<p class="text-center no-margin">Mavi</p>')
    $temalarListesi.append($maviTema)
    var $siyahTema =
        $('<li />', {style: 'float:left; width: 33.33333%; padding: 5px;'})
            .append('<a href="javascript:void(0)" data-skin="skin-black" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">'
                + '<div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span style="display:block; width: 20%; float: left; height: 7px; background: #fefefe"></span><span style="display:block; width: 80%; float: left; height: 7px; background: #fefefe"></span></div>'
                + '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #222"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>'
                + '</a>'
                + '<p class="text-center no-margin">Siyah</p>')
    $temalarListesi.append($siyahTema)
    var $morTema =
        $('<li />', {style: 'float:left; width: 33.33333%; padding: 5px;'})
            .append('<a href="javascript:void(0)" data-skin="skin-purple" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">'
                + '<div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-purple-active"></span><span class="bg-purple" style="display:block; width: 80%; float: left; height: 7px;"></span></div>'
                + '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>'
                + '</a>'
                + '<p class="text-center no-margin">Mor</p>')
    $temalarListesi.append($morTema)
    var $yeşilTema =
        $('<li />', {style: 'float:left; width: 33.33333%; padding: 5px;'})
            .append('<a href="javascript:void(0)" data-skin="skin-green" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">'
                + '<div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-green-active"></span><span class="bg-green" style="display:block; width: 80%; float: left; height: 7px;"></span></div>'
                + '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>'
                + '</a>'
                + '<p class="text-center no-margin">Yeşil</p>')
    $temalarListesi.append($yeşilTema)
    var $kırmızıTema =
        $('<li />', {style: 'float:left; width: 33.33333%; padding: 5px;'})
            .append('<a href="javascript:void(0)" data-skin="skin-red" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">'
                + '<div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-red-active"></span><span class="bg-red" style="display:block; width: 80%; float: left; height: 7px;"></span></div>'
                + '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>'
                + '</a>'
                + '<p class="text-center no-margin">Kırmızı</p>')
    $temalarListesi.append($kırmızıTema)
    var $sarıTema =
        $('<li />', {style: 'float:left; width: 33.33333%; padding: 5px;'})
            .append('<a href="javascript:void(0)" data-skin="skin-yellow" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">'
                + '<div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-yellow-active"></span><span class="bg-yellow" style="display:block; width: 80%; float: left; height: 7px;"></span></div>'
                + '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>'
                + '</a>'
                + '<p class="text-center no-margin">Sarı</p>')
    $temalarListesi.append($sarıTema)

    // Açık sidebar temaları
    var $maviAçıkTema =
        $('<li />', {style: 'float:left; width: 33.33333%; padding: 5px;'})
            .append('<a href="javascript:void(0)" data-skin="skin-blue-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">'
                + '<div><span style="display:block; width: 20%; float: left; height: 7px; background: #367fa9"></span><span class="bg-light-blue" style="display:block; width: 80%; float: left; height: 7px;"></span></div>'
                + '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>'
                + '</a>'
                + '<p class="text-center no-margin" style="font-size: 12px">Mavi Açık</p>')
    $temalarListesi.append($maviAçıkTema)
    var $siyahAçıkTema =
        $('<li />', {style: 'float:left; width: 33.33333%; padding: 5px;'})
            .append('<a href="javascript:void(0)" data-skin="skin-black-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">'
                + '<div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span style="display:block; width: 20%; float: left; height: 7px; background: #fefefe"></span><span style="display:block; width: 80%; float: left; height: 7px; background: #fefefe"></span></div>'
                + '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>'
                + '</a>'
                + '<p class="text-center no-margin" style="font-size: 12px">Siyah Açık</p>')
    $temalarListesi.append($siyahAçıkTema)
    var $morAçıkTema =
        $('<li />', {style: 'float:left; width: 33.33333%; padding: 5px;'})
            .append('<a href="javascript:void(0)" data-skin="skin-purple-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">'
                + '<div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-purple-active"></span><span class="bg-purple" style="display:block; width: 80%; float: left; height: 7px;"></span></div>'
                + '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>'
                + '</a>'
                + '<p class="text-center no-margin" style="font-size: 12px">Mor Açık</p>')
    $temalarListesi.append($morAçıkTema)
    var $yeşilAçıkTema =
        $('<li />', {style: 'float:left; width: 33.33333%; padding: 5px;'})
            .append('<a href="javascript:void(0)" data-skin="skin-green-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">'
                + '<div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-green-active"></span><span class="bg-green" style="display:block; width: 80%; float: left; height: 7px;"></span></div>'
                + '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>'
                + '</a>'
                + '<p class="text-center no-margin" style="font-size: 12px">Yeşil Açık</p>')
    $temalarListesi.append($yeşilAçıkTema)
    var $kırmızıAçıkTema =
        $('<li />', {style: 'float:left; width: 33.33333%; padding: 5px;'})
            .append('<a href="javascript:void(0)" data-skin="skin-red-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">'
                + '<div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-red-active"></span><span class="bg-red" style="display:block; width: 80%; float: left; height: 7px;"></span></div>'
                + '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>'
                + '</a>'
                + '<p class="text-center no-margin" style="font-size: 12px">Kırmızı Açık</p>')
    $temalarListesi.append($kırmızıAçıkTema)
    var $sarıAçıkTema =
        $('<li />', {style: 'float:left; width: 33.33333%; padding: 5px;'})
            .append('<a href="javascript:void(0)" data-skin="skin-yellow-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">'
                + '<div><span style="display:block; width: 20%; float: left; height: 7px;" class="bg-yellow-active"></span><span class="bg-yellow" style="display:block; width: 80%; float: left; height: 7px;"></span></div>'
                + '<div><span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span></div>'
                + '</a>'
                + '<p class="text-center no-margin" style="font-size: 12px">Sarı Açık</p>')
    $temalarListesi.append($sarıAçıkTema)

    $demoAyarlar.append('<h4 class="control-sidebar-heading">Temalar</h4>')
    $demoAyarlar.append($temalarListesi)

    $tabPane.append($demoAyarlar)
    $('#control-sidebar-home-tab').after($tabPane)

    ayarla()

    $('[data-toggle="tooltip"]').tooltip()
})