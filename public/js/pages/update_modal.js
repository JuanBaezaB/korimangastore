/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************************!*\
  !*** ./resources/js/pages/update_modal.js ***!
  \********************************************/
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

var UpdateModal = /*#__PURE__*/function () {
  function UpdateModal($, updateModal, form, editButtons, getOneUrl, csrf) {
    _classCallCheck(this, UpdateModal);

    this.$ = $;
    this.$updateModal = $(updateModal);
    this.$form = $(form);
    this.toUpdate = [];
    this.getOneUrl = getOneUrl;
    this.csrf = csrf;
    this.$editButtons = $(editButtons);
    this.actionUrl = this.$form.attr('action');
  }

  _createClass(UpdateModal, [{
    key: "_process_opts",
    value: function _process_opts(opts) {
      if (!opts.type) {
        opts.type = 'plain';
      }

      if (!opts.inputDataKey) {
        opts.inputDataKey = opts.inputName;
      }

      if (UpdateModal.VALID_OPT_TYPES.indexOf(opts.type) == -1) {
        throw new Error("invalid opts type ".concat(opts.type));
      }

      if (!opts.inputName) {
        throw new Error('no input name given');
      }

      return opts;
    }
  }, {
    key: "append",
    value: function append(opts) {
      opts = this._process_opts(opts);
      this.toUpdate.append(opts);
      return this;
    }
  }, {
    key: "appendMany",
    value: function appendMany(lst) {
      this.toUpdate = this.toUpdate.concat(lst.map(this._process_opts));
      return this;
    }
  }, {
    key: "build",
    value: function build() {
      var _this = this;

      var $updateModal = _this.$updateModal;
      this.toUpdate.forEach(function (opt) {
        if (opt.type === 'select2' || opt.type === 'select2-multiple') {
          var select2Opts = opt.options || {};
          select2Opts.dropdownParent = $updateModal;

          _this.fromOptGetInput(opt).select2(select2Opts);
        }
      });
      this.$editButtons.on('click', this.makeOnClickCallback());
      this.$form.submit(this.makeSubmitCallback());
    }
  }, {
    key: "fromOptGetInput",
    value: function fromOptGetInput(opt) {
      if (!opt.inputName) {
        throw new Error("can't get Input, does not have inputName");
      }

      return this.$updateModal.find("[name=".concat(opt.inputName, "]"));
    }
  }, {
    key: "makeSubmitCallback",
    value: function makeSubmitCallback() {
      var _this = this;

      var $ = this.$;
      return function (e, from) {
        var $updateModal = _this.$updateModal;

        if (from == null) {
          var $form = $(this);
          var id = $updateModal.prop('x-data-id');
          var actionUrl = this.actionUrl.replace(':id', id);
          $form.attr('action', actionUrl);
          e.preventDefault();
          $form.trigger('submit', ['update_modal.js']);
        } else {}
      };
    }
  }, {
    key: "makeOnClickCallback",
    value: function makeOnClickCallback() {
      var _this = this;

      var updater = this.makeUpdaterCallback();
      var $ = this.$;
      return function () {
        var $button = $(this);
        var id = $button.attr('x-data-id');
        var url = _this.getOneUrl;
        $.ajax(url, {
          dataType: 'json',
          contentType: 'application/json',
          method: 'POST',
          data: JSON.stringify({
            'id': id,
            '_token': _this.csrf
          })
        }).done(updater) // TODO make better error handling
        .fail(function (x) {
          return console.log(x);
        });
      };
    }
  }, {
    key: "makeUpdaterCallback",
    value: function makeUpdaterCallback() {
      var _this = this;

      var $ = this.$;
      return function (data) {
        var $updateModal = _this.$updateModal;
        $updateModal.prop('x-data-id', data.id);

        _this.toUpdate.forEach(function (x) {
          var inputName = x.inputName,
              inputDataKey = x.inputDataKey,
              type = x.type;

          var $input = _this.fromOptGetInput(x);

          $input.val(data[inputDataKey]);

          if (type == 'select2' || type === 'select2-multiple') {
            $input.trigger('change');
          }
        });
      };
    }
  }]);

  return UpdateModal;
}();

_defineProperty(UpdateModal, "VALID_OPT_TYPES", ['plain', 'select2', 'select2-multiple']);

jQuery.fn.extend({
  updateModal: function updateModal(args) {
    var form = args.form,
        editButtons = args.editButtons,
        getOneUrl = args.getOneUrl,
        csrf = args.csrf,
        fields = args.fields;
    var $updateModal = this.first();
    var inst = new UpdateModal(jQuery, $updateModal, form, editButtons, getOneUrl, csrf);
    inst.appendMany(fields).build();
    return $updateModal;
  }
});
/******/ })()
;