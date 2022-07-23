
class UpdateModal {
    constructor ($, updateModal, form, editButtons, getOneUrl, csrf) {
        this.$ = $;
        this.$updateModal = $(updateModal);
        this.$form = $(form);

        this.toUpdate = [];
        this.getOneUrl = getOneUrl;
        this.csrf = csrf;
        this.$editButtons = $(editButtons);
        this.actionUrl = this.$form.attr('action');
        
        
    }

    static VALID_OPT_TYPES = ['plain', 'select2', 'select2-multiple', 'simplemde'];

    _process_opts(opts) {
        if (!opts.type) {
            opts.type = 'plain';
        }
        if (!opts.inputDataKey) {
            opts.inputDataKey = opts.inputName;
        }

        if (UpdateModal.VALID_OPT_TYPES.indexOf(opts.type) == -1) {
            throw new Error(`invalid opts type ${opts.type}`);
        }

        if (!opts.inputName) {
            throw new Error('no input name given');
        }

        return opts;
    }

    append (opts) {
        opts = this._process_opts(opts);
        this.toUpdate.append(opts);
        return this;
    }

    appendMany (lst) {
        this.toUpdate = this.toUpdate.concat(lst.map(this._process_opts));
        return this;
    }

    build () {
        let _this = this;
        let $updateModal = _this.$updateModal;
        this.toUpdate.forEach(function (opt) {
            if (opt.type === 'select2' || opt.type === 'select2-multiple') {
                let select2Opts = opt.options || {};
                select2Opts.dropdownParent = $updateModal;
                _this.fromOptGetInput(opt).select2(select2Opts);
            } else if (opt.type == 'simplemde') {
                let $input = _this.fromOptGetInput(opt);
                let simplemdeOpts = opt.options || {};
                simplemdeOpts.element =$input.get(0);
                simplemdeOpts.toolbar = simplemdeOpts.toolbar || ['bold', 'italic', 'heading', '|', 'quote', 'unordered-list', 'ordered-list', 'preview'];
                if (simplemdeOpts.spellChecker === undefined) simplemdeOpts.spellChecker = false;
                let simplemde = new SimpleMDE(simplemdeOpts);
                simplemde.render();
                $input.on('focus', function() {
                    simplemde.codemirror.refresh();
                });
                $input.data('simplemde', simplemde);

            }
        });

        this.$editButtons.on('click', this.makeOnClickCallback());
        this.$form.submit(this.makeSubmitCallback());

    }

    fromOptGetInput(opt) {
        if (!opt.inputName) {
            throw new Error(`can't get Input, does not have inputName`);
        }
        return this.$updateModal.find(`[name=${opt.inputName}]`);
    }

    makeSubmitCallback() {
        let _this = this;
        let $ = this.$;
        return function (e, from) {
            let $updateModal = _this.$updateModal;
            if (from == null) {
                let $form = $(this);
                let id = $updateModal.prop('x-data-id');
                let actionUrl = _this.actionUrl.replace(':id', id);
                $form.attr('action', actionUrl);
                e.preventDefault();
                $form.trigger('submit', ['update_modal.js']);
            } else {
            }
        };
    }

    makeOnClickCallback() {
        let _this = this;
        let updater = this.makeUpdaterCallback();
        let $ = this.$;
        return function () {
            let $button = $(this);
            let id = $button.attr('x-data-id');
            let url = _this.getOneUrl;
            $.ajax(url, {
                dataType: 'json',
                contentType: 'application/json',
                method: 'POST',
                data: JSON.stringify({
                    'id': id,
                    '_token': _this.csrf
                })
            })
            .done(updater)

            // TODO make better error handling
            .fail(x => console.log(x));

        };
    }

    makeUpdaterCallback() {
        let _this = this;
        let $ = this.$;
        return function (data) {
            let $updateModal = _this.$updateModal;
            $updateModal.prop('x-data-id', data.id);
            _this.toUpdate.forEach(x => {
                const {inputName, inputDataKey, type} = x;
                let $input = _this.fromOptGetInput(x);
                if (type == 'simplemde') {
                    $input.data('simplemde').value(data[inputDataKey]);
                } else if ($input.prop('type') === 'checkbox') {
                    $input.get(0).checked = data[inputDataKey];
                } else {
                    $input.val(data[inputDataKey]);
                }

                if (type == 'select2' || type === 'select2-multiple') {
                    $input.trigger('change');
                }
            });
        };
    }
}

jQuery.fn.extend({
    updateModal: function (args) {
        const {form, editButtons, getOneUrl, csrf, fields} = args;
        let $updateModal = this.first();
        let inst = new UpdateModal(jQuery, $updateModal, form, editButtons, getOneUrl, csrf);
        inst.appendMany(fields).build();
        return $updateModal;
    }
});
