@extends('layouts.master')
@section('page_title', 'Talent Ranker - '.ling('edit_admin'))


@section('content')

	<div class="m-heading-1 border-green m-bordered">
		<h5 style="display: inline-block">Talent Ranker - {{ ling('edit_admin') }}!</h5>
		<a href="{{ url('admin_panel/admins') }}" class="btn btn-circle green-meadow pull-right"><i class="fa fa-reply"></i> {{ ling('go_back') }}</a>
	</div>
  @php 
    $cData = get_regions_simp($admin_data->country_id);
  @endphp
	<div class="row">
        <div class="col-md-8">
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-language font-green"></i>
                        <span class="caption-subject font-green bold uppercase">{{ ling('admin_info') }}</span>
                    </div>
                </div>
                @if (count($errors->all()) > 0)
                  @foreach ($errors->all() as $error)
                  <p class="alert alert-danger"> {{ $error }} </p>
                  @endforeach
                @endif
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ url('admin_panel/update_admin') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">{{ ling('name') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ $admin_data->name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">{{ ling('email') }}</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ $admin_data->email }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">{{ ling('dob') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control bs-select" name="date_of_birth" data-size="7">
                                        <option value="">{{ ling('sel_birth_year') }}</option>
                                        @for($i = 1930; $i <= 2016; $i++)
                                        <option value="{{ $i }}" {{ ( $admin_data->date_of_birth == $i ) ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">{{ ling('gender') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control bs-select" name="gender">
                                        <option value="">{{ ling('select_gender') }}</option>
                                        <option value="male" {{ ( $admin_data->gender == 'male' ) ? 'selected' : '' }}>{{ ling('male') }}</option>
                                        <option value="female" {{ ( $admin_data->gender == 'female' ) ? 'selected' : '' }}>{{ ling('female') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">{{ ling('select_country') }}</label>
                                <div class="col-md-6">
                                   <select name="country_id" class="form-control bs-select" id="selCot" data-size="5">
                                     @if(count(countries()) > 0)
                                      <option value="">{{ ling('select_country') }}</option>
                                      @foreach(countries() as $key => $country)
                                      <option value="{{ $country->id }}" {{ ( $admin_data->country_id == $country->id ) ? 'selected' : '' }}>{{ $country->name }}</option>
                                      @endforeach

                                     @endif
                                   </select> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">{{ ling('select_region') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control bs-select" name="region_id" id="selReg" data-size="5">
                                    @foreach($cData as $key => $region)
                                      <option value="{{ $region->id }}" {{ ( $region->id == $admin_data->region_id ) ? 'selected' : '' }}>{{ $region->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">{{ ling('city') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="city" value="{{ $admin_data->city }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-4">
                                    <button type="submit" class="btn green">{{ ling('submit') }}</button>
                                    <a href="{{ url('admin_panel/organizations') }}" class="btn default">{{ ling('cancel') }}</a>
                                </div>
                            </div>
                        </div>
                    <!-- END FORM-->
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-language font-green"></i>
                        <span class="caption-subject font-green bold uppercase">{{ ling('admin_info') }}</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="form-body">
                      <div class="form-group">
                          <label class="control-label">{{ ling('new_pass') }}</label>
                          <input type="password" class="form-control" name="password">
                      </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
                      <div class="form-group">
                          <label class="control-label">{{ ling('c_new_pass') }}</label>
                          <input type="password" class="form-control" name="c_password">
                      </div>

                      <div class="form-group">
                          <label class="control-label">{{ ling('select_org') }}</label>
                          <select class="form-control select2" multiple name="orgs[]" data-placeholder="{{ ling('select_org') }}">
                              @foreach($orgs as $key => $org)

                              @php
                                $sel = '';
                                if (in_array($org->id, $admin_orgs)) {
                                    $sel = ' selected="selected" ';
                                }
                              @endphp

                              <option value="{{ $org->id }}" {{ $sel }}>{{ $org->org_name }}</option>
                              @endforeach
                          </select>
                      </div>

                      <div class="form-group last">
                        <label class="control-label">{{ ling('user_profile_img') }}</label>
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                @if(!empty($admin_data->profile_image))
                                <img src="{{ asset('web/assets/uploads/user_images/'.$admin_data->profile_image) }}" alt="" /> 
                                @else
                                <img src="http://www.placehold.it/200x200/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> 
                                @endif
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"> </div>
                            <div>
                                <span class="btn default btn-file">
                                    <span class="fileinput-new"> {{ ling('select_img') }} </span>
                                    <span class="fileinput-exists"> {{ ling('change') }} </span>
                                    <input type="file" name="user_image"> 
                                </span>
                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{ ling('remove') }} </a>
                            </div>
                            <input type="hidden" name="pre_image" value="{{ $admin_data->profile_image }}">
                            <input type="hidden" name="user_id" value="{{ $admin_data->id }}">
                        </div>
                     </div>
                    </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
        </div>
    </div>

@endsection

@section('style')
  @parent
  {{ Html::style('web/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}
  {{ Html::style('web/assets/global/plugins/bootstrap-sweetalert/sweetalert.css') }}
  {{ Html::style('web/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css') }}
  {{ Html::style('web/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}
  {{ Html::style('web/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}
  {{ Html::style('web/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}
  {{ Html::style('web/assets/global/plugins/select2/css/select2.min.css') }}
  {{ Html::style('web/assets/global/plugins/select2/css/select2-bootstrap.min.css') }}
  {{ Html::style('web/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}
@stop

@section('javascript')
  @parent

  {{ Html::script('web/assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js') }}
  {{ Html::script('web/assets/pages/scripts/ui-sweetalert.min.js') }}
  {{ Html::script('web/assets/global/plugins/moment.min.js') }}
  {{ Html::script('web/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js') }}
  {{ Html::script('web/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}
  {{ Html::script('web/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}
  {{ Html::script('web/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}
  {{ Html::script('web/assets/pages/scripts/components-date-time-pickers.min.js') }}
  {{ Html::script('web/assets/global/plugins/select2/js/select2.full.min.js') }}
  {{ Html::script('web/assets/pages/scripts/components-select2.min.js') }}
  {{ Html::script('web/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}

  @if(Session::has('message'))
      <script>
        swal("{{ ling('updated') }}!", "{{ ling('admin_updated_succ') }}!", "success");
      </script>
  @endif
@stop