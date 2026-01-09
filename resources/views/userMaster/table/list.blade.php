<table id="userMasterTable" class="table table-bordered border-primary table-hover text-center mb-3">
    <thead class="bg-light-primary">
        <tr>
            <th>#</th>
            <th>UserName</th>
            <th>__Password__</th>
            <th>User_Role</th>
            <th>Select_All</th>
            <th>Dashboard</th>
            <th>ActionLog</th>
            <th>UserMaster</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($userdata as $key => $user)
            @php
                $permissions = [
                    'dashboard',
                    'actionlog',
                    'usermaster',
                ];
                $selectall = collect($permissions)->every(fn($perm) => $user->$perm == 1) ? 1 : 0;
            @endphp
            <tr>
                <td>{{ ++$key }}</td>
                <td class="d-flex sticky-tr">
                    <button class="Save_btn btn-sm btn-light-primary border-0 me-2" type="button" title="save"
                        data-id="{{ $user->id }}"><i class="fa fa-save fs-6"></i>
                    </button>
                    {{ $user->username }}
                </td>
                <td class="p-0">
                    <div class="input-group m-0 p-0">
                        <input type="password" class="form-control text-center password px-0 m-0 py-1"
                            value="{{ $user->password }}" id="password-{{ $user->id }}" style="border: none;"
                            readonly>
                        <span class="input-group-text p-1 text-primary" style="cursor: pointer;">
                            <span toggle="#password-field" class="fa toggle-password fa-eye p-0 m-0"
                                id="toggle-{{ $user->id }}"></span>
                        </span>
                    </div>
                </td>
                <td>
                    {{ $user->access }}
                </td>

                <td>
                    <input class="form-check-input select-all-chk" type="checkbox" name="SelectAll"
                        data-id="{{ $user->id }}" {{ $selectall == '1' ? 'checked' : '' }}
                        style="cursor: pointer; width:1.3rem; height:1.3rem;">
                </td>

                @foreach ($permissions as $perm)
                    <td>
                        <input class="form-check-input p-2" type="checkbox" name="{{ $perm }}"
                            data-id="{{ $user->id }}" {{ $user->$perm == 1 ? 'checked' : '' }}>
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
<input type="hidden" id="totalcount" value="{{ $userdata->count() }}">
@if ($userdata instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div id="indexTablePagination" style="float: right;" class="mt-3">
        {{ $userdata->links('custom_pagination') }}
    </div>
@endif
