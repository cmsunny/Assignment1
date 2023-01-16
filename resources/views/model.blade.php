
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
<script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>


<form action="{{ isset($user->id) ? route('company.update', $user->id) : route('company.create') }}"
    method="post" data-form="ajax-form" data-modal="#ajax_model" data-datatable="#stores-table" id="form-pointer" enctype="multipart/form-data">
    {!! csrf_field() !!}

    @if (isset($user->id))
        @method('PUT')
    @endif
    <input type="hidden" value="user" name="user_type">
    <div class="modal-body">

        <div class="row">   
            <div class="col-md-3 col-sm-3">
                <div class="form-group">
                    <label class="control-label">Name&nbsp;<span class="text-danger">*</span></label>
                </div>
            </div>
            <div class="col-md-9 col-sm-9">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" minlength="3"
                        value="{{isset($user->name) ? $user->name : ''}}" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-sm-3">
                <div class="form-group">
                    <label class="control-label">Email&nbsp;<span class="text-danger">*</span></label>
                </div>
            </div>
            <div class="col-md-9 col-sm-9">
                <div class="form-group">
                    <input type="email" class="form-control" name="email" minlength="3"
                        value="{{isset($user->email) ? $user->email : ''}}" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-sm-3">
                <div class="form-group">
                    <label class="control-label">Website&nbsp;<span class="text-danger">*</span></label>
                </div>
            </div>
            <div class="col-md-9 col-sm-9">
                <div class="form-group">
                    <input type="number" class="form-control" name="phone" 
                        value="{{isset($user->phone) ? $user->phone : ''}}" required>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-light" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success" data-button="submit">{{ !isset($user)? 'Save' : 'Update'}}</button>
    </div>
</form>
<script>
    $('input:text').on('keypress', function (event) {
        var regex = new RegExp("^[a-zA-Z ]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    });
    $('body').on('click', '[data-act=ajax-modal]', function () {
    const _self = $(this);

    const content = $("#ajax_model_content");
    const spinner = $("#ajax_model_spinner");

    content.hide();
    spinner.show();

    $("#ajax_model").modal({backdrop: 'static'});
    $("#ajax_model_title").html(_self.attr('data-title'));

    var metaData = {};
    $(this).each(function () {
        $.each(this.attributes, function () {
            if (this.specified && this.name.match("^data-post-")) {
                var dataName = this.name.replace("data-post-", "");
                metaData[dataName] = this.value;
            }
        });
    });

    axios({
        method: _self.attr('data-method'),
        url: _self.attr('data-action-url'),
        data: metaData
    })
    .then(response => {
        spinner.hide();

        if (response.status === 200) content.html(response.data).show();
        else toastMessage();

    }).catch(error => {
        spinner.hide();
        toastMessage(error.response.data.message);
    });
});
</script>
