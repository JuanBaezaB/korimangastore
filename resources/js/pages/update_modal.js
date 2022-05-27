
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

    append (type, inputName, inputDataKey) {
        if (!inputDataKey) {
            inputDataKey = inputName;
        }
        this.toUpdate.append({ type, inputName, inputDataKey });
        return this;
    }

    appendMany (lst) {
        this.toUpdate = this.toUpdate.concat(
            lst.map(row => {
                if (row.length == 1) {
                    return { type: 'plain', inputName: row[0], inputDataKey: row[0] };
                } else if (row.length == 2) {
                    const [type, inputName] = row;
                    if (!type) {
                        type = 'plain';
                    }
                    return { type: type, inputName: inputName, inputDataKey: inputName };
                } else if (row.length == 3) {
                    const [type, inputName, inputDataKey] = row;
                    if (!type) {
                        type = 'plain';
                    }
                    return { type, inputName, inputDataKey };

                }
                throw '[update_modal.js] expected for array at most an length 3 and at least length 1';

            })
        );
        return this;
    }

    select3 (inputName, inputDataKey) {
        return this.append('select3', inputName, inputDataKey);
    }

    plain (inputName, inputDataKey) {
        return this.append('plain', inputName, inputDataKey);
    }

    build () {
        this.$editButtons.on('click', this.makeOnClickCallback());
        this.$form.submit(this.makeSubmitCallback());
    }

    makeSubmitCallback() {
        let _this = this;
        let $ = this.$;
        return function (e, from) {
            let $updateModal = _this.$updateModal;
            if (from == null) {
                let $form = $(this);
                let id = $updateModal.prop('x-data-id');
                let actionUrl = this.actionUrl.replace(':id', id);
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
                let $input = $updateModal.find(`[name=${inputName}]`);
                $input.val(data[inputDataKey]);
                if (type == 'select3') {
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
