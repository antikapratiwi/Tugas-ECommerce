<div class="container">
    <div class="row align-items-center">
        <h4 class="mb-0 font-weight-medium mr-2">
            Unit Audit Terpilih:
        </h4>

        @if($session_unit_audit === "(belum dipilih)")
            <div class="badge badge-warning badge-rounded p-2 mr-2">
                {{ $session_unit_audit }}
            </div>
        @else
            <div class="display-5 badge badge-secondary badge-rounded p-2 mr-2">
                {{ $session_unit_audit }}
            </div>

            <form class="m-0" method="post" enctype="multipart/form-data" action="/unitaudit_unselect">
                <button type="submit" class="btn btn-danger btn-sm"> Lepas </button>
            </form>
        @endif
    </div>
</div>