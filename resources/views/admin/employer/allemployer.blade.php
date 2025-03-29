
@extends('master_layout.admin_master')
@section('allemployer')

<h3 class="page-header">All Employers </h3>
<table class="table table-hover">
    <thead>
        <tr>
            <th class="cell-small text-center" data-toggle="tooltip" title="Toggle all!"><input type="checkbox" id="check3-all" name="check3-all"></th>
            <th class="text-center">#</th>
            <th>Username</th>
            <th class="hidden-xs hidden-sm"><i class="fa fa-envelope-o"></i> Email</th>
            <th class="hidden-xs hidden-sm">Firstname</th>
            <th class="hidden-xs hidden-sm">Lastname</th>
            <th class="cell-small text-center"><i class="fa fa-bolt"></i> Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="text-center"><input type="checkbox" id="check3-td1" name="check3-td1"></td>
            <td class="text-center">1</td>
            <td><a href="user_profile.html">username1</a></td>
            <td class="hidden-xs hidden-sm">user1@example.com</td>
            <td class="hidden-xs hidden-sm">Name</td>
            <td class="hidden-xs hidden-sm">Last</td>
            <td class="text-center">
                <div class="btn-group">
                    <a href="javascript:void(0)" data-toggle="tooltip" title="Details" class="btn btn-xs btn-info"><i class="fa fa-info-circle"></i></a>
                    <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                    <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                </div>
            </td>
        </tr>
        <tr>
            <td class="text-center"><input type="checkbox" id="check3-td2" name="check3-td2"></td>
            <td class="text-center">2</td>
            <td><a href="user_profile.html">username2</a></td>
            <td class="hidden-xs hidden-sm">user2@example.com</td>
            <td class="hidden-xs hidden-sm">Name</td>
            <td class="hidden-xs hidden-sm">Last</td>
            <td class="text-center">
                <div class="btn-group">
                    <a href="javascript:void(0)" data-toggle="tooltip" title="Details" class="btn btn-xs btn-info"><i class="fa fa-info-circle"></i></a>
                    <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                    <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                </div>
            </td>
        </tr>
        <tr>
            <td class="text-center"><input type="checkbox" id="check3-td3" name="check3-td3"></td>
            <td class="text-center">3</td>
            <td><a href="user_profile.html">username3</a></td>
            <td class="hidden-xs hidden-sm">user3@example.com</td>
            <td class="hidden-xs hidden-sm">Name</td>
            <td class="hidden-xs hidden-sm">Last</td>
            <td class="text-center">
                <div class="btn-group">
                    <a href="javascript:void(0)" data-toggle="tooltip" title="Details" class="btn btn-xs btn-info"><i class="fa fa-info-circle"></i></a>
                    <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                    <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                </div>
            </td>
        </tr>
        <tr>
            <td class="text-center"><input type="checkbox" id="check3-td4" name="check3-td4"></td>
            <td class="text-center">4</td>
            <td><a href="user_profile.html">username4</a></td>
            <td class="hidden-xs hidden-sm">user4@example.com</td>
            <td class="hidden-xs hidden-sm">Name</td>
            <td class="hidden-xs hidden-sm">Last</td>
            <td class="text-center">
                <div class="btn-group">
                    <a href="javascript:void(0)" data-toggle="tooltip" title="Details" class="btn btn-xs btn-info"><i class="fa fa-info-circle"></i></a>
                    <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                    <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                </div>
            </td>
        </tr>
    </tbody>
</table>

@endsection