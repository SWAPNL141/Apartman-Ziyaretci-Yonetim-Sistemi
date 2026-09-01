/*! AdminLTE app.js
* ================
* AdminLTE v2 için ana JS uygulama dosyası. Bu dosya
* tüm sayfalara eklenmelidir. Bazı layout seçeneklerini
* kontrol eder ve özel AdminLTE eklentilerini uygular.
*
* @author Colorlib
* @support <https://github.com/ColorlibHQ/AdminLTE/issues>
* @version v2.4.18
* @repository git://github.com/ColorlibHQ/AdminLTE.git
* @license MIT <http://opensource.org/licenses/MIT>
*/

// jQuery'nin yüklü olduğundan emin olun
if (typeof jQuery === 'undefined') {
  throw new Error('AdminLTE, jQuery gerektirir');
}

/* BoxRefresh()
 * =========
 * Bir kutuya AJAX içerik kontrolü ekler.
 *
 * @Kullanım: $('#my-box').boxRefresh(options)
 *         veya kutu elemanına [data-widget="box-refresh"] ekleyin
 *         Herhangi bir seçeneği data-option="value" olarak iletin
 */
+function ($) {
  'use strict';

  var DataKey = 'lte.boxrefresh';

  var Varsayılan = {
    kaynak         : '',
    parametreler   : {},
    tetikleyici    : '.refresh-btn',
    içerik         : '.box-body',
    içerikteYükle  : true,
    yanıtTürü      : '',
    örtüŞablonu    : '<div class="overlay"><div class="fa fa-refresh fa-spin"></div></div>',
    yüklemeBaşlangıcında: function () {
    },
    yüklemeTamamlandığında: function (yanıt) {
      return yanıt;
    }
  };

  var Seçici = {
    veri: '[data-widget="box-refresh"]'
  };

  // BoxRefresh Sınıf Tanımı
  // =========================
  var BoxRefresh = function (eleman, seçenekler) {
    this.eleman  = eleman;
    this.seçenekler  = seçenekler;
    this.$örtü = $(seçenekler.örtüŞablonu);

    if (seçenekler.kaynak === '') {
      throw new Error('Kaynak URL tanımlanmadı. Lütfen BoxRefresh kaynak seçeneğinde bir URL belirtin.');
    }

    this._dinleyicileriAyarla();
    this.yükle();
  };

  BoxRefresh.prototype.yükle = function () {
    this._örtüEkle();
    this.seçenekler.yüklemeBaşlangıcında.call($(this));

    $.get(this.seçenekler.kaynak, this.seçenekler.parametreler, function (yanıt) {
      if (this.seçenekler.içerikteYükle) {
        $(this.eleman).find(this.seçenekler.içerik).html(yanıt);
      }
      this.seçenekler.yüklemeTamamlandığında.call($(this), yanıt);
      this._örtüKaldır();
    }.bind(this), this.seçenekler.yanıtTürü !== '' && this.seçenekler.yanıtTürü);
  };

  // Özel

  BoxRefresh.prototype._dinleyicileriAyarla = function () {
    $(this.eleman).on('click', this.seçenekler.tetikleyici, function (olay) {
      if (olay) olay.preventDefault();
      this.yükle();
    }.bind(this));
  };

  BoxRefresh.prototype._örtüEkle = function () {
    $(this.eleman).append(this.$örtü);
  };

  BoxRefresh.prototype._örtüKaldır = function () {
    $(this.$örtü).remove();
  };

  // Eklenti Tanımı
  // =================
  function Eklenti(seçenek) {
    return this.each(function () {
      var $this = $(this);
      var veri  = $this.data(DataKey);

      if (!veri) {
        var seçenekler = $.extend({}, Varsayılan, $this.data(), typeof seçenek == 'object' && seçenek);
        $this.data(DataKey, (veri = new BoxRefresh($this, seçenekler)));
      }

      if (typeof veri == 'string') {
        if (typeof veri[seçenek] == 'undefined') {
          throw new Error(seçenek + ' adında bir yöntem yok');
        }
        veri[seçenek]();
      }
    });
  }

  var eski = $.fn.boxRefresh;

  $.fn.boxRefresh             = Eklenti;
  $.fn.boxRefresh.Constructor = BoxRefresh;

  // Çakışma Yok Modu
  // ================
  $.fn.boxRefresh.noConflict = function () {
    $.fn.boxRefresh = eski;
    return this;
  };

  // BoxRefresh Veri API
  // =================
  $(window).on('load', function () {
    $(Seçici.veri).each(function () {
      Eklenti.call($(this));
    });
  });

}(jQuery);