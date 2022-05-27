/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************************!*\
  !*** ./resources/js/pages/update_modal.js ***!
  \********************************************/
function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _iterableToArrayLimit(arr, i) { var _i = arr == null ? null : typeof Symbol !== "undefined" && arr[Symbol.iterator] || arr["@@iterator"]; if (_i == null) return; var _arr = []; var _n = true; var _d = false; var _s, _e; try { for (_i = _i.call(arr); !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }

function _readOnlyError(name) { throw new TypeError("\"" + name + "\" is read-only"); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }

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
    key: "append",
    value: function append(type, inputName, inputDataKey) {
      if (!inputDataKey) {
        inputDataKey = inputName;
      }

      this.toUpdate.append({
        type: type,
        inputName: inputName,
        inputDataKey: inputDataKey
      });
      return this;
    }
  }, {
    key: "appendMany",
    value: function appendMany(lst) {
      this.toUpdate = this.toUpdate.concat(lst.map(function (row) {
        if (row.length == 1) {
          return {
            type: 'plain',
            inputName: row[0],
            inputDataKey: row[0]
          };
        } else if (row.length == 2) {
          var _row = _slicedToArray(row, 2),
              type = _row[0],
              inputName = _row[1];

          if (!type) {
            'plain', _readOnlyError("type");
          }

          return {
            type: type,
            inputName: inputName,
            inputDataKey: inputName
          };
        } else if (row.length == 3) {
          var _row2 = _slicedToArray(row, 3),
              _type = _row2[0],
              _inputName = _row2[1],
              inputDataKey = _row2[2];

          if (!_type) {
            'plain', _readOnlyError("type");
          }

          return {
            type: _type,
            inputName: _inputName,
            inputDataKey: inputDataKey
          };
        }

        throw '[update_modal.js] expected for array at most an length 3 and at least length 1';
      }));
      return this;
    }
  }, {
    key: "select3",
    value: function select3(inputName, inputDataKey) {
      return this.append('select3', inputName, inputDataKey);
    }
  }, {
    key: "plain",
    value: function plain(inputName, inputDataKey) {
      return this.append('plain', inputName, inputDataKey);
    }
  }, {
    key: "build",
    value: function build() {
      this.$editButtons.on('click', this.makeOnClickCallback());
      this.$form.submit(this.makeSubmitCallback());
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
          var $input = $updateModal.find("[name=".concat(inputName, "]"));
          $input.val(data[inputDataKey]);

          if (type == 'select3') {
            $input.trigger('change');
          }
        });
      };
    }
  }]);

  return UpdateModal;
}();

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