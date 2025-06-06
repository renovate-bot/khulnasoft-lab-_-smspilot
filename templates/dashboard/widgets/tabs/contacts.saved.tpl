<div class="card">
    <div class="card-header">
        <h4 class="card-title"><i class="la la-address-book"></i> {lang_dashboard_contacts_tabsavedtitle}</h4>

        <div class="float-right">
            <button class="btn btn-lg btn-primary" smspilot-toggle="smspilot.add.contact">
                <i class="la la-address-book la-lg"></i>
                <span class="d-none d-sm-inline">{lang_dashboard_btn_addcontact}</span>
            </button>

            <button class="btn btn-lg btn-primary" smspilot-toggle="smspilot.import.contacts">
                <i class="la la-upload la-lg"></i>
                <span class="d-none d-sm-inline">{lang_import_btn}</span>
            </button>
        </div>
    </div>

    <div class="card-body">
        <div class="dt-responsive table-responsive">
            <table class="table table-striped" smspilot-table></table>
        </div>
    </div>
</div>