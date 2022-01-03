@extends('layouts.master')
@section('page_title', 'Talent Ranker - '.ling('add_team'))


@section('content')

	<div class="m-heading-1 border-green m-bordered">
		<h5 style="display: inline-block">Talent Ranker - {{ ling('add_team') }}!</h5>
		<a href="{{ url('admin/teams') }}" class="btn btn-circle green-meadow pull-right"><i class="fa fa-reply"></i> {{ ling('go_back') }}</a>
	</div>
	<div class="row">
        <div class="col-md-12">
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-language font-green"></i>
                        <span class="caption-subject font-green bold uppercase">{{ ling('add_team') }}</span>
                    </div>
                </div>
                @if (count($errors->all()) > 0)
                  @foreach ($errors->all() as $error)
                  <p class="alert alert-danger"> {{ $error }} </p>
                  @endforeach
                @endif
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ url('admin/add_new_team') }}" class="form-horizontal" method="post">
                      {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">{{ ling('name') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">{{ ling('org') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control bs-select" name="org_id" id="selOrg" data-live-search="true" data-size="5">
                                    @if(count($orgs) > 0)
                                      <option value="">{{ ling('select').' '.ling('org') }}</option>
                                      @foreach($orgs as $key => $org)
                                        <option data-org-ct="{{ $org->org_country }}" data-org-rg="{{ $org->org_region }}" value="{{ $org->id }}">{{ $org->org_name }}</option>
                                      @endforeach
                                    @endif
                                    </select>
                                </div>
                            </div>
                            <div id="locHolder" style="display: none">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ ling('select_country') }}</label>
                                    <div class="col-md-6">
                                       <select name="country_id" class="form-control bs-select" id="selCot" data-size="5">
                                         @if(count(countries()) > 0)
                                          <option value="">{{ ling('select_country') }}</option>
                                          @foreach(countries() as $key => $country)
                                          <option value="{{ $country->id }}">{{ $country->name }}</option>
                                          @endforeach

                                         @endif
                                       </select> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ ling('select_region') }}</label>
                                    <div class="col-md-6">
                                        <select class="form-control bs-select" name="region_id" id="selReg" data-size="5">
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-4">
                                    <button type="submit" class="btn green">{{ ling('submit') }}</button>
                                    <a href="{{ url('admin/teams') }}" class="btn default">{{ ling('cancel') }}</a>
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
@stop

@section('javascript')
  @parent

  {{ Html::script('web/assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js') }}
  {{ Html::script('web/assets/pages/scripts/ui-sweetalert.min.js') }}

  <script>
    $('#selOrg').on('change', function(){

      var c_id = $('option:selected', this).attr('data-org-ct');
      var r_id = $('option:selected', this).attr('data-org-rg');

      $.blockUI({ css: { 
          border: 'none', 
          padding: '15px', 
          backgroundColor: '#000', 
          '-webkit-border-radius': '10px', 
          '-moz-border-radius': '10px', 
          opacity: .5, 
          color: '#fff' 
      } });

      $("#selCot option").filter(function(){
          return $.trim($(this).val()) == c_id 
      }).prop('selected', true);
      $('#selCot').selectpicker('refresh');

      $.ajax({
          type:"GET",
          url:'/get_regions/'+c_id,
          success: function(response) {
              if(response.success == 1)
              {
                  if($("#selReg").html(response.data).selectpicker('refresh'))
                  {
                      $("#selReg option").filter(function(){
                          return $.trim($(this).val()) == r_id 
                      }).prop('selected', true);
                      $('#selReg').selectpicker('refresh');
                      $('#locHolder').css('display', 'block');
                      $.unblockUI();
                  }
              }
              else
              {
                $.unblockUI();
                $("#selReg").html('').selectpicker('refresh');
              }
          }
      })

    });
  </script>

  @if(Session::has('message'))
      <script>
        swal("{{ ling('added') }}!", "{{ ling('team').' '.ling('added_succ') }}!", "success");
      </script>
  @endif
@stop