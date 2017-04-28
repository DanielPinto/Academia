<div style="display:none;">

    <!-- Url  defoult-->
    {{$urlProfile = ''}}
    {{$srcProfile = ''}}

</div>

<div class="profile">
  <div class="profile_pic">

    @if (Auth::User()->funcionario->foto == 'user.png')
      <img src="{{$srcProfile}}/images/profiles/{{Auth::User()->funcionario->foto}}" alt="..." class="img-circle profile_img">
    @else
      <img src="{{$srcProfile}}/images/profiles/{{Auth::User()->funcionario_id}}/{{Auth::User()->funcionario->foto}}" alt="..." class="img-circle profile_img">
    @endif

  </div>
  <div class="profile_info">
    <span>Welcome,</span>
    <h2>{{Auth::user()->name }}</h2>
  </div>
</div>
