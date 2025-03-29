
@extends('master_layout.admin_master')
@section('job_slots')

    <h3 class="page-header">All Jobs </h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="cell-small text-center" data-toggle="tooltip" title="Toggle all!"><input type="checkbox" id="check3-all" name="check3-all"></th>
                <th class="text-center">SL NO.</th>
                <th>Employer Name</th>
                <th class="hidden-xs hidden-sm"><i class="fa fa-envelope-o"></i>Company Name</th>
                <th class="hidden-xs hidden-sm">Job Title</th>
                <th class="hidden-xs hidden-sm">Job Post ID</th>
                <th class="cell-small text-center"><i class="fa fa-bolt"></i> Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($job as $key=>$row)
            <tr>
                <td class="text-center"><input type="checkbox" id="check3-td1" name="check3-td1"></td>
                <td class="text-center">{{$key+1}}</td>
                <td><a href="user_profile.html">{{ $row->employer_name}}</a></td>
                <td class="hidden-xs hidden-sm">{{ $row->companyname}}</td>
                <td class="hidden-xs hidden-sm">{{ $row->job_post_id}}</td>
                <td class="hidden-xs hidden-sm">{{ $row->job_title}}</td>
                <td class="text-center">
                    <div class="btn">
                        <a href="javascript:void(0)" data-toggle="tooltip" title="Details" class="btn btn-xs btn-info"><i class="fa fa-info-circle"></i></a>
                        <a href="javascript:void(0)" data-toggle="tooltip" title="Approve" class="btn btn-xs btn-success"><i class="fa fa-check"></i></a>
                        <a href="javascript:void(0)" data-toggle="tooltip" title="Dis-Approve" class="btn btn-xs btn-warning"><i class="fa fa-times"></i></a>
                        <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                    </div>
                </td>
            </tr>
            @endforeach
            
            
        </tbody>
    </table>

@endsection